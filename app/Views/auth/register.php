<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Register</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User List</a></div>
            <div class="breadcrumb-item">Register</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= url_to('register') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email') ?>" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" value="<?= old('name') ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" name="phone" value="<?= old('phone') ?>" maxlength="13" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="pass_confirm" class="d-block">Password Confirmation</label>
                                    <input id="pass_confirm" type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-md">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-primary btn-md ml-1">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>

</script>
<?= $this->endSection(); ?>