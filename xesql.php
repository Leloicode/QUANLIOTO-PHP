<?php 
require 'ketnoi.php';
    class Xe extends Ketnoi{
        public function Xe($host,$user,$pass,$database){
            parent::Ketnoi($host,$user,$pass,$database);
        }
        public function ListSP($sql){
            $ketqua = parent::Excute($sql);
            return $ketqua;
        }


        //danh_muc
        public function Listdanhmuc($id){
            $ketqua = parent::Excute("SELECT * FROM `category` WHERE id = $id");
            return $ketqua;
        }
        public function Adddanhmuc($name){
            $ketqua = parent::Excute("INSERT INTO `category`(`name-category`) VALUES ('$name')");
            return $ketqua;
        }
        public function deletedanhmuc($id){
            $ketqua = parent::Excute("DELETE FROM `category` WHERE id = $id");
            return $ketqua;
        }
        public function updatedanhmuc($id,$name){
            $ketqua = parent::Excute("UPDATE `category` SET `name-category`='$name' WHERE id = $id");
            return $ketqua;
        }
        //end_danhmuc

         //thiết bị
         public function Listloaixe(){
            $ketqua = parent::Excute("SELECT loai_car.*,category.`name-category` FROM `loai_car`,`category` WHERE category.id=loai_car.id_category");
            return $ketqua;
        }
        public function Oneloaixe($id){
            $ketqua = parent::Excute("SELECT * FROM `loai_car` WHERE id = $id");
            return $ketqua;
        }
        public function Addloaixe($iddanhmuc,$name,$doixe,$thietbi,$mota){
            $ketqua = parent::Excute("INSERT INTO `loai_car`(`id_category`, `loai_xe`, `doi_xe`, `thietbi`, `description_thietbi`) VALUES ('$iddanhmuc','$name','$doixe','$thietbi','$mota')");
            return $ketqua;
        }
        public function deleteloaixe($id){
            $ketqua = parent::Excute("DELETE FROM `loai_car` WHERE id = $id");
            return $ketqua;
        }
        public function updateloaixe($iddanhmuc,$loaixe,$doixe,$thietbi,$mota,$id){
            $ketqua = parent::Excute("UPDATE `loai_car` SET `id_category`='$iddanhmuc',`loai_xe`='$loaixe',`doi_xe`='$doixe',`thietbi`='$thietbi',`description_thietbi`='$mota' WHERE id = $id");
            return $ketqua;
        }

        //end-thietbi

        //Xe
        public function Listxe(){
            $ketqua = parent::Excute("SELECT car.*,loai_car.loai_xe,loai_car.doi_xe,loai_car.thietbi,loai_car.description_thietbi,category.`name-category` FROM `car`,`loai_car`,`category` WHERE car.loaixe_id = loai_car.id AND category.id = loai_car.id_category");
            return $ketqua;
        }
        public function Listxeorid($id){
            $ketqua = parent::Excute("SELECT * FROM `car` WHERE id = $id");
            return $ketqua;
        }
        public function Doitrangthai($tinhtrang,$id){
            $ketqua = parent::Excute("UPDATE `car` SET `status`='$tinhtrang' WHERE id = $id");
            return $ketqua;
        }

        public function Deletexe($id){
            $ketqua = parent::Excute("DELETE FROM `car` WHERE id= $id");
            return $ketqua;
        }
        public function Addxe($plate,$idloaixe,$price,$image){
            $ketqua = parent::Excute("INSERT INTO `car`( `plate_car`, `loaixe_id`, `price`, `image`, `status`) VALUES ('$plate','$idloaixe','$price','$image',1)");
            return $ketqua;
        }
        public function Updatexe($plate,$idloaixe,$price,$id){
            $ketqua = parent::Excute("UPDATE `car` SET `plate_car`='$plate',`loaixe_id`='$idloaixe',`price`='$price' WHERE id = $id");
            return $ketqua;
        }
        public function Updatexe_img($plate,$idloaixe,$price,$image,$id){
            $ketqua = parent::Excute("UPDATE `car` SET `plate_car`='$plate',`loaixe_id`='$idloaixe',`price`='$price',`image`='$image' WHERE id = $id");
            return $ketqua;
        }
        public function checkxe($plate,$loaixe){
            $ketqua = parent::Excute("SELECT * FROM `car` WHERE plate_car = '$plate' AND loaixe_id = $loaixe");
            return $ketqua;
        }

        //end-xe





        //nhan vien
        public function Listnhanvien(){
            $ketqua = parent::Excute("SELECT * FROM `staff` Where Role_id = 2 ");
            return $ketqua;
        }
        public function Addnhanvien2img($hovaten,$taikhoan,$matkhau,$phone,$img1,$img2){
            $ketqua = parent::Excute("INSERT INTO `staff`(`name`, `username`, `password`, `citizen_identification1`, `citizen_identification2`, `phone`, `Role_id`, `trangthai`) VALUES ('$hovaten','$taikhoan','$matkhau','$img1','$img2','$phone',2,0)");
            return $ketqua;
        }

        public function Addnhanvienimg1($hovaten,$taikhoan,$matkhau,$phone,$img1){
            $ketqua = parent::Excute("INSERT INTO `staff`(`name`, `username`, `password`, `citizen_identification1`, `phone`, `Role_id`, `trangthai`) VALUES ('$hovaten','$taikhoan','$matkhau','$img1','$phone',2,0)");
            return $ketqua;
        }
        public function Addnhanvienimg2($hovaten,$taikhoan,$matkhau,$phone,$img2){
            $ketqua = parent::Excute("INSERT INTO `staff`(`name`, `username`, `password`, `citizen_identification2`, `phone`, `Role_id`, `trangthai`) VALUES ('$hovaten','$taikhoan','$matkhau','$img2','$phone',2,0)");
            return $ketqua;
        }
        public function Addnhanvien($hovaten,$taikhoan,$matkhau,$phone){
            $ketqua = parent::Excute("INSERT INTO `staff`(`name`, `username`, `password`, `phone`, `Role_id`, `trangthai`) VALUES ('$hovaten','$taikhoan','$matkhau','$phone',2,0)");
            return $ketqua;
        }
        public function deletenhanvien($id){
            $ketqua = parent::Excute("DELETE FROM `staff` WHERE id = $id");
            return $ketqua;
        }
        public function Doitrangthainhanvien($tinhtrang,$id){
            $ketqua = parent::Excute("UPDATE `staff` SET `trangthai`='$tinhtrang' WHERE ID = $id");
            return $ketqua;
        }
        public function Updatenhanvien2img($hovaten,$taikhoan,$matkhau,$phone,$img1,$img2,$id){
            $ketqua = parent::Excute("UPDATE `staff` SET `name`='$hovaten',`username`='$taikhoan',`password`='$matkhau',`citizen_identification1`='$img1',`citizen_identification2`='$img2',`phone`='$phone' WHERE ID = $id");
            return $ketqua;
        }
        public function Updatenhanvienimg1($hovaten,$taikhoan,$matkhau,$phone,$img1,$id){
            $ketqua = parent::Excute("UPDATE `staff` SET `name`='$hovaten',`username`='$taikhoan',`password`='$matkhau',`citizen_identification1`='$img1',`phone`='$phone' WHERE ID = $id");
            return $ketqua;
        }
        public function Updatenhanvienimg2($hovaten,$taikhoan,$matkhau,$phone,$img2,$id){
            $ketqua = parent::Excute("UPDATE `staff` SET `name`='$hovaten',`username`='$taikhoan',`password`='$matkhau',`citizen_identification2`='$img2',`phone`='$phone' WHERE ID = $id");
            return $ketqua;
        }
        public function Updatenhanvien($hovaten,$taikhoan,$matkhau,$phone,$id){
            $ketqua = parent::Excute("UPDATE `staff` SET `name`='$hovaten',`username`='$taikhoan',`password`='$matkhau',`phone`='$phone' WHERE ID = $id");
            return $ketqua;
        }

        //end nhan vien





        //khách hàng
        public function Listkhachhang(){
            $ketqua = parent::Excute("SELECT * FROM `khachhang`");
            return $ketqua;
        }


        public function Addkhachhang2img($hovaten,$phone,$img1,$img2){
            $ketqua = parent::Excute("INSERT INTO `khachhang`(`name`, `citizen_identification1`, `citizen_identification2`, `phone`) VALUES ('$hovaten','$img1','$img2','$phone')");
            return $ketqua;
        }
        public function Addkhachhangimg1($hovaten,$phone,$img1){
            $ketqua = parent::Excute("INSERT INTO `khachhang` (`name`, `citizen_identification1`, `phone`) VALUES ('$hovaten','$img1','$phone')");
            return $ketqua;
        }
        public function Addkhachhangimg2($hovaten,$phone,$img2){
            $ketqua = parent::Excute("INSERT INTO `khachhang` (`name`, `citizen_identification2`, `phone`) VALUES ('$hovaten','$img2','$phone')");
            return $ketqua;
        }
        public function Addkhachhang($hovaten,$phone){
            $ketqua = parent::Excute("INSERT INTO `khachhang` (`name`, `phone`) VALUES ('$hovaten','$phone')");
            return $ketqua;
        }
        public function deletekhachhang($id){
            $ketqua = parent::Excute("DELETE FROM `khachhang` WHERE id = $id");
            return $ketqua;
        }

        public function Updatekhachhang2img($hovaten,$phone,$img1,$img2,$id){
            $ketqua = parent::Excute("UPDATE `khachhang` SET `name`='$hovaten',`citizen_identification1`='$img1',`citizen_identification2`='$img2',`phone`='$phone' WHERE id = $id");
            return $ketqua;
        }
        public function Updatekhachhangimg1($hovaten,$phone,$img1,$id){
            $ketqua = parent::Excute("UPDATE `khachhang` SET `name`='$hovaten',`citizen_identification1`='$img1',`phone`='$phone' WHERE id = $id");
            return $ketqua;
        }
        public function Updatekhachhangimg2($hovaten,$phone,$img2,$id){
            $ketqua = parent::Excute("UPDATE `khachhang` SET `name`='$hovaten',`citizen_identification2`='$img2',`phone`='$phone' WHERE id = $id");
            return $ketqua;
        }
        public function Updatekhachhang($hovaten,$phone,$id){
            $ketqua = parent::Excute("UPDATE `khachhang` SET `name`='$hovaten',`phone`='$phone' WHERE id = $id");
            return $ketqua;
        }
        //end khách hàng


        //dondathang
       
        public function Listdonall(){
           
            $ketqua = parent::Excute("SELECT book_car.*,staff.*,khachhang.name AS 'tenkh',khachhang.citizen_identification1 AS 'img1kh',khachhang.citizen_identification2 AS 'img2kh',khachhang.phone AS 'phonekh',car.id AS 'idxe' , car.plate_car,car.loaixe_id,car.price,car.image,car.status AS 'trangthaixe',loai_car.id AS 'idloaixe',loai_car.loai_xe,loai_car.doi_xe,loai_car.thietbi,loai_car.description_thietbi,category.id AS 'iddanhmuc' ,category.`name-category` FROM `book_car`,`staff`,`khachhang`,`car`,`loai_car`,`category` WHERE book_car.car_id = car.id AND book_car.khachhang_id = khachhang.id AND book_car.staff_id= staff.ID AND loai_car.id =car.loaixe_id AND loai_car.id_category = category.id ORDER BY book_car.id desc ");
           return $ketqua;
       }

                public function Listdonhomnay($time){
                    
                    $ketqua = parent::Excute("SELECT book_car.*,staff.*,khachhang.name AS 'tenkh',khachhang.citizen_identification1 AS 'img1kh',khachhang.citizen_identification2 AS 'img2kh',khachhang.phone AS 'phonekh',car.id AS 'idxe' , car.plate_car,car.loaixe_id,car.price,car.image,car.status AS 'trangthaixe' FROM `book_car`,`staff`,`khachhang`,`car` WHERE book_car.car_id = car.id AND book_car.khachhang_id = khachhang.id AND book_car.staff_id= staff.ID AND pickup_datetime = '$time' AND book_car.status != 3  ORDER BY book_car.id desc");
                    return $ketqua;
                }
                public function Listkthomnay($time){
                    
                    $ketqua = parent::Excute("SELECT book_car.*,staff.*,khachhang.name AS 'tenkh',khachhang.citizen_identification1 AS 'img1kh',khachhang.citizen_identification2 AS 'img2kh',khachhang.phone AS 'phonekh',car.id AS 'idxe' , car.plate_car,car.loaixe_id,car.price,car.image,car.status AS 'trangthaixe' FROM `book_car`,`staff`,`khachhang`,`car` WHERE book_car.car_id = car.id AND book_car.khachhang_id = khachhang.id AND book_car.staff_id= staff.ID AND dropoff_datetime = '$time' AND book_car.status != 3 ORDER BY book_car.id desc");
                return $ketqua;
            }
                public function Checkdonxe($xe){
                    
                    $ketqua = parent::Excute("SELECT * FROM `book_car` WHERE car_id = $xe AND status != 3");
                    return $ketqua;
            }
            public function Adddonxe($idxe,$tgbd,$tgkt,$idkh,$idnv,$giadatcoc,$phiphatsinh,$tong){
                    
                $ketqua = parent::Excute("INSERT INTO `book_car`(`id`, `car_id`, `creat_time`, `pickup_datetime`, `dropoff_datetime`, `khachhang_id`, `staff_id`, `status`, `price_deposit`, `price_incurred`, `total_price`) VALUES (NULL,'$idxe',current_timestamp(),'$tgbd','$tgkt','$idkh','$idnv',1,'$giadatcoc','$phiphatsinh','$tong')");
            return $ketqua;
            }

            public function deletedonxe($id){
                    
                $ketqua = parent::Excute("DELETE FROM `book_car` WHERE id = $id");
            return $ketqua;
            }


            public function Doitrangthaixe_dondatxe($idxe,$trangthai){
                $ketqua1 = parent::Excute("UPDATE `car` SET `status`='$trangthai' WHERE id = $idxe");
                return $ketqua1;
            
            }
            public function Doitrangthaidondatxe($iddon,$trangthai){
                $ketqua1 = parent::Excute("UPDATE `book_car` SET `status`='$trangthai' WHERE id = $iddon");
                return $ketqua1;
            
            }
            public function hienthidon($iddon){
                $ketqua1 = parent::Excute("SELECT car.id AS 'idxe',car.plate_car,car.loaixe_id,car.price,car.image,car.status ,book_car.* ,loai_car.loai_xe,loai_car.doi_xe,loai_car.thietbi,loai_car.description_thietbi FROM `book_car`,`car`,`loai_car` WHERE book_car.id = $iddon AND car.id=book_car.car_id AND car.loaixe_id = loai_car.id");
                return $ketqua1;
            
            }

            public function listtimedonxe_idxe($idxe,$idhoadon){
                $ketqua1 = parent::Excute("SELECT * FROM `book_car` WHERE car_id = $idxe AND status != 3 ");
                return $ketqua1;
            
            }
            public function checktime_xe($idxe,$idhoadon){
                $ketqua1 = parent::Excute("SELECT * FROM `book_car` WHERE car_id = $idxe AND status != 3 AND id != $idhoadon ");
                return $ketqua1;
            
            }

            public function updatedon($tgbd,$tgkt,$datcoc,$phatsinh,$tong,$idhoadon){
                $ketqua1 = parent::Excute("UPDATE `book_car` SET `pickup_datetime`='$tgbd',`dropoff_datetime`='$tgkt' ,`price_deposit`='$datcoc',`price_incurred`='$phatsinh',`total_price`='$tong' WHERE id = $idhoadon");
                return $ketqua1;
            
            }

  


        //end dondathang

        //Thống kê trang chủ
        public function Thongkedoanhthuall(){
            $ketqua1 = parent::Excute("SELECT SUM(total_price) AS 'tongdoanhthuthangnay' FROM `book_car` WHERE month(pickup_datetime) = month(CURRENT_DATE) AND month(dropoff_datetime) = month(CURRENT_DATE) AND status = 3");
            return $ketqua1;
        
        }
        public function Thongkekhachhang(){
            $ketqua1 = parent::Excute("SELECT COUNT(id) AS 'tongkhachhang' FROM `khachhang`");
            return $ketqua1;
        
        }

        public function Thongkenhanvien(){
            $ketqua1 = parent::Excute("SELECT COUNT(id) AS 'tongnhanvien' FROM `staff` Where Role_id = 2");
            return $ketqua1;
        
        }
        public function Thongkedoanhthuhomnay($homnay){
            $ketqua1 = parent::Excute("SELECT SUM(total_price) AS 'doanhthuhomnay' FROM `book_car` WHERE pickup_datetime = '$homnay' AND status= 3");
            return $ketqua1;
        
        }

        public function Tongxe(){
            $ketqua1 = parent::Excute("SELECT COUNT(id) AS 'tongxe' FROM `car`");
            return $ketqua1;
        
        }
        public function Tongxedangchay(){
            $ketqua1 = parent::Excute("SELECT COUNT(id) AS 'tongxedangchay' FROM `car` WHERE status = 2");
            return $ketqua1;
        
        }
        public function Tongxedbaohanh(){
            $ketqua1 = parent::Excute("SELECT COUNT(id) AS 'tongxebaohanh' FROM `car` WHERE status = 3");
            return $ketqua1;
        
        }
        public function Tongxegiaohomnay(){
            $ketqua1 = parent::Excute("SELECT COUNT(book_car.id) AS 'giaohomnay' FROM `book_car`,`staff`,`khachhang`,`car` WHERE book_car.car_id = car.id AND book_car.khachhang_id = khachhang.id AND book_car.staff_id= staff.ID AND pickup_datetime = date(CURRENT_DATE) AND book_car.status != 3 ORDER BY book_car.id desc");
            return $ketqua1;
        
        }


        //thongke


        //Đổi pass
        public function checkpass($user){
            $ketqua = parent::Excute("SELECT * FROM `staff` WHERE username='$user'");
            return $ketqua;
        }
        public function updatepass($pass,$user){
            $ketqua = parent::Excute("UPDATE `staff` SET `password`='$pass' WHERE username = '$user'");
            return $ketqua;
        }
        
       
    }

?>