<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Tambah Provider</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('provider') ?>">Provider</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/provider/save') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_provider" class="font-weight-bolder">Nama Provider</label>
                                    <input id="nama_provider" type="text" class="form-control <?php if (session('errors.nama_provider')) : ?>is-invalid<?php endif ?>" name="nama_provider" value="<?= old('nama_provider') ?>" placeholder="Masukkan nama provider" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_provider'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_kontak" class="font-weight-bolder">Nama PIC/Kontak</label>
                                    <input id="nama_kontak" type="text" class="form-control <?php if (session('errors.nama_kontak')) : ?>is-invalid<?php endif ?>" name="nama_kontak" value="<?= old('nama_kontak') ?>" placeholder="Masukkan nama pic">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kontak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_hp_kontak" class="font-weight-bolder">Nomor HP PIC</label>
                                    <input id="no_hp_kontak" type="text" class="form-control <?php if (session('errors.no_hp_kontak')) : ?>is-invalid<?php endif ?>" name="no_hp_kontak" value="<?= old('no_hp_kontak') ?>" placeholder="Masukkan nomor hp pic" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp_kontak'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('provider') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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