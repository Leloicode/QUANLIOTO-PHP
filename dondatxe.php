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
<?php session_start(); ?>
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

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="foderadmin/assets/css/material-dashboard.css?v=3.0.3" rel="stylesheet" />




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">



    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/foderlogin/css/styles.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<style>

</style>
<?php
if (!isset($_SESSION['taikhoanadmin'])) {
    header("Location: login.php");
}


?>

<body class="g-sidenav-show  bg-gray-200">
    <?php include 'header.php' ?>



    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-1">







                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content " style="width:590px;">

                            <div class="modal-body">


                                <div class="card mb-1" style="width:550px; Max-height:600px;">
                                    <div class="card-header">

                                        Thêm đơn
                                    </div>

                                    <?php
                                    if (isset($_POST['themnhanvien'])) {
                                        if (isset($_POST['xe']) && isset($_POST['khachhang']) && isset($_POST['tgbdd']) && isset($_POST['tgktt'])) {
                                            $xe = $_POST['xe'];

                                            $idnv =  $_SESSION['taikhoanadmin'];
                                            $khachhang = $_POST['khachhang'];

                                            $checknv = $ketnoi->checkpass($idnv);
                                            $row = mysqli_fetch_assoc($checknv);
                                            $idnv = $row['ID'];
                                            $songay = $_POST['songay'];
                                            $datcoc = $_POST['datcoc'];
                                            $listxe = $ketnoi->Listxeorid($xe);
                                            $phiphatsinh = $_POST['phiphatsinh'];
                                            $row = mysqli_fetch_assoc($listxe);
                                            $gia = $row['price'];
                                            $tonggia  = ($gia * $songay) + $phiphatsinh;

                                            $thoigianbatdau = $_POST['tgbdd'];
                                            $thoigianketthuc = $_POST['tgktt'];
                                            $checkxe = $ketnoi->Checkdonxe($xe);
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
                                                    $Adddon = $ketnoi->Adddonxe($xe, $thoigianbatdau, $thoigianketthuc, $khachhang, $idnv, $datcoc, $phiphatsinh, $tonggia);
                                                    if ($Adddon) {
                                    ?>
                                                        <script>
                                                            alert("Thêm đơn thành công");
                                                            window.location.replace("./dondatxe.php");
                                                        </script>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <script>
                                                            alert("Thêm đơn thất bại");
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
                                                $Adddon = $ketnoi->Adddonxe($xe, $thoigianbatdau, $thoigianketthuc, $khachhang, $idnv, $datcoc, $phiphatsinh, $tonggia);
                                                if ($Adddon) {
                                                ?>
                                                    <script>
                                                        alert("Thêm đơn thành công");
                                                        window.location.replace("./dondatxe.php");
                                                    </script>

                                                <?php
                                                } else {
                                                ?>
                                                    <script>
                                                        alert("Thêm đơn thất bại");
                                                    </script>
                                            <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                            <script>
                                                alert('Bạn chưa chọn các mục!');
                                            </script>
                                    <?php
                                        }
                                    }

                                    ?>
                                    <div class="card-body">

                                        <form action="" method="post" enctype="multipart/form-data" style="margin-top:-50px;">
                                            <div>
                                                <select class="selectpicker" id="xe" required name="xe" data-live-search="true">

                                                    <option selected disabled>XE</option>
                                                    <?php $listxe = $ketnoi->Listxe();
                                                    while ($row = mysqli_fetch_assoc($listxe)) {


                                                    ?>

                                                        <option value="<?php
                                                                        echo $row['id'];
                                                                        ?>" <?php if ($row['status'] == 3) {
                                                                                echo 'disabled="true" style="background-color : black;"';
                                                                            } ?>><?php echo $row['plate_car']; ?> <?php echo $row['price'] ?> <?php echo $row['loai_xe']; ?> <?php echo $row['doi_xe'] ?> </option>




                                                    <?php


                                                    } ?>





                                                </select>
                                                <select class="selectpicker" required name="khachhang" data-live-search="true">

                                                    <option selected disabled>KHÁCH HÀNG</option>
                                                    <?php $listkh = $ketnoi->Listkhachhang();
                                                    while ($row = mysqli_fetch_assoc($listkh)) {


                                                    ?>

                                                        <option value="<?php
                                                                        echo $row['id'];
                                                                        ?>"><?php echo $row['name']; ?> <?php echo $row['phone']; ?> </option>




                                                    <?php


                                                    } ?>





                                                </select>

                                            </div>


                                            <div class="input-group input-group-outline">

                                                <input type="date" id="tg1" name="tgbdd" onchange="settime()" class="form-control" data-bs-toggle="tooltipp" title="Thời gian bắt đầu" min="<?php $today = getdate();
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
                                                                                                                                                                                                                        echo $gioihanngay; ?>" placeholder="Họ và tên nhân viên" onfocus="focused(this)" required onfocusout="defocused(this)">

                                            </div>


                                            <div class="input-group input-group-outline" style="margin-top:20px;">

                                                <input type="date" name="tgktt" id="tg2" disabled class="form-control" onchange="settime()" data-bs-toggle="tooltipp" title="Thời gian kết thúc" max="<?php $dateint2 = mktime(0, 0, 0, $thang, ($ngay + 365), $nam);
                                                                                                                                                                                                        $gioihanngayketthuc = date('Y-m-d', $dateint2);
                                                                                                                                                                                                        echo $gioihanngayketthuc; ?>" placeholder="Họ và tên nhân viên">

                                            </div>

                                            <div class="input-group input-group-outline">

                                                <input type="number" name="datcoc" style="margin-top:20px;" min="50" id="datcoc" onchange="tongngay()" class="form-control" data-bs-toggle="tooltipp" title="Tiền đặt cộc" placeholder="Đặt cộc" onfocus="focused(this)" required onfocusout="defocused(this)">

                                            </div>
                                            <div class="input-group input-group-outline" style="margin-top:20px;">

                                                <input type="number" name="phiphatsinh" onclick="giaxe()" maxlength="10" min="0" placeholder="Phí phát sinh" data-bs-toggle="tooltipp" title="Phí phát sinh" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                                            </div>
                                            <div class="input-group input-group-outline" style="margin-top:20px;">

                                                <input type="text" id="tongngay" name="songay" required placeholder="Tổng số ngày" data-bs-toggle="tooltipp" readonly='true' title="Số ngày" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                                            </div>





                                            <button type="submit" class="btn btn-primary" name="themnhanvien" style=" margin-top:20px; width:490px;">
                                                Thêm
                                            </button>

                                        </form>


                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>





                <div class="card mb-4">

                    <div class="card-header" style="display:flex;">

                        <i class="fas fa-table me-4"></i>
                        Danh sách đặt xe
                        <div class="dropdown">
                            <button type="button" style="margin-left:20px;" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                <?php if (isset($_GET['iddate'])) {
                                    if ($_GET['iddate'] == 1) {
                                        echo "Tất cả";
                                    }
                                    if ($_GET['iddate'] == 2) {
                                        echo "Lịch hôm nay";
                                    }
                                    if ($_GET['iddate'] == 3) {
                                        echo "Kết thúc hôm nay";
                                    }
                                } else {
                                    echo "Tất cả";
                                } ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./dondatxe.php?iddate=1">Tất cả</a></li>
                                <li><a class="dropdown-item" href="./dondatxe.php?iddate=2">Lịch hôm nay</a></li>
                                <li><a class="dropdown-item" href="./dondatxe.php?iddate=3">Kết thúc hôm nay</a></li>
                            </ul>
                        </div>


                        <button type="button" class="btn btn-primary" style=" <?php if (isset($_GET['iddate'])) {
                                                                                    if ($_GET['iddate'] == 1) {
                                                                                        echo "margin-left:630px;";
                                                                                    }
                                                                                    if ($_GET['iddate'] == 2) {
                                                                                        echo "margin-left:580px;";
                                                                                    }
                                                                                    if ($_GET['iddate'] == 3) {
                                                                                        echo "margin-left:540px;";
                                                                                    }
                                                                                } else {
                                                                                    echo "margin-left:750px;";
                                                                                } ?>margin-bottom:4px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Thêm đơn
                        </button>

                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['iddate'])) {
                            if ($_GET['iddate'] == 1) {
                                $listdathang = $ketnoi->Listdonall();
                            }
                            if ($_GET['iddate'] == 2) {
                                $now = getdate();
                                $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
                                $listdathang = $ketnoi->Listdonhomnay($currentDate);
                            }
                            if ($_GET['iddate'] == 3) {
                                $now = getdate();
                                $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
                                $listdathang = $ketnoi->Listkthomnay($currentDate);
                            }
                        } else {
                            $listdathang = $ketnoi->Listdonall();
                        }




                        ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Biển số</th>
                                    <th>Tên KH</th>

                                    <th>Bắt đầu</th>
                                    <th>Kết thúc</th>
                                    <th>Phone</th>

                                    <th>Tổng</th>

                                    <th>Hình ảnh</th>

                                    <th>Hoạt Động</th>
                                    <th>Tác Vụ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php



                                while ($row = mysqli_fetch_assoc($listdathang)) {


                                ?>


                                    <tr <?php if ($row['status'] == 2) {
                                            echo "style='background-color:#B9EDED;'";
                                        }
                                        if ($row['status'] == 1) {
                                            echo "style='background-color:#E8C5CE;'";
                                        } ?>>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['plate_car'] ?></td>
                                        <td><?php echo $row['tenkh'] ?></td>
                                        <td><?php echo $row['pickup_datetime'] ?></td>
                                        <td><?php echo $row['dropoff_datetime'] ?></td>
                                        <td><?php echo $row['phonekh'] ?></td>

                                        <td><?php echo $row['total_price'] . ".0" ?></td>
                                        <td><img src="./foderadmin/imagecar/<?php echo $row['image'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>img" style="Min-width:60px; Max-width:60px; Min-height:40px; Max-height:40px; border-radius:10px; cursor:pointer;" /></td>
                                        <td>
                                            <?php
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
                                            if ($row['status'] == 1) {
                                            ?>
                                                <a <?php if ($row['trangthaixe'] == 3 || $row['trangthaixe'] == 2) {
                                                        echo "data-bs-toggle='modal' data-bs-target='#exampleModalxeban'";
                                                    } else {
                                                     
                                                    if ($row['pickup_datetime'] == $tghomnay) {
                                                       
                                                    
                                                    ?> href="./doitrangthai.php?tinhtrangdondatxe=1&idxe=<?php echo $row['car_id'] ?>&iddon=<?php echo $row['id'] ?>" <?php } } ?>><button class="btn btn-primary" <?php if ($row['pickup_datetime'] != $tghomnay) { echo "disabled"; } ?>  style="padding:5px; width:85px; height:60px;" name="baohanhxong">Giao xe</button></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($row['status'] == 2) {
                                            ?>
                                                <a href="./doitrangthai.php?tinhtrangdondatxe=2&idxe=<?php echo $row['car_id'] ?>&iddon=<?php echo $row['id'] ?>"><button class="btn btn-secondary" style="padding:5px; width:85px; " name="baohanhxong">Thanh toán</button></a>
                                            <?php
                                            }
                                            ?>

                                            <button class="btn btn-info" style="padding:5px; width:85px; height:60px;" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>xem" name="baohanhxong">Xem</button>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] != 3) {

                                            ?>
                                                <a href="./suadon.php?idhoadon=<?php echo $row['id'] ?>&idxe=<?php echo $row['car_id'] ?>" style="cursor:pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                </a><?php } ?> <?php if ($row['status'] != 2 && $row['status'] != 3) {
                                                                    # code...
                                                                ?><a href="./delete.php?idhoadon=<?php echo $row['id'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>










                                    <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>xem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="width:600px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn: <i style="color:red;"><?php if (isset($row['plate_car'])) {
                                                                                                                                            echo "MD" . $row['id'];
                                                                                                                                        } ?></i> </h5>
                                                    <button type="button" style="background-color:black;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img style="width:550px;" src="./foderadmin/imagekhachhang/<?php echo $row['img1kh'] ?>" alt="">
                                                    <hr>
                                                    <Label>Thời gian:</Label>
                                                    <label for=" " style="color:#808000;"><?php if (isset($row['pickup_datetime'])) {
                                                                                                echo $row['pickup_datetime'] . " - " . $row['dropoff_datetime'];
                                                                                            } ?></label>
                                                    <br>

                                                    <Label>Thời gian tạo đơn:</Label>
                                                    <label for="" style="color:#808000;"><?php if (isset($row['creat_time'])) {
                                                                                                echo $row['creat_time'];
                                                                                            } ?></label>
                                                    <br>

                                                    <Label>Người tạo:</Label>
                                                    <label for=""><?php if (isset($row['name'])) {
                                                                        echo $row['name'] . " - " . $row['ID'];
                                                                    } ?></label>
                                                    <br>
                                                    <Label>Họ và tên người thuê:</Label>
                                                    <label for=" " style="color:black;"><?php if (isset($row['tenkh'])) {
                                                                                            echo $row['tenkh'] . " - " . $row['khachhang_id'];
                                                                                        } ?></label>
                                                    <br>
                                                    <Label>Số điện thoại người thuê:</Label>
                                                    <label for="" style="color:black;"><?php if (isset($row['phonekh'])) {
                                                                                            echo $row['phonekh'];
                                                                                        } ?></label>
                                                    <br>
                                                    <Label>Xe thuê:</Label>
                                                    <label for="" style="color:black;"><?php if (isset($row['doi_xe']) && isset($row['loai_xe']) && isset($row['plate_car'])) {
                                                                                            echo $row['plate_car'] . " - " . $row['loai_xe'] . " - " . $row['doi_xe'] . " - " . $row['name-category'];
                                                                                        } ?></label>
                                                    <br>

                                                    <Label>Thiết bị xe:</Label>
                                                    <label for=""><?php if (isset($row['thietbi'])) {
                                                                        echo $row['thietbi'] . "   (" . $row['description_thietbi'] . ") ";
                                                                    } ?></label>
                                                    <br>
                                                    <Label>Giá xe/ngày:</Label>
                                                    <label for=""><?php if (isset($row['price'])) {
                                                                        echo $row['price'] . ".000 vnđ /Ngày";
                                                                    } ?></label>
                                                    <br>
                                                    <Label>Đặt cọc trước:</Label>
                                                    <label for=""><?php if (isset($row['price_deposit'])) {
                                                                        echo $row['price_deposit'] . ".000 vnđ";
                                                                    } ?></label>
                                                    <br>
                                                    <Label>Phí phát sinh:</Label>
                                                    <label for=""><?php if (isset($row['price_incurred'])) {
                                                                        echo $row['price_incurred'] . '.000 nvđ';
                                                                    } ?></label>
                                                    <br>
                                                    <Label>Tổng hợp đồng:</Label>
                                                    <label for="" style="color:#A0522D;"><?php if (isset($row['total_price'])) {
                                                                                                echo $row['total_price'] . '.000 nvđ (Bao gồm phí phát - chưa trừ tiền cộc)';
                                                                                            } ?></label>

                                                    <br>
                                                    <Label>Tình trạng hợp đồng:</Label>

                                                    <label for=""><?php if ($row['status'] == 1) {
                                                                        echo "Chờ giao xe";
                                                                    } elseif ($row['status'] == 2) {
                                                                        echo "Đang chạy";
                                                                    } else {
                                                                        echo "Đã kết thúc";
                                                                    } ?></label>


                                                </div>

                                            </div>
                                        </div>
                                    </div>





                                    <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-right:550px;">

                                            <div class="modal-body">
                                                <img src="./foderadmin/imagecar/<?php echo $row['image'] ?>" style="border-radius:20px; Min-width:600px; Max-width:600px; Min-height:400px; Max-height:400px;" alt="">
                                            </div>


                                        </div>
                                    </div>

                                    
                                   
                                <?php

                                }
                                ?>
                                <div class="modal fade" id="exampleModalxeban" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="width:600px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn: <i style="color:red;"><?php if (isset($row['plate_car'])) {
                                                                                                                                        echo "MD" . $row['id'];
                                                                                                                                    } ?></i> </h5>
                                                <button type="button" style="background-color:black;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="">Vui lòng kiểm tra lại trạng thái của xe</label>



                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </tbody>
                        </table>
                    </div>
                </div>







            </div>
        </main>

    </div>










    <?php include 'footer.php' ?>
    </div>
    </main>


    <?php include 'doipass.php' ?>

    <!--   Core JS Files   -->





    <script src="foderadmin/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="foderadmin/assets/js/plugins/smooth-scrollbar.min.js"></script>


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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./foderlogin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="./foderlogin/js/datatables-simple-demo.js"></script>



    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltipp"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        function settime() {
            let domain = document.getElementById('tg1').value;

            document.getElementById('tg2').min = domain;

            document.getElementById("tg2").disabled = false;

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





            // let ms1 = d1.getTime();
            // let ms2 = d2.getTime();
            // let k1 = Math.ceil((ms2 - ms1) / (24*60*60*1000));

            //document.getElementById('kq2').value = d2;



        }
    </script>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>



</body>

</html>