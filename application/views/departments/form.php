<?php $this->load->view('partial/header'); ?>

<div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view("partial/nav_toggle"); ?>

            <?php $this->load->view("partial/nav_top"); ?>

            <?php $this->load->view("partial/nav_left"); ?>
        </nav>

        <!-- Form -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $title; ?>
                        </div>
                        <?php $this->load->view("departments/_form"); ?>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
 
    </div>
    <!-- /#wrapper -->

<?php $this->load->view('partial/footer'); ?>