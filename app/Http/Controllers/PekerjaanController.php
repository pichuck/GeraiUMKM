<?php

namespace App\Http\Controllers;

use App\Models\pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PekerjaanController extends Controller
{
    // Archive the specified resource
    public function archive($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);

        // Check if the authenticated user owns this job
        if ($pekerjaan->id_user !== Auth::id()) {
            return redirect()->route('umkm.pekerjaan.index')->with('error', 'Anda tidak memiliki izin untuk mengarsipkan pekerjaan ini.');
        }

        $pekerjaan->update(['status' => 'archive']);
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Project berhasil diarsipkan.');
    }

    // Unarchive the specified resource
    public function unarchive($id)
    {
        $pekerjaan = pekerjaan::findOrFail($id);

        // Check if the authenticated user owns this job
        if ($pekerjaan->id_user !== Auth::id()) {
            return redirect()->route('umkm.pekerjaan.index')->with('error', 'Anda tidak memiliki izin untuk mengaktifkan pekerjaan ini.');
        }

        $pekerjaan->update(['status' => 'active']);
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Project berhasil diaktifkan kembali.');
    }
    // Display a listing of the resource
    public function index()
    {
        // Fetch jobs only for the authenticated user
        $pekerjaan = pekerjaan::where('id_user', Auth::id())->get();
        return view('umkm.pekerjaan.index', compact('pekerjaan'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('umkm.pekerjaan.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'tempat_bekerja' => 'required|string|max:255',
            'kategori' => 'required',
        ]);

        // Create a new job for the authenticated user
        pekerjaan::create([
            'posisi' => $validatedData['posisi'],
            'deskripsi' => $validatedData['deskripsi'],
            'tanggal' => $validatedData['tanggal'],
            'tempat_bekerja' => $validatedData['tempat_bekerja'],
            'id_user' => Auth::id(), // Associate job with the authenticated user
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Project berhasil ditambahkan');
    }

    // Display the specified resource
    public function show($id)
    {
        $pekerjaan = pekerjaan::find($id); // Manually fetch the pekerjaan
        // dd($pekerjaan); // Dump the pekerjaan data

        return view('umkm.pekerjaan.show', compact('pekerjaan'));
    }


    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        return view('umkm.pekerjaan.edit', compact('pekerjaan'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        $pekerjaan->update($request->all());
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Project updated successfully!');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pekerjaan = pekerjaan::find($id);
        if (!$pekerjaan) {
            abort(404); // Handle not found
        }

        $pekerjaan->delete();
        return redirect()->route('umkm.pekerjaan.index')->with('success', 'Project deleted successfully!');
    }

    public function getAllDataProject()
    {
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial','Marketing','Lainnya'];

        $projects = pekerjaan::all()->groupBy('kategori');
        // dd($projects);

        return view('mahasiswa.all_project', compact('categories', 'projects'));
    }

    public function superindex()
    {
        $categories = ['Agrikultur',
            'Akuntansi',
            'Edukasi',
            'Kesehatan',
            'Lingkungan',
            'Kreatif',
            'Finance',
            'Teknologi',
            'Sosial',
            'Marketing',
            'Lainnya'
        ];
        return view('superadmin.project.index', compact('categories'));
    }

    public function getData()
    {
        $query = Pekerjaan::with(['user', 'apply'])->select('table_pekerjaan.*');

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return view('admin.pekerjaan.action_buttons', ['row' => $row])->render();
            })
            ->addColumn('applicants_count', function ($row) {
                return $row->apply->count();
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d M Y H:i');
            })
            ->editColumn('status', function ($row) {
                $statusClass = $row->status === 'active' ? 'success' : 'danger';
                return sprintf(
                    '<span class="badge bg-%s">%s</span>',
                    $statusClass,
                    ucfirst($row->status)
                );
            })
            ->filterColumn('status', function ($query, $keyword) {
                $query->where('status', 'like', "%{$keyword}%");
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


}
