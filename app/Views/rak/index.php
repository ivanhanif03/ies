<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Rak Server</h1>
        <div class="section-header-breadcrumb buttons">
            <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-app"><i class="fas fa-file-excel"></i> Import Excel</a>
            <a href="<?= base_url('rak/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Rak</a>
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
                            <table class="table table-striped" id="tableRak" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">
                                            No
                                        </th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($rak as $r) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $r['id']; ?></td>
                                            <td><?= $r['nama_rak']; ?></td>
                                            <td><?= $r['lokasi']; ?></td>
                                            <td class="dropdown text-center">
                                                <!-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i></a> -->
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <a href="<?= base_url('rak/edit') . '/' . $r['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('rak/detail') . '/' . $r['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete<?= $r['id'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete<?= $r['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Rak</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $r['nama_rak']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('rak') . '/' . $r['id']; ?>" method="post">
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-excel-app">
    <div class="modal-dialog modal-sm">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Rak Server</h5>
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
                <form method="post" action="/rak/saveExcel" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="filexcel">Upload file excel</label>
                        <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
                    </div>
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
        var datatablesRaks = $("#tableRak").DataTable({
            // responsive: true,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [1],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Daftar Rak Server' + datetime,
                    className: 'btn btn-outline-success',
                    messageTop: 'Data Total Rak Server Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                },
                {
                    extend: 'pdfHtml5',
                    // orientation: 'potrait',
                    pageSize: 'LEGAL',
                    className: 'btn btn-outline-danger',
                    title: 'Daftar Rak Server' + datetime,
                    messageTop: 'Data Total Rak Server Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatablesRaks.buttons().container().appendTo("#tableRak_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>