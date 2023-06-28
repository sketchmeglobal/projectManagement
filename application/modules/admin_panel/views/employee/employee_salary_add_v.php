
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
                                            <option value="" >Select Employee</option>
                                            <?php 
                                            if(sizeof($employees) > 0){
                                                foreach($employees as $employee){
                                            ?>
                                            <option value="<?=$employee->emp_id?>" data-loan_amount_remaining="<?=$employee->loan_amount_remaining?>" data-basic_pay="<?=$employee->basic_pay?>"><?=$employee->first_name.' '.$employee->last_name?></option>
                                            <?php 
                                                } 
                                            }
                                            ?>
                                        </select>

                                        <input type="hidden" name="emp_name" id="emp_name" value="">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="basic" class="control-label text-danger">Basic *</label>
                                        <input value="" id="basic" name="basic" type="number" placeholder="Basic" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="hrs" class="control-label">HRA</label>
                                        <input value="0.00" id="hra" name="hra" type="number" placeholder="HRA" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="conveyanceAllowance" class="control-label">Conveyance Allowance</label>
                                        <input value="0.00" id="conveyanceAllowance" name="conveyanceAllowance" type="number" placeholder="Conveyance Allowance" class="form-control round-input" />
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="ProfDevelopmentAllowance" class="control-label">Prof. Development Allowance</label>
                                        <input value="0.00" id="ProfDevelopmentAllowance" name="ProfDevelopmentAllowance" type="number" placeholder="Prof. Development Allowance" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="booksAndPeriodicals" class="control-label">Books and Periodicals</label>
                                        <input value="0.00" id="booksAndPeriodicals" name="booksAndPeriodicals" type="number" placeholder="Books and Periodicals" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="medicalReimbursement" class="control-label">Medical Reimbursement</label>
                                        <input value="0.00" id="medicalReimbursement" name="medicalReimbursement" type="number" placeholder="Medical Reimbursement" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="childEducationAllowance" class="control-label">Child Education Allowance</label>
                                        <input value="0.00" id="childEducationAllowance" name="childEducationAllowance" type="number" placeholder="Child Education Allowance" class="form-control round-input" />
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="PerformancePayAllowance" class="control-label">Performance Pay Allowance</label>
                                        <input value="0.00" id="PerformancePayAllowance" name="PerformancePayAllowance" type="number" placeholder="Performance Pay Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="specialAllowance" class="control-label">Special Allowance</label>
                                        <input value="0.00" id="specialAllowance" name="specialAllowance" type="number" placeholder="Special Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="entertainmentAllowance" class="control-label">Entertainment Allowance</label>
                                        <input value="0.00" id="entertainmentAllowance" name="entertainmentAllowance" type="number" placeholder="Entertainment Allowance" class="form-control round-input" />
                                    </div> 
                                    
                                    <div class="col-lg-3">
                                        <label for="fuelAndMaintenance" class="control-label">Fuel and Maintenance (F&M) Car</label>
                                        <input value="0.00" id="fuelAndMaintenance" name="fuelAndMaintenance" type="number" placeholder="Fuel and Maintenance (F&M) Car" class="form-control round-input" />
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="otherAllowance" class="control-label">Other Allowance</label>
                                        <input value="0.00" id="otherAllowance" name="otherAllowance" type="number" placeholder="Other Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="variablePay" class="control-label">Variable Pay</label>
                                        <input value="0.00" id="variablePay" name="variablePay" type="number" placeholder="Variable Pay" class="form-control round-input" />
                                    </div> 
                                    
                                    <div class="col-lg-3">
                                        <label for="lta_AnnualBenefit" class="control-label">LTA (Annual Benefit)</label>
                                        <input value="0.00" id="lta_AnnualBenefit" name="lta_AnnualBenefit" type="number" placeholder="LTA (Annual Benefit)" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="festivalBonus" class="control-label">Festival Bonus (Annual Benefit)</label>
                                        <input value="0.00" id="festivalBonus" name="festivalBonus" type="number" placeholder="Festival Bonus (Annual Benefit)" class="form-control round-input" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-lg-3">
                                        <label for="medicalInsurancePremium" class="control-label">Medical Insurance Premium</label>
                                        <input value="0.00" id="medicalInsurancePremium" name="medicalInsurancePremium" type="number" placeholder="Medical Insurance Premium(Annual Benefit)" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="arrear" class="control-label">Arrear</label>
                                        <input value="0.00" id="arrear" name="arrear" type="number" placeholder="Arrear" class="form-control round-input" />
                                    </div>  
                                </div>




                                <h4>Deduction</h4>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="employees_PF_PPF" class="control-label">Employee's PF/PPF</label>
                                        <input value="0.00" id="employees_PF_PPF" name="employees_PF_PPF" type="number" placeholder="Employee's PF/PPF" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="employeesESIC" class="control-label">Employees ESIC</label>
                                        <input value="0.00" id="employeesESIC" name="employeesESIC" type="number" placeholder="Employees ESIC" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="professionalTax" class="control-label">Professional Tax</label>
                                        <input value="0.00" id="professionalTax" name="professionalTax" type="number" placeholder="Professional Tax" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="incomeTax" class="control-label">Income Tax</label>
                                        <input value="0.00" id="incomeTax" name="incomeTax" type="number" placeholder="Income Tax" class="form-control round-input" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="ltaDeduction" class="control-label">LTA (Deduction)</label>
                                        <input value="0.00" id="ltaDeduction" name="ltaDeduction" type="number" placeholder="LTA (Deduction)" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="festivalBonusDeduction" class="control-label">Festival Bonus (Deduction)</label>
                                        <input value="0.00" id="festivalBonusDeduction" name="festivalBonusDeduction" type="number" placeholder="Festival Bonus (Deduction)" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="medicalInsurancePremiumDeduct" class="control-label">Medical Insurance Premium</label>
                                        <input value="0.00" id="medicalInsurancePremiumDeduct" name="medicalInsurancePremiumDeduct" type="number" placeholder="Medical Insurance Premium" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="otherDeductions" class="control-label">Other Deductions</label>
                                        <input value="0.00" id="otherDeductions" name="otherDeductions" type="number" placeholder="Other Deductions" class="form-control round-input" />
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="miscDeduction" class="control-label">Misc. Deduction</label>
                                        <input value="0.00" id="miscDeduction" name="miscDeduction" type="number" placeholder="Misc. Deduction" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="loan" class="control-label">Loan</label>
                                        <input value="0.00" id="loan" name="loan" type="number" placeholder="Loan" class="form-control round-input" />
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
    $('#emp_id').on('change', function(){
        $emp_name = $('#emp_id option:selected').text();
        $('#emp_name').val($emp_name);

        $loan_amount_remaining = $('#emp_id option:selected').data('loan_amount_remaining');
        $('#loan').val($loan_amount_remaining);

        $basic_pay = $('#emp_id option:selected').data('basic_pay');
        $('#basic').val($basic_pay);
    })

    //add-item-form validation and submit
    $("#form_add_salary").validate({        
        rules: {
            emp_id: {
                required: true,
            },            
            basic:{
                required: true
            } 
        },
        messages: {

        }
    });
    $('#form_add_salary').ajaxForm({
        beforeSubmit: function () {
            return $("#form_add_salary").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.salary_id) > 0){
                if(obj.type == 'error'){
                    setTimeout(function(){ 
                        window.location.href = '<?=base_url()?>admin/edit-salary/'+obj.salary_id; 
                    }, 3000);
                }else{
                    window.location.href = '<?=base_url()?>admin/edit-salary/'+obj.salary_id;
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