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
                    <div class="card-header">
                        <h6><?= $fisik->nama_app ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="30%">Kode Asset</td>
                                    <td class="font-weight-bold"><?= $fisik->kode_aset ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Aplikasi</td>
                                    <td class="font-weight-bold"><?= $fisik->nama_app ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Aplikasi</td>
                                    <td class="font-weight-bold"><?= $fisik->jenis_app ?></td>
                                </tr>
                                <tr>
                                    <td>IP Address</td>
                                    <td class="font-weight-bold"><?= $fisik->ip_address ?></td>
                                </tr>
                                <tr>
                                    <td>Hostname</td>
                                    <td class="font-weight-bold"><?= $fisik->hostname ?></td>
                                </tr>
                                <tr>
                                    <td>Rak</td>
                                    <td class="font-weight-bold"><?= $fisik->nama_rak ?></td>
                                </tr>
                                <tr>
                                    <td>Rak Unit</td>
                                    <td class="font-weight-bold"><?= $fisik->rak_unit ?></td>
                                </tr>
                                <tr>
                                    <td>Vendor</td>
                                    <td class="font-weight-bold"><?= $fisik->nama_vendor ?></td>
                                </tr>
                                <tr>
                                    <td>Merek</td>
                                    <td class="font-weight-bold"><?= $fisik->merk ?></td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td class="font-weight-bold"><?= $fisik->tipe ?></td>
                                </tr>
                                <tr>
                                    <td>Operating System</td>
                                    <td class="font-weight-bold"><?= $fisik->os ?></td>
                                </tr>
                                <tr>
                                    <td>Disk</td>
                                    <?php if ($fisik->disk > 999) : ?>
                                        <td class="font-weight-bold">
                                            <?= $fisik->disk / 1000 ?> TB
                                        </td>
                                    <?php else : ?>
                                        <td class="font-weight-bold">
                                            <?= $fisik->disk ?> GB
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td class="font-weight-bold"><?= $fisik->memory ?> GB</td>
                                </tr>
                                <tr>
                                    <td>Processor</td>
                                    <td class="font-weight-bold"><?= $fisik->processor ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td class="font-weight-bold"><?= $fisik->lokasi ?></td>
                                </tr>
                                <tr>
                                    <td>Start of Service</td>
                                    <td class="font-weight-bold"><?= $fisik->sos ?></td>
                                </tr>
                                <tr>
                                    <td>End of Service</td>
                                    <td class="font-weight-bold"><?= $fisik->eos ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor PKS</td>
                                    <td class="font-weight-bold"><?= $fisik->no_pks ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer form-group d-flex justify-content-end">
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