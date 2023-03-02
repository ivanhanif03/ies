<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Virtual Machine</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('virtualmachine') ?>">Server Virtual Machine</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold"><?= $virtualmachine->nama_vm ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td width="30%">Cluster</td>
                                        <td><?= $virtualmachine->nama_cluster ?></td>
                                    </tr>
                                    <tr>
                                        <td>Operating System</td>
                                        <td><?= $virtualmachine->nama_os ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Virtual Machine</td>
                                        <td><?= $virtualmachine->nama_vm ?></td>
                                    </tr>
                                    <tr>
                                        <td>Host</td>
                                        <td><?= $virtualmachine->host ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address</td>
                                        <td><?= $virtualmachine->ip_address ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $virtualmachine->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disk</td>
                                        <?php if ($virtualmachine->disk > 999) : ?>
                                            <td>
                                                <?= $virtualmachine->disk / 1000 ?> TB
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= $virtualmachine->disk ?> GB
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $virtualmachine->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $virtualmachine->processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Server</td>
                                        <td><?= $virtualmachine->jenis_server ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lisence</td>
                                        <td><?= $virtualmachine->lisence ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('virtualmachine') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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