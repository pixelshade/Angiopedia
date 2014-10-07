// $('.typeahead').typeahead();
// $("#search").typeahead({ source:vein_names });

    $(function(){
    	if($('[name="color"]').length){
        	$('[name="color"]').colorpicker();
    	}
        if($("#infoBox").length){
    		$("#infoBox").draggable();  
        }
    });

    if (typeof Detector === 'undefined' && Detector.webgl ) {
      $('#noWebGlBone').hide();
      $('#modelView').show();
      
    } 
