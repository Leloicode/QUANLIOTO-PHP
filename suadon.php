<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<?php
if (!isset($_SESSION['taikhoanadmin'])) {
    header("Location: login.php");
}


?>
<?php 
 require 'xesql.php';
 $ketnoi = new Xe('localhost', 'root', '', 'quanlioto');
 //delete danhmuc
 ?>
<style>
    input[type="file"] {

        top: 10px;
        left: 20px;
        margin-left: 76px;
        font-size: 17px;
        color: #b8b8b8;
    }
</style>

<head>
    <title>ADMIN LT SHOP</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.18.4/jodit.min.css" />


</head>

<body class="fix-menu" onmouseover="settime()">
    <?php
     if (isset($_POST['capnhat'])) {
        $idhoadon = $_GET['idhoadon'];
        $idxe= $_GET['idxe'];
        $thoigianbatdau = $_POST['tgbdd'];
        $thoigianketthuc = $_POST['tgktt'];
        $datcoc = $_POST['datcoc'];
        $phiphatsinh = $_POST['phiphatsinh'];
        $tongtiencapnhat = $_POST['tongtiencapnhat'];
        $checkxe = $ketnoi->checktime_xe($idxe,$idhoadon);
        $dem = mysqli_num_rows($checkxe);
                                            if ($dem > 0) {
                                                $kq = 0;
                                                while ($row = mysqli_fetch_assoc($checkxe)) {
                                                    $tgbd = $row['pickup_datetime'];
                                                    $tgkt = $row['dropoff_datetime'];

                                                    if ($thoigianbatdau < $tgbd) {

                                                        if ($tgbd <= $thoigianketthuc) {
                                                            $kq = $kq + 1;
                                                        } else {
                                                        }
                                                    } else {

                                                        if ($thoigianbatdau <= $tgkt) {
                                                            $kq = $kq + 1;
                                                        } else {
                                                        }
                                                    }
                                                }
                                                if ($kq == 0) {
                                                   $Updatedon = $ketnoi->updatedon($thoigianbatdau,$thoigianketthuc,$datcoc,$phiphatsinh,$tongtiencapnhat,$idhoadon);
                                                   if ($Updatedon) {
                                                    
                                                    ?><script>
                                                        alert("Cập nhật đơn thành công");
                                                    </script>
                                                    <?php
                                                   }

                                                } else {
                                                    ?>
                                                    <script>
                                                        alert('Có <?php echo $kq; ?> đơn trùng thời gian.Vui lòn kiểm tra lại thời gian.');
                                                    </script>
                                                <?php

                                                }
                                            } else {
                                                
                                                $Updatedon = $ketnoi->updatedon($thoigianbatdau,$thoigianketthuc,$datcoc,$phiphatsinh,$tongtiencapnhat,$idhoadon);
                                                   if ($Updatedon) {
                                                    
                                                    ?><script>
                                                        alert("Cập nhật đơn thành công");
                                                    </script>
                                                    <?php
                                                   }
                                            }
        
        
    } ?>
  
    <?php
    if (isset($_GET['idhoadon'])) {
        $idhoadon = $_GET['idhoadon'];




       
    ?>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="loader-bar"></div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div class="container rounded bg-white mt-3"  style="max-width:780px;" onmouseover="settime()">

            <form action="" method="post" enctype="multipart/form-data" onmouseover="settime()">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="p-3 py-5">
                            <?php 
                            $listdonxe =  $ketnoi->hienthidon($idhoadon);
                            $row = mysqli_fetch_assoc($listdonxe);
                            
                            ?>
                            <a href="./dondatxe.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>
                            <div class="d-flex justify-content-between align-items-center mb-3" style="margin-top:20px;">
                                
                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>CẬP NHẬT HÓA ĐƠN ĐẶT XE - <I><?php echo "MD".$_GET['idhoadon']; ?></I></h6>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4"> <label for="">Xe</label></div>
                                <div class="col-md-6"><input type="text" class="form-control" readonly='true'  value="<?php echo $row['plate_car']." - ".$row['loai_xe']." - ".$row['doi_xe'] ?>" ></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4"> <label for="">Giá xe/ngày</label></div>
                                <div class="col-md-6"><input type="number" class="form-control"  id ="giatheongay" readonly='true'  value="<?php echo $row['price']?>" ></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-4"> <label for="">Thời gian bắt đầu</label></div>
                                <div class="col-md-6"><input type="date" id="tg1" name="tgbdd" onmouseover="settime()" value="<?php echo $row['pickup_datetime'] ?>" min="<?php $today = getdate();
                                                                                                                                                                                            $ngay = $today["mday"];
                                                                                                                                                                                            $thang  = $today["mon"];
                                                                                                                                                                                            $nam = $today["year"];
                                                                                                                                                                                            if ($ngay < 10) {
                                                                                                                                                                                                $ngay = "0" . $ngay;
                                                                                                                                                                                            }
                                                                                                                                                                                            if ($thang < 10) {
                                                                                                                                                                                                $thang = "0" . $thang;
                                                                                                                                                                                            }
                                                                                                                                                                                            $tgbatdau = $nam . "-" . $thang . "-" . $ngay;
                                                                                                                                                                                            echo $tgbatdau; ?>" max="<?php $dateint = mktime(0, 0, 0, $thang, ($ngay + 30), $nam);
                                                                                                                                                                                                                        $gioihanngay = date('Y-m-d', $dateint);
                                                                                                                                                                                                                        echo $gioihanngay; ?>" class="form-control" name="tendongho" value="" placeholder="Nhập tên sản phẩm" required></div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-md-4"><label for="">Thời gian kết thúc</label></div>
                                <div class="col-md-6"><input type="date" id="tg2" class="form-control" onmouseover="settime()"  name="tgktt" value="<?php echo $row['dropoff_datetime'] ?>" max="<?php $dateint2 = mktime(0, 0, 0, $thang, ($ngay + 365), $nam);
                                                                                                                                                                                                        $gioihanngayketthuc = date('Y-m-d', $dateint2);
                                                                                                                                                                                                        echo $gioihanngayketthuc; ?>" required></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4"><label for="">Tổng ngày</label></div>
                                <div class="col-md-6"><input type="number" class="form-control" name="loaimay" onmouseover="settime()" required id="tongngay" readonly='true' placeholder="Tổng ngày" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">Đặt cộc</div>
                                <div class="col-md-6"><input type="number" class="form-control" name="datcoc" value="<?php echo $row['price_deposit'] ?>" placeholder="Đặt cộc" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label for="">Phí phát sinh</label></div>
                                <div class="col-md-6"><input type="number" class="form-control" id="phiphatsinh" name="phiphatsinh" value="<?php echo $row['price_incurred'] ?>"  required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label for="">Tổng tiền ban đầu:</label></div>
                                <div class="col-md-6"><input type="text" class="form-control" name="maudongho" readonly='true' value="<?php echo number_format($row['total_price']).",000 đ" ?>"  required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4"><label for="">Tổng tiền cập nhật:</label></div>
                                <div class="col-md-6"><input type="text" class="form-control" id="tongtiencapnhat" name="tongtiencapnhat" readonly='true'   required></div>
                            </div>
                           
                            <div class="row mt-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6 text-right"><button name="capnhat" id="button1" type="submit" class="btn btn-success">Cập nhật </button></div>
                            </div>
                            
                            
                        </div>

                    </div>
                </div>
            </form>
            <div class="row">
                    
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                    <h6>DANH SÁCH THỜI GIAN CỦA XE - - <I><?php echo $row['plate_car'] ?></I></h6>
                                </div>
                                

                            </div>
                            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Thời gian bắt đầu</th>
      <th scope="col">Thời gian kết thúc</th>

    </tr>
  </thead>
  <tbody>
    <?php 
    $listtimexe = $ketnoi->listtimedonxe_idxe($row['idxe'],$row['id']);
    $stt = 0;
    while ($row = mysqli_fetch_assoc($listtimexe)) {
        $stt++;
    ?>
    <tr <?php if ($row['id'] == $idhoadon) {
        echo "style='background-color:#9CE6E6;'";
    }?>>
      <th scope="row"><?php echo $stt; ?></th>
      <td><?php echo $row['pickup_datetime'] ?></td>
      <td><?php echo $row['dropoff_datetime'] ?></td>

    </tr>
    <?php } ?>
  </tbody>
</table>

                            
                           
                        </div>

                    </div>
                </div>
            
        </div>
      
    <?php } ?>
    

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
    <script src="js/uploadavatar.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.18.4/jodit.min.js"></script>
    <script>
        function settime() {
            let domain = document.getElementById('tg1').value;
         
            document.getElementById('tg2').min = domain;

            

            let tg2 = document.getElementById('tg2').value;
            if (tg2 != "") {
                tongngay();
            }

        }
   
      
  
        function tongngay() {

            let d1 = document.getElementById('tg1').value;
            let d2 = document.getElementById('tg2').value;

            let birthday = new Date(d1);
            let dead = new Date(d2);
            let ms1 = birthday.getTime();
            let ms2 = dead.getTime();
            let k1 = Math.ceil((ms2 - ms1) / (24 * 60 * 60 * 1000));
            let k2 = k1 + 1;

            document.getElementById('tongngay').value = k2;

            tongtien();





            // let ms1 = d1.getTime();
            // let ms2 = d2.getTime();
            // let k1 = Math.ceil((ms2 - ms1) / (24*60*60*1000));

            //document.getElementById('kq2').value = d2;



        }
        function tongtien(){
            let tongngay = document.getElementById('tongngay').value;
            let giatheongay = document.getElementById('giatheongay').value;
            let phatsinh = document.getElementById('phiphatsinh').value;
            let phatsinhh = parseInt(phatsinh);
            let tong = new Intl.NumberFormat().format((tongngay * giatheongay) + phatsinhh)  + '.000 đ';
            console.log(tong);
            document.getElementById('tongtiencapnhat').value = tong;

        }
    </script>


</body>




</html>