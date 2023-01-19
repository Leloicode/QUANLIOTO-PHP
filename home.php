<!--
=========================================================
* Material Dashboard 2 - v3.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<?php session_start();?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="foderadmin/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="foderadmin/assets/img/favicon.png">
  <title>
    ADMIN LL
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="foderadmin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="foderadmin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="foderadmin/assets/css/material-dashboard.css?v=3.0.3" rel="stylesheet" />



  




<link rel="stylesheet" href="./foderadmin/forderlich/csslich/style.css">






</head>
<?php 
if (!isset($_SESSION['taikhoanadmin'])) {
  header("Location: login.php");
}

?>
<body class="g-sidenav-show  bg-gray-200">
  <?php include 'header.php' ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Doanh thu</p>
                <h4 class="mb-0"><?php  $today = getdate();
                $thang  = $today["mon"]; $tongdanhthu = $ketnoi->Thongkedoanhthuall(); $row = mysqli_fetch_assoc($tongdanhthu); if ($row['tongdoanhthuthangnay'] == "") {
                  echo "0";
                }else{ echo $row['tongdoanhthuthangnay'].".000";} ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Tháng <i><?php echo $thang; ?></i> </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Khách hàng</p>
                <h4 class="mb-0"><?php  $tongkhachhang = $ketnoi->Thongkekhachhang(); $row = mysqli_fetch_assoc($tongkhachhang); if ($row['tongkhachhang'] == "") {
                  echo "0";
                }else{ echo $row['tongkhachhang'];} ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Đến nay</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Nhân viên</p>
                <h4 class="mb-0"><?php $tongnhanvien = $ketnoi->Thongkenhanvien(); $row = mysqli_fetch_assoc($tongnhanvien); if ($row['tongnhanvien'] == "") {
                  echo "0";
                }else{ echo $row['tongnhanvien'];} ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">Đến nay</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Doanh thu</p>
                <h4 class="mb-0"><?php 
                $today = getdate();
                $ngay = $today["mday"];
                $thang  = $today["mon"];
                $nam = $today["year"];
                if ($ngay < 10) {
                    $ngay = "0" . $ngay;
                }
                if ($thang < 10) {
                    $thang = "0" . $thang;
                }
                $tghomnay = $nam . "-" . $thang . "-" . $ngay;
                $tongdoanhthuhomnay = $ketnoi->Thongkedoanhthuhomnay($tghomnay);
                $row = mysqli_fetch_assoc($tongdoanhthuhomnay);
                if ($row['doanhthuhomnay'] == "") {
                  echo "0";
                }else{ echo $row['doanhthuhomnay'].".000";} 

                ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">hôm nay</p>
            </div>
          </div>
        </div>
      </div>





      <div class="row pt-4" >
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">directions_car</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Tổng xe</p>
                <h4 class="mb-0"><?php $tongxe = $ketnoi->Tongxe(); $row = mysqli_fetch_assoc($tongxe); if ($row['tongxe'] == "") {
                  echo "0";
                }else{ echo $row['tongxe'];} ?></h4>
              </div>
            </div>
           
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">airline_seat_recline_normal</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Xe đang chạy</p>
                <h4 class="mb-0"><?php  $tongxedangchay = $ketnoi->Tongxedangchay(); $row = mysqli_fetch_assoc($tongxedangchay); if ($row['tongxedangchay'] == "") {
                  echo "0";
                }else{ echo $row['tongxedangchay'];} ?></h4>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">local_car_wash</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Xe bảo hành</p>
                <h4 class="mb-0"><?php $tongxebaohanh = $ketnoi->Tongxedbaohanh(); $row = mysqli_fetch_assoc($tongxebaohanh); if ($row['tongxebaohanh'] == "") {
                  echo "0";
                }else{ echo $row['tongxebaohanh'];} ?></h4>
              </div>
            </div>
           
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">rv_hookup</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Giao xe hôm nay</p>
                <h4 class="mb-0"><?php 
               
                $tongxegiaohomnay = $ketnoi->Tongxegiaohomnay();
                $row = mysqli_fetch_assoc($tongxegiaohomnay);
                if ($row['giaohomnay'] == "") {
                  echo "0";
                }else{ echo $row['giaohomnay'];} 

                ?></h4>
              </div>
            </div>
            
          </div>
        </div>
      </div>
















      <section class="ftco-section">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12 ">
					<div class="elegant-calencar d-md-flex">
						<div class="wrap-header d-flex align-items-center img" style="background-image: url(./foderadmin/forderlich/imageslich/bg.jpg);">
				      <p id="reset">Today</p>
			        <div id="header" class="p-0">
								<!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
		            <div class="head-info">
		            	<div class="head-month"></div>
		                <div class="head-day"></div>
		            </div>
		            <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
			        </div>
			      </div>
			      <div class="calendar-wrap">
			      	<div class="w-100 button-wrap">
				      	<div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
				      	<div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
			      	</div>
			        <table id="calendar">
		            <thead>
		                <tr>
	                    <th>Sun</th>
	                    <th>Mon</th>
	                    <th>Tue</th>
	                    <th>Wed</th>
	                    <th>Thu</th>
	                    <th>Fri</th>
	                    <th>Sat</th>
		                </tr>
		            </thead>
		            <tbody>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
		            </tbody>
			        </table>
			      </div>
			    </div>
				</div>
			</div>
		</div>
	</section>
      
        
      <?php include 'footer.php' ?>
    </div>
  </main>
  <?php include 'doipass.php' ?>
  <!--   Core JS Files   -->
  <script src="foderadmin/assets/js/core/popper.min.js"></script>
  <script src="foderadmin/assets/js/core/bootstrap.min.js"></script>
  <script src="foderadmin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="foderadmin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="foderadmin/assets/js/plugins/chartjs.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="foderadmin/assets/js/material-dashboard.min.js?v=3.0.3"></script>




    
	<script src="./foderadmin/forderlich/jslich/jquery.min.js"></script>
  <script src="./foderadmin/forderlich/jslich/popper.js"></script>
  <script src="./foderadmin/forderlich/jslich/bootstrap.min.js"></script>
  <script src="./foderadmin/forderlich/jslich/main.js"></script>



</body>

</html>