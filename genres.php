<?php include_once "inc/functions.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "inc/head.php"?>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
       <?php include_once "inc/sidebar.php"?>
		<!-- Search bar -->
	   <?php include_once "inc/searchbar.php"?>

        <!-- Page Content -->
		
		<div id="page-content-wrapper">
            <div class="container-fluid">		
                <div class="row">
					<h2>Genres</h2>
                    <div class="col-lg-12 rs">
					
						
							<?php
								$sql = "SELECT*
										FROM genres";

								$result = $conn->query($sql);
								$out = "";
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
										
										$out = 	"<div class='col-lg-3 col-md-6 col-sm-6 col-xs-12 card'>
													<div class='img-box'>
														<img src='img/genres/".$row["img"].".jpg' alt='".$row["img"]."'>
														
														<div class='img-overlay-visible'>
															<a href='albums.php?genre_id=".$row["id"]."'><h2>".$row["name"]."</h2></a>											
														</div>
													</div>
					
										</div>";
										echo $out;		
									}
								}
							?>
						</div>	
					</div>
				</div>	
			</div>
		</div>	
  
  

   
    <?php include_once "inc/js.php"?>


</body>

</html>
