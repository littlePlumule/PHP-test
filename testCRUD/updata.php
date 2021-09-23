<?php
require_once("connect.php");
if(empty($_GET["id"])||empty($_GET["username"])){
    die("請輸入 id 與 username"."<br>"."<h2><a href='c.php'>go back</a></h2>" . "<br>");
    
}

$id = $_GET["id"];
$username = $_GET["username"];
$sql = sprintf(
     "UPdATE test set username = '%s' WHERE id = %d",
     $username,
     $id
);

echo $sql."<br>";
$result = $conn->query($sql);
if(!$result){
    die($conn->error);
}
/*
if($conn -> affected_rows >= 1){
    echo "編輯成功!";
}else{
    echo "查無資料";
}
echo "<h2><a href='c.php'>go back</a></h2>" . "<br>";
*/
header("Location: c.php");
?>
<!-- <a href="c.php">go back</a> -->

