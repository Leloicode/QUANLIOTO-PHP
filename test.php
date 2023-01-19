<?php 
$dt_end = new DateTime('December 3, 2016 2:00 PM');
$remain = $dt_end->diff(new DateTime());
echo $remain->d . ' days and ' . $remain->h . ' hours';

$dateint = mktime(0, 0, 0, 07, (02 + 30), 2022);
echo date('Y-m-d', $dateint); 

?>


<br>
<?php 







?>
<br>
<?php 


$gia = 400;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="date" id="tg1" onchange="tongtien()">
<input type="date" id="tg2" onchange="tongtien()">
<input type="text" id="kq1" hidden>

<input type="text" id="phiphatsinh"placeholder="phí phát sinh"  onchange="tongtien()" >
<input type="text" id="tong"placeholder="kích ra ngoài để tính tổng" >

<script type="text/javascript">
// Created by: JavaScript Demos :: http://www.javascript-demos.com/

function tongngay(){

    let d1 = document.getElementById('tg1').value;
    let d2 = document.getElementById('tg2').value;
    



    // let ms1 = d1.getTime();
    // let ms2 = d2.getTime();
    // let k1 = Math.ceil((ms2 - ms1) / (24*60*60*1000));
    let birthday = new Date(d1);
    let dead = new Date(d2);
    let ms1 = birthday.getTime();
    let ms2 = dead.getTime();
    let k1 = Math.ceil((ms2 - ms1) / (24*60*60*1000));
    let k2 = k1 + 1;
     
    document.getElementById('kq1').value = k2;
    //document.getElementById('kq2').value = d2;
 
    

}
function tongtien(){
    tongngay();
    let kq1 = document.getElementById('kq1').value;
    let gia = <?php echo $gia; ?>;
    let phiphatsinh = document.getElementById('phiphatsinh').value;
    if (phiphatsinh == "") {
        document.getElementById('tong').value = "";
    }
    else{
        let tonggia = parseInt(kq1*gia)+parseInt(phiphatsinh);
    document.getElementById('tong').value = tonggia;
    }

}

onload=calcDays;
</script>
	<!--
    	This script downloaded from www.JavaScriptBank.com
    	Come to view and download over 2000+ free javascript at www.JavaScriptBank.com
	-->

</body>
</html>