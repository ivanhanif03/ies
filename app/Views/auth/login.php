<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; IES Portal</title>
    <link rel="icon" href="<?= base_url('img/ies_icon.png') ?>">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/node_modules/bootstrap-social/bootstrap-social.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/css/components.css') ?>">
</head>

<body>
    <main id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="<?= base_url('img/ies_icon.png') ?>" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">IES Portal</span></h4>
                        <p class="text-muted">Bank BTN's IT infrastructure data website. Before you get started, you must login first.</p>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form method="post" action="<?= url_to('login') ?>" class="needs-validation" novalidate="">
                            <?= csrf_field() ?>
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="form-group mb-3">
                                    <label for="login"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group mb-3">
                                    <label for="login"><?= lang('Auth.email') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-group mb-3">
                                <label for="password"><?= lang('Auth.password') ?></label>
                                <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                            <div class="form-group text-right">
                                <!--<a href="<?= url_to('forgot') ?>" class="float-left mt-3">
                                    Forgot Password?
                                </a> 
                                        -->
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; 2023. Made with 💙 by IES.
                            <!-- <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('img/login_bg.jpg') ?>">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Menara Bank BTN </h1>
                                <h5 class="font-weight-normal text-muted-transparent">Jl. Gajahmada No 1</h5>
                                <h5 class="font-weight-normal text-muted-transparent">Jakarta Pusat - DKI Jakarta 10130</h5>
                            </div>
                            <!-- Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- General JS Scripts -->
    <script src="<?= base_url('stisla/modules/jquery/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('stisla/modules/popper/popper.min.js') ?>"></script>
    <script src="<?= base_url('stisla/modules/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('stisla/modules/jquery/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= base_url('stisla/modules/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('stisla/js/stisla.css') ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/js/scripts.js') ?>"></script>
    <script src="<?= base_url('stisla/js/custom.css') ?>"></script>

    <!-- Page Specific JS File -->
</body>

</html>