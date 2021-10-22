<?php
require_once("./connect.php");

header('Content-type:application/json;charset=utf-8');

if(
    empty($_POST['content'])
){
    $json = array(
        "OK" => false,
        "message" => "Please input content"
    );

    $response = json_encode($json);
    echo $response;
    die();
}

$username = $_POST['username'];

$content = $_POST['content'];
$sql = "INSERT INTO messageBoard(username,content)VALUE(?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss',$username,$content);

$result = $stmt->execute();
if(!$result){
    $json = array(
        "OK" => false,
        "message" => $conn->error
    );

    $response = json_encode($json);
    echo $response;
    die();
}

$json = array(
    "OK" => true,
    "message" => "Success"
);

$response = json_encode($json);
echo $response;



?>