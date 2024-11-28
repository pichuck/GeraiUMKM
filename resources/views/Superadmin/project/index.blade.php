@extends('layouts.admin.app')

@section('title', 'Project UMKM')

@section('content')
<div class="card">
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Data Pekerjaan</h2>
            <p class="text-muted">Kelola data pekerjaan UMKM</p>
        </div>
        <button type="button" class="btn btn-primary d-flex align-items-center gap-2"
                data-bs-toggle="modal" data-bs-target="#pekerjaanModal" onclick="openModal()">
            <i class="bi bi-plus-circle"></i>
            Tambah Pekerjaan
        </button>
    </div>

    <!-- Table Card with Shadow -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table id="pekerjaanTable" class="table table-hover" style="width:100%">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Pengguna</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Tempat Bekerja</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
            </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Enhanced Modal -->
<div class="modal fade" id="pekerjaanModal" tabindex="-1" aria-labelledby="pekerjaanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-bottom-0 bg-light">
                <h5 class="modal-title fw-bold" id="pekerjaanModalLabel">
                    <i class="bi bi-briefcase me-2"></i>Form Pekerjaan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="pekerjaanForm" onsubmit="savePekerjaan(event)" class="needs-validation" novalidate>
                <div class="modal-body px-4 py-4">
                    <input type="hidden" id="pekerjaanId">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="id_user" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <label for="id_user">Pengguna</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="posisi" required>
                                <label for="posisi">Posisi</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="deskripsi" style="height: 100px" required></textarea>
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="tanggal" required>
                                <label for="tanggal">Tanggal</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="tempat_bekerja" required>
                                <label for="tempat_bekerja">Tempat Bekerja</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="kategori" required>
                                    <option value="Agrikultur">Agrikultur</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Edukasi">Edukasi</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Kreatif">Kreatif</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Teknologi">Teknologi</option>
                                    <option value="Sosial">Sosial</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <label for="kategori">Kategori</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="status" required>
                                    <option value="active">Active</option>
                                    <option value="archive">Archive</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 px-4 pb-4">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Enhanced Styling and Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<style>
    .form-floating > .form-control,
    .form-floating > .form-select {
        height: 3.5rem;
        line-height: 1.25;
    }

    .form-floating > textarea.form-control {
        height: 100px;
    }

    .table > :not(caption) > * > * {
        padding: 1rem 1.5rem;
    }

    .badge {
        padding: 0.5em 1em;
    }

    .modal-dialog-centered {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
    }

    .btn {
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .btn-primary {
        background: #0d6efd;
        border: none;
    }

    .btn-primary:hover {
        background: #0b5ed7;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
</style>

<script>
    let table;

    $(document).ready(function() {
        table = $('#pekerjaanTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pekerjaan.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'posisi', name: 'posisi' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'tempat_bekerja', name: 'tempat_bekerja' },
                {
                    data: 'kategori',
                    name: 'kategori',
                    render: function(data) {
                        return `<span class="badge bg-info">${data}</span>`;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data) {
                        let badgeClass = data === 'active' ? 'bg-success' : 'bg-secondary';
                        return `<span class="badge ${badgeClass}">${data}</span>`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <div class="d-flex gap-2">
                                <button onclick="openModal(${row.id})" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button onclick="deletePekerjaan(${row.id})" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Cari...",
                processing: `<div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>`
            }
        });
    });

    function openModal(id = null) {
        if (id) {
            $.get(`/pekerjaan/${id}`, function(data) {
                $('#pekerjaanId').val(data.id);
                $('#id_user').val(data.id_user);
                $('#posisi').val(data.posisi);
                $('#deskripsi').val(data.deskripsi);
                $('#tanggal').val(data.tanggal);
                $('#tempat_bekerja').val(data.tempat_bekerja);
                $('#kategori').val(data.kategori);
                $('#status').val(data.status);
            });
        } else {
            $('#pekerjaanForm')[0].reset();
            $('#pekerjaanId').val('');
        }
        $('#pekerjaanModal').modal('show');
    }

    function savePekerjaan(event) {
        event.preventDefault();

        if (!event.target.checkValidity()) {
            event.stopPropagation();
            event.target.classList.add('was-validated');
            return;
        }

        let id = $('#pekerjaanId').val();
        let url = id ? `/pekerjaan/update/${id}` : "/pekerjaan/store";
        let method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                id_user: $('#id_user').val(),
                posisi: $('#posisi').val(),
                deskripsi: $('#deskripsi').val(),
                tanggal: $('#tanggal').val(),
                tempat_bekerja: $('#tempat_bekerja').val(),
                kategori: $('#kategori').val(),
                status: $('#status').val(),
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#pekerjaanModal').modal('hide');
                table.ajax.reload();

                // Show toast notification
                const toast = new bootstrap.Toast(document.createElement('div'));
                toast.show();

                const toastContainer = document.createElement('div');
                toastContainer.className = 'position-fixed bottom-0 end-0 p-3';
                toastContainer.style.zIndex = '11';

                toastContainer.innerHTML = `
                    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                ${response.message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                `;

                document.body.appendChild(toastContainer);
            }
        });
    }

    function deletePekerjaan(id) {
        if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
            $.ajax({
                url: `/pekerjaan/delete/${id}`,
                method: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function(response) {
                    table.ajax.reload();

                    // Show toast notification
                    const toastContainer = document.createElement('div');
                    toastContainer.className = 'position-fixed bottom-0 end-0 p-3';
                    toastContainer.style.zIndex = '11';

                    toastContainer.innerHTML = `
                        <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    ${response.message}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    `;

                    document.body.appendChild(toastContainer);
                }
            });
        }
    }
</script>
@endsection
