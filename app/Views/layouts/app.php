<!-- Header -->
<?= $this->include('layouts/header'); ?>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Navbar -->
            <?= $this->include('layouts/navbar'); ?>

            <!-- Sidebar -->
            <?= $this->include('layouts/sidebar'); ?>
        </div>

        <div class="main-content">
            <!-- Content -->
            <?= $this->renderSection('content'); ?>
        </div>
        <!-- Footer -->
        <?= $this->include('layouts/footer'); ?>
    </div>

</body>

</html>