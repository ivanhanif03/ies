<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail Server Cloud</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('cloud') ?>">Daftar Server Cloud</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="section-title mt-0 mb-3 font-weight-bold"><?= $cloud->nama_cloud ?></div>
                            <table class="table table-sm table-striped text-dark">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td width="30%">Cluster</td>
                                        <td><?= $cloud->nama_provider ?></td>
                                    </tr>
                                    <tr>
                                        <td>Operating System</td>
                                        <td><?= $cloud->nama_os ?></td>
                                    </tr>
                                    <tr>
                                        <td>Aplikasi</td>
                                        <td><?= $cloud->nama_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Cloud Server</td>
                                        <td><?= $cloud->nama_cloud ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Address</td>
                                        <td><?= $cloud->ip_address ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hostname</td>
                                        <td><?= $cloud->hostname ?></td>
                                    </tr>
                                    <tr>
                                        <td>Disk</td>
                                        <?php if ($cloud->disk > 999) : ?>
                                            <td>
                                                <?= $cloud->disk / 1000 ?> TB
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <?= $cloud->disk ?> GB
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td><?= $cloud->memory ?> GB</td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td><?= $cloud->jumlah_core ?> X <?= $cloud->processor ?> Socket (<?= $cloud->jumlah_core * $cloud->processor ?> Core)</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Server</td>
                                        <td><?= $cloud->jenis_server ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Payment</td>
                                        <td><?= $cloud->jenis_payment ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td>Rp <?= number_format($cloud->biaya, 0, '', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Masa Aktif</td>
                                        <td><?= $cloud->masa_aktif ?></td>
                                    </tr>

                                    <tr>
                                        <td>Memo</td>
                                        <td>
                                            <?php if ($cloud->memo == 'kosong') : ?>
                                                Tidak ada MEMO
                                            <?php else : ?>
                                                <a href="<?= base_url('uploads/memo_cloud/' . $cloud->memo) ?>" target="_blank"><?= $cloud->memo ?></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <?php
                                        $status = (strtotime($cloud->masa_aktif) - strtotime(date('y-m-d')));
                                        if (($status > 604800) && ($status <= 2592000)) : ?>
                                            <td>
                                                <div class="badge badge-success">
                                                    Masa aktif kurang dari 30 Hari
                                                </div>
                                            </td>
                                        <?php
                                        elseif (($status > 86400) && ($status <= 604800)) : ?>
                                            <td>
                                                <div class="badge badge-warning">
                                                    Masa aktif kurang dari 7 Hari
                                                </div>
                                            </td>
                                        <?php
                                        elseif (($status >= 0) && ($status <= 86400)) : ?>
                                            <td>
                                                <div class="badge badge-danger">
                                                    Masa aktif kurang dari 1 Hari
                                                </div>
                                            </td>
                                        <?php
                                        elseif ($status < 0) : ?>
                                            <td>
                                                <div class="badge badge-secondary">
                                                    Nonaktif
                                                </div>
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <div class="badge badge-primary">
                                                    Masa aktif lebih dari 30 hari
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>User Log</td>
                                        <td><?= $cloud->user_log ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="<?= base_url('cloud') ?>" class="btn btn-md btn-primary mr-1">Kembali</a>
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