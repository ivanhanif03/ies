<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Kantor Cabang</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('kantor_cabang') ?>">OS</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('kantor_cabang/update') . '/' . $kantor_cabang['kode_kantor']; ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Regional</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.regional')) : ?>is-invalid<?php endif ?>" name="regional" id="regional" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Regional</option>
                                        <?php if ($kantor_cabang['regional'] == '1') : ?>
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        <?php elseif ($kantor_cabang['regional'] == '2') : ?>
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        <?php elseif ($kantor_cabang['regional'] == '3') : ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected>3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        <?php elseif ($kantor_cabang['regional'] == '4') : ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected>4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        <?php elseif ($kantor_cabang['regional'] == '5') : ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected>5</option>
                                            <option value="6">6</option>
                                        <?php else : ?>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6" selected>6</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('regional'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kode_kantor" class="font-weight-bolder">Kode Kantor</label>
                                    <input id="kode_kantor" type="text" class="form-control <?php if (session('errors.kode_kantor')) : ?>is-invalid<?php endif ?>" name="kode_kantor" value="<?= $kantor_cabang['kode_kantor']; ?>" placeholder="Masukkan kode kantor, contoh : 6">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_kantor" class="font-weight-bolder">Nama Kantor Cabang</label>
                                    <input id="nama_kantor" type="text" class="form-control <?php if (session('errors.nama_kantor')) : ?>is-invalid<?php endif ?>" name="nama_kantor" value="<?= $kantor_cabang['nama_kantor']; ?>" placeholder="Masukkan nama kantor cabang, contoh : Bandung">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Jenis Kantor</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.jenis_kantor')) : ?>is-invalid<?php endif ?>" name="jenis_kantor" id="jenis_kantor" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Jenis Kantor</option>
                                        <?php if ($kantor_cabang['jenis_kantor'] == '1') : ?>
                                            <option value="KC" selected>KC</option>
                                            <option value="KCS">KCS</option>
                                        <?php else : ?>
                                            <option value="KC">KC</option>
                                            <option value="KCS" selected>KCS</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= $kantor_cabang['alamat']; ?>" placeholder="Masukkan alamat kantor cabang">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_telp">Nomor Telp</label>
                                    <input id="no_telp" type="text" class="form-control <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" name="no_telp" value="<?= $kantor_cabang['no_telp'] ?>" placeholder="Masukkan nomor telpon kantor cabang" oninput="this.value = this.value.replace(/[^0-9,-()]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telp'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('kantor_cabang') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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