<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Cloud Server</h1>
        <div class="section-header-breadcrumb buttons">
            <?php if (in_groups('admin')) : ?>
                <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-cloud"><i class="fas fa-file-excel"></i> Import Excel</a>
            <?php endif; ?>
            <?php if (in_groups('operator') || in_groups('admin')) : ?>
                <a href="<?= base_url('cloud/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Server</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <!-- Aler Start -->
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert" id="alert-delete">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <!-- Aler End -->

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableCloud" width="100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">
                                            No
                                        </th>
                                        <th>Aplikasi</th>
                                        <th>Provider Cloud</th>
                                        <th>Operating System</th>
                                        <th>Nama Cloud</th>
                                        <th>IP Address</th>
                                        <th>Hostname</th>
                                        <th>Disk</th>
                                        <th>Memory</th>
                                        <th>Processor</th>
                                        <th>Jenis Server</th>
                                        <th>Jenis Payment</th>
                                        <th>Biaya</th>
                                        <th>Masa Aktif</th>
                                        <th>Status</th>
                                        <th>User Log</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($cloud as $cloud) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $cloud['nama_app']; ?></td>
                                            <td><?= $cloud['nama_provider']; ?></td>
                                            <td><?= $cloud['nama_os']; ?></td>
                                            <td><?= $cloud['nama_cloud']; ?></td>
                                            <td><?= $cloud['ip_address']; ?></td>
                                            <td><?= $cloud['hostname']; ?></td>
                                            <td>
                                                <?php
                                                if ($cloud['disk'] > 999) : ?>
                                                    <?= $cloud['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $cloud['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $cloud['memory']; ?> Gb</td>
                                            <td><?= $cloud['jumlah_core']; ?> X <?= $cloud['processor']; ?> Socket (<?= $cloud['jumlah_core'] * $cloud['processor']; ?> Core)</td>
                                            <td><?= $cloud['jenis_server']; ?></td>
                                            <td><?= $cloud['jenis_payment']; ?></td>
                                            <td>Rp <?= number_format($cloud['biaya'], 0, '', '.'); ?></td>
                                            <td><?= $cloud['masa_aktif']; ?></td>
                                            <td class="text-center">
                                                <?php
                                                $status = (strtotime($cloud['masa_aktif']) - strtotime(date('y-m-d')));
                                                if (($status > 604800) && ($status <= 2592000)) : ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Masa aktif kurang dari 30 Hari" href="">
                                                        <div class="badge badge-success">&nbsp;</div>
                                                    </a>
                                                <?php
                                                elseif (($status > 86400) && ($status <= 604800)) : ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Masa aktif kurang dari 7 Hari" href="">
                                                        <div class="badge badge-warning">&nbsp;</div>
                                                    </a>
                                                <?php
                                                elseif (($status >= 0) && ($status <= 86400)) : ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Masa aktif kurang dari 1 Hari" href="">
                                                        <div class="badge badge-danger">&nbsp;</div>
                                                    </a>
                                                <?php
                                                elseif ($status < 0) : ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Nonaktif" href="">
                                                        <div class="badge badge-secondary">&nbsp;</div>
                                                    </a>
                                                <?php else : ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?=
                                                explode(' ', trim($cloud['user_log']))[0]
                                                ?>
                                            </td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('admin')) : ?>
                                                        <a href="<?= base_url('cloud/edit') . '/' . $cloud['id'] ?>" class="dropdown-item has-icon">
                                                            <i class="far fa-edit text-success"></i> Edit
                                                        </a>
                                                    <?php endif; ?>

                                                    <!-- AKSES ALL -->
                                                    <a href="<?= base_url('cloud/detail') . '/' . $cloud['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('admin')) : ?>
                                                        <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-cloud<?= $cloud['id'] ?>">
                                                            <i class="fas fa-trash text-danger"></i> Delete
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-cloud<?= $cloud['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $cloud['nama_cloud']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/cloud') . '/' . $cloud['id']; ?>" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Modal Upload Excel -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-excel-cloud">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Server Virtual Machine</h5>
                <a href="<?= base_url('template_xls/template_cloud.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
            </div>
            <div class="modal-body text-center">
                <?php
                if (session()->getFlashdata('message')) {
                ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php
                }
                ?>
                <form method="post" action="/cloud/saveExcel" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">
                    <div class="form-group">
                        <label for="filexcel">Upload file excel</label>
                        <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
                    </div>
                    <small class="text-danger">Pastikan melakukan delete kolom pada seluruh bagian kolom yang kosong</small>
            </div>
            <div class="modal-footer bg-whitesmoke justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Upload Excel -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Current Date
        var currentdate = new Date();
        var datetime = " - " + currentdate.getDate() + "/" +
            (currentdate.getMonth() + 1) + "/" +
            currentdate.getFullYear() + " " +
            currentdate.getHours() + ":" +
            currentdate.getMinutes() + ":" +
            currentdate.getSeconds();

        // Datatables with Buttons
        var datatablesCloud = $("#tableCloud").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [7, 8, 9, 10, 11],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Server Cloud Bank BTN' + datetime,
                    messageTop: 'Data Total Server Virtual Machine Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className: 'btn btn-outline-danger',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Server Cloud Bank BTN' + datetime,
                    messageTop: 'Data Total Server Virtual Machine Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatablesCloud.buttons().container().appendTo("#tableCloud_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>