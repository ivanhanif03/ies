<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Vendor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Vendor</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6><?= $vendor['nama_vendor']; ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                Alamat
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['alamat'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                PIC
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['pic_phone'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                No. HP PIC
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['pic_phone'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Akun Manager
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['akun_manager'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                No. HP Akun Manager
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['akun_manager_phone'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Helpdesk
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['helpdesk'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                No. HP Helpdesk
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['helpdesk_phone'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Scope of Work
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['scope_work'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Nilai Kontrak
                            </div>
                            <div class="col-9">
                                <p>: Rp <?= number_format($vendor['nilai_kontrak'], 0, '', '.'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Tempo Pembayaran
                            </div>
                            <div class="col-9">
                                <p>: <?= $vendor['tempo_pembayaran'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <a href="<?= base_url('vendor') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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