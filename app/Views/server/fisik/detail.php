<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('serverfisik') ?>">Server Fisik</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold"><?= $fisik->nama_app ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td width="30%">Kode Asset</td>
                                        <td><?= $fisik->kode_aset ?></td>
                                    </tr>
                                    <tr>
                                        <td>Serial Number</td>
                                        <td><?= $fisik->serial_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Aplikasi</td>
                                        <td><?= $fisik->nama_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Aplikasi</td>
                                        <td><?= $fisik->jenis_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address Data</td>
                                        <td><?= $fisik->ip_address_data ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address Management</td>
                                        <td><?= $fisik->ip_address_management ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $fisik->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Appliance</td>
                                        <td><?= $fisik->jenis_appliance ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rak</td>
                                        <td><?= $fisik->nama_rak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rak Unit</td>
                                        <td><?= $fisik->rak_unit ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vendor Software</td>
                                        <td><?= $fisik->v1 ?></td>
                                    </tr>
                                    <tr>
                                        <td>Vendor Hardware</td>
                                        <td><?= $fisik->v2 ?></td>
                                    </tr>
                                    <tr>
                                        <td>Merek</td>
                                        <td><?= $fisik->merek ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tipe</td>
                                        <td><?= $fisik->tipe ?></td>
                                    </tr>
                                    <tr>
                                        <td>Operating System</td>
                                        <td><?= $fisik->os ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disk</td>
                                        <?php if ($fisik->disk > 999) : ?>
                                            <td>
                                                <?= $fisik->disk / 1000 ?> TB
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= $fisik->disk ?> GB
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $fisik->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $fisik->processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td><?= $fisik->lokasi ?></td>
                                    </tr>
                                    <tr>
                                        <td>Start of Service</td>
                                        <td><?= $fisik->sos ?></td>
                                    </tr>
                                    <tr>
                                        <td>End of Service</td>
                                        <td><?= $fisik->eos ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor PKS</td>
                                        <td><?= $fisik->no_pks ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('serverfisik') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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