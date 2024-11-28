@extends('layouts.umkm.app')

@section('title', 'Konsultasi')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12"> <!-- Changed from col-md-10 to col-md-12 -->
                    <div class="card w-100"> <!-- Added w-100 to make the card full width -->
                        <div class="card-header">
                            <h2 class="card-title">Konsultasi Bisnis dengan ahlinya UMKM</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill me-2" style="font-size: 1.5rem;"></i>
                                    <div>
                                        {{ session('success') }}
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                            <div class="card-body">
                                <form action="{{ route('umkm.konsultasi.store') }}" method="POST">
                                    @csrf
                                    <!-- Step navigation (Tabs) -->
                                    <ul class="nav nav-tabs mb-3" id="konsultasiTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="step1-tab" data-bs-toggle="tab"
                                                data-bs-target="#step1" type="button" role="tab" aria-controls="step1"
                                                aria-selected="true">Informasi Bisnis</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="step2-tab" data-bs-toggle="tab"
                                                data-bs-target="#step2" type="button" role="tab" aria-controls="step2"
                                                aria-selected="false">Detail
                                                Identitas</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="step3-tab" data-bs-toggle="tab"
                                                data-bs-target="#step3" type="button" role="tab" aria-controls="step3"
                                                aria-selected="false">Masalah Bisnis</button>
                                        </li>
                                    </ul>

                                    <!-- Tab Content -->
                                    <div class="tab-content" id="konsultasiTabsContent">
                                        <!-- Step 1: Informasi Bisnis -->
                                        <div class="tab-pane fade show active" id="step1" role="tabpanel"
                                            aria-labelledby="step1-tab">
                                            <div class="mb-3">
                                                <label for="status_aktivitas_bisnis" class="form-label">Status Aktivitas
                                                    Bisnis</label>
                                                <select name="status_aktivitas_bisnis" class="form-select">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="tidak_aktif">Tidak Aktif</option>
                                                    <option value="Belum">Belum</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="nama_pelaku_bisnis" class="form-label">Nama Pelaku
                                                    Bisnis</label>
                                                <input type="text" name="nama_pelaku_bisnis" class="form-control"
                                                    required>
                                            </div>

                                            <button type="button" class="btn btn-primary next-step">Next</button>
                                        </div>

                                        <!-- Step 2: Detail Identitas -->
                                        <div class="tab-pane fade" id="step2" role="tabpanel"
                                            aria-labelledby="step2-tab">
                                            {{-- <div class="mb-3">
                                                <label for="tipe_identitas" class="form-label">Tipe Identitas</label>
                                                <select name="tipe_identitas" class="form-select">
                                                    <option value="NIK">NIK</option>
                                                    <option value="NPWP">NPWP</option>
                                                    <option value="NIB">NIB</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="no_identitas" class="form-label">Nomor Identitas</label>
                                                <input type="number" name="no_identitas" class="form-control" required>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" required>
                                            </div>

                                            {{-- <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <select name="provinsi" id="provinsi" class="form-control" required>
                                                        <option value="">Pilih Provinsi</option>

                                                        <!-- Tambahkan provinsi lainnya -->
                                                    </select>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="kota" class="form-label">Kota</label>
                                                    <select name="kota" id="kota" class="form-control" required>
                                                        <option value="">Pilih Kota</option>
                                                    </select>
                                                </div>

                                            </div> --}}

                                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                                            <button type="button" class="btn btn-primary next-step">Next</button>
                                        </div>

                                        <!-- Step 3: Masalah Bisnis -->
                                        <div class="tab-pane fade" id="step3" role="tabpanel"
                                            aria-labelledby="step3-tab">

                                            <div class="mb-3">
                                                <label for="kendala_bisnis" class="form-label">Kendala Bisnis</label>
                                                <select name="kendala_bisnis" id="kendala_bisnis" class="form-control">
                                                    <option value="Permodalan">Permodalan</option>
                                                    <option value="Perijinan dan Administrasi">Perijinan dan Administrasi
                                                    </option>
                                                    <option value="Bahan Baku Produksi">Bahan Baku Produksi</option>
                                                    <option value="Proses Produksi">Proses Produksi</option>
                                                    <option value="Pemasaran">Pemasaran</option>
                                                    <option value="Pengangkutan">Pengangkutan</option>
                                                    <option value="Edukasi/Pelatihan">Edukasi / Pelatihan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="detail_kendala_bisnis" class="form-label">Detail Kendala
                                                    Bisnis</label>
                                                <textarea name="detail_kendala_bisnis" class="form-control" rows="3" required></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="kategori_kebutuhan" class="form-label">Kategori
                                                    Kebutuhan</label>
                                                <select name="kategori_kebutuhan" id="kategori_kebutuhan"
                                                    class="form-control">
                                                    <option value="Permodalan">Permodalan</option>
                                                    <option value="Perijinan dan Administrasi">Perijinan dan Administrasi
                                                    </option>
                                                    <option value="Bahan Baku Produksi">Bahan Baku Produksi</option>
                                                    <option value="Proses Produksi">Proses Produksi</option>
                                                    <option value="Pemasaran">Pemasaran</option>
                                                    <option value="Pengangkutan">Pengangkutan</option>
                                                    <option value="Edukasi/Pelatihan">Edukasi / Pelatihan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi_masalah" class="form-label">Deskripsi
                                                    Masalah</label>
                                                <textarea name="deskripsi_masalah" class="form-control" rows="3" required></textarea>
                                            </div>

                                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const nextButtons = document.querySelectorAll('.next-step');
                const prevButtons = document.querySelectorAll('.prev-step');
                const tabLinks = document.querySelectorAll('.nav-link');

                nextButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        let activeTab = document.querySelector('.nav-link.active');
                        let nextTab = activeTab.parentElement.nextElementSibling?.querySelector(
                            '.nav-link');
                        if (nextTab) {
                            bootstrap.Tab.getOrCreateInstance(nextTab).show();
                        }
                    });
                });

                prevButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        let activeTab = document.querySelector('.nav-link.active');
                        let prevTab = activeTab.parentElement.previousElementSibling?.querySelector(
                            '.nav-link');
                        if (prevTab) {
                            bootstrap.Tab.getOrCreateInstance(prevTab).show();
                        }
                    });
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const provinsiSelect = document.getElementById('provinsi');
                const kotaSelect = document.getElementById('kota');
                const kecamatanSelect = document.getElementById('kecamatan');

                let selectedProvinceName = ''; // Variable to store the selected province name
                let selectedKotaName = ''; // Variable to store the selected city name
                let selectedKecamatanName = ''; // Variable to store the selected district name

                // Load provinces
                fetch('/api/provinces')
                    .then(response => response.json())
                    .then(data => {
                        provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                        data.forEach(province => {
                            provinsiSelect.innerHTML +=
                                `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                        });
                    });

                // Load cities (regencies) based on selected province
                provinsiSelect.addEventListener('change', function() {
                    const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute(
                        'data-id');
                    selectedProvinceName = this.value; // Store selected province name
                    if (provinceId) {
                        fetch(`/api/regencies/${provinceId}`)
                            .then(response => response.json())
                            .then(data => {
                                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                                data.forEach(regency => {
                                    kotaSelect.innerHTML +=
                                        `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
                                });
                                kecamatanSelect.innerHTML =
                                    '<option value="">Pilih Kecamatan</option>'; // Reset kecamatan
                            });
                    } else {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    }
                });

                // Load districts based on selected city (regency)
                kotaSelect.addEventListener('change', function() {
                    const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
                    selectedKotaName = this.value; // Store selected city name
                    if (regencyId) {
                        fetch(`/api/districts/${regencyId}`)
                            .then(response => response.json())
                            .then(data => {
                                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                                data.forEach(district => {
                                    kecamatanSelect.innerHTML +=
                                        `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                                });
                            });
                    } else {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    }
                });

                // Store selected district name
                kecamatanSelect.addEventListener('change', function() {
                    selectedKecamatanName = this.value;
                });

                // Assuming you have a form submission or some event where you send the data
                document.getElementById('submit-button').addEventListener('click', function() {
                    const formData = {
                        province_name: selectedProvinceName,
                        city_name: selectedKotaName,
                        district_name: selectedKecamatanName
                    };

                    // Now you can send formData to your server via fetch or AJAX
                    console.log(formData); // This is where you'd actually send the data to your server
                });
            });
        </script>
    </section>

@endsection
