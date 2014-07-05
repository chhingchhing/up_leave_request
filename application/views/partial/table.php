<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tables</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>1</td>
                                    <td>Chhing</td>
                                    <td>chhing99@gmail.com</td>
                                    <td class="center">0972792217</td>
                                    <td class="center">Phnom Penh</td>
                                    <td class="ceneter">
                                        <?php echo anchor("#users", 'users_new', array('class' => 'list-group-item glyphicon glyphicon-plus-sign', 'title' => 'users_new', 'data-toggle' => 'modal', 'data-target' => '#users')); ?>
                                        <a href="#">View</a> | 
                                        <a href="#">Edit</a> | 
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                                <tr class="even gradeC">
                                    <td>2</td>
                                    <td>Chhing</td>
                                    <td>chhing99@gmail.com</td>
                                    <td class="center">0972792217</td>
                                    <td class="center">Phnom Penh</td>
                                    <td class="ceneter">
                                        <a href="#">View</a> | 
                                        <a href="#">Edit</a> | 
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                                <tr class="odd gradeA">
                                    <td>3</td>
                                    <td>Chhing</td>
                                    <td>chhing99@gmail.com</td>
                                    <td class="center">0972792217</td>
                                    <td class="center">Phnom Penh</td>
                                    <td class="ceneter">
                                        <a href="#">View</a> | 
                                        <a href="#">Edit</a> | 
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                                <tr class="even gradeA">
                                    <td>4</td>
                                    <td>Chhing</td>
                                    <td>chhing99@gmail.com</td>
                                    <td class="center">0972792217</td>
                                    <td class="center">Phnom Penh</td>
                                    <td class="ceneter">
                                        <a href="#">View</a> | 
                                        <a href="#">Edit</a> | 
                                        <a href="#">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>DataTables Usage Information</h4>
                        <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                        <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->