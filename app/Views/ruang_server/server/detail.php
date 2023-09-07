<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Branch</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('serverbranch') ?>">Daftar Server Branch</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold">Server <?= $branch->jenis_kc ?>&nbsp;<?= $branch->nama_kc ?> - <?= $branch->kode_kc ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <?php if ($branch->kcp_id == null) : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td width="30%"><?= $branch->jenis_kcp ?></td>
                                            <td><?= $branch->kode_kcp ?> - <?= $branch->jenis_kcp ?>&nbsp;<?= $branch->nama_kcp ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>Kode Aset</td>
                                        <td><?= $branch->kode_aset ?></td>
                                    </tr>
                                    <tr>
                                        <td>Serial Number</td>
                                        <td><?= $branch->serial_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address Data</td>
                                        <td><?= $branch->ip_address_data ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address Management</td>
                                        <td><?= $branch->ip_address_management ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $branch->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Operating System</td>
                                        <td><?= $branch->nama_os ?></td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $branch->processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Merek</td>
                                        <td><?= $branch->merek ?></td>
                                    <tr>
                                        <td>Tipe</td>
                                        <td><?= $branch->tipe ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disk</td>
                                        <?php if ($branch->disk > 999) : ?>
                                            <td>
                                                <?= $branch->disk / 1000 ?> TB
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= $branch->disk ?> GB
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Tipe Disk</td>
                                        <td><?= $branch->tipe_disk ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $branch->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Memory</td>
                                        <td><?= $branch->tipe_memory ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kontrak</td>
                                        <td><?= $branch->nama_vendor ?> - <?= $branch->no_pks ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Log</td>
                                        <td><?= $branch->user_log ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('serverbranch') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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