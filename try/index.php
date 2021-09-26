<?php
require_once('./connect.php');
$sql="SELECT * FROM messageBoard ORDER BY created_at DESC";
$result = $conn->query($sql);
if(!$result){
    die("Error,".$conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>try messageBoard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="warn">
    <strong>
        注意!本站為練習用網站，因教學用途刻意忽略資安實作，註冊時請勿使用任何真實的帳號密碼。
    </strong>
    </header>

    <main class="board">
        <h1 class="title">
            Comments 
        </h1>
        <?php
        if(!empty($_GET['errCode'])){
            $code = $_GET['errCode'];
            $msg = "Error";
            if($code === '1'){
                $msg = "資料不齊全";
            }
            echo "<h2 class='error'>錯誤：$msg</h2>";
        }
        
        
        ?>
        <form method="POST" action="handle_add.php">
            <div class="form__nickname"> 暱稱：<input type="text"name="nickname"/></div>
            <div ><textarea class="form__content" name="content" rows="3"spaceholder="請輸入你的留言..."></textarea></div>
            <input class="form__submit" type="submit"/>
        </form>
        <hr>
        <section>
            <?php
            while($row = $result->fetch_assoc()){
            ?>


            <div class="card">
                <div class="card__avatar"></div>
                <div class="card__body">
                    <div class="card__info">
                        <span class="card__author">
                            <?php echo $row['nickname'];?>
                        </span>
                        <span class="card__time">
                            <?php echo $row['created_at'];?>
                        </span>
                    </div>
                    <div class="card__content">
                        <?php echo $row['content'];?>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>
        </section>
    </main>
</body>
</html>