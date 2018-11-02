    
	$("#menu-toggle").click(function(){
        $("#wrapper").toggleClass("toggled");
    });
	
	$(function() {
		 var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
		 $(".sidebar-nav li .menup").each(function(){
			  if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
			  $(this).addClass("active");
		 })
	});
	
	
					
	
							audioPlayer();
							
							function audioPlayer(){
								var currentSong = 0;
								
													
								$(".btn-circle-s").click(function(e){
									
									e.preventDefault();
									$("#audioPlayer")[0].src = this;
									$("#audioPlayer")[0].play();
									$("#audioPlayer")[0].volume = 0.2;
									$("#play-pause").removeClass("glyphicon-play");
									$("#play-pause").addClass("glyphicon-pause");
										

								});
								
								
								
								$("#play-pause").click(function(){
									var music = document.getElementById('audioPlayer');
									if(music.paused){
										music.play();
										$("#play-pause").removeClass("glyphicon-play");
										$("#play-pause").addClass("glyphicon-pause");
									}else{
										music.pause();
										$("#play-pause").removeClass("glyphicon-pause");
										$("#play-pause").addClass("glyphicon-play");
									}
								});
								
								
								
								
							}
							
						
					
	
					