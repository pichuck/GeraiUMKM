@extends('layouts.admin.app')

@section('title', 'Dashboard POS UMKM')

@section('content')
<section class="section dashboard">
    <!-- Banner Section -->
    <div class="banner mb-4">
        <img src="{{ asset('assets/img/banner_pos_umkm.png') }}" alt="POS UMKM Banner" class="img-fluid rounded">
        <div class="banner-text">
            <h1 class="fw-bold text-white">POS UMKM</h1>
            <p class="lead text-white">Menghubungkan Mahasiswa dengan UMKM untuk Meningkatkan Ekosistem Bisnis</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="row">
        <!-- UMKM Card -->
        <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
            <div class="card info-card umkm-card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="card-icon bg-success text-white">
                                <i class="bi bi-shop fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="card-title mb-2">UMKM Terdaftar</h5>
                            <div class="d-flex align-items-center">
                                <h3 class="mb-0 me-3">
                                    {{ App\Models\umkm::count() }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mahasiswa Card -->
        <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
            <div class="card info-card students-card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="card-icon bg-info text-white">
                                <i class="bi bi-person-check fs-1"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="card-title mb-2">Mahasiswa Terlibat</h5>
                            <h3 class="mb-0">
                                {{ App\Models\mahasiswa::count() }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #1cc88a;
        --info-color: #36b9cc;
        --light-bg: #f8f9fc;
    }

    .dashboard {
        background-color: var(--light-bg);
        padding: 2rem 0;
    }

    .banner {
        position: relative;
        text-align: center;
        color: white;
        overflow: hidden;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .banner img {
        width: 100%;
        height: auto;
        object-fit: cover;
        filter: brightness(0.7);
        transition: transform 0.3s ease;
    }

    .banner:hover img {
        transform: scale(1.05);
    }

    .banner-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        padding: 0 1rem;
    }

    .info-card {
        background-color: #ffffff;
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .umkm-card .card-icon {
        background-color: var(--secondary-color);
    }

    .students-card .card-icon {
        background-color: var(--info-color);
    }

    .card-title {
        color: #5a5c69;
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .card h3 {
        color: #5a5c69;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .banner-text h1 {
            font-size: 1.5rem;
        }

        .banner-text p {
            font-size: 1rem;
        }
    }
</style>
@endsection
