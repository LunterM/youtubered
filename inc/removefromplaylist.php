<?php
	
	include_once "functions.php";
	if(isset($_GET["id"])){
		
	
									$id = $_GET["id"];
									 
									$sql = "DELETE FROM playlist 
											WHERE id=".$id."";
											
									$result = $conn->query($sql);	
									echo "jaaaj more";
									header("location:javascript://history.go(-1)");
	}									
	

?>