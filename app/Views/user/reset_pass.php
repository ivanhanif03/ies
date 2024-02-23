<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Reset Password User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User List</a></div>
            <div class="breadcrumb-item">Reset Password | <?= $user['username'] ?></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <!-- Aler Start -->
            <?= view('Myth\Auth\Views\_message_block') ?>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert" id="alert-delete">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <!-- Aler End -->
            <div class="col-lg-6 col-sm-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="<?= base_url('user/setPassword') . '/' . $user['id']; ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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