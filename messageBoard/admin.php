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

if($user === NULL || $user["role"] !== "ADMIN"){
    header("Location: index.php");
    exit;
}

$sql = "SELECT id, role, nickname, username FROM user ORDER BY id ASC";
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
        <title>後來管理</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <header class="warn">
            <strong>
                注意!本站為練習用網站，因教學用途刻意忽略資安實作，註冊時請勿使用任何真實的帳號密碼。
            </strong>
        </header>

        <main class="board">
            
            <section>
                <table border>
                    <tr>
                        <th>id</th>
                        <th>role</th>
                        <th>nickname</th>
                        <th>username</th>
                        <th>調整身份</th>
                    </tr>
                    <?php
                    while($row=$result->fetch_assoc()){

                    ?>
                    <tr>
                        <td><?php echo escape($row["id"]); ?></td>
                        <td><?php echo escape($row["role"]); ?></td>
                        <td><?php echo escape($row["nickname"]); ?></td>
                        <td><?php echo escape($row["username"]); ?></td>
                        <td>
                        <a href="handle_update_role.php?role=ADMIN&id=<?php
                         echo escape($row["id"])?>">管理員</a>
                         <a href="handle_update_role.php?role=NORMAL&id=<?php
                         echo escape($row["id"])?>">使用者</a>
                         <a href="handle_update_role.php?role=BAN&id=<?php
                         echo escape($row["id"])?>">停權</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                
                </table>
                <a href="./index.php" class="board__btn back">回到主頁</a>
            </section>
           
        </main>
        <script>
            
        </script>
    </body>
</html>