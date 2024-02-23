<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('rak/detail') . '/' . $fisik->rak_id ?>">Detail <?= $fisik->nama_rak ?></a></div>
            <div class="breadcrumb-item">Detail Server Fisik</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold"><?= $fisik->nama_app ?> - Rak Unit <?= $fisik->rak_unit ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td>Rak</td>
                                        <td><?= $fisik->nama_rak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rak Unit</td>
                                        <td><?= $fisik->rak_unit ?></td>
                                    </tr>
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
                                    <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                                        <tr>
                                            <td>Username OS</td>
                                            <td><?= $fisik->username_os ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password OS</td>
                                            <td><?= $fisik->password_os ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username ILO</td>
                                            <td><?= $fisik->username_ilo ?></td>
                                        </tr>
                                        <tr>
                                            <td>Password ILO</td>
                                            <td><?= $fisik->password_ilo ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $fisik->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Appliance</td>
                                        <td><?= $fisik->jenis_appliance ?></td>
                                    </tr>
                                    <tr>
                                        <td>No PKS Vendor Software</td>
                                        <td><?= $fisik->n1 ?> - <?= $fisik->v1 ?> - <?= $fisik->k1 ?></td>
                                    </tr>
                                    <tr>
                                        <td>No PKS Vendor Hardware</td>
                                        <td><?= $fisik->n2 ?> - <?= $fisik->v2 ?> - <?= $fisik->k2 ?></td>
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
                                        <td><?= $fisik->nama_os ?></td>
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
                                        <td>Tipe Disk</td>
                                        <td><?= $fisik->tipe_disk ?></td>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $fisik->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Memory</td>
                                        <td><?= $fisik->tipe_memory ?></td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $fisik->processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Logical Processor</td>
                                        <td><?= $fisik->logical_processor ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td><?= $fisik->lokasi ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Log</td>
                                        <td><?= $fisik->user_log ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('rak/detail') . '/' . $fisik->rak_id ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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