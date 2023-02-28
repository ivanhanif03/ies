<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Tambah Cluster</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('cluster') ?>">Cluster</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/cluster/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="data_center">Data Center</label>
                                    <select class="form-control selectric text-sm" name="data_center" id="data_center" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Data Center</option>
                                        <option value="Sentul">Sentul</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="HO">Head Office</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_cluster" class="font-weight-bolder">Nama Cluster</label>
                                    <input id="nama_cluster" type="text" class="form-control <?php if (session('errors.nama_cluster')) : ?>is-invalid<?php endif ?>" name="nama_cluster" value="<?= old('nama_cluster') ?>" placeholder="Masukkan nama cluster" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_cluster'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('cluster') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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