<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>


<section class="section">

  <!-- ROW 1 -->
  <div class="row">
    <div class="col-lg-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Server Fisik</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">OC Jkt</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">10</div>
              <div class="card-stats-item-label">DC Stl</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">15</div>
              <div class="card-stats-item-label">DRC Sby</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-light">
          <i class="fa fa-server" aria-hidden="true"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Server Fisik</h4>
          </div>
          <div class="card-body">
            45
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Virtual Machine</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">40</div>
              <div class="card-stats-item-label">OC Jkt</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">DC Stl</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">DRC Sby</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-light">
          <i class="fa fa-cloud" aria-hidden="true"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total VM</h4>
          </div>
          <div class="card-body">
            90
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Aplikasi</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">40</div>
              <div class="card-stats-item-label">OC Jkt</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">DC Stl</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">DRC Sby</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-light">
          <i class="fa fa-rocket" aria-hidden="true"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Aplikasi</h4>
          </div>
          <div class="card-body">
            90
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
          <h4 class="text-center text-primary">Sentul</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="300"></canvas>
        </div>
        <div class="card-stats">
          <div class="card-header">Jenis Server</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">10</div>
              <div class="card-stats-item-label">app</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
          </div>
        </div>
        <br>
        <div class="card-stats">
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
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
          <h4 class="text-center text-primary">Bandung</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart2" height="300"></canvas>
        </div>

        <div class="card-stats">
          <div class="card-header">Jenis Server</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">10</div>
              <div class="card-stats-item-label">app</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
          </div>
        </div>
        <br>
        <div class="card-stats">
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
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
          <h4 class="text-center text-primary">Bandung</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart3" height="300"></canvas>
        </div>

        <div class="card-stats">
          <div class="card-header">Jenis Server</div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">10</div>
              <div class="card-stats-item-label">app</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">20</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
          </div>
        </div>
        <br>
        <div class="card-stats">
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">30</div>
              <div class="card-stats-item-label">bla bla</div>
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
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Web', 'App', 'DB', 'MNGMT', 'DMZ', 'Dev'],
      datasets: [{
        label: 'Bare-metal',
        backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56', '#ffa500', '#800080', '#008000'],
        data: [10, 20, 30, 15, 25, 5] // Masukkan data Anda di sini
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
      labels: ['Web', 'App', 'DB', 'MNGMT', 'DMZ', 'Dev'],
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
      labels: ['Web', 'App', 'DB', 'MNGMT', 'DMZ', 'Dev'],
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