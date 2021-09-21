<?php

for($i=1; $i<10; $i++){
	for($j=1; $j<10; $j++){
		if($i*$j > 9){
		echo $i ."*".$j."=".$i*$j."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
		}else{
		echo $i ."*".$j."=".$i*$j."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
		}
	}
	echo"<br>";
}

?>