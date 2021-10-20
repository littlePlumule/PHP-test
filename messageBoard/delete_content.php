<?php
session_start();
require_once("./connect.php");
require_once("./utils.php");

if(
    empty($_GET['id'])
){
    header("Location: index.php?errCode=1");
    die();
}


$id = $_GET['id'];
$username = $_SESSION['username'];
$sql = "UPDATE messageboard SET is_deleted=1 WHERE id=? and username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is',$id,$username);

$result = $stmt->execute();
if(!$result){
    die($conn->error);
}
header("Location: ./index.php");



?>