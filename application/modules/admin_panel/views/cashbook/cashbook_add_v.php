
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
                            <form autocomplete="off" id="form_add_cashbook" method="post" action="<?=base_url('admin/form-add-cashbook')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                
                                <div class="form-group ">
                                    <div class="col-lg-4">
                                        <label for="cb_entry_date" class="control-label text-danger">Date *</label>
                                        <input value="" id="cb_entry_date" name="cb_entry_date" type="date" class="form-control round-input" />
                                    </div>

                                    <div class="col-lg-4">                                        
                                        <label for="receive_payment" class="control-label text-danger">Receive/Payment *</label>
                                        <select name="receive_payment" id="receive_payment" class="form-control select2">
                                            <option value="" >Select</option>
                                            <option value="1">Receive</option>
                                            <option value="2">Payment</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="cb_amount" class="control-label text-danger">Amount *</label>
                                        <input value="" id="cb_amount" name="cb_amount" type="number" class="form-control round-input" />
                                    </div>                              
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="cb_narration" class="control-label text-danger">Narration *</label>
                                        <input value="" id="cb_narration" name="cb_narration" type="text" class="form-control round-input" />
                                    </div>                                                                        
                                </div>    

                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"> Add </i></button>
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
    $("#form_add_cashbook").validate({        
        rules: {
            cb_entry_date: {
                required: true
            },            
            receive_payment:{
                required: true
            },
            cb_amount : {
                required: true
            },
            cb_narration : {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#form_add_cashbook').ajaxForm({
        beforeSubmit: function () {
            return $("#form_add_cashbook").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.insert_id) > 0){
                if(obj.type == 'error'){
                    setTimeout(function(){ 
                        window.location.href = '<?=base_url()?>admin/edit-cashbook/'+obj.insert_id; 
                        }, 3000);
                }else{
                    window.location.href = '<?=base_url()?>admin/edit-cashbook/'+obj.insert_id;
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