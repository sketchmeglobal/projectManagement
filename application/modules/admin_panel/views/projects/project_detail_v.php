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
                                    <div class="col-lg-3">
                                        <label for="project_title" class="control-label">Title</label>
                                        <input type="text" name="project_title" id="project_title" class="form-control">
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="project_description" class="control-label">Description</label>
                                        <textarea name="project_description" id="project_description" class="form-control"></textarea>
                                    </div> 

                                    <div class="col-lg-3">
                                        <input type="submit" name="project_details_submit" class="btn btn-success text-center" id="project_details_submit" value="Add">
                                        <input type="hidden" value="<?=$project_id?>" name="project_id" id="project_id">
                                    </div>
                                </div>  
                            <!-- </form> -->

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
                                <li class="active"><a href="#contact_details_list" data-toggle="tab">List</a></li>
                                <li  id="contact_details_add_tab"><a href="#contact_details_add" data-toggle="tab">Add</a></li>
                                <li id="contact_details_edit_tab" class="disabled"><a href="#contact_details_edit" data-toggle="tab">Edit</a></li>
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
                                                <label for="contact_first_ph" class="control-label">Phone 1st</label>
                                                <input type="text" name="contact_first_ph" id="contact_first_ph" class="form-control">
                                            </div>    
                                            <div class="col-lg-3">
                                                <label for="contact_second_ph" class="control-label">Phone 2nd</label>
                                                <input type="text" name="contact_second_ph" id="contact_second_ph" class="form-control">
                                            </div>  
                                            <div class="col-lg-3">
                                                <label for="contact_persn_address" class="control-label">Address</label>
                                                <textarea name="contact_persn_address" id="contact_persn_address" class="form-control"></textarea>
                                            </div>  
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="contact_details_submit" class="btn btn-success text-center" id="contact_details_submit" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="contact_details_edit" class="tab-pane">
                                    <br/>
                                    <div class="form">                                        
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
                                                    <label for="e_contact_first_ph" class="control-label">Phone 1st</label>
                                                    <input type="text" name="e_contact_first_ph" id="e_contact_first_ph" class="form-control">
                                                </div>    
                                                <div class="col-lg-3">
                                                    <label for="e_contact_second_ph" class="control-label">Phone 2nd</label>
                                                    <input type="text" name="e_contact_second_ph" id="e_contact_second_ph" class="form-control">
                                                </div>  
                                                <div class="col-lg-3">
                                                    <label for="e_contact_persn_address" class="control-label">Address</label>
                                                    <textarea name="e_contact_persn_address" id="e_contact_persn_address" class="form-control"></textarea>
                                                </div>  
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="e_contact_details_submit" class="btn btn-success text-center" id="e_contact_details_submit" value="Update">
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
                                                    <option value="1" > Mr. Jana </option>
                                                    <option value="2" > Mr. Roy </option>
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
                                            </div>
                                        </div>                                            
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

                                <div id="quotation_add" class="tab-pane fade">                                    
                                    <div class="form">
                                        <form autocomplete="off" id="form_particular_basic_info_add" method="post" action="<?=base_url('admin/form-parti-basic-info-add')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                                            <div class="form-group " style="float: left;"> 
                                                <h4 style="margin-left: 15px;">Basic Information</h4>
                                                <div class="col-lg-3">
                                                    <label for="bi_PartyId" class="control-label">Select Party</label>
                                                    <select name="bi_PartyId" id="bi_PartyId" class="form-control select2">
                                                        <option value="0" >-- Select Party --</option>
                                                        <option value="1" >-- Party 1--</option>
                                                        <option value="2" >-- Party 2 --</option>
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
                                                        <option value="1" > Cash </option>
                                                        <option value="2" > Card </option>
                                                        <option value="3" > Cheque </option>
                                                        <option value="3" > UPI </option>
                                                        <option value="4" > Bank Transfer </option>
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
                                                    <input type="hidden" name="parti_bi_project_id" id="parti_bi_project_id" value="">
                                                </div> 
                                            </div>
                                        </form>
                                        
                                        <div class="form-group " style="float: left;"> 
                                            <h4 style="margin-left: 15px;">Particulars</h4>
                                            <div id="quotation_list" class="tab-pane fade in active">
                                                <table id="" class="table data-table dataTable">
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Domain with Privacy settings FOR 2 YEARS</td>
                                                            <td>998314</td>
                                                            <td>1 Year</td>
                                                            <td>22-05-2023</td>                                            
                                                            <td>1000</td>                                           
                                                            <td>Yes</td>
                                                            <td>Edit | Delete</td>
                                                        </tr>
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
                                                        <option value="1" > Web Design </option>
                                                        <option value="2" > Web Development </option>
                                                        <option value="3" > SSL </option>
                                                        <option value="3" > Domain with Privacy settings FOR 2 YEARS </option>
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
                                                        <option value="1" > YES </option>
                                                        <option value="2" > NO </option>
                                                    </select>
                                                </div> 
                                                <div class="col-lg-3" style="margin-top: 25px;">
                                                    <label for="product_line_po" class="control-label"></label>
                                                    <input type="submit" name="particular_details_submit" class="btn btn-success text-center" id="particular_details_submit" value="Add Particular">
                                                    <input type="hidden" name="parti_project_id" id="parti_project_id" value="">
                                                </div> 
                                            </form>
                                        </div> 
                                        
                                        <div class="form-group " style="float: left;"> 
                                            <h4 style="margin-left: 15px;">TAX Calculation</h4>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Gross Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Gross Amount" class="form-control" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Discount Percentage</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Discount Percentage" class="form-control" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Discount Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Discount Amount" class="form-control" />
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Taxable Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Taxable Amount" class="form-control" />
                                            </div> 
                                            
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">SGST (in %)</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="SGST(in %)" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">SGST Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="SGST Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">CGST (in %)</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="CGST (in %)" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">CGST Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="CGST Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">IGST (in %)</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="IGST (in %)" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">IGST Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="IGST Amount" class="form-control" />
                                            </div>
                                            
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Net Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Net Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Total Tax.</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Total Tax." class="form-control" />
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Bank</label>
                                                <select name="company_id" id="company_id" class="form-control select2">
                                                    <option value="0" >-- Select Bank --</option>
                                                    <option value="1" > HDFC </option>
                                                    <option value="2" > SBI </option>
                                                </select>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Show Stamp</label>
                                                <select name="company_id" id="company_id" class="form-control select2">
                                                    <option value="1" > YES </option>
                                                    <option value="2" > NO </option>
                                                </select>
                                            </div> 
                                        </div>

                                        <div class="form-group " style="float: left;"> 
                                            <h4 style="margin-left: 15px;">Project Commission</h4>
                                              
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Employee</label>
                                                <select name="company_id" id="company_id" class="form-control select2">
                                                    <option value="0" >-- Select Employee --</option>
                                                    <option value="1" > Mr. Jana </option>
                                                    <option value="2" > Mr. Roy </option>
                                                </select>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Rate Type</label>
                                                <select name="company_id" id="company_id" class="form-control select2">
                                                    <option value="1" > Flate Rate </option>
                                                    <option value="2" > Percentage </option>
                                                </select>
                                            </div> 
                                            <div class="col-lg-3">
                                                <label for="product_description" class="control-label">Amount</label>
                                                <input value="0" id="offer_number" name="offer_number" type="text" placeholder="Amount" class="form-control" />
                                            </div>
                                            <div class="col-lg-3" style="margin-top: 25px;">
                                                <label for="product_line_po" class="control-label"></label>
                                                <input type="submit" name="offer_details_submit" class="btn btn-success text-center" id="offer_details_submit" value="Add Commission">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="quotation_edit" class="tab-pane">
                                    
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
            <!-- End Quotation Part -->
            
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
        initProjectDescription()

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

        //Quotation
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

    //Contact Details Part
    $('#contact_details_submit').click(function(){
        $cont_person_name = $('#cont_person_name').val();
        $org_name = $('#org_name').val();
        $contact_email = $('#contact_email').val();
        $contact_first_ph = $('#contact_first_ph').val();
        $contact_second_ph = $('#contact_second_ph').val();
        $contact_persn_address = $('#contact_persn_address').val();

        $('#myLoading').show();

        if($cont_person_name == ''){
            alert('Please enter cont person name');
            $('#cont_person_name').focus();
            $('#myLoading').hide();
        }else if($contact_first_ph == ''){
            alert('Please enter 1st phone number');
            $('#contact_first_ph').focus();
            $('#myLoading').hide();
        }else{        
            $contact_obj = getTransactionId();
            $contactDetail = {
                contact_obj: $contact_obj,
                cont_person_name: $cont_person_name,
                org_name: $org_name,
                contact_email: $contact_email,
                contact_first_ph: $contact_first_ph,
                contact_second_ph: $contact_second_ph,
                contact_persn_address: $contact_persn_address
            }

            $project_description.contactDetail.push($contactDetail)
            updateProjectDescription()
            $('#myLoading').hide();
        }
    })//end fun
    

    
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

    //Add particular
    $("#par_TaskType").change(function(){
        $par_TaskType_name = $("#par_TaskType :selected").text();
        $('#par_TaskType_name').val($par_TaskType_name);
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
    //end particulars



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
                    $('#gr_project_id').val(returnData.project_id);
                    $('#parti_project_id').val(returnData.project_id);
                    $('#parti_bi_project_id').val(returnData.project_id);
                }

            },
            error: function (returnData) {
                obj = JSON.parse(returnData);
                notification(obj);
            }
        });
    }//end fun

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
