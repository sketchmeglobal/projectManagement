<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | <?=WEBSITE_NAME;?></title>
    <meta name="keyword" content="user dashboard">
    <meta name="description" content="account statistic">

    <!-- common head -->
    <?php $this->load->view('components/_common_head'); ?>
    <!-- /common head -->
</head>

<body class="sticky-header">

<section>
    <!-- sidebar left start (Menu)-->
    <?php $this->load->view('components/left_sidebar'); //left side menu ?>
    <!-- sidebar left end (Menu)-->
    <style>
        .p-1{padding: 1%;}
        .pt-0{padding-top: 0}
        .px-1{padding: 1rem 0;}
        .mb-1{margin-bottom: 1rem;}
        .mb-2{margin-bottom: 2rem;}
        .panel{min-height: 400px;}
        .panel-footer {background-color: rgb(0 0 0 / 15%);position: absolute;bottom: 0;width: 100%;}
        .text-white{color:#fff;}
        .text-dark{color:#000;}
        .border-bottom{border-bottom: 1px solid #787878;}
    </style>
    <!-- body content start-->
    <div class="body-content" style="min-height: 1500px;">

        <!-- header section start-->
        <?php $this->load->view('components/top_menu'); ?>
        <!-- header section end-->

        <!-- page head start-->
        <div class="page-head">
            <h3>Dashboard</h3>
            <span class="sub-title">Welcome to <?=WEBSITE_NAME;?> dashboard</span>
        </div>
        <!-- page head end-->

         <!--body wrapper start-->
        <div class="wrapper">
            <div class="form-group " style="float: left;width: 100%;"> 
            <h4>Search Panel</h4>
                <div class="col-lg-3">
                    <label for="cont_person_name" class="control-label">From date</label>
                    <input type="date" name="cont_person_name" id="cont_person_name" class="form-control">
                </div>   
                <div class="col-lg-3">
                    <label for="org_name" class="control-label">To Date</label>
                    <input type="date" name="org_name" id="org_name" class="form-control">
                </div> 
                <div class="col-lg-3">
                    <label for="bi_PartyId" class="control-label">Employee Name</label>
                    <select name="bi_PartyId" id="bi_PartyId" class="form-control select2">
                        <option value="0" >-- Select Employee --</option>
                        <option value="1" >Mr. Developer</option>
                        <option value="2" >Mr. Designer</option>
                    </select>
                </div> 
                <div class="col-lg-3">
                    <label for="bi_PartyId" class="control-label">Project Status</label>
                    <select name="bi_PartyId" id="bi_PartyId" class="form-control select2">
                        <option value="0" >-- Select Status --</option>
                        <option value="1" >Completed</option>
                        <option value="2" >Inprogress</option>
                    </select>
                </div> 

                <!-- <div class="col-lg-3" style="margin-top: 25px;">
                    <label for="product_line_po" class="control-label"></label>
                    <input type="submit" name="contact_details_submit" class="btn btn-success text-center" id="contact_details_submit" value="Add">
                </div>  -->
            </div>

        
            <div class="form-group " style="float: left;width: 100%; display: none"> 
            <h4>Project Summary Table</h4>
            <table id="datatable" class="table data-table dataTable" style="width: 100%;">
                <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Assigned to</th>                                            
                    <th>Project Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>NMHS Portal</td>
                    <td>27-04-2023</td>
                    <td>15-09-2023</td>
                    <td>Mr. Developer</td>                                            
                    <td>Inprogress</td>
                    <td>
                        <a href="javascript:void(0)" data-offer_id="0" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-offer_id="0" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Contai Public School</td>
                    <td>15-01-2023</td>
                    <td>20-04-2023</td>
                    <td>Mr. Developer</td>                                            
                    <td>Completed</td>
                    <td>
                        <a href="javascript:void(0)" data-offer_id="0" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-offer_id="0" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>State Medical Library</td>
                    <td>25-08-2022</td>
                    <td>10-12-2022</td>
                    <td>Mr. Developer</td>                                            
                    <td>Completed</td>
                    <td>
                        <a href="javascript:void(0)" data-offer_id="0" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-offer_id="0" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Digital Laboratory</td>
                    <td>05-05-2022</td>
                    <td>20-08-2022</td>
                    <td>Mr. Developer</td>                                            
                    <td>Completed</td>
                    <td>
                        <a href="javascript:void(0)" data-offer_id="0" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-offer_id="0" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Sea Food Trading</td>
                    <td>02-01-2022</td>
                    <td>25-04-2022</td>
                    <td>Mr. Developer</td>                                            
                    <td>Completed</td>
                    <td>
                        <a href="javascript:void(0)" data-offer_id="0" class="btn bg-yellow slt_view_ofr"><i class="fa fa-eye"></i> View</a>
                        <a href="javascript:void(0)" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                        <a data-offer_id="0" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>
                    </td>
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                    <th>Sl#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Assigned to</th>                                            
                    <th>Project Status</th>
                    <th>Actions</th>
                </tr>
                </tfoot>            
            </table>
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
<!--<script src="--><?//=base_url();?><!--assets/admin_panel/js/jquery-migrate.js"></script>-->

<!-- common js -->
<?php $this->load->view('components/_common_js'); //left side menu ?>

</body>
</html>