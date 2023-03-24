<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Detail <?= $rak['nama_rak']; ?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('rak') ?>">Daftar Rak</a></div>
            <div class="breadcrumb-item">Detail Rak</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="gallery gallery-fw" data-item-height="350">
                            <div class="gallery-item" data-image="<?= base_url() . "/img/gambar_rak/" . $rak['gambar_rak']; ?>">

                            </div>
                            <!-- <img class="img-fluid" src="<?= base_url() . "/img/gambar_rak/" . $rak['gambar_rak']; ?>" alt="Gambar <?= $rak['nama_rak']; ?>"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableFisik" width="100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">
                                            No
                                        </th>
                                        <th>Rak Unit</th>
                                        <th>Kode Aset</th>
                                        <th>Serial Number</th>
                                        <th>Nama App</th>
                                        <th>Jenis App</th>
                                        <th>IP Address Data</th>
                                        <th>IP Address Mngmt</th>
                                        <th>Hostname</th>
                                        <th>Jenis Appliance</th>
                                        <th>Rak</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($server_fisik as $sf) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="Detail Server" href="<?= base_url('rak/detail_server') . '/' . $sf['id'] ?>">
                                                    <?= $sf['rak_unit']; ?>
                                                </a>
                                            </td>
                                            <td><?= $sf['kode_aset']; ?></td>
                                            <td><?= $sf['serial_number']; ?></td>
                                            <td><?= $sf['nama_app']; ?></td>
                                            <td><?= $sf['jenis_app']; ?></td>
                                            <td><?= $sf['ip_address_data']; ?></td>
                                            <td><?= $sf['ip_address_management']; ?></td>
                                            <td><?= $sf['hostname']; ?></td>
                                            <td><?= $sf['jenis_appliance']; ?></td>
                                            <td><?= $sf['nama_rak']; ?></td>
                                            <td><?= $sf['v1']; ?></td>
                                            <td><?= $sf['v2']; ?></td>
                                            <td><?= $sf['merek']; ?></td>
                                            <td><?= $sf['tipe']; ?></td>
                                            <td class="text-capitalize"><?= $sf['nama_os']; ?></td>
                                            <td>
                                                <?php
                                                if ($sf['disk'] > 999) : ?>
                                                    <?= $sf['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $sf['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $sf['memory']; ?> Gb</td>
                                            <td><?= $sf['processor']; ?></td>
                                            <td class="text-capitalize"><?= $sf['lokasi']; ?></td>
                                            <td><?= $sf['sos']; ?></td>
                                            <td><?= $sf['eos']; ?></td>
                                            <td><?= $sf['no_pks']; ?></td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" id="modal-delete-fisik<?= $sf['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Rak</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $sf['nama_rak']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('rak') . '/' . $sf['id']; ?>" method="post">
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
        var datatablesFisik = $("#tableFisik").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    className: 'btn btn-outline-success',
                    title: 'Server Fisik Bank BTN' + datetime,
                    messageTop: ' <?= $rak['nama_rak']; ?>',
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