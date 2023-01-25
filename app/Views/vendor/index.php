<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Vendor</h1>
        <div class="section-header-breadcrumb">
            <a href="<?= base_url('vendor/create') ?>" class="btn btn-md btn-success"><i class="fas fa-plus mr-1"></i> Tambah Vendor</a>
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
                            <table class="table table-striped" id="tableVendor">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>PIC</th>
                                        <th>No. HP PIC</th>
                                        <th>Akun Manager</th>
                                        <th>No. HP Akun Manager</th>
                                        <th>Helpdesk</th>
                                        <th>No. HP Helpdesk</th>
                                        <th>Scope of Work</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Tempo Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($vendor as $v) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $v['nama_vendor']; ?></td>
                                            <td><?= $v['alamat']; ?></td>
                                            <td><?= $v['pic']; ?></td>
                                            <td><?= $v['pic_phone']; ?></td>
                                            <td><?= $v['akun_manager']; ?></td>
                                            <td><?= $v['akun_manager_phone']; ?></td>
                                            <td><?= $v['helpdesk']; ?></td>
                                            <td><?= $v['helpdesk_phone']; ?></td>
                                            <td><?= $v['scope_work']; ?></td>
                                            <td>Rp <?= number_format($v['nilai_kontrak'], 0, '', '.'); ?></td>
                                            <td><?= $v['tempo_pembayaran']; ?></td>
                                            <td class="dropdown text-center">
                                                <!-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i></a> -->
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <a href="<?= base_url('vendor/edit') . '/' . $v['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('vendor/detail') . '/' . $v['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-info text-primary"></i> Detail
                                                    </a>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete<?= $v['id'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete<?= $v['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Vendor</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $v['nama_vendor']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/vendor') . '/' . $v['id']; ?>" method="post">
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
        var datatablesUsers = $("#tableVendor").DataTable({
            // responsive: true,
            lengthChange: false,
            columnDefs: [{
                    orderable: false,
                    targets: [0, 5]
                },
                {
                    visible: false,
                    targets: [5, 6, 7, 8, 9]
                }
            ],
            buttons: [{
                    extend: 'excelHtml5',
                    title: 'Daftar Vendor',
                    messageTop: 'Data Total Vendor Server Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Daftar Vendor',
                    messageTop: 'Data Total Vendor Server Bank BTN',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                }
            ]
        });
        datatablesUsers.buttons().container().appendTo("#tableVendor_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>