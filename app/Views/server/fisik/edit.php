<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('serverfisik') ?>">Server Fisik</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="<?= base_url('serverfisik/update') . '/' . $fisik['id']; ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row">
                                <!-- Start Field Kode Aset -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kode_aset" class="font-weight-bolder">Kode Aset</label>
                                    <input id="kode_aset" type="text" class="form-control <?php if (session('errors.kode_aset')) : ?>is-invalid<?php endif ?>" name="kode_aset" value="<?= $fisik['kode_aset']; ?>" placeholder="Masukkan kode aset" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_aset'); ?>
                                    </div>
                                </div>
                                <!-- End Field Kode Aset -->

                                <!-- Start Field SN -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="serial_number">Serial Number</label>
                                    <input id="serial_number" type="text" class="form-control <?php if (session('errors.serial_number')) : ?>is-invalid<?php endif ?>" name="serial_number" value="<?= $fisik['serial_number']; ?>" placeholder="Masukkan serial number">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('serial_number'); ?>
                                    </div>
                                </div>
                                <!-- End Field SN -->
                            </div>


                            <div class="row">
                                <!-- Start Field Aplikasi -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Aplikasi</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.app_id')) : ?>is-invalid<?php endif ?>" name="app_id" id="app_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih App</option>
                                        <?php foreach ($app as $a) : ?>
                                            <option value="<?= $a['id']; ?>" <?php if ($a['id'] == $fisik['app_id']) : ?>selected<?php endif; ?>>
                                                <?= $a['nama_app']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('app_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field Aplikasi -->

                                <!-- Start Field Jenis App -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Jenis App</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.jenis_app')) : ?>is-invalid<?php endif ?>" name="jenis_app" id="jenis_app" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Jenis App</option>
                                        <?php if ($fisik['jenis_app'] == 'WEB') : ?>
                                            <option value="WEB" selected>WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB">DB</option>
                                        <?php elseif ($fisik['jenis_app'] == 'APP') : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP" selected>APP</option>
                                            <option value="DB">DB</option>
                                        <?php else : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB" selected>DB</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_app'); ?>
                                    </div>
                                </div>
                                <!-- End Field Jenis App -->
                            </div>

                            <div class="row">
                                <!-- Start Field IP Address Data -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="ip_address_data">IP Address Data</label>
                                    <input id="ip_address_data" type="text" class="form-control <?php if (session('errors.ip_address_data')) : ?>is-invalid<?php endif ?>" name="ip_address_data" value="<?= $fisik['ip_address_data']; ?>" placeholder="Masukkan ip address data">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ip_address_data'); ?>
                                    </div>
                                </div>
                                <!-- End Field IP Address Data -->

                                <!-- Start Field IP Address Management -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="ip_address_management">IP Address Management</label>
                                    <input id="ip_address_management" type="text" class="form-control <?php if (session('errors.ip_address_management')) : ?>is-invalid<?php endif ?>" name="ip_address_management" value="<?= $fisik['ip_address_management']; ?>" placeholder="Masukkan ip address management">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ip_address_management'); ?>
                                    </div>
                                </div>
                                <!-- End Field IP Address Management -->
                            </div>

                            <div class="row">
                                <!-- Start Field Hostname -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="hostname">Hostname</label>
                                    <input id="hostname" type="text" class="form-control <?php if (session('errors.hostname')) : ?>is-invalid<?php endif ?>" name="hostname" value="<?= $fisik['hostname']; ?>" placeholder="Masukkan hostname">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('hostname'); ?>
                                    </div>
                                </div>
                                <!-- End Field Hostname -->

                                <!-- Start Field Jenis Aplliance -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Jenis Appliance</label>
                                    <select class="form-control selectric text-sm <?php if (session('errors.jenis_appliance')) : ?>is-invalid<?php endif ?>" name="jenis_appliance" id="jenis_appliance" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Jenis Appliance</option>
                                        <?php if ($fisik['jenis_appliance'] == 'Server') : ?>
                                            <option value="Server" selected>Server</option>
                                            <option value="Storage">Storage</option>
                                            <option value="San Switch">San Switch</option>
                                        <?php elseif ($fisik['jenis_appliance'] == 'Storage') : ?>
                                            <option value="Server">Server</option>
                                            <option value="Storage" selected>Storage</option>
                                            <option value="San Switch">San Switch</option>
                                        <?php else : ?>
                                            <option value="Server">Server</option>
                                            <option value="Storage">Storage</option>
                                            <option value="San Switch" selected>San Switch</option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_appliance'); ?>
                                    </div>
                                </div>
                                <!-- End Field Jenis Aplliance -->
                            </div>

                            <div class="row">
                                <!-- Start Field Rak Server -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Rak Server</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.rak_id')) : ?>is-invalid<?php endif ?>" name="rak_id" id="rak_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Rak</option>
                                        <?php foreach ($rak as $r) : ?>
                                            <option value="<?= $r['id']; ?>" <?php if ($r['id'] == $fisik['rak_id']) : ?>selected<?php endif; ?>>
                                                <?= $r['nama_rak']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rak_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field Rak Server -->

                                <!-- Start Field Rak Unit -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="rak_unit">Rak Unit</label>
                                    <input id="rak_unit" type="text" class="form-control <?php if (session('errors.rak_unit')) : ?>is-invalid<?php endif ?>" name="rak_unit" value="<?= $fisik['rak_unit']; ?>" placeholder="Masukkan rak unit" oninput="this.value = this.value.replace(/[^0-9-]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rak_unit'); ?>
                                    </div>
                                </div>
                                <!-- End Field Rak Unit -->
                            </div>

                            <div class="row">
                                <!-- Start Field Vendor Software -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Vendor Software</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.vendor_software_id')) : ?>is-invalid<?php endif ?>" name="vendor_software_id" id="vendor_software_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Vendor</option>
                                        <?php foreach ($vendor as $v) : ?>
                                            <option value="<?= $v['id']; ?>" <?php if ($v['id'] == $fisik['vendor_software_id']) : ?>selected<?php endif; ?>>
                                                <?= $v['nama_vendor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('vendor_software_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field Vendor Software -->

                                <!-- Start Field Vendor Hardware -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Vendor Hardware</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.vendor_hardware_id')) : ?>is-invalid<?php endif ?>" name="vendor_hardware_id" id="vendor_hardware_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Vendor</option>
                                        <?php foreach ($vendor as $v) : ?>
                                            <option value="<?= $v['id']; ?>" <?php if ($v['id'] == $fisik['vendor_hardware_id']) : ?>selected<?php endif; ?>>
                                                <?= $v['nama_vendor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('vendor_hardware_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field Vendor Hardware -->
                            </div>

                            <div class="row">
                                <!-- Start Field Merek -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="merek">Merek</label>
                                    <input id="merek" type="text" class="form-control <?php if (session('errors.merek')) : ?>is-invalid<?php endif ?>" name="merek" value="<?= $fisik['merek']; ?>" placeholder="Masukkan merek">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('merek'); ?>
                                    </div>
                                </div>
                                <!-- End Field Merek -->

                                <!-- Start Field Tipe -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe">Tipe</label>
                                    <input id="tipe" type="text" class="form-control <?php if (session('errors.tipe')) : ?>is-invalid<?php endif ?>" name="tipe" value="<?= $fisik['tipe']; ?>" placeholder="Masukkan tipe">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe'); ?>
                                    </div>
                                </div>
                                <!-- End Field Tipe -->
                            </div>

                            <div class="row">
                                <!-- Start Field OS -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Operating System</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.os_id')) : ?>is-invalid<?php endif ?>" name="os_id" id="os_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih OS</option>
                                        <?php foreach ($os as $o) : ?>
                                            <option value="<?= $o['id']; ?>" <?php if ($o['id'] == $fisik['os_id']) : ?>selected<?php endif; ?>>
                                                <?= $o['nama_os']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('os_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field OS -->

                                <!-- Start Field Processor -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="processor">Processor</label>
                                    <input id="processor" type="text" class="form-control <?php if (session('errors.processor')) : ?>is-invalid<?php endif ?>" name="processor" value="<?= $fisik['processor']; ?>" placeholder="Masukkan processor">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('processor'); ?>
                                    </div>
                                </div>
                                <!-- End Field Processor -->
                            </div>

                            <div class="row">
                                <!-- Start Field Disk -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="disk">Disk (GB)</label>
                                    <input id="disk" type="text" class="form-control <?php if (session('errors.disk')) : ?>is-invalid<?php endif ?>" name="disk" value="<?= $fisik['disk']; ?>" placeholder="Masukkan kapasitas disk" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('disk'); ?>
                                    </div>
                                </div>
                                <!-- End Field Disk -->

                                <!-- Start Field Tipe Disk -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe_disk">Tipe Disk</label>
                                    <input id="tipe_disk" type="text" class="form-control <?php if (session('errors.tipe_disk')) : ?>is-invalid<?php endif ?>" name="tipe_disk" value="<?= $fisik['tipe_disk']; ?>" placeholder="Masukkan tipe disk">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_disk'); ?>
                                    </div>
                                </div>
                                <!-- End Field Tipe Disk -->
                            </div>

                            <div class="row">
                                <!-- Start Field Memory -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="memory">Memory (GB)</label>
                                    <input id="memory" type="text" class="form-control <?php if (session('errors.memory')) : ?>is-invalid<?php endif ?>" name="memory" value="<?= $fisik['memory']; ?>" placeholder="Masukkan kapasitas memory" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('memory'); ?>
                                    </div>
                                </div>
                                <!-- End Field Memory -->

                                <!-- Start Field Tipe Memory -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe_memory">Tipe Memory</label>
                                    <input id="tipe_memory" type="text" class="form-control <?php if (session('errors.tipe_memory')) : ?>is-invalid<?php endif ?>" name="tipe_memory" value="<?= $fisik['tipe_memory']; ?>" placeholder="Masukkan tipe memory">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_memory'); ?>
                                    </div>
                                </div>
                                <!-- End Field Tipe Memory -->
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="sos">Start of Support</label>
                                    <input id="sos" type="text" class="form-control datepicker <?php if (session('errors.sos')) : ?>is-invalid<?php endif ?>" name="sos" value="<?= $fisik['sos']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('sos'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="eos">End of Support</label>
                                    <input id="eos" type="text" class="form-control datepicker <?php if (session('errors.eos')) : ?>is-invalid<?php endif ?>" name="eos" value="<?= $fisik['eos']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('eos'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Start Field Nomor PKS -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="no_pks">Nomor PKS</label>
                                    <input id="no_pks" type="text" class="form-control <?php if (session('errors.no_pks')) : ?>is-invalid<?php endif ?>" name="no_pks" value="<?= $fisik['no_pks']; ?>" placeholder="Masukkan no pks">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_pks'); ?>
                                    </div>
                                </div>
                                <!-- End Field Nomor PKS -->
                            </div>

                            <div class="d-flex justify-content-end">
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