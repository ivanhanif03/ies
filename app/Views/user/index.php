<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <a href="<?= base_url('user/register') ?>" class="btn btn-md btn-success"><i class="fas fa-plus mr-1"></i> Tambah User</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <!-- <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Top User Input</h4>
                        <div class="card-header-action">
                            <a href="#" class=" btn btn-warning"><i class="fas fa-medal"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <a href="#">
                                    <img class="mr-3 rounded" width="50" src="<?= base_url("/img/1.png") ?>" alt="product">
                                </a>
                                <div class="media-body">
                                    <?php foreach ($merged as $u) : ?>
                                        <?php foreach ($u as $s) : ?>
                                            <div class="media-right"><?= $s ?></div>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <div class="media-title">User</div>
                                    <div class="text-muted text-small">Last Update
                                        <div class="bullet"></div> 05/08/2023
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img class="mr-3 rounded" width="50" src="<?= base_url("/img/2.png") ?>" alt="product">
                                </a>
                                <div class="media-body">
                                    <div class="media-right">103</div>
                                    <div class="media-title">User</div>
                                    <div class="text-muted text-small">Last Update
                                        <div class="bullet"></div> 05/08/2023
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#">
                                    <img class="mr-3 rounded" width="50" src="<?= base_url("/img/3.png") ?>" alt="product">
                                </a>
                                <div class="media-body">
                                    <div class="media-right">103</div>
                                    <div class="media-title">User</div>
                                    <div class="text-muted text-small">Last Update
                                        <div class="bullet"></div> 05/08/2023
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-sm-12">
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
                            <table class="table table-striped" id="tableUser">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($users as $u) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i++; ?>
                                            </td>
                                            <td><?= $u['email']; ?></td>
                                            <td><?= $u['username']; ?></td>
                                            <td><?= $u['name']; ?></td>
                                            <td><?= $u['phone']; ?></td>
                                            <?php if ($u['active'] == 1) : ?>
                                                <td class="text-center">
                                                    <div class="badge badge-pill badge-success">Aktif</div>
                                                </td>
                                            <?php else : ?>
                                                <td class="text-center">
                                                    <div class="badge badge-pill badge-danger">Non Aktif</div>
                                                </td>
                                            <?php endif; ?>
                                            <td class="dropdown text-center">
                                                <!-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i></a> -->
                                                <a href="#" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right w-50">
                                                    <a href="<?= base_url('user/edit') . '/' . $u['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="far fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a href="<?= base_url('user/changePassword') . '/' . $u['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-key text-warning"></i> Reset Pass
                                                    </a>
                                                    <a href="<?= base_url('user/role') . '/' . $u['id'] ?>" class="dropdown-item has-icon">
                                                        <i class="fas fa-flag text-primary"></i> Role
                                                    </a>
                                                    <a href="" class="dropdown-item has-icon" data-backdrop="false" data-toggle="modal" data-target="#modal-delete-user<?= $u['id'] ?>">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </a>
                                                    <hr>
                                                    <a>
                                                        <?php if ($u['active'] == 1) : ?>
                                                            <form action="<?= base_url('user/nonaktif') . '/' . $u['id'] ?>" method="POST">
                                                                <?= csrf_field() ?>
                                                                <button type="submit" class="dropdown-item text-center text-danger font-weight-bold">Nonaktifkan
                                                                </button>
                                                            </form>
                                                        <?php else : ?>
                                                            <form action="<?= base_url('user/aktif') . '/' . $u['id'] ?>" method="POST">
                                                                <?= csrf_field() ?>
                                                                <button type="submit" class="dropdown-item text-center text-success font-weight-bold">Aktifkan
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Start Modal Delete -->
                                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-user<?= $u['id'] ?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-0">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete User</h5>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <span>Apakah anda yakin?</span><br>
                                                        <span class="text-capitalize font-weight-bolder text-primary">
                                                            <?= $u['name']; ?>
                                                    </div>
                                                    <div class="modal-footer bg-whitesmoke justify-content-between">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                        <form action="<?= base_url('/user') . '/' . $u['id']; ?>" method="post">
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
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Datatables with Buttons
        var datatablesUsers = $("#tableUser").DataTable({
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0, 5]
            }]
        });
        datatablesUsers.buttons().container().appendTo("#tableUser_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>