
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
<!-- 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a href="" class="btn">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registrasi </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Pasien </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas  fa-angle-right fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div> -->
            <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-info shadow h-100 py-2">
                <a href="<?php echo site_url('Pasien'); ?>" class="btn">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">View </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">List Pasien </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas  fa-angle-right fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
              <?php  
                $qryget=$this->db->query("SELECT COUNT(`tb_antrianhistory`.`tgl`) AS jumlah ,DATE_FORMAT( `tb_antrianhistory`.`tgl`,'%W %d / %m') AS tgl FROM `tb_antrianhistory` GROUP BY `tb_antrianhistory`.`tgl`;")->result_array();

                $valjml=array() ;
                $n=0;
                 foreach ($qryget as $v):
                 
                  $valjml[$n]=$v['jumlah']; 
                  ?>
                    <input type="hidden" id="id_datay<?php echo $n;  ?>" value="<?php echo $v['jumlah'];  ?>">
                    <input type="hidden" id="id_dataX<?php echo $n;  ?>" value="<?php echo $v['tgl'];  ?>">

                  <?php
                   $n++;
                 endforeach;
               ?>
                    <input type="hidden" name="count" id="id_count" value="<?php echo $n  ?>">
                    <?php //echo $valjml[0]."_".$valjml[1]."_".$valjml[2];$valjml[2]."_"; ?>

            <?php
              $qry=$this->db->query("SELECT COUNT(`tb_antrian`.`no`) AS cnt FROM tb_antrian JOIN tb_pasien ON id_ktp=id_pasien WHERE STATUS NOT IN('SELESAI_ANTRI') ORDER BY NO ASC;")->result_array();
              $legth = 80;
              foreach ($qry as $v) {$legth = $v['cnt'];}
              $legthmx = 10;
              // $a=($legh)
              if ($legth >= ($legthmx*(80/100))) {
                $msg = "<div class=\"text-xs  text-warning \">Antrian hampir penuh</div>";
                $var = "text-warning";
              } elseif ($legth >= $legthmx) {
                $msg = "<div class=\"text-xs  text-danger \">Antrian Penuh</div>";
                # code...
                $var = "text-danger";
              } else {
                $msg = "";
                $var = "";
              }
            ?>
          <?php $pesentase= ($legth/$legthmx)*100 ?>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <!-- Link Menu Registrasi -->
                <a href="<?php echo site_url('Antrian'); ?>" class="btn">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">View Antrian</div>
                        <!--  -->
                        <?php echo $msg ?>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                              (<span class="<?php echo $var ?>"><?php echo $legth ?></span>/<span class="<?php echo $var ?>"><?php echo $legthmx ?></span>)
                            </div>
                          </div>
                          <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo  $pesentase ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-success shadow h-100 py-2">
                <a href="" class="btn">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Form </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Administrator</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas  fa-angle-right fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->


            <!-- Earnings (Monthly) Card Example -->


            <!-- Pending Requests Card Example -->

          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Antrian( / hari)</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-lg-4 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Aplikasi Antrian</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-1 px-sm-4 mt-1 mb-2" style="width: 25rem;" src="<?php echo base_url('asset/') ?>img/undraw_posting_photo.svg" alt="">
                  </div>
                  <?php 
                  if ( $pesentase>80) {
                    include("Informasi_Aplikasi/Penuh.php");
                  } 
                  elseif ( $pesentase>60) {
                    include("Informasi_Aplikasi/sumpek.php");
                    
                  } else{
                    include("Informasi_Aplikasi/nyaman.php");
                   
                  }
                  ?>
                </div>
              </div>

              <!-- Approach -->
              <!--        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div> -->

            </div>
          </div>

          <!-- Content Row -->

        