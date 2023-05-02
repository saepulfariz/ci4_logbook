<?php

$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);
$segment2 = $request->uri->getSegment(2);

?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LOGBOOK <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url(); ?>dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item <?= ($segment == 'logbook') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url(); ?>logbook">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>LogBook</span></a>
    </li>

    <?php if (session()->get('id_role') == 1) : ?>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?= ($segment == 'user') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url(); ?>user">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelola User</span></a>
        </li>


        <li class="nav-item <?= ($segment == 'kategori') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= base_url(); ?>kategori">
                <i class="fas fa-fw fa-tags"></i>
                <span>Kelola Kategori</span></a>
        </li>
    <?php else : ?>

    <?php endif; ?>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>