<?php
require_once("connect.php");

$result = $conn->query("SELECT * FROM test ORDER BY id ASC;");
if(!$result){
    die($conn->error);
}
// print_r($result);
while($row = $result->fetch_assoc()){
    echo "id: ".$row["id"] ."&nbsp;&nbsp;";
    echo "<a href= 'delete.php?id=".$row["id"]."'>delete</a>";
    echo "<br>";
    echo "username: ". $row["username"]."<br>";
}
?>
<h2>新增 user</h2>
<form method="GET" action="add.php">
username: <input name = "username"/>
<input type = "submit"/>
</form>
<h2>編輯 user</h2>
<form method="GET" action="updata.php">
id: <input name = "id"/>
username: <input name = "username"/>
<input type = "submit"/>
</form>