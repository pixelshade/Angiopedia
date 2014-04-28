<!-- </div> -->
<div>
  <div id="viewBox">
    <script type="text/javascript">  
     <?php 
     echo  "var veinJson = ".json_encode($vein). ";\n";
     echo  "var veinPartsJson = ".json_encode($veinParts).";\n";
     ?>
   </script>
 </div>
<div id="infoBox" class="panel panel-default">
                <div class="panel-heading"><h1><?php echo $vein->name; ?></h1>
                 <br>
                <?php
                echo '<a href="/quiz/tag/'.$vein->name.'" class="btn btn-primary">Test</a>';                
                ?>
                </div>
                <div class="panel-body">
                 <?php echo $vein->info; ?>
                <span></span>
                <hr>
                <div id="veinParts"></div>
               
                </div>
              </div>


<!--  <div id="infoBox" class="well">
 <h1>
  <?php //echo $vein->name; ?>
 </h1>
 <?php //echo $vein->info; ?>
 <span></span>
 </div>
 <div id="veinParts"></div>
</div> -->
<!-- <div class="container"> -->


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


<!-- 

<div class="row">
  <div class="col-xs-6">
    <div class="range">
      <input type="range" name="range" min="1" max="100" value="50" onchange="range.value=value">
      <output id="range">50</output>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="range range-primary">
      <input type="range" name="range" min="1" max="100" value="50" onchange="rangePrimary.value=value">
      <output id="rangePrimary">50</output>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-6">
    <div class="range range-success">
      <input type="range" name="range" min="1" max="100" value="50" onchange="rangeSuccess.value=value">
      <output id="rangeSuccess">50</output>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="range range-info">
      <input type="range" name="range" min="1" max="100" value="50" onchange="rangeInfo.value=value">
      <output id="rangeInfo">50</output>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-6">
    <div class="range range-warning">
      <input type="range" name="range" min="1" max="100" value="50" onchange="rangeWarning.value=value">
      <output id="rangeWarning">50</output>
    </div>
  </div>
  <div class="col-xs-6">
    <div class="range range-danger">
      <input type="range" name="range" min="1" max="100" value="50" onchange="rangeDanger.value=value">
      <output id="rangeDanger">50</output>
    </div>
  </div>  -->