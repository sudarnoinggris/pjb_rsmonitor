<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="sidebar-brand-icon rotate-n-0">

        <img class="img-profile" src="<?= base_url('assets/img/logo.png') //. $this->session->userdata('image'); ?>" width=50px height=20px>
        </div>
        <div class="sidebar-brand-text mx-2">Monitoring</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($title == 'Dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
       <!-- Heading -->
    <div class="sidebar-heading">
        SYSTEM
    </div>

    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('user') ?>">
            <i class="fas fa-user"></i>
            <span>Users</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        MASTER DATA
    </div>
 
    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('distrik') ?>">
            <i class="fas fa-industry"></i>
            <span>Distrik</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('pegawai') ?>">
            <i class="fas fa-users"></i>
            <span>Pegawai</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('pasien') ?>">
            <i class="fas fa-user-md"></i>
            <span>Tertanggung</span></a>
    </li>   
    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('rs') ?>">
            <i class="fa fa-hospital"></i>
            <span>Rumah Sakit</span></a>
    </li>
 
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Monitoring
    </div>

    <!-- Nav Item - Pembelian -->
    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url('validasi'); ?>">
            <i class="fas fa-medkit"></i>
            <span>Validasi Pasien</span></a>
    </li>

   
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

   

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->