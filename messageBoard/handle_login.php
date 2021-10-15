<?php
require_once("./connect.php");
require_once("./utils.php");

if(
    empty($_POST['username'])||
    empty($_POST['password'])
){
    header("Location: login.php?errCode=1");
    die();
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = sprintf(
    "SELECT * from user WHERE username = '%s' and password = '%s'", 
    $username,
    $password
);
$result = $conn->query($sql);
if(!$result){
    die($conn->error);
}

if($result->num_rows){

    $token = generateToken();
    $sql = sprintf(
        "INSERT INTO token (token,username)
        values('%s','%s')",
        $token,
        $username
    );
    $result = $conn->query($sql);
    if(!$result){
        die($conn->error);
    }

    $expire = time() + 3600 * 24 * 30;//30 day
    setcookie("token", $token, $expire);
    header("Location: ./index.php");
}else{

    header("Location: login.php?errCode=2");
}

?>