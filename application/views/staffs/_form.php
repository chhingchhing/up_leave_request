<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <!-- <form role="form" action="#"> -->
            <?php echo form_open("$controller_name/save/".$user_info->user_id, array("role" => "form", "id" => "add_update_staff")); ?>
                <div class="form-group">
                    <label>First Name</label>
                    <?php 
                    $first_name = array(
                        "name" => "first_name",
                        "class" => "form-control",
                        "value" => $user_info->first_name
                        );
                    echo form_input($first_name); 
                    ?>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <?php 
                    $last_name = array(
                        "name" => "last_name",
                        "class" => "form-control",
                        "value" => $user_info->last_name
                        );
                    echo form_input($last_name);
                    ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <?php
                    $email = array(
                        "name" => "email",
                        "class" => "form-control",
                        "value" => $user_info->email
                        );
                    echo form_input($email);
                    ?>
                    <p class="help-block">Example: username@example.com</p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <?php 
                    $password = array(
                        "name" => "password",
                        "class" => "form-control",
                        "value" => ''
                        );
                    echo form_password($password);
                    ?>
                    <p class="help-block">Password: The long is 6 to 12 characters.</p>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <?php 
                    $confirm_password = array(
                        "name" => "confirm_password",
                        "class" => "form-control",
                        "value" => ''
                        );
                    echo form_password($confirm_password);
                    ?>
                    <p class="help-block">Confirm Password must be match with Password.</p>
                </div>
                <div class="form-group">
                    <label>Phone 1</label>
                    <?php 
                    $phone1 = array(
                        "name" => "phone1",
                        "class" => "form-control",
                        "value" => $user_info->phone1
                        );
                    echo form_input($phone1);
                    ?>
                </div>
                <div class="form-group">
                    <label>Phone 2</label>
                    <?php 
                    $phone2 = array(
                        "name" => "phone2",
                        "class" => "form-control",
                        "value" => $user_info->phone2
                        );
                    echo form_input($phone2);
                    ?>
                </div>
                <div class="form-group">
                    <label>Upload Profile</label>
                    <?php 
                    $upload_profile = array(
                        "name" => "upload_profile",
                        "class" => "form-control",
                        "value" => ''
                        );
                    echo form_upload($upload_profile);
                    ?>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <?php 
                    $genders = array(
                        "" => "-- Select --",
                        "Female" => "Female",
                        "Male" => "Male"
                        );
                    echo form_dropdown("gender", $genders, $user_info->gender, "class='form-control'");
                    ?>
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <?php 
                    echo form_dropdown("position", $position, $user_info->position_id, "class='form-control'");
                    ?>
                </div>
                <div class="form-group">
                    <label>Manager</label>
                    <?php 
                    echo form_dropdown("manager", $manager, "", "class='form-control'");
                    ?>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <?php
                    echo form_dropdown("department", $department, $user_info->department_id, "class='form-control'");
                    ?>
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <?php
                    echo form_dropdown("user_type", $user_type, $user_info->usertype_id, "class='form-control'");
                    ?>
                </div>
                <div class="form-group">
                    <label>Date of Birth</label>
                    <?php 
                    $dob = array(
                        "name" => "dob",
                        "class" => "form-control",
                        "value" => $user_info->dob
                        );
                    echo form_input($dob);
                    ?>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <?php
                    $address = array(
                        "name" => "address",
                        "class" => "form-control",
                        "rows" => "3",
                        "value" => $user_info->address
                        );
                    echo form_textarea($address); 
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