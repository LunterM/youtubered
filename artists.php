<?php include_once "inc/functions.php"?>

<?php
								
								if(isset($_GET["genre_id"])){
									$genreID = $_GET["genre_id"];
									
									$genreName = mysqli_fetch_array($conn->query("SELECT genres.name FROM genres WHERE id= ".$genreID.""));
									
									$sql = "SELECT albums.*, 
												   artists.name AS artistName													
											FROM albums
											INNER JOIN artists
											ON albums.artist_id = artists.id											
											WHERE albums.genre_id = ".$genreID."";
									
								}else{
								
									$sql = "SELECT albums.*, artists.name AS artistName
											FROM albums
											INNER JOIN artists
											ON albums.artist_id = artists.id";
											
								}		
								
											
								$result = $conn->query($sql);
								
								$out = "";
								$genre = "";
								
								if($result){
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
											
											
											$out .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6 card'>
														<div class='img-box'>
															<img src='img/albumcovers/".$row["cover_img"].".jpg' alt='".$row["artistName"]."'>
															
															<div class='img-overlay'>
																<a href='album.php?id=".$row["id"]."'><img src='img/icons/play-icon.png'></a>											
															</div>
														</div>

														<h4>".$row["name"]."</h4>
														<h5>".$row["artistName"]."</h5>	
																				
											</div>";
												
											
										}
									}
									
								}
?>									

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
					<h2> <?php
							if(isset($genreName)){
								echo $genreName['name']; 
							}else{
								echo "All ";
							}
							
						 ?> Albums
					</h2>
                    <div class="col-lg-12 rs">
					
						
							
								<?php	
									echo $out;	?>
						</div>	
					</div>
				</div>	
			</div>
		</div>	
  
  

    <!-- Scripts -->
    <?php include_once "inc/js.php"?>


</body>

</html>
