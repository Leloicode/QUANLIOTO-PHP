<?php 
 require 'xesql.php';
 $ketnoi = new Xe('localhost', 'root', '', 'quanlioto');
 //delete danhmuc
if (isset($_GET['iddanhmuc'])) {
    $iddanhmuc = $_GET['iddanhmuc'];
    $xoa = $ketnoi->deletedanhmuc($iddanhmuc);
    if ($xoa == true) {
        header("Location: danhmucxe.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa được danh mục này.\nBạn cần xóa xe có liên quan đến danh mục này!!!');
        </script>
        <a href="./danhmucxe.php" ><--Quay lại</a>
        <?php

        
    }
}

//delete loaixe
if (isset($_GET['idloaixe'])) {
    $idloaixe = $_GET['idloaixe'];
    $xoa = $ketnoi->deleteloaixe($idloaixe);
    if ($xoa == true) {
        header("Location: loaixe.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa thiết bị này.\nBạn cần xóa xe có liên quan đến thiết bị này!!!');
        </script>
        <a href="./loaixe.php" ><--Quay lại</a>
        <?php

        
    }
}
//;xóa xe
if (isset($_GET['idxe'])) {
    $idxe = $_GET['idxe'];
    $xoa = $ketnoi->Deletexe($idxe);
    if ($xoa == true) {
        header("Location: xe.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa xe này.\nBạn cần hủy đơn hoặc hoàn thành đơn!!!');
        </script>
        <a href="./xe.php" ><--Quay lại</a>
        <?php

        
    }

}

//xoanhanvien
if (isset($_GET['idnhanvien'])) {
    $idnhanvien = $_GET['idnhanvien'];
    $xoa = $ketnoi->deletenhanvien($idnhanvien);
    if ($xoa == true) {
        header("Location: danhsachnhanvien.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa nhân viên này.\nBạn cần xóa đơn có liên quan đến tnhân viên này!!!');
        </script>
        <a href="./danhsachnhanvien.php" ><--Quay lại</a>
        <?php

        
    }
}



//xoa khach hang
if (isset($_GET['idkhachhang'])) {
    $idkhachhang = $_GET['idkhachhang'];
    $xoa = $ketnoi->deletekhachhang($idkhachhang);
    if ($xoa == true) {
        header("Location: danhsachkhachhang.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa khách hàng này.\nBạn cần xóa đơn có liên quan đến khách hàng này!!!');
        </script>
        <a href="./danhsachkhachhang.php" ><--Quay lại</a>
        <?php

        
    }
}



//delete đơn đặt xe
if (isset($_GET['idhoadon'])) {
    $idhoadon = $_GET['idhoadon'];
    $xoa = $ketnoi->deletedonxe($idhoadon);
    if ($xoa == true) {
        header("Location: ./dondatxe.php");
    }
    else {
        ?>
        <script>
        var thongbao = alert('Để xóa đơn hàng này.\nBạn cần liên quan đến khách hàng này!!!');
        </script>
        <a href="./dondathang.php" ><--Quay lại</a>
        <?php

        
    }
}

?>