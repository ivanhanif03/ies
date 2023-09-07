<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Kantor Cabang Pembantu</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('kantor_cabang_pembantu') ?>">OS</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('kantor_cabang_pembantu/update') . '/' . $kantor_cabang_pembantu->kode_kantor; ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Kantor Cabang</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.kantor_cabang_id')) : ?>is-invalid<?php endif ?>" name="kantor_cabang_id" id="kantor_cabang_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih KC</option>
                                        <?php foreach ($kantor_cabang as $kc) : ?>
                                            <option value="<?= $kc['kode_kantor']; ?>" <?php if ($kc['kode_kantor'] == $kantor_cabang_pembantu->kantor_cabang_id) : ?>selected<?php endif; ?>>
                                                <?= $kc['kode_kantor']; ?> - <?= $kc['jenis_kantor'] ?>&nbsp;<?= $kc['nama_kantor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kantor_cabang_id'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kode_kantor" class="font-weight-bolder">Kode Kantor Cabang Pembantu</label>
                                    <input id="kode_kantor" type="text" class="form-control <?php if (session('errors.kode_kantor')) : ?>is-invalid<?php endif ?>" name="kode_kantor" value="<?= $kantor_cabang_pembantu->kode_kantor ?>" placeholder="Masukkan kode kantor" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_kantor" class="font-weight-bolder">Nama Kantor Cabang Pembantu</label>
                                    <input id="nama_kantor" type="text" class="form-control <?php if (session('errors.nama_kantor')) : ?>is-invalid<?php endif ?>" name="nama_kantor" value="<?= $kantor_cabang_pembantu->nama_kantor ?>" placeholder="Masukkan nama kantor cabang Pembantu">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Jenis Kantor</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.jenis_kantor')) : ?>is-invalid<?php endif ?>" name="jenis_kantor" id="jenis_kantor" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Jenis Kantor</option>
                                        <?php if ($kantor_cabang_pembantu->jenis_kantor == 'KCP') : ?>
                                            <option value="KCP" selected>KCP</option>
                                            <option value="KCPS">KCPS</option>
                                        <?php else : ?>
                                            <option value="KCP">KCP</option>
                                            <option value="KCPS" selected>KCPS</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Klasifikasi Kantor</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.klasifikasi_kantor')) : ?>is-invalid<?php endif ?>" name="klasifikasi_kantor" id="klasifikasi_kantor" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Klasifikasi Kantor</option>
                                        <?php if ($kantor_cabang_pembantu->klasifikasi_kantor == '1A') : ?>
                                            <option value="1A" selected>1A</option>
                                            <option value="1B">1B</option>
                                            <option value="2">2</option>
                                        <?php elseif ($kantor_cabang_pembantu->klasifikasi_kantor == '1B') : ?>
                                            <option value="1A">1A</option>
                                            <option value="1B" selected>1B</option>
                                            <option value="2">2</option>
                                        <?php else : ?>
                                            <option value="1A">1A</option>
                                            <option value="1B">1B</option>
                                            <option value="2" selected>2</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('klasifikasi_kantor'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" value="<?= $kantor_cabang_pembantu->alamat; ?>" placeholder="Masukkan alamat kantor cabang pembantu">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_telp">Nomor Telp</label>
                                    <input id="no_telp" type="text" class="form-control <?php if (session('errors.no_telp')) : ?>is-invalid<?php endif ?>" name="no_telp" value="<?= $kantor_cabang_pembantu->no_telp; ?>" placeholder="Masukkan nomor telpon kantor cabang pembantu" oninput="this.value = this.value.replace(/[^0-9,-()]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telp'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('kantor_cabang_pembantu') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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