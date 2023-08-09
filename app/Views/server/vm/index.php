<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Virtual Machine</h1>
        <div class="section-header-breadcrumb buttons">
            <?php if (in_groups('admin')) : ?>
                <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-vm"><i class="fas fa-file-excel"></i> Import Excel</a>
            <?php endif; ?>
            <?php if (in_groups('operator') || in_groups('admin')) : ?>
                <a href="<?= base_url('virtualmachine/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Server</a>
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
                            <table class="table table-striped" id="tableVm" width="100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">
                                            No
                                        </th>
                                        <th>Aplikasi</th>
                                        <th>Cluster</th>
                                        <th>Operating System</th>
                                        <th>Nama VM</th>
                                        <th>IP Address</th>
                                        <th>Hostname</th>
                                        <th>Disk</th>
                                        <th>Memory</th>
                                        <th>Processor</th>
                                        <th>Jenis Server</th>
                                        <th>Lisence</th>
                                        <th>Lokasi</th>
                                        <th>Masa Aktif</th>
                                        <th>Status Replikasi</th>
                                        <th>Status</th>
                                        <th>User Log</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($virtualmachine as $vm) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $vm['nama_app']; ?></td>
                                            <td><?= $vm['nama_cluster']; ?></td>
                                            <td><?= $vm['nama_os']; ?></td>
                                            <td><?= $vm['nama_vm']; ?></td>
                                            <td><?= $vm['ip_address']; ?></td>
                                            <td><?= $vm['hostname']; ?></td>
                                            <td>
                                                <?php
                                                if ($vm['disk'] > 999) : ?>
                                                    <?= $vm['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $vm['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $vm['memory']; ?> Gb</td>
                                            <td><?= $vm['jumlah_core']; ?> X <?= $vm['processor']; ?> Socket (<?= $vm['jumlah_core'] * $vm['processor']; ?> Core)</td>
                                            <td><?= $vm['jenis_server']; ?></td>
                                            <td><?= $vm['lisence']; ?></td>
                                            <td><?= $vm['data_center']; ?></td>
                                            <td><?= $vm['masa_aktif']; ?></td>
                                            <td>
                                                <?php if ($vm['replikasi'] == 'database_replikasi') : ?>
                                                    Replikasi Database
                                                <?php elseif ($vm['replikasi'] == 'site_recovery_manajemen') : ?>
                                                    Site Recovery Management
                                                <?php else : ?>
                                                    Belum Replikasi
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $status = (strtotime($vm['masa_aktif']) - strtotime(date('y-m-d')));
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
                                                explode(' ', trim($vm['user_log']))[0]
                                                ?>
                                            </td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('admin')) : ?>
                                                        <a href="<?= base_url('virtualmachine/edit') . '/' . $vm['id'] ?>" class="dropdown-item has-icon">
                                                            <i class="far fa-edit text-success"></i> Edit
                                                        </a>
                                                    <?php endif; ?>

                                                    <!-- AKSES ALL -->
                                                    <a href="<?= base_url('virtualmachine/detail') . '/' . $vm['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('admin')) : ?>
                                                        <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-vm<?= $vm['id'] ?>">
                                                            <i class="fas fa-trash text-danger"></i> Delete
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-vm<?= $vm['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $vm['nama_vm']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/virtualmachine') . '/' . $vm['id']; ?>" method="post">
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-excel-vm">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Server Virtual Machine</h5>
                <a href="<?= base_url('template_xls/template_vm.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
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
                <form method="post" action="/virtualmachine/saveExcel" enctype="multipart/form-data">
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
        var datatablesVm = $("#tableVm").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [7, 8, 9, 10, 11, 14],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Server VM Bank BTN' + datetime,
                    messageTop: 'Data Total Server Virtual Machine Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
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
                    title: 'Server VM Bank BTN' + datetime,
                    messageTop: 'Data Total Server Virtual Machine Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatablesVm.buttons().container().appendTo("#tableVm_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>