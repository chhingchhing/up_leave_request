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
                <ol class="breadcrumb">
				  	<li><?php echo anchor("dashboard/", "Dashboard"); ?></li>
				  	<li><?php echo anchor("$controller_name/", ucfirst($controller_name)); ?></li>
				  	<li class="active"><?php echo ucfirst($this->uri->segment("2")); ?></li>
				</ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

			    <div class="panel panel-default">
			        <div class="panel-heading">
			            <!-- <i class="fa fa-bar-chart-o fa-fw"></i> -->
			        	<i class="fa fa-user"></i> Employee's Information
			            <div class="pull-right">
			            	<div class="btn-group">
			                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
			                        Actions
			                        <span class="caret"></span>
			                    </button>
			                    <ul class="dropdown-menu pull-right" role="menu">
			                        <li><?php echo anchor("$controller_name/edit/$user_info->user_id", "Edit"); ?>
			                        </li>
			                        <!-- <li><?php echo anchor("", "View All Take Leaves"); ?>
			                        </li> -->
			                        <li class="divider"></li>
			                        <li><?php echo anchor("$controller_name/delete/$user_info->user_id", "Remove", "class='del-action'"); ?>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			        <!-- /.panel-heading -->
			        <div class="panel-body">
			            <!-- <div id="morris-area-chart"></div> -->

			        </div>
			        <!-- Table -->
				  	<table class="table">
				    	<tbody>
				    		<tr>
				    			<th>First Name</th>
				    			<td><?php echo $user_info->first_name ?></td>
				    		</tr>
				    		<tr>
				    			<th>Last Name</th>
				    			<td><?php echo $user_info->last_name; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Gender</th>
				    			<td><?php echo $user_info->gender; ?></td>
				    		</tr>
				    		<tr>
				    			<th>DOB</th>
				    			<td><?php echo $user_info->dob; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Email</th>
				    			<td><?php echo $user_info->email; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Phone 1</th>
				    			<td><?php echo $user_info->phone1; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Phone 2</th>
				    			<td><?php echo $user_info->phone2; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Title</th>
				    			<td><?php echo $user_info->position_name; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Department</th>
				    			<td><?php echo $user_info->department_name; ?></td>
				    		</tr>
				    		<tr>
				    			<th>Address</th>
				    			<td><?php echo $user_info->address; ?></td>
				    		</tr>
				    	</tbody>
				  	</table>

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