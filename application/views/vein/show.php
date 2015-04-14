
<div>
	<div id="viewBox">
		<script type="text/javascript">  
			<?php 
			echo  "var veinJson = ".json_encode($vein). ";\n";
			echo  "var veinPartsJson = ".json_encode($veinParts).";\n";
			?>
		</script>

		<div id="noWebGlBone" style="display: none;">			        			
			<?php
//			echo '<img src="/app_content/'.$vein->image.'" alt="'.$vein->name.'">';
			?>
			<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign"></span>
				<p><em>Váš prehliadač nepodporuje <b>WebGL</b>, zobrazuje sa iba obrázok kosti. Chcete sa dozvedieť <a href="./about.php?#FAQ">viac</a>?</em></p>
			</div>
		</div>



	</div>


	<div id="infoBox" class="panel panel-default hidden-xs col-md-2" style="cursor:move">
		<div class="panel-heading"><h1><?php echo $vein->name; ?></h1>

			<?php
			echo '<a href="/quiz/tag/'.$vein->name.'" class="btn btn-primary btn-xs pull-right">Preskúšať časti</a>';
			?>
		</div>
		<div class="panel-body">
			<?php echo $vein->info; ?>Ukazuješ na:
			<span></span>
			<hr>
			<div id="veinParts">
				<?php

				foreach ($vein_part_names as $vein) {       
					echo '<a href="#" class="label label-info" onclick="setSameVeinPartsVisible("'.$vein->name.'")" title="'.$vein->name.'">'.$vein->name.'</a> ';
				}
				?>
			</div>

		</div>
	</div>

	<div class="navbar navbar-fixed-bottom visible-xs" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bone-tools">
					<span class="sr-only">Toggle tools</span>   
					<span class="glyphicon glyphicon-info-sign"></span>        
				</button>
				<a class="navbar-brand" href="#"><?php $vein->name ?></a>
			</div>
			<div class="collapse bone-tools">
				<ul class="nav navbar-nav">

					<div class="btn-toolbar" role="toolbar">
						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-star"></span> Star
							</button>

							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-star"></span> Star
							</button>

							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-star"></span> Star
							</button>
						</div>


						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>

							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>

							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bone parts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
							foreach ($vein_part_names as $vein) {
								echo '<a href="#" class="label label-info" onclick="setSameVeinPartsVisible("'.$vein->name.'")" title="'.$vein->name.'">'.$vein->name.'</a> ';
							}
							?>           

           <!--  <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li> -->                
        </ul>
    </li>
</ul>
</div><!--/.nav-collapse -->
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
  </div> 
  -->