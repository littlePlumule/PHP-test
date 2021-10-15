<?php
    require_once("./connect.php");
    $token = $_COOKIE['token'];
    $sql = sprintf(
        "DELETE FROM token WHERE token = '%s'",
        $token
    );
    $conn->query($sql);
    setcookie("token","", time() - 3600);
    header("Location: ./index.php");
?>