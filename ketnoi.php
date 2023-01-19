<?php
class Ketnoi{
    var $db = null;
    public function __construct($host,$user,$pass,$database){
        $this->db=mysqli_connect($host,$user,$pass,$database);
    }
    public function Excute($sql){
        $result = mysqli_query($this->db,$sql);
        return $result;
    }
}


?>