<?php

require_once("./connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM articles WHERE id =". $id;
if($conn->query($sql)){
    header("Location: ./admin.php");
}else{
    die("failed:".$conn->error);
}

?>