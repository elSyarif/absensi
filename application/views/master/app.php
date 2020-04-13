<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">

    <title><?= $title; ?></title>

    <?php $this->load->view('master/_meta'); ?>


  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
    <!-- Navbar -->
      <?php $this->load->view('master/_navbar'); ?>
    <!-- End Navbar -->
    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
    <!-- sidebar -->
      <?php $this->load->view('master/_sidebar') ?>
    <!-- End Sidebar -->
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="main-body">
            <div class="page-wrapper">
              <div class="page-body">
                <div class="row">
                  <!-- Isi -->

                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-yellow text-white">
                    <div class="card-block">
                      <div class="row align-items-center">
                        <div class="col">
                          <p class="m-b-5">New Customer</p>
                          <h4 class="m-b-0">852</h4>
                        </div>
                        <div class="col col-auto text-right">
                          <i class="feather icon-user f-50 text-c-yellow"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-green text-white">
                    <div class="card-block">
                      <div class="row align-items-center">
                        <div class="col">
                          <p class="m-b-5">Income</p>
                          <h4 class="m-b-0">$5,852</h4>
                        </div>
                        <div class="col col-auto text-right">
                          <i class="feather icon-credit-card f-50 text-c-green"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-pink text-white">
                      <div class="card-block">
                        <div class="row align-items-center">
                          <div class="col">
                            <p class="m-b-5">Ticket</p>
                            <h4 class="m-b-0">42</h4>
                          </div>
                          <div class="col col-auto text-right">
                            <i class="feather icon-book f-50 text-c-pink"></i>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <div class="col-xl-3 col-md-6">
                  <div class="card bg-c-blue text-white">
                    <div class="card-block">
                      <div class="row align-items-center">
                        <div class="col">
                          <p class="m-b-5">Orders</p>
                          <h4 class="m-b-0">$5,242</h4>
                        </div>
                        <div class="col col-auto text-right">
                          <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-xl-8 col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-header-left ">
                        <h5>Monthly View</h5>
                        <span class="text-muted">For more details about usage, please refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
                      </div>
                    </div>
                    <div class="card-block-big">
                      <div id="monthly-graph" style="height:250px"></div>
                    </div>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    
    <!--  -->
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('master/_js');
  ?>