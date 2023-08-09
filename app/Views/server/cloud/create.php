<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Form Tambah Server Cloud</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('cloud') ?>">Server Cloud</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/cloud/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">
                            <div class="row">
                                <!-- Start Field provider -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Provider</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.provider_id')) : ?>is-invalid<?php endif ?>" name="provider_id" id="provider_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih provider</option>
                                        <?php foreach ($provider as $p) : ?>
                                            <option value="<?= $p['id']; ?>">
                                                <?= $p['nama_provider']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('provider_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field provider -->

                                <!-- Start Field App -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Aplikasi</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.app_id')) : ?>is-invalid<?php endif ?>" name="app_id" id="app_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Aplikasi</option>
                                        <?php foreach ($app as $a) : ?>
                                            <option value="<?= $a['id']; ?>">
                                                <?= $a['nama_app']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('app_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field App -->
                            </div>


                            <div class="row">
                                <!-- Start Field OS -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Operating System</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.os_id')) : ?>is-invalid<?php endif ?>" name="os_id" id="os_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih OS</option>
                                        <?php foreach ($os as $o) : ?>
                                            <option value="<?= $o['id']; ?>">
                                                <?= $o['nama_os']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('os_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field OS -->

                                <!-- Start Field Nama VM -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_cloud">Nama Cloud</label>
                                    <input id="nama_cloud" type="text" class="form-control <?php if (session('errors.nama_cloud')) : ?>is-invalid<?php endif ?>" name="nama_cloud" value="<?= old('nama_cloud') ?>" placeholder="Masukkan nama cloud">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_cloud'); ?>
                                    </div>
                                </div>
                                <!-- End Field Nama VM -->
                            </div>

                            <div class="row">

                                <!-- Start Field IP Address -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="ip_address">IP Address</label>
                                    <input id="ip_address" type="text" class="form-control <?php if (session('errors.ip_address')) : ?>is-invalid<?php endif ?>" name="ip_address" value="<?= old('ip_address') ?>" placeholder="Masukkan ip address">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ip_address'); ?>
                                    </div>
                                </div>
                                <!-- End Field IP Address -->

                                <!-- Start Field Hostname -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="hostname">Hostname</label>
                                    <input id="hostname" type="text" class="form-control <?php if (session('errors.hostname')) : ?>is-invalid<?php endif ?>" name="hostname" value="<?= old('hostname') ?>" placeholder="Masukkan hostname">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('hostname'); ?>
                                    </div>
                                </div>
                                <!-- End Field Hostname -->
                            </div>

                            <div class="row">
                                <!-- Start Field Disk -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="disk">Disk (GB)</label>
                                    <input id="disk" type="text" class="form-control <?php if (session('errors.disk')) : ?>is-invalid<?php endif ?>" name="disk" value="<?= old('disk') ?>" placeholder="Masukkan kapasitas disk" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('disk'); ?>
                                    </div>
                                </div>
                                <!-- End Field Disk -->

                                <!-- Start Field Memory -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="memory">Memory (GB)</label>
                                    <input id="memory" type="text" class="form-control <?php if (session('errors.memory')) : ?>is-invalid<?php endif ?>" name="memory" value="<?= old('memory') ?>" placeholder="Masukkan kapasitas memory" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('memory'); ?>
                                    </div>
                                </div>
                                <!-- End Field Memory -->
                            </div>

                            <div class="row">
                                <!-- Start Field Core per Socket -->
                                <div class="form-group col-lg-3 col-sm-12">
                                    <label for="jumlah_core">Core per Socket</label>
                                    <input id="jumlah_core" type="text" class="form-control <?php if (session('errors.jumlah_core')) : ?>is-invalid<?php endif ?>" name="jumlah_core" value="<?= old('jumlah_core') ?>" placeholder="Masukkan jumlah core per socket" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah_core'); ?>
                                    </div>
                                </div>
                                <!-- End Field Core per Socket -->

                                <!-- Start Field Processor -->
                                <div class="form-group col-lg-3 col-sm-12">
                                    <label for="processor">Jumlah Socket</label>
                                    <input id="processor" type="text" class="form-control <?php if (session('errors.processor')) : ?>is-invalid<?php endif ?>" name="processor" value="<?= old('processor') ?>" placeholder="Masukkan jumlah socket" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('processor'); ?>
                                    </div>
                                </div>
                                <!-- End Field Processor -->

                                <!-- Start Field Jenis Server -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Jenis Server</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.jenis_server')) : ?>is-invalid<?php endif ?>" name="jenis_server" id="jenis_server" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Jenis Server</option>
                                        <option value="WEB">WEB</option>
                                        <option value="APP">APP</option>
                                        <option value="DB">DB</option>
                                        <option value="MNGMT">MNGMT</option>
                                        <option value="DMZ">DMZ</option>
                                        <option value="DEV">DEV</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_server'); ?>
                                    </div>
                                </div>
                                <!-- End Field Jenis Server -->
                            </div>

                            <div class="row">
                                <!-- Start Field jenis_payment -->
                                <div class="form-group col-lg-3 col-sm-12">
                                    <label for="jenis_payment">Jenis Payment</label>
                                    <input id="jenis_payment" type="text" class="form-control <?php if (session('errors.jenis_payment')) : ?>is-invalid<?php endif ?>" name="jenis_payment" value="<?= old('jenis_payment') ?>" placeholder="Masukkan jenis payment">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_payment'); ?>
                                    </div>
                                </div>
                                <!-- End Field jenis_payment -->

                                <!-- Start Field jenis_payment -->
                                <div class="form-group col-lg-3 col-sm-12">
                                    <label for="biaya">Biaya</label>
                                    <input id="biaya" type="text" class="form-control <?php if (session('errors.biaya')) : ?>is-invalid<?php endif ?>" name="biaya" value="<?= old('biaya') ?>" placeholder="Masukkan biaya" oninput="this.value = this.value.replace(/[^0-9,-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('biaya'); ?>
                                    </div>
                                </div>
                                <!-- End Field jenis_payment -->

                                <!-- Start Field Masa Aktif -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="masa_aktif">Masa Aktif</label>
                                    <input id="masa_aktif" type="text" class="form-control datepicker <?php if (session('errors.masa_aktif')) : ?>is-invalid<?php endif ?>" name="masa_aktif" value="<?= old('masa_aktif') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('masa_aktif'); ?>
                                    </div>
                                </div>
                                <!-- End Field Masa Aktif -->
                            </div>

                            <label class="font-weight-bold">Memo</label>
                            <div class="row mb-3">
                                <!-- Start Field Memo VM -->
                                <div class="input-group col-lg-6 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php if (session('errors.memo')) : ?>is-invalid<?php endif ?>" id="memo" name="memo" onchange="previewLabel()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('memo'); ?>
                                        </div>
                                        <label class="custom-file-label" for="memo">Upload Memo</label>
                                    </div>
                                </div>
                                <!-- End Field Memo VM -->
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('cloud') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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
    function previewLabel() {
        //Gambar Server
        const memo = document.querySelector('#memo');
        const memo_label = document.querySelector('.custom-file-label');

        memo_label.textContent = memo.files[0].name;
    }
</script>
<?= $this->endSection(); ?>