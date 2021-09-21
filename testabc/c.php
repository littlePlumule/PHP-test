<?php
require_once("connect.php");

$result = $conn->query("select * from test;");
if(!$result){
    die($conn->error);
}
//print_r($result);
while($row = $result->fetch_assoc()){
    echo "id: ".$row["id"]."<br>"."username: ". $row["username"]."<br>";
}
?>

<form method="GET" action="b.php">
name: <input name = "name"/>
age: <input name = "age"/>
<input type = "submit"/>

</form>