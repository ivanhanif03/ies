<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Form Tambah Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('serverfisik') ?>">Server Fisik</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/serverfisik/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_server" class="font-weight-bolder">Nama Server</label>
                                    <input id="nama_server" type="text" class="form-control <?php if (session('errors.nama_server')) : ?>is-invalid<?php endif ?>" name="nama_server" value="<?= old('nama_server') ?>" placeholder="Masukkan nama server" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_server'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="lisensi">Lisensi</label>
                                    <input id="lisensi" type="text" class="form-control <?php if (session('errors.lisensi')) : ?>is-invalid<?php endif ?>" name="lisensi" value="<?= old('lisensi') ?>" placeholder="Masukkan lisensi server">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lisensi'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="merk">Merk</label>
                                    <input id="merk" type="text" class="form-control <?php if (session('errors.merk')) : ?>is-invalid<?php endif ?>" name="merk" value="<?= old('merk') ?>" placeholder="Masukkan merk server">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('merk'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe">Tipe</label>
                                    <input id="tipe" type="text" class="form-control <?php if (session('errors.tipe')) : ?>is-invalid<?php endif ?>" name="tipe" value="<?= old('tipe') ?>" placeholder="Masukkan tipe server">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Operating System</label>
                                    <select class="form-control selectric text-sm" name="os" id="os" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Operating System</option>
                                        <option value="Windows">Windows</option>
                                        <option value="Linux">Linux</option>
                                        <option value="Unix">Unix</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="disk">Disk</label>
                                    <input id="disk" type="text" class="form-control <?php if (session('errors.disk')) : ?>is-invalid<?php endif ?>" name="disk" value="<?= old('disk') ?>" placeholder="Masukkan size disk">
                                    <div class=" invalid-feedback">
                                        <?= $validation->getError('disk'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="memory">Memory</label>
                                    <input id="memory" type="text" class="form-control <?php if (session('errors.memory')) : ?>is-invalid<?php endif ?>" name="memory" value="<?= old('memory') ?>" placeholder="Masukkan size memory">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('memory'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="processor">Processor</label>
                                    <input id="processor" type="text" class="form-control <?php if (session('errors.processor')) : ?>is-invalid<?php endif ?>" name="processor" value="<?= old('processor') ?>" placeholder="Masukkan processor server">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('processor'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="lokasi">Lokasi</label>
                                    <select class="form-control selectric text-sm" name="lokasi" id="lokasi" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Lokasi</option>
                                        <option value="Sentul">Sentul</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="HO">Head Office</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Vendor</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.vendor')) : ?>is-invalid<?php endif ?>" name="vendor" id="vendor" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Vendor</option>
                                        <?php foreach ($vendor as $v) : ?>
                                            <option value="<?= $v['id']; ?>">
                                                <?= $v['nama_vendor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('vendor'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="sos">Start of Support</label>
                                    <input id="sos" type="text" class="form-control datepicker <?php if (session('errors.sos')) : ?>is-invalid<?php endif ?>" name="sos" value="<?= old('sos') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('sos'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="eos">End of Support</label>
                                    <input id="eos" type="text" class="form-control datepicker <?php if (session('errors.eos')) : ?>is-invalid<?php endif ?>" name="eos" value="<?= old('eos') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('eos'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <a href="<?= base_url('serverfisik') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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