<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Vendor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Vendor</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('vendor/update') . '/' . $vendor['id']; ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_vendor" class="font-weight-bolder">Nama Vendor</label>
                                    <input id="nama_vendor" type="text" class="form-control <?php if (session('errors.nama_vendor')) : ?>is-invalid<?php endif ?>" name="nama_vendor" value="<?= $vendor['nama_vendor']; ?>" placeholder="Masukkan nama vendor">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_vendor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= $vendor['alamat']; ?>" placeholder="Masukkan alamat vendor">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="pic">PIC</label>
                                    <input id="pic" type="text" class="form-control <?php if (session('errors.pic')) : ?>is-invalid<?php endif ?>" name="pic" value="<?= $vendor['pic']; ?>" placeholder="Masukkan nama pic">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pic'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk_phone">PIC Phone</label>
                                    <input id="pic_phone" type="text" class="form-control <?php if (session('errors.pic_phone')) : ?>is-invalid<?php endif ?>" name="pic_phone" value="<?= $vendor['pic_phone']; ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pic_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk">Helpdesk</label>
                                    <input id="helpdesk" type="text" class="form-control <?php if (session('errors.helpdesk')) : ?>is-invalid<?php endif ?>" name="helpdesk" value="<?= $vendor['helpdesk']; ?>" placeholder="Masukkan nama helpdesk">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('helpdesk'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk_phone">Helpdesk Phone</label>
                                    <input id="helpdesk_phone" type="text" class="form-control <?php if (session('errors.helpdesk_phone')) : ?>is-invalid<?php endif ?>" name="helpdesk_phone" value="<?= $vendor['helpdesk_phone']; ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('helpdesk_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="akun_manager">Akun Manager</label>
                                    <input id="akun_manager" type="text" class="form-control <?php if (session('errors.akun_manager')) : ?>is-invalid<?php endif ?>" name="akun_manager" value="<?= $vendor['akun_manager']; ?>" placeholder="Masukkan nama akun manager">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('akun_manager'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="akun_manager_phone">Akun Manager Phone</label>
                                    <input id="akun_manager_phone" type="text" class="form-control <?php if (session('errors.akun_manager_phone')) : ?>is-invalid<?php endif ?>" name="akun_manager_phone" value="<?= $vendor['akun_manager_phone']; ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('akun_manager_phone'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('vendor') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-md">
                                    Save
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