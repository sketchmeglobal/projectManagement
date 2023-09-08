
<?php #echo '<pre>',print_r($user_details[0]),'</pre>';die; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?> | <?=WEBSITE_NAME;?></title>
    <meta name="description" content="<?=$title?>">

    <!--Select2-->
    <link href="<?=base_url();?>assets/admin_panel/css/select2.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin_panel/css/select2-bootstrap.css" rel="stylesheet">

    <!--iCheck-->
    <link href="<?=base_url();?>assets/admin_panel/js/icheck/skins/all.css" rel="stylesheet">

    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->
    
     <style>
        .acc_masters_values, .offer_values{display: none}
    </style>
    
</head>

<body class="sticky-header">

<section>
    <!-- sidebar left start (Menu)-->
    <?php $this->load->view('components/left_sidebar'); //left side menu ?>
    <!-- sidebar left end (Menu)-->

    <!-- body content start-->
    <div class="body-content" style="min-height: 1500px;">

        <!-- header section start-->
        <?php $this->load->view('components/top_menu'); ?>
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <form autocomplete="off" id="form_edit_employee" method="post" action="<?=base_url('admin/form-edit-employee')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">

                                <div class="form-group ">
                                    <div class="col-lg-3">                                        
                                        <label for="emp_type" class="control-label text-danger">Employee Type *</label>
                                        <select name="emp_type" id="emp_type" class="form-control select2">
                                            <option value="0" <?php if($employee_details[0]->emp_type == '0'){?> selected <?php } ?>>Select Employee Type</option>
                                            <option value="1" <?php if($employee_details[0]->emp_type == '1'){?> selected <?php } ?>>Permanent</option>
                                            <option value="2" <?php if($employee_details[0]->emp_type == '2'){?> selected <?php } ?>>Part Timer</option>
                                            <option value="3" <?php if($employee_details[0]->emp_type == '3'){?> selected <?php } ?>>Freelancer</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">                                        
                                        <label for="emp_desig" class="control-label text-danger">Employee Designation *</label>
                                        <select name="emp_desig" id="emp_desig" class="form-control select2">
                                            <option value="0" <?php if($employee_details[0]->emp_desig == '0'){?> selected <?php } ?>>Select Employee Designation</option>
                                            <option value="1" <?php if($employee_details[0]->emp_desig == '1'){?> selected <?php } ?>>Designer</option>
                                            <option value="2" <?php if($employee_details[0]->emp_desig == '2'){?> selected <?php } ?>>Developer</option>
                                            <option value="3" <?php if($employee_details[0]->emp_desig == '3'){?> selected <?php } ?>>Full Stack Developer</option>
                                            <option value="4" <?php if($employee_details[0]->emp_desig == '4'){?> selected <?php } ?>>Sr. Designer</option>
                                            <option value="5" <?php if($employee_details[0]->emp_desig == '5'){?> selected <?php } ?>>Sr. Developer</option>
                                            <option value="6" <?php if($employee_details[0]->emp_desig == '6'){?> selected <?php } ?>>Team Lead</option>
                                            <option value="7" <?php if($employee_details[0]->emp_desig == '7'){?> selected <?php } ?>>Project Mgr.</option>
                                            <option value="8" <?php if($employee_details[0]->emp_desig == '8'){?> selected <?php } ?>>Manager</option>
                                            <option value="9" <?php if($employee_details[0]->emp_desig == '9'){?> selected <?php } ?>>Director</option>
                                            <option value="10" <?php if($employee_details[0]->emp_desig == '0'){?> selected <?php } ?>>Managing Director</option>
                                            <option value="11" <?php if($employee_details[0]->emp_desig == '11'){?> selected <?php } ?>>Accounts & project coordinator</option>
                                            <option value="12" <?php if($employee_details[0]->emp_desig == '12'){?> selected <?php } ?>>Business Developer</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="first_name" class="control-label">First Name</label>
                                        <input value="<?=$employee_details[0]->first_name?>" id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="last_name" class="control-label">Last Name</label>
                                        <input value="<?=$employee_details[0]->last_name?>" id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control round-input" />
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="email_id" class="control-label">Email ID</label>
                                        <input value="<?=$employee_details[0]->email_id?>" id="email_id" name="email_id" type="email" placeholder="Email ID" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="ph_number" class="control-label">Mobile Number</label>
                                        <input value="<?=$employee_details[0]->ph_number?>" id="ph_number" name="ph_number" type="tel" placeholder="Mobile Number" class="form-control round-input" />
                                    </div> 

                                    <?php
                                    $loan_amount_remaining = $employee_details[0]->loan_amount_remaining;
                                    if($loan_amount_remaining > 0){
                                        $active_loan = $employee_details[0]->active_loan;
                                        $active_loan_repay = $active_loan - $loan_amount_remaining;
                                        $loan_duration = $employee_details[0]->loan_duration;
                                        $active_loan_emi = $employee_details[0]->active_loan_emi;
                                    }else{
                                        $active_loan = 0.00;
                                        $active_loan_repay = 0.00;
                                        $loan_duration = 0;
                                        $active_loan_emi = 0;
                                    }
                                    ?>

                                    <div class="col-lg-3">
                                        <label for="active_loan" class="control-label">Loan Granted(Rs.)</label>
                                        <input value="<?=$active_loan?>" id="active_loan" name="active_loan" type="number" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="active_loan_repay" class="control-label">Loan Paid(Rs.)</label>
                                        <input value="<?=$active_loan_repay?>" id="active_loan_repay" name="active_loan_repay" type="number"  class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="loan_amount_remaining" class="control-label">Loan Pending(Rs.)</label>
                                        <input value="<?=$loan_amount_remaining?>" id="loan_amount_remaining" name="loan_amount_remaining" type="number" placeholder="Loan Remaining(Rs.)" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="loan_duration" class="control-label">Loan Duration(in month)</label>
                                        <input value="<?=$loan_duration?>" id="loan_duration" name="loan_duration" type="number" placeholder="Loan Duration" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="active_loan_emi" class="control-label">Loan EMI(Rs.)</label>
                                        <input value="<?=$active_loan_emi?>" id="active_loan_emi" name="active_loan_emi" type="number" class="form-control round-input" />
                                    </div>  
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="basic_pay" class="control-label">Basic Pay</label>
                                        <input value="<?=$employee_details[0]->basic_pay?>" id="basic_pay" name="basic_pay" type="number" placeholder="Basic Pay" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="last_incriment_date" class="control-label">Last Incriment Date</label>
                                        <input value="<?=date('Y-m-d', strtotime($employee_details[0]->last_incriment_date))?>" id="last_incriment_date" name="last_incriment_date" type="date" placeholder="Loan Duration" class="form-control round-input" />
                                    </div>
                                     
                                    <div class="col-lg-3">
                                        <label for="" class="control-label">Employee Photo</label>
                                        <input type="file" name="employeefile" id="employeefile" accept=".jpg,.jpeg,.png,.bmp" class="file">
                                    </div>                                                                        
                                </div>    

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Update Employee</i></button>
                                        <input type="hidden" name="emp_id" id="emp_id" value="<?=$employee_details[0]->emp_id?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
                
            </div>

        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <?php $this->load->view('components/footer'); ?>
        <!--footer section end-->

    </div>
    <!-- body content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/admin_panel/js/jquery-1.10.2.min.js"></script>
<!-- common js -->
<?php $this->load->view('components/_common_js'); //left side menu ?>
<!--Select2-->
<script src="<?=base_url();?>assets/admin_panel/js/select2.js" type="text/javascript"></script>
<script>
    $('.select2').select2();
</script>
<!--Icheck-->
<script src="<?=base_url();?>assets/admin_panel/js/icheck/skins/icheck.min.js"></script>
<script src="<?=base_url();?>assets/admin_panel/js/icheck-init.js"></script>
<!--form validation-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.validate.min.js"></script>
<!--ajax form submit-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.form.min.js"></script>

<script>
    //add-item-form validation and submit
    $("#form_edit_employee").validate({
        
        rules: {
            emp_type: {
                required: true
            },            
            emp_desig:{
                required: true
            },
            first_name : {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#form_edit_employee').ajaxForm({
        beforeSubmit: function () {
            return $("#form_edit_employee").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log(returnData);
            
            obj = JSON.parse(returnData);
            notification(obj);
            
        }
    });

    //toastr notification
    function notification(obj) {
        toastr[obj.type](obj.msg, obj.title, {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "15000",
            "extendedTimeOut": "10000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        })
    }

</script>

</body>
</html>