<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail PC Branch</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('pcbranch') ?>">Daftar PC Branch</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold">Server <?= $pc_branch->jenis_kc ?>&nbsp;<?= $pc_branch->nama_kc ?> - <?= $pc_branch->kode_kc ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <?php if ($pc_branch->kcp_id == null) : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td width="30%"><?= $pc_branch->jenis_kcp ?></td>
                                            <td><?= $pc_branch->kode_kcp ?> - <?= $pc_branch->jenis_kcp ?>&nbsp;<?= $pc_branch->nama_kcp ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>Kode Aset</td>
                                        <td><?= $pc_branch->kode_aset ?></td>
                                    </tr>
                                    <tr>
                                        <td>Serial Number</td>
                                        <td><?= $pc_branch->serial_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address</td>
                                        <td><?= $pc_branch->ip_address ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $pc_branch->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Operating System</td>
                                        <td><?= $pc_branch->nama_os ?></td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $pc_branch->processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Merek</td>
                                        <td><?= $pc_branch->merek ?></td>
                                    <tr>
                                        <td>Tipe</td>
                                        <td><?= $pc_branch->tipe ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disk</td>
                                        <?php if ($pc_branch->disk > 999) : ?>
                                            <td>
                                                <?= $pc_branch->disk / 1000 ?> TB
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= $pc_branch->disk ?> GB
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Tipe Disk</td>
                                        <td><?= $pc_branch->tipe_disk ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $pc_branch->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Memory</td>
                                        <td><?= $pc_branch->tipe_memory ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Log</td>
                                        <td><?= $pc_branch->user_log ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('pcbranch') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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