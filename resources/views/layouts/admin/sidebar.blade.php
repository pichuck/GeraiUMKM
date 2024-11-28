<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.dashboard') ? 'active' : '' }}" href="{{ route('superadmin.dashboard') }}">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.mahasiswa') ? 'active' : '' }}" href="{{ route('superadmin.mahasiswa') }}">
                <i class="bi bi-person"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.artikel.index') ? 'active' : '' }}" href="{{ route('superadmin.artikel.index') }}">
                <i class="bi bi-file-earmark-text"></i> <!-- Article icon -->
                <span>Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.umkm') ? 'active' : '' }}" href="{{ route('superadmin.umkm') }}">
                <i class="bi bi-shop"></i>
                <span>Umkm</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('pekerjaan.index') ? 'active' : '' }}" href="{{ route('pekerjaan.index') }}">
            <i class="bi bi-briefcase"></i> <!-- Updated icon -->
            <span>Project UMKM</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.chat') ? 'active' : '' }}" href="{{ route('superadmin.chat') }}">
                <i class="bi bi-chat-dots"></i>
                <span>Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.konsultasi') ? 'active' : '' }}" href="{{ route('superadmin.konsultasi') }}">
                <i class="bi bi-briefcase"></i>
                <span>Konsultasi Bisnis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.verifikasi') ? 'active' : '' }}" href="{{ route('superadmin.verifikasi') }}">
                <i class="bi bi-patch-check"></i>
                <span>Verifikasi UMKM</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('superadmin.manage') ? 'active' : '' }}" href="{{ route('superadmin.manage') }}">
            <i class="bi bi-award"></i>
            <span>Kelola Sertifikat Mahasiswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('password') ? 'active' : '' }}" href="{{ route('password') }}">
            <i class="bi bi-key"></i>
            <span>Ganti Password</span>
            </a>
        </li>
    </ul>
</aside>
<style>
     .nav-link.active {
        background: linear-gradient(to right, #0DBDE5, #2DB08B); /* Gradient background */
        color: white;
        border-radius: 5px; /* Add rounded corners */
        font-weight: bold; /* Make the text bold */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }
    .nav-link.active i {
        color: white; /* Ensure icon color matches text color */
    }
</style>
