<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
          <div class="row justify-content-md-center">
          <!-- <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title"><h4>Order Statistics</h4>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">24</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label">Shipping</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label">Completed</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div> -->
          
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title"><h4>Virtual Machine</h4>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">DC Stl</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">DRC Sby</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">OC Jkt</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total VM</h4>
                  </div>
                  <div class="card-body">
                    **
                  </div>
                </div>
              </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title"><h4>Bare Metal</h4>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">DC Stl</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">DRC Sby</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">**</div>
                      <div class="card-stats-item-label">OC Jkt</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Server Bare Metal</h4>
                  </div>
                  <div class="card-body">
                    **
                  </div>
                </div>
              </div>
            </div>
        
          </div>
          <div class="row">
            <div class="col-lg-8">
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