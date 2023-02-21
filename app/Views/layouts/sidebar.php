<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">IES PORTAL</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url() ?>">IP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php if ($menu == 'home') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

            <!-- DATA MASTER -->
            <li class="menu-header">Data Master</li>
            <li class="<?php if ($menu == 'users') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('user') ?>"><i class="fas fa-user"></i> <span>User</span></a></li>

            <li class="<?php if ($menu == 'apps') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('apps') ?>"><i class="fas fa-rocket"></i> <span>Aplikasi</span></a></li>
            <li class="<?php if ($menu == 'rak') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('rak') ?>"><i class="fas fa-th"></i> <span>Rak Server</span></a></li>
            <li class="<?php if ($menu == 'vendor') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('vendor') ?>"><i class="fas fa-users-cog"></i> <span>Vendor</span></a></li>

            <!-- SERVER -->
            <li class="menu-header">Server</li>
            <li class="<?php if ($menu == 'fisik') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('serverfisik') ?>"><i class="fas fa-server"></i> <span>Baremetal</span></a></li>
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('serverfisik') ?>"><i class="fas fa-cloud"></i> <span>Virtual Machine</span></a></li>

        </ul>
    </aside>
</div>