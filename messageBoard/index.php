<?php
require_once("./connect.php");
$sql = "SELECT * FROM messageBoard ORDER BY created_at DESC";
$result = $conn->query($sql);
if(!$result){
    die('Error:'.$conn->error);

}
$username = NULL;
if(!empty($_COOKIE['username'])){
    $username = $_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言板</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="warn">
        <strong>
            注意!本站為練習用網站，因教學用途刻意忽略資安實作，註冊時請勿使用任何真實的帳號密碼。
        </strong>
    </header>

    <main class="board">
        <div>
            <?php if(!$username){ ?>
        <a class="board__btn" href="register.php">註冊</a>
        <a class="board__btn" href="login.php">登入</a>
            <?php } else{ ?>
                <a class="board__btn" href="logout.php">登出</a>
                <h3>Hello <?php echo $username; ?></h3>
            <?php } ?>    
        </div>
        
        <h1 class="title">
            Comments
        </h1>
        <?php
        if(!empty($_GET['errCode'])){
            $code = $_GET['errCode'];
            $msg = "Error";
            if($code === "1"){
                $msg = "資料不齊全";
            }
            echo "<h2 class = 'error'>錯誤：$msg</h2>";
        }
        ?>
        
            
        <form class="form" method="POST" action="handle_add.php">
            <textarea class="form__textarea" name="content" rows="3" placeholder="請輸入你的留言..."></textarea>
            <?php if($username){ ?>
            <input class="board__submit" type="submit"/>
            <?php } else{ ?>
            <h3>請登入發布留言</h3>
            <?php } ?>  
        </form>
          
        <hr/>
        <section>
            <?php
            while($row=$result->fetch_assoc()){
            
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
                    <div class="card__content"><?php echo $row['content'];?></div>
                </div>
            </div>
            <?php
            }
            ?>
        </section>
    </main>
    
</body>
</html>