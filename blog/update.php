<?php
require_once("./connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id=". $id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_category = "SELECT * FROM category ORDER BY create_at DESC";
$result_category = $conn->query($sql_category);
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
    <form method ="POST" action="./handle_update.php"> 
        <div>標題：<input name="title"value="<?php echo $row['title']?>"/></div>
        <div>內容：<textarea name="content" rows = 10><?php echo $row['content']?></textarea></div>
        <div>
        分類：
        <select name="category_id">
        <?php
            while($row_category = $result_category->fetch_assoc()){
                $id = $row_category["id"];
                $name = $row_category["name"];
                $is_selected = $row['category_id'] === $id ? "selected" : "";
                echo "<option value='$id' $is_selected>$name</option>";
            }
        
        ?>
        </select>
    </div>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="submit"/>
    </form>
</body>
</html>