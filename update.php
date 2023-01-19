<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


<body>
<?php 
require 'xesql.php';
$ketnoi = new Xe('localhost', 'root', '', 'quanlioto');
if (isset($_GET['iddanhmuc'])) {
    $iddanhmuc=$_GET['iddanhmuc'];
}
if (isset($_GET['idthietbi'])) {
    $idthietbi=$_GET['idthietbi'];
}

if (isset($_POST['capnhatdanhmuc'])) {
    $name= $_POST['namedanhmuc'];
    $updatedanhmuc = $ketnoi->updatedanhmuc($iddanhmuc,$name);
    if ($updatedanhmuc == true) {
         ?>
         <script>alert('Thay đổi danh mục thành công.');</script>
         <?php
    }
 }

 

?>
<?php 

//Cập nhật danh mục
if (isset($_GET['iddanhmuc'])) {

$danhmuc = $ketnoi->Listdanhmuc($iddanhmuc);
$row = mysqli_fetch_assoc($danhmuc);

?>
<div class="container rounded bg-white mt-4" style="width:500px;">

<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-2 border-right">

            <div class="d-flex flex-column align-items-center text-center p-3 py-4">

               <a href="./danhmucxe.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg></a>

            

            </div>


        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6>Cập nhật danh mục</h6>
                    </div>

                   
                </div>

             
                <div class="row mt-8">
                    <label for="" style="margin-left:12px;">Tên danh mục</label>
                    <div class="col-md-12"><input type="text" class="form-control" name="namedanhmuc" placeholder="" value="<?php if(isset($row['name-category'])) {
                     echo $row['name-category'];
                    }  ?>" required></div>
                    <div class="mt-2 text-right"><button name="capnhatdanhmuc" id="button1" type="submit" class="btn btn-success" style="margin-left:15px;">Cập nhật </button></div>
                </div>
               
              
            </div>

        </div>
    </div>
</form>
</div>

<?php 
}?>




</body>
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
        const editor = Jodit.make('#editor');
    </script>
</html>