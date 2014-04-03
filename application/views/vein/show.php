
<div id="bone">
 <?php 
 var_dump($vein);
 ?>
</div>

<!-- Static Modal -->
<div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <img src="http://www.travislayne.com/images/loading.gif" class="icon" />
          <h4>Processing... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">×</button></h4>
        </div>
      </div>
    </div>
  </div>
</div>


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
  </div>