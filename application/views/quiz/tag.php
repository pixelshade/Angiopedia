<!-- </div> -->
<h3>Correctly tagged</h3>

<div class="progress progress-striped">
  <div id="progressBar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">    
    0%
  </div>
</div>

<div>
  <div id="viewBox">
    <script type="text/javascript">  
     <?php 
     echo  "var veinJson = ".json_encode($vein). ";\n";
     echo  "var veinPartsJson = ".json_encode($veinParts).";\n";
     ?>
     
   </script>
 </div>
<div id="infoBox" class="panel panel-default col-md-2" style="cursor:move">
                <div class="panel-heading"><h1><?php echo $vein->name; ?></h1></div>
                <div class="panel-body">
                 <?php echo $vein->info; ?>
                <span></span>
                <hr>
                <div id="veinParts"></div>
                </div>
              </div>


<div id="popover" class="popover right">
      <div class="arrow"></div>
      <h3 class="popover-title">Enter name of the part</h3>
      <div class="popover-content">
        <input id="userTagName" type="text" placeholder="Name of the part" class="form-control" />        
      </div>
    </div>


<!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loading-modal">
  <i class="glyphicon glyphicon-play"></i> Start Processing
</button>    -->

<!-- Static Modal
<div class="modal modal-static fade" id="loading-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <img src="http://www.travislayne.com/images/loading.gif" class="icon" />
          <h4>Loading... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button></h4>
        </div>
      </div>
    </div>
  </div>
</div>
-->
