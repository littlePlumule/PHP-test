<?php

require_once("./connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id =". $id;
if($conn->query($sql)){
    header("Location: ./admin_category.php");
}else{
    die("failed:".$conn->error);
}

?>