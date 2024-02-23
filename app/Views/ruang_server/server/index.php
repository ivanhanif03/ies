<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Daftar Server Kantor Cabang</h1>
        <div class="section-header-breadcrumb buttons">
            <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-server-branch"><i class="fas fa-file-excel"></i> Import Excel</a>
            <?php endif; ?>
            <?php if ((in_groups('operator') || in_groups('admin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                <a href="<?= base_url('serverbranch/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Server Branch</a>
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
                            <table class="table table-striped" id="tableServerBranch" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">
                                            No
                                        </th>
                                        <th>KC/KCS</th>
                                        <th>KCP/KCPS</th>
                                        <th>Kode Aset</th>
                                        <th>Serial Number</th>
                                        <th>IP Address Data</th>
                                        <th>IP Address Management</th>
                                        <th>Hostname</th>
                                        <th>OS</th>
                                        <th>Processor</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>Disk</th>
                                        <th>Tipe Disk</th>
                                        <th>Memory</th>
                                        <th>Tipe Memory</th>
                                        <th>Kontrak</th>
                                        <th>User Log</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($branch as $b) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $b['jenis_kc']; ?>&nbsp;<?= $b['nama_kc'] ?></td>
                                            <?php
                                            if ($b['kcp_id'] == null) :
                                            ?>
                                                <td><?= $b['jenis_kc']; ?>&nbsp;<?= $b['nama_kc'] ?></td>
                                            <?php
                                            else :
                                            ?>
                                                <td><?= $b['jenis_kcp']; ?>&nbsp;<?= $b['nama_kcp'] ?></td>
                                            <?php endif; ?>

                                            <td><?= $b['kode_aset']; ?></td>
                                            <td><?= $b['serial_number']; ?></td>
                                            <td><?= $b['ip_address_data']; ?></td>
                                            <td><?= $b['ip_address_management']; ?></td>
                                            <td><?= $b['hostname']; ?></td>
                                            <td><?= $b['nama_os']; ?></td>
                                            <td><?= $b['processor']; ?></td>
                                            <td><?= $b['merek']; ?></td>
                                            <td><?= $b['tipe']; ?></td>
                                            <td>
                                                <?php
                                                if ($b['disk'] > 999) : ?>
                                                    <?= $b['disk'] / 1000 ?> TB
                                                <?php else : ?>
                                                    <?= $b['disk'] ?> GB
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $b['tipe_disk']; ?> </td>
                                            <td><?= $b['memory']; ?> GB</td>
                                            <td><?= $b['tipe_memory']; ?> </td>
                                            <td><?= $b['nama_vendor'] ?> - <?= $b['no_pks'] ?></td>
                                            <td>
                                                <?=
                                                explode(' ', trim($b['user_log']))[0]
                                                ?>
                                            </td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                                                        <a href="<?= base_url('serverbranch/edit') . '/' . $b['id'] ?>" class="dropdown-item has-icon">
                                                            <i class="far fa-edit text-success"></i> Edit
                                                        </a>
                                                    <?php endif; ?>

                                                    <!-- AKSES ALL -->
                                                    <a href="<?= base_url('serverbranch/detail') . '/' . $b['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                                                        <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-server-branch<?= $b['id'] ?>">
                                                            <i class="fas fa-trash text-danger"></i> Delete
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-server-branch<?= $b['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server Branch</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $b['kode_aset']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/serverbranch') . '/' . $b['id']; ?>" method="post">
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-excel-server-branch">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Server Branch</h5>
                <a href="<?= base_url('template_xls/template_serverbranch.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
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
                <form method="post" action="/serverbranch/saveExcel" enctype="multipart/form-data">
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
        var datatableServerBranch = $("#tableServerBranch").DataTable({
            // responsive: true,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [3, 4, 6, 11, 13, 15, 16],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Daftar Server Branch' + datetime,
                    className: 'btn btn-outline-success',
                    messageTop: 'Data Total Server Branch Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
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
                    // text: 'Download PDF',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Daftar Server Branch' + datetime,
                    messageTop: 'Data Total Server Branch Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatableServerBranch.buttons().container().appendTo("#tableServerBranch_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>