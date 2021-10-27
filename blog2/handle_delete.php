<?php
session_start();
require_once("./connect.php");
require_once("./utils.php");
require_once("./check_permission.php");

if(
    empty($_GET['id'])
){
    header("Location: admin.php?errCode=1");
    die();
}


$id = $_GET['id'];
$sql = "UPDATE posts SET is_deleted=1 WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i',$id);



$result = $stmt->execute();
if(!$result){
    die($conn->error);
}
header("Location: ./admin.php");



?>