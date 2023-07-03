<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Kontrak</h1>
        <?php if (in_groups('admin')) : ?>
        <div class="section-header-breadcrumb buttons">
            <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-app"><i class="fas fa-file-excel"></i> Import Excel</a>
            <a href="<?= base_url('kontrak/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Kontrak</a>
        </div>
        <?php endif; ?>
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
                            <table class="table table-striped" id="tableKontrak" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>ID</th>
                                        <th>Nama Kontrak</th>
                                        <th>No PKS</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Scope of Work</th>
                                        <th>Start of Kontrak</th>
                                        <th>End of Kontrak</th>
                                        <th>Tempo Pembayaran</th>
                                        <th>Vendor</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kontrak as $k) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $k['id']; ?></td>
                                            <td><?= $k['nama_kontrak']; ?></td>
                                            <td><?= $k['no_pks']; ?></td>
                                            <td>Rp<?= number_format($k['nilai_kontrak'], 0, '', '.'); ?></td>
                                            <td><?= $k['scope_work']; ?></td>
                                            <td><?= date("d-m-Y", strtotime($k['start_kontrak'])); ?></td>
                                            <td><?= date("d-m-Y", strtotime($k['end_kontrak'])); ?></td>
                                            <td><?= date("d-m-Y", strtotime($k['tempo_pembayaran'])); ?></td>
                                            <td><?= $k['nama_vendor']; ?></td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <?php if (in_groups('admin')) : ?>
                                                    <a href="<?= base_url('kontrak/edit') . '/' . $k['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <?php endif; ?>

                                                    <a href="<?= base_url('kontrak/detail') . '/' . $k['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <?php if (in_groups('admin')) : ?>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete<?= $k['id'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete<?= $k['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Kontrak</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $k['nama_kontrak']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/kontrak') . '/' . $k['id']; ?>" method="post">
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
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Kontrak</h5>
                <a href="<?= base_url('template_xls/template_kontrak.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
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
                <form method="post" action="/kontrak/saveExcel" enctype="multipart/form-data">
                    <?= csrf_field() ?>
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
        var datatablesUsers = $("#tableKontrak").DataTable({

            // responsive: true,
            lengthChange: false,
            columnDefs: [{
                    orderable: false,
                    targets: [0]
                },
                {
                    // visible: false,
                    // targets: [4, 5]
                }
            ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Daftar Kontrak' + datetime,
                    messageTop: 'Data Total Kontrak Infra Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    className: 'btn btn-outline-danger',
                    pageSize: 'LEGAL',
                    title: 'Daftar Kontrak' + datetime,
                    // messageBottom: datetime,
                    messageTop: 'Data Total Kontrak Infra Bank BTN ',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatablesUsers.buttons().container().appendTo("#tableKontrak_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>