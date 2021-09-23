<?php
require_once('./connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM jobs WHERE id =".$id;
if($conn->query($sql)){
    header('Location: ./admin.php');
}else{
    echo"failed：".$conn->error;
}
echo $id;
?>
