<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.index') ? 'active' : '' }}" href="{{ route('umkm.index') }}">
                <i class="bi bi-grid"></i> <!-- Dashboard icon -->
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.artikel.index') ? 'active' : '' }}" href="{{ route('umkm.artikel.index') }}">
                <i class="bi bi-file-earmark-text"></i> <!-- Article icon -->
                <span>Artikel</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('lamaran.index') ? 'active' : '' }}" href="{{ route('lamaran.index') }}">
                <i class="bi bi-briefcase"></i> <!-- Job Application icon -->
                <span>Lamaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.chat') ? 'active' : '' }}" href="{{ route('umkm.chat') }}">
                <i class="bi bi-chat-dots"></i> <!-- Chat icon -->
                <span>Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.chatbot') ? 'active' : '' }}" href="{{ route('umkm.chatbot') }}">
                <i class="bi bi-robot"></i> <!-- ChatBot icon -->
                <span>ChatBot</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.pekerjaan.index') ? 'active' : '' }}" href="{{ route('umkm.pekerjaan.index') }}">
                <i class="bi bi-kanban"></i> <!-- Project icon -->
                <span>Project</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.konsultasi.index') ? 'active' : '' }}" href="{{ route('umkm.konsultasi.index') }}">
                <i class="bi bi-person-lines-fill"></i> <!-- Consultation icon -->
                <span>Konsultasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('umkm.manage') ? 'active' : '' }}" href="{{ route('umkm.manage') }}">
            <i class="bi bi-tools"></i> <!-- Manage Project icon -->
            <span>Manage Project</span>
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
