<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>


<section class="section">

    <!-- Primary Info -->
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
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fa fa-server text-white" aria-hidden="true"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <!-- Totak Fisik -->
                        <h4>Total Server Fisik</h4>
                    </div>
                    <div class="card-body">
                        <?= $fisik_oc + $fisik_sentul + $fisik_surabaya ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-warning">
                    <i class="fas fa-vr-cardboard text-white" aria-hidden="true"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total VM</h4>
                    </div>
                    <div class="card-body">
                        <?= $vm_sentul + $vm_surabaya  ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-danger">
                    <i class="fas fa-cloud text-white" aria-hidden="true"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Cloud Server</h4>
                    </div>
                    <div class="card-body">
                        <?= $total_cloud ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart -->
    <div class="row d-flex align-items-stretch">
        <div class="col-lg-4">
            <div class="card h-100 d-flex align-items-center justify-content-center">
                <div class="card-header">
                    <h4 class="text-center">Jenis Server Fisik</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="300"></canvas>
                </div>
                <div class="card-stats">
                    <div class="card-header">Jenis Server</div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_web ?></div>
                            <div class="card-stats-item-label">WEB</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_app ?></div>
                            <div class="card-stats-item-label">APP</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_db ?></div>
                            <div class="card-stats-item-label">DB</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-stats">
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_mngmt ?></div>
                            <div class="card-stats-item-label">MNGMT</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_dmz ?></div>
                            <div class="card-stats-item-label">DMZ</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_dev ?></div>
                            <div class="card-stats-item-label">DEV</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <canvas id="myChart" height="30"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100 d-flex align-items-center justify-content-center">
                <div class="card-header">
                    <h4 class="text-center">Jenis Server Virtual Machine</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart2" height="300"></canvas>
                </div>
                <div class="card-stats">
                    <div class="card-header">Jenis Server</div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_web_vm ?></div>
                            <div class="card-stats-item-label">WEB</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_app_vm ?></div>
                            <div class="card-stats-item-label">APP</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_db_vm ?></div>
                            <div class="card-stats-item-label">DB</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-stats">
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_mngmt_vm ?></div>
                            <div class="card-stats-item-label">MNGMT</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_dmz_vm ?></div>
                            <div class="card-stats-item-label">DMZ</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count"><?= $total_jenis_dev_vm ?></div>
                            <div class="card-stats-item-label">DEV</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <canvas id="myChart2" height="30"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header">
                    <h4>Aplikasi Terbaru pada Server Fisik</h4>
                    <div class="card-header-action ">
                        <a href="<?= base_url('serverfisik') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <?php $i = 1;
                        foreach ($aplikasi_terbaru as $at) : ?>
                            <li class="media">
                                <?php if ($at['jenis_app'] == 'APP') : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-primary"></i>
                                        <i class="fa fa-mobile fa-stack-1x text-white"></i>
                                    </span>
                                <?php elseif ($at['jenis_app'] == 'WEB') : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-danger"></i>
                                        <i class="fa fa-globe fa-stack-1x text-white"></i>
                                    </span>
                                <?php elseif ($at['jenis_app'] == 'MNGMT') : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-warning"></i>
                                        <i class="fa fa-users-cog fa-stack-1x text-white"></i>
                                    </span>
                                <?php elseif ($at['jenis_app'] == 'DMZ') : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-success"></i>
                                        <i class="fa fa-fingerprint fa-stack-1x text-white"></i>
                                    </span>
                                <?php elseif ($at['jenis_app'] == 'DB') : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-info"></i>
                                        <i class="fa fa-database fa-stack-1x text-white"></i>
                                    </span>
                                <?php else : ?>
                                    <span class="fa-stack fa-2x mr-2">
                                        <i class="fa fa-circle fa-stack-2x icon-background text-secondary"></i>
                                        <i class="fa fa-terminal fa-stack-1x text-white"></i>
                                    </span>
                                <?php endif; ?>
                                <div class="media-body">
                                    <div class="media-title"><?= $at['nama_app'] ?></div>
                                    <div class="mt-1">
                                        <div class="budget-price">

                                            <div class="budget-price-label">- Total Storage :
                                                <?php if ($at['disk'] > 999) : ?>
                                                    <?= $at['disk'] / 1000  ?> TB
                                                <?php else : ?>
                                                    <?= $at['disk']  ?> GB
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="budget-price">
                                            <div class="budget-price-label">- PIC</div>
                                            <div class="budget-price-label"><?= $at['pic'] ?></div>
                                            <div class="budget-price-label">/</div>
                                            <div class="budget-price-label"><?= $at['divisi'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- Table Last Data Server Fisik -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Server Fisik Terbaru</h4>
                    <div class="card-header-action dropdown">
                        <a href="<?= base_url('serverfisik') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tableFisik" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Kode Aset</th>
                                    <th>Serial Number</th>
                                    <th>Nama App</th>
                                    <th>Jenis App</th>
                                    <th>IP Address Data</th>
                                    <th>IP Address Management</th>
                                    <th>Hostname</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($server_fisik_terbaru as $sft) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td><?= $sft['kode_aset']; ?></td>
                                        <td><?= $sft['serial_number']; ?></td>
                                        <td><?= $sft['nama_app']; ?></td>
                                        <td><?= $sft['jenis_app']; ?></td>
                                        <td><?= $sft['ip_address_data']; ?></td>
                                        <td><?= $sft['ip_address_management']; ?></td>
                                        <td><?= $sft['hostname']; ?></td>
                                        <td><?= $sft['lokasi']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Last Data VM -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Virtual Machine Terbaru</h4>
                    <div class="card-header-action dropdown">
                        <a href="<?= base_url('virtualmachine') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tableVm" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Cluster</th>
                                    <th>Operating System</th>
                                    <th>Nama VM</th>
                                    <!-- <th>Host</th> -->
                                    <th>IP Address</th>
                                    <th>Hostname</th>
                                    <th>Jenis Server</th>
                                    <th>Lisence</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($vm_terbaru as $vt) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td><?= $vt['nama_cluster']; ?></td>
                                        <td><?= $vt['nama_os']; ?></td>
                                        <td><?= $vt['nama_vm']; ?></td>
                                        <td><?= $vt['ip_address']; ?></td>
                                        <td><?= $vt['hostname']; ?></td>
                                        <td><?= $vt['jenis_server']; ?></td>
                                        <td><?= $vt['lisence']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Last Data Cloud -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Cloud Server Terbaru</h4>
                    <div class="card-header-action dropdown">
                        <a href="<?= base_url('cloud') ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tableCloud" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>Provider</th>
                                    <th>Operating System</th>
                                    <th>Nama Cloud</th>
                                    <!-- <th>Host</th> -->
                                    <th>IP Address</th>
                                    <th>Hostname</th>
                                    <th>Jenis Server</th>
                                    <th>Jenis Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($cloud_terbaru as $ct) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $i++; ?>
                                        </td>
                                        <td><?= $ct['nama_provider']; ?></td>
                                        <td><?= $ct['nama_os']; ?></td>
                                        <td><?= $ct['nama_cloud']; ?></td>
                                        <td><?= $ct['ip_address']; ?></td>
                                        <td><?= $ct['hostname']; ?></td>
                                        <td><?= $ct['jenis_server']; ?></td>
                                        <td><?= $ct['jenis_payment']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    var totalJenisApp = <?= json_encode($total_jenis_app); ?>;
    var totalJenisWeb = <?= json_encode($total_jenis_web); ?>;
    var totalJenisDb = <?= json_encode($total_jenis_db); ?>;
    var totalJenisMngmt = <?= json_encode($total_jenis_mngmt); ?>;
    var totalJenisDmz = <?= json_encode($total_jenis_dmz); ?>;
    var totalJenisDev = <?= json_encode($total_jenis_dev); ?>;
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['APP', 'WEB', 'DB', 'MNGMT', 'DMZ', 'DEV'],
            datasets: [{
                label: 'Jumlah',
                backgroundColor: ['#143F6B', '#F55353', '#FEB139', '#F6F54D', '#2f70b1', '#fd8d8d'],
                data: [totalJenisApp, totalJenisWeb, totalJenisDb, totalJenisMngmt, totalJenisDmz, totalJenisDev] // Masukkan data Anda di sini
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Bare-metal Sentul'
            }
        }
    });
