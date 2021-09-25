<?php
require_once("./connect.php");
$name = $_POST["name"];
if(empty($name)){
    die('empty data');
}

$sql="INSERT INTO category(name) VALUE('$name')";
$result = $conn->query($sql);
if($result){
    header("Location: ./admin_category.php");
}else{
    die("failed:". $conn->error);
}

?>