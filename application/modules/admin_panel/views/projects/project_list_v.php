<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?> | <?=WEBSITE_NAME;?></title>
    <meta name="description" content="<?=$title?>">

    <!--Data Table-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Buttons-1.5.6/css/buttons.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/admin_panel/js/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

    <!--Select2-->
    <link href="<?=base_url();?>assets/admin_panel/css/select2.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/admin_panel/css/select2-bootstrap.css" rel="stylesheet">

    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <style type="text/css">
        .ic label{text-decoration: underline;cursor: pointer;}
        .modal-dialog{width:90%}
    </style>
    
    <style>
        

        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default{
            border-radius: 0%  !important;
        }
        .ui-widget-content{
            width: auto !important;
        }

        .ui-datepicker th{
            color: black !important;
        }

        .ui-datepicker td a:hover {
            background: #1CAF9A !important;
            color: #000 !important;
        }
        
        /* The actual timeline (the vertical ruler) */
        .timeline {
          position: relative;
          max-width: 1200px;
          margin: 0 auto;
        }
        
        /* The actual timeline (the vertical ruler) */
        .timeline::after {
          content: '';
          position: absolute;
          width: 6px;
          background-color: #000;
          top: 0;
          bottom: 0;
          left: 49.5%;
          outline: 3px solid #dce1fb;
          outline-offset: 1px;
          /*margin-left: -3px;*/
        }
        
        /* Container around content */
        .tcontainer {
          padding: 10px 40px;
          position: relative;
          background-color: inherit;
          width: 49.50%;
        }
        
        /* The circles on the timeline */
        .tcontainer::after { 
          content: '';
          position: absolute;
          width: 25px;
          height: 25px;
          right: -17px;
          background-color: white;
          border: 4px solid #FF9F55;
          top: 15px;
          border-radius: 50%;
          z-index: 1;
        }
        .tbreak{ width: 100%;z-index: 1;text-align: center;position: relative; }
        .tbreak .tcontent{padding:0;background: #607d8b;color: #fff;}
        
        /* Place the container to the left */
        .tleft {
          left: 0;
        }
        
        /* Place the container to the right */
        .tright {
          left: 50%;
        }
        
        /* Add arrows to the left container (pointing right) */
        .tleft::before {
          content: " ";
          height: 0;
          position: absolute;
          top: 22px;
          width: 0;
          z-index: 1;
          right: 30px;
          border: medium solid #c7aeae;
          border-width: 10px 0 10px 10px;
          border-color: transparent transparent transparent #c7aeae;
        }
        
        /* Add arrows to the right container (pointing left) */
        .tright::before {
          content: " ";
          height: 0;
          position: absolute;
          top: 22px;
          width: 0;
          z-index: 1;
          left: 30px;
          border: medium solid #c7aeae;
          border-width: 10px 10px 10px 0;
          border-color: transparent #c7aeae transparent transparent;
        }
        
        /* Fix the circle for containers on the right side */
        .tright::after {
          left: -16px;
        }
        
        /* The actual content */
        .tcontent {
          padding: 20px 30px;
          background-color: #c7aeae;
          position: relative;
          border-radius: 6px;
        }
        
        .tcontent-active{
            outline: 3px dotted red;
            outline-offset: -6px;
            border-radius: 10px;
        }
        
        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {
          /* Place the timelime to the left */
          .timeline::after {
            left: 31px;
          }
          
          /* Full-width containers */
          .tcontainer {
              width: 100%;
              padding-left: 70px;
              padding-right: 25px;
          }
          
          /* Make sure that all arrows are pointing leftwards */
          .tcontainer::before {
              left: 60px;
              border: medium solid white;
              border-width: 10px 10px 10px 0;
              border-color: transparent white transparent transparent;
          }
        
          /* Make sure all circles are at the same spot */
          .tleft::after, .right::after {
            left: 15px;
          }
          
          /* Make all right containers behave like the left ones */
          .tright {
            left: 0%;
          }
        }
        </style>

</head>

<body class="sticky-header">
<div id="offer-type"><?=$this->input->get('show')?></div>
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
                <?php if($insert != ''){
                    ?>
                    <div class="badge badge-right"><?=$insert?></div>
                    <?php
                } ?>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form class="form-inline">
                      <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Start</label>
                        <input type="search" class="form-control" id="startdate" required name="startdate" placeholder="Enter From Date">
                      </div>
                       <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">End</label>
                        <input type="search" class="form-control" id="enddate" name="enddate" required placeholder="Enter To Date">
                      </div>
                      <button type="button" class="btn btn-primary mb-2" id="filter">Filter</button>
                      &nbsp;&nbsp;
                      <button type="button" class="btn btn-danger mb-2" id="dtblclr" onclick="document.getElementById('startdate').value='';document.getElementById('enddate').value='';return false;" >Clear</button>
                    </form>
                </div>
                <div class="col-lg-12 text-right">
                    <?php
                    if($this->session->usertype != 3){
                    ?>
                        <a href="<?= base_url('admin/project-detail/0') ?>" class="btn btn-success  mx-auto"><i class="fa fa-plus"></i> Add <?=$menu?></a>
                        <!-- <a href="<?= base_url('admin/offers?show=closed') ?>" class="btn btn-default mx-auto"><i class="fa fa-eye"></i> Closed <?=$menu?></a> -->
                    <?php
                    }
                    ?>
                    <section class="panel">
                        <div class="panel-body">
                            <table id="Project_table" class="table data-table dataTable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Project ID</th>
                                        <th>Project Name</th>
                                        <th>Create Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
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

<!-- Request modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Send Edit Request</h4>
            </div>
            <div class="modal-body">
                <form id="request_offer" method="post" action="<?=base_url('admin/request-offer')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                    <div class="form-group ">
                        <label class="control-label col-md-4 text-danger">Comment*</label>
                        <div class="col-md-8">
                           <textarea name="comment" id="comment" required="" class="form-control"></textarea>
                           <span class="help-block">Write why you want to have access</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="offer_id" value="" id="offer_id">
                            <input type="submit" name="request-submit" value="Send" id="request-submit" class="btn btn-success pull-right">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Company modal -->
<div class="modal fade " id="com_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Choose which company you want to show</h4>
            </div>
            <div class="modal-body">
                <form id="request_offer" method="post" action="<?=base_url('admin/request-offer')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                    <div class="form-group ">
                        <label class="control-label col-md-2 text-danger">Select company</label>
                        <div class="col-md-6">
                           <select class="form-control" name="conmany_id" required id="conmany_id">
                            <option value=""> -- Select Company -- </option>
                            <?php 
                                foreach ($company_details as $key => $value) {
                            ?>
                               <option value="<?=$value->company_id?>"><?=$value->company_name?></option>
                           <?php } ?>
                           </select>
                        </div>

                        <div class="col-md-4">
                            <input type="hidden" name="offer_id1" value="" id="offer_id1">
                            <a href="" class="btn btn-success" id="view_offer_link" target="_blank">View Offer</a>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-md-12">
                            
                            
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Comments modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Resource Comment Details</h4>
            </div>
            <div class="modal-body">
                
                <!-- for auto open of modal if redirected from dashboard -->

                <span id="resolve_offer_id" class="hidden">
                    <?=$this->input->get('oid')?>
                </span>
                <span id="resolve_oc_id"  class="hidden">
                    <?=$this->input->get('ocid')?>
                </span>

                <table id="all_offer_comments" class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Offer</th>
                            <th>Resource Name</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>    
                </table>
                
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View (Settings) modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Assign Templates</h4>
            </div>
            <div class="modal-body">
                
                <!-- for auto open of modal if redirected from dashboard -->
                <div class="col-md-12 panel">
                    <h4 class="text-center bg-primary" style="padding: 1%">
                        Offer name <span id="mar_offer_name"></span> is assigned to <span id="mar_offer_assigned_to"></span>
                        with template <span id="mar_offer_assigned_template"></span>
                    </h4>
                    <form id="offer_modal_form" class="panel-body" >
                        
                        <div class="col-lg-2">
                            <label>Select Resource Developer</label>
                            <select multiple="" id="resource_id" name="resource_id[]" class="select2 form-control">
                                <?php foreach($res_users as $mu){ ?>
                                <option value="<?=$mu->user_id?>"><?=$mu->username?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Select Marketing Personnel</label>
                            <select multiple="" id="marketing_id" name="marketing_id[]" class="select2 form-control">
                                <?php foreach($mar_users as $mu){ ?>
                                <option value="<?=$mu->user_id?>"><?=$mu->username?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Select Template</label>
                            <select name="vt_id" id="vt_name" class="select2 form-control">
                                <?php foreach($view_templates as $template){ ?>
                                <option value="<?=$template->vt_id?>"><?=$template->template_name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Action</label><br>
                            <input type="submit" class="btn btn-success template_assign_insert" id="template_assign_insert"  name="template_assign_insert" value="Assign" />


                             <input type="hidden" name="template_assign_update" value="">

                            <input type="submit" class="btn btn-success hidden template_assign_update" onclick="this.form.template_assign_update.value=this.value" value="Update" name="template_assign_update1" />

                            <button type="button" class="btn btn-success btn-large mar_final_btn" onclick="mar_final()" id="mar_final_btn">FINALISE</button>

                            <!-- <a target="_blank" href="" class="btn btn-warning view_offer1">View (Comp1)</a>

                            <a target="_blank" href="" class="btn btn-warning view_offer2">View (Comp2)</a> -->
                        </div>

                        <!-- HIDDEN FIELDS -->  
                        <input type="hidden" name="assigned_template_id" value="" id="assigned_template_id">
                        <input type="hidden" name="template_offer_id" value="" id="template_offer_id">

                    </form>

                </div>
               
                
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Status modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Offer Status</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12 panel">
                    
                    <div class="timeline">
                      <div class="tbreak">
                        <div class="tcontent">
                          <h3>Resource Developer</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>
                      
                      <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Offer creation</h4><hr>
                          <p id="rd_name_and_date">Raja Das on 13-10-2021</p>
                        </div>
                      </div>
                      
                      <div class="tcontainer tright">
                        <div class="tcontent">
                          <h4>Offer finalisation</h4><hr>
                          <p id="rd_finalise">On 13-10-2021</p>
                        </div>
                      </div>
                      
                      <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Offer requests (pending)</h4><hr>
                          <p id="rd_access_pending">Yes, from 15-09-2021</p>
                        </div>
                      </div>
                      
                      <div class="tbreak">
                        <div class="tcontent">
                          <h3>Trader</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>
                      
                      <div class="tcontainer tright">
                        <div class="tcontent">
                          <h4>Buying price</h4><hr>
                          <p id="trader_buying_price">Total No of products: <br> Buying price added: </p>
                        </div>
                      </div>
                      <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Selling price</h4><hr>
                          <p id="trader_selling_price">Total No of products: <br> Selling price added: </p>
                        </div>
                      </div>
                      <div class="tcontainer tright">
                        <div class="tcontent">
                          <h4>Templating</h4><hr>
                          <p id="trader_template">Template assigned and finalised: Yes</p>
                        </div>
                      </div>
                      <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Mailing permission</h4><hr>
                          <p id="mail_permission">Mailing permission provided: Yes </p>
                        </div>
                      </div>
                      <div class="tbreak">
                        <div class="tcontent">
                          <h3>Marketer</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>
                      <div class="tcontainer tright">
                        <div class="tcontent">
                          <h4>Client communication</h4><hr>
                          <p id="final_mail_send_status"></p>
                        </div>
                      </div>
                      <!-- <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Invoicing</h4><hr>
                          <p id="trader_selling_price">PO/PI status: Done </p>
                        </div>
                      </div> -->
                       <div class="tbreak">
                        <div class="tcontent">
                          <h3>Offer Closed</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>


                      <div class="tbreak">
                        <div class="tcontent">
                          <h3>Export</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>

                       <div class="tcontainer tleft">
                        <div class="tcontent">
                          <h4>Exporter</h4><hr>
                          <p id="export_status"> PO/PI status: Done </p>
                        </div>
                      </div>


                      <div class="tbreak">
                        <div class="tcontent">
                          <h3>End</h3>
                          <p id="sent_to_trader"></p>
                        </div>
                      </div>

                    </div>
                        
                </div>
               
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/admin_panel/js/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!--form validation-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.validate.min.js"></script>
<!--ajax form submit-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.form.min.js"></script>
<!--Select2-->
<script src="<?=base_url();?>assets/admin_panel/js/select2.js" type="text/javascript"></script>
<script>

    $('.select2').select2({
        placeholder: "Select any options",
        
    });

</script>
<script>
    var table = '';
    $(document).ready(function() {
        $url_segment = $("#offer-type").text();
       table =  $('#Project_table').DataTable( {
            "scrollX": true,
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-project-table-data?show=')?>"+ $url_segment,
                "type": "POST",
                "dataType": "json",
                "data": function(data){
                  // Read values
                  var from_date = $('#startdate').val();
                  var to_date = $('#enddate').val();

                  // Append to data
                  data.searchByFromdate = from_date;
                  data.searchByTodate = to_date;
               }
            },
            "rowCallback": function (row, data) {
                console.log(data);
                if (data.coi != null) {
                    $(row).addClass('bg-green1');
                }
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "sl_no" },
                { "data": "projectAutoGeneratedId" },
                { "data": "project_name" },
                { "data": "create_dt" },
                { "data": "action" }
            ],
            //column initialisation properties
            // "columnDefs": [{
            //     "targets": [4,5,6,7,8,9,10,11], //disable 'Image','Actions' column sorting
            //     "orderable": false,
            // },
            // {
            //     "targets": [10],
            //     "visible": false
            // },
            // { 
            //     "className": "nowrap", 
            //     "targets": [ 11 ] 
            // },
            // { 
            //     "className": "ic", 
            //     "targets": [ 8 ] 
            // },
            // ],
           
            "initComplete": function(settings, json) {
                
                var roi = $("#resolve_offer_id").text().trim();
                // var roci = $("#resolve_oc_id").text().trim();

                $("#Project_table tr").each(function() { 
                    var pointer = $(this).find('td:last').children('button.all_comments');
                    var oid = $(this).find('td:last').children('button.all_comments').data('offer_id');
                    if(roi == oid){
                        pointer.trigger('click');
                    }
                });

              }
        } );
    });
    
    

    $('#Project_table').on('click', '.delete', function(){
        $this = $(this);
        if(confirm("Are You Sure? This Process Can\'t be Undone.")){

            $project_id = $(this).data('project_id');           

            $.ajax({
                url: "<?= base_url('admin/del-row-project-details/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {project_id: $project_id},
                success: function (returnData) {
                    notification(returnData);

                    //refresh table
                    $('#Project_table').closest('tr').remove();
                    $("#Project_table").DataTable().ajax.reload();

                },
                error: function (returnData) {
                    obj = JSON.parse(returnData);
                    notification(obj);
                }
            });
        }
   
    });
</script>


<script type="text/javascript">
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
            "hideDuration": "5000",
            "timeOut": "5000",
            "extendedTimeOut": "7000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        })
    }


     
$(document).ready(function(){
    $( "#startdate,#enddate" ).datepicker({ 
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
    });
});
</script>

</body>
</html>