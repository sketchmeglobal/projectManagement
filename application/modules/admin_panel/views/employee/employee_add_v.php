
<?php
// print_r($buyer_details);die;
?>
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
                            <form autocomplete="off" id="form_add_employee" method="post" action="<?=base_url('admin/form-add-employee')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                
                                <div class="form-group ">
                                    <div class="col-lg-3">                                        
                                        <label for="emp_type" class="control-label text-danger">Employee Type *</label>
                                        <select name="emp_type" id="emp_type" class="form-control select2">
                                            <option value="" >Select Employee Type</option>
                                            <option value="1">Permanent</option>
                                            <option value="2">Part Timer</option>
                                            <option value="3">Freelancer</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">                                        
                                        <label for="emp_desig" class="control-label text-danger">Employee Designation *</label>
                                        <select name="emp_desig" id="emp_desig" class="form-control select2">
                                            <option value="" >Select Employee Designation</option>
                                            <option value="1">Designer</option>
                                            <option value="2">Developer</option>
                                            <option value="3">Full Stack Developer</option>
                                            <option value="4">Sr. Designer</option>
                                            <option value="5">Sr. Developer</option>
                                            <option value="6">Team Lead</option>
                                            <option value="7">Project Mgr.</option>
                                            <option value="8">Manager</option>
                                            <option value="9">Director</option>
                                            <option value="10">Managing Director</option>
                                            <option value="11">Accounts & project coordinator</option>
                                            <option value="12">Business Developer</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="first_name" class="control-label">First Name</label>
                                        <input value="" id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="last_name" class="control-label">Last Name</label>
                                        <input value="" id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control round-input" />
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="email_id" class="control-label">Email ID</label>
                                        <input value="" id="email_id" name="email_id" type="email" placeholder="Email ID" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="ph_number" class="control-label">Mobile Number</label>
                                        <input value="" id="ph_number" name="ph_number" type="tel" placeholder="Mobile Number" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="active_loan" class="control-label">Active Loan Amount</label>
                                        <input value="" id="active_loan" name="active_loan" type="number" placeholder="Active Loan Amount" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="loan_duration" class="control-label">Loan Duration(in month)</label>
                                        <input value="" id="loan_duration" name="loan_duration" type="number" placeholder="Loan Duration" class="form-control round-input" />
                                    </div>  
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="basic_pay" class="control-label">Basic Pay</label>
                                        <input value="" id="basic_pay" name="basic_pay" type="number" placeholder="Basic Pay" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="last_incriment_date" class="control-label">Last Incriment Date</label>
                                        <input value="" id="last_incriment_date" name="last_incriment_date" type="date" placeholder="Loan Duration" class="form-control round-input" />
                                    </div>
                                     
                                    <div class="col-lg-3">
                                        <label for="" class="control-label">Employee Photo</label>
                                        <input type="file" name="employeefile" id="employeefile" accept=".jpg,.jpeg,.png,.bmp" class="file">
                                    </div>                                                                        
                                </div>    

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Add Employee</i></button>
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
    $("#form_add_employee").validate({        
        rules: {
            emp_type: {
                required: true
            },            
            emp_desig:{
                required: true
            },
            first_name : {
                required: true
            } ,
            basic_pay : {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#form_add_employee').ajaxForm({
        beforeSubmit: function () {
            return $("#form_add_employee").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.insert_id) > 0){
                if(obj.type == 'error'){
                    setTimeout(function(){ 
                        window.location.href = '<?=base_url()?>admin/edit-employee/'+obj.insert_id; 
                        }, 3000);
                }else{
                    window.location.href = '<?=base_url()?>admin/edit-employee/'+obj.insert_id;
                }            	
			}
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