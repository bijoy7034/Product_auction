<?php

include "connection.php";
if(isset($_POST['submit'])){
    $filter = $_POST['cat'];
    $low = $_POST['low'];
    $heigh = $_POST['high'];
    
    if(!isset($low)){
        header("location:shop.php?filter=$filter&low=0&high=0");
    }else{
        header("location:shop.php?filter=$filter&low=$low&high=$heigh");
    }
}

?>