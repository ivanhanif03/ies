<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Kontrak</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('kontrak') ?>">Kontrak</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('kontrak/update') . '/' . $kontrak->id; ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_kontrak" class="font-weight-bolder">Nama Kontrak</label>
                                    <input id="nama_kontrak" type="text" class="form-control <?php if (session('errors.nama_kontrak')) : ?>is-invalid<?php endif ?>" name="nama_kontrak" value="<?= $kontrak->nama_kontrak; ?>" placeholder="Masukkan nama kontrak">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Vendor</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.vendor_id')) : ?>is-invalid<?php endif ?>" name="vendor_id" id="vendor_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Vendor</option>
                                        <?php foreach ($vendor as $v) : ?>
                                            <option value="<?= $v['id']; ?>" <?php if ($v['id'] == $kontrak->vendor_id) : ?>selected<?php endif; ?>>
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
                                    <input id="nilai_kontrak" type="text" class="form-control <?php if (session('errors.nilai_kontrak')) : ?>is-invalid<?php endif ?>" name="nilai_kontrak" value="<?= $kontrak->nilai_kontrak; ?>" placeholder="Masukkan nama nilai kontrak" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nilai_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_pks">Nomor PKS/SPK</label>
                                    <input id="no_pks" type="text" class="form-control <?php if (session('errors.no_pks')) : ?>is-invalid<?php endif ?>" name="no_pks" value="<?= $kontrak->no_pks; ?>" placeholder="Masukkan no pks" oninput="this.value = this.value.replace(/[^0-9a-zA-Z-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_pks'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <label for="scope_work">Scope of Work</label>
                                    <textarea id="scope_work" class="form-control <?php if (session('errors.scope_work')) : ?>is-invalid<?php endif ?>" name="scope_work" placeholder="Masukkan scope of work" rows="6" style="height:100%;"><?= $kontrak->scope_work; ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('scope_work'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="start_kontrak">Start of Kontrak</label>
                                    <input id="start_kontrak" type="text" class="form-control datepicker <?php if (session('errors.start_kontrak')) : ?>is-invalid<?php endif ?>" name="start_kontrak" value="<?= $kontrak->start_kontrak; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('start_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="end_kontrak">End of Kontrak</label>
                                    <input id="end_kontrak" type="text" class="form-control datepicker <?php if (session('errors.end_kontrak')) : ?>is-invalid<?php endif ?>" name="end_kontrak" value="<?= $kontrak->end_kontrak; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('end_kontrak'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="tempo_pembayaran">Tempo Pembayaran</label>
                                <input id="tempo_pembayaran" type="text" class="form-control datepicker <?php if (session('errors.tempo_pembayaran')) : ?>is-invalid<?php endif ?>" name="tempo_pembayaran" value="<?= $kontrak->tempo_pembayaran; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempo_pembayaran'); ?>
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