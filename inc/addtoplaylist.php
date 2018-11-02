<?php
	
	include_once "functions.php";
	if(isset($_GET["id"])){
		
	
									$id = $_GET["id"];
									 
									$sql = "INSERT INTO playlist (id)
											VALUES ('".$id."')";
											
									$result = $conn->query($sql);	
									header("location:javascript://history.go(-1)");
	}									
	

?>