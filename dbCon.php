<?php
    $conn=new mysqli('localhost','root','','qlbansua');
    if(!$conn){
        die('Kết nối không thành công'.$conn->connect_error());
    }
    $conn->set_charset('utf8');
?>