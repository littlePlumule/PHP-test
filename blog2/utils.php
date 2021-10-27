<?php
    require_once("./connect.php");


    function getUserFromUsername($username){
        global $conn;      

        $sql = sprintf(
            "SELECT * FROM user WHERE username = '%s'",
            $username
        );
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        return $row; //username, id, nickname, role;
    }
    
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES);
    }

   
?>