</script>

<script>
    var totalJenisAppVm = <?= json_encode($total_jenis_app_vm); ?>;
    var totalJenisWebVm = <?= json_encode($total_jenis_web_vm); ?>;
    var totalJenisDbVm = <?= json_encode($total_jenis_db_vm); ?>;
    var totalJenisMngmtVm = <?= json_encode($total_jenis_mngmt_vm); ?>;
    var totalJenisDmzVm = <?= json_encode($total_jenis_dmz_vm); ?>;
    var totalJenisDevVm = <?= json_encode($total_jenis_dev_vm); ?>;
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var chart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['WEB', 'APP', 'DB', 'MNGMT', 'DMZ', 'DEV'],
            datasets: [{
                label: 'Jumlah',
                backgroundColor: ['#143F6B', '#F55353', '#FEB139', '#F6F54D', '#2f70b1', '#fd8d8d'],
                data: [totalJenisAppVm, totalJenisWebVm, totalJenisDbVm, totalJenisMngmtVm, totalJenisDmzVm, totalJenisDevVm] // Masukkan data Anda di sini
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Bare-metal Bandung'
            }
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var datatablesFisik = $("#tableFisik").DataTable({
            paging: false,
            searching: false,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, ],
        });
        datatablesFisik.buttons().container().appendTo("#tableFisik_wrapper .col-md-6:eq(0)");
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var datatablesVm = $("#tableVm").DataTable({
            paging: false,
            searching: false,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, ],
        });
        datatablesVm.buttons().container().appendTo("#tableVm_wrapper .col-md-6:eq(0)");
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var datatablesCloud = $("#tableCloud").DataTable({
            paging: false,
            searching: false,
            lengthChange: false,
            columnDefs: [{
                orderable: false,
                targets: [0]
            }, ],
        });
        datatablesCloud.buttons().container().appendTo("#tableCloud_wrapper .col-md-6:eq(0)");
    });
</script>
<?= $this->endSection(); ?>