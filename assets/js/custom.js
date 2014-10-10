$("#search").typeahead({ 
    source:vein_names, 
    updater: function(selectedItem){

        var selSlug = vein_slugs[vein_names.indexOf(selectedItem)];
        location.href = "vein/show/" + selSlug;

        return selectedItem;
    }
});

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


