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
$user = getUserFromUsername($username);
$sql = "UPDATE messageboard SET is_deleted=1 WHERE id=? and username=?";
if(isAdmin($user)){
    $sql = "UPDATE messageboard SET is_deleted=1 WHERE id=? ";
}
$stmt = $conn->prepare($sql);
if(isAdmin($user)){
    $stmt->bind_param('i',$id);
}else{
    $stmt->bind_param('is',$id,$username);
}


$result = $stmt->execute();
if(!$result){
    die($conn->error);
}
header("Location: ./index.php");



?>