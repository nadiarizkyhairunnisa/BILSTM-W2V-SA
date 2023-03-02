<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-1">BiLSTM-W2V-SA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Route::is('index') ? 'active' : '' }}">
        <a href="{{ route('index') }}"class="nav-link">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item {{ Route::is('demo') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('demo') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Demo</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider" />
    <!-- Divider -->

    <!-- Heading -->
    <div class="sidebar-heading">Dokumentasi</div>
    <li class="nav-item {{ Route::is('dataset') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dataset') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dataset</span></a>
    </li>
    <li class="nav-item {{ Route::is('modeling') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('modeling') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Modeling</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" />
</ul>
<!-- End of Sidebar -->
