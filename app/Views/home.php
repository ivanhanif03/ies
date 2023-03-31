<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>


<section class="section">

  <!-- ROW 1 -->
  <div class="row">
    <div class="col-lg-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fa fa-server text-white" aria-hidden="true"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
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
          <i class="fa fa-cloud text-white" aria-hidden="true"></i>
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
          <i class="fa fa-rocket text-white" aria-hidden="true"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Aplikasi</h4>
          </div>
          <div class="card-body">
            <?= $total_app_fisik ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CHART -->
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

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Latest Virtual Machine Server</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>Date</th>
                <th>VM Name</th>
                <th>IP Address</th>
                <th>Hostname</th>
                <th>Disk (GB)</th>
                <th>Memory (GB)</th>
                <th>Operating System</th>
                <th>Jenis Server</th>
                <th>Processor</th>
                <th>License</th>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Latest Baremetal Server</h4>
          <div class="card-header-action">
            <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>Date</th>
                <th>VM Name</th>
                <th>IP Address</th>
                <th>Hostname</th>
                <th>Disk (GB)</th>
                <th>Memory (GB)</th>
                <th>Operating System</th>
                <th>Jenis Server</th>
                <th>Processor</th>
                <th>License</th>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
              <tr>
                <td><a href="#">07/05/2023</a></td>
                <td class="font-weight-600">mas ivan server gacor</td>
                <td>
                  <div class="badge badge-warning">192.168.1.1</div>
                </td>
                <td>sdas </td>
                <td class="font-weight-600">1.2TB</td>
                <td class="font-weight-600">128 GB</td>
                <td class="font-weight-600">Windows Server 2019</td>
                <td class="font-weight-600">DB</td>
                <td class="font-weight-600">Intel Pentium</td>
                <td class="font-weight-600">cap halal mui</td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#ffa500', '#800080', '#008000'],
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
        label: 'Bare-metal',
        backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#ffa500', '#800080', '#008000'],
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
  var ctx3 = document.getElementById('myChart3').getContext('2d');
  var chart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: ['WEB', 'APP', 'DB', 'MNGMT', 'DMZ', 'DEV'],
      datasets: [{
        label: 'Bare-metal',
        backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#ffa500', '#800080', '#008000'],
        data: [68, 23, 12, 14, 27, 24] // Masukkan data Anda di sini
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
<?= $this->endSection(); ?>