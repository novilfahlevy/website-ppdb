<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/small-logo.png') }}" alt="{{ config('app.name') }}" width="32">
        </div>
        <div class="sidebar-brand-text">
            <img src="{{ asset('assets/logo.png') }}" alt="{{ config('app.name') }}" class="img-fluid">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->routeIs('registrations.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('registrations.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pendaftaran</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->routeIs('fees.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('fees.index') }}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Biaya Pendaftaran</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->routeIs('registrations.archived.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('registrations.archived.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Arsip Pendaftaran</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengguna</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
