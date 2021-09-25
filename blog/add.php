<?php
require_once("./connect.php");
$sql = "SELECT * FROM category ORDER BY create_at DESC";
$result = $conn->query($sql);

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
    <h1>新增文章</h1>
    <form method ="POST" action="./handle_add.php">

    <div>標題：<input name="title"/></div>
    <div>內容：<textarea name="content" rows = 10></textarea></div>
    <div>
        分類：
        <select name="category_id">
        <?php
            while($row = $result->fetch_assoc()){
                $id = $row["id"];
                $name = $row["name"];
                echo "<option value='$id'>$name</option>";
            }
        
        ?>
        </select>
    </div>
    <input type="submit"/>
    </form>
</body>
</html>