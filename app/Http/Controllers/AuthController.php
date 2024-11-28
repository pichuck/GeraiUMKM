<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\User;
use App\Models\mahasiswa;
use App\Models\superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function checkLogin(Request $request)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda harus login untuk melihat detail.'
            ]);
        }
    }
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah user statusnya 'active'
            if ($user->status !== 'active') {
                Auth::logout(); // Logout jika status tidak aktif
                return redirect()->route('login')->with('error', 'Akun anda sedang dalam verifikasi.')->withInput();
            }

            // Redirect berdasarkan role pengguna
            switch ($user->role) {
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                case 'umkm':
                    return redirect()->route('umkm.index');
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah.')->withInput();
        }
    }

    public function registermahasiswa(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'universitas' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:L,P',
                'no_hp' => 'required|string|max:20',
                'penghasilan' => 'required|string',
                'pekerjaan' => 'required|string|max:255',
                'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'provinsi' => 'required|string',
                'kota' => 'required|string',
                'kecamatan' => 'required|string',
                'kode_pos' => 'required|string|max:10',
                'alamat' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Store the profile picture
            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);

            // Create a new user
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'mahasiswa',  // Set default role to mahasiswa
            ]);

            // Create a new Mahasiswa record
            Mahasiswa::create([
                'id_user' => $user->id,
                'nama_mahasiswa' => $request->nama,
                'universitas' => $request->universitas,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'penghasilan' => $request->penghasilan,
                'pekerjaan' => $request->pekerjaan,
                'foto_profil' => $fileName,
                'provinsi_mahasiswa' => $request->provinsi,
                'kota_mahasiswa' => $request->kota,
                'kecamatan_mahasiswa' => $request->kecamatan,
                'kelurahan_mahasiswa' => $request->kelurahan ?? '',
                'kode_pos' => $request->kode_pos,
                'alamat_mahasiswa' => $request->alamat,
            ]);

            // Redirect to a success page
            return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in registermahasiswa: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return a JSON response with the error details
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }


    // Assuming you have imported the necessary classes at the top of your controller file

    public function registerumkm(Request $request)
    {
        $validator = $this->validateUMKM($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $fotoProfil = $this->handleProfilePhoto($request);

        // Transaction to ensure both user and UMKM are created or none at all
        DB::beginTransaction();
        try {
            $user = $this->createUser($request);

            $this->createUMKMProfile($request, $user->id, $fotoProfil);

            DB::commit();

            return redirect()->route('login')->with('success', 'Akun anda sedang dalam verifikasi.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Error in registerumkm: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    private function validateUMKM(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'informasi_pemilik' => 'required|string',
            'kategori' => 'required|string|in:F&B,Retail,Jasa,Produksi,Pendidikan,Kesehatan dan Kecantikan,Teknologi dan Digital,Pariwisata dan Hospitality,Agribisnis,Kesenian dan Hiburan,Lainnya'
        ]);
    }

    private function handleProfilePhoto(Request $request)
    {
        return $request->hasFile('foto_profil') ? $this->renameAndStoreFile($request->file('foto_profil'), 'umkm/foto_profil', 'profil') : null;
    }

    private function createUser(Request $request)
    {
        return User::create([
            'name' => $request->nama_umkm,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'umkm',
            'status' => 'inactive',
        ]);
    }

    private function createUMKMProfile(Request $request, $userId, $fotoProfil)
    {
        Umkm::create([
            'id_user' => $userId,
            'nama_umkm' => $request->nama_umkm,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,  // Make sure to capture and save this field from the request
            'foto_profil' => $fotoProfil,
            'informasi_pemilik' => $request->informasi_pemilik,
        ]);
    }

    // Global function or helper function
    function renameAndStoreFile($file, $folder, $prefix)
    {
        $extension = $file->getClientOriginalExtension();
        $newFileName = $prefix . '_' . time() . '.' . $extension;
        $file->storeAs($folder, $newFileName, 'public');
        return $newFileName;
    }



    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}



