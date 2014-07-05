<?php $this->load->view('partial/header'); ?>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <?php $this->load->view("partial/nav_toggle"); ?>

        <?php $this->load->view("partial/nav_top"); ?>

        <?php $this->load->view("partial/nav_left"); ?>
    </nav>

    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
			    <div class="panel panel-default">
			        <div class="panel-heading">
			            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
			            <div class="pull-right">
			                <div class="btn-group">
			                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
			                        Actions
			                        <span class="caret"></span>
			                    </button>
			                    <ul class="dropdown-menu pull-right" role="menu">
			                        <li><a href="#">Action</a>
			                        </li>
			                        <li><a href="#">Another action</a>
			                        </li>
			                        <li><a href="#">Something else here</a>
			                        </li>
			                        <li class="divider"></li>
			                        <li><a href="#">Separated link</a>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			        <!-- /.panel-heading -->
			        <div class="panel-body">
			            <div id="morris-area-chart"></div>
			        </div>
			        <!-- /.panel-body -->
			    </div>
		    </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php $this->load->view('partial/footer'); ?>