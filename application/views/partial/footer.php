<div id="feedback_bar"></div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <?php
    foreach(get_js_files() as $js_file)
    {
    ?>
    <script type="text/javascript" src="<?php echo base_url().$js_file['path'].'?';?>"></script>
    <?php
    }
    ?>
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>