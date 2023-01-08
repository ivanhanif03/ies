<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>

                    <div class="card-body">
                        <form action="<?= url_to('register') ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email') ?>" autocomplete="off" autofocus>
                                </div>
                                <div class="form-group col-6">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" value="<?= old('name') ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-6">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" nname="phone" value="<?= old('phone') ?>" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="pass_confirm" class="d-block">Password Confirmation</label>
                                    <input id="pass_confirm" type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
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