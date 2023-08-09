<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Kontrak</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Kontrak</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title mt-0 mb-3 font-weight-bold"><?= $kontrak->nama_kontrak ?></div>
                        <table class="table table-sm table-striped text-dark">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td width="30%">Nama Kontrak</td>
                                    <td><?= $kontrak->nama_kontrak ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Nama Vendor</td>
                                    <td><?= $kontrak->nama_vendor ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor PKS/SPK</td>
                                    <td><?= $kontrak->no_pks ?></td>
                                </tr>
                                <tr>
                                    <td>Nilai Kontrak</td>
                                    <td>Rp <?= number_format($kontrak->nilai_kontrak, 0, '', '.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Scope of Work</td>
                                    <td><?= $kontrak->scope_work ?></td>
                                </tr>
                                <tr>
                                    <td>Start of Kontrak</td>
                                    <td><?= $kontrak->start_kontrak ?></td>
                                </tr>
                                <tr>
                                    <td>End of Kontrak</td>
                                    <td><?= $kontrak->end_kontrak ?></td>
                                </tr>
                                <tr>
                                    <td>Tempo Pembayaran</td>
                                    <td><?= $kontrak->tempo_pembayaran ?></td>
                                </tr>
                                <tr>
                                    <td>User Log</td>
                                    <td><?= $kontrak->user_log ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('kontrak') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
                    </div>
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