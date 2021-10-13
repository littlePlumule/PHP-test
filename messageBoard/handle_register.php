<?php
require_once("./connect.php");

if(
    empty($_POST['nickname'])||
    empty($_POST['username'])||
    empty($_POST['password'])
){
    header("Location: register.php?errCode=1");
    die();
}
$nickname = $_POST['nickname'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = sprintf(
    "INSERT INTO user(nickname, username, password)VALUE('%s','%s','%s')",
    $nickname, 
    $username,
    $password
);
$result = $conn->query($sql);
if(!$result){
    $code = $conn->errno;
    if($code === 1062){
    header("Location: register.php?errCode=2");
    }
    die($conn->error);
}
header("Location: ./index.php");



?>