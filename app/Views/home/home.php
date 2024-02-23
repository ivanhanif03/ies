<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Portal IES | <?= ucfirst($menu); ?></title>
    <link rel="icon" href="<?= base_url('img/ies_icon.png') ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('stisla/fontawesome-free-5.15.4-web/css/all.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap-timepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/selectric/selectric.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/select.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/chocolat/dist/css/chocolat.css') ?>">


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/css/components.css') ?>">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="#" class="navbar-brand sidebar-gone-hide">IVAN PORTAL</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a href="#" class="nav-link">Inventory Infrastructure Application and Network</a></li>
                    </ul>
                </div>
                <form class="form-inline mr-auto">
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('img/profile_icon.png') ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= user()->name; ?> - <?= user()->department; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('user/changeSelfPassword') . '/' . user()->id ?>" class="dropdown-item has-icon">
                                <i class="fas fa-key text-warning"></i> Ganti Password
                            </a>
                            <hr>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">

                </div>
            </nav>

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <h2 class="section-title">ITOD</h2>
                        <div class="row">
                            <a href="<?= base_url('ies') ?>">
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image" data-background="https://images.unsplash.com/photo-1560732488-6b0df240254a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-category"><a href="#">Data Terbaru</a>
                                                <div class="bullet"></div> <a href="#">5 </a>
                                            </div>
                                            <div class="article-title">
                                                <h2><a href="<?= base_url('ies') ?>">Infrastructure Enterprise System (IES)</a></h2>
                                            </div>
                                            <p>Data infrastruktur terkait Server Fisik, Server VM, Server Cloud dan Infra Branch.</p>
                                        </div>
                                    </article>
                                </div>
                            </a>
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <div class="article-image" data-background="https://images.unsplash.com/photo-1606765962248-7ff407b51667?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-category"><a href="#">Data Terbaru</a>
                                            <div class="bullet"></div> <a href="#">5 </a>
                                        </div>
                                        <div class="article-title">
                                            <h2><a href="<?= base_url('nop') ?>">Network Operation (NOP)</a></h2>
                                        </div>
                                        <p>Perangkat jaringan yang ada di Data Center dan Branch.</p>
                                    </div>
                                </article>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4">
                                <article class="article article-style-c">
                                    <div class="article-header">
                                        <div class="article-image" data-background="https://images.unsplash.com/photo-1617529497471-9218633199c0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-category"><a href="#">Data Terbaru</a>
                                            <div class="bullet"></div> <a href="#">5 </a>
                                        </div>
                                        <div class="article-title">
                                            <h2><a href="#">Aplication Support, Database and Change Management (ACM)</a></h2>
                                        </div>
                                        <p>Operasional aplikasi, pengelolaan Database dan Deployment Change Management.</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!-- General JS Scripts -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
        <script src="<?= base_url('stisla/modules/jquery/jquery-3.3.1.min.js') ?>"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
        <script src="<?= base_url('stisla/modules/popper/popper.min.js') ?>"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
        <script src="<?= base_url('stisla/modules/bootstrap/bootstrap.min.js') ?>"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
        <script src="<?= base_url('stisla/modules/jquery/jquery.nicescroll.min.js') ?>"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
        <script src="<?= base_url('stisla/modules/moment/moment.min.js') ?>"></script>
        <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
        <script src="<?= base_url('stisla/js/stisla.js') ?>"></script>

        <!-- JS Libraies -->
        <script src="<?= base_url('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/datatables/datatables.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/bootstrap/daterangepicker.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/bootstrap/bootstrap-timepicker.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/datatables/dataTables.bootstrap4.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/datatables/dataTables.select.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/jquery-ui/jquery-ui.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/select2/select2.full.min.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/selectric/jquery.selectric.min.js') ?>"></script>

        <!-- Template JS File -->
        <script src="<?= base_url('stisla/js/scripts.js') ?>"></script>
        <script src="<?= base_url('stisla/modules/chart.js/chart.js') ?>"></script>
        <script src="<?= base_url('stisla/js/custom.js') ?>"></script>

        <!-- Custom JS -->
        <script>
            //Time Alert
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        </script>

        <script type="text/javascript">
            document.onkeydown = function(e) {
                if (event.keyCode == 123) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }

            }
        </script>

        <!-- Page Specific JS File -->
        <?= $this->renderSection('script'); ?>
</body>

</html>