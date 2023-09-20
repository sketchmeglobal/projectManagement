
<?php
$class_name = $this->router->fetch_class();
$method_name = $this->router->fetch_method();
$user_type = $this->session->usertype;
?>
<style>
    .affix{width:240px;height: 100%;overflow:scroll;}
     .affix::-webkit-scrollbar {
      width: 10px;
    }
    
    /* Track */
     .affix::-webkit-scrollbar-track {
      background: #f1f1f1; 
    }
     
    /* Handle */
     .affix::-webkit-scrollbar-thumb {
      background: #888; 
    }
    
    /* Handle on hover */
     .affix::-webkit-scrollbar-thumb:hover {
      background: #555; 
    }
</style>
<div class="sidebar-left">
    <!--responsive view logo start-->
    <div class="logo theme-logo-bg visible-xs-* visible-sm-*">
        <a href="<?=base_url();?>" target="_blank">
            <img src="<?=base_url();?>assets/img/logo_20px.png" alt="Shilpa Logo">
<!--            <i class="fa fa-home"></i>-->
            <span class="brand-name"><strong><?=WEBSITE_NAME_SHORT;?></strong></span>
        </a>
    </div>
    <!--responsive view logo end-->

    <div class="sidebar-left-info affix">
        <!-- visible small devices start-->
        <div class=" search-field">  </div>
        <!-- visible small devices end-->

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked side-navigation">

            <!-- ONLY ADMIN RIGHTS -->
            <?php if($user_type == 1){?>

            <li><h3 class="navigation-title">Menu</h3></li>
            <li class="<?=(($class_name == 'Dashboard')) ? 'active' : ''; ?>">
                <a href="<?=base_url();?>admin/dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
            </li>

            <!-- For Master Menu -->            
            <li class="menu-list <?=($class_name == 'Paymentmode' || $class_name == 'Employeemaster' || $class_name == 'Tasktype' || $class_name == 'Bankaccount') ? 'active' : ''; ?>"><a href=""><i class="fa fa-vcard-o"></i> <span>Master</span></a>
                <ul class="child-list">
                    <li class="<?=(($class_name == 'Paymentmode')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/payment-mode"><i class="fa fa-caret-right"></i> <span>Payment Mode</span></a>
                    </li>
                    <li class="<?=(($class_name == 'Employeemaster')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/employee-master"><i class="fa fa-caret-right"></i> <span>Employee Master</span></a>
                    </li>
                    <li class="<?=(($class_name == 'Tasktype')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/task-type"><i class="fa fa-caret-right"></i> <span>Task Type</span></a>
                    </li>
                    <li class="<?=(($class_name == 'Bankaccount')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/bank-account"><i class="fa fa-caret-right"></i> <span>Bank Account</span></a>
                    </li>
                </ul>
            </li>
            <!-- For Master Menu -->

            <li class="<?= (($class_name == 'Profile') && ($method_name == 'profile')) ? 'active' : ''; ?>">
                <a href="<?=base_url();?>admin/profile"><i class="fa fa-vcard-o"></i> <span>Profile</span></a>
            </li>

            <li class="<?= (($class_name == 'Projects') && ($method_name == 'projects')) ? 'active' : ''; ?>">
                <a href="<?=base_url();?>admin/projects"><i class="fa fa-vcard-o"></i> <span>Projects</span></a>
            </li>

            <!-- For Employee -->            
            <li class="menu-list <?=($class_name == 'Employee' || $class_name == 'Employeesalary') ? 'active' : ''; ?>"><a href=""><i class="fa fa-vcard-o"></i> <span>Employee</span></a>
                <ul class="child-list">
                    <li class="<?=(($class_name == 'Employee')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/employee-management"><i class="fa fa-caret-right"></i> <span>Employee List</span></a>
                    </li>

                    <li class="<?=(($class_name == 'Employeesalary')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/employee-salary"><i class="fa fa-caret-right"></i> <span>Employee Salary</span></a>
                    </li>
                </ul>
            </li>
            <!-- For Employee -->

            <!-- For Cashbook -->            
            <li class="menu-list <?=($class_name == 'Cashbook') ? 'active' : ''; ?>"><a href=""><i class="fa fa-vcard-o"></i> <span>Accounts</span></a>
                <ul class="child-list">
                    <li class="<?=(($class_name == 'Cashbook')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/cashbook-management"><i class="fa fa-caret-right"></i> <span>Cashbook List</span></a>
                    </li>
                </ul>
            </li>
            <!-- For Cashbook -->

            <!-- For Report -->            
            <li class="menu-list <?=($class_name == 'Projectreport') ? 'active' : ''; ?>"><a href=""><i class="fa fa-vcard-o"></i> <span>Reports</span></a>
                <ul class="child-list">
                    <li class="<?=(($class_name == 'Projectreport')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/project-report"><i class="fa fa-caret-right"></i> <span>Project Report</span></a>
                    </li>
                </ul>
            </li>
            <!-- For Report -->
            
            <?php } ?>

            <!-- For Document manager types user -->            
            <li class="menu-list <?=($class_name == 'Documents' || $class_name == 'SharedWithMe') ? 'active' : ''; ?>"><a href=""><i class="fa fa-file-text-o"></i> <span>Documents</span></a>
                <ul class="child-list">
                    <li class="<?=(($class_name == 'Documents')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/my-documents/0"><i class="fa fa-caret-right"></i> <span>My Documents</span></a>
                    </li>

                    <li class="<?=(($class_name == 'SharedWithMe')) ? 'active' : ''; ?>">
                        <a href="<?=base_url();?>admin/shared-with-me/0"><i class="fa fa-caret-right"></i> <span>Shared With Me</span></a>
                    </li>
                </ul>
            </li>
            <!-- For Document manager types user -->


        </ul>
        <!--sidebar nav end-->

        <!--sidebar widget start-->
        <div class="sidebar-widget">
            <h4>Account Information</h4>
            <ul class="list-group">
                <li>
                    <p>
                        <strong><i class="fa fa-user-circle-o"></i> <span class="username"><?=$this->session->username;?></span></strong>
                        <br/>
                        <strong><i class="fa fa-envelope"></i> <?=$this->session->email;?></strong>
                    </p>
                </li>
                
                <li>
                    <a href="<?=base_url();?>admin/profile" class="btn btn-info btn-sm addon-btn">Edit Info. <i class="fa fa-vcard pull-left"></i></a>
                </li>
            </ul>
        </div>
        <!--sidebar widget end-->

    </div>
</div>