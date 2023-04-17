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
                <div class="card">
                    <div class="card-body">
                        <div class="section-title mt-0 mb-3 font-weight-bold"><?= $vendor['nama_vendor'] ?></div>
                        <table class="table table-sm table-striped text-dark">
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td width="30%">Nama Vendor</td>
                                    <td><?= $vendor['nama_vendor'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?= $vendor['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>PIC</td>
                                    <td><?= $vendor['pic'] ?></td>
                                </tr>
                                <tr>
                                    <td>No HP PIC</td>
                                    <td><?= $vendor['pic_phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Akun Manager</td>
                                    <td><?= $vendor['akun_manager'] ?></td>
                                </tr>
                                <tr>
                                    <td>No HP Akun Manager</td>
                                    <td><?= $vendor['akun_manager_phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Helpdesk</td>
                                    <td><?= $vendor['helpdesk'] ?></td>
                                </tr>
                                <tr>
                                    <td>No HP Helpdesk</td>
                                    <td><?= $vendor['helpdesk_phone'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('vendor') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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