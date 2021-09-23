<?php

	


	if(empty($_GET["name"]) || empty($_GET["age"])){
	echo"資料有缺請重新填寫";
	exit();
	}

	echo "Hello ".$_GET["name"]."<br>";
	echo "Your age is ".$_GET["age"]."<br>";
	//print_r($_GET);


?>
