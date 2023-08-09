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
                        <form action="<?= base_url('serverfisik/update') . '/' . $fisik['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">
                            <input type="hidden" name="gambar_server_lama" value="<?= $fisik['gambar_server'] ?>">
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
                                            <option value="MNGMT">MNGMT</option>
                                            <option value="DMZ">DMZ</option>
                                            <option value="DEV">DEV</option>
                                        <?php elseif ($fisik['jenis_app'] == 'APP') : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP" selected>APP</option>
                                            <option value="DB">DB</option>
                                            <option value="MNGMT">MNGMT</option>
                                            <option value="DMZ">DMZ</option>
                                            <option value="DEV">DEV</option>
                                        <?php elseif ($fisik['jenis_app'] == 'DB') : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB" selected>DB</option>
                                            <option value="MNGMT">MNGMT</option>
                                            <option value="DMZ">DMZ</option>
                                            <option value="DEV">DEV</option>
                                        <?php elseif ($fisik['jenis_app'] == 'MNGMT') : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB">DB</option>
                                            <option value="MNGMT" selected>MNGMT</option>
                                            <option value="DMZ">DMZ</option>
                                            <option value="DEV">DEV</option>
                                        <?php elseif ($fisik['jenis_app'] == 'DMZ') : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB">DB</option>
                                            <option value="MNGMT">MNGMT</option>
                                            <option value="DMZ" selected>DMZ</option>
                                            <option value="DEV">DEV</option>
                                        <?php else : ?>
                                            <option value="WEB">WEB</option>
                                            <option value="APP">APP</option>
                                            <option value="DB">DB</option>
                                            <option value="MNGMT">MNGMT</option>
                                            <option value="DMZ">DMZ</option>
                                            <option value="DEV" selected>DEV</option>
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

                            <?php if (in_groups('admin')) : ?>
                                <div class="row">
                                    <!-- Start Field Username OS -->
                                    <div class="form-group col-lg-3 col-sm-12">
                                        <label for="username_os">Username OS</label>
                                        <input id="username_os" type="text" class="form-control <?php if (session('errors.username_os')) : ?>is-invalid<?php endif ?>" name="username_os" value="<?= $fisik['username_os']; ?>" placeholder="Masukkan username OS">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username_os'); ?>
                                        </div>
                                    </div>
                                    <!-- End Field Username OS -->

                                    <!-- Start Field Password OS -->
                                    <div class="form-group col-lg-3 col-sm-12">
                                        <label for="password_os">Password OS</label>
                                        <input id="password_os" type="text" class="form-control <?php if (session('errors.password_os')) : ?>is-invalid<?php endif ?>" name="password_os" value="<?= $fisik['password_os']; ?>" placeholder="Masukkan password OS">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_os'); ?>
                                        </div>
                                    </div>
                                    <!-- End Field Password OS -->

                                    <!-- Start Field Username OS -->
                                    <div class="form-group col-lg-3 col-sm-12">
                                        <label for="username_ilo">Username ILO</label>
                                        <input id="username_ilo" type="text" class="form-control <?php if (session('errors.username_ilo')) : ?>is-invalid<?php endif ?>" name="username_ilo" value="<?= $fisik['username_ilo']; ?>" placeholder="Masukkan username ILO">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username_ilo'); ?>
                                        </div>
                                    </div>
                                    <!-- End Field Username OS -->

                                    <!-- Start Field Password OS -->
                                    <div class="form-group col-lg-3 col-sm-12">
                                        <label for="password_ilo">Password ILO</label>
                                        <input id="password_ilo" type="text" class="form-control <?php if (session('errors.password_ilo')) : ?>is-invalid<?php endif ?>" name="password_ilo" value="<?= $fisik['password_ilo']; ?>" placeholder="Masukkan password ILO">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_ilo'); ?>
                                        </div>
                                    </div>
                                    <!-- End Field Password OS -->
                                </div>
                            <?php endif; ?>

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
                                                <?= $r['nama_rak']; ?> - <?= $r['lokasi']; ?>
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
                                        <?php foreach ($kontrak as $k) : ?>
                                            <option value="<?= $k['id']; ?>" <?php if ($k['id'] == $fisik['vendor_software_id']) : ?>selected<?php endif; ?>>
                                                <?= $k['nama_vendor']; ?> - <?= $k['nama_kontrak']; ?> - <?= $k['no_pks']; ?> </option>
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
                                        <?php foreach ($kontrak as $k) : ?>
                                            <option value="<?= $k['id']; ?>" <?php if ($k['id'] == $fisik['vendor_hardware_id']) : ?>selected<?php endif; ?>>
                                                <?= $k['nama_vendor']; ?> - <?= $k['nama_kontrak']; ?> - <?= $k['no_pks']; ?> </option>
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

                                <!-- Start Field Core per Socket -->
                                <div class="form-group col-lg-2 col-sm-12">
                                    <label for="jumlah_core">Core per Socket</label>
                                    <input id="jumlah_core" type="text" class="form-control <?php if (session('errors.jumlah_core')) : ?>is-invalid<?php endif ?>" name="jumlah_core" value="<?= $fisik['jumlah_core']; ?>" placeholder="Masukkan jumlah core per socket" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jumlah_core'); ?>
                                    </div>
                                </div>
                                <!-- End Field Core per Socket -->

                                <!-- Start Field Sockets -->
                                <div class="form-group col-lg-2 col-sm-12">
                                    <label for="processor">Jumlah Socket</label>
                                    <input id="processor" type="text" class="form-control <?php if (session('errors.processor')) : ?>is-invalid<?php endif ?>" name="processor" value="<?= $fisik['processor']; ?>" placeholder="Masukkan jumlah socket" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('processor'); ?>
                                    </div>
                                </div>
                                <!-- End Field Sockets -->

                                <!-- Start Field Logical Processor -->
                                <div class="form-group col-lg-2 col-sm-12">
                                    <label for="logical_processor">Logical Processor</label>
                                    <input id="logical_processor" type="text" class="form-control <?php if (session('errors.logical_processor')) : ?>is-invalid<?php endif ?>" name="logical_processor" value="<?= $fisik['logical_processor']; ?>" placeholder="Masukkan jumlah logical processor" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('logical_processor'); ?>
                                    </div>
                                </div>
                                <!-- End Field Logical Processor -->
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

                            <div class="row mb-3">
                                <!-- Start Field Gambar Server -->
                                <div class=" col-lg-2 col-sm-12">
                                    <img class="img-thumbnail img-preview" src="/img/gambar_server/<?= $fisik['gambar_server'] ?>" alt="Gambar Rak">
                                </div>
                                <div class="input-group col-lg-4 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php if (session('errors.gambar_server')) : ?>is-invalid<?php endif ?>" id="gambar_server" name="gambar_server" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar_server'); ?>
                                        </div>
                                        <label class="custom-file-label" for="gambar_server"><?= $fisik['gambar_server'] ?></label>
                                    </div>
                                </div>
                                <!-- End Field Gambar Server -->
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
    function previewImg() {
        //Gambar Server
        const gambar_server = document.querySelector('#gambar_server');
        const gambar_server_label = document.querySelector('.custom-file-label');
        const img_preview = document.querySelector('.img-preview');

        gambar_server_label.textContent = gambar_server.files[0].name;

        const file_gambar_server = new FileReader();
        file_gambar_server.readAsDataURL(gambar_server.files[0]);

        file_gambar_server.onload = function(e) {
            img_preview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>