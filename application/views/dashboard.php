<?php $this->load->view('partial/header'); ?>

<div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view("partial/nav_toggle"); ?>

            <?php $this->load->view("partial/nav_top"); ?>

            <?php $this->load->view("partial/nav_left"); ?>
        </nav>

        <?php $this->load->view("partial/dashboard/table"); ?>
 
</div>
<!-- /#wrapper -->

<?php $this->load->view('partial/footer'); ?>