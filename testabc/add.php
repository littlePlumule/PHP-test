<?php
require_once("connect.php");
if(empty($_GET["username"])){
    die("請輸入id"."<br>"."<h2><a href='c.php'>go back</a></h2>" . "<br>");
    
}

$username = $_GET["username"];
$sql = sprintf( "INSERT INTO test(username)VALUES('%s')",$username);
echo "SQL: " . $sql ."<br>";

$result = $conn->query($sql);
if(!$result){
    die($conn->error);
}
echo "新增成功!";
header("Location: c.php");
?>
<!-- <a href="c.php">go back</a> -->

