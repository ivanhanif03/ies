<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Aplikasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Aplikasi</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('apps/update') . '/' . $app['id']; ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nama_app" class="font-weight-bolder">Nama Aplikasi</label>
                                    <input id="nama_app" type="text" class="form-control <?php if (session('errors.nama_app')) : ?>is-invalid<?php endif ?>" name="nama_app" value="<?= $app['nama_app']; ?>" placeholder="Masukkan nama aplikasi">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_app'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="pic">Nama PIC</label>
                                    <input type="text" id="pic" class="form-control <?php if (session('errors.pic')) : ?>is-invalid<?php endif ?>" name="pic" value="<?= $app['pic']; ?>" placeholder="Masukkan pic">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pic'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="divisi">Divisi</label>
                                    <input type="text" id="divisi" class="form-control <?php if (session('errors.divisi')) : ?>is-invalid<?php endif ?>" name="divisi" value="<?= $app['divisi']; ?>" placeholder="Masukkan divisi">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('divisi'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="no_hp_pic">Nomor HP PIC</label>
                                    <input id="no_hp_pic" type="text" class="form-control <?php if (session('errors.no_hp_pic')) : ?>is-invalid<?php endif ?>" name="no_hp_pic" value="<?= $app['no_hp_pic']; ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp_pic'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('apps') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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