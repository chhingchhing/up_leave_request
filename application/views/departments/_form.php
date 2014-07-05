<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <!-- <form role="form" action="#"> -->
            <?php echo form_open("$controller_name/save/".$record_info->department_id, array("role" => "form", "id" => "add_update_staff")); ?>
                <div class="form-group">
                    <label>Department Name</label>
                    <?php 
                    $dept_name = array(
                        "name" => "dept_name",
                        "class" => "form-control",
                        "value" => $record_info->department_name
                        );
                    echo form_input($dept_name); 
                    ?>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <?php
                    $descrbe = array(
                        "name" => "dept_description",
                        "class" => "form-control",
                        "rows" => "3",
                        "value" => $record_info->description
                        );
                    echo form_textarea($descrbe); 
                    ?>
                </div>
                <button type="submit" class="btn btn-success add_update">Submit</button>
                <button type="reset" class="btn btn-info">Reset</button>
            </form>
        </div>
        <!-- /.col-lg-6 (nested) -->
    </div>
    <!-- /.row (nested) -->
</div>
<!-- /.panel-body -->