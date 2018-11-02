<?php include_once "inc/functions.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "inc/head.php"?>
<?php include_once "inc/js.php"?>



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
					
                    <div class="col-lg-12 rs">
						<audio id="music" controls="controls">
							<source src="1.ogg" type="audio/ogg" />
							<source src="1.mp3" type="audio/mpeg" />
						</audio>
						
						<div id="audioplayer">
							<button id="pButton" class="play" onclick="playAudio()"></button>
						</div>	
					</div>
					
				
                </div>
            </div>
        </div>
       

    </div>
	
	<script>
	
	var music = document.getElementById('music');
 
	function playAudio() {
		if (music.paused) {
			music.play();
			pButton.className = "";
			pButton.className = "pause";
		} else { 
			music.pause();
			pButton.className = "";
			pButton.className = "play";
		}
	}
	
	</script>

    <!-- Scripts -->
 


</body>

</html>
