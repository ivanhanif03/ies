<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('vendor') ?>">Server Fisik</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h6><?= $fisik['nama_server']; ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                Merek
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['merk'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mt-n4">
                                Tipe
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['tipe'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Operating System
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['os'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Disk
                            </div>
                            <div class="col-9">
                                <p>:<?php
                                    if ($fisik['disk'] > 999) : ?>
                                    <?= $fisik['disk'] / 1000 ?> Tb
                                <?php else : ?>
                                    <?= $fisik['disk'] ?> Gb
                                <?php endif; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Memory
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['memory'] ?> Gb</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Processor
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['processor'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                lokasi
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['lokasi'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Vendor
                            </div>
                            <div class="col-9">
                                <p>: <?= $nama_vendor ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Start Of Service
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['sos'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                End Of Service
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['eos'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Lisensi
                            </div>
                            <div class="col-9">
                                <p>: <?= $fisik['lisensi'] ?></p>
                            </div>
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