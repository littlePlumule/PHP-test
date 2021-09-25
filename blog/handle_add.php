<?php
require_once("./connect.php");
$title = $_POST["title"];
$content = $_POST["content"];
$category_id = $_POST["category_id"];

if(empty($title)||empty($content)||empty($category_id)){
    die('empty data');
}

$sql="INSERT INTO articles(title,content,category_id) VALUE('$title', '$content', $category_id)";
$result = $conn->query($sql);
if($result){
    header("Location: ./admin.php");
}else{
    die("failed:". $conn->error);
}

?>