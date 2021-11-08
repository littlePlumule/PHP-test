<?php 
require_once('./connect.php');

header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin:*');
if(
    empty($_POST["todo"])
){
    $json = array(
        "ok"=>false,
        "message"=>"Pleases input missing fields"
    );

    $response = json_encode($json);
    echo $response;
    die();
}

$todo = $_POST["todo"];


$sql = "INSERT INTO todos(todo) VALUE(?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $todo);
$result = $stmt->execute();

if(!$result){
    $json = array(
        "ok" => false,
        "message" => $conn->error
    );
    $response = json_encode($json);
    echo $response;
    die();

}
$json = array(
    "ok"=>true,
    "message"=>"success",
    "id"=>$conn->insert_id
);
$response= json_encode($json);
echo $response;

?>