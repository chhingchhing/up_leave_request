<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <!-- <form role="form" action="#"> -->
            <?php echo form_open("$controller_name/save/".$take_info->take_id, array("role" => "form", "id" => "add_update_takeleave")); ?>
                <div class="form-group">
                    <label>Manager Mail</label>
                    <?php 
                    $manager_mail = array(
                        "name" => "manager_mail",
                        "class" => "form-control",
                        "value" => $take_info->approved_by
                        );
                    echo form_input($manager_mail); 
                    ?>
                </div>
                <!-- start -->
                <div class="form-group">
                    <label>Start Date</label>
                    <?php 
                    $start_date = array(
                        "name" => "start_date",
                        "class" => "form-control",
                        "value" => $take_info->start_date
                        );
                    echo form_input($start_date); 
                    ?>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <?php 
                    $end_date = array(
                        "name" => "end_date",
                        "class" => "form-control",
                        "value" => $take_info->end_date
                        );
                    echo form_input($end_date); 
                    ?>
                </div>
                <div class="form-group">
                    <label>Reason</label>
                    <?php 
                    $reason = array(
                        "name" => "reason",
                        "class" => "form-control",
                        "value" => $take_info->content
                        );
                    echo form_textarea($reason); 
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