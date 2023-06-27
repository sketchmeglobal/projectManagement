
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
            <?php
                //echo json_encode($employees);
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <form autocomplete="off" id="form_add_salary" method="post" action="<?=base_url('admin/form-add-salary')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                <h4>Allowance</h4>
                                <div class="form-group ">
                                    <div class="col-lg-3">                                        
                                        <label for="emp_id" class="control-label text-danger">Employee Name *</label>
                                        <select name="emp_id" id="emp_id" class="form-control select2">
                                            <option value="0" >Select Employee</option>
                                            <?php 
                                            if(sizeof($employees) > 0){
                                                foreach($employees as $employee){
                                            ?>
                                            <option value="<?=$employee->emp_id?>"><?=$employee->first_name.' '.$employee->last_name?></option>
                                            <?php 
                                                } 
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="salaryAmount" class="control-label text-danger">Salary Amount *</label>
                                        <input value="0.00" id="salaryAmount" name="salaryAmount" type="number" placeholder="Salary Amount" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="allowanceName1" class="control-label">Allowance Name</label>
                                        <input value="" id="allowanceName1" name="allowanceName1" type="text" placeholder="Allowance Name" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="allowanceAmount1" class="control-label">Allowance Amount</label>
                                        <input value="" id="allowanceAmount1" name="allowanceAmount1" type="text" placeholder="Allowance Amount" class="form-control round-input" />
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="allowanceName2" class="control-label">Allowance Name</label>
                                        <input value="" id="allowanceName2" name="allowanceName2" type="text" placeholder="Allowance Name" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="allowanceAmount2" class="control-label">Allowance Amount</label>
                                        <input value="" id="allowanceAmount2" name="allowanceAmount2" type="text" placeholder="Allowance Amount" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="allowanceName3" class="control-label">Allowance Name</label>
                                        <input value="" id="allowanceName3" name="allowanceName3" type="text" placeholder="Allowance Name" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="allowanceAmount3" class="control-label">Allowance Amount</label>
                                        <input value="" id="allowanceAmount3" name="allowanceAmount3" type="text" placeholder="Allowance Amount" class="form-control round-input" />
                                    </div>  
                                </div>
                                <h4>Deduction</h4>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="loanAmount" class="control-label">Loan Amount</label>
                                        <input value="" id="loanAmount" name="loanAmount" type="text" placeholder="Loan Amount" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="deductionName1" class="control-label">Deduction Name</label>
                                        <input value="" id="deductionName1" name="deductionName1" type="text" placeholder="Deduction Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="deductionAmount1" class="control-label">Deduction Amount</label>
                                        <input value="" id="deductionAmount1" name="deductionAmount1" type="text" placeholder="Deduction Amount" class="form-control round-input" />
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="deductionName2" class="control-label">Deduction Name</label>
                                        <input value="" id="deductionName2" name="deductionName2" type="text" placeholder="Deduction Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="deductionAmount2" class="control-label">Deduction Amount</label>
                                        <input value="" id="deductionAmount2" name="deductionAmount2" type="text" placeholder="Deduction Amount" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="deductionName3" class="control-label">Deduction Name</label>
                                        <input value="" id="deductionName3" name="deductionName3" type="text" placeholder="Deduction Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="deductionAmount3" class="control-label">Deduction Amount</label>
                                        <input value="" id="deductionAmount3" name="deductionAmount3" type="text" placeholder="Deduction Amount" class="form-control round-input" />
                                    </div>  
                                </div>
                                   

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Add Salary</i></button>
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
            username: {
                required: true,
                remote: {
                    url: "<?=base_url('admin/ajax-unique-username')?>",
                    type: "post",
                    data: {
                        username: function() {
                          return $("#username").val();
                        }
                    },
                }
            },            
            user_type:{
                required: true
            },
            pass : {
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
    
    $("#user_type").on('change', function(){
        
         $usertype = $(this).val();
        // console.log($val);
        
        if($usertype == 4){
            
            $(".acc_masters_values").hide();
            $(".offer_values").show();
            
        }else{
            
            $(".acc_masters_values").show();
            $(".offer_values").hide();
            
        }
        
        
        $.ajax({
            url: "<?= base_url('admin/acc_master-on-usertype/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {usertype: $usertype},
            success: function (returnData) {
                
                console.log(returnData);
                
                $("#acc_masters").html("");
                
                if($usertype == 4){
                    
                    $.each(returnData, function (index, itemData) {
                       $str = '<option value="'+itemData.offer_id+'">'+itemData.offer_name + ' ['+ itemData.offer_fz_number +']' +'</option>';
                       $("#offer_values").append($str);
                    });
                    
                    $('#offer_values').select2({
                      placeholder: 'Select an option'
                    });
                    
                }else{
                
                    $.each(returnData, function (index, itemData) {
                       $str = '<option value="'+itemData.am_id+'">'+itemData.name + ' ['+ itemData.am_code +']' +'</option>';
                       $("#acc_masters").append($str);
                    });
                    
                    $('#acc_masters').select2({
                      placeholder: 'Select an option'
                    });
                    
                }
                

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    })
</script>

</body>
</html>