<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Server Fisik</h1>
        <?php if (in_groups('operator') || in_groups('admin')) : ?>
            <div class="section-header-breadcrumb buttons">
                <a href="" class="btn btn-outline-success btn-md" data-toggle="modal" data-target="#modal-upload-excel-app"><i class="fas fa-file-excel"></i> Import Excel</a>
                <a href="<?= base_url('serverfisik/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus"></i> Tambah Server</a>
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
                                        <th>Vendor SW</th>
                                        <th>Vendor HW</th>
                                        <th>Merek</th>
                                        <th>Tipe</th>
                                        <th>OS</th>
                                        <th>Disk</th>
                                        <th>Memory</th>
                                        <th>Processor</th>
                                        <th>Lokasi</th>
                                        <th>SOS</th>
                                        <th>EOS</th>
                                        <th>No PKS</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($virtual_machine as $vm) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $vm['kode_aset']; ?></td>
                                            <td><?= $vm['serial_number']; ?></td>
                                            <td><?= $vm['nama_app']; ?></td>
                                            <td><?= $vm['jenis_app']; ?></td>
                                            <td><?= $vm['ip_address_data']; ?></td>
                                            <td><?= $vm['ip_address_management']; ?></td>
                                            <td><?= $vm['hostname']; ?></td>
                                            <td><?= $vm['jenis_appliance']; ?></td>
                                            <td><?= $vm['nama_rak']; ?></td>
                                            <td><?= $vm['rak_unit']; ?></td>
                                            <td><?= $vm['v1']; ?></td>
                                            <td><?= $vm['v2']; ?></td>
                                            <td><?= $vm['merek']; ?></td>
                                            <td><?= $vm['tipe']; ?></td>
                                            <td class="text-capitalize"><?= $vm['nama_os']; ?></td>
                                            <td>
                                                <?php
                                                if ($vm['disk'] > 999) : ?>
                                                    <?= $vm['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $vm['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $vm['memory']; ?> Gb</td>
                                            <td><?= $vm['processor']; ?></td>
                                            <td class="text-capitalize"><?= $vm['lokasi']; ?></td>
                                            <td><?= $vm['sos']; ?></td>
                                            <td><?= $vm['eos']; ?></td>
                                            <td><?= $vm['no_pks']; ?></td>
                                            <td class="dropdown text-center">
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('operator') || in_groups('admin')) : ?>
                                                        <a href="<?= base_url('serverfisik/edit') . '/' . $vm['id'] ?>" class="dropdown-item has-icon">
                                                            <i class="far fa-edit text-success"></i> Edit
                                                        </a>
                                                    <?php endif; ?>

                                                    <!-- AKSES ALL -->
                                                    <a href="<?= base_url('serverfisik/detail') . '/' . $vm['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>

                                                    <!-- AKSES ADMIN & OPERATOR -->
                                                    <?php if (in_groups('operator') || in_groups('admin')) : ?>
                                                        <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-fisik<?= $vm['id'] ?>">
                                                            <i class="fas fa-trash text-danger"></i> Delete
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-fisik<?= $vm['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $vm['nama_app']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/serverfisik') . '/' . $vm['id']; ?>" method="post">
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
                <h5 class="modal-title">File Excel Server Fisik</h5>
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
        var datatablesFisik = $("#tableFisik").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Server Fisik Bank BTN' + datetime,
                    messageTop: 'Data Total Server Fisik Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
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