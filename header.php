<?php
 require 'xesql.php';
$ketnoi = new Xe('localhost', 'root', '', 'quanlioto');
$tk = $_SESSION['taikhoanadmin']; ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./home.php" target="_blank">
        
        <span class="ms-1 font-weight-bold text-white" style="font-size:30px;">LL ADMIN</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white  <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/home.php") {
?>
active bg-gradient-primary
<?php
}
?> " href="./home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Trang chủ</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white  <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/danhsachkhachhang.php") {
?>
active bg-gradient-primary
<?php
}
?>  " href="./danhsachkhachhang.php ">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Danh sách khách hàng</span>
          </a>
        </li>
        <?php if ($_SESSION['role_id'] == 1) {
          ?> 
      
        <li class="nav-item">
          <a class="nav-link text-white <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/danhsachnhanvien.php") {
?>
active bg-gradient-primary
<?php
}
?> " href="./danhsachnhanvien.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Danh sách nhân viên</span>
          </a>
        </li>
    <?php } ?>
        <li class="nav-item">
          <a class="nav-link text-white <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/dondatxe.php" || $uri == "/doanquanliphp/dondatxe.php?iddate=1" || $uri == "/doanquanliphp/dondatxe.php?iddate=2" || $uri == "/doanquanliphp/dondatxe.php?iddate=3") {
?>
active bg-gradient-primary
<?php
}
?> " href="./dondatxe.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
           
            <span class="nav-link-text ms-1">Danh sách đơn đặt xe</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/xe.php") {
?>
active bg-gradient-primary
<?php
}
?> " href="./xe.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Xe</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/loaixe.php") {
?>
active bg-gradient-primary
<?php
}
?> " href="./loaixe.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Loại xe</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/danhmucxe.php") {
?>
active bg-gradient-primary
<?php
}
?> " href="./danhmucxe.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
           
            <span class="nav-link-text ms-1">Danh mục xe</span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-white " href="./dangxuat.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Đăng xuất</span>
          </a>
        </li>
      </ul>
    </div>
   
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">LL Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/home.php") {
echo "Home";
}
if ($uri == "/doanquanliphp/danhsachkhachhang.php") {
  echo "khachhang";
  }
  if ($uri == "/doanquanliphp/dondatxe.php") {
    echo "dondatxe";
    }
    if ($uri == "/doanquanliphp/xe.php") {
      echo "car";
      }
      if ($uri == "/doanquanliphp/loaixe.php") {
        echo "thietbi";
        }
        if ($uri == "/doanquanliphp/danhsachnhanvien.php") {
          echo "nhanvien";
          }
?> </li>
          </ol>
          <h6 class="font-weight-bolder mb-0"> <?php
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/doanquanliphp/home.php") {
echo "Trang chủ";
}
if ($uri == "/doanquanliphp/danhsachkhachhang.php") {
  echo "Danh sách khách hàng";
  }
  if ($uri == "/doanquanliphp/dondatxe.php") {
    echo "Đơn đặt xe";
    }
    if ($uri == "/doanquanliphp/xe.php") {
      echo "Xe";
      }
      if ($uri == "/doanquanliphp/loaixe.php") {
        echo "Loại Xe";
        }
        if ($uri == "/doanquanliphp/danhsachnhanvien.php") {
          echo "Danh sách nhân viên";
          }
?> </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <b><span class="d-sm-inline d-none"><?php $sqluser = $ketnoi->Excute("SELECT * FROM `staff` WHERE username='$tk' "); $row=mysqli_fetch_assoc($sqluser); echo $row['name'] ?></span></b>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->