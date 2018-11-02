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
            <div class="container-fluid album">			
				
				<div class='row'>
					<h2>My playlist</h2>
					<div class='col-lg-12 table-responsive'>	
						<table class='table table-hover albumtable'>
							<thead>
								<tr>
									<th>Song</th>
									<th>Artist</th>
									<th>Album</th>
									<th>Duration</th>
									<th>Plays</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$sql = "SELECT playlist.id,
										   songs.name AS songName,
										   songs.length AS songLength,
										   songs.plays AS songPlays,
										   albums.name AS albumName,
										   albums.id AS albumID,
										   artists.name AS artistName
									FROM playlist
									LEFT JOIN songs ON playlist.id = songs.id
									LEFT JOIN albums ON songs.album_id = albums.id
									LEFT JOIN artists ON albums.artist_id = artists.id
									";
							
						
							$result = $conn->query($sql);
							$out = "";
							
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									$out .=  "<tr>
												
												<td class='col-lg-3 vert-align'>".$row["songName"]."</td>
												<td class='col-lg-2 vert-align'>".$row["artistName"]."</td>
												<td class='col-lg-2 vert-align'><a href='album.php?id=".$row['albumID']."'>".$row['albumName']."</a></td>	
												<td class='col-lg-1 vert-align'>".$row["songLength"]."</td>
												<td class='col-lg-1 vert-align'>".$row["songPlays"]."</td>
												
												
												<td class='col-lg-2 vert-align'>
															<div class='actions'> 
																<a href='".$row["id"].".mp3' class='btn btn-default btn-circle-s' title='Play this song'><span class='glyphicon glyphicon-play'></span></a>
																<a href='inc/removefromplaylist.php?id=".$row["id"]."' class='btn btn-default btn-circle-s' title='Remove this song from my playlist'><span class='glyphicon glyphicon-remove'></span></a>
																<a href='#' class='btn btn-default btn-circle-s' title='Save this song for offline listening'><span class='glyphicon glyphicon-save'></span></a>	
															</div>
														</td>
											</tr>";
											
								}
								$conn->close();
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
