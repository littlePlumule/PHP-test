<?php require_once("./connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
    <h1 class="title">職缺報報</h1>
        <div class="jobs">
            <?php
            $sql = "SELECT * FROM jobs ORDER BY create_at DESC";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo"<div class='job'>";
                    echo    "<h2 class='job__title'> " . $row['title'] . " </h2>";
                    echo    "<p class='job__desc'>描述： " . $row['description'] . " </p>";
                    echo    "<p class='job__salary'>薪資範圍： " . $row['salary'] . " </p>";
                    echo    "<a class='job__link' href='" . $row['link'] . "'>更多資訊</a>";
                    echo"</div>";
                    
                }
            }
            ?>
            
        </div>
    </div>
</body>
</html>