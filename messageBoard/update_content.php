<?php
session_start();
require_once("./connect.php");
require_once("./utils.php");

$id = $_GET['id'];
$username = NULL;
$user = NULL;
if(!empty($_SESSION['username'])){
    $username = $_SESSION['username'];
    $user = getUserFromUsername($username);
}

$sql = "SELECT * FROM messageboard WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$result = $stmt->execute();
if(!$result){
    die('Error:'.$conn->error);
}

$result = $stmt->get_result();
$row = $result->fetch_assoc();
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
        <h1 class="title">
            編輯留言
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
          
        <form class="form" method="POST" action="handle_update_content.php">
            <textarea class="form__textarea" name="content" rows="3"><?php echo $row['content']?></textarea>
            <input type="hidden" name="id" value ="<?php echo $row['id']?>"/>
            <input class="board__submit" type="submit"/>
        </form>
        
    </main>
   
</body>
</html>