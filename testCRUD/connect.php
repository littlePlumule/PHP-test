<?php
    $server_name = "localhost";
    $user_name = "yuhung";
    $password = "yuhung";
    $db_name = "yuhung";

    $conn = new mysqli($server_name,$user_name,$password,$db_name);
	if( $conn ->connect_error){
		die("資料庫連線錯誤: ".$conn->connect_error);
	}
    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');

?>