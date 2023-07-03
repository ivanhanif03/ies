<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Tambah Kantor Cabang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('branch') ?>">Kantor Cabang</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-body">
                        <form action="<?= base_url('/branch/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kode_kantor" class="font-weight-bolder">Kode Kantor</label>
                                    <input id="kode_kantor" type="text" class="form-control <?php if (session('errors.kode_kantor')) : ?>is-invalid<?php endif ?>" name="kode_kantor" value="<?= old('kode_kantor') ?>" placeholder="Masukkan kode kantor" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_branch" class="font-weight-bolder">Nama Kantor Cabang</label>
                                    <input id="nama_branch" type="text" class="form-control <?php if (session('errors.nama_branch')) : ?>is-invalid<?php endif ?>" name="nama_branch" value="<?= old('nama_branch') ?>" placeholder="Masukkan nama kantor cabang">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_branch'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Regional</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.regional')) : ?>is-invalid<?php endif ?>" name="regional" id="regional" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Regional</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('regional'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('branch') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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