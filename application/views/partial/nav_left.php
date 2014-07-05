<div class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <?php echo anchor("dashboard/", '<i class="fa fa-dashboard fa-fw"></i> Dashboard', array('class' => 'theTooltip', "data-toggle"=>"tooltip")); ?>
            </li>
            <li>
                <a href="#" class="nav-left-9"><i class="fa fa-th-list fa-fw"></i> Departments<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php echo anchor("departments/", ' List', array('class' => 'theTooltip glyphicon glyphicon-list', 'title' => 'View List', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("departments/create", ' Create', array('class' => 'theTooltip glyphicon glyphicon-plus-sign', 'title' => 'Create', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("departments/remove", ' Remove', array('class' => 'theTooltip glyphicon glyphicon-remove remove', 'title' => 'Remove', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#" class="nav-left-9"><i class="fa fa-users fa-fw"></i> Staffs<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php echo anchor("employees/", ' List', array('class' => 'theTooltip glyphicon glyphicon-list', 'title' => 'View List', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("employees/create", ' Create', array('class' => 'theTooltip glyphicon glyphicon-plus-sign', 'title' => 'Create', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("employees/remove", ' Remove', array('class' => 'theTooltip glyphicon glyphicon-remove remove', 'title' => 'Remove', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <!-- start of take leave-->
            <li>
                <a href="#" class="nav-left-9"><i class="fa fa-book fa-fw"></i> Take Leave<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php echo anchor("takeleaves/", ' List', array('class' => 'theTooltip glyphicon glyphicon-list', 'title' => 'View List', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("takeleaves/create", ' Create', array('class' => 'theTooltip glyphicon glyphicon-plus-sign', 'title' => 'Create', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("takeleaves/remove", ' Remove', array('class' => 'theTooltip glyphicon glyphicon-remove remove', 'title' => 'Remove', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                </ul>
            </li>
            <!-- the end of take leave -->
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Appending Leave (5)</a>
            </li>
            <li>
                <a href="#" class="nav-left-9"><i class="fa fa-wrench fa-fw"></i> Approval Leave<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?php echo anchor("approval/", ' List', array('class' => 'theTooltip glyphicon glyphicon-list', 'title' => 'View List', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("approval/create", ' Create', array('class' => 'theTooltip glyphicon glyphicon-plus-sign', 'title' => 'Create', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                    <li>
                        <?php echo anchor("approval/remove", ' Remove', array('class' => 'theTooltip glyphicon glyphicon-remove remove', 'title' => 'Remove', "data-toggle"=>"tooltip", "data-placement"=>"top")); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <!-- <li> -->
                <!-- <a href="#"  class="nav-left-9"><i class="fa fa-sitemap fa-fw"></i> Videos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Create</a>
                    </li>
                    <li>
                        <a href="#">Update</a>
                    </li>
                    <li>
                        <a href="#">Remove <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul> -->
                        <!-- /.nav-third-level -->
                    <!-- </li>
                </ul> -->
                <!-- /.nav-second-level -->
            <!-- </li> -->
        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->