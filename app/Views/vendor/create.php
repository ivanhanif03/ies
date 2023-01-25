<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Tambah Vendor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Vendor</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/vendor/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_vendor" class="font-weight-bolder">Nama Vendor</label>
                                    <input id="nama_vendor" type="text" class="form-control <?php if (session('errors.nama_vendor')) : ?>is-invalid<?php endif ?>" name="nama_vendor" value="<?= old('nama_vendor') ?>" placeholder="Masukkan nama vendor" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_vendor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= old('alamat') ?>" placeholder="Masukkan alamat vendor">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="pic">PIC</label>
                                    <input id="pic" type="text" class="form-control <?php if (session('errors.pic')) : ?>is-invalid<?php endif ?>" name="pic" value="<?= old('pic') ?>" placeholder="Masukkan nama pic">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pic'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk_phone">PIC Phone</label>
                                    <input id="pic_phone" type="text" class="form-control <?php if (session('errors.pic_phone')) : ?>is-invalid<?php endif ?>" name="pic_phone" value="<?= old('pic_phone') ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pic_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk">Helpdesk</label>
                                    <input id="helpdesk" type="text" class="form-control <?php if (session('errors.helpdesk')) : ?>is-invalid<?php endif ?>" name="helpdesk" value="<?= old('helpdesk') ?>" placeholder="Masukkan nama helpdesk">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('helpdesk'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="helpdesk_phone">Helpdesk Phone</label>
                                    <input id="helpdesk_phone" type="text" class="form-control <?php if (session('errors.helpdesk_phone')) : ?>is-invalid<?php endif ?>" name="helpdesk_phone" value="<?= old('helpdesk_phone') ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('helpdesk_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="akun_manager">Akun Manager</label>
                                    <input id="akun_manager" type="text" class="form-control <?php if (session('errors.akun_manager')) : ?>is-invalid<?php endif ?>" name="akun_manager" value="<?= old('akun_manager') ?>" placeholder="Masukkan nama akun manager">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('akun_manager'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="akun_manager_phone">Akun Manager Phone</label>
                                    <input id="akun_manager_phone" type="text" class="form-control <?php if (session('errors.akun_manager_phone')) : ?>is-invalid<?php endif ?>" name="akun_manager_phone" value="<?= old('akun_manager_phone') ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('akun_manager_phone'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="scope_work">Scope of Work</label>
                                    <textarea id="scope_work" class="form-control <?php if (session('errors.scope_work')) : ?>is-invalid<?php endif ?>" name="scope_work" placeholder="Masukkan scope of work" rows="4"><?= old('scope_work') ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('scope_work'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nilai_kontrak">Nilai Kontrak</label>
                                    <input id="nilai_kontrak" type="text" class="form-control <?php if (session('errors.nilai_kontrak')) : ?>is-invalid<?php endif ?>" name="nilai_kontrak" value="<?= old('nilai_kontrak') ?>" placeholder="Masukkan pic phone" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nilai_kontrak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tempo_pembayaran">Tempo Pembayaran</label>
                                    <input id="tempo_pembayaran" type="text" class="form-control datepicker <?php if (session('errors.tempo_pembayaran')) : ?>is-invalid<?php endif ?>" name="tempo_pembayaran" value="<?= old('tempo_pembayaran') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempo_pembayaran'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
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