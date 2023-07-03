<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Form Tambah Server Virtual Machine</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('virtualmachine') ?>">Server VM</a></div>
            <div class="breadcrumb-item">Tambah</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">

                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('/virtualmachine/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <!-- Start Field Cluster -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Cluster</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.cluster_id')) : ?>is-invalid<?php endif ?>" name="cluster_id" id="cluster_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Cluster</option>
                                        <?php foreach ($cluster as $c) : ?>
                                            <option value="<?= $c['id']; ?>">
                                                <?= $c['nama_cluster']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('cluster_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field Cluster -->

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
                                    <label for="nama_vm">Nama Virtual Machine</label>
                                    <input id="nama_vm" type="text" class="form-control <?php if (session('errors.nama_vm')) : ?>is-invalid<?php endif ?>" name="nama_vm" value="<?= old('nama_vm') ?>" placeholder="Masukkan nama vm">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_vm'); ?>
                                    </div>
                                </div>
                                <!-- End Field Nama VM -->
                            </div>

                            <div class="row">

                                <!-- Start Field IP Address -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="ip_address">IP Address</label>
                                    <input id="ip_address" type="text" class="form-control <?php if (session('errors.ip_address')) : ?>is-invalid<?php endif ?>" name="ip_address" value="<?= old('ip_address') ?>" placeholder="Masukkan ip address" >
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
                                <!-- Start Field Lisence -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="lisence">Lisence</label>
                                    <input id="lisence" type="text" class="form-control <?php if (session('errors.lisence')) : ?>is-invalid<?php endif ?>" name="lisence" value="<?= old('lisence') ?>" placeholder="Masukkan lisence">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lisence'); ?>
                                    </div>
                                </div>
                                <!-- End Field Lisence -->
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('virtualmachine') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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