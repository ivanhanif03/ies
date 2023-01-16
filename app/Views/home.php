<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Server</h4>
          </div>
          <div class="card-body">
            count* total
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">

        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Virtual Machine</h4>
          </div>
          <div class="card-body">
            count vm
          </div>
        </div>
      </div>

    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Bare metal</h4>
          </div>
          <div class="card-body">
            count Baremetal
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Budget vs Sales</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="158"></canvas>
        </div>
      </div>
    </div>
  </div>

  </div>
</section>
<!--<div class="card-stats-items">
                        <div class="card-stats-item">
                        <div class="card-stats-item-count">24</div>
                        <div class="card-stats-item-label">VM</div>
                        </div>
                        <div class="card-stats-item">
                        <div class="card-stats-item-count">12</div>
                        <div class="card-stats-item-label">Baremetal</div>
                        </div>
                  </div> -->
</script>
<?= $this->endSection(); ?>