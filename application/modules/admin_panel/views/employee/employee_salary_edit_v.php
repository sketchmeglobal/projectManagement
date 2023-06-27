
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
                        <?php
                            //echo json_encode($salary_details);
                            $all_allowance = json_decode($salary_details[0]->all_allowance);
                            $all_deduction = json_decode($salary_details[0]->all_deduction);

                            //echo 'emp_name: '. $salary_details[0]->emp_name;
                        ?>    
                        
                        <form autocomplete="off" id="form_edit_salary" method="post" action="<?=base_url('admin/form-edit-salary')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
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
                                            <option value="<?=$employee->emp_id?>" <?php if($salary_details[0]->emp_id == $employee->emp_id){?> selected <?php } ?>><?=$employee->first_name.' '.$employee->last_name?></option>
                                            <?php 
                                                } 
                                            }
                                            ?>
                                        </select>

                                        <input type="hidden" name="emp_name" id="emp_name" value="<?=$salary_details[0]->emp_name?>">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="basic" class="control-label text-danger">Basic *</label>
                                        <input value="<?=$all_allowance->basic?>" id="basic" name="basic" type="number" placeholder="Basic" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="hra" class="control-label">HRA</label>
                                        <input value="<?=$all_allowance->hra?>" id="hra" name="hra" type="number" placeholder="HRA" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="conveyanceAllowance" class="control-label">Conveyance Allowance</label>
                                        <input value="<?=$all_allowance->conveyanceAllowance?>" id="conveyanceAllowance" name="conveyanceAllowance" type="number" placeholder="Conveyance Allowance" class="form-control round-input" />
                                    </div>                              
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="ProfDevelopmentAllowance" class="control-label">Prof. Development Allowance</label>
                                        <input value="<?=$all_allowance->ProfDevelopmentAllowance?>" id="ProfDevelopmentAllowance" name="ProfDevelopmentAllowance" type="number" placeholder="Prof. Development Allowance" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="booksAndPeriodicals" class="control-label">Books and Periodicals</label>
                                        <input value="<?=$all_allowance->booksAndPeriodicals?>" id="booksAndPeriodicals" name="booksAndPeriodicals" type="number" placeholder="Books and Periodicals" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="medicalReimbursement" class="control-label">Medical Reimbursement</label>
                                        <input value="<?=$all_allowance->medicalReimbursement?>" id="medicalReimbursement" name="medicalReimbursement" type="number" placeholder="Medical Reimbursement" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="childEducationAllowance" class="control-label">Child Education Allowance</label>
                                        <input value="<?=$all_allowance->childEducationAllowance?>" id="childEducationAllowance" name="childEducationAllowance" type="number" placeholder="Child Education Allowance" class="form-control round-input" />
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="PerformancePayAllowance" class="control-label">Performance Pay Allowance</label>
                                        <input value="<?=$all_allowance->PerformancePayAllowance?>" id="PerformancePayAllowance" name="PerformancePayAllowance" type="number" placeholder="Performance Pay Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="specialAllowance" class="control-label">Special Allowance</label>
                                        <input value="<?=$all_allowance->specialAllowance?>" id="specialAllowance" name="specialAllowance" type="number" placeholder="Special Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="entertainmentAllowance" class="control-label">Entertainment Allowance</label>
                                        <input value="<?=$all_allowance->entertainmentAllowance?>" id="entertainmentAllowance" name="entertainmentAllowance" type="number" placeholder="Entertainment Allowance" class="form-control round-input" />
                                    </div> 
                                    
                                    <div class="col-lg-3">
                                        <label for="fuelAndMaintenance" class="control-label">Fuel and Maintenance (F&M) Car</label>
                                        <input value="<?=$all_allowance->fuelAndMaintenance?>" id="fuelAndMaintenance" name="fuelAndMaintenance" type="number" placeholder="Fuel and Maintenance (F&M) Car" class="form-control round-input" />
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="otherAllowance" class="control-label">Other Allowance</label>
                                        <input value="<?=$all_allowance->otherAllowance?>" id="otherAllowance" name="otherAllowance" type="number" placeholder="Other Allowance" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="variablePay" class="control-label">Variable Pay</label>
                                        <input value="<?=$all_allowance->variablePay?>" id="variablePay" name="variablePay" type="number" placeholder="Variable Pay" class="form-control round-input" />
                                    </div> 
                                    
                                    <div class="col-lg-3">
                                        <label for="lta_AnnualBenefit" class="control-label">LTA (Annual Benefit)</label>
                                        <input value="<?=$all_allowance->lta_AnnualBenefit?>" id="lta_AnnualBenefit" name="lta_AnnualBenefit" type="number" placeholder="LTA (Annual Benefit)" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="festivalBonus" class="control-label">Festival Bonus (Annual Benefit)</label>
                                        <input value="<?=$all_allowance->festivalBonus?>" id="festivalBonus" name="festivalBonus" type="number" placeholder="Festival Bonus (Annual Benefit)" class="form-control round-input" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div class="col-lg-3">
                                        <label for="medicalInsurancePremium" class="control-label">Medical Insurance Premium</label>
                                        <input value="<?=$all_allowance->medicalInsurancePremium?>" id="medicalInsurancePremium" name="medicalInsurancePremium" type="number" placeholder="Medical Insurance Premium(Annual Benefit)" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="arrear" class="control-label">Arrear</label>
                                        <input value="<?=$all_allowance->arrear?>" id="arrear" name="arrear" type="number" placeholder="Arrear" class="form-control round-input" />
                                    </div>  
                                </div>




                                <h4>Deduction</h4>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="employees_PF_PPF" class="control-label">Employee's PF/PPF</label>
                                        <input value="<?=$all_deduction->employees_PF_PPF?>" id="employees_PF_PPF" name="employees_PF_PPF" type="number" placeholder="Employee's PF/PPF" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="employeesESIC" class="control-label">Employees ESIC</label>
                                        <input value="<?=$all_deduction->employeesESIC?>" id="employeesESIC" name="employeesESIC" type="number" placeholder="Employees ESIC" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="professionalTax" class="control-label">Professional Tax</label>
                                        <input value="<?=$all_deduction->professionalTax?>" id="professionalTax" name="professionalTax" type="number" placeholder="Professional Tax" class="form-control round-input" />
                                    </div>  

                                    <div class="col-lg-3">
                                        <label for="incomeTax" class="control-label">Income Tax</label>
                                        <input value="<?=$all_deduction->incomeTax?>" id="incomeTax" name="incomeTax" type="number" placeholder="Income Tax" class="form-control round-input" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="ltaDeduction" class="control-label">LTA (Deduction)</label>
                                        <input value="<?=$all_deduction->ltaDeduction?>" id="ltaDeduction" name="ltaDeduction" type="number" placeholder="LTA (Deduction)" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="festivalBonusDeduction" class="control-label">Festival Bonus (Deduction)</label>
                                        <input value="<?=$all_deduction->festivalBonusDeduction?>" id="festivalBonusDeduction" name="festivalBonusDeduction" type="number" placeholder="Festival Bonus (Deduction)" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="medicalInsurancePremiumDeduct" class="control-label">Medical Insurance Premium</label>
                                        <input value="<?=$all_deduction->medicalInsurancePremiumDeduct?>" id="medicalInsurancePremiumDeduct" name="medicalInsurancePremiumDeduct" type="number" placeholder="Medical Insurance Premium" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="otherDeductions" class="control-label">Other Deductions</label>
                                        <input value="<?=$all_deduction->otherDeductions?>" id="otherDeductions" name="otherDeductions" type="number" placeholder="Other Deductions" class="form-control round-input" />
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="miscDeduction" class="control-label">Misc. Deduction</label>
                                        <input value="<?=$all_deduction->miscDeduction?>" id="miscDeduction" name="miscDeduction" type="number" placeholder="Misc. Deduction" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="loan" class="control-label">Loan</label>
                                        <input value="<?=$all_deduction->loan?>" id="loan" name="loan" type="number" placeholder="Loan" class="form-control round-input" />
                                    </div>  
                                </div>
                                   

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="salary_id" id="salary_id" value="<?=$salary_details[0]->salary_id?>">
                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Update Salary</i></button>
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
    $("#form_edit_salary").validate({
        
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
    $('#form_edit_salary').ajaxForm({
        beforeSubmit: function () {
            return $("#form_edit_salary").valid(); // TRUE when form is valid, FALSE will cancel submit
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