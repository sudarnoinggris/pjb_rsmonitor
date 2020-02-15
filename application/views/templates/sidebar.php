<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
        <div class="sidebar-brand-icon rotate-n-0">
            <i class="fas fa-store-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pajangan Batu Persada</div>
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
        MASTER DATA
    </div>
    <li class="nav-item <?php if ($title == 'User') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('user') ?>">
            <i class="fas fa-user"></i>
            <span>User</span></a>
    </li>

    <li class="nav-item <?php if ($title == 'Items') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('items') ?>">
            <i class="fas fa-box-open"></i>
            <span>Items</span></a>
    </li>

    <li class="nav-item <?php if ($title == 'Category') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('category') ?>">
            <i class="fas fa-layer-group"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item <?php if ($title == 'Satuan') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('uom') ?>">
            <i class="fab fa-itch-io"></i>
            <span>UOM</span></a>
    </li>
    <li class="nav-item <?php if ($title == 'Kontak') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('kontak'); ?>">
            <i class="fas fa-id-card"></i>
            <span>Kontak</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        TRANSAKSI
    </div>

    <!-- Nav Item - Pembelian -->
    <li class="nav-item <?php if ($title == 'Purchase') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('purchase'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Purchase</span></a>
    </li>

    <!-- Nav Item - produksi -->
    <li class="nav-item <?php if ($title == 'Production') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('production'); ?>">
            <i class="fas fa-industry"></i>
            <span>Production</span></a>
    </li>


    <!-- Nav Item - sales -->
    <li class="nav-item <?php if ($title == 'Sales') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('sales'); ?>">
            <i class="fas fa-money-bill-wave"></i>
            <span>Sales</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        LAPORAN
    </div>

    <!-- Nav Item - Pembelian -->
    <li class="nav-item <?php if ($title == 'Stock') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('stock'); ?>">
            <i class="fas fa-shopping-cart"></i>
            <span>Stock</span></a>
    </li>
    <!-- Nav Item - Penjualan -->
    <li class="nav-item <?php if ($title == 'Laporan Sales') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('lapsales'); ?>">
            <i class="fas fa-money-bill-wave"></i>
            <span>Penjualan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->