<?php include_once "inc/functions.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "inc/head.php"?>

<?php
	$sql = "SELECT albums.*, artists.name AS artistName
											FROM albums
											INNER JOIN artists
											ON albums.artist_id = artists.id
											ORDER BY RAND()
											LIMIT 4 ";
			
			$result = $conn->query($sql);
			$out = "";
			$out2 = "";
			
			if($result){
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
											
											
											$out .= "<div class='col-lg-3 col-md-4 col-sm-4 col-xs-6 card'>
														<div class='img-box'>
															<img src='img/albumcovers/".$row["cover_img"].".jpg' alt='".$row["artistName"]."'>
															
															<div class='img-overlay'>
																<a href='album.php?id=".$row["id"]."'><img src='img/icons/play-icon.png' alt='playbtn'></a>											
															</div>
														</div>

														<h4>".$row["name"]."</h4>
														<h5>".$row["artistName"]."</h5>	
																				
											</div>";
												
											
										}
									}
									
								}
								
		$sql2 = "SELECT songs.name AS songName,
						songs.length AS songLength,
						songs.plays AS songPlay,
						albums.name AS albumName,
						albums.id AS albumID,
						artists.name AS artistName,	
						songs.id AS songID	
				FROM songs 
				INNER JOIN albums 
				ON albums.id = songs.album_id
				INNER JOIN artists 
				ON artists.id = albums.artist_id
				ORDER BY RAND()
				LIMIT 10";
		
		$result2 = $conn->query($sql2);
		$i = 1;
		if(mysqli_num_rows($result2) > 0){	
			while($row = mysqli_fetch_array($result2)){
				$out2 .= "<tr>	
								<td class='col-lg-1 vert-align'>".$i.".</td>	
								<td class='col-lg-3 vert-align'>".$row['songName']."</td>	
								<td class='col-lg-2 vert-align'>".$row['artistName']."</td>	
								<td class='col-lg-2 vert-align'><a href='album.php?id=".$row['albumID']."'>".$row['albumName']."</a></td>	
								<td class='col-lg-1 vert-align'>".$row['songLength']."</td>	
								<td class='col-lg-1 vert-align'>".$row['songPlay']."x</td>	
								<td class='col-lg-2 vert-align'>
										<div class='actions'> 
																<a href='music/". mt_rand(1,10) .".mp3' class='btn btn-default btn-circle-s' title='Play this song'><span class='glyphicon glyphicon-play'></span></a>
																<a href='inc/addtoplaylist.php?id=".$row["songID"]."' class='btn btn-default btn-circle-s' title='Add this song to my playlist'><span class='glyphicon glyphicon-plus'></span></a>
																<a href='#' class='btn btn-default btn-circle-s'><span class='glyphicon glyphicon-save' title='Save this song for offline listening'></span></a>	
															</div>
								</td>
						   </tr>";
				$i++;
			}	
								
		}						

?>

<body>

    <div class="row" id="wrapper">

        <!-- Sidebar -->
       <?php include_once "inc/sidebar.php"?>
		<!-- Search bar -->
	   <?php include_once "inc/searchbar.php"?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">		
                <div class="row">
					<h2>Recommended albums</h2>
                    <div class="col-lg-12 rs">
					
						
							<?php	
									echo $out;	?>								             							 
                        
                    </div>
					
                </div>
				
				 <div class="row">
					<h2>Scandinavian Top 10 </h2>
                    <div class="col-lg-12 rs">
					
							<table class="table table-hover searchtable">
							<thead>
								<tr>
									<th>#</th>
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
								
								
									echo $out2;
								?>
							
							</tbody>
						</table>							             							 
                        
                    </div>
					
                </div>
            </div>
        </div>
       

    </div>
  

    <!-- Scripts -->
    <?php include_once "inc/js.php"?>


</body>

</html>
