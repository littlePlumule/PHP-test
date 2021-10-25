<?php
require_once('./connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$choose = $_POST['choose'];
$how = $_POST['how'];
$other = $_POST['other'];

$sql=sprintf(
    "INSERT INTO lazyform(name,email,phone,choose,how,other) VALUES('%s','%s','%s',%d,'%s','%s')",
    $name,
    $email,
    $phone,
    $choose,
    $how,
    $other
);
$result=$conn->query($sql);
if(!$result){
    die($conn->error);
}
header("Location: index.php?code=1");
?>
