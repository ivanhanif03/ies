<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Server Fisik</h1>
        <div class="section-header-breadcrumb">
            <a href="<?= base_url('serverfisik/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus mr-1"></i> Tambah Server</a>
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
                            <table class="table table-striped" id="tableFisik" width="100%">
                                <thead>
                                    <tr>
                                        <th class=" text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Merk</th>
                                        <th>Tipe</th>
                                        <th>OS</th>
                                        <th>Disk</th>
                                        <th>Memory</th>
                                        <th>Processor</th>
                                        <th>Lokasi</th>
                                        <th>Vendor</th>
                                        <th>SOS</th>
                                        <th>EOS</th>
                                        <th>Lisensi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($fisik as $f) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $f['nama_server']; ?></td>
                                            <td><?= $f['merk']; ?></td>
                                            <td><?= $f['tipe']; ?></td>
                                            <td class="text-capitalize"><?= $f['os']; ?></td>
                                            <td>
                                                <?php
                                                if ($f['disk'] > 999) : ?>
                                                    <?= $f['disk'] / 1000 ?> Tb
                                                <?php else : ?>
                                                    <?= $f['disk'] ?> Gb
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $f['memory']; ?> Gb</td>
                                            <td><?= $f['processor']; ?></td>
                                            <td class="text-capitalize"><?= $f['lokasi']; ?></td>
                                            <td><?= $f['nama_vendor']; ?></td>
                                            <td><?= $f['sos']; ?></td>
                                            <td><?= $f['eos']; ?></td>
                                            <td><?= $f['lisensi']; ?></td>
                                            <td class="dropdown text-center">
                                                <!-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i></a> -->
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <a href="<?= base_url('serverfisik/edit') . '/' . $f['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('serverfisik/detail') . '/' . $f['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-fisik<?= $f['id'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-fisik<?= $f['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Server</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $f['nama_server']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/serverfisik') . '/' . $f['id']; ?>" method="post">
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
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables with Buttons
        var datatablesFisik = $("#tableFisik").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, {
                visible: false,
                targets: [2, 3, 10, 11, 12],
            }, ],
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Server Fisik',
                    messageTop: 'Data Total Server Fisik Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Server Fisik',
                    messageTop: 'Data Total Server Fisik Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                }
            ]
        });
        datatablesFisik.buttons().container().appendTo("#tableFisik_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>