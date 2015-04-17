<div>

    <strong id="partNameXs" class="partName visible-xs text-center"></strong>

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

                <p><em>Váš prehliadač nepodporuje <b>WebGL</b>, zobrazuje sa iba obrázok kosti. Chcete sa dozvedieť <a
                            href="./about.php?#FAQ">viac</a>?</em></p>
            </div>
        </div>


    </div>


    <div id="infoBox" class="panel panel-default hidden-xs col-md-2" style="cursor:move">
        <div class="panel-heading"><h1><?php echo $vein->name; ?></h1>

            <?php
            echo '<a href="/quiz/tag/' . $vein->slug . '" class="btn btn-primary btn-xs pull-right">Preskúšať časti</a>';
            ?>
        </div>
        <div class="panel-body">
            <?php echo $vein->info; ?>Ukazuješ na:
            <span class="partName"></span>
            <hr>
            <div id="veinParts">
                <?php

                foreach ($vein_part_names as $vein) {
                    echo '<a href="#" class="label label-info" onclick="setSameVeinPartsVisible(\'' . $vein->name . '\')" title="' . $vein->name . '">' . $vein->name . '</a> ';
                }
                ?>
            </div>
            <hr>
            <div class="fb-like" data-href="https://www.facebook.com/skeletopedia" data-width="200"
                 data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
    </div>

    <div class="navbar navbar-fixed-bottom visible-xs" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btn btn-default" data-toggle="collapse"
                        data-target=".bone-tools">
                    <span class="sr-only">Toggle tools</span>
                    <span class="glyphicon glyphicon-info-sign"></span>
                </button>
                <a class="navbar-brand" href="#"><?php $vein->name ?></a>
            </div>
            <div class="collapse bone-tools">
                <div class="container">
                    <ul class="nav navbar-nav">

                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#howToUseModal">
                            <span class="glyphicon glyphicon-question-sign"></span> How to use
                        </button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#bonePartsModal">
                            <span class="glyphicon glyphicon-list"></span> Bone parts
                        </button>
                        <hr>

                        <!--                    <div class="btn-toolbar" role="toolbar">-->
                        <!--                        <div class="btn-group">-->
                        <!--                            <button type="button" class="btn btn-default">-->
                        <!--                                <span class="glyphicon glyphicon-star"></span> Star-->
                        <!--                            </button>-->
                        <!---->
                        <!--                            <button type="button" class="btn btn-default">-->
                        <!--                                <span class="glyphicon glyphicon-star"></span> Star-->
                        <!--                            </button>-->
                        <!---->
                        <!--                            <button type="button" class="btn btn-default">-->
                        <!--                                <span class="glyphicon glyphicon-star"></span> Star-->
                        <!--                            </button>-->
                        <!--                        </div>-->


                        <!--                    <li class="dropdown">-->
                        <!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bone parts <b class="caret"></b></a>-->
                        <!--                        <ul class="dropdown-menu">-->
                        <?php
                        //                            foreach ($vein_part_names as $vein) {
                        //                                echo '<a href="#" class="label label-info" onclick="setSameVeinPartsVisible("' . $vein->name . '")" title="' . $vein->name . '">' . $vein->name . '</a> ';
                        //                            }
                        ?>

                        <!--  <li><a href="#">Something else here</a></li>
                         <li class="divider"></li>
                         <li class="dropdown-header">Nav header</li>
                         <li><a href="#">Separated link</a></li> -->
                        <!--                        </ul>-->
                        <!--                    </li>-->
                        <!--                    <hr>-->

                        <li>
                            <div class="fb-like" data-href="https://www.facebook.com/skeletopedia" data-width="200"
                                 data-layout="standard" data-action="like" data-show-faces="true"
                                 data-share="true"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>


    <!-- bonePartsModal -->
    <div class="modal fade" id="bonePartsModal" tabindex="-1" role="dialog" aria-labelledby="bonePartsModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="bonePartsModalLabel"><?php echo $vein->name; ?></h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <?php
                        foreach ($vein_part_names as $vein) {
                            echo '<li><a href="#" class="label label-info" data-dismiss="modal" onclick="setSameVeinPartsVisible("' . $vein->name . '")" title="' . $vein->name . '">' . $vein->name . '</a></li> ';
                        }
                        ?>
                    </ul>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- HelpModal -->
    <div class="modal fade" id="howToUseModal" tabindex="-1" role="dialog" aria-labelledby="howToUseModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="howToUseModalLabel">Navigation</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Tap on part to see its name.</li>
                        <li>Drag with one finger to rotate.</li>
                        <li>Pinch or squelch with two fingers to zoom in or out.</li>
                        <li>Drag three fingers to move.</li>
                        <li>Like to share the love.</li>
                    </ul>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">It's easy</button>
                </div>
            </div>
        </div>
    </div>
