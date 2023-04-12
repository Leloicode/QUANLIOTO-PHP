<?php

// echo "dsads";
 require 'xesql.php';
 $ketnoi = new Xe('localhost', 'root', '', 'quanlioto');
 //Doi tinh trang xe
 if ($_GET['amp;id']) {
     $_GET['id'] = $_GET['amp;id'];
 }
if (isset($_GET['id']) && isset($_GET['tinhtrang'])) {
    echo "ádsa";
    $id = $_GET['id'];
    if ($_GET['tinhtrang'] == 3) {
        $tinhtrang = 1;
        $doitrangthai = $ketnoi->Doitrangthai($tinhtrang,$id);
        header("Location: xe.php");
    }
    if ($_GET['tinhtrang'] == 1) {
        $tinhtrang = 3;
        $doitrangthai = $ketnoi->Doitrangthai($tinhtrang,$id);
        header("Location: xe.php");
    }
}

//đổi trạng thái nhân viên
if (isset($_GET['id']) && isset($_GET['tinhtrangnhanvien'])) {
    $id = $_GET['id'];
    if ($_GET['tinhtrangnhanvien'] == 0) {
        $tinhtrang = 1;
        $doitrangthai = $ketnoi->Doitrangthainhanvien($tinhtrang,$id);
        header("Location: danhsachnhanvien.php");
    }
    if ($_GET['tinhtrangnhanvien'] == 1) {
        $tinhtrang = 0;
        $doitrangthai = $ketnoi->Doitrangthainhanvien($tinhtrang,$id);
        header("Location: danhsachnhanvien.php");
    }
}



//đổi trạng thái xe
if (isset($_GET['tinhtrangdondatxe']) && isset($_GET['idxe']) && isset($_GET['iddon'])) {
 $trangthaiddx = $_GET['tinhtrangdondatxe'];
 $idxe = $_GET['idxe'];
 $iddon = $_GET['iddon'];
 if ($trangthaiddx == 1) {
    $doitrangthaixe = $ketnoi->Doitrangthaixe_dondatxe($idxe,2);
    $trangthaidonxe = $ketnoi->Doitrangthaidondatxe($iddon,2);
    header("Location: dondatxe.php");
 }
 if ($trangthaiddx == 2) {
    $doitrangthaixe = $ketnoi->Doitrangthaixe_dondatxe($idxe,1);
    $trangthaidonxe = $ketnoi->Doitrangthaidondatxe($iddon,3);
    header("Location: dondatxe.php");
 }

}


?>
