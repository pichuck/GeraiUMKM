<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\apply;
use App\Models\artikel;
use App\Models\mahasiswa;
use App\Models\pekerjaan;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    private $projectController;

    public function __construct()
    {
        $this->projectController = new ProjectController();
    }

    public function getDataUmkm()
    {
        $pekerjaan = pekerjaan::inRandomOrder()->take(3)->get(); // Get 3 random pekerjaan entries
        $umkm = umkm::inRandomOrder()->take(3)->get(); // Get 3 random UMKM entries
        $artikel = artikel::all(); // Get 3 random artikel entries

        return view('index', compact('umkm', 'artikel', 'pekerjaan'));
    }



    public function getDataEvent()
    {
        $artikel = artikel::all();
        return view('event', compact('artikel'));
    }

    public function showArtikel($id)
    {
        // Ambil artikel berdasarkan ID
        $artikel = artikel::findOrFail($id);

        // Ambil 5 artikel lainnya yang bukan artikel saat ini
        $relatedArticles = artikel::where('id', '!=', $id)
            ->take(5)
            ->get();

        // Return ke view detail.event dengan data artikel dan artikel terkait
        return view('detail-event', [
            'artikel' => $artikel,
            'relatedArticles' => $relatedArticles,
        ]);
    }


    public function getDataProfilMahasiswa()
    {
        // Get the authenticated user's related mahasiswa data
        $mahasiswa = mahasiswa::where('id_user', Auth::id())->first();

        // Mulai query builder
        $projects = apply::query();

        // Tambahkan eager loading untuk relasi (misal, `projectDetails`)
        $projects->with('project'); // Ganti 'projectDetails' dengan nama relasi yang sesuai

        // Tambahkan kondisi user yang sedang login
        $projects->where('id_user', Auth::id());

        // Ambil data dan kelompokkan berdasarkan status
        $groupedProjects = $projects->get()->groupBy('status');

        // Pisahkan proyek berdasarkan status
        $historyProject = $groupedProjects->get('completed', collect());
        $activeProject = $groupedProjects->get('active', collect());
        $rejectProject = $groupedProjects->get('rejected', collect());
        $pendingProject = $groupedProjects->get('pending', collect());

        $projectsData = [
            'history' => $historyProject ?? [],
            'active' => $activeProject ?? [],
            'reject' => $rejectProject ?? [],
            'pending' => $pendingProject ?? [],
        ];

        // Pass the data to the view
        return view('mahasiswa.profile-mahasiswa', compact('mahasiswa', 'projectsData'));
    }

    public function updateBio(Request $request)
    {
        $request->validate([
            'bio' => 'required|string', // Set any necessary validation rules for the bio
        ]);

        // Retrieve the mahasiswa model for the currently authenticated user
        $mahasiswa = mahasiswa::where('id_user', auth()->id())->first();

        if (!$mahasiswa) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Mahasiswa data not found'], 404);
            }
            return redirect()->back()->with('error', 'Mahasiswa data not found');
        }

        // Update the bio
        $mahasiswa->update([
            'bio' => $request->input('bio'),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'Bio updated successfully'], 200);
        }

        // Redirect back with a success message for non-AJAX requests
        return redirect()->back()->with('success', 'Bio updated successfully');
    }



    // Achievement
    public function store(Request $request)
    {
        try {
            // Validasi request
            $validated = $request->validate([
                'apply_id' => 'required|exists:table_apply,id',
                'task_file' => 'required|file|mimes:pdf,doc,docx,zip,rar|max:10240' // 10MB max
            ]);

            // Cek apakah file ada di request
            if ($request->hasFile('task_file')) {
                $file = $request->file('task_file');
                $filename = time() . '_' . $file->getClientOriginalName();

                // Store file di storage/app/public/tasks dan buat link publiknya
                $path = $file->storeAs('tasks', $filename, 'public');

                // Mencatat path penyimpanan file untuk debugging
                Log::info('File stored at: ' . $path);

                // Membuat record achievement dengan deskripsi yang menyimpan nama file
                Achievement::create([
                    'apply_id' => $request->apply_id,
                    'deskripsi' => $path  // Simpan path lengkap jika dibutuhkan untuk referensi
                ]);

                // Redirect dengan pesan sukses
                return redirect()->back()->with('success', 'File uploaded successfully.');
            }

            // Redirect dengan pesan error jika file tidak ada
            return redirect()->back()->with('error', 'No file uploaded.');
        } catch (\Exception $e) {
            // Mencatat kesalahan yang terjadi
            Log::error('Failed to upload file: ' . $e->getMessage());

            // Redirect dengan pesan error dan informasi detail kesalahan
            return redirect()->back()->with('error', 'Failed to upload file: ' . $e->getMessage());
        }
    }

    public function getDataProject()
    {
        $pekerjaan = pekerjaan::all();
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial', 'Marketing', 'Lainnya'];
        return view('mahasiswa.Project', compact('pekerjaan', 'categories'));
    }

    public function getDataProjectByCategory($category)
    {
        // Definisikan kategori yang valid
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial', 'Marketing', 'Lainnya'];

        // Cek apakah kategori yang dipilih valid
        if (!in_array($category, $categories)) {
            return abort(404, 'Category not found');
        }

        // Ambil data proyek berdasarkan kategori yang dipilih
        $projects = pekerjaan::where('kategori', $category)->get();

        return view('mahasiswa.list_project', compact('category', 'projects'));
    }

    // Fetch specific project details
    public function showProject($id)
    {
        $project = pekerjaan::with('user')->findOrFail($id); // Eager load user with the project
        return view('mahasiswa.show_project', compact('project'));
    }

    public function indexUmkm(Request $request)
    {
        $search = $request->input('search');
        $query = UMKM::query();

        if ($search) {
            $query->where('nama_umkm', 'LIKE', "%{$search}%");
        }

        $umkms = $query->paginate(10);  // 10 items per page
        return view('umkm', compact('umkms', 'search'));
    }

    /**
     * Menampilkan detail UMKM berdasarkan ID
     */
    public function showUmkm($id)
    {
        // Ambil detail UMKM berdasarkan ID
        $umkm = Umkm::findOrFail($id);

        // Kirim data UMKM ke view umkm/show
        return view('showumkm', compact('umkm'));
    }

    public function updateProfile(Request $request, $id)
    {
        $mahasiswa = mahasiswa::find($id);

        $request->validate([
            'nama_mahasiswa' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'alamat_mahasiswa' => 'required|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update data mahasiswa
        $mahasiswa->nama_mahasiswa = $request->input('nama_mahasiswa');
        $mahasiswa->universitas = $request->input('universitas');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->no_hp = $request->input('no_hp');
        $mahasiswa->alamat_mahasiswa = $request->input('alamat_mahasiswa');

        // Handle Foto Profil
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('uploads/mahasiswa', 'public');
            $mahasiswa->foto_profil = $path;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.profile.edit', $mahasiswa->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function editProfile($id)
    {
        $mahasiswa = mahasiswa::where('id_user', Auth::id())->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.edit-profile', compact('mahasiswa'));
    }
}
