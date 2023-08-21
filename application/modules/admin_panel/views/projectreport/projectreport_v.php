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

    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <style type="text/css">
        .ic label{text-decoration: underline;cursor: pointer;}
        /*.ic span{text-decoration: none;cursor: default;}*/
        .bg-green2{background: #bebde1;color: #000;border: 1px solid #14a95d;}
        .bg-green3{background: #bdb6b6;color: #000;border: 1px solid #14a95d;}
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
            <div class="form-group " style="float: left;width: 100%;"> 
                <h4>Search Panel</h4>
                <form autocomplete="off" id="search_p_report" method="post" action="<?=base_url('admin/form-search-project-report')?>" enctype="multipart/form-data" class="cmxform form-horizontal tasi-form">
                    <div class="col-lg-3">
                        <label for="fromDate" class="control-label">From date</label>
                        <input type="date" name="fromDate" id="fromDate" class="form-control">
                    </div>   
                    <div class="col-lg-3">
                        <label for="toDate" class="control-label">To Date</label>
                        <input type="date" name="toDate" id="toDate" class="form-control">
                    </div> 
                    <div class="col-lg-3">
                        <label for="empId" class="control-label">Employee Name</label>
                        <select name="empId" id="empId" class="form-control select2">
                            <option value="0" >-- Select Employee --</option>
                            <option value="1" >Mr. Developer</option>
                            <option value="2" >Mr. Designer</option>
                        </select>
                    </div> 
                    <div class="col-lg-3">
                        <label for="projectStatus" class="control-label">Project Status</label>
                        <select name="projectStatus" id="projectStatus" class="form-control select2">
                            <option value="0" >-- Select Status --</option>
                            <option value="1" >Completed</option>
                            <option value="2" >Inprogress</option>
                        </select>
                    </div> 

                    <div class="col-lg-3" style="margin-top: 25px;">
                        <label for="product_line_po" class="control-label"></label>
                        <input type="button" name="contact_details_submit" class="btn btn-success text-center" id="contact_details_submit" value="Search">
                    </div> 
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12 text-right">
                    <!-- <a href="< ?= base_url('admin/add-employee') ?>" class="btn btn-success  mx-auto"><i class="fa fa-plus"></i> Add < ?=$menu?></a> -->
                    <section class="panel">
                        <div class="panel-body">


                            <table id="project_report_table" class="table data-table dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Project Name</th>
                                        <th>Created on</th>
                                        <th>Project status</th>
                                        <th>Gross Amount</th>
                                        <th>Taxable Amount</th>
                                        <th>Total Tax</th>
                                        <th>Net Amount</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!--form validation-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.validate.min.js"></script>
<!--ajax form submit-->
<script src="<?=base_url();?>assets/admin_panel/js/jquery.form.min.js"></script>


<script>
    //Search project report
    /*$("#search_p_report").validate({        
        rules: {  
        },
        messages: {

        }
    });
    $('#search_p_report').ajaxForm({
        beforeSubmit: function () {
            return $("#search_p_report").valid(); // TRUE when form is valid, FALSE will cancel submit
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
    });*/
    //end searching

    $('#contact_details_submit').on('click', function(){
        //alert('ok')
        $fromDate = $('#fromDate').val();
        $toDate = $('#toDate').val();
        $empId = $('#empId').val();
        $projectStatus = $('#projectStatus').val();

        $('#project_report_table').dataTable().fnClearTable();
        $('#project_report_table').dataTable().fnDestroy();
        
        $('#project_report_table').DataTable( {
            // "scrollX": true,
            "processing": true,
            "language": {
                processing: '<img src="<?=base_url('assets/img/ellipsis.gif')?>"><span class="sr-only">Processing...</span>',
            },
            "serverSide": true,
            "ajax": {
                "url": "<?=base_url('admin/ajax-project-report-table-data')?>",
                "type": "POST",
                "dataType": "json",
                "data": {fromDate: $fromDate, toDate: $toDate, empId: $empId, projectStatus: $projectStatus}
            },
            "rowCallback": function (row, data) {
                // console.log(data);
            },
            //will get these values from JSON 'data' variable
            "columns": [
                { "data": "slNo" },
                { "data": "projectName" },
                { "data": "created_at" },
                { "data": "projectStatus" },
                { "data": "grossAmount" },
                { "data": "taxableAmount" },
                { "data": "totalTax" },
                { "data": "netAmount" }
            ],
            //column initialisation properties
            
           
            "initComplete": function(settings, json) {   

              }
        });
    });

   

    $(document).on('click', '.delete', function(){
        $this = $(this);
        if(confirm("Are You Sure? This Process Can\'t be Undone.")){

            $emp_id = $(this).data('emp_id');           

            $.ajax({
                url: "<?= base_url('admin/ajax-delete-employee/') ?>",
                dataType: 'json',
                type: 'POST',
                data: {emp_id: $emp_id},
                success: function (returnData) {
                    console.log(returnData);
                   
                    notification(returnData);

                    //refresh table
                    $("#project_report_table").DataTable().ajax.reload();

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
</script>

</body>
</html>