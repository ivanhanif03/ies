<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header bg-white">
        <h1>Server Fisik Dismantle</h1>
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
                            <table class="table table-striped" id="tableFisik" width="100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">
                                            No
                                        </th>
                                        <th>Kode Aset</th>
                                        <th>Serial Number</th>
                                        <th>Nama App</th>
                                        <th>Jenis App</th>
                                        <th>IP Address Data</th>
                                        <th>IP Address Mngmt</th>
                                        <th>Hostname</th>
                                        <th>Jenis Appliance</th>
                                        <th>Rak</th>
                                        <th>Rak Unit</th>
                                        <th>Vendor HW</th>
                                        <th>Vendor SW</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>OS</th>
                                        <th>Disk</th>
                                        <th>Memory</th>
                                        <th>Processor</th>
                                        <th>Logical Processor</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Dismantle</th>
                                        <th>User Log</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($fisik_dismantle as $fd) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $fd['kode_aset']; ?></td>
                                            <td><?= $fd['serial_number']; ?></td>
                                            <td><?= $fd['nama_app']; ?></td>
                                            <td><?= $fd['jenis_app']; ?></td>
                                            <td><?= $fd['ip_address_data']; ?></td>
                                            <td><?= $fd['ip_address_management']; ?></td>
                                            <td><?= $fd['hostname']; ?></td>
                                            <td><?= $fd['jenis_appliance']; ?></td>
                                            <td><?= $fd['nama_rak']; ?></td>
                                            <td><?= $fd['rak_unit']; ?></td>
                                            <td><?= $fd['v2']; ?></td>
                                            <td><?= $fd['v1']; ?></td>
                                            <td><?= $fd['merek']; ?></td>
                                            <td><?= $fd['tipe']; ?></td>
                                            <td class="text-capitalize"><?= $fd['nama_os']; ?></td>
                                            <td>
                                                <?php
                                                if ($fd['disk'] > 999) : ?>
                                                    <?= $fd['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $fd['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $fd['memory']; ?> Gb</td>
                                            <td><?= $fd['jumlah_core'] ?> X <?= $fd['processor']; ?> Sockets = <?= $fd['jumlah_core'] * $fd['processor']; ?> Core</td>
                                            <td><?= $fd['logical_processor']; ?></td>
                                            <td class="text-capitalize"><?= $fd['lokasi']; ?></td>
                                            <td><?= $fd['dismantle']; ?></td>
                                            <td>
                                                <?=
                                                explode(' ', trim($fd['user_log']))[0]
                                                ?>
                                            </td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">

                                                    <!-- AKSES ALL -->
                                                    <a href="<?= base_url('serverfisik/detail_dismantle') . '/' . $fd['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if ((in_groups('admin') || in_groups('superadmin')) && ((user()->department) == "IES" || (user()->department) == "SUPERADMIN")) : ?>
                                                        <hr>
                                                        <a>
                                                            <?php if ($fd['dismantle'] == null) : ?>
                                                                <form action="<?= base_url('serverfisik/dismantlebtn') . '/' . $fd['id'] ?>" method="POST">
                                                                    <?= csrf_field() ?>
                                                                    <button type="submit" class="dropdown-item text-center text-danger font-weight-bold">Dismantle
                                                                    </button>
                                                                </form>
                                                            <?php else : ?>
                                                                <form action="<?= base_url('serverfisik/nondismantlebtn') . '/' . $fd['id'] ?>" method="POST">
                                                                    <?= csrf_field() ?>
                                                                    <button type="submit" class="dropdown-item text-center text-danger font-weight-bold">Batal Dismantle
                                                                    </button>
                                                                </form>
                                                            <?php endif; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-fisik<?= $fd['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $fd['nama_app']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/serverfisik') . '/' . $fd['id']; ?>" method="post">
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
                <h5 class="modal-title">File Excel Server Fisik</h5>
                <a href="<?= base_url('template_xls/template_baremetal.xlsx') ?>" target="_blank"><small class="text-success">Download Template Excel</small></a>
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
                <form method="post" action="/serverfisik/saveExcel" enctype="multipart/form-data">
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
        var datatablesFisik = $("#tableFisik").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [8, 9, 10, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Server Fisik Bank BTN' + datetime,
                    messageTop: 'Data Total Server Fisik Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
                    },
                    action: function(e, dt, button, config) {
                        //The action of the button
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config); //Export the data
                        window.location.reload(false); //Relode the page
                    }
                },
                // {
                //     extend: 'pdfHtml5',
                //     className: 'btn btn-outline-danger',
                //     orientation: 'landscape',
                //     pageSize: 'LEGAL',
                //     title: 'Server Fisik',
                //     messageTop: 'Data Total Server Fisik Bank BTN' + datetime,
                //     exportOptions: {
                //         columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                //     }
                // }
            ]
        });
        datatablesFisik.buttons().container().appendTo("#tableFisik_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>