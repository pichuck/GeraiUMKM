{{-- resources/views/mahasiswa/completed.blade.php --}}
@extends('layouts.admin.app')

@section('title', 'Kelola Sertifikat Mahasiswa')

@section('content')
<section class="section dashboard">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Kelola Sertifikat Mahasiswa</h5>
                <div class="table-responsive">
                <table id="completedProjectsTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Universitas</th>
                            <th>Nama Proyek</th>
                            <th>Deskripsi Proyek</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $mahasiswa)
                            @foreach ($mahasiswa->user->apply as $apply)
                                <tr>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    <td>{{ $mahasiswa->universitas }}</td>
                                    <td>{{ $apply->project->posisi }}</td>
                                    <td>{{ $apply->project->deskripsi}}</td>
                                    <td>{{ $apply->status }}</td>
                                    <td>
                                        <form action="{{ route('sertifikat.superadmin', $mahasiswa->user->id) }}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Kirim Sertifikat</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#completedProjectsTable').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari _MAX_ total entri)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                },
            }
        });
    });
</script>
@endsection
