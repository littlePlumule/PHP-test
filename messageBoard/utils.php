<?php
    require_once("./connect.php");

    function generateToken(){
        $s = "";
        for($i=1; $i<=16; $i++){
            $s .= chr(rand(65,90));
        }
        return $s;
    
    }

    function getUserFromToken($token){
        global $conn;
        $sql = sprintf(
            "SELECT username FROM token WHERE token = '%s'",
            $token
        );
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $username = $row['username'];        

        $sql = sprintf(
            "SELECT * FROM user WHERE username = '%s'",
            $username
        );
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        return $row; 
    }
?>