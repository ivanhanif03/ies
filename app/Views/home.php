<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="row">

    <div class="col-lg-3 col-md-6 col-sm-6">

      <div class="card card-statistic-2">
        <div class="card-icon shadow-primary bg-success">
          <i class="fas fa-duotone fa-calendar"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Date</h4>
          </div>
          <div class="card-body">
            <h4><?php
                $date = date('d-m-y');
                echo $date;
                ?></h4>
          </div>
        </div>

      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Virtual Machine
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">OC Jkt</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">DC Stl</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">DRC Sby</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-dark">
          <i class="fas fa-server"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total VM</h4>
          </div>
          <div class="card-body">
            count(*)
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Bare-metal
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">OC Jkt</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">DC Stl</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count">**</div>
              <div class="card-stats-item-label">DRC Sby</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-dark bg-dark">
          <i class="fas fa-server"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Bare-metal</h4>
          </div>
          <div class="card-body">
            count(*)
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4>masih mikir</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart" height="158"></canvas>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>