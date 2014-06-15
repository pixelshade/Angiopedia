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
