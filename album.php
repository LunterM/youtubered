<?php include_once "inc/functions.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "inc/head.php"?>



		<?php
							if(isset($_GET["id"])){
								$albumID = $_GET["id"];
							}
							
							$sql = "SELECT al.name AS albumName, 
										   al.year, 
										   al.cover_img, 
										   ar.name AS artistName
									FROM albums AS al
									INNER JOIN artists AS ar
									ON al.artist_id = ar.id
									WHERE al.id = ".$albumID."";
															
									
							$result = $conn->query($sql);		
						
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									$albumName = $row["albumName"];
									$artistName = $row["artistName"];
									$year = $row["year"];
									$img = $row["cover_img"];
								
								}
								
							}
		?>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
       <?php include_once "inc/sidebar.php"?>
		<!-- Search bar -->
	   <?php include_once "inc/searchbar.php"?>
	
	  

        <!-- Page Content -->
		
		<div id="page-content-wrapper">
            <div class="container-fluid album">		
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 albuminfo">
							<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>
								<img class="img-responsive" src='img/albumcovers/<?php echo $img;?>.jpg' alt='<?php echo $albumName;?>'>
							</div>
							
							<div class="desc">
								<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 description'>
									<h4><?php echo $albumName; ?></h4>
									<h5><?php echo $artistName; ?></h5>
									<h6><?php echo $year; ?></h6>
								</div>
								
								<div class=" col-lg-12 col-lg-12 col-sm-12 col-xs-12 row description-actions">
									<a href="#" class="btn btn-danger btn-circle-l red" title="Play the whole album"><span class="glyphicon glyphicon-play"></span>Play All</a>
									<a href="#" class="btn btn-default btn-circle-l" title="Save the album for offline listening"><span class="glyphicon glyphicon-save"></span>Save Offline</a>
								</div>	
							</div>	
					</div>	
				</div>		
				
				<div class='row'>
					<div class='col-lg-12 table-responsive'>	
						<table class='table table-hover albumtable'>
							<thead>
								<tr>
									<th>#</th>
									<th>Song</th>
									<th>Duration</th>
									<th>Plays</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$sql2 = "SELECT songs.name,
											songs.length,
											songs.plays,
											songs.id
									FROM songs 
									WHERE album_id = '".$albumID."' ";
							
						
							$result2 = $conn->query($sql2);
							$out = "";
							$i = 1;
							if(mysqli_num_rows($result2) > 0){
								while($row = mysqli_fetch_array($result2)){
									$out .=  "<tr>
												<td class='col-lg-1 vert-align'>".$i.".</td>
												<td class='col-lg-7 vert-align'>".$row["name"]."</td>
												<td class='col-lg-1 vert-align'>".$row["length"]."</td>
												<td class='col-lg-1 vert-align'>".$row["plays"]."x</td>
												<td class='col-lg-2 vert-align'>
															<div class='actions'> 
																<a href='music/". mt_rand(1,10) .".mp3' class='btn btn-default btn-circle-s' title='Play this song'><span class='glyphicon glyphicon-play'></span></a>
																<a href='inc/addtoplaylist.php?id=".$row["id"]."' class='btn btn-default btn-circle-s' title='Add this song to my playlist'><span class='glyphicon glyphicon-plus'></span></a>
																<a href='#' class='btn btn-default btn-circle-s'><span class='glyphicon glyphicon-save' title='Save this song for offline listening'></span></a>	
															</div>
														</td>
											</tr>";
									$i++;		
								}
							
							}
							
							echo $out;
							
							?>
							
							</tbody>
						</table>	
					</div>
				</div>		
						
			</div>	

									
				
		</div>
		  
				
	
	
		
	</div>	
	
	
				

<?php include_once "inc/js.php"?>
   


</body>

</html>
