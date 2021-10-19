<?php
session_start();
require_once("./connect.php");
require_once("./utils.php");

$username = NULL;
$user = NULL;
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $user = getUserFromUsername($username);
}


$sql = "SELECT M.id as id, M.content as content, M.created_at as created_at, U.nickname as nickname, U.username as username FROM messageBoard AS M LEFT JOIN user AS U ON M.username = U.username WHERE M.is_deleted IS NULL ORDER BY M.id DESC";
$stmt = $conn->prepare($sql);
$result = $stmt->execute();
if(!$result){
    die('Error:'.$conn->error);
}

$result = $stmt->get_result();
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
                    <span class = "board__btn update-nickname">編輯暱稱</span> 
                    <form class="hide update_nickname form" method=POST action="handle_update_user.php">
                    <div class="board__nickname">
                        <span>新的暱稱：</span>
                        <input type="text" name="nickname"/>
                    </div>
                        <input class ="board__submit" type="submit"/>
                    </form>
                    <h3>Hello <?php echo escape($user['nickname']); ?></h3>
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
                                <?php echo escape($row['nickname']);?>
                                (@<?php echo escape($row['username']);?>)
                            </span>
                            <span class="card__time">
                                <?php echo escape($row['created_at']);?>
                            </span>
                            <?php if($row['username'] === $username){?>
                            <a href="update_content.php?id=<?php echo $row['id'];?>">編輯</a>
                            <a href="delete_content.php?id=<?php echo $row['id'];?>">刪除</a>
                            <?php }?>
                        </div>
                        <div class="card__content"><?php echo escape($row['content']);?></div>
                    </div>
                </div>
                <?php
                }
                ?>
            </section>
        </main>
        <script>
            var btn = document.querySelector('.update-nickname')
            btn.addEventListener('click', function(){
                var form = document.querySelector('.update_nickname')
                form.classList.toggle('hide')
            })
        </script>
    </body>
</html>