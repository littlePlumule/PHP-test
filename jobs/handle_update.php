<?php
require_once('./connect.php');
$title = $_POST['title'];
$desc = $_POST['description'];
$salary = $_POST['salary'];
$link = $_POST['link'];
$id = $_POST['id'];

if(empty($title) || empty($desc) || empty($salary) || empty($link)){
    die("<h1>請檢查資料</h1>");
}


$sql = "UPDATE jobs SET title = '$title',description ='$desc',salary = '$salary',link = '$link' WHERE id = ". $id ;

$result = $conn->query($sql);

if($result){
    header('Location: ./admin.php');
}else{
    echo "failed： " . $conn->error;
}

?>