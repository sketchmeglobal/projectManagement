<?php #echo '<pre>', print_r($offer_details), '</pre>'; die;

/*if(isset($offer_details[0])){
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?> | <?=WEBSITE_NAME;?></title>
    <meta name="description" content="<?=$title?>">

    <!--Data Table-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/css/buttons.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css"/>

    <!--Select2-->
    <link href="<?=base_url();?>assets/admin_panel/css/select2.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin_panel/css/select2-bootstrap.css" rel="stylesheet">

    <!--iCheck-->
    <link href="<?=base_url();?>assets/admin_panel/js/icheck/skins/all.css" rel="stylesheet">

    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        text-align: right;
        }

        /* Firefox */
        /*input[type=number] {
            text-align: right;
            -moz-appearance: textfield;
        }  */      
    </style>
</head>

<body class="sticky-header">

<section>
    <!-- sidebar left start (Menu)-->
    <?php $this->load->view('components/left_sidebar'); //left side menu ?>
    <!-- sidebar left end (Menu)-->

    <!-- body content start-->
    <div class="body-content" style="min-height: 850px;">

        <!-- header section start-->
        <?php $this->load->view('components/top_menu'); ?>
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">

            <!-- <div class="row text-enter">
                 <span class="badge badge-right">This is Cloned</span> 
            </div> -->

            <!-- Start project details part -->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading ">
                            Project Details:
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <form id="form_add_offer_details" method="post" action="<?=base_url('admin/form-add-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                <div class="form-group "> 
                                    <div class="col-lg-3">
                                        <label for="product_description" class="control-label">Title</label>
                                        <input type="text" name="product_description" id="product_description" class="form-control">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="product_line_sc" class="control-label">Description</label>
                                        <textarea name="product_line_sc" id="product_line_sc" class="form-control"></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Add">
                                    </div>
                                </div>  
                            </form>

                        </div>
                    </section>
                </div>
            </div>
            <!-- End project details part -->

            <!-- Start Contact part -->
            <div class="row"> 
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Contacts
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <!--Tabs-->
                            <ul id="contact_tabs" class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#cintact_details_list" data-toggle="tab">List</a></li>
                                <li  id="contact_details_add_tab"><a href="#contact_details_add" data-toggle="tab">Add</a></li>
                                <li id="contact_details_edit_tab" class="disabled"><a href="#contact_details_edit" data-toggle="">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="loading_div"><span class="sr-only">Processing...</span>                            
                                <div id="contact_details_list" class="tab-pane fade in active">
                                    <table id="contact_details_table" class="table data-table dataTable">
                                        <thead>
                                        <tr>
                                            <th>Contact Person Name</th>
                                            <th>Organization Name</th>
                                            <th>Email</th>
                                            <th>Phone 1st</th>
                                            <th>Phone 2nd</th>                                            
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        
                                    </table>
                                </div>

                                <div id="contact_details_add" class="tab-pane fade">
                                    <br/>
                                    <div class="form">
                                        <form id="form_add_offer_details" method="post" action="<?=base_url('admin/form-add-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                        <div class="form-group "> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Contact Person Name</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>   
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Organization Name</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>   
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Email</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Phone 1st</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>    
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Phone 2nd</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label">Address</label>
                                                <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Add">
                                            </div>
                                        </div>
                                           
                                        </form>
                                    </div>
                                </div>

                                <div id="contact_details_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">
                                        <form id="form_edit_contact_details" method="post" action="<?=base_url('admin/form-edit-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group "> 
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Contact Person Name</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>   
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Organization Name</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>   
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Email</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Phone 1st</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>    
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Phone 2nd</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label">Address</label>
                                                    <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End Contact part -->
            
            <!-- Start Requirement Gathering Part -->
            <div class="row"> 
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Requirement Gathering
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <!--Tabs-->
                            <ul id="requirement_tabs" class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#req_gather_list" data-toggle="tab">List</a></li>
                                <li  id="req_gather_add_tab"><a href="#req_gather_add" data-toggle="tab">Add</a></li>
                                <li id="req_gather_edit_tab" class="disabled"><a href="#req_gather_edit" data-toggle="">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="loading_div"><span class="sr-only">Processing...</span>                            
                                <div id="req_gather_list" class="tab-pane fade in active">
                                    <table id="req_gather_details_table" class="table data-table dataTable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Attachment</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        
                                    </table>
                                </div>

                                <div id="req_gather_add" class="tab-pane fade">
                                    <br/>
                                    <div class="form">
                                        <form id="form_add_offer_details" method="post" action="<?=base_url('admin/form-add-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                        <div class="form-group "> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Title</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label">Description</label>
                                                <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="" class="control-label">Attachment</label>
                                                <input type="file" name="userfile[]" id="userfile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Add">
                                            </div>
                                        </div>
                                           
                                        </form>
                                    </div>
                                </div>

                                <div id="req_gather_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">
                                        <form id="form_edit_contact_details" method="post" action="<?=base_url('admin/form-edit-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group "> 
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Title</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label">Description</label>
                                                    <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="" class="control-label">Attachment</label>
                                                    <input type="file" name="userfile[]" id="userfile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End Requirement Gathering Part -->
            
            <!-- Start Requirement Gathering Part -->
            <div class="row"> 
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Requirement Gathering
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <!--Tabs-->
                            <ul id="requirement_tabs" class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#req_gather_list" data-toggle="tab">List</a></li>
                                <li  id="req_gather_add_tab"><a href="#req_gather_add" data-toggle="tab">Add</a></li>
                                <li id="req_gather_edit_tab" class="disabled"><a href="#req_gather_edit" data-toggle="">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="loading_div"><span class="sr-only">Processing...</span>                            
                                <div id="req_gather_list" class="tab-pane fade in active">
                                    <table id="req_gather_details_table" class="table data-table dataTable">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Attachment</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        
                                    </table>
                                </div>

                                <div id="req_gather_add" class="tab-pane fade">
                                    <br/>
                                    <div class="form">
                                        <form id="form_add_offer_details" method="post" action="<?=base_url('admin/form-add-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                        <div class="form-group "> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Title</label>
                                                <input type="text" name="product_description" id="product_description" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label">Description</label>
                                                <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="" class="control-label">Attachment</label>
                                                <input type="file" name="userfile[]" id="userfile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Add">
                                            </div>
                                        </div>
                                           
                                        </form>
                                    </div>
                                </div>

                                <div id="req_gather_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">
                                        <form id="form_edit_contact_details" method="post" action="<?=base_url('admin/form-edit-offer-details')?>" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group "> 
                                                <div class="col-lg-3">
                                                    <label for="product_description" class="control-label">Title</label>
                                                    <input type="text" name="product_description" id="product_description" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label">Description</label>
                                                    <textarea name="product_line_po" id="product_line_po" class="form-control"></textarea>
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="" class="control-label">Attachment</label>
                                                    <input type="file" name="userfile[]" id="userfile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End Requirement Gathering Part -->
            
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
<!--Data Table-->
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/js/responsive.bootstrap.min.js"></script>
<!--data table init-->
<script src="<?=base_url()?>assets/admin_panel/js/data-table-init.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    
    $(document).ready(function() {

        //Contact Detail Table
        $('#contact_details_table').DataTable( {
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-contact-details-table-data')?>",
                "type": "POST",
                "dataType": "json",
                data: {
                    offer_id: function () {
                        return $("#offer_id").val();
                    },
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "ContactPersonName" },
                { "data": "OrganizationName" },
                { "data": "Email" },
                { "data": "Phone1st" },
                { "data": "Phone2nd" },
                { "data": "Address" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0,1,2,3,4,5,6],
                "orderable": false,
            }]
        });

        //Requirement Gather
        $('#req_gather_details_table').DataTable( {
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-requirementgather-details-table-data')?>",
                "type": "POST",
                "dataType": "json",
                data: {
                    offer_id: function () {
                        return $("#offer_id").val();
                    },
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "Title" },
                { "data": "Description" },
                { "data": "Attachment" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0,1,2,3],
                "orderable": false,
            }]
        });



    } );

    // HEADER 
    $("#form_edit_offer").validate({
        rules: {
            offer_number: {
                required: true,
                remote: {
                    url: "<?=base_url('admin/ajax-unique-offer-number-edit')?>",
                    type: "post",
                    data: {
                        offer_number: function() {
                          return $("#offer_number").val();
                        },
                        offer_id: function(){
                          return $("#offer_id").val();  
                        }
                    },
                },
            },
            acc_master_id: {
                required: true
            },
            currencies: {
                required: true
            },
            resources: {
                required: true
            },
            incoterms: {
                required: true
            },
            offer_date: {
                required: true
            }
        },
        messages: {

        }
    });
    $('#form_edit_offer').ajaxForm({
        beforeSubmit: function () {
            return $("#form_edit_offer").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
        }
    });

    // ADD
    $("#form_add_offer_details").validate({
        rules: {
            product_id: {
                required: true,
            },
            product_price: {
                required: true,
            },
            quantity_offered: {
                required: true,
            },
            unit_id: {
                required: true, 
            }
        },
        messages: {

        }
    });
    $('#form_add_offer_details').ajaxForm({
        beforeSubmit: function () {
			$('#loading_div').show();
			$('#offer_details_submit').prop( "disabled", true );
            return $("#form_add_offer_details").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            // console.log('RD => ' + returnData);
            obj = JSON.parse(returnData);
			$('#loading_div').hide();
			$('#offer_details_submit').prop( "disabled", false );

            /*$offer_total_amount = parseFloat(obj.total_amount).toFixed(2);
            $offer_total_quantity = parseFloat(obj.total_qnty).toFixed(2);
            $("#offer_total_amount").text($offer_total_amount);
            $("#offer_total_quantity").text($offer_total_quantity);*/

             $('#form_add_offer_details')[0].reset(); //reset form
             $("#form_add_offer_details select").select2("val", ""); //reset all select2 fields
             // $('#form_add_offer_details :radio').iCheck('update'); //reset all iCheck fields
             $("#form_add_offer_details").validate().resetForm(); //reset validation
            notification(obj);
            // $("#lc_id").select2('open');
            //refresh table
            $('#offer_details_table').DataTable().ajax.reload();
            
        }
    });

    $("#product_price, #quantity_offered").blur(function(){

        $product_price = $("#product_price").val();
        $quantity_offered = $("#quantity_offered").val();
        $val = parseFloat($product_price) * parseFloat($quantity_offered);
        $("#total_value").val($val.toFixed(2));
    });

    // EDIT
    $("#offer_details_table").on('click', '.offer_details_edit_btn', function() {
        $od_id = $(this).data('od_id');
        // alert($od_id);
        $("#offer_details_id_edit").val($od_id);

        $.ajax({
            url: "<?= base_url('admin/fetch-offer-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {pk: $od_id},
            success: function (returnData) {
                console.log(returnData);                
                data = returnData[0];

                $("#offer_details_trader_id_edit").val(data.od_id);

                $("#product_id_edit").val(data.product_id).trigger('change');
                $("#product_description_edit").val(data.product_description).trigger('change');
                $("#product_price_edit").val(data.product_price).trigger('change');
                $("#freezing_method_edit").val(data.freezing_method_id).trigger('change');
                $("#freezing_id_edit").val(data.freezing_id).trigger('change');
                $("#primary_packing_type_id_edit").val(data.primary_packing_type_id).trigger('change');
                $("#secondary_packing_type_id_edit").val(data.secondary_packing_type_id).trigger('change');
                $("#packing_size_id_edit").val(data.packing_size_id).trigger('change');
                $("#glazing_id_edit").val(data.glazing_id).trigger('change');
                $("#block_id_edit").val(data.block_id).trigger('change');
                $("#size_id_edit").val(data.size_id).trigger('change');
                $("#size_before_glaze_edit").val(data.size_before_glaze).trigger('change');
                $("#pieces_edit").val(data.pieces).trigger('change');

                $("#product_line_po_edit").val(data.product_line);
                
                $("#product_line_sc_edit").val(data.product_line_sc);
                
                
                $("#gross_weight_edit").val(data.gross_weight);
                
                
                
                


                $("#grade_edit").val(data.grade);
                $("#size_after_glaze_edit").val(data.size_after_glaze).trigger('change');
                $("#quantity_offered_edit").val(data.quantity_offered).trigger('change');
                $("#unit_id_edit").val(data.unit_id).trigger('change');
                $("#total_value_edit").val((parseFloat(data.product_price) * parseFloat(data.quantity_offered)).toFixed(2)).trigger('change');
                $("#cartons_offered_edit").val(data.cartons_offered).trigger('change');
                $("#comment_edit").val(data.comment).trigger('change');

                $('a[href="#offer_details_edit"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    });

    $("#form_edit_offer_details").validate({
        rules: {
             product_id_edit: {
                required: true,
            },
            product_price_edit: {
                required: true,
            },
            quantity_offered_edit: {
                required: true,
            },
            unit_id_edit: {
                required: true, 
            }
        },
        messages: {
            
        }
    });

    $('#form_edit_offer_details').ajaxForm({
        beforeSubmit: function () {
            return $("#form_edit_offer_details").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log('RD => ' + returnData);
            obj = JSON.parse(returnData);

            $('#form_edit_offer_details')[0].reset(); //reset form
            $("#form_edit_offer_details select").select2("val", ""); 
            $("#form_edit_offer_details").validate().resetForm(); 

            notification(obj);
            
            //refresh table
            $('#offer_details_table').DataTable().ajax.reload();
            
        }
    });

    $("#product_price_edit, #quantity_offered_edit").blur(function(){

        $product_price = $("#product_price_edit").val();
        $quantity_offered = $("#quantity_offered_edit").val();
        $val = parseFloat($product_price) * parseFloat($quantity_offered);
        $("#total_value_edit").val($val.toFixed(2));
    });    

    // EXPORT
    $("#offer_details_table").on('click', '.offer_details_export_btn', function() {
        
        $od_id = $(this).data('od_id');
        
        $.ajax({
            url: "<?= base_url('admin/fetch-offer-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {pk: $od_id},
            success: function (returnData) {
                console.log(returnData);                
                data = returnData[0];

                $("#product_id_export").val(data.product_id).trigger('change');
                $("#product_description_export").val(data.product_description).trigger('change');
                $("#product_price_export").val(data.product_price).trigger('change');
                $("#freezing_id_export").val(data.freezing_id).trigger('change');
                $("#freezing_method_export").val(data.freezing_method_id).trigger('change');
                $("#primary_packing_type_id_export").val(data.primary_packing_type_id).trigger('change');
                $("#secondary_packing_type_id_export").val(data.secondary_packing_type_id).trigger('change');
                $("#packing_size_id_export").val(data.packing_size_id).trigger('change');
                $("#glazing_id_export").val(data.glazing_id).trigger('change');
                $("#block_id_export").val(data.block_id).trigger('change');
                $("#size_id_export").val(data.size_id).trigger('change');
                $("#size_before_glaze_export").val(data.size_before_glaze).trigger('change');
                $("#size_after_glaze_export").val(data.size_after_glaze).trigger('change');
                $("#quantity_offered_export").val(data.quantity_offered).trigger('change');
                $("#pieces_export").val(data.pieces).trigger('change');

                $("#product_line_po_export").val(data.product_line);

                $("#product_line_sc_export").val(data.product_line_sc);
                
                $("#gross_weight_export").val(data.gross_weight);
                
                


                $("#grade_export").val(data.grade);
                $("#unit_id_export").val(data.unit_id).trigger('change');
                $("#total_value_export").val((parseFloat(data.product_price) * parseFloat(data.quantity_offered)).toFixed(2)).trigger('change');
                $("#cartons_offered_export").val(data.cartons_offered).trigger('change');
                $("#comment_export").val(data.comment).trigger('change');

                $('a[href="#offer_details_export"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    });

    $("#form_export_offer_details").validate({
        rules: {

            offer_id_export: {
                required: true,
            },
            product_id_export: {
                required: true,
            },
            product_price_export: {
                required: true,
            },
            quantity_offered_export: {
                required: true,
            },
            unit_id_export: {
                required: true, 
            }
        },
        messages: {
            
        }
    });

    $('#form_export_offer_details').ajaxForm({
        beforeSubmit: function () {
            return $("#form_export_offer_details").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            console.log('RD => ' + returnData);
            obj = JSON.parse(returnData);

            $('#form_export_offer_details')[0].reset(); //reset form
            $("#form_export_offer_details select").select2("val", ""); 
            $("#form_export_offer_details").validate().resetForm(); 

            notification(obj);
            
            //refresh table
            $('#offer_details_table').DataTable().ajax.reload();
            
        }
    });

    $("#product_price_export, #quantity_offered_export").blur(function(){

        $product_price = $("#product_price_export").val();
        $quantity_offered = $("#quantity_offered_export").val();
        $val = parseFloat($product_price) * parseFloat($quantity_offered);
        $("#total_value_export").val($val.toFixed(2));
    });

    // DELETE
    
    $(document).on('click', '.delete', function(){
        $this = $(this);
        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-offer-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {pk: $pk},
                success: function (returnData) {
                    console.log(returnData);
                    $this.closest('tr').remove();
                    
                    // obj = JSON.parse(returnData);
                    notification(returnData);
                    //refresh table
                    $("#offer_details_table").DataTable().ajax.reload();

                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });
    
    $(document).on('click', '.delete-file', function(){
        $this = $(this);
        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).data('upload_id');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-offer-files/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {pk: $pk},
                success: function (returnData) {
                    console.log(returnData);
                    // $this.closest('a').remove();
                    
                    // obj = JSON.parse(returnData);
                    notification(returnData);
                    

                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });

    // Clone area

    $(document).on('click', '.offer_details_clone_btn', function(){
        $this = $(this);
        $od_id = $(this).data('od_id');
        
        $.ajax({
            url: "<?= base_url('admin/fetch-offer-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {pk: $od_id},
            success: function (returnData) {
                console.log(returnData);                
                data = returnData[0];

                $("#product_id").val(data.product_id).trigger('change');
                $("#product_price").val(data.product_price).trigger('change');
                $("#freezing_id").val(data.freezing_id).trigger('change');
                $("#freezing_method_id").val(data.freezing_method_id).trigger('change');
                $("#primary_packing_type_id").val(data.primary_packing_type_id).trigger('change');
                $("#secondary_packing_type_id").val(data.secondary_packing_type_id).trigger('change');
                $("#packing_size_id").val(data.packing_size_id).trigger('change');
                $("#glazing_id").val(data.glazing_id).trigger('change');
                $("#block_id").val(data.block_id).trigger('change');
                $("#size_id").val(data.size_id).trigger('change');
                $("#size_before_glaze").val(data.size_before_glaze).trigger('change');
                $("#size_after_glaze").val(data.size_after_glaze).trigger('change');
                $("#quantity_offered").val(data.quantity_offered).trigger('change');
                $("#unit_id").val(data.unit_id).trigger('change');
                $("#total_value").val((parseFloat(data.product_price) * parseFloat(data.quantity_offered)).toFixed(2)).trigger('change');
                $("#pieces").val(data.pieces).trigger('change');
                $("#grade").val(data.grade).trigger('change');
                $("#cartons_offered").val(data.cartons_offered).trigger('change');
                $("#comment").val(data.comment).trigger('change');

                $('a[href="#offer_details_add"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });        
    });
    
    $sacc = $("#selected_acc_master_id").val().split(',');
    $('#acc_master_id').select2('val', $sacc).change();
    // Destination country show
    $sdc = $("#selected_destination_countries").val().split(',');
    $('#destination_c_id').select2('val', $sdc).change();


    // Pricing section

    $(document).on('click', '.offer_details_pricing_btn', function(){
        
        $odid = $(this).data('od_id');
        $ofid = $(this).data('offer_id');

        $.confirm({

            title: 'Set Buying / Selling Price',
            content: 'Choose pricing methods from the below options',
            buttons: {
                buy: {
                    text: 'Buying Price',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        window.open("<?= base_url() ?>admin/offer-buying-price/"+ $ofid + "/" + $odid, "_blank");
                    }
                },
                sell: {
                    text: 'Selling Price',
                    btnClass: 'btn-warning',
                    keys: ['enter', 'shift'],
                    action: function(){
                        window.open("<?= base_url() ?>admin/offer-selling-price/"+ $ofid + "/" + $odid, "_blank");
                    }
                },

                cancel: function () {}

            }

        });
    });


    

    // toastr notification
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
            "hideDuration": "5000",
            "timeOut": "5000",
            "extendedTimeOut": "7000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        })
    }


   
</script>

</body>
</html>
