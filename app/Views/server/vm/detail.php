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
                                        <td>Aplikasi</td>
                                        <td><?= $virtualmachine->nama_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Virtual Machine</td>
                                        <td><?= $virtualmachine->nama_vm ?></td>
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
                                        <td><?= $virtualmachine->jumlah_core ?> X <?= $virtualmachine->processor ?> Socket (<?= $virtualmachine->jumlah_core * $virtualmachine->processor ?> Core)</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Server</td>
                                        <td><?= $virtualmachine->jenis_server ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lisence</td>
                                        <td><?= $virtualmachine->lisence ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td><?= $virtualmachine->data_center ?></td>
                                    </tr>
                                    <tr>
                                        <td>Masa Aktif</td>
                                        <td><?= $virtualmachine->masa_aktif ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Replikasi</td>
                                        <?php if ($virtualmachine->replikasi == 'database_replikasi') : ?>
                                            <td>Replikasi Database</td>
                                        <?php elseif ($virtualmachine->replikasi == 'site_recovery_manajemen') : ?>
                                            <td>SRM</td>
                                        <?php else : ?>
                                            <td>Belum Replikasi</td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td>Memo</td>
                                        <td>
                                            <?php if ($virtualmachine->memo_vm == 'kosong') : ?>
                                                Tidak ada MEMO
                                            <?php else : ?>
                                                <a href="<?= base_url('uploads/memo_vm/' . $virtualmachine->memo_vm) ?>" target="_blank"><?= $virtualmachine->memo_vm ?></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <?php
                                        $status = (strtotime($virtualmachine->masa_aktif) - strtotime(date('y-m-d')));
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
                                        elseif (($status > 0) && ($status <= 86400)) : ?>
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
                                        <td><?= $virtualmachine->user_log ?></td>
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