<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User List</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card-body">
                        <form action="<?= base_url('user/update') . '/' . $user['id']; ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= $user['email']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= $user['username']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" name="name" value="<?= $user['name']; ?>">
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control <?php if (session('errors.phone')) : ?>is-invalid<?php endif ?>" name="phone" value="<?= $user['phone']; ?>" maxlength="13" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <a href="<?= base_url('user') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-md">
                                    Update
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