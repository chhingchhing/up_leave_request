<br/><br/>

  <div class="container-fluid">
    <!-- /.row -->
        <div class="col-md-2 dboard-padding">
            <?php 
                $users = array(
                    'src' => 'assets/img/create_user.png',
                    'alt' => 'booking',
                    'class' => 'img-thumbnail images-dashboard',
                    'title' => 'employees'
                );
            ?>
            <?php 
                echo anchor('employees',img($users)).br(1);
                echo anchor('employees',"Employees");  
            ?>
        </div>
        <div class="col-md-2 dboard-padding">
            <?php 
                $gallery = array(
                    'src' => 'assets/img/photo.jpg',
                    'alt' => 'gallery',
                    'class' => 'img-thumbnail images-dashboard',
                    'title' => 'gallery'
                );
            ?>
            <?php 
                echo anchor('garlleries',img($gallery)).br(1); 
                echo anchor('garlleries',"Gallery"); 
            ?>
        </div>
        <div class="col-md-2 dboard-padding">
            <?php 
                $leave = array(
                    'src' => 'assets/img/calendar.png',
                    'alt' => 'takeleave',
                    'class' => 'img-thumbnail images-dashboard',
                    'title' => 'takeleave'
                );
            ?>
            <?php 
                echo anchor('takeleaves',img($leave)).br(1);
                echo anchor('takeleaves',"Takeleave");
             ?>
        </div>
        <div class="col-md-2 dboard-padding">  
            <?php 
                $activities_img = array(
                    'src' => 'assets/img/activities-puzzle.gif',
                    'alt' => 'activity',
                    'class' => 'img-thumbnail images-dashboard',
                    'title' => 'Position'
                );
            ?>
          <?php 
                echo anchor('departments',img($activities_img)).br(1); 
                echo anchor('departments',"Departement"); 
            ?> 
        </div>
    <div class="col-md-2 dboard-padding">
        <?php 
            $accomodation_img = array(
                'src' => 'assets/img/menu.png',
                'alt' => 'accomodation',
                'class' => 'img-thumbnail images-dashboard',
                'title' => 'Report'
            );
        ?>
        <?php 
            echo anchor('report',img($accomodation_img)).br(1); 
            echo anchor('report',"Report"); 
        ?>
    </div>
    <br />
    <br />
    </div>
    <!-- /.row -->
<!-- /#page-wrapper -->