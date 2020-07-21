<!-- Sidebar -->
<ul class="navbar-nav bg-hijau sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laboratorium Ipa <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('home','/')? 'active':'' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ Request::is('barang*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('barang.index') }}">
            <i class="fas fa-fw fa-flask"></i>
            <span>Barang</span></a>
    </li>
    <li class="nav-item {{ Request::is('pemakaian-barang*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('pemakaian-barang.index') }}">
            <i class="fas fa-flask "></i>
            <span>Pemakaian barang</span></a>
    </li>
    @role('admin')
    <li class="nav-item {{ Request::is('pemusnahan-barang*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('pemusnahan-barang.index') }}">
            <i class="fas fa-trash "></i>
            <span>Pemusnahan barang</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::is('kelas*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('kelas.index') }}">
            <i class="fas fa-university "></i>
            <span>Kelas</span></a>
    </li>
    <li class="nav-item {{ Request::is('jadwal*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('jadwal.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Lab</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::is('user*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-user-alt "></i>
            <span>User</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ Request::is('laporan*')? 'active':'' }}">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-file-alt    "></i>
            <span>Laporan</span></a>
    </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
