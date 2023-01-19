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
            <div class="container-fluid px-1" >

            

            
                


            <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content "  style="width:590px;">
      
      <div class="modal-body" >
        
      
      <div class="card mb-1" style="width:550px; Max-height:530px;">
                    <div class="card-header">

                        Thêm Loại xe
                    </div>
                    <?php
                    if (isset($_POST['clickk'])) {
                      if (!isset($_POST['danhmuc'])) {
        
                        //$mota= $_POST['motathietbi'];
                        //$adddanhmuc = $ketnoi->Addthietbi($namethiettbi,$mota);
                     
                      
                        
                        ?>
                        <script>alert('Vui lòng chọn danh mục');</script>
                        <?php 
                       
                      }
                      else {
                        $danhmuc = $_POST['danhmuc'];
                        $tenloaixe = $_POST['tenloaixe'];
                        $doixe= $_POST['doixe'];
                        $thietbi= $_POST['thietbi'];
                        $motathietbi= $_POST['motathietbi'];
                        $addloaixe=$ketnoi->Addloaixe($danhmuc,$tenloaixe,$doixe,$thietbi,$motathietbi);
                       if ($addloaixe) {
                        ?>
                         <script>
                          alert("Thêm loại xe thành công");
                          //setTimeout(window.location.replace("./loaixe.php"), 800);
                          </script>
                        <?php
                       }
                      }
                    }
                    
                    ?>
                    <div class="card-body" >
                    
                    <form action="" method="post" >
                    <select class="form-select form-select-lg shadow-none bg-light border-0" name="danhmuc" required style="border: 1px solid red  ; " >
                      <option disabled selected>Chọn danh mục</option>
                      <?php $listdanhmuc = $ketnoi->ListSP("SELECT * FROM `category`"); while ($row = mysqli_fetch_assoc($listdanhmuc)) {
                        
                      ?>
                      <option value="<?php echo $row['id'] ?>" ><?php echo $row['name-category'] ?></option>
                     
                      <?php } ?>
                  </select>
                    <div class="input-group input-group-outline" style="margin-top:20px;">
                        <label class="form-label">Tên loại xe</label>
                        <input type="text" name="tenloaixe" class="form-control"   onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">
                        <label class="form-label">Đời xe</label>
                        <input type="number" name="doixe" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">
                        <label class="form-label">Thiết bị</label>
                        <input type="text" name="thietbi" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">
                        <label class="form-label">Mô tả thiết bị</label>
                        <input type="text" name="motathietbi" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="clickk"  style=" margin-top:10px; width:490px;">
                    Thêm
                    </button>
                    
                    </form>
                   
                    
                    </div>
            </div>


      </div>
      
    </div>
  </div>
</div>        




          
        
            <div class="card mb-4" >
                
                    <div class="card-header" style="display:flex;">
                      
                        <i class="fas fa-table me-4"></i>
                        Danh sách loại xe
                        <button type="button" class="btn btn-primary" style="margin-left:880px; margin-bottom:4px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Thêm Loại xe
                        </button>
                    </div>
                    <div class="card-body">
                        
                        <?php
                      $listloaixe = $ketnoi->Listloaixe();
                        

                         ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Danh mục</th>
                                    <th>Tên Loại xe</th>
                                    <th>Đời xe</th>
                                    <th>Thiết bị</th>
                                    <th>Mô tả thiết bị</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                               
                               
                              
                                while ($row = mysqli_fetch_assoc($listloaixe)) {
                     
                 
                                ?>
                                
           
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name-category'] ?></td>
                                    <td><?php echo $row['loai_xe'] ?></td>
                                    <td><?php echo $row['doi_xe'] ?></td>
                                    <td><?php echo $row['thietbi'] ?></td>
                                    <td><?php echo $row['description_thietbi'] ?></td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>" style="cursor:pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                                        </a> <a href="./delete.php?idloaixe=<?php echo $row['id'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade"  id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content "  style="width:590px;">
      
      <div class="modal-body" >
        
      
      <div class="card mb-1" style="width:550px; Max-height:530px;">
                    <div class="card-header">

                        Cập nhật loại xe
                    </div>
                    <?php
                    if (isset($_POST['click'.$row['id']])) {
                     
                      
                        $danhmuc = $_POST['ddanhmuc'];
                        $tenloaixe = $_POST['ttenloaixe'];
                        $doixe= $_POST['ddoixe'];
                        $thietbi= $_POST['tthietbi'];
                        $motathietbi= $_POST['mmotathietbi'];
                        $updateloaixe=$ketnoi->updateloaixe($danhmuc,$tenloaixe,$doixe,$thietbi,$motathietbi,$row['id']);
                       if (isset($updateloaixe)) {
                
           
                        ?>
                        <script>
                          alert("Cập nhật loại xe thành công");
                          //setTimeout(window.location.replace("./loaixe.php"), 800);
                          window.location.replace("./loaixe.php"); </script>
                        <?php
                                    }
                    }
                    
                    ?>
                    <div class="card-body" >
             
                    <form action="" method="post" >
                    <select class="form-select" name="ddanhmuc" required style="border: 1px solid red  ; " >
                     
                      <?php $listdanhmuc = $ketnoi->ListSP("SELECT * FROM `category`"); while ($row1 = mysqli_fetch_assoc($listdanhmuc)) {
                        
                      ?>
                      <option value="<?php echo $row1['id'] ?>" <?php if ($row1['id'] == $row['id_category']) {
                        echo "selected";
                         
                      }?> ><?php echo $row1['name-category'] ?></option>
                     
                      <?php } ?>
                  </select>
                    <div class="input-group input-group-outline" style="margin-top:20px;">
         
                        <input type="text" name="ttenloaixe" class="form-control" value="<?php if (isset($row['loai_xe'])) {
                         echo $row['loai_xe'];
                        } ?>"  onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="number" name="ddoixe" value="<?php if (isset($row['doi_xe'])) {
                         echo $row['doi_xe'];
                        } ?>" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="text" name="tthietbi" value="<?php if (isset($row['thietbi'])) {
                         echo $row['thietbi'];
                        } ?>" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                    <div class="input-group input-group-outline" style="margin-top:20px;">

                        <input type="text" name="mmotathietbi" value="<?php if (isset($row['description_thietbi'])) {
                         echo $row['description_thietbi'];
                        } ?>" class="form-control" onfocus="focused(this)" required onfocusout="defocused(this)">
                            
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="click<?php echo $row['id'] ?>"  style=" margin-top:10px; width:490px;">
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





    


</body>

</html>