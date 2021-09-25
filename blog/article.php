<?php
require_once('./connect.php');
$id = $_GET['id'];
$sql = "SELECT A.id, A.title, A.content, C.name FROM articles as A LEFT JOIN category as C ON A.category_id = C.id WHERE A.id = ".$id;

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$title = $row['title'];
$content = $row['content']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog 部落格</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav">
        <h1>Blog</h1>
        <a class="active" href="./index.php">首頁</a>
        <a href="./about.php">關於我</a>
    </nav>
    <div class="wrap">
        <div class="single_articles">
            <h1><?php echo $title; ?></h1>
            <h2>分類：<?php echo $row['name'];?>
            </h2>
            <p><?php echo $content;?></p>
        </div>
    </div>
</body>
</html>