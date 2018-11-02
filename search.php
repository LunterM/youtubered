<?php include_once "inc/functions.php"?>

<?php
	if(isset($_POST['search'])){
		$searchitem = $_POST['search'];
		$searchitem = preg_replace("#[^0-9a-z ]#i","",$searchitem);
		
		
		$out = '';
		$sql = "SELECT songs.name AS songName,
						songs.length AS songLength,
						songs.plays AS songPlay,
						songs.id AS songID,
						albums.name AS albumName,
						albums.id AS albumID,
						artists.name AS artistName		
				FROM songs 
				INNER JOIN albums 
				ON albums.id = songs.album_id
				INNER JOIN artists 
				ON artists.id = albums.artist_id
				WHERE songs.name
				LIKE '%$searchitem%'";
		$result = $conn->query($sql);

		if(mysqli_num_rows($result) > 0){	
			while($row = mysqli_fetch_array($result)){
				$out .= "<tr>
								<td class='col-lg-3 vert-align'>".$row['songName']."</td>	
								<td class='col-lg-3 vert-align'>".$row['artistName']."</td>	
								<td class='col-lg-2 vert-align'><a href='album.php?id=".$row['albumID']."'>".$row['albumName']."</a></td>	
								<td class='col-lg-1 vert-align'>".$row['songLength']."</td>	
								<td class='col-lg-1 vert-align'>".$row['songPlay']."x</td>	
								<td class='col-lg-2 vert-align'>
										<div class='actions'> 
																<a href='music/". mt_rand(1,10) .".mp3' class='btn btn-default btn-circle-s' title='Play this song'><span class='glyphicon glyphicon-play'></span></a>
																<a href='inc/addtoplaylist.php?id=".$row['songID']."' class='btn btn-default btn-circle-s' title='Add this song to my playlist'><span class='glyphicon glyphicon-plus'></span></a>
																<a href='#' class='btn btn-default btn-circle-s'><span class='glyphicon glyphicon-save' title='Save this song for offline listening'></span></a>	
															</div>
								</td>
						   </tr>";
				
			}
		}else{
			$out = "";
		}
		
		
		
		
			
		if(empty($out)){
			$out .= "No results for ".$searchitem;
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
					<div class="col-lg-12">
						<h2>Search Results</h2>
						
						
						<table class="table table-hover searchtable">
							<thead>
								<th>Song</th>
								<th>Artist</th>
								<th>Album</th>
								<th>Duration</th>
								<th>Plays</th>
								<th></th>
							</thead>	
							<tbody>
								<?php
								
								
									echo $out;
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
