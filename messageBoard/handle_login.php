<?php
session_start();
require_once("./connect.php");
require_once("./utils.php");

if(
    empty($_POST['username'])||
    empty($_POST['password'])
){
    header("Location: login.php?errCode=1");
    die();
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = sprintf(
    "SELECT * from user WHERE username = '%s'", 
    $username
);
$result = $conn->query($sql);
if(!$result){
    die($conn->error);
}
//查無使用者
if($result->num_rows === 0){
    header("Location: login.php?errCode=2");
    exit();
}
//有查到使用者
$row = $result->fetch_assoc();
if(password_verify($password, $row['password'])){
//登入成功
    $_SESSION['username'] = $username;
    header("Location: ./index.php");
}else{
    header("Location: login.php?errCode=2");
}

?>