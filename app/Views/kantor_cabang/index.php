<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Daftar Kantor Cabang</h1>
        <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
            <div class="section-header-breadcrumb buttons">
                <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-kantor_cabang"><i class="fas fa-file-excel"></i> Import Excel</a>
                <a href="<?= base_url('kantor_cabang/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah KC</a>
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
                        <div class="text-right mb-3">
                            <span class="font-weight-bold h6">RO : </span>
                            <button id="1" class="btn btn-outline-primary btn-md mb-2">1</button>
                            <button id="2" class="btn btn-outline-primary btn-md mb-2">2</button>
                            <button id="3" class="btn btn-outline-primary btn-md mb-2">3</button>
                            <button id="4" class="btn btn-outline-primary btn-md mb-2">4</button>
                            <button id="5" class="btn btn-outline-primary btn-md mb-2">5</button>
                            <button id="6" class="btn btn-outline-primary btn-md mb-2">6</button>
                            <button id="all" class="btn btn-outline-warning btn-md mb-2">ALL RO</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tablekantor_cabang" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">
                                            No
                                        </th>
                                        <th>Regional</th>
                                        <th>Kode Kantor</th>
                                        <th>Nama Kantor Cabang</th>
                                        <th>Jenis Kantor Cabang</th>
                                        <th>Alamat</th>
                                        <th>Nomot Telpon</th>
                                        <th>User Log</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($kantor_cabang as $kc) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $kc['regional']; ?></td>
                                            <td><?= $kc['kode_kantor']; ?></td>
                                            <td><?= $kc['nama_kantor']; ?></td>
                                            <td><?= $kc['jenis_kantor']; ?></td>
                                            <td><?= $kc['alamat']; ?></td>
                                            <td><?= $kc['no_telp']; ?></td>
                                            <td>
                                                <?=
                                                explode(' ', trim($kc['user_log']))[0]
                                                ?>
                                            </td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <a href="<?= base_url('kantor_cabang/edit') . '/' . $kc['kode_kantor'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-kantor_cabang<?= $kc['kode_kantor'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-kantor_cabang<?= $kc['kode_kantor'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Kantor Cabang</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $kc['nama_kantor']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/kantor_cabang') . '/' . $kc['kode_kantor']; ?>" method="post">
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload-excel-kantor_cabang">
    <div class="modal-dialog modal-md">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title">File Excel Kantor Cabang</h5>
                <a href="<?= base_url('template_xls/template_kc.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
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
                <form method="post" action="/kantor_cabang/saveExcel" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="user_log" value="<?= user()->username; ?> - <?= user()->email; ?> - <?= user()->name; ?>">

                    <div class="form-group">
                        <br>
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
        var datatablesOs = $("#tablekantor_cabang").DataTable({
            // responsive: true,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                // visible: false,
                // targets: [1],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Daftar Kantor Cabang' + datetime,
                    className: 'btn btn-outline-success',
                    messageTop: 'Data Total Kantor Cabang Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
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
                    // orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Daftar Kantor Cabang' + datetime,
                    messageTop: 'Data Total Kantor Cabang Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                }
            ]
        });
        datatablesOs.buttons().container().appendTo("#tablekantor_cabang_wrapper .col-md-6:eq(0)");
    });
</script>
<script>
    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#1').on('click', function() {
            filterColumn('1');
        })
    });

    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#2').on('click', function() {
            filterColumn('2');
        })
    });

    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#3').on('click', function() {
            filterColumn('3');
        })
    });

    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#4').on('click', function() {
            filterColumn('4');
        })
    });

    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#5').on('click', function() {
            filterColumn('5');
        })
    });

    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#6').on('click', function() {
            filterColumn('6');
        })
    });
    $(document).ready(function() {
        function filterColumn(value) {
            table.column(1).search(value).draw();
        }

        var table = $('#tablekantor_cabang').DataTable();

        $('#all').on('click', function() {
            filterColumn('');
        })
    });
</script>
<?= $this->endSection(); ?>