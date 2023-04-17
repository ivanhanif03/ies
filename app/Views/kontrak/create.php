<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Tambah Kontrak</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('kontrak') ?>">Kontrak</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/kontrak/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_kontrak" class="font-weight-bolder">Nama Kontrak</label>
                                    <input id="nama_kontrak" type="text" class="form-control <?php if (session('errors.nama_kontrak')) : ?>is-invalid<?php endif ?>" name="nama_kontrak" value="<?= old('nama_kontrak') ?>" placeholder="Masukkan nama kontrak" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Vendor</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.vendor_id')) : ?>is-invalid<?php endif ?>" name="vendor_id" id="vendor_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Vendor</option>
                                        <?php foreach ($vendor as $v) : ?>
                                            <option value="<?= $v['id']; ?>">
                                                <?= $v['nama_vendor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('vendor_id'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nilai_kontrak">Nilai Kontrak</label>
                                    <input id="nilai_kontrak" type="text" class="form-control <?php if (session('errors.nilai_kontrak')) : ?>is-invalid<?php endif ?>" name="nilai_kontrak" value="<?= old('nilai_kontrak') ?>" placeholder="Masukkan nama nilai kontrak" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nilai_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_pks">Nomor PKS/SPK</label>
                                    <input type="text" id="no_pks" class="form-control <?php if (session('errors.no_pks')) : ?>is-invalid<?php endif ?>" name="no_pks" value="<?= old('no_pks') ?>" placeholder="Masukkan no pks/spk kontrak" oninput="this.value = this.value.replace(/[^0-9a-zA-Z-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_pks'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="scope_work">Scope of Work</label>
                                    <textarea id="scope_work" class="form-control <?php if (session('errors.scope_work')) : ?>is-invalid<?php endif ?>" name="scope_work" placeholder="Masukkan scope of work" rows="6" style="height:100%;"><?= old('scope_work') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('scope_work'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-12">
                                    <label for="tempo_pembayaran">Tempo Pembayaran</label>
                                    <input id="tempo_pembayaran" type="text" class="form-control datepicker <?php if (session('errors.tempo_pembayaran')) : ?>is-invalid<?php endif ?>" name="tempo_pembayaran" value="<?= old('tempo_pembayaran') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempo_pembayaran'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('kontrak') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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