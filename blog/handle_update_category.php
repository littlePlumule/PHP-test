<?php
require_once("./connect.php");
$name = $_POST["name"];
$id = $_POST["id"];
if(empty($name)||empty($id)){
    die('empty data');
}

$sql="UPDATE category SET name ='$name' WHERE id =".$id;
$result = $conn->query($sql);
if($result){
    header("Location: ./admin_category.php");
}else{
    die("failed:". $conn->error);
}

?>