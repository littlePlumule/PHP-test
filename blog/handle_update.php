<?php
require_once("./connect.php");
$title = $_POST["title"];
$content = $_POST["content"];
$category_id = $_POST["category_id"];
$id = $_POST["id"];

if(empty($title)||empty($content)||empty($category_id)||empty($id)){
    die('empty data');
}

$sql="UPDATE articles SET title ='$title',content ='$content',category_id = '$category_id' WHERE id =".$id;
echo $sql;
$result = $conn->query($sql);
if($result){
    header("Location: ./admin.php");
}else{
    die("failed:". $conn->error);
}

?>