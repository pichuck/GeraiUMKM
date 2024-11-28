<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between w-100">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logoo.png') }}" alt="">
            <span class="d-none d-lg-block">SUPERADMIN</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex align-items-center ml-auto" style="margin-right: 20px;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</header>
