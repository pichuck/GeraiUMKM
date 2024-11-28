@extends('layouts.umkm.app')

@section('title', 'Project')

@section('content')
    <section class="section dashboard">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">{{ $pekerjaan->where('status', 'active')->count() }}</h3>
                            <p class="fs-5">Active Projects</p>
                        </div>
                        <i class="fas fa-project-diagram fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2">{{ $pekerjaan->where('status', 'archive')->count() }}</h3>
                            <p class="fs-5">Archived Projects</p>
                        </div>
                        <i class="fas fa-archive fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header project-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-project-diagram fs-2 me-3 text-primary"></i>
                                <h3 class="fs-4 mb-0 fw-bold text-white">Project List</h3>
                            </div>
                            <a href="{{ route('umkm.pekerjaan.create') }}" class="btn btn-add-project">
                                <i class="fas fa-plus-circle me-2"></i>Add New Project
                            </a>
                        </div>
                        <div class="card-body mt-3">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-active-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-active" type="button" role="tab"
                                        aria-controls="pills-active" aria-selected="true">Active Projects</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-archived-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-archived" type="button" role="tab"
                                        aria-controls="pills-archived" aria-selected="false">Archived Projects</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-active" role="tabpanel"
                                    aria-labelledby="pills-active-tab">
                                    <div class="table-responsive">
                                        <table id="activeTable" class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Position</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Workplace</th>
                                                    <th>Category</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pekerjaan->where('status', 'active') as $data)
                                                    <tr>
                                                        <td>{{ $data->posisi }}</td>
                                                        <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                                                        </td>
                                                        <td>{{ $data->tempat_bekerja }}</td>
                                                        <td><span class="badge bg-primary">{{ $data->kategori }}</span></td>
                                                        <td>
                                                            <a href="{{ route('umkm.pekerjaan.show', $data->id) }}"
                                                                class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                                                title="View Details">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('umkm.pekerjaan.edit', $data->id) }}"
                                                                class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('umkm.pekerjaan.archive', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm btn-secondary"
                                                                    data-bs-toggle="tooltip" title="Archive"
                                                                    onclick="return confirm('Are you sure you want to archive this project?')">
                                                                    <i class="fas fa-archive"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('umkm.pekerjaan.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="tooltip" title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this project?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-archived" role="tabpanel"
                                    aria-labelledby="pills-archived-tab">
                                    <div class="table-responsive">
                                        <table id="archivedTable" class="table table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Position</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Workplace</th>
                                                    <th>Category</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pekerjaan->where('status', 'archive') as $data)
                                                    <tr>
                                                        <td>{{ $data->posisi }}</td>
                                                        <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d M Y') }}
                                                        </td>
                                                        <td>{{ $data->tempat_bekerja }}</td>
                                                        <td><span class="badge bg-secondary">{{ $data->kategori }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('umkm.pekerjaan.show', $data->id) }}"
                                                                class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                                                title="View Details">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('umkm.pekerjaan.unarchive', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm btn-success"
                                                                    data-bs-toggle="tooltip" title="Unarchive"
                                                                    onclick="return confirm('Are you sure you want to unarchive this project?')">
                                                                    <i class="fas fa-box-open"></i>
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="{{ route('umkm.pekerjaan.destroy', $data->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="tooltip" title="Delete"
                                                                    onclick="return confirm('Are you sure you want to delete this project?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .primary-text {
            color: #009688;
        }

        .secondary-bg {
            background-color: #c8e6c9;
        }

        .nav-pills .nav-link.active {
            background-color: #009688;
        }

        /* .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        } */

        .card-header {
            border-radius: 10px 10px 0 0;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f8e9;
        }

        .badge {
            font-size: 0.8rem;
        }

        .project-header {
            background: linear-gradient(135deg, #0DBDE5 0%, #2DB08B 100%);
            padding: 1.5rem;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .project-header h3 {
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .btn-add-project {
            background-color: #ffffff;
            color: #6a11cb;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-add-project:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#activeTable, #archivedTable').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search projects..."
                }
            });

            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
