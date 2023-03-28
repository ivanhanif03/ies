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
  <div class="row">
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
  var ctx2 = document.getElementById('myChart2').getContext('2d');
  var chart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['WEB', 'APP', 'DB', 'MNGMT', 'DMZ', 'DEV'],
      datasets: [{
        label: 'Bare-metal',
        backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#ffa500', '#800080', '#008000'],
        data: [5, 15, 35, 10, 20, 15] // Masukkan data Anda di sini
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