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

<?php
    //echo json_encode($project_description);
    if(sizeof($project_description) > 0){
        $title = $project_description->projectDetail->title;
        $description = $project_description->projectDetail->description;
    }else{
        $title = '';
        $description = '';
    }
?>

<body class="sticky-header">

<section>
    <!-- sidebar left start (Menu)-->
    <?php $this->load->view('components/left_sidebar'); //left side menu ?>
    <!-- sidebar left end (Menu)-->

    <!-- body content start-->
    <div class="body-content" style="min-height: 1850px;">

        <!-- header section start-->
        <?php $this->load->view('components/top_menu'); ?>
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="myLoading"><span class="sr-only">Processing...</span>
        </div>
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
                            <!-- <form id="form_add_offer_details" method="post" action="<?=base_url('admin/form-add-offer-details')?>" class="cmxform form-horizontal tasi-form"> -->
                                <div class="form-group "> 
                                    <div class="col-lg-4">
                                        <label for="project_title" class="control-label">Title</label>
                                        <input type="text" name="project_title" id="project_title" class="form-control" value="<?=$title?>">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="project_description" class="control-label">Description</label>
                                        <textarea name="project_description" id="project_description" class="form-control"><?=$description?></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <?php
                                        if($project_id > 0){
                                            $btn_txt = 'Update';
                                        }else{
                                            $btn_txt = 'Add';
                                        }
                                        ?>
                                        <input type="submit" name="project_details_submit" class="btn btn-success text-center" id="project_details_submit" value="<?=$btn_txt?>">
                                        <input type="hidden" value="<?=$project_id?>" name="project_id" id="project_id">
                                    </div>
                                </div>  
                            <!-- </form> -->

                        </div>
                    </section>
                </div>
            </div>
            <!-- End project details part -->

            <!-- Start client details part -->
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading ">
                            Client Details:
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <form id="form_add_client_details" method="post" action="<?=base_url('admin/form-add-client-details')?>" class="cmxform form-horizontal tasi-form">
                                <div class="form-group "> 
                                    <div class="col-lg-3">
                                        <label for="account_name" class="control-label">Organization Name</label>
                                        <input type="text" name="account_name" id="account_name" class="form-control" value="<?=$account_name?>">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="account_address1" class="control-label">Address 1</label>
                                        <textarea name="account_address1" id="account_address1" class="form-control"><?=$account_address1?></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="account_address2" class="control-label">Address 2</label>
                                        <textarea name="account_address2" id="account_address2" class="form-control"><?=$account_address2?></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="account_gst_no" class="control-label">GST No</label>
                                        <input type="text" name="account_gst_no" id="account_gst_no" class="form-control" value="<?=$account_gst_no?>">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="account_telephone" class="control-label">Phone No</label>
                                        <input type="text" name="account_telephone" id="account_telephone" class="form-control" value="<?=$account_telephone?>">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="cbill_payment_mode" class="control-label">Payment Mode</label>
                                        <input type="text" name="cbill_payment_mode" id="cbill_payment_mode" class="form-control" value="<?=$cbill_payment_mode?>">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="important_note" class="control-label">Note</label>
                                        <textarea name="important_note" id="important_note" class="form-control"><?=$important_note?></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <label for="other_client_details" class="control-label">Others</label>
                                        <textarea name="other_client_details" id="other_client_details" class="form-control"><?=$other_client_details?></textarea>
                                    </div> 

                                    <div class="col-lg-3 mt-3">
                                        <?php
                                        if($project_id > 0){
                                            $btn_txt = 'Update';
                                        }else{
                                            $btn_txt = 'Add';
                                        }
                                        ?>
                                        <input type="submit" name="client_details_submit" class="btn btn-success text-center" id="client_details_submit" value="<?=$btn_txt?>">
                                        <input type="hidden" value="<?=$project_id?>" name="cli_project_id" id="cli_project_id">
                                    </div>
                                </div>  
                            <!-- </form> -->

                        </div>
                    </section>
                </div>
            </div>
            <!-- End client details part -->

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
                                <li class="active"><a href="#contact_details_list" data-toggle="tab">List</a></li>
                                <li  id="contact_details_add_tab"><a href="#contact_details_add" data-toggle="tab">Add</a></li>
                                <li id="contact_details_edit_tab" class="disabled" ><a href="#contact_details_edit" data-toggle="tab">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="loading_div"><span class="sr-only">Processing...</span>                            
                                <div id="contact_details_list" class="tab-pane fade in active">
                                    <table id="contact_details_table" class="table data-table dataTable" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Contact Person Name</th>
                                            <th>Organization Name</th>
                                            <th>Email</th>
                                            <th>Phone (Primary)</th>
                                            <th>Phone (Alternative)</th>                                            
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
                                    <form autocomplete="off" id="add_contact_form" method="post" action="<?=base_url('admin/form-add-contact')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                        <div class="form-group "> 
                                            <div class="col-lg-3">
                                                <label for="cont_person_name" class="control-label">Contact Person Name</label>
                                                <input type="text" name="cont_person_name" id="cont_person_name" class="form-control">
                                            </div>   
                                            <div class="col-lg-3">
                                                <label for="org_name" class="control-label">Organization Name</label>
                                                <input type="text" name="org_name" id="org_name" class="form-control">
                                            </div>   
                                            <div class="col-lg-3">
                                                <label for="contact_email" class="control-label">Email</label>
                                                <input type="text" name="contact_email" id="contact_email" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="contact_first_ph" class="control-label">Phone (Primary)</label>
                                                <input type="text" name="contact_first_ph" id="contact_first_ph" class="form-control">
                                            </div>    
                                            <div class="col-lg-3">
                                                <label for="contact_second_ph" class="control-label">Phone (Alternative)</label>
                                                <input type="text" name="contact_second_ph" id="contact_second_ph" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="contact_persn_address" class="control-label">Address</label>
                                                <textarea name="contact_persn_address" id="contact_persn_address" class="form-control"></textarea>
                                            </div>  
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="contact_details_submit" class="btn btn-success text-center" id="contact_details_submit" value="Add"> 
                                                <input type="hidden" value="<?=$project_id?>" name="cont_project_id" id="cont_project_id">
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>

                                <div id="contact_details_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">    
                                        <form autocomplete="off" id="edit_contact_form" method="post" action="<?=base_url('admin/form-edit-contact')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">                                    
                                            <div class="form-group "> 
                                                <div class="col-lg-3">
                                                    <label for="e_cont_person_name" class="control-label">Contact Person Name</label>
                                                    <input type="text" name="e_cont_person_name" id="e_cont_person_name" class="form-control">
                                                </div>   
                                                <div class="col-lg-3">
                                                    <label for="e_org_name" class="control-label">Organization Name</label>
                                                    <input type="text" name="e_org_name" id="e_org_name" class="form-control">
                                                </div>   
                                                <div class="col-lg-3">
                                                    <label for="e_contact_email" class="control-label">Email</label>
                                                    <input type="text" name="e_contact_email" id="e_contact_email" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="e_contact_first_ph" class="control-label">Phone (Primary)</label>
                                                    <input type="text" name="e_contact_first_ph" id="e_contact_first_ph" class="form-control">
                                                </div>    
                                                <div class="col-lg-3">
                                                    <label for="e_contact_second_ph" class="control-label">Phone (Alternative)</label>
                                                    <input type="text" name="e_contact_second_ph" id="e_contact_second_ph" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="e_contact_persn_address" class="control-label">Address</label>
                                                    <textarea name="e_contact_persn_address" id="e_contact_persn_address" class="form-control"></textarea>
                                                </div>  
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="e_contact_details_submit" class="btn btn-success text-center" id="e_contact_details_submit" value="Update">
                                                    <input type="hidden" value="<?=$project_id?>" name="e_cont_project_id" id="e_cont_project_id">
                                                    <input type="hidden" value="" name="contact_obj" id="contact_obj">
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
                                <li id="req_gather_edit_tab" class="disabled"><a href="#req_gather_edit" data-toggle="tab">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                            <img style="display:none; position: absolute;margin: auto;left: 0;right: 0;" src="<?=base_url('assets/img/ellipsis.gif')?>" id="loading_div"><span class="sr-only">Processing...</span>                            
                                <div id="req_gather_list" class="tab-pane fade in active">
                                    <table id="req_gather_details_table" class="table data-table dataTable" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Employee</th>
                                            <th>Date</th>
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
                                    <form autocomplete="off" id="requirement_gather_form" method="post" action="<?=base_url('admin/form-gather-requirement')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                        <div class="form-group "> 
                                            <div class="col-lg-3">
                                                <label for="req_gather_title" class="control-label">Title</label>
                                                <input type="text" name="req_gather_title" id="req_gather_title" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="req_gather_desc" class="control-label">Description</label>
                                                <textarea name="req_gather_desc" id="req_gather_desc" class="form-control"></textarea>
                                            </div>     
                                            <div class="col-lg-3">
                                                <label for="req_gather_by" class="control-label">Employee</label>
                                                <select name="req_gather_by" id="req_gather_by" class="form-control select2">
                                                    <option value="0" >-- Select Employee --</option>
                                                    <option value="1" > Mr. Jana </option>
                                                    <option value="2" > Mr. Roy </option>
                                                </select>
                                                <input type="hidden" value="" name="req_gather_by_name" id="req_gather_by_name">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="req_gather_date" class="control-label">Date</label>
                                                <input type="date" name="req_gather_date" id="req_gather_date" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="" class="control-label">Attachment</label>
                                                <input type="file" name="requirementFile[]" id="requirementFile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                            </div> 
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="requirement_gather_submit" class="btn btn-success text-center" id="requirement_gather_submit" value="Add"> 
                                                <input type="hidden" value="<?=$project_id?>" name="gr_project_id" id="gr_project_id">
                                            </div>
                                        </div>
                                    </form>    
                                    </div>
                                </div>

                                <div id="req_gather_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">                                             
                                        <form autocomplete="off" id="requirement_gather_edit_form" method="post" action="<?=base_url('admin/form-edit-gather-requirement')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">                                   
                                            <div class="form-group "> 
                                                <div class="col-lg-3">
                                                    <label for="e_req_gather_title" class="control-label">Title</label>
                                                    <input type="text" name="e_req_gather_title" id="e_req_gather_title" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="e_req_gather_desc" class="control-label">Description</label>
                                                    <textarea name="e_req_gather_desc" id="e_req_gather_desc" class="form-control"></textarea>
                                                </div>     
                                                <div class="col-lg-3">
                                                    <label for="e_req_gather_by" class="control-label">Employee</label>
                                                    <select name="e_req_gather_by" id="e_req_gather_by" class="form-control select2">
                                                        <option value="0" >-- Select Employee --</option>
                                                        <option value="1" >Mr. Jana</option>
                                                        <option value="2" >Mr. Roy</option>
                                                    </select>
                                                    <input type="hidden" value="" name="e_req_gather_by_name" id="e_req_gather_by_name">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="e_req_gather_date" class="control-label">Date</label>
                                                    <input type="date" name="e_req_gather_date" id="e_req_gather_date" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="" class="control-label">Attachment</label>
                                                    <input type="file" name="e_requirementFile[]" id="e_requirementFile" accept=".jpg,.jpeg,.png,.bmp,.txt,.docx,.xlsx,.csv,.pdf,.zip" class="file" multiple>
                                                </div> 
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="e_requirement_gather_submit" class="btn btn-success text-center" id="e_requirement_gather_submit" value="Update">
                                                    <input type="hidden" value="<?=$project_id?>" name="e_gr_project_id" id="e_gr_project_id">
                                                    <input type="hidden" value="" name="doc_obj" id="doc_obj">
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
            
            <!-- Start Quotation Part -->
            <div class="row"> 
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                        Quotation
                            <span class="tools pull-right">
                                <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body collapse">
                            <!--Tabs-->
                            <ul id="requirement_tabs" class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#quotation_list" data-toggle="tab">List</a></li>
                                <li id="quotation_add_tab"><a href="#quotation_add" data-toggle="tab">Add</a></li>
                                <li id="quotation_edit_tab" class="disabled"><a href="#quotation_edit" data-toggle="">Edit</a></li>
                            </ul>
                            <!--Tab Content-->
                            <div class="tab-content">
                                                           
                                <div id="quotation_list" class="tab-pane fade in active">
                                    <table id="quotation_list_table" class="table data-table dataTable" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SlNo</th>
                                                <th>Party Name</th>
                                                <th>Quotation No</th>
                                                <th>Quotation Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        
                                    </table>
                                </div>

                                <div id="quotation_add" class="tab-pane fade">                                    
                                    <div class="form">
                                        <form autocomplete="off" id="form_particular_basic_info_add" method="post" action="<?=base_url('admin/form-parti-basic-info-add')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group " style="float: left;"> 
                                                <h4 style="margin-left: 15px;">Basic Information</h4>
                                                <div class="col-lg-3">
                                                    <label for="bi_PartyId" class="control-label">Select Party</label>
                                                    <select name="bi_PartyId" id="bi_PartyId" class="form-control select2">
                                                        <option value="0" >-- Select Party --</option>
                                                        <option value="1" >Party 1</option>
                                                        <option value="2" >Party 2</option>
                                                    </select>
                                                    <input type="hidden" value="" name="bi_PartyId_name" id="bi_PartyId_name">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_QuotationNo" class="control-label">Quotation No.</label>
                                                    <input id="bi_QuotationNo" name="bi_QuotationNo" type="text" placeholder="Quotation No." class="form-control" />
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_QuotationDate" class="control-label">Quotation Date</label>
                                                    <input id="bi_QuotationDate" name="bi_QuotationDate" type="date" class="form-control" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_SubPartyName" class="control-label">Sub Party Name</label>
                                                    <input id="bi_SubPartyName" name="bi_SubPartyName" type="text" placeholder="Sub Party Name" class="form-control" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_InvoiceDate" class="control-label">Invoice Date</label>
                                                    <input id="bi_InvoiceDate" name="bi_InvoiceDate" type="date" class="form-control" />
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_NoticeNo" class="control-label">Notice No.</label>
                                                    <input id="bi_NoticeNo" name="bi_NoticeNo" type="text" placeholder="Notice No." class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_PaymentMode" class="control-label">Payment Mode</label>
                                                    <select name="bi_PaymentMode" id="bi_PaymentMode" class="form-control select2">
                                                        <option value="0" >-- Select Payment Mode --</option>
                                                        <option value="1" >Cash</option>
                                                        <option value="2" >Card</option>
                                                        <option value="3" >Cheque</option>
                                                        <option value="4" >UPI</option>
                                                        <option value="5" >Bank Transfer</option>
                                                    </select>
                                                    <input type="hidden" name="bi_PaymentModeName" id="bi_PaymentModeName" value="">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_InstrumentNumber" class="control-label">Instrument Number</label>
                                                    <textarea name="bi_InstrumentNumber" id="bi_InstrumentNumber" class="form-control"></textarea>
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_Remarks" class="control-label">Remarks</label>
                                                    <textarea name="bi_Remarks" id="bi_Remarks" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_OtherClientInfo" class="control-label">Other Client Information</label>
                                                    <textarea name="bi_OtherClientInfo" id="bi_OtherClientInfo" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_ImportantNotes" class="control-label">Important Notes</label>
                                                    <textarea name="bi_ImportantNotes" id="bi_ImportantNotes" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="basic_info_submit" class="control-label"></label>
                                                    <input type="submit" name="basic_info_submit" class="btn btn-success text-center" id="basic_info_submit" value="Add Basic Info.">
                                                    <input type="hidden" name="parti_bi_project_id" id="parti_bi_project_id" value="<?=$project_id?>">
                                                </div> 
                                            </div>
                                        </form>
                                        
                                        <div class="form-group " style="float: left;"> 
                                            <h4 style="margin-left: 15px;">Particulars</h4>
                                            <div id="quotation_list" class="tab-pane fade in active">
                                                <table id="tableParticularsAdd" class="table data-table dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl#</th>
                                                            <th>Task Type</th>
                                                            <th>HSN Code</th>
                                                            <th>Duration</th>
                                                            <th>Start Date</th>                                            
                                                            <th>Amount</th>                                           
                                                            <th>Taxable</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody> 
                                                    <tfoot>
                                                        <tr>
                                                            <th>Sl#</th>
                                                            <th>Task Type</th>
                                                            <th>HSN Code</th>
                                                            <th>Duration</th>
                                                            <th>Start Date</th>                                            
                                                            <th>Amount</th>                                           
                                                            <th>Taxable</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>                                                   
                                                </table>
                                            </div>  
                                            
                                                                                   
                                            <form autocomplete="off" id="form_particular_add" method="post" action="<?=base_url('admin/form-particular-add')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                                <div class="col-lg-3">
                                                    <label for="par_TaskType" class="control-label">Task Type</label>
                                                    <select name="par_TaskType" id="par_TaskType" class="form-control select2">
                                                        <option value="0" >-- Select Task Type --</option>
                                                        <option value="1" >Web Design</option>
                                                        <option value="2" >Web Development</option>
                                                        <option value="3" >SSL</option>
                                                        <option value="4" >Domain with Privacy settings FOR 2 YEARS</option>
                                                    </select>
                                                    <input type="hidden" value="" name="par_TaskType_name" id="par_TaskType_name">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="par_HSNCode" class="control-label">HSN Code</label>
                                                    <input value="" id="par_HSNCode" name="par_HSNCode" type="text" placeholder="HSN Code" class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="par_Duration" class="control-label">Duration</label>
                                                    <input value="" id="par_Duration" name="par_Duration" type="text" placeholder="Duration" class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="par_StartDate" class="control-label">Start Date</label>
                                                    <input value="" id="par_StartDate" name="par_StartDate" type="date"  class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="par_Amount" class="control-label">Amount</label>
                                                    <input value="" id="par_Amount" name="par_Amount" type="text" placeholder="Amount" class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="par_Taxable" class="control-label">Taxable</label>
                                                    <select name="par_Taxable" id="par_Taxable" class="form-control select2">
                                                        <option value="1" >YES</option>
                                                        <option value="2" >NO</option>
                                                    </select>
                                                    <input type="hidden" name="par_TaxableName" id="par_TaxableName" value="">
                                                </div> 
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="particular_details_submit" class="btn btn-success text-center" id="particular_details_submit" value="Add Particular">
                                                    <input type="hidden" name="parti_project_id" id="parti_project_id" value="<?=$project_id?>">
                                                    <input type="hidden" name="bi_obj" id="bi_obj" value="">
                                                </div> 
                                            </form>
                                        </div> 
                                        
                                        <div class="form-group " style="float: left;"> 
                                            <form autocomplete="off" id="form_tax_add" method="post" action="<?=base_url('admin/form-tax-add')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                                <h4 style="margin-left: 15px;">TAX Calculation</h4>
                                                <div class="col-lg-3">
                                                    <label for="tax_GrossAmount" class="control-label">Gross Amount</label>
                                                    <input value="0" id="tax_GrossAmount" name="tax_GrossAmount" type="text" placeholder="Gross Amount" class="form-control" readonly="readonly" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="tax_DiscountPercentage" class="control-label">Discount Percentage</label>
                                                    <input value="0" id="tax_DiscountPercentage" name="tax_DiscountPercentage" type="text" placeholder="Discount Percentage" class="form-control" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="tax_DiscountAmount" class="control-label">Discount Amount</label>
                                                    <input value="0" id="tax_DiscountAmount" name="tax_DiscountAmount" type="text" placeholder="Discount Amount" class="form-control" readonly="readonly" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="tax_TaxableAmount" class="control-label">Taxable Amount</label>
                                                    <input value="0" id="tax_TaxableAmount" name="tax_TaxableAmount" type="text" placeholder="Taxable Amount" class="form-control" readonly="readonly" />
                                                </div> 
                                                
                                                <div class="col-lg-3">
                                                    <label for="tax_SGST_Rate" class="control-label">SGST (in %)</label>
                                                    <input value="0" id="tax_SGST_Rate" name="tax_SGST_Rate" type="text" placeholder="SGST(in %)" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_SGST_Amount" class="control-label">SGST Amount</label>
                                                    <input value="0" id="tax_SGST_Amount" name="tax_SGST_Amount" type="text" placeholder="SGST Amount" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_CGST_Rate" class="control-label">CGST (in %)</label>
                                                    <input value="0" id="tax_CGST_Rate" name="tax_CGST_Rate" type="text" placeholder="CGST (in %)" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_CGST_Amount" class="control-label">CGST Amount</label>
                                                    <input value="0" id="tax_CGST_Amount" name="tax_CGST_Amount" type="text" placeholder="CGST Amount" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_IGST_Rate" class="control-label">IGST (in %)</label>
                                                    <input value="0" id="tax_IGST_Rate" name="tax_IGST_Rate" type="text" placeholder="IGST (in %)" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_IGST_Amount" class="control-label">IGST Amount</label>
                                                    <input value="0" id="tax_IGST_Amount" name="tax_IGST_Amount" type="text" placeholder="IGST Amount" class="form-control" readonly="readonly" />
                                                </div>
                                                
                                                <div class="col-lg-3">
                                                    <label for="tax_NetAmount" class="control-label">Net Amount</label>
                                                    <input value="0" id="tax_NetAmount" name="tax_NetAmount" type="text" placeholder="Net Amount" class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_TotalTax" class="control-label">Total Tax.</label>
                                                    <input value="0" id="tax_TotalTax" name="tax_TotalTax" type="text" placeholder="Total Tax." class="form-control" readonly="readonly" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="tax_Bank" class="control-label">Bank</label>
                                                    <select name="tax_Bank" id="tax_Bank" class="form-control select2">
                                                        <option value="0" >-- Select Bank --</option>
                                                        <option value="1" >HDFC</option>
                                                        <option value="2" >SBI</option>
                                                    </select>
                                                    <input type="hidden" name="tax_BankName" id="tax_BankName" value="">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="tax_ShowStamp" class="control-label">Show Stamp</label>
                                                    <select name="tax_ShowStamp" id="tax_ShowStamp" class="form-control select2">
                                                        <option value="1" >YES</option>
                                                        <option value="2" >NO</option>
                                                    </select>
                                                    <input type="hidden" name="tax_ShowStampName" id="tax_ShowStampName" value="">
                                                </div> 
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="tax_details_submit" class="control-label"></label>
                                                    <input type="submit" name="tax_details_submit" class="btn btn-success text-center" id="tax_details_submit" value="Update Tax">
                                                    <input type="hidden" name="tax_project_id" id="tax_project_id" value="<?=$project_id?>">
                                                    <input type="hidden" name="tax_bi_obj" id="tax_bi_obj" value="">
                                                </div> 
                                            </form>
                                        </div>

                                        <div class="form-group " style="float: left;"> 
                                            <h4 style="margin-left: 15px;">Project Commission</h4>
                                            <div id="p_commission_list" class="tab-pane fade in active">
                                                <table id="p_commissionListAdd" class="table data-table dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl#</th>
                                                            <th>Employee</th>
                                                            <th>Rate Type</th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody> 
                                                    <tfoot>
                                                        <tr>
                                                            <th>Sl#</th>
                                                            <th>Employee</th>
                                                            <th>Rate Type</th>
                                                            <th>Amount</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>                                                   
                                                </table>
                                            </div>
                                            
                                            <form autocomplete="off" id="form_commission_add" method="post" action="<?=base_url('admin/form-commission-add')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">  
                                                <div class="col-lg-3">
                                                    <label for="comi_emp_id" class="control-label">Employee</label>
                                                    <select name="comi_emp_id" id="comi_emp_id" class="form-control select2">
                                                        <option value="0" >-- Select Employee --</option>
                                                        <option value="1" >Mr. Jana</option>
                                                        <option value="2" >Mr. Roy</option>
                                                    </select>
                                                    <input type="hidden" name="comi_emp_name" id="comi_emp_name" value="">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="comi_rate_type" class="control-label">Rate Type</label>
                                                    <select name="comi_rate_type" id="comi_rate_type" class="form-control select2">
                                                        <option value="1" >Flate Rate</option>
                                                        <option value="2" >Percentage</option>
                                                    </select>
                                                    <input type="hidden" name="comi_rate_type_name" id="comi_rate_type_name" value="">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="comi_amount" class="control-label">Amount</label>
                                                    <input value="0" id="comi_amount" name="comi_amount" type="text" placeholder="Amount" class="form-control" />
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="add_commi" class="btn btn-success text-center" id="add_commi" value="Add Commission">
                                                    <input type="hidden" name="commi_project_id" id="commi_project_id" value="<?=$project_id?>">
                                                    <input type="hidden" name="commi_bi_obj" id="commi_bi_obj" value="">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="quotation_edit" class="tab-pane">                                    
                                    <div class="form">
                                        <form autocomplete="off" id="form_particular_basic_info_edit" method="post" action="<?=base_url('admin/form-parti-basic-info-edit')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group " style="float: left;"> 
                                                <h4 style="margin-left: 15px;">Basic Information</h4>
                                                <div class="col-lg-3">
                                                    <label for="bi_PartyId_e" class="control-label">Select Party</label>
                                                    <select name="bi_PartyId_e" id="bi_PartyId_e" class="form-control select2">
                                                        <option value="0" >Select Party</option>
                                                        <option value="1" >Party 1</option>
                                                        <option value="2" >Party 2</option>
                                                    </select>
                                                    <input type="hidden" value="" name="bi_PartyId_name_e" id="bi_PartyId_name_e">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_QuotationNo_e" class="control-label">Quotation No.</label>
                                                    <input id="bi_QuotationNo_e" name="bi_QuotationNo_e" type="text" placeholder="Quotation No." class="form-control" />
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_QuotationDate_e" class="control-label">Quotation Date</label>
                                                    <input id="bi_QuotationDate_e" name="bi_QuotationDate_e" type="date" class="form-control" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_SubPartyName_e" class="control-label">Sub Party Name</label>
                                                    <input id="bi_SubPartyName_e" name="bi_SubPartyName_e" type="text" placeholder="Sub Party Name" class="form-control" />
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_InvoiceDate_e" class="control-label">Invoice Date</label>
                                                    <input id="bi_InvoiceDate_e" name="bi_InvoiceDate_e" type="date" class="form-control" />
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="bi_NoticeNo_e" class="control-label">Notice No.</label>
                                                    <input id="bi_NoticeNo_e" name="bi_NoticeNo_e" type="text" placeholder="Notice No." class="form-control" />
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_PaymentMode_e" class="control-label">Payment Mode</label>
                                                    <select name="bi_PaymentMode_e" id="bi_PaymentMode_e" class="form-control select2">
                                                        <option value="0" >-- Select Payment Mode --</option>
                                                        <option value="1" >Cash</option>
                                                        <option value="2" >Card</option>
                                                        <option value="3" >Cheque</option>
                                                        <option value="4" >UPI</option>
                                                        <option value="5" >Bank Transfer</option>
                                                    </select>
                                                    <input type="hidden" name="bi_PaymentModeName_e" id="bi_PaymentModeName_e" value="">
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_InstrumentNumber_e" class="control-label">Instrument Number</label>
                                                    <textarea name="bi_InstrumentNumber_e" id="bi_InstrumentNumber_e" class="form-control"></textarea>
                                                </div> 
                                                <div class="col-lg-3">
                                                    <label for="bi_Remarks_e" class="control-label">Remarks</label>
                                                    <textarea name="bi_Remarks_e" id="bi_Remarks_e" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_OtherClientInfo_e" class="control-label">Other Client Information</label>
                                                    <textarea name="bi_OtherClientInfo_e" id="bi_OtherClientInfo_e" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3">
                                                    <label for="bi_ImportantNotes_e" class="control-label">Important Notes</label>
                                                    <textarea name="bi_ImportantNotes_e" id="bi_ImportantNotes_e" class="form-control"></textarea>
                                                </div>
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="basic_info_submit_e" class="control-label"></label>
                                                    <input type="submit" name="basic_info_submit_e" class="btn btn-success text-center" id="basic_info_submit_e" value="Update Basic Info.">
                                                    <input type="hidden" name="bi_project_id_e" id="bi_project_id_e" value="<?=$project_id?>">
                                                    <input type="hidden" name="bi_obj_e" id="bi_obj_e" value="">
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                        
                                    <div class="form-group " style="float: left;"> 
                                        <h4 style="margin-left: 15px;">Particulars</h4>
                                        <div id="particular_edit_list" class="tab-pane fade in active">
                                            <table id="tableParticularsEdit" class="table data-table dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Sl#</th>
                                                        <th>Task Type</th>
                                                        <th>HSN Code</th>
                                                        <th>Duration</th>
                                                        <th>Start Date</th>                                            
                                                        <th>Amount</th>                                           
                                                        <th>Taxable</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody> 
                                                <tfoot>
                                                    <tr>
                                                        <th>Sl#</th>
                                                        <th>Task Type</th>
                                                        <th>HSN Code</th>
                                                        <th>Duration</th>
                                                        <th>Start Date</th>                                            
                                                        <th>Amount</th>                                           
                                                        <th>Taxable</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>                                                   
                                            </table>
                                        </div>  
                                        
                                                                                
                                        <form autocomplete="off" id="form_particular_edit" method="post" action="<?=base_url('admin/form-particular-edit')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                            <div class="col-lg-3">
                                                <label for="par_TaskType_e" class="control-label">Task Type</label>
                                                <select name="par_TaskType_e" id="par_TaskType_e" class="form-control select2">
                                                    <option value="0" >-- Select Task Type --</option>
                                                    <option value="1" >Web Design</option>
                                                    <option value="2" >Web Development</option>
                                                    <option value="3" >SSL</option>
                                                    <option value="4" >Domain with Privacy settings FOR 2 YEARS</option>
                                                </select>
                                                <input type="hidden" value="" name="par_TaskType_name_e" id="par_TaskType_name_e">
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="par_HSNCode_e" class="control-label">HSN Code</label>
                                                <input value="" id="par_HSNCode_e" name="par_HSNCode_e" type="text" placeholder="HSN Code" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="par_Duration_e" class="control-label">Duration</label>
                                                <input value="" id="par_Duration_e" name="par_Duration_e" type="text" placeholder="Duration" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="par_StartDate_e" class="control-label">Start Date</label>
                                                <input value="" id="par_StartDate_e" name="par_StartDate_e" type="date"  class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="par_Amount_e" class="control-label">Amount</label>
                                                <input value="" id="par_Amount_e" name="par_Amount_e" type="text" placeholder="Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="par_Taxable_e" class="control-label">Taxable</label>
                                                <select name="par_Taxable_e" id="par_Taxable_e" class="form-control select2">
                                                    <option value="1" >YES</option>
                                                    <option value="2" >NO</option>
                                                </select>
                                                <input type="hidden" name="par_TaxableName_e" id="par_TaxableName_e" value="">
                                            </div> 
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po_e" class="control-label"></label>
                                                <input type="submit" name="particular_details_submit_e" class="btn btn-success text-center" id="particular_details_submit_e" value="Add Particular">
                                                <input type="hidden" name="parti_project_id_e" id="parti_project_id_e" value="<?=$project_id?>">
                                                <input type="hidden" name="parti_bi_obj_e" id="parti_bi_obj_e" value="">
                                            </div> 
                                        </form>
                                    </div> 
                                        
                                    <div class="form-group " style="float: left;"> 
                                        <form autocomplete="off" id="form_tax_edit" method="post" action="<?=base_url('admin/form-tax-edit')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                            <h4 style="margin-left: 15px;">TAX Calculation</h4>
                                            <div class="col-lg-3">
                                                <label for="tax_GrossAmount_e" class="control-label">Gross Amount</label>
                                                <input value="0" id="tax_GrossAmount_e" name="tax_GrossAmount_e" type="text" placeholder="Gross Amount" class="form-control" readonly="readonly" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="tax_DiscountPercentage_e" class="control-label">Discount Percentage</label>
                                                <input value="0" id="tax_DiscountPercentage_e" name="tax_DiscountPercentage_e" type="text" placeholder="Discount Percentage" class="form-control" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="tax_DiscountAmount_e" class="control-label">Discount Amount</label>
                                                <input value="0" id="tax_DiscountAmount_e" name="tax_DiscountAmount_e" type="text" placeholder="Discount Amount" class="form-control" readonly="readonly" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="tax_TaxableAmount_e" class="control-label">Taxable Amount</label>
                                                <input value="0" id="tax_TaxableAmount_e" name="tax_TaxableAmount_e" type="text" placeholder="Taxable Amount" class="form-control" readonly="readonly" />
                                            </div> 
                                            
                                            <div class="col-lg-3">
                                                <label for="tax_SGST_Rate_e" class="control-label">SGST (in %)</label>
                                                <input value="0" id="tax_SGST_Rate_e" name="tax_SGST_Rate_e" type="text" placeholder="SGST(in %)" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_SGST_Amount_e" class="control-label">SGST Amount</label>
                                                <input value="0" id="tax_SGST_Amount_e" name="tax_SGST_Amount_e" type="text" placeholder="SGST Amount" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_CGST_Rate_e" class="control-label">CGST (in %)</label>
                                                <input value="0" id="tax_CGST_Rate_e" name="tax_CGST_Rate_e" type="text" placeholder="CGST (in %)" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_CGST_Amount_e" class="control-label">CGST Amount</label>
                                                <input value="0" id="tax_CGST_Amount_e" name="tax_CGST_Amount_e" type="text" placeholder="CGST Amount" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_IGST_Rate_e" class="control-label">IGST (in %)</label>
                                                <input value="0" id="tax_IGST_Rate_e" name="tax_IGST_Rate_e" type="text" placeholder="IGST (in %)" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_IGST_Amount_e" class="control-label">IGST Amount</label>
                                                <input value="0" id="tax_IGST_Amount_e" name="tax_IGST_Amount_e" type="text" placeholder="IGST Amount" class="form-control" readonly="readonly" />
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <label for="tax_NetAmount_e" class="control-label">Net Amount</label>
                                                <input value="0" id="tax_NetAmount_e" name="tax_NetAmount_e" type="text" placeholder="Net Amount" class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_TotalTax_e" class="control-label">Total Tax.</label>
                                                <input value="0" id="tax_TotalTax_e" name="tax_TotalTax_e" type="text" placeholder="Total Tax." class="form-control" readonly="readonly" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="tax_Bank_e" class="control-label">Bank</label>
                                                <select name="tax_Bank_e" id="tax_Bank_e" class="form-control select2">
                                                    <option value="0" >-- Select Bank --</option>
                                                    <option value="1" >HDFC</option>
                                                    <option value="2" >SBI</option>
                                                </select>
                                                <input type="hidden" name="tax_BankName_e" id="tax_BankName_e" value="">
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="tax_ShowStamp_e" class="control-label">Show Stamp</label>
                                                <select name="tax_ShowStamp_e" id="tax_ShowStamp_e" class="form-control select2">
                                                    <option value="1" >YES</option>
                                                    <option value="2" >NO</option>
                                                </select>
                                                <input type="hidden" name="tax_ShowStampName_e" id="tax_ShowStampName_e" value="">
                                            </div> 
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="tax_details_submit_e" class="control-label"></label>
                                                <input type="submit" name="tax_details_submit_e" class="btn btn-success text-center" id="tax_details_submit_e" value="Update Tax">
                                                <input type="hidden" name="tax_project_id_e" id="tax_project_id_e" value="<?=$project_id?>">
                                                <input type="hidden" name="tax_bi_obj_e" id="tax_bi_obj_e" value="">
                                            </div> 
                                        </form>
                                    </div>

                                    <!-- Start project commission edit -->
                                    <div class="form-group " style="float: left;"> 
                                        <h4 style="margin-left: 15px;">Project Commission</h4>
                                        <div id="p_commission_list_e" class="tab-pane fade in active">
                                            <table id="p_commissionListEdit" class="table data-table dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>Sl#</th>
                                                        <th>Employee</th>
                                                        <th>Rate Type</th>
                                                        <th>Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody> 
                                                <tfoot>
                                                    <tr>
                                                        <th>Sl#</th>
                                                        <th>Employee</th>
                                                        <th>Rate Type</th>
                                                        <th>Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>                                                   
                                            </table>
                                        </div>
                                        
                                        <form autocomplete="off" id="form_commission_edit" method="post" action="<?=base_url('admin/form-commission-edit')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">  
                                            <div class="col-lg-3">
                                                <label for="comi_emp_id" class="control-label">Employee</label>
                                                <select name="comi_emp_id_e" id="comi_emp_id_e" class="form-control select2">
                                                    <option value="0" >-- Select Employee --</option>
                                                    <option value="1" >Mr. Jana</option>
                                                    <option value="2" >Mr. Roy</option>
                                                </select>
                                                <input type="hidden" name="comi_emp_name_e" id="comi_emp_name_e" value="">
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="comi_rate_type_e" class="control-label">Rate Type</label>
                                                <select name="comi_rate_type_e" id="comi_rate_type_e" class="form-control select2">
                                                    <option value="1" >Flate Rate</option>
                                                    <option value="2" >Percentage</option>
                                                </select>
                                                <input type="hidden" name="comi_rate_type_name_e" id="comi_rate_type_name_e" value="">
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="comi_amount_e" class="control-label">Amount</label>
                                                <input value="0" id="comi_amount_e" name="comi_amount_e" type="text" placeholder="Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po_e" class="control-label"></label>
                                                <input type="submit" name="add_commi_e" class="btn btn-success text-center" id="add_commi_e" value="Add Commission">
                                                <input type="hidden" name="commi_project_id_e" id="commi_project_id_e" value="<?=$project_id?>">
                                                <input type="hidden" name="commi_bi_obj_e" id="commi_bi_obj_e" value="">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End project commission edit-->
                                    
                                </div> 

                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End Quotation Part -->
            
        </div>

    </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <?php //$this->load->view('components/footer'); ?>
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
        initProjectDescription()
        initContactTable()
        initGatherRequirementTable()
        initQuotationListTable()
    } );
    
    //Quotation
    function initQuotationListTable(){
        $('#quotation_list_table').dataTable().fnClearTable();
        $('#quotation_list_table').dataTable().fnDestroy();
        $('#quotation_list_table').DataTable( {
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-quotation-details-table-data')?>",
                "type": "POST",
                "dataType": "json",
                data: {
                    project_id: function () {
                        return $("#project_id").val();
                    },
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "SlNo" },
                { "data": "PartyName" },
                { "data": "QuotationNo" },
                { "data": "QuotationDate" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0,1,2,3,4],
                "orderable": false,
            }]
        });
    }//end fun

    //Requirement Gather
    function initGatherRequirementTable(){
        $('#req_gather_details_table').dataTable().fnClearTable();
        $('#req_gather_details_table').dataTable().fnDestroy();
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
                    project_id: function () {
                        return $("#project_id").val();
                    },
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "Title" },
                { "data": "Description" },
                { "data": "Employee" },
                { "data": "Date" },
                { "data": "Attachment" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0,1,2,3],
                "orderable": false,
            }]
        });
    }//end fun
    

    //Edit Requirement Gathering
    $('#req_gather_details_table').on('click', '.edit_doc_obj', function(){
        $doc_obj = $(this).data('doc_obj');
        $project_id = $('#project_id').val();
        $('#doc_obj').val($doc_obj);
        

        $.ajax({
            url: "<?= base_url('admin/fetch-requirement-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {doc_obj: $doc_obj, project_id: $project_id},
            success: function (returnData) {
                console.log(returnData);                
                //data = returnData[0];

                $("#e_req_gather_title").val(returnData.req_gather_title);
                $("#e_req_gather_desc").val(returnData.req_gather_desc);
                $("#e_req_gather_by").val(returnData.req_gather_by).trigger('change');
                //$("#size_after_glaze_edit").val(data.size_after_glaze).trigger('change');
                $("#e_req_gather_by_name").val(returnData.req_gather_by_name);
                $("#e_req_gather_date").val(returnData.req_gather_date);

                $('a[href="#req_gather_edit"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    })//end fun
    

    //Edit Quotation
    $('#quotation_list_table').on('click', '.edit_bi_obj', function(){
        $bi_obj = $(this).data('bi_obj');
        console.log('bi_obj:'+bi_obj);
        $project_id = $('#project_id').val();
        $('#bi_obj_e').val($bi_obj);        

        $.ajax({
            url: "<?= base_url('admin/fetch-quotation-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {bi_obj: $bi_obj, project_id: $project_id},
            success: function (returnData) {
                console.log(returnData);                
                //data = returnData[0];

                //Basic info part
                $("#bi_PartyId_e").val(returnData.bi_PartyId).trigger('change');
                $("#bi_PartyId_name_e").val(returnData.bi_PartyId_name);
                $("#e_req_gather_by").val(returnData.req_gather_by).trigger('change');
                $("#bi_QuotationNo_e").val(returnData.bi_QuotationNo);
                $("#bi_QuotationDate_e").val(returnData.bi_QuotationDate);
                $("#bi_SubPartyName_e").val(returnData.bi_SubPartyName);
                $("#bi_InvoiceDate_e").val(returnData.bi_InvoiceDate);
                $("#bi_NoticeNo_e").val(returnData.bi_NoticeNo);
                $("#bi_PaymentMode_e").val(returnData.bi_PaymentMode).trigger('change');
                $("#bi_PaymentModeName_e").val(returnData.bi_PaymentModeName);
                $("#bi_InstrumentNumber_e").val(returnData.bi_InstrumentNumber);
                $("#bi_Remarks_e").val(returnData.bi_Remarks);
                $("#bi_OtherClientInfo_e").val(returnData.bi_OtherClientInfo);
                $("#bi_ImportantNotes_e").val(returnData.bi_ImportantNotes);

                //Particular Part
                initTableParticulars($project_id, $bi_obj, 'tableParticularsEdit');
                $('#parti_bi_obj_e').val($bi_obj);

                //Tax Calculation
                $("#tax_GrossAmount_e").val(returnData.tax_GrossAmount);
                $("#tax_DiscountPercentage_e").val(returnData.tax_DiscountPercentage);
                $("#tax_DiscountAmount_e").val(returnData.tax_DiscountAmount);
                $("#tax_TaxableAmount_e").val(returnData.tax_TaxableAmount);
                $("#tax_SGST_Rate_e").val(returnData.tax_SGST_Rate);
                $("#tax_SGST_Amount_e").val(returnData.tax_SGST_Amount);
                $("#tax_CGST_Rate_e").val(returnData.tax_CGST_Rate);
                $("#tax_CGST_Amount_e").val(returnData.tax_CGST_Amount);
                $("#tax_IGST_Rate_e").val(returnData.tax_IGST_Rate);
                $("#tax_IGST_Amount_e").val(returnData.tax_IGST_Amount);
                $("#tax_NetAmount_e").val(returnData.tax_NetAmount);
                $("#tax_TotalTax_e").val(returnData.tax_TotalTax);
                $("#tax_Bank_e").val(returnData.tax_Bank).trigger('change');
                $("#tax_BankName_e").val(returnData.tax_BankName);
                $("#tax_ShowStamp_e").val(returnData.tax_ShowStamp).trigger('change');
                $("#tax_ShowStampName_e").val(returnData.tax_ShowStampName);
                $("#tax_bi_obj_e").val($bi_obj);
                
                //Commission Part
                initTableCommission($project_id, $bi_obj, 'p_commissionListEdit');
                $('#commi_bi_obj_e').val($bi_obj);

                $('a[href="#quotation_edit"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    })//end fun

    //Contact Detail Table
    function initContactTable(){
        $('#contact_details_table').dataTable().fnClearTable();
        $('#contact_details_table').dataTable().fnDestroy();
        
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
                    project_id: function () {
                        return $("#project_id").val();
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
    }//end fun

    //Edit contact details
    $('#contact_details_table').on('click', '.edit_contact_obj', function(){
        $project_id = $(this).data('project_id');
        $contact_obj = $(this).data('contact_obj');
        
        $('#contact_obj').val($contact_obj);
        console.log('contact_obj: ' + $contact_obj);

        $.ajax({
            url: "<?= base_url('admin/fetch-contact-details-on-pk/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {contact_obj: $contact_obj, project_id: $project_id},
            success: function (returnData) {
                console.log(returnData);                
                //data = returnData[0];

                $("#e_cont_person_name").val(returnData.cont_person_name);
                $("#e_org_name").val(returnData.org_name);
                $("#e_contact_email").val(returnData.contact_email);
                $("#e_contact_first_ph").val(returnData.contact_first_ph);
                $("#e_contact_second_ph").val(returnData.contact_second_ph);
                $("#e_contact_persn_address").val(returnData.contact_persn_address);
                $("#e_cont_project_id").val($project_id);

                $('a[href="#contact_details_edit"]').tab('show');

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    })//end fun

    //Populate Particular table    
    function initTableParticulars($project_id, $bi_obj, $tableId){
        //$('#tableParticularsEdit').dataTable().fnClearTable();
        //$('#tableParticularsEdit').dataTable().fnDestroy();
        $('#'+$tableId).dataTable().fnClearTable();
        $('#'+$tableId).dataTable().fnDestroy();
        
        $('#'+$tableId).DataTable( {
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-particular-details-table-data')?>",
                "type": "POST",
                "dataType": "json",
                data: {
                    project_id: function () {
                        return $project_id;
                    },
                    bi_obj: function () {
                        return $bi_obj;
                    }
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "slNo" },
                { "data": "taskType" },
                { "data": "hsnCode" },
                { "data": "Duration" },
                { "data": "startDate" },
                { "data": "amount" },
                { "data": "taxable" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6, 7],
                "orderable": false,
            }]
        });
    }//end fun

    //Populate Commission table    
    function initTableCommission($project_id, $bi_obj, $tableId){
        $('#'+$tableId).dataTable().fnClearTable();
        $('#'+$tableId).dataTable().fnDestroy();
        
        $('#'+$tableId).DataTable( {
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-commission-details-table-data')?>",
                "type": "POST",
                "dataType": "json",
                data: {
                    project_id: function () {
                        return $project_id;
                    },
                    bi_obj: function () {
                        return $bi_obj;
                    }
                },
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "slNo" },
                { "data": "Employee" },
                { "data": "RateType" },
                { "data": "Amount" },
                { "data": "action" },
            ],
            //column initialisation properties
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4],
                "orderable": false,
            }]
        });
    }//end fun


    //Initiate Project Description 
    function initProjectDescription(){
        $project_description = {
            projectDetail: {},
            contactDetail: [],
            requirementDetail: [],
            quotationDetail: [
            ]
        }
    }//end project description

    //Project Details Part
    $('#project_details_submit').click(function(){
        $project_id = $('#project_id').val();
        $title = $('#project_title').val();
        $description = $('#project_description').val();
        $('#myLoading').show();

        if($title == ''){
            alert('Please enter project title');
            $('#project_title').focus();
            $('#myLoading').hide();
        }else if($description == ''){
            alert('Please enter project description');
            $('#project_description').focus();
            $('#myLoading').hide();
        }else{
            $project_description.projectDetail.title = $title;
            $project_description.projectDetail.description = $description;
            updateProjectDescription()
            $('#myLoading').hide();
        }
    })//end fun

    //Client Details Part
    $("#form_add_client_details").validate({        
        rules: {
            account_name: {
                required: true
            },
            account_address1: {
                required: true
            },
            account_telephone: {
                required: true
            }    
        },
        messages: {

        }
    });
    $('#form_add_client_details').ajaxForm({
        beforeSubmit: function () {
            return $("#form_add_client_details").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            //console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
            if(parseInt(obj.update_id) > 0){                
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Cliennt save success')
                }            	
            }
        }
    });
    //Client Details Part end

    //Contact Details Part
    $("#add_contact_form").validate({        
        rules: {
            req_gather_title: {
                required: true
            },
            requirementFile: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#add_contact_form').ajaxForm({
        beforeSubmit: function () {
            return $("#add_contact_form").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            //console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                $('#cont_person_name').val('');
                $('#org_name').val('');
                $('#contact_email').val('');
                $('#contact_first_ph').val('');
                $('#contact_second_ph').val('');
                $('#contact_persn_address').val('');
                
                initContactTable()

                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //Contact Details Part end

    //Contact Details Edit start
    $("#edit_contact_form").validate({        
        rules: {
            req_gather_title: {
                required: true
            },
            requirementFile: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#edit_contact_form').ajaxForm({
        beforeSubmit: function () {
            return $("#edit_contact_form").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            //console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                $('#e_cont_person_name').val('');
                $('#e_org_name').val('');
                $('#e_contact_email').val('');
                $('#e_contact_first_ph').val('');
                $('#e_contact_second_ph').val('');
                $('#e_contact_persn_address').val('');

                //$('a[href="#contact_details_edit"]').tab('hide');
                $('#contact_obj').val('');
                $('a[href="#contact_details_list"]').tab('show');
                
                initContactTable()

                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //Contact Details Edit end

    
    $("#req_gather_by").change(function(){
        $req_gather_by_name = $("#req_gather_by :selected").text();
        $('#req_gather_by_name').val($req_gather_by_name);
    });

    
    //Requirement Gathering
    $("#requirement_gather_form").validate({        
        rules: {
            req_gather_title: {
                required: true
            },
            requirementFile: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#requirement_gather_form').ajaxForm({
        beforeSubmit: function () {
            return $("#requirement_gather_form").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            //console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                $('#req_gather_title').val('');
                $('#req_gather_desc').val('');
                $('#req_gather_by_name').val('');
                $('#req_gather_by').val('0').trigger('change');
                $('#req_gather_date').val('');

                initGatherRequirementTable()
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end requirement gather

    
    //Requirement Gathering Edit start    
    $("#e_req_gather_by").change(function(){
        $e_req_gather_by_name = $("#e_req_gather_by :selected").text();
        $('#e_req_gather_by_name').val($e_req_gather_by_name);
    });

    $("#requirement_gather_edit_form").validate({        
        rules: {
            e_req_gather_title: {
                required: true
            },
            e_req_gather_date: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#requirement_gather_edit_form').ajaxForm({
        beforeSubmit: function () {
            return $("#requirement_gather_edit_form").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            //console.log(returnData);
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                $('#e_req_gather_title').val('');
                $('#e_req_gather_desc').val('');
                $('#e_req_gather_by').val('0').trigger('change');
                $('#e_req_gather_by_name').val('');
                $('#e_req_gather_date').val('');
                $('#contact_persn_address').val('');

                initGatherRequirementTable()
                $('a[href="#req_gather_list"]').tab('show');

                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end requirement gather edit


    //QUOTATION Basic Info    
    $("#bi_PartyId").change(function(){
        $bi_PartyId_name = $("#bi_PartyId :selected").text();
        $('#bi_PartyId_name').val($bi_PartyId_name);
    });
    $("#bi_PaymentMode").change(function(){
        $bi_PaymentModeName = $("#bi_PaymentMode :selected").text();
        $('#bi_PaymentModeName').val($bi_PaymentModeName);
    });
    $("#form_particular_basic_info_add").validate({        
        rules: {
            bi_PartyId: {
                required: true
            },
            bi_QuotationDate: {
                required: true
            },
            bi_InvoiceDate: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_particular_basic_info_add').ajaxForm({
        beforeSubmit: function () {
            return $("#form_particular_basic_info_add").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                /*$('#bi_PartyId').val('0').trigger('change');
                $('#bi_PartyId_name').val('');
                $('#bi_QuotationNo').val('');
                $('#bi_QuotationDate').val('');
                $('#bi_SubPartyName').val('');
                $('#bi_InvoiceDate').val('');
                $('#bi_NoticeNo').val('');
                $('#bi_PaymentMode').val('0').trigger('change');
                $('#bi_PaymentModeName').val('');
                $('#bi_InstrumentNumber').val('');
                $('#bi_Remarks').val('');
                $('#bi_OtherClientInfo').val('');
                $('#bi_ImportantNotes').val('');*/

                initQuotationListTable()
                $('#bi_obj').val(obj.bi_obj);
                $('#tax_bi_obj').val(obj.bi_obj);
                $('#commi_bi_obj').val(obj.bi_obj);

                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end QUOTATION basic info

    
    //QUOTATION Basic Info Edit   
    $("#bi_PartyId_e").change(function(){
        $bi_PartyId_name_e = $("#bi_PartyId_e :selected").text();
        $('#bi_PartyId_name_e').val($bi_PartyId_name_e);
    });
    $("#bi_PaymentMode_e").change(function(){
        $bi_PaymentModeName_e = $("#bi_PaymentMode_e :selected").text();
        $('#bi_PaymentModeName_e').val($bi_PaymentModeName_e);
    });
    $("#form_particular_basic_info_edit").validate({        
        rules: {
            bi_PartyId_e: {
                required: true
            },
            bi_QuotationDate_e: {
                required: true
            },
            bi_InvoiceDate_e: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_particular_basic_info_edit').ajaxForm({
        beforeSubmit: function () {
            return $("#form_particular_basic_info_edit").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                /*$('#bi_PartyId_e').val('0').trigger('change');
                $('#bi_PartyId_name_e').val('');
                $('#bi_QuotationNo_e').val('');
                $('#bi_QuotationDate_e').val('');
                $('#bi_SubPartyName_e').val('');
                $('#bi_InvoiceDate_e').val('');
                $('#bi_NoticeNo_e').val('');
                $('#bi_PaymentMode_e').val('0').trigger('change');
                $('#bi_PaymentModeName_e').val('');
                $('#bi_InstrumentNumber_e').val('');
                $('#bi_Remarks_e').val('');
                $('#bi_OtherClientInfo_e').val('');
                $('#bi_ImportantNotes_e').val('');*/

                initQuotationListTable()
                $('#bi_obj_e').val('');
                $('a[href="#contact_details_edit"]').tab('show');

                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end QUOTATION basic info Edit

    //Add particular
    $("#par_TaskType").change(function(){
        $par_TaskType_name = $("#par_TaskType :selected").text();
        $('#par_TaskType_name').val($par_TaskType_name);
    });
    $("#par_Taxable").change(function(){
        $par_TaxableName = $("#par_Taxable :selected").text();
        $('#par_TaxableName').val($par_TaxableName);
    });
    $("#form_particular_add").validate({        
        rules: {
            par_TaskType: {
                required: true
            },
            par_HSNCode: {
                required: true
            },
            par_Duration: {
                required: true
            },
            par_StartDate: {
                required: true
            },
            par_Amount: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#form_particular_add').ajaxForm({
        beforeSubmit: function () {
            return $("#form_particular_add").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.parti_obj) > 0){
                console.log(JSON.stringify(obj));
                //Populate particular table after this part                
                initTableParticulars(obj.project_id, obj.bi_obj, 'tableParticularsAdd');
                
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                    
                    $('#par_TaskType').val('0').trigger('change');
                    $('#par_TaskType_name').val('');
                    $('#par_HSNCode').val('');
                    $('#par_Duration').val('');
                    $('#par_StartDate').val('');
                    $('#par_Amount').val('');
                    $('#par_Taxable').val('1').trigger('change');

                    calculateTax('add', obj.project_id, obj.bi_obj)

                }            	
			}
		}
    });
    //end particulars

    //Add particular during edit
    $("#par_TaskType_e").change(function(){
        $par_TaskType_name_e = $("#par_TaskType_e :selected").text();
        $('#par_TaskType_name_e').val($par_TaskType_name_e);
    });
    $("#par_Taxable_e").change(function(){
        $par_TaxableName_e = $("#par_Taxable_e :selected").text();
        $('#par_TaxableName_e').val($par_TaxableName_e);
    });
    $("#form_particular_edit").validate({        
        rules: {
            par_TaskType_e: {
                required: true
            },
            par_HSNCode_e: {
                required: true
            },
            par_Duration_e: {
                required: true
            },
            par_StartDate_e: {
                required: true
            },
            par_Amount_e: {
                required: true
            }   
        },
        messages: {

        }
    });
    $('#form_particular_edit').ajaxForm({
        beforeSubmit: function () {
            return $("#form_particular_edit").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.parti_obj) > 0){
                console.log(JSON.stringify(obj));
                
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')

                    //Populate particular table after this part 
                    $project_id = obj.parti_obj;              
                    $bi_obj = obj.parti_obj;

                    $('#par_TaskType_e').val('0').trigger('change');
                    $('#par_TaskType_name_e').val('');
                    $('#par_HSNCode_e').val('');
                    $('#par_Duration_e').val('');
                    $('#par_StartDate_e').val('');
                    $('#par_Amount_e').val('');
                    $('#par_Taxable_e').val('1').trigger('change');

                    initTableParticulars($project_id, $bi_obj, 'tableParticularsEdit');
                    calculateTax('edit', obj.project_id, obj.bi_obj)

                }            	
			}
		}
    });
    //end particulars add from Edit part

    $("#tax_Bank").change(function(){
        $tax_BankName = $("#tax_Bank :selected").text();
        $('#tax_BankName').val($tax_BankName);
    });
    $("#tax_ShowStamp").change(function(){
        $tax_ShowStampName = $("#tax_ShowStamp :selected").text();
        $('#tax_ShowStampName').val($tax_ShowStampName);
    });
    $("#form_tax_add").validate({        
        rules: {
            tax_GrossAmount: {
                required: true
            },
            tax_NetAmount: {
                required: true
            },
            tax_Bank: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_tax_add').ajaxForm({
        beforeSubmit: function () {
            return $("#form_tax_add").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end TAX Part

    //Edit TAX calculation start
    $("#tax_Bank_e").change(function(){
        $tax_BankName_e = $("#tax_Bank_e :selected").text();
        $('#tax_BankName_e').val($tax_BankName_e);
    });
    $("#tax_ShowStamp_e").change(function(){
        $tax_ShowStampName_e = $("#tax_ShowStamp_e :selected").text();
        $('#tax_ShowStampName_e').val($tax_ShowStampName_e);
    });
    $("#form_tax_edit").validate({        
        rules: {
            tax_GrossAmount_e: {
                required: true
            },
            tax_NetAmount_e: {
                required: true
            },
            tax_Bank_e: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_tax_edit').ajaxForm({
        beforeSubmit: function () {
            return $("#form_tax_edit").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.update_id) > 0){
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('Document save success')
                }            	
			}
		}
    });
    //end TAX edit Part

    //Add commission details
    $("#comi_emp_id").change(function(){
        $comi_emp_name = $("#comi_emp_id :selected").text();
        $('#comi_emp_name').val($comi_emp_name);
    });
    $("#comi_rate_type").change(function(){
        $comi_rate_type_name = $("#comi_rate_type :selected").text();
        $('#comi_rate_type_name').val($comi_rate_type_name);
    });
    $("#form_commission_add").validate({        
        rules: {
            comi_emp_name: {
                required: true
            },
            comi_rate_type: {
                required: true
            },
            comi_amount: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_commission_add').ajaxForm({
        beforeSubmit: function () {
            return $("#form_commission_add").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
			if(parseInt(obj.project_id) > 0){
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('commission save success')
                    $('#comi_emp_name').val('0').trigger('change');
                    $('#comi_rate_type_').val('0').trigger('change');
                    $('#comi_amount').val('0');
                    //populate commission table from here
                    initTableCommission(obj.project_id, obj.bi_obj, 'p_commissionListAdd');

                }            	
			}
		}
    });
    //end commission Part

    

    //Edit commission details
    $("#comi_emp_id_e").change(function(){
        $comi_emp_name_e = $("#comi_emp_id_e :selected").text();
        $('#comi_emp_name_e').val($comi_emp_name_e);
    });
    $("#comi_rate_type_e").change(function(){
        $comi_rate_type_name_e = $("#comi_rate_type_e :selected").text();
        $('#comi_rate_type_name_e').val($comi_rate_type_name_e);
    });
    $("#form_commission_edit").validate({        
        rules: {
            comi_emp_name_e: {
                required: true
            },
            comi_rate_type_e: {
                required: true
            },
            comi_amount_e: {
                required: true
            }  
        },
        messages: {

        }
    });
    $('#form_commission_edit').ajaxForm({
        beforeSubmit: function () {
            return $("#form_commission_edit").valid(); // TRUE when form is valid, FALSE will cancel submit
        },
        success: function (returnData) {
            obj = JSON.parse(returnData);
            notification(obj);
            if(parseInt(obj.project_id) > 0){
                console.log(JSON.stringify(obj));
                if(obj.type == 'error'){
                    console.log('Error from API')
                }else{
                    console.log('commission save success')
                    $('#comi_emp_name_e').val('0').trigger('change');
                    $('#comi_rate_type_e').val('0').trigger('change');
                    $('#comi_amount_e').val('0');
                    //populate commission table from here
                    initTableCommission(obj.project_id, obj.bi_obj, 'p_commissionListEdit');

                }            	
            }
        }
    });
    //end commission Part edit



    function updateProjectDescription(){
        $project_id = $('#project_id').val();
        console.log(JSON.stringify($project_description))
        $('#myLoading').show();

        $.ajax({
            url: "<?= base_url('admin/ajax-update-project-document/') ?>",
            dataType: 'json',
            type: 'POST',
            data: {project_id: $project_id, project_description: JSON.stringify($project_description)},
            success: function (returnData) {
                console.log(returnData);  
                //obj = JSON.parse(returnData);                 
                notification(returnData);
                if(returnData.type == 'success'){
                    console.log('project_id: '+returnData.project_id);
                    $('#project_id').val(returnData.project_id);
                    $('#cli_project_id').val(returnData.project_id);
                    $('#cont_project_id').val(returnData.project_id);
                    $('#gr_project_id').val(returnData.project_id);
                    $('#parti_project_id').val(returnData.project_id);
                    $('#parti_bi_project_id').val(returnData.project_id);
                    $('#tax_project_id').val(returnData.project_id);
                    $('#commi_project_id').val(returnData.project_id);
                }

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    }//end fun


    //DELETE CONTACT INFO
    $('#contact_details_table').on('click', '.delete', function(){
        $contact_obj = $(this).data('contact_obj');
        $project_id = $('#project_id').val();

        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-contact-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {project_id: $project_id, contact_obj: $contact_obj},
                success: function (returnData) {
                    console.log(returnData);
                    $('#contact_details_table').closest('tr').remove();
                    notification(returnData);
                    //refresh table
                    initContactTable()

                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });

    //Delete Requirement  
    $('#req_gather_details_table').on('click', '.delete', function(){
        $doc_obj = $(this).data('doc_obj');
        $project_id = $('#project_id').val();

        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-requirement-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {project_id: $project_id, doc_obj: $doc_obj},
                success: function (returnData) {
                    console.log(returnData);
                    $('#req_gather_details_table').closest('tr').remove();
                    notification(returnData);
                    //refresh table
                    initGatherRequirementTable()

                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });

    //Delete Quotation     
    $('#quotation_list_table').on('click', '.delete', function(){
        $project_id = $(this).data('project_id');
        $bi_obj = $(this).data('bi_obj');

        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-quotation-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {project_id: $project_id, bi_obj: $bi_obj},
                success: function (returnData) {
                    console.log(returnData);
                    $('#quotation_list_table').closest('tr').remove();
                    notification(returnData);
                    //refresh table
                    initQuotationListTable()
                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });

    //Delete Particulars     
    $('#tableParticularsEdit').on('click', '.delete', function(){
        $project_id = $(this).data('project_id');
        $bi_obj = $(this).data('bi_obj');
        $parti_obj = $(this).data('parti_obj');

        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-particular-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: { project_id: $project_id, bi_obj: $bi_obj, parti_obj: $parti_obj },
                success: function (returnData) {
                    console.log(returnData);
                    $('#tableParticularsEdit').closest('tr').remove();
                    notification(returnData);
                    //refresh table
                    initTableParticulars($project_id, $bi_obj, 'tableParticularsEdit');
                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });

    //Delete Commission     
    $('#p_commissionListEdit').on('click', '.delete', function(){
        $project_id = $(this).data('project_id');
        $bi_obj = $(this).data('bi_obj');
        $comi_obj = $(this).data('comi_obj');

        if(confirm("Are You Sure? This Process Can\'t be Undone.")){
            $pk = $(this).attr('data-pk');
            
            $.ajax({
                url: "<?= base_url('admin/del-row-commission-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: { project_id: $project_id, bi_obj: $bi_obj, comi_obj: $comi_obj },
                success: function (returnData) {
                    console.log(returnData);
                    $('#p_commissionListEdit').closest('tr').remove();
                    notification(returnData);
                    //refresh table
                    initTableCommission($project_id, $bi_obj, 'p_commissionListEdit');
                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }        
    });


    //Tax calculation
    function calculateTax($add_edit, $project_id, $bi_obj){
        $.ajax({
            url: "<?= base_url('admin/calculate-tax/') ?>",
            dataType: 'json',
            type: 'POST',
            data: { project_id: $project_id, bi_obj: $bi_obj },
            success: function (returnData) {
                notification(returnData);
                $tax_obj = returnData.tax_obj;
                
                console.log(JSON.stringify(returnData.tax_obj))
                console.log('tax_GrossAmount: '+returnData.tax_obj.tax_GrossAmount)

                if($add_edit == 'add'){
                    $('#tax_GrossAmount').val($tax_obj.tax_GrossAmount);
                    $('#tax_DiscountPercentage').val($tax_obj.tax_DiscountPercentage);
                    $('#tax_DiscountAmount').val($tax_obj.tax_DiscountAmount);
                    $('#tax_TaxableAmount').val($tax_obj.tax_TaxableAmount);
                    $('#tax_SGST_Rate').val($tax_obj.tax_SGST_Rate);
                    $('#tax_SGST_Amount').val($tax_obj.tax_SGST_Amount);
                    $('#tax_CGST_Rate').val($tax_obj.tax_CGST_Rate);
                    $('#tax_CGST_Amount').val($tax_obj.tax_CGST_Amount);
                    $('#tax_IGST_Rate').val($tax_obj.tax_IGST_Rate);
                    $('#tax_IGST_Amount').val($tax_obj.tax_IGST_Amount);
                    $('#tax_NetAmount').val($tax_obj.tax_NetAmount);
                    $('#tax_TotalTax').val($tax_obj.tax_TotalTax);
                }else{
                    $('#tax_GrossAmount_e').val($tax_obj.tax_GrossAmount);
                    $('#tax_DiscountPercentage_e').val($tax_obj.tax_DiscountPercentage);
                    $('#tax_DiscountAmount_e').val($tax_obj.tax_DiscountAmount);
                    $('#tax_TaxableAmount_e').val($tax_obj.tax_TaxableAmount);
                    $('#tax_SGST_Rate_e').val($tax_obj.tax_SGST_Rate);
                    $('#tax_SGST_Amount_e').val($tax_obj.tax_SGST_Amount);
                    $('#tax_CGST_Rate_e').val($tax_obj.tax_CGST_Rate);
                    $('#tax_CGST_Amount_e').val($tax_obj.tax_CGST_Amount);
                    $('#tax_IGST_Rate_e').val($tax_obj.tax_IGST_Rate);
                    $('#tax_IGST_Amount_e').val($tax_obj.tax_IGST_Amount);
                    $('#tax_NetAmount_e').val($tax_obj.tax_NetAmount);
                    $('#tax_TotalTax_e').val($tax_obj.tax_TotalTax);                    
                }//end if

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    }//end

    function getTransactionId(){
        const d = new Date().toLocaleString();
        const date = new Date();

        var m1 = date.getMonth();
        var m2 = 0;    
        var m2 = m1 + 1;
        if(parseInt(m2) < 10){
            m2 = '0'+m2;
        }


        var dt1 = date.getDate();
        var dt2 = 0;
        if(parseInt(dt1) == 0){
            var dt2 = dt1 + 1;
        }else{
            var dt2 = dt1;
        }
        if(parseInt(dt2) < 10){
            dt2 = '0'+dt2;
        }

        var hr = date.getHours();
        if(parseInt(hr) < 10){
            hr = '0'+hr;
        }
        
        var mt = date.getMinutes();
        if(parseInt(mt) < 10){
            mt = '0'+mt;
        }
        
        var sc = date.getSeconds();
        if(parseInt(sc) < 10){
            sc = '0'+sc;
        }

        const transId1 = dt2+'_'+m2+'_'+date.getFullYear()+'_'+hr+'_'+mt+'_'+sc;        
        //const created_at1 = date.getFullYear()+'-'+m2+'-'+dt2+' '+hr+':'+mt+':'+sc;

        return transId1;
    }//end fun
    
    // Clone area
    


    

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
