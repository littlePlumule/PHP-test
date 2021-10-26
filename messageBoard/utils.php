<?php
    require_once("./connect.php");

    function generateToken(){
        $s = "";
        for($i=1; $i<=16; $i++){
            $s .= chr(rand(65,90));
        }
        return $s;
    
    }

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

    // $action： update, delete, create
    function hasPermission($user, $action, $comment){
        if(!empty($user["role"])){
            if($user["role"]==="ADMIN"){
                return true;
            }
            if($user["role"]==="NORMAL"){
                if($action === "create") return true;
                return $comment["username"]===$user["username"];
            }
            if($user["role"]==="BAN"){
                return $action !=="create";
            }
        }
        
    }

    function isAdmin($user){
        return $user["role"]==="ADMIN";
    }
?>