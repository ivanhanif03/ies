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
            <li class="menu-header">Data Master</li>
            <li class="<?php if ($menu == 'users') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('user') ?>"><i class="fas fa-user"></i> <span>Users</span></a></li>
            <li class="<?php if ($menu == 'apps') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('app') ?>"><i class="fas fa-rocket"></i> <span>Apps</span></a></li>
            <li class="dropdown <?php if (($menu == 'vm') || ($menu == 'fisik')) {
                                    echo 'active';
                                } ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Server</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if ($menu == 'vm') {
                                    echo 'active';
                                } ?>"><a class="nav-link" href="<?= base_url('app') ?>">Virtual Machine</a></li>
                    <li class="<?php if ($menu == 'fisik') {
                                    echo 'active';
                                } ?>"><a class="nav-link" href="<?= base_url('serverfisik') ?>">Fisik</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>