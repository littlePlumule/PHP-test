<?php
require_once("./connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM category WHERE id=". $id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
    <h1>編輯分類</h1>
    <form method ="POST" action="./handle_update_category.php">

    名稱：<input name="name" value="<?php echo $row['name'];?>"/>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <input type="submit"/>
    </form>
</body>
</html>