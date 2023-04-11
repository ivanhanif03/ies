<div class="main-sidebar ">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">IES PORTAL</a>
</div>
        <div class="sidebar-brand sidebar-brand-sm ">
            <a href="<?= base_url() ?>">IP</a>
        </div>
        <ul class="sidebar-menu">
            <!-- DASHBOARD -->
            <li class="menu-header">HOME</li>
            <li class="<?php if ($menu == 'home') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

            <!-- START SECTION DATA MASTER -->

            <!-- USER -->
            <?php if (in_groups('admin')) : ?>
                <li class="<?php if ($menu == 'users') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('user') ?>"><i class="fas fa-user"></i> <span>User</span></a></li>
            <?php endif; ?>

            <?php if (in_groups('operator') || in_groups('admin')) : ?>
                <li class="menu-header">Data Master</li>
                <!-- OS -->
                <li class="<?php if ($menu == 'os') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('os') ?>"><i class="fab fa-windows"></i> <span>Operating System</span></a></li>

                <!-- APLIKASI -->
                <li class="<?php if ($menu == 'apps') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('apps') ?>"><i class="fas fa-rocket"></i> <span>Aplikasi</span></a></li>

                <!-- RAK SERVER -->
                <li class="<?php if ($menu == 'rak') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('rak') ?>"><i class="fas fa-th"></i> <span>Rak Server</span></a></li>

                <!-- VENDOR -->
                <li class="<?php if ($menu == 'vendor') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('vendor') ?>"><i class="fas fa-users-cog"></i> <span>Vendor</span></a></li>
                <!-- Cluster -->
                <li class="<?php if ($menu == 'cluster') {
                                echo 'active';
                            } ?>"><a class="nav-link" href="<?= base_url('cluster') ?>"><i class="fas fa-th-list"></i><span>Cluster VM</span></a></li>
                <!-- END SECTION DATA MASTER -->
            <?php endif; ?>


            <!-- START SECTION SERVER -->
            <li class="menu-header">Head Office</li>
            <!-- SERVER FISIK -->
            <li class="<?php if ($menu == 'fisik') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('serverfisik') ?>"><i class="fas fa-server"></i> <span>Baremetal</span></a></li>
            <!-- VIRTUAL MACHINE -->
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('virtualmachine') ?>"><i class="fas fa-cloud"></i> <span>Virtual Machine</span></a></li>
            <!-- END SECTION SERVER -->

     <!-- START SECTION SERVER -->
<li class="menu-header">Branch Infrastructure</li>
<!-- SERVER FISIK -->

     <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-server"></i></i> <span>Server</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('virtualmachine') ?>">Server</a></li>
                <li><a class="nav-link" href="<?= base_url('virtualmachine') ?>">Switch</a></li>
                <li><a class="nav-link" href="<?= base_url('virtualmachine') ?>">Router</a></li>
                <li><a class="nav-link" href="<?= base_url('virtualmachine') ?>">UPS</a></li>
              </ul>
            </li>


            <!-- PC -->
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('virtualmachine') ?>"><i class="fas fa-cloud"></i> <span>PC</span></a></li>
            <!-- END SECTION PC -->
            <!-- Printer -->
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('virtualmachine') ?>"><i class="fas fa-cloud"></i> <span>Printer</span></a></li>
            <!-- END SECTION Printer -->
            <!-- PINPAD -->
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('virtualmachine') ?>"><i class="fas fa-cloud"></i> <span>PINPAD Machine</span></a></li>
            <!-- END SECTION PINPAD -->                
            <!-- Genset -->
            <li class="<?php if ($menu == 'vm') {
                            echo 'active';
                        } ?>"><a class="nav-link" href="<?= base_url('virtualmachine') ?>"><i class="fas fa-cloud"></i> <span>Genset Machine</span></a></li>
            <!-- END SECTION Genset -->

        </ul>
    </aside>
</div>