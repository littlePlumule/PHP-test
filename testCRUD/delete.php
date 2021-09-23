<?php
require_once("connect.php");
if(empty($_GET["id"])){
    die("請輸入id"."<br>"."<h2><a href='Read.php'>go back</a></h2>" . "<br>");
    
}

$id = $_GET["id"];
$sql = sprintf(
     "DELETE from test WHERE id = %d",
     $id
);

echo $sql."<br>";
$result = $conn->query($sql);
if(!$result){
    die($conn->error);
}
if($conn -> affected_rows >= 1){
    echo "刪除成功!";
}else{
    echo "查無資料";
}

echo "<h2><a href='Read.php'>go back</a></h2>" . "<br>";

// header("Location: Read.php");
?>
<!-- <a href="Read.php">go back</a> -->

