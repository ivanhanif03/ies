<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Rak</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('rak') ?>">Rak</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('rak/update') . '/' . $rak['id']; ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_rak" class="font-weight-bolder">Nama Rak</label>
                                    <input id="nama_rak" type="text" class="form-control <?php if (session('errors.nama_rak')) : ?>is-invalid<?php endif ?>" name="nama_rak" value="<?= $rak['nama_rak']; ?>" placeholder="Masukkan nama rak">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_rak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" id="lokasi" class="form-control <?php if (session('errors.lokasi')) : ?>is-invalid<?php endif ?>" name="lokasi" value="<?= $rak['lokasi']; ?>" placeholder="Masukkan lokasi rak">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('rak') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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