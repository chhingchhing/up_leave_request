<?php $this->load->view('partial/header'); ?>
     <div class="row clearfix header">
             <div class="col-md-2 column">
                <?php echo img("images/cg-logo.png"); ?>
            </div>
            <div class="col-md-7 column dashboard"><h1> Dashboard</h1></div>

            <div class="col-md-3 column logout-profile">
            <span class="logout">
                           <font color="#FFFFFF">Welcome to &nbsp; &nbsp;</font>
                           <?php 
                                 // echo anchor('profile/detail_profile/'.$this->session->userdata('userid'), $this->session->userdata('full_username'));
                           ?>
                           &nbsp; &nbsp;|&nbsp; &nbsp;
                           <?php echo anchor('login/logout','<font color="#FFFFFF">Log out</font>','onclick="return confirm(\'Are you sure want to logout from the system?\');"'); ?>
                    </span>
                
            </div>
        </div>


 <div id="wrapper">
        <?php $this->load->view("partial/dashboard/table"); ?>
 
</div>
<!-- /#wrapper -->
<div style="clear:both;">&nbsp;</div>
           <div class="row clearfix footer">
           <center><p>Copy@right By: <a href="#">Codingate Team</a></p></center>
    </div>
 <?php $this->load->view('partial/footer'); ?>