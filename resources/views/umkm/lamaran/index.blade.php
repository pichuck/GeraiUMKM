@extends('layouts.umkm.app')

@section('title', 'Daftar Apply')

@section('content')
<section class="section dashboard">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Daftar Apply</h5>
                <div class="table-responsive">
                    <table id="applyTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Posisi</th>
                                <th>Nama</th>
                                <th>Deskripsi Diri</th>
                                <th>Jurusan</th>
                                <th>Pengalaman Organisasi</th>
                                <th>Pengalaman Kerja</th>
                                <th>Status</th>
                                <th>Tanggal Apply</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applies as $apply)
                            @if($apply->status == 'pending')
                            <tr>
                                <td>{{ $apply->user->name ?? 'N/A' }}</td>
                                <td>{{ $apply->project->posisi ?? 'N/A' }}</td>
                                <td>{{ $apply->nama ?? 'N/A' }}</td>
                                <td>{{ $apply->deskripsi_diri ?? 'N/A' }}</td>
                                <td>{{ $apply->jurusan ?? 'N/A' }}</td>
                                <td>{{ $apply->pengalaman_organisasi ?? 'N/A' }}</td>
                                <td>{{ $apply->pengalaman_kerja ?? 'N/A' }}</td>
                                <td>
                                    <span id="status-{{ $apply->id }}">
                                        {{ ucfirst($apply->status) }}
                                    </span>
                                </td>
                                <td>{{ $apply->created_at->format('d M Y') }}</td>
                                <td>
                                    @if($apply->status == 'pending')
                                        <button class="btn btn-success btn-sm action-btn" data-id="{{ $apply->id }}" data-action="accepted">
                                            Accept
                                        </button>
                                        <button class="btn btn-danger btn-sm action-btn" data-id="{{ $apply->id }}" data-action="rejected">
                                            Reject
                                        </button>
                                    @else
                                        Aksi Sudah Tidak Tersedia
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        var table = $('#applyTable').DataTable({
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

        $('.action-btn').on('click', function() {
            var id = $(this).data('id');
            var action = $(this).data('action');
            var button = $(this);

            $.ajax({
                url: '{{route('lamaran.updateStatus')}}',
                method: 'POST',
                data: {
                    id: id,
                    status: action,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) {
                        $('#status-' + id).text(action.charAt(0).toUpperCase() + action.slice(1));
                        table.row(button.parents('tr')).remove().draw();
                    } else {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });
    });
</script>
@endsection
