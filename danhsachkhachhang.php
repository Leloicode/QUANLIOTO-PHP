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



  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="/foderlogin/css/styles.css" rel="stylesheet" />

  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
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


                <div class="card mb-1" style="width:550px; Max-height:589px;">
                  <div class="card-header">

                    Thêm khách hàng
                  </div>
                  <?php
                  if (isset($_POST['themkhachhang'])) {


                    $hovaten = $_POST['hovaten'];

                    
                    $phone = $_POST['phone'];
                    $capnhathinhanh1 = $_FILES['myFile1'];
                    $tenfile1 = $capnhathinhanh1['name'];
                    $capnhathinhanh2 = $_FILES['myFile2'];
                    $tenfile2 = $capnhathinhanh2['name'];

                    
                   

                      if ($tenfile1 && $tenfile2) {
                        $Addkhachhang = $ketnoi->Addkhachhang2img($hovaten,$phone,$tenfile1,$tenfile2);
                        move_uploaded_file($capnhathinhanh1['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile1);
                        move_uploaded_file($capnhathinhanh2['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile2);
                      } else {
                        if ($tenfile1) {
                          $Addkhachhang = $ketnoi->Addkhachhangimg1($hovaten, $phone, $tenfile1);
                          move_uploaded_file($capnhathinhanh1['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile1);
                        } elseif ($tenfile2) {

                          $Addkhachhang = $ketnoi->Addkhachhangimg2($hovaten, $phone, $tenfile2);
                          move_uploaded_file($capnhathinhanh2['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile2);
                        } else {
                          $Addkhachhang = $ketnoi->Addkhachhang($hovaten, $phone);
                        }
                      }

                      if ($Addkhachhang) {
                      ?>
                        <script>
                          alert("Thêm khách hàng thành công");
                          //setTimeout(window.location.replace("./loaixe.php"), 800);
                        </script>
                  <?php
                      }
                    }
                  

                  ?>
                  <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">

                      <div class="input-group input-group-outline" style="margin-top:-30px;">

                        <input type="text" name="hovaten" class="form-control" data-bs-toggle="tooltipp" title="Họ và tên khách hàng" placeholder="Họ và tên khách hàng" onfocus="focused(this)" required onfocusout="defocused(this)">

                      </div>
                     
                      
                      <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="number" name="phone" maxlength="10" placeholder="Số điện thoại" data-bs-toggle="tooltipp" title="Số điện thoại 10 số" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">

                      </div>
                      
                      <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="file" name="myFile1" data-bs-toggle="tooltipp" title="Chứng minh thư mặt trước" class="form-control">

                      </div>
                      <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="file" name="myFile2" data-bs-toggle="tooltipp" title="Chứng minh thư mặt sau" class="form-control">

                      </div>

                      <button type="submit" class="btn btn-primary" name="themkhachhang" style=" margin-top:20px; width:490px;">
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
            Danh sách nhân viên
                    
            <button type="button" class="btn btn-primary" style="margin-left:800px;margin-bottom:4px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Thêm khách hàng
            </button>

          </div>
          <div class="card-body">

            <?php
            $listkhachhang = $ketnoi->Listkhachhang();


            ?>
            <table id="datatablesSimple">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Điện thoại</th>
                  <th>Giấy tờ 1</th>
                  <th>Giấy tờ 2</th>
                  
                  <th>Tác vụ</th>
                </tr>
              </thead>

              <tbody>
                <?php



                while ($row = mysqli_fetch_assoc($listkhachhang)) {


                ?>


                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>

                   <td><?php echo $row['phone'] ?></td>
                    <td><?php
                        if ($row['citizen_identification1'] == NULL) {
                          echo "Chưa cung cấp";
                        } else {


                        ?><img src="./foderadmin/imagekhachhang/<?php echo $row['citizen_identification1'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>img1" style="Min-width:60px; Max-width:60px; Min-height:40px; Max-height:40px; border-radius:10px; cursor:pointer;" /> <?php } ?></td>
                    <td><?php
                        if ($row['citizen_identification2'] == NULL) {
                          echo "Chưa cung cấp";
                        } else {


                        ?><img src="./foderadmin/imagekhachhang/<?php echo $row['citizen_identification2'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>img2" style="Min-width:60px; Max-width:60px; Min-height:40px; Max-height:40px; border-radius:10px; cursor:pointer;" /><?php  } ?></td>
                   
                    <td>
                      <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>suakhachhang" style="cursor:pointer;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                      </a> <a href="./delete.php?idkhachhang=<?php echo $row['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>img1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="margin-right:550px;">

                      <div class="modal-body">
                        <img src="./foderadmin/imagekhachhang/<?php echo $row['citizen_identification1'] ?>" style="border-radius:20px; Min-width:600px; Max-width:600px; Min-height:400px; Max-height:400px;" alt="">
                      </div>


                    </div>
                  </div>
                  <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>img2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="margin-right:550px;">

                      <div class="modal-body">
                        <img src="./foderadmin/imagekhachhang/<?php echo $row['citizen_identification2'] ?>" style="border-radius:20px; Min-width:600px; Max-width:600px; Min-height:400px; Max-height:400px;" alt="">
                      </div>


                    </div>
                  </div>
                  <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>suakhachhang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content " style="width:590px;">

                        <div class="modal-body">


                          <div class="card mb-1" style="width:550px; Max-height:600px;">
                            <div class="card-header">

                              Cập nhật khách hàng
                            </div>
                            <?php
                            if (isset($_POST['suakh' . $row['id']])) {


                              $hovaten = $_POST['hovatenn'];
                              
                              $phone = $_POST['phonee'];

                              $capnhathinhanh1 = $_FILES['myFile1'];
                              $tenfile1 = $capnhathinhanh1['name'];
                              $capnhathinhanh2 = $_FILES['myFile2'];
                              $tenfile2 = $capnhathinhanh2['name'];

                             

                                if ($tenfile1 && $tenfile2) {
                                  $Updatekhachhang = $ketnoi->Updatekhachhang2img($hovaten, $phone, $tenfile1, $tenfile2, $row['id']);
                                  move_uploaded_file($capnhathinhanh1['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile1);
                                  move_uploaded_file($capnhathinhanh2['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile2);
                                } else {
                                  if ($tenfile1) {
                                    $Updatekhachhang = $ketnoi->Updatekhachhangimg1($hovaten, $phone, $tenfile1, $row['id']);
                                    move_uploaded_file($capnhathinhanh1['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile1);
                                  } elseif ($tenfile2) {

                                    $Updatekhachhang = $ketnoi->Updatekhachhangimg2($hovaten, $phone, $tenfile2, $row['id']);
                                    move_uploaded_file($capnhathinhanh2['tmp_name'], './foderadmin/imagekhachhang/' . $tenfile2);
                                  } else {
                                    $Updatekhachhang = $ketnoi->Updatekhachhang($hovaten, $phone, $row['id']);
                                  }
                                }

                                if ($Updatekhachhang) {
                            ?>
                                  <script>
                                    alert("Cập nhật nhân viên thành công");
                                    window.location.replace("./danhsachkhachhang.php");
                                  </script>
                                <?php
                                }
                               else {
                                ?>
                                  <script>
                                    alert("Cập nhật nhân viên thất bại");
                                    window.location.replace("./danhsachkhachhang.php");
                                  </script>
                                <?php
                                 
                              }
                            }

                            ?>
                            <div class="card-body">

                              <form action="" method="post" enctype="multipart/form-data">

                                <div class="input-group input-group-outline" style="margin-top:-30px;">

                                  <input type="text" name="hovatenn" class="form-control" value="<?php if (isset($row['name'])) {
                                                                                                    echo $row['name'];
                                                                                                  } ?>" onfocus="focused(this)" data-bs-toggle="tooltipp" title="Họ và tên khách hàng" placeholder="Họ và tên khách hàng" required onfocusout="defocused(this)">

                                </div>
                                
                                <div class="input-group input-group-outline" style="margin-top:20px;">

                                  <input type="text" name="phonee" value="<?php if (isset($row['phone'])) {
                                                                            echo $row['phone'];
                                                                          } ?>" class="form-control" onfocus="focused(this)" data-bs-toggle="tooltipp" title="Số điện thoại khách hàng" placeholder="Số điện thoại khách hàng" required onfocusout="defocused(this)">

                                </div>
                                <div class="input-group input-group-outline" style="margin-top:20px;">

                                  <input type="file" name="myFile1" data-bs-toggle="tooltipp" title="Chứng minh thư mặt trước" class="form-control">

                                </div>
                                <div class="input-group input-group-outline" style="margin-top:20px;">

                                  <input type="file" name="myFile2" data-bs-toggle="tooltipp" title="Chứng minh thư mặt sau" class="form-control">

                                </div>

                                <button type="submit" class="btn btn-primary" name="suakh<?php echo $row['id'] ?>" style=" margin-top:20px; width:490px;">
                                  Lưu
                                </button>

                              </form>


                            </div>
                          </div>


                        </div>

                      </div>
                    </div>
                  </div>
                <?php

                }
                ?>

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





</body>

</html>