<?php
require_once("./connect.php");

$page = 1;
if(!empty($_GET['page'])){
    $page = intval($_GET['page']);
}
$limit = 5;
$offset = ($page-1) * $limit;

$sql = "SELECT M.id as id, M.content as content, M.created_at as created_at, U.nickname as nickname, U.username as username FROM messageBoard AS M LEFT JOIN user AS U ON M.username = U.username WHERE M.is_deleted IS NULL ORDER BY M.id DESC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $limit, $offset);
$result = $stmt->execute();
if(!$result){
    die('Error:'.$conn->error);
}

$result = $stmt->get_result();



    $comments = array();

    while($row=$result->fetch_assoc()){
        array_push($comments, array(
            "id"=>$row['id'],
            "username"=>$row['username'],
            "nickname"=>$row['nickname'],
            "content"=>$row['content'],
            "created_at"=>$row['created_at']
        ));
    }
    
    $json = array(
        "comments" => $comments
    );

    $response = json_encode($json);
    header('Content-type:application/json;charset=utf-8');
    print_r($response);
?>