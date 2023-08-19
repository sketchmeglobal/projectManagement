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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <style>  
        .mirror-text {
            position: relative;
            font-size: 35px;
            font-weight: 900;
            font-family: arial;
            color: #4895ef;
            font-weight: bolder;
        }
        
        .mirror-text:before {
            content:"SKETCH ME GLOBAL";
            position: absolute;
            top: 25px;
            transform: rotate(180deg) scaleX(-1);
            opacity:0.5;
            background: -webkit-linear-gradient(#f9f9f900, #4895ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            
        }
        
        @media only screen and (max-width: 600px) {
            .mirror-text {
            font-size: 80px;
            }
            .mirror-text:before {
            top:60px;
            }
            .mirror-text:after {
            top:55px;
            }
        }
        section{
        
            background: #a2a2a252;
        }
        .bg-light{
            background-color: #fff !important;
        }
        .bdr-blu {
            height: 5px !important;
            background: #4895ef !important;
        }
        .bdr-blc{
            height: 2px !important;
            background: #000000 !important;
            opacity: 1;
        }
        .border-f{
            border:2px solid black;
        }

    </style>    
    <title>Pament slip</title>
</head>

<body>
<?php
    //echo json_encode($salary_details);
    $all_allowance = json_decode($salary_details[0]->all_allowance);
    $all_deduction = json_decode($salary_details[0]->all_deduction);
?>
<section>
    <div class="container bg-light py-4">
        <div class="text-center">
            <h3 class=" mirror-text">SKETCH ME GLOBAL</h3>
        </div>
        <div class="row justify-content-center align-items-center p-0">
           <div class="col-lg-10 col-md-11 col-12">
            <div class="row justify-content-around">
                <div class="col-lg-5">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-4">
                            <img class="img-fluid" src="lp.jpg" alt="">
                        </div>
                        
                        
                        
                        
                        <div class="col-8">
                            <p class="m-0 py-1">32/A Vivekananda Road</p>
                            <p class="m-0 py-1">Dunlop, Kolkata, West Bengal</p> 
                            <p class="m-0 py-1">(Near Dunlop Suraksha)</p>
                            <p class="m-0 py-1">PIN - 700035</p>

                        </div>

                    </div>

                </div>
                <div class="col-lg-4 d-flex justify-content-center align-items-center">
                    <div>
                    <p class="m-0 py-1">License No.: 2002115652</p>
                    <p class="m-0 py-1"><a class="text-decoration-none text-dark" href="tel:9903-5603-99">Contact No: +91-9903-5603-99</a></p>
                    <p class="m-0 py-1">Email:<a href="mailto:info@sketchmeglobal.com">info@sketchmeglobal.com</a></p>
                    <p class="m-0 py-1 ">Website:<a class="text-dark" href="https://sketchmeglobal.com/">www.sketchmeglobal.com</a></p>
                </div>
                </div>

            </div>
           </div>
           <div class="p-0"><hr class="m-0 bdr-blu"></div>

 <!-- NEW -->
           <div class="row justify-content-center align-items-center mt-5">
            <div class="col-lg-10 col-md-11 col-12 border-f px-0 py-3">
                  <div class="row px-2 PT-2">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Name:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$salary_details[0]->emp_name?>">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Employee No:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Pay Period:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">No of Days Month:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Company:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Department:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">PAN No:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">No of Days Paid:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Joining Date:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="row">
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Designation:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Location:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">P.F A/C No:</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="col-12 my-1">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <p class="m-0 p-0">Off days: 4 of 14</p>
                                    </div>
                                    <div class="col-6">
                                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                  <div class="mt-3">
                    <hr class="bdr-blc m-0">
                  </div>
                  <div class="row justify-content-center mt-3">
                   
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Month of</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=date('M Y', strtotime($salary_details[0]->payout_date))?>"></div>
                            </div></div>
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Bank Name</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="SBI"></div>
                            </div></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">A/C Number</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="38702257903"></div>
                            </div></div>
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Earnings</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$salary_details[0]->total_pay?>"></div>
                            </div></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Deductions</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$salary_details[0]->total_deduction?>"></div>
                            </div></div>
                            <div class="col-md-6"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Adjustments</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="0.00"></div>
                            </div></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-10"><div class="row">
                                <div class="col-md-12"><p class="m-0 p-0">Total Pay</p></div>
                                <div class="col-md-12"><input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$salary_details[0]->total_pay?>"></div>
                            </div></div>
                            
                        </div>
                    </div>


                  </div>
                  <div class="mt-3">
                    <hr class="bdr-blc m-0">
                  </div>
                  <div class="row px-2">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Earnings </p>
                            </div>
                            <div class="col-md-6">
                                <p>Rs. </p>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Basic</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->basic?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">HRA </p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->hra?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Conveyance Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->conveyanceAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Prof. Development Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->ProfDevelopmentAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Books and Periodicals</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->booksAndPeriodicals?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Medical Reimbursement</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->medicalReimbursement?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Child Education Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->childEducationAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Performance Pay Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->PerformancePayAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Special Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->specialAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Entertainment Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->entertainmentAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Fuel and Maintenance (F&M) - Car</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->fuelAndMaintenance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Other Allowance</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->otherAllowance?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Variable Pay</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->variablePay?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">LTA (Annual Benefit)</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->lta_AnnualBenefit?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Festival Bonus (Annual Benefit)</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->festivalBonus?>">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Medical Insurance Premium<br>(Annual Benefit)<br>Arrear</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_allowance->medicalInsurancePremium?>">
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Deductions </p>
                            </div>
                            <div class="col-md-6">
                                <p>Rs. </p>
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Employee's PF/PPF</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->employees_PF_PPF?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Employees ESIC</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->employeesESIC?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Professional Tax</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->professionalTax?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Income Tax</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->incomeTax?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">LTA (Deduction)</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->ltaDeduction?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Festival Bonus (Deduction)</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->festivalBonusDeduction?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Medical Insurance Premium<br>(Annual Benefit)</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->medicalInsurancePremiumDeduct?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Other Deductions</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->otherDeductions?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Misc. Deduction</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->miscDeduction?>">
                            </div>
                        </div>
                        <div class="row my-1">                       
                            <div class="col-6 d-flex align-items-center">
                                <p class="m-0 p-0">Loan</p>
                            </div>
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field" value="<?=$all_deduction->loan?>">
                            </div>
                        </div>
                     
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Adjustments </p>
                            </div>
                            <div class="col-md-6">
                                <p>Rs. </p>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                       
                            
                            <div class="col-6">
                                <input class="w-100 py-1 border-rd-10 form-control" placeholder="Field">
                            </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 d-flex justify-content-end"><div class="col-6">
                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Total" value="<?=$salary_details[0]->total_allowance?>">
                    </div></div>
                    <div class="col-md-5 d-flex justify-content-end"><div class="col-6">
                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Total" value="<?=$salary_details[0]->total_deduction?>">
                    </div></div>
                    <div class="col-md-2 d-flex justify-content-end"><div class="col-6">
                        <input class="w-100 py-1 border-rd-10 form-control" placeholder="Total" value="<?=$salary_details[0]->total_pay?>">
                    </div></div>
                  </div>
            </div>

        </div>
        <div class="row justify-content-center p-0 mt-5">
            <div class="col-md-10 p-0">
                <div class="mt-3">
                    <hr class="bdr-blc m-0">
                  </div>
                <div class="mt-3 text-center">
                       <h6>SKETCH ME GLOBAL</h6>
                        <h6>[Think – Design – Develop - Maintain]</h6>
                        <h6>[Website Designing – Website Development - Software Development – Android Apps – System Maintenance – Domain Name – Server Space]</h6>
                </div>
            </div>
        </div>
        </div>
    </div>
   
    
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
