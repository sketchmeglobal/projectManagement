<?php
// echo '<pre>', print_r($cbill_header_details), '</pre>';
// die;
$tot_amt = 0;
foreach ($cbill_header_details as $chd) {
    $tot_amt += $chd->cbill_amount;
}

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
                        <p class="mar_0">QUOTATION NO: <b><?= $cbill_header_details[0]->cbill_no ?></b></p>
                    </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <p class="mar_0">Date: <b><?= date('d-m-Y', strtotime($cbill_header_details[0]->cbill_dt)) ?></b></p>
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
                                $iter = 1;
                                foreach ($cbill_header_details as $ppl) {
                                    if ($iter == 6 or $iter == 11 or $iter == 17) {
                                        ?>
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
                                            Name of the bank: <?= $cbill_header_details[0]->bank_name ?><br/>
                                            Address: <?= $cbill_header_details[0]->bank_address ?><br/>
                                            Account No: <?= $cbill_header_details[0]->bank_account_no ?><br/>
                                            IFS Code: <?= $cbill_header_details[0]->bank_ifs_code ?><br/>
                                            MICR Code: <?= $cbill_header_details[0]->bank_micr_code ?><br/>
                                            Branch Code: <?= $cbill_header_details[0]->bank_branch_code ?>
                                        <!--Branch Code - 01653-->
                                        </p>
                        </div>
                        <div class="col-sm-6 border_all height_166">

                            <?php
                            if ($cbill_header_details[0]->cbill_cgst_tax_percn != '0') {
                                $cgst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_cgst_tax_percn) / 100;
                                $sgst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_sgst_tax_percn) / 100;
                                $igst = 0;
                            } else {
                                $cgst = 0;
                                $sgst = 0;
                                $igst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_igst_tax_percn) / 100;
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-7"><p class="mar_0">Gross Amount: </p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($cbill_header_details[0]->cbill_gross_amount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">Discount @ <?= number_format($cbill_header_details[0]->cbill_discount_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs>-<?= number_format($cbill_header_details[0]->cbill_disc_amount, 2) ?></strong></div>

<!--<div class="col-sm-7"><p class="mar_0">Amount:</p></div>-->
<!--<div class="col-sm-5"><strong>-<?php #echo $cbill_header_details[0]->cbill_amount  ?></strong></div>-->

                                <div class="col-sm-7"><p class="mar_0">CGST @ <?= number_format((float) $cbill_header_details[0]->cbill_cgst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($cgst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">SGST @ <?= number_format($cbill_header_details[0]->cbill_sgst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($sgst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">IGST @ <?= number_format($cbill_header_details[0]->cbill_igst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($igst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="h5 mar_0"><b>Net Amount:</b> </p></div>
                                <div class="col-sm-5 text-right"><p class="mar_0 h5"><strong><?= number_format(($cbill_header_details[0]->cbill_gross_amount - $cbill_header_details[0]->cbill_disc_amount) + $cgst + $sgst + $igst, 2) ?></strong></p></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><strong>(Rupees <?= convertNumberToWord($cbill_header_details[0]->cbill_gross_amount + $cgst + $sgst + $igst); ?> Only) </strong></p>
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
                                        <p class="mar_0 text-right"><?= ($cbill_header_details[0]->cbill_dt != '01-01-1970') ? date('d-m-Y', strtotime($cbill_header_details[0]->cbill_dt)) : '' ?></p>
                                    </div>
                                </div>
                                    <div class="col-sm-12 text-center">
                                        <?php if($cbill_header_details[0]->is_stamp == 'yes') { ?>
                                        <img class="m-auto" src="<?= base_url('assets/uploads/'.$company_details[0]->stamp) ?>" style="height: 100px;">
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
                                <p class="mar_0" style="font-size: 12px;"><?= $company_details[0]->company_details ?></p>
                                </div>
                            </div>
                        </div>
                    </footer>
                        </div>
                    </div>
                </section>
                <section class="sheet padding-10mm">
                    <header class="">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?= base_url('assets/img/smg_logo.png') ?>" style="height: 100px;">
                    </div>
                    <div class="col-sm-10 header_col2">
                        <h1 class="mar_0 text-center"><strong style="letter-spacing: 2px;"><?= $company_details[0]->company_name ?></strong><small style="float: right; color: black; font-size: 10px;">Page No. <?= $page_no ?></small></h1>
                        
                        <div class="row">
                            <div class="col-sm-6">
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
                    <h4 class="mar_0 head_font"><u>TAX INVOICE</u></h4>
                    </div>
                    <div class="row">
                    <div class="col-sm-6" style="text-align: left;">
                        <p class="mar_0">QUOTATION NO: <b><?= $cbill_header_details[0]->cbill_no ?></b></p>
                    </div>
                        <div class="col-sm-6" style="text-align: right;">
                            <p class="mar_0">Date: <b><?= date('d-m-Y', strtotime($cbill_header_details[0]->cbill_dt)) ?></b></p>
                    </div>
                    </div>
                </div>
                <div class="row mar_bot_3">
                    <div class="col-sm-12 border_all header_left height_90">
                        <p class="mar_0"><strong>Details of Client:</strong></p>
                        <h5 class="mar_0"><strong><?= $cbill_header_details[0]->account_name ?></strong></h5>
                        <article style="font-size:12px"><?= $cbill_header_details[0]->account_address1 ?></article> 
                        <p class="mar_0" style="font-size:12px"><?= $cbill_header_details[0]->account_address2 ?></p>
                        <p class="mar_0" style="font-size:12px">GSTIN: <?= $cbill_header_details[0]->account_gst_no ?></p>  
                        <p class="mar_0" style="font-size:12px"><strong>Mode of Payment:</strong> Online</p>

                    </div>
                </div>

                            <div class="row table-responsive">
                                <h4 class="mar_0" style="text-align: center;"><u>DESCRIPTION</u></h4>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>Sr#</td>
                                            <td>Product / Service</td>
                                            <td>HSN/ACS</td>
                                            <td>Starting Date</td>
                                            <td>Duration</td>
                                            <td>Amount</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td class="left"><?= $iter ?></td>
                                        <td class="left"><?= $ppl->cbill_description ?></td>
                                        <td class="right"><?= $ppl->cbill_hsn ?></td>
                                        <td class="right"><?= $ppl->cbill_rate ?></td>
                                        <td class="left"><?= $ppl->cbill_unit ?></td>
                                        <td class="right"><?= number_format($ppl->cbill_amount, 2) ?></td>
                                    </tr>
                                    <?php
                                    $last_iter = $iter;
                                    $last_page_no = $page_no;
                                    $iter++;
                                }
                                if ($last_page_no == 1) {
                                    $add_td = (11 - $last_iter);
                                } else {
                                    $temp_add = ($last_iter - 11) % 15;
                                    if ($temp_add == 0) {
                                        $add_td = 0;
                                    } else {
                                        $add_td = 15 - $temp_add;
                                    }
                                }
//                                echo $last_iter . ' => ' . $last_page_no;
//                                echo 'td to be added. =>' . $add_td;die;
                                    ?>
                                    
                                  
                            <!--<tr>-->
                            <!--    <td></td>-->
                            <!--    <td></td>-->
                            <!--    <td style="font-weight: bold; font-size: 14px">Amount Before Tax</td>-->
                            <!--    <td style="font-weight: bold; font-size: 14px" class="text-center"></td>-->
                            <!--    <td style="font-weight: bold; font-size: 14px" class="text-center"></td>-->
                            <!--    <td style="font-weight: bold; font-size: 14px" class="text-center"><?= number_format($tot_amt, 2) ?></td>-->
                                <!--</tr>   -->
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
                                            Name of the bank: <?= $cbill_header_details[0]->bank_name ?><br/>
                                            Address: <?= $cbill_header_details[0]->bank_address ?><br/>
                                            Account No: <?= $cbill_header_details[0]->bank_account_no ?><br/>
                                            IFS Code: <?= $cbill_header_details[0]->bank_ifs_code ?><br/>
                                            MICR Code: <?= $cbill_header_details[0]->bank_micr_code ?><br/>
                                            Branch Code: <?= $cbill_header_details[0]->bank_branch_code ?>
                                        <!--Branch Code - 01653-->
                                        </p>
                        </div>
                        <div class="col-sm-6 border_all height_166">

                            <?php
                            if ($cbill_header_details[0]->cbill_cgst_tax_percn != '0') {
                                $cgst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_cgst_tax_percn) / 100;
                                $sgst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_sgst_tax_percn) / 100;
                                $igst = 0;
                            } else {
                                $cgst = 0;
                                $sgst = 0;
                                $igst = ($cbill_header_details[0]->cbill_taxable_amount * $cbill_header_details[0]->cbill_igst_tax_percn) / 100;
                            }
                            ?>
                            <div class="row">
                                <div class="col-sm-7"><p class="mar_0">Gross Amount: </p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($cbill_header_details[0]->cbill_gross_amount, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">Discount @ <?= number_format($cbill_header_details[0]->cbill_discount_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs>-<?= number_format($cbill_header_details[0]->cbill_disc_amount, 2) ?></strong></div>

<!--<div class="col-sm-7"><p class="mar_0">Amount:</p></div>-->
<!--<div class="col-sm-5"><strong>-<?php #echo $cbill_header_details[0]->cbill_amount  ?></strong></div>-->

                                <div class="col-sm-7"><p class="mar_0">CGST @ <?= number_format((float) $cbill_header_details[0]->cbill_cgst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($cgst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">SGST @ <?= number_format($cbill_header_details[0]->cbill_sgst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($sgst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="mar_0">IGST @ <?= number_format($cbill_header_details[0]->cbill_igst_tax_percn, 2) ?>%:</p></div>
                                <div class="col-sm-5 text-right"><strongs><?= number_format($igst, 2) ?></strong></div>

                                <div class="col-sm-7"><p class="h5 mar_0"><b>Net Amount:</b> </p></div>
                                <div class="col-sm-5 text-right"><p class="mar_0 h5"><strong><?= number_format(($cbill_header_details[0]->cbill_gross_amount - $cbill_header_details[0]->cbill_disc_amount) + $cgst + $sgst + $igst, 2) ?></strong></p></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p><strong>(Rupees <?= convertNumberToWord($cbill_header_details[0]->cbill_gross_amount + $cgst + $sgst + $igst); ?> Only) </strong></p>
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
                                        <p class="mar_0 text-right"><?= ($cbill_header_details[0]->cbill_dt != '01-01-1970') ? date('d-m-Y', strtotime($cbill_header_details[0]->cbill_dt)) : '' ?></p>
                                    </div>
                                </div>
                                    <div class="col-sm-12 text-center">
                                        <?php if($cbill_header_details[0]->is_stamp == 'yes') { ?>
                                        <img src="<?= base_url('assets/uploads/'.$company_details[0]->stamp) ?>" style="height: 100px;">
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
                                <p class="mar_0" style="font-size: 12px;"><?= $company_details[0]->company_details ?></p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </section>
    </body>
</html>
