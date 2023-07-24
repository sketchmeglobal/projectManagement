<?php
// echo '<pre>', print_r($cbill_header_details), '</pre>';
// die;

//echo json_encode($company_details);//'project_id: '.$project_id;
//echo ' co name: '.$company_details['company_name'];
// print_r($company_details);
// die;

$tot_amt = 0;
// foreach ($cbill_header_details as $chd) {
//     $tot_amt += $chd->cbill_amount;
// }

function convertNumberToWord($number) {
    $hyphen = '-';
    $conjunction = ' and ';
    $separator = ', ';
    $negative = 'negative ';
    $decimal = ' point ';
    $dictionary = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'fourty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand',
        100000 => 'lakh',
        10000000 => 'crore'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convertNumberToWord(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int) ($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumberToWord($remainder);
            }
            break;
        case $number < 100000:
            $thousands = ((int) ($number / 1000));
            $remainder = $number % 1000;

            $thousands = convertNumberToWord($thousands);

            $string .= $thousands . ' ' . $dictionary[1000];
            if ($remainder) {
                $string .= $separator . convertNumberToWord($remainder);
            }
            break;
        case $number < 10000000:
            $lakhs = ((int) ($number / 100000));
            $remainder = $number % 100000;

            $lakhs = convertNumberToWord($lakhs);

            $string = $lakhs . ' ' . $dictionary[100000];
            if ($remainder) {
                $string .= $separator . convertNumberToWord($remainder);
            }
            break;
        case $number < 1000000000:
            $crores = ((int) ($number / 10000000));
            $remainder = $number % 10000000;

            $crores = convertNumberToWord($crores);

            $string = $crores . ' ' . $dictionary[10000000];
            if ($remainder) {
                $string .= $separator . convertNumberToWord($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumberToWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumberToWord($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return ucfirst($string);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>QUOTATION</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Normalize or reset CSS with your favorite library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

        <!-- Load paper.css for happy printing -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

        <link href="https://fonts.googleapis.com/css2?family=Amethysta&display=swap" rel="stylesheet">


        <!-- Set page size here: A5, A4 or A3 -->
        <!-- Set also "landscape" if you need -->
        <style>
            body{
                font-family: 'Amethysta', serif;
            }
            p {
                margin: 0 0 5px;
            }
            .table{
                margin-bottom: 3px
            }
            .head_font{
                font-family: 'Calibri', sans-serif;
            }
            .container{width: 100%}
            .border_all{
                border: 1px solid #000;
            }
            .border_bottom{
                border-bottom: 1px solid #000;
            }
            .line-1{
                line-height: 1
            }
            .line-2{
                line-height: 2
            }
            .line-3{
                line-height: 3
            }
            .mar_0{
                margin: 0
            }
            .mar_bot_3{
                margin-bottom: 3px
            }
            .mar_top_5{
                margin-top: 5px
            }

            .header_left, .header_right{
                height: 150px
            }
            

            .width-100{width: 100%}
             .height_127{height: 127px}
            .height_60{ height: 60px }
            .height_56{ height: 61px }

            .height_130{height: 219px}
            .height_72{height: 72px}
            .height_90{height: 90px}
            .height_93{height: 98px}
            .height_41{ height: 41px }
            .height_23{ height: 23px }
            .height_63{ height: 63px }
            .height_80{ height: 50px }
            .margin-top-27{margin-top: 27px}
            .margin-top-31{margin-top: 31px}

            .pad_2{padding: 2%;}
            .pad_top_2{padding-top: 2%}

            .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th, tr td { border: 1px solid #000;  text-align: center;}
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 2px; text-align: center;}

            .table td{word-wrap:break-word;}

            .right{
                text-align: right!important;
            }

            .left{
                text-align: left!important;
            }

            .hrprint{
                margin-top: 20px;
                /* margin-bottom: 20px; */
                border: 0;
                border-top: 1px solid #333;
            }

            @page { size: A4 }

            @media print{
                .col-sm-3 { width: 25%;float:left; }
                .col-sm-4 { width: 33.33333333%;float:left; }
                .col-sm-6 { width: 50%!important;float:left; }
                .col-sm-5 { width: 41.66666667%;float:left; }
                .col-sm-7 { width: 58.33333333%;float:left; }

                .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th { border: 1px solid #000;  text-align: center;}
                .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 2px; text-align: center; border: 1px solid #000!important;}
            }
            .header_col2 {
                color: #1e84dc;
            }
            .footer_col2 {
                color: #1e84dc;
                margin-top: 10px;
                border-top: 1px solid #1e84dc;
            }
            header {
                border-bottom: 2px solid #1e84dc;
            }
            .height_166 {
                height: 166px;
            }
            .height_190 {
                height: 190px;
            }
            .height_100 {
                height: 100px;
            }
/*            .footer_col2_row {
                position: relative;
                bottom: 20px;
            }*/
        </style>
    </head>

    <!-- Set "A5", "A4" or "A3" for class name -->
    <!-- Set also "landscape" if you need -->
    <body class="A4">
        <?php
        $page_no = 1;
        ?>
        <!-- Each sheet element should have the class "sheet" -->
        <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
       
       
        <section class="sheet padding-10mm">
            <header class="">
                <div class="row">
                    <div class="col-sm-1">
                        <img src="<?= base_url('assets/img/smg_logo.png') ?>" style="height: 100px;margin-top: 15px;">
                    </div>
                    <div class="col-sm-11 header_col2">
                        <h1 class="mar_0 text-center"><strong style="letter-spacing: 2px;"><?= $company_details[0]->company_name ?></strong><small style="float: right; color: black; font-size: 10px;">Page No. <?= $page_no ?></small></h1>
                        
                        <div class="row">
                            <div class="col-sm-6" style="padding-left: 40px;">
                                <p class="mar_0"><?= $company_details[0]->address1 ?></p>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <p class="mar_0">GSTIN : <?= $company_details[0]->GST ?></p>
                                <p class="mar_0">Contact No: <?= $company_details[0]->phone ?></p>
                                <p class="mar_0">Email : <?= $company_details[0]->email ?></p>
                                <p class="mar_0">Website: <?= $company_details[0]->website ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container">
                <?php
                if ($this->session->userdata('log_data')['userid'] == 1) {
                    $class = "text-center";
                } elseif ($this->session->userdata('log_data')['userid'] == 2) {
                    $class = "text-center";
                } else {
                    $class = "text-right";
                }
                ?>
                <div class="row <?= $class ?> text-uppercase mar_bot_3">
                    <div class="col-sm-12">
                    <h4 class="mar_0 head_font"><u>Quotation</u></h4>
                    </div>
                    <div class="row">
                    <div class="col-sm-6" style="text-align: left;">
                        <p class="mar_0">QUOTATION NO: <b><?= $quotation->bi_QuotationNo ?></b></p>
                    </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <p class="mar_0">Date: <b><?= date('d-m-Y', strtotime($quotation->bi_QuotationDate)) ?></b></p>
                    </div>
                    </div>
                </div>
                <div class="row mar_bot_3 border_all header_left height_90">
                    <div class="col-sm-6">
                        <p class="mar_0"><strong>Details of Client:</strong></p>
                        <h5 class="mar_0"><strong><?= $cbill_header_details[0]->account_name ?></strong></h5>
                        <article style="font-size:12px"><?= $cbill_header_details[0]->account_address1 ?></article> 
                        <p class="mar_0" style="font-size:12px"><?= $cbill_header_details[0]->account_address2 ?></p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mar_0" style="font-size:12px">GSTIN: <?= $cbill_header_details[0]->account_gst_no ?></p>
                        <p class="mar_0" style="font-size:12px">TEL: <?= $cbill_header_details[0]->account_telephone ?></p>
                        <p class="mar_0" style="font-size:12px"><strong>Mode of Payment:</strong> <?= $cbill_header_details[0]->cbill_payment_mode ?></p>
                    </div>
                </div>

                <!--table data-->
                <div class="row">
                        <h4 class="mar_0" style="text-align: center;"><u>DESCRIPTION</u></h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover width-100" >
                            <thead>
                                <tr>
                                    <td>Sr#</td>
                                    <td>Product / Service</td>
                                    <td>HSN/ACS</td>
                                    <td>Duration</td>
                                    <td>Starting Date</td>
                                    <td>Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i = 0; $i < sizeof($particulars); $i++){
                                ?>
                                <tr>
                                    <td><?=$i + 1?></td>
                                    <td><?=$particulars[$i]->par_TaskType_name?></td>
                                    <td><?=$particulars[$i]->par_HSNCode?></td>
                                    <td><?=$particulars[$i]->par_Duration?></td>
                                    <td><?=date('d-m-Y', strtotime($particulars[$i]->par_StartDate))?></td>
                                    <td><?=number_format($particulars[$i]->par_Amount, 2)?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                     <footer>
                        <div class="col-sm-12 border_all height_100">
                            <h5 class="text-uppercase mar_0"><strong>IMPORTANT NOTES:</strong></h5> 
                            <p class=" mar_0"><?= $cbill_header_details[0]->important_note ?></p>
                         </div>
                        <div class="col-sm-12 border_all height_100">
                            <h5 class="text-uppercase mar_0"><strong>OTHER CLIENT INFORMATION</strong></h5> 
                            <p class=" mar_0"><?= $cbill_header_details[0]->other_client_details ?></p>
                         </div>
                        <div class="col-sm-6 border_all height_166">
                            <!--<p class="mar_0">Signature & Date</p>-->                           
                            <h5 class="text-uppercase mar_0"><strong>BANKING DETAILS:</strong></h5>
                            <p class=" mar_0">
                                Name of the bank: <?= $banking_details[0]->bank_name ?><br/>
                                Address: <?= $banking_details[0]->bank_address ?><br/>
                                Account No: <?= $banking_details[0]->bank_account_no ?><br/>
                                IFS Code: <?= $banking_details[0]->bank_ifs_code ?><br/>
                                MICR Code: <?= $banking_details[0]->bank_micr_code ?><br/>
                                Branch Code: <?= $banking_details[0]->bank_branch_code ?>
                            <!--Branch Code - 01653-->
                            </p>
                        </div>
                        <div class="col-sm-6 border_all height_166">

                            
                            
                            <div class="row">
                                <div class="col-sm-7"><p class="mar_0">Gross Amount: </p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($taxes[0]->tax_GrossAmount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">Discount @ <?= number_format($taxes[0]->tax_DiscountPercentage, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs>-<?= number_format($taxes[0]->tax_DiscountAmount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">CGST @ <?= number_format((float) $taxes[0]->tax_CGST_Rate, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($taxes[0]->tax_CGST_Amount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">SGST @ <?= number_format($taxes[0]->tax_SGST_Rate, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($taxes[0]->tax_SGST_Amount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">IGST @ <?= number_format($taxes[0]->tax_IGST_Rate, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($taxes[0]->tax_IGST_Amount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="h5 mar_0"><b>Net Amount:</b> </p></div>
                                <div class="col-sm-5 text-right"><p class="mar_0 h5"><strong><?= number_format(($taxes[0]->tax_GrossAmount - $taxes[0]->tax_DiscountAmount) + $taxes[0]->tax_CGST_Amount + $taxes[0]->tax_SGST_Amount +$taxes[0]->tax_IGST_Amount, 2) ?></strong></p></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p><strong>(Rupees <?= convertNumberToWord($taxes[0]->tax_GrossAmount + $taxes[0]->tax_CGST_Amount + $taxes[0]->tax_SGST_Amount + $taxes[0]->tax_IGST_Amount - $taxes[0]->tax_DiscountAmount); ?> Only) </strong></p>
                                </div>
                            </div>
                            <p class="mar_0 line-3"><strong></strong></p>
                        </div>
                        
                        <div class="col-sm-6 border_all height_190">
                            <p class="mar_0"><b>Company Name:</b> <?= $company_details[0]->company_name ?></p>
                            <p class="mar_0"><b>GSTIN:</b> <?= $company_details[0]->GST ?></p>
                            <p class="mar_0"><b>PAN No:</b> <?= $company_details[0]->PAN ?></p>
                            <p class="mar_0">Point of Contact: <b><?= $company_details[0]->contact_person ?></b></p>
                            <p class="mar_0">Phone No.: <b><?= $company_details[0]->mobile1 ?>/<?= $company_details[0]->mobile2 ?></b></p>
                            <p class="mar_0">Mail Id: <b><a href="mailto:<?= $company_details[0]->email ?>"><u><?= $company_details[0]->email ?></u></a>/
                                    <a href="mailto:<?= $company_details[0]->alternate_email ?>"><u><?= $company_details[0]->alternate_email ?></u></b></p>
                            <p class="mar_0"></a></p>
                        </div>
                        
                        <div class="col-sm-6 border_all height_190">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <p class="mar_0">For Sketch Me Global,</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <p class="mar_0 text-right"><?= date('d-m-Y', strtotime($quotation->bi_QuotationDate)) ?></p>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <?php if($taxes[0]->tax_ShowStamp == '1') { ?>
                                <img class="m-auto" src="<?= base_url('assets/img/stamp.png') ?>" style="height: 100px;">
                                <?php } ?>
                            </div>
                        </div>
                            <p class="mar_0" style="position: absolute; bottom: 0; right: 10px;"><b>Sayak Mukherjee</b><br/>(Signatur Authority)</p> 
                        </div>
                        <div class="row footer_col2_row">
                            <div class="col-sm-12 text-center" style="position: absolute; bottom: 10px;">
                                <div class="footer_col2" style="width: 95%;">
                                <p class="mar_0"><b><?= $company_details[0]->company_name ?></b></p>
                                <p class="mar_0"><?= $company_details[0]->company_subtitle ?></p>
                                <p class="mar_0" style="font-size: 12px;"><?= $company_details[0]->company_detail ?></p>
                                </div>
                            </div>
                        </div>
                    </footer>
                        </div>
                    </div>
                </section>
    </body>
</html>
