<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Role</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User List</a></div>
            <div class="breadcrumb-item">Role</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <div class="card-body">
                        <form action="<?= base_url('user/updateRole') . '/' . $role['user_id']; ?>" method="POST">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="username">Username</label>
                                    <input id="username" type="username" class="form-control" name="username" value="<?= $role['username']; ?>" readonly>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Role</label>
                                    <select class="form-control select2bs4 text-sm" name="role" id="role" style="width: 100%;">
                                        <?php foreach ($group as $g) : ?>
                                            <option value="<?= $g['id']; ?>" <?php if ($g['name'] == $role['name']) : ?>selected<?php endif; ?>>
                                                <?= $g['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <a href="<?= base_url('user') ?>" class="btn btn-md btn-secondary mr-1">Batal</a>
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