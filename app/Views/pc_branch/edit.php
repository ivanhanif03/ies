<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit PC Branch</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('pcbranch') ?>">PC Branch</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <!-- Aler Start -->
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="alert-delete">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <!-- Aler End -->
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="<?= base_url('pcbranch/update') . '/' . $pc_branch['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="user_log" id="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                            <div class="row">
                                <!-- Start Field KC -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label>Kantor Cabang</label>
                                    <select class="form-control select2 text-sm <?php if (session('errors.kc_id')) : ?>is-invalid<?php endif ?>" name="kc_id" id="kc_id" style="width: 100%;">
                                        <option value="" disabled selected>Pilih KC</option>
                                        <?php foreach ($kc as $kc) : ?>
                                            <option value="<?= $kc['kode_kantor']; ?>" <?php if ($kc['kode_kantor'] == $pc_branch['kc_id']) : ?>selected<?php endif; ?>>
                                                <?= $kc['kode_kantor']; ?> - <?= $kc['jenis_kantor'] ?>&nbsp;<?= $kc['nama_kantor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kc_id'); ?>
                                    </div>
                                </div>
                                <!-- End Field KC -->

                                <!-- Start Field KCP -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kcp_id">KCP</label>
                                    <select name="kcp_id" id="kcp_id" class="form-control select2 text-sm" style="width: 100%;">
                                        <option value="" disabled selected>Pilih KCP</option>
                                        <?php foreach ($kcp as $kcp) : ?>
                                            <option value="<?= $kcp['kode_kantor']; ?>" <?php if ($kcp['kode_kantor'] == $pc_branch['kcp_id']) : ?>selected<?php endif; ?>>
                                                <?= $kcp['kode_kantor']; ?> - <?= $kcp['jenis_kantor'] ?>&nbsp;<?= $kcp['nama_kantor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- End Field KCP -->
                            </div>

                            <div class="row">
                                <!-- Start Field Kode Aset -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="kode_aset" class="font-weight-bolder">Kode Aset</label>
                                    <input id="kode_aset" type="text" class="form-control <?php if (session('errors.kode_aset')) : ?>is-invalid<?php endif ?>" name="kode_aset" value="<?= $pc_branch['kode_aset']; ?>" placeholder="Masukkan kode aset" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_aset'); ?>
                                    </div>
                                </div>
                                <!-- End Field Kode Aset -->

                                <!-- Start Field SN -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="serial_number">Serial Number</label>
                                    <input id="serial_number" type="text" class="form-control <?php if (session('errors.serial_number')) : ?>is-invalid<?php endif ?>" name="serial_number" value="<?= $pc_branch['serial_number']; ?>" placeholder="Masukkan serial number">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('serial_number'); ?>
                                    </div>
                                </div>
                                <!-- End Field SN -->
                            </div>

                            <div class="row">
                                <!-- Start Field IP Address  -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="ip_address">IP Address </label>
                                    <input id="ip_address" type="text" class="form-control <?php if (session('errors.ip_address')) : ?>is-invalid<?php endif ?>" name="ip_address" value="<?= $pc_branch['ip_address']; ?>" placeholder="Masukkan ip address ">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ip_address'); ?>
                                    </div>
                                </div>
                                <!-- End Field IP Address  -->

                                <!-- Start Field Hostname -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="hostname">Hostname</label>
                                    <input id="hostname" type="text" class="form-control <?php if (session('errors.hostname')) : ?>is-invalid<?php endif ?>" name="hostname" value="<?= $pc_branch['hostname']; ?>" placeholder="Masukkan hostname">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('hostname'); ?>
                                    </div>
                                </div>
                                <!-- End Field Hostname -->
                            </div>

                            <div class="row">
                                <!-- Start Field Merek -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="merek">Merek</label>
                                    <input id="merek" type="text" class="form-control <?php if (session('errors.merek')) : ?>is-invalid<?php endif ?>" name="merek" value="<?= $pc_branch['merek']; ?>" placeholder="Masukkan merek">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('merek'); ?>
                                    </div>
                                </div>
                                <!-- End Field Merek -->

                                <!-- Start Field Tipe -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe">Tipe</label>
                                    <input id="tipe" type="text" class="form-control <?php if (session('errors.tipe')) : ?>is-invalid<?php endif ?>" name="tipe" value="<?= $pc_branch['tipe']; ?>" placeholder="Masukkan tipe">
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
                                            <option value="<?= $o['id']; ?>" <?php if ($o['id'] == $pc_branch['os_id']) : ?>selected<?php endif; ?>>
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
                                    <input id="processor" type="text" class="form-control <?php if (session('errors.processor')) : ?>is-invalid<?php endif ?>" name="processor" value="<?= $pc_branch['processor']; ?>" placeholder="Masukkan processor">
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
                                    <input id="disk" type="text" class="form-control <?php if (session('errors.disk')) : ?>is-invalid<?php endif ?>" name="disk" value="<?= $pc_branch['disk']; ?>" placeholder="Masukkan kapasitas disk" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('disk'); ?>
                                    </div>
                                </div>
                                <!-- End Field Disk -->

                                <!-- Start Field Tipe Disk -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe_disk">Tipe Disk</label>
                                    <input id="tipe_disk" type="text" class="form-control <?php if (session('errors.tipe_disk')) : ?>is-invalid<?php endif ?>" name="tipe_disk" value="<?= $pc_branch['tipe_disk']; ?>" placeholder="Masukkan tipe disk">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_disk'); ?>
                                    </div>
                                </div>
                                <!-- End Field Tipe Disk -->
                            </div>

                            <div class="row mb-3">
                                <!-- Start Field Memory -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="memory">Memory (GB)</label>
                                    <input id="memory" type="text" class="form-control <?php if (session('errors.memory')) : ?>is-invalid<?php endif ?>" name="memory" value="<?= $pc_branch['memory']; ?>" placeholder="Masukkan kapasitas memory" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('memory'); ?>
                                    </div>
                                </div>
                                <!-- End Field Memory -->

                                <!-- Start Field Tipe Memory -->
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="tipe_memory">Tipe Memory</label>
                                    <input id="tipe_memory" type="text" class="form-control <?php if (session('errors.tipe_memory')) : ?>is-invalid<?php endif ?>" name="tipe_memory" value="<?= $pc_branch['tipe_memory']; ?>" placeholder="Masukkan tipe memory">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tipe_memory'); ?>
                                    </div>
                                </div>
                                <!-- End Field Tipe Memory -->
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('pcbranch') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
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
    let csrfToken = '<?= csrf_token() ?>';
    let csrfHash = '<?= csrf_hash() ?>';
    $(document).ready(function() {
        $('#kc_id').change(function() {
            var kc_id = $('#kc_id').val();

            var action = 'get_kcp';

            if (kc_id != '') {
                $.ajax({
                    url: "<?php echo base_url('/pcbranch/action'); ?>",
                    method: "POST",
                    data: {
                        [csrfToken]: csrfHash,
                        kc_id: kc_id,
                        action: action,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="" disabled selected>Pilih KCP</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].kode_kantor + '">' + data[count].kode_kantor + ' - ' + data[count].nama_kantor + '</option>';

                        }

                        $('#kcp_id').html(html);
                    }
                });
            } else {
                $('#kcp_id').val('');
            }
        });
    });
</script>
<?= $this->endSection(); ?>