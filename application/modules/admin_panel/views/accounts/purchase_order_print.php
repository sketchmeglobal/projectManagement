<?php //echo "string"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Purchase Order Print </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
        <link href="https://fonts.googleapis.com/css?family=Chivo|Signika" rel="stylesheet">
        <!-- Set page size here: A5, A4 or A3 -->
        <!-- Set also "landscape" if you need -->
        <style>
        body{ font-family: 'Signika', sans-serif; font-family: Calibri; line-height: 1;}
        p { margin: 0 0 5px; }
        table{ border: 1px solid #777; }
        
        .head_font{ font-family: 'Signika', sans-serif; font-family: Calibri;}
        
        .container{width: 100%}
        
        .border_all{ border: 1px solid #000; }
        .border_bottom{ border-bottom: 1px solid #000;}
        .border-bottom-double{border-bottom:  3px double #000; margin-top: 8px;}
        
        .mar_0{ margin: 0 }
        .mar_bot_3{ margin-bottom: 3px }
        .header_left, .header_right{ height: 150px }
        
        .bold{font-weight:bold;}
        
        .width-100{width: 100%}
        .height_60{ height: 60px }
        .height_42{ height: 42px }
        .height_135{height: 150px}
        .height_90{height: 90px}
        .height_100{height: 100px}
        .height_110{height: 110px}
        .height_41{ height: 41px }
        .height_23{ height: 23px }
        .height_63{ height: 63px }
        .height_21{ height: 21px }
        
        .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th { border: 1px solid #000!important;  text-align: center;}
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 5px; text-align: center; font-size: 13px}
        .table{ margin-bottom: 3px;}
        
        
        .text-right{text-align: right!important;}
        
        @page { size: A4 }
        @media print{
        .bold{font-weight:bold;}
        .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th { border: 1px solid #000;  text-align: center;}
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 5px; text-align: center; font-size: 13px}
        .col-sm-6{ width: 50%!important;float:left; }.col-sm-5 { width: 41.66666667%;float:left; }.col-sm-7 { width: 58.33333333%;float:left; }
        .border-bottom{border-bottom:  1px solid #000} .border-bottom-double{border-bottom:  3px double #000}
        .text-right{text-align: right!important;}
        }
        
        @media print {
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
        .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
        }
        .col-sm-12 {
        width: 100%;
        }
        .col-sm-11 {
        width: 91.66666666666666%;
        }
        .col-sm-10 {
        width: 83.33333333333334%;
        }
        .col-sm-9 {
        width: 75%;
        }
        .col-sm-8 {
        width: 66.66666666666666%;
        }
        .col-sm-7 {
        width: 58.333333333333336%;
        }
        .col-sm-6 {
        width: 50%;
        }
        .col-sm-5 {
        width: 41.66666666666667%;
        }
        .col-sm-4 {
        width: 33.33333333333333%;
        }
        .col-sm-3 {
        width: 25%;
        }
        .col-sm-2 {
        width: 16.666666666666664%;
        }
        .col-sm-1 {
        width: 8.333333333333332%;
        }
        .table thead tr th,.table tbody tr td{
            border-width: 2px !important;
            border-style: solid !important;
            border-color: black !important;
            -webkit-print-color-adjust:exact ;
        }

        .table tr{
            border-width: 2px !important;
            border-style: solid !important;
            border-color: black !important;
            -webkit-print-color-adjust:exact ;
        }
        
        #print{
        display: none !important;
        }
        }
        #print{
        display: block;
        margin: 20px auto;
        }
        </style>
    </head>
    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->
    <body class="A4 landscape" id="page-content" >
        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
        <button type="button" id="print" class="btn btn-primary">Print</button>
        <section class="sheet padding-10mm">
            <div>
                <!-- <header class="pull-right">
                    <small>Page No. 1</small>
                </header> -->
                <div class="clearfix"></div>
                <div class="container">
                    
                    <?php include "po_header.php"; ?>

                    <div class="row mar_bot_3">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Purchase contract</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->po_number?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Shipment Ref No.:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->offer_fz_number?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Sold to Party:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->name?></strong></p>
                                    <p><strong><?=$header[0]->official_address?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Consignee:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->consignee?></strong></p>
                                    <p ><strong><?=$header[0]->consignee_address?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Port of Discharge:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->port_name?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="bold">Port of Shipment:</p>
                                </div>
                                <div class="col-sm-8">
                                    <p><strong><?=$header[0]->shipment_port?></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Date:</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong><?=date("d/m/Y", strtotime($header[0]->po_date));?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Order to:</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong>
                                        <?=$header[0]->order_to_name?>

                                        <?=$header[0]->order_to_shipping_address?>
                                    </strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Your Ref:</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong> <?=$header[0]->your_ref?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Product Origin:</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong><?=$header[0]->country_name?></strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Shipping Line:</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong><?=$header[0]->shipping_line?></strong></p>
                                </div>
                            </div>

                            <!-- <div class="row">
                                <div class="col-sm-5">
                                    <p class="bold">Incoterms</p>
                                </div>
                                <div class="col-sm-7">
                                    <p><strong>< ?=$header[0]->incoterm?></strong></p>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>
                    
                    <!--table data-->
                    <?php 
                        #echo '<pre>', print_r($header), '</pre>';
                    ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <p class="text-center"><strong>Payment Terms:</strong> <?= strip_tags($this->db->get_where('payment_terms', array('pt_id' => $header[0]->payment_terms))->row()->payment_terms) ?></p>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-right"><strong>Incoterm: <?=$header[0]->incoterm?></strong></p>
                        </div>
                        <?php  $template = explode(',', $hdr->header); ?>
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th 
                                    
                                    <?php
                                    if(in_array("p_scientific_name", $template)){
                                    ?>
                                     colspan="2"
                                    <?php } ?>
                                    
                                   >Product(s)</th>
                                   <?php if(in_array('product_line', $template)){ ?>
                                    <th>Product Line(PO)</th>
                                    <?php } ?>
                                    <?php
                                    //echo "<pre>"; print_r($template); die();

                                    for ($it=0; $it < @count($template); $it++) { 
                                    ?>   
                                      <?php if($template[$it] == "size_id"){ ?>
                                        <th>Size / pces</th>
                                      <?php }elseif($template[$it] == "packing_size_id"){ ?>
                                        <th>Packing</th>
                                      <?php }elseif($template[$it] == "cartons_offered"){ ?>
                                        <th>Cartoon</th>
                                      <?php }elseif($template[$it] == "quantity_offered"){ ?>
                                        <th>Qty</th>

                                      <?php }elseif($template[$it] == "freezing_id"){ ?>
                                        <th>Freezing Type</th>
                                      <?php }elseif($template[$it] == "freezing_method_id"){ ?>
                                        <th>Freezing Method</th>


                                     <?php }elseif($template[$it] == "primary_packing_type_id"){ ?>
                                        <th>Primary Packing</th>

                                     <?php }elseif($template[$it] == "secondary_packing_type_id"){ ?>
                                        <th>Secondary Packing</th>

                                     <?php }elseif($template[$it] == "glazing_id"){ ?>
                                        <th>Glazing</th>

                                    <?php }elseif($template[$it] == "block_id"){ ?>
                                        <th>Block</th>

                                    <?php }elseif($template[$it] == "product_description"){ ?>
                                        <th>Product Description</th>

                                    <?php }elseif($template[$it] == "pieces"){ ?>
                                        <th>Pieces</th>

                                    <?php }elseif($template[$it] == "grade"){ ?>
                                        <th>Grade</th>

                                    <?php }elseif($template[$it] == "size_before_glaze"){ ?>
                                        <th>Size Glaze(Before)</th>

                                    <?php }elseif($template[$it] == "size_after_glaze"){ ?>
                                        <th>Size Glaze(after)</th>

                                    <?php }elseif($template[$it] == "product_price"){ ?>
                                        <th>Product Price</th>

                                    <?php }elseif($template[$it] == "comment"){ ?>
                                        <th>Comment</th>
                                      <?php }else{  if($template[$it] != 'p_scientific_name' && $template[$it] != 'gross_weight' && $template[$it] != 'product_line'){?>
                                        <th>
                                            <?php
                                             echo $template[$it];
                                            ?>
                                        </th>
                                      <?php }} ?>
                                    <?php } ?>
                                    <th>Cartoon</th>
                                    <th>Qty</th>
                                    <?php if(in_array('gross_weight', $template)){ ?>
                                    <th>Gross Weight</th>
                                    <?php } ?>
                                    <th>Rate</th>
                                    <th>Amount (<?=$header[0]->code?>)</th>
                                </tr>
                            </thead>
                            <tbody class="actual_table">
                                <?php
                                $crtns = 0;
                                $qnty = 0;
                                $iter = 0;
                                $rate = 0;
                                $generate_iter = 9;
                                $amm = 0;
                                
                                foreach($details as $d){
                                $iter ++;
                                if($d['mar_selling_approval_status']){
                                $fv = $d['mar_selling_rate'];
                                }else{
                                $fv = $d['final_selling_price'];
                                }
                                if($iter == 9 or $iter == $generate_iter) {
                                $generate_iter += 8;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row border-bottom-double">
                
            </div>
            <div class="row">
            </div>
        </section>
        <section class="sheet padding-10mm">
            <div>
                <header class="pull-right">
                    <!-- <small>Page No. 1</small> -->
                </header>
                <div class="clearfix"></div>
                <div class="container">
                    <?php include "p_header.php"; ?>
                    
                    <!--table data-->
                    <div class="row">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <?php $template = explode(',', $hdr->header);  ?>
                                <tr class="text-center">
                                    <th 
                                    <?php
                                    if(in_array("p_scientific_name", $template)){
                                    ?>
                                    colspan="2"
                                    <?php } ?>
                                    
                                    
                                    >Product(s)</th>

                                    <?php if(in_array('product_line', $template)){ ?>
                                    <th>Product Line(PO)</th>
                                    <?php } ?>
                                    <?php 
                                    

                                    for ($it=0; $it < @count($template); $it++) { 
                                    ?>
                                      <?php if($template[$it] == "size_id"){ ?>
                                        <th>Size / pces</th>
                                      <?php }elseif($template[$it] == "packing_size_id"){ ?>
                                        <th>Packing</th>
                                      <?php }elseif($template[$it] == "cartons_offered"){ ?>
                                        <th>Cartoon</th>
                                      <?php }elseif($template[$it] == "quantity_offered"){ ?>
                                        <th>Qty</th>

                                      <?php }elseif($template[$it] == "freezing_id"){ ?>
                                        <th>Freezing Type</th>
                                      <?php }elseif($template[$it] == "freezing_method_id"){ ?>
                                        <th>Freezing Method</th>

                                     <?php }elseif($template[$it] == "primary_packing_type_id"){ ?>
                                        <th>Primary Packing</th>

                                     <?php }elseif($template[$it] == "secondary_packing_type_id"){ ?>
                                        <th>Secondary Packing</th>

                                     <?php }elseif($template[$it] == "glazing_id"){ ?>
                                        <th>Glazing</th>

                                    <?php }elseif($template[$it] == "block_id"){ ?>
                                        <th>Block</th>

                                    <?php }elseif($template[$it] == "product_description"){ ?>
                                        <th>Product Description</th>

                                    <?php }elseif($template[$it] == "pieces"){ ?>
                                        <th>Pieces</th>

                                    <?php }elseif($template[$it] == "grade"){ ?>
                                        <th>Grade</th>

                                    <?php }elseif($template[$it] == "size_before_glaze"){ ?>
                                        <th>Size Glaze(Before)</th>

                                    <?php }elseif($template[$it] == "size_after_glaze"){ ?>
                                        <th>Size Glaze(after)</th>

                                    <?php }elseif($template[$it] == "product_price"){ ?>
                                        <th>Product Price</th>

                                    <?php }elseif($template[$it] == "comment"){ ?>
                                        <th>Comment</th>
                                      <?php }else{ if($template[$it] != 'p_scientific_name' && $template[$it] != 'gross_weight' && $template[$it] != 'product_line'){ ?>
                                        <th><?php
                                        
                                        //if($template[$it] != 'p_scientific_name' && $template[$it] != 'gross_weight'){
                                            echo $template[$it];
                                        //}
                                        
                                        
                                        ?></th>
                                      <?php }} ?>
                                    <?php } ?>
                                    <th>Cartoon</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>Amount (<?=$header[0]->code?>)</th>
                                </tr>
                            </thead>
                            <tbody class="actual_table">
                                <?php } ?>
                                <tr>
                                    <td> <?= $d['product_name'] ?> </td>
                                    
                                    <?php
                                    if(in_array("p_scientific_name", $template)){
                                    ?>

                                    <td><?= $d['scientific_name'] ?> </td>
                                    
                                    <?php } ?>
                                    <?php if(in_array('product_line', $template)){ ?>
                                    <td><?= $d['product_line'] ?></td>
                                    <?php } ?>


                                    <?php for ($itd=0; $itd < @count($template); $itd++) { ?>                        

                                    

                                    <?php if ($template[$itd] == "freezing_id") { ?>
                                        <td><?= $d['fztp'] ?></td>

                                    <?php }elseif($template[$itd] == "size_id"){ ?>
                                            <td><?= $d['size'] ?></td>

                                    <?php }elseif($template[$itd] == "packing_size_id"){ ?>
                                            <td><?= $d['packing_size'] ?></td>

                                    <?php }elseif($template[$itd] == "cartons_offered"){ ?>
                                            <td><?php echo $d['cartons_offered']?></td>

                                    <?php }elseif($template[$itd] == "quantity_offered"){ ?>
                                            <td><?php  echo $d['quantity_offered'] . ' (' . $d["unit"] .')'?></td>

                                    <?php }elseif($template[$itd] == "freezing_method_id"){ ?>
                                          <td><?= $d['fzme'] ?></td>
                                    <?php }elseif($template[$itd] == "primary_packing_type_id"){?>
                                            <td><?= $d['ptp1'] ?></td>
                                   

                                    <?php }elseif($template[$itd] == "secondary_packing_type_id"){?>
                                            <td><?= $d['pts1'] ?></td>

                                    <?php }elseif($template[$itd] == "glazing_id"){?>
                                            <td><?= $d['glazing'] ?></td>

                                    <?php }elseif($template[$itd] == "block_id"){?>
                                            <td><?= $d['block_size'] ?></td>

                                    <?php }elseif($template[$itd] == "unit_id"){?>
                                            <td><?= $d['unit'] ?></td>
                                    <?php }else{ if($template[$itd] != "p_scientific_name" && $template[$itd] != 'gross_weight' && $template[$itd] != 'product_line'){?>
                                        <td><?php
                                        if(isset($d[$template[$itd]])){
                                            echo $d[$template[$itd]];
                                        }
                                        ?>
                                        </td>
                                    <?php }} ?>

                                    <?php } ?>

                                    <td><?php $crtns += $d['cartons_offered']; echo $d['cartons_offered']?></td>
                                    <td><?php $qnty += $d['quantity_offered']; echo $d['quantity_offered'] . ' (' . $d["unit"] .')'?></td>
                                    <?php if(in_array('gross_weight', $template)){ ?>
                                    <td><?php echo $d['gross_weight']; ?></td>
                                    <?php } ?>
                                    <td><?php $rate += $d['product_price']; echo $d['product_price']?></td>

                                    <td><?php $amm += ($d['product_price'] * $d['quantity_offered']); echo ($d['product_price'] * $d['quantity_offered'])?></td>
                                </tr>
                                
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th colspan="<?php 
                                
                                if(in_array("p_scientific_name", $template)){
                                    echo @count($template) + 4;
                                }else{
                                    echo @count($template) + 4;
                                }
                                 ?>
                                
                                
                                "></th>
                                <th style="padding: 0px;">
                                    <table style="width:100%;" border="1">
                                        <tr>
                                            <th>Freight</th>
                                            <th style="text-align:right;"><?=number_format($freight_sum[0]->totalfreight * $qnty,2)?></th>
                                        </tr>

                                        <tr>
                                            <th>Insurance</th>
                                            <th style="text-align:right;"><?=$total_insurance * $qnty?></th>
                                        </tr>
                                        <?php if($total_other != 0.00){ ?>
                                         <tr>
                                              <th>Others</th>
                                              <th style="text-align:right;"><?=$total_other?></th>
                                         </tr>  
                                        <?php } ?>

                                        <?php if($header[0]->tax != 0.00){ ?>
                                            <tr>
                                                <th>Tax</th>
                                                <th style="text-align:right;"><?=$header[0]->tax?></th>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </th>
                            </tr>

                            <tr>
                                <th>Total</th>
                                <th colspan="<?php 
                                
                                if(in_array("p_scientific_name", $template)){
                                    echo @count($template);
                                }else{
                                    echo @count($template) + 1;
                                }
                                
                                
                                ?>" style="text-align:right;"><?=$crtns?></th>
                                <th style="text-align:right;"><?=$qnty?></th>
                                <?php if(in_array('gross_weight', $template)){ ?>
                                <th></th>
                                <?php } ?>
                                <th style="text-align:right;"><?=$rate?></th>
                                <th colspan="4" style="text-align:right;">  <?=number_format(($amm + (($freight_sum[0]->totalfreight + $total_insurance) * $qnty) + $total_other + $header[0]->tax),2); ?> </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <div class="row border-bottom-double">
                        
                    </div>
                    <div class="row">
                    </div>
                </section>
                <section class="sheet padding-10mm">
                    <div>
                        <header class="pull-right">
                            <!-- <small>Page No. 2</small> -->
                        </header>
                        <div class="clearfix"></div>
                        <div class="container-fluid">
                            <?php include "po_header.php"; ?>

                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $header[0]->purchase_order_instruction?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $header[0]->add_info2?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    Tolerance:
                                </div>

                                <div class="col-sm-8">
                                    <?=$header[0]->tolerance?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    Shel life :
                                </div>

                                <div class="col-sm-8">
                                    <?=$header[0]->shelf_life?> from production date
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    No of FCL :
                                </div>

                                <div class="col-sm-8">
                                    <?php
                                    $size_of_containerarr = explode(" ",$header[0]->size_of_container);
                                    ?>
                                    <?=$header[0]->no_of_container?> x <?=$size_of_containerarr[0]?> ft
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    Shipment :
                                </div>

                                <div class="col-sm-8">
                                    <?=$header[0]->shipment_timing?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    Transhipment :
                                </div>

                                <div class="col-sm-8">
                                    <?=$header[0]->transhipment?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4" style="font-weight: bold;">
                                    Partial shipment :
                                </div>

                                <div class="col-sm-8">
                                    <?=$header[0]->partial_shipment?>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <table class="table  bold"  style="widows: 100%;">
                                    <?php
                                        $des = json_decode($header[0]->lab_report_clauses);

                                        $lbl = json_decode($header[0]->lbl);

                                        //echo "<pre>"; print_r($lbl); 

                                        $maxCount = max(@count($des), @count($lbl));

                                        //die();

                                        if(@count($maxCount) > 0){

                                        for ($i=0; $i < $maxCount; $i++) { 
                                    ?>
                                        <tr>
                                            <th style="text-align:left !important;"><?=(array_key_exists($i, $lbl))?$lbl[$i]:''?>  :</th>
                                            <td style="text-align:left !important;"><?=(array_key_exists($i, $des))?$des[$i]:''?></td>
                                        </tr>
                                       <?php }} ?>
                                        
                                    </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <?= $header[0]->add_info?>
                                </div>
                            </div>
                            <div style="display:flex; column-gap: 40rem; ">
                                <h5 class="bold">Authorised Signatory</h5>
                                
                                <h5 class="bold">Accepted by :</h5>
                            </div>
                            <div style="display:flex; column-gap: 35.5rem;">
                                <h5 style="width: 50%;"> <?= $header[0]->authorised_signatory?> </h5>
                                
                               <span style="width:50%;">
                                    <?=$header[0]->accepted_by?>
                               </span>


                            </div>
                                <div class="row border-bottom-double">
                                    
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </section>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $("#print").click(function () {
                    // $(this).hide();
                    window.print();
                    });
                    </script>
                </body>
            </html>