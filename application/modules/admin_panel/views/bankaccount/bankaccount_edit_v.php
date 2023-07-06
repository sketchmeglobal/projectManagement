
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
                            
                        <form autocomplete="off" id="form_edit_bank_account" method="post" action="<?=base_url('admin/form-edit-bank-account')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                  <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="bank_name" class="control-label">Bank Name</label>
                                        <input value="<?=$bankaccount_details[0]->bank_name?>" id="bank_name" name="bank_name" type="text" placeholder="Bank Name" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bank_address" class="control-label">Address</label>
                                        <textarea id="bank_address" name="bank_address" placeholder="Address" class="form-control round-input" ><?=$bankaccount_details[0]->bank_address?></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="bank_account_no" class="control-label">Account No</label>
                                        <input value="<?=$bankaccount_details[0]->bank_account_no?>" id="bank_account_no" name="bank_account_no" type="text" placeholder="Account No" class="form-control round-input" />
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="bank_ifs_code" class="control-label">IFSC Code</label>
                                        <input value="<?=$bankaccount_details[0]->bank_ifs_code?>" id="bank_ifs_code" name="bank_ifs_code" type="text" placeholder="IFSC Code" class="form-control round-input" />
                                    </div>  
                                </div> 

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="bank_micr_code" class="control-label">MICR Code</label>
                                        <input value="<?=$bankaccount_details[0]->bank_micr_code?>" id="bank_micr_code" name="bank_micr_code" type="text" placeholder="MICR Code" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="bank_branch_code" class="control-label">Branch Code</label>
                                        <input value="<?=$bankaccount_details[0]->bank_branch_code?>" type="text" id="bank_branch_code" name="bank_branch_code" placeholder="Branch Code" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-3">
                                        <input type="hidden" name="ba_id" id="ba_id" value="<?=$bankaccount_details[0]->ba_id?>">
                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Update Bank</i></button>
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
    $("#form_edit_bank_account").validate({
        
        rules: {
            bank_name: {
                required: true
            },            
            bank_account_no:{
                required: true
            },
            bank_ifs_code : {
                required: true
            } ,
            bank_branch_code : {
                required: true
            } 
        },
        messages: {

        }
    });
    $('#form_edit_bank_account').ajaxForm({
        beforeSubmit: function () {
            return $("#form_edit_bank_account").valid(); // TRUE when form is valid, FALSE will cancel submit
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