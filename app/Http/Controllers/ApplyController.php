<?php

namespace App\Http\Controllers;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{

    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan ID project yang dimiliki oleh user
        $projectIds = $user->pekerjaan()->pluck('id'); // Menggunakan relasi pekerjaan

        // Mengambil data apply yang terkait dengan project user
        $applies = apply::whereIn('id_project', $projectIds)
            ->with(['user', 'project']) // Mengambil relasi user dan project
            ->get();

        // Mengembalikan view dengan data applies
        return view('umkm.lamaran.index', compact('applies'));
    }


    public function store(Request $request)
    {
        try {
            // Convert pengalaman_organisasi and pengalaman_kerja arrays to string if they are arrays
            if (is_array($request->pengalaman_organisasi)) {
                $request->merge([
                    'pengalaman_organisasi' => implode(', ', $request->pengalaman_organisasi)
                ]);
            }

            if (is_array($request->pengalaman_kerja)) {
                $request->merge([
                    'pengalaman_kerja' => implode(', ', $request->pengalaman_kerja)
                ]);
            }

            // Validate the request
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'deskripsi_diri' => 'required|string',
                'jurusan' => 'required|string|max:255',
                'pengalaman_organisasi' => 'nullable|string',
                'pengalaman_kerja' => 'nullable|string',
                // 'dokumen' => 'required|mimes:pdf,doc,docx|max:2048',  // Adjust file type and size if needed
            ]);

            // Handle file upload for 'dokumen'
            // $filePath = $request->file('dokumen')->store('dokumen', 'public');

            // Save the apply record
            Apply::create([
                'id_user' => $request->id_user,
                'id_project' => $request->id_project,
                'status' => 'pending',
                // 'dokumen' => $filePath,
                'nama' => $validatedData['nama'],
                'deskripsi_diri' => $validatedData['deskripsi_diri'],
                'jurusan' => $validatedData['jurusan'],
                'pengalaman_organisasi' => $validatedData['pengalaman_organisasi'],
                'pengalaman_kerja' => $validatedData['pengalaman_kerja'],
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Application submitted successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error in ApplyController@store: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'There was an error submitting your application. Please try again.');
        }
    }



    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:table_apply,id',
            'status' => 'required|in:accepted,rejected',
        ]);

        $apply = apply::findOrFail($request->id);
        $apply->status = $request->status;

        // If the status is accepted, change it to active
        if ($apply->status === 'accepted') {
            $apply->status = 'active';
        }

        $apply->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'new_status' => ucfirst($apply->status),
        ]);
    }

    public function updateStatusManage(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:table_apply,id',
            'status' => 'required|in:active,completed',
        ]);

        $apply = Apply::findOrFail($request->id);
        $apply->status = $request->status;
        $apply->save();

        return response()->json(['success' => 'Status updated successfully']);
    }


    public function manageProject()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan ID project yang dimiliki oleh user
        $projectIds = $user->pekerjaan()->pluck('id');

        // Mengambil data apply yang terkait dengan project user
        $applies = apply::whereIn('id_project', $projectIds)
            ->with(['user', 'project', 'achievements']) // Include achievements relation
            ->get();

        // Mengembalikan view dengan data applies
        return view('umkm.manage.index', compact('applies'));
    }



    //  $pekerjaan = pekerjaan::where('id_user', Auth::id())->get();
}
