   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.min.js"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/three.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/TransformControls.js') ?>"></script>
   <?php
   $page = $this->uri->segment(2);
   if($page == "vein_part"){ ?>
   <script src="<?php echo base_url('assets/js/VeinPartEditor.js') ?>"></script>
   <?php } else { ?>
   <script src="<?php echo base_url('assets/js/VeinEditor.js') ?>"></script>
   <?php } ?>
</body>
</html>
