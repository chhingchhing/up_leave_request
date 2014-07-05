<?php $this->load->view('partial/header'); ?>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <?php $this->load->view("partial/nav_toggle"); ?>

        <?php $this->load->view("partial/nav_top"); ?>

        <?php $this->load->view("partial/nav_left"); ?>
    </nav>

    <?php $allow = true; ?>
    <?php if($allow) { ?>
        <?php $this->load->view("staffs/table"); ?>
    <?php } else { ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <?php $this->load->view("partial/chart"); ?>
            <!-- /.col-lg-8 -->
            <?php $this->load->view("partial/nav_right"); ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <?php } ?>

</div>
<!-- /#wrapper -->

<?php $this->load->view('partial/footer'); ?>