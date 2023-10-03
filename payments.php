<?php
$title = "Payments";
include "header.php";

?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .switch-tab-buttons {
        color: #3e40c7;
        border: 1px solid #3e40c7;
        width: 250px;
        margin: 10px;
    }

    .switch-tab-buttons:hover {
        background-color: #3e40c7;
        color: white;

    }

    .text-white {
        color: white;
    }

    .bg-danger {
        background-color: #FF0000;
        color: white;
    }

    .bg-success {
        background-color: #00FF00;
        color: white;
    }

    .bg-warning {
        background-color: #0000FF;
        color: white;
    }

    .bg-primary {
        background-color: #007BFF;
        color: white;
    }
</style>

<script>
    function domestic() {
        document.getElementById('domestic-payments').classList.remove('d-none')
        document.getElementById('international-payments').classList.add('d-none')
    }

    function international() {
        document.getElementById('domestic-payments').classList.add('d-none')
        document.getElementById('international-payments').classList.remove('d-none')
    }

    function blocking_status() {
        var selectElement = document.getElementById('blocking-status-select');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'BLOCKED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'BLOCKING-PENDING') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'RELEASED') {
            selectElement.classList.add('bg-warning', 'text-white');
        }
    }


    function booking_status() {
        var selectElement = document.getElementById('booking-status-select');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'OPEN') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'PENDING') {
            selectElement.classList.add('bg-warning', 'text-white');
        } else if (selectedOption.value === 'CLOSED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'CANCELLED') {
            selectElement.classList.add('bg-primary', 'text-white');
        }
    }

    function Voucher_Permission() {
        var selectElement = document.getElementById('Voucher_Permission_Select');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'APPROVE') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'HOLD') {
            selectElement.classList.add('bg-danger', 'text-white');
        }
    }

    function Voucher_Status() {
        var selectElement = document.getElementById('Voucher_Status_Select');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'PENDING') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'ISSUED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'CANCELLED') {
            selectElement.classList.add('bg-primary', 'text-white');
        }
    }

    function Payment_Type() {
        var selectElement = document.getElementById('Payment_Type_Select');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'ADVANCE') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'COMPLETE') {
            selectElement.classList.add('bg-success', 'text-white');
        }

    }


    function international_booking_status() {
        var selectElement = document.getElementById('international_booking_status');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'BLOCKED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'BLOCKING-PENDING') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'RELEASED') {
            selectElement.classList.add('bg-warning', 'text-white');
        }

    }

    function international_payment_status() {
        var selectElement = document.getElementById('international_payment_status');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'OPEN') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'PENDING') {
            selectElement.classList.add('bg-warning', 'text-white');
        } else if (selectedOption.value === 'CLOSED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'CANCELLED') {
            selectElement.classList.add('bg-primary', 'text-white');
        }

    }

    function international_voucher_permission() {
        var selectElement = document.getElementById('international_voucher_permission');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'APPROVE') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'HOLD') {
            selectElement.classList.add('bg-danger', 'text-white');
        }
    }

    function international_voucher_status() {
        var selectElement = document.getElementById('international_voucher_status');
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        selectElement.classList.remove('bg-danger', 'bg-primary', 'bg-success', 'bg-warning', 'text-white');

        if (selectedOption.value === 'PENDING') {
            selectElement.classList.add('bg-danger', 'text-white');
        } else if (selectedOption.value === 'ISSUED') {
            selectElement.classList.add('bg-success', 'text-white');
        } else if (selectedOption.value === 'CANCELLED') {
            selectElement.classList.add('bg-primary', 'text-white');
        }
    }
</script>


<div class="col-xl-12">
    <div class="card">
        <div class="card-header bg-white">
            <h2 class="m-2">Payments</h2>
            <button class="btn btn-outline-primary switch-tab-buttons" onclick="domestic()">Domestic Payments</button>
            <button class="btn btn-outline-primary switch-tab-buttons" onclick="international()">International Payments</button>
            <!-- <p class="card-title-desc">If your form layout allows it, you can swap the <code>.{valid|invalid}-feedback</code> classes for <code>.{valid|invalid}-tooltip</code> classes to display validation feedback in a styled tooltip.</p> -->
        </div>

        <div class="card-body">


            <!-- Domestic Data -->


            <div id="domestic-payments">
                     <h3>Domestic Payments</h3>
                     <div class="form-check form-switch ms-4 mb-3">
                   
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
  <h6>Completed Payments</h6>
 
</div>

               
                <table class="table table-bordered table-responsive " >
                    <thead>
                        <tr class=" table-bordered  ">
                            <th style="min-width:100px" rowspan="2">S. No</th>
                            <th style="min-width:200px" rowspan="2">BLOCKING STATUS</th>
                            <th style="min-width:200px" rowspan="2">PAYMENT STATUS</th>
                            <th style="min-width:200px" rowspan="2">SALE DATE</th>
                            <th style="min-width:200px" rowspan="2">BOOKING ENTRY DATE</th>
                            <th style="min-width:200px" rowspan="2">VOUCHER PERMISSION</th>
                            <th style="min-width:200px" rowspan="2">VOUCHER STATUS</th>
                            <th style="min-width:200px" rowspan="2">REF NO.</th>
                            <th style="min-width:200px" rowspan="2">ITINERARY MANAGER</th>
                            <th style="min-width:200px" rowspan="2">TRIP START DATE</th>
                            <th style="min-width:200px" rowspan="2">CUSTOMER NAME</th>
                            <th style="min-width:300px" rowspan="2">HOLIDAY DESTINATION</th>
                            <th style="min-width:200px" rowspan="2"> SERVICE TYPE</th>
                            <th style="min-width:300px" rowspan="2">HOTEL/SUPPPLIER/FLIGHT DETAILS </th>
                            <th style="min-width:300px" rowspan="2">CHECKIN/FROM/ONWARD</th>
                            <th style="min-width:300px" rowspan="2">CHECKOUT/TO/RETURN</th>
                            <th style="min-width:500px" colspan="2">HOTEL CONTACT INFORMATION</th>
                            <th style="min-width:500px" colspan="4">COST BIFURCATION (AS PER ITINERARY CALCULATION)</th>
                            <th style="min-width:400px" colspan="1">ACTIONS</th>
                        </tr>
                        <tr>
                            <th class="font-size-12" style="min-width:300px">CONTACT PERSON /INHOUSE GOGAGA</th>
                            <th class="font-size-12" style="min-width:300px">CONTACT NUMBER & MAIL ID</th>
                            <th class="font-size-12" style="min-width:300px">ROOM/CAB COST PER DAY</th>
                            <th class="font-size-12" style="min-width:200px">NO.OF ROOMS </th>
                            <th class="font-size-12" style="min-width:200px">NO.OF NIGHTS</th>
                            <th class="font-size-12" style="min-width:150px">QUOTED</th>
                            <th class="font-size-12" style="min-width:200px">NEGOTIATED PRICE</th>
                            <th class="font-size-12" style="min-width:300px">PROFIT FROM NEGOTIATION</th>
                            <th class="font-size-12" style="min-width:200px">NET PAYABLE</th>
                            <th class="font-size-12" style="min-width:200px">BLOCKED DATE</th>
                            <th class="font-size-12" style="min-width:200px">BLOCKED TILL</th>
                            <th class="font-size-12" style="min-width:300px">BLOCKING THROUGH</th>
                            <th class="font-size-12" style="min-width:300px">FINAL PAYABLE</th>
                            <th class="font-size-12" style="min-width:200px">AMOUNT PAID</th>
                            <th class="font-size-12" style="min-width:300px">PAYMENT TYPE</th>
                            <th class="font-size-12" style="min-width:200px">ADVANCE </th>
                            <th class="font-size-12" style="min-width:300px">PENDING PAYMENT</th>
                            <th class="font-size-12" style="min-width:200px">GOGAGA INVOICE NO(IF ANY) </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td rowspan="4">1</td>
                            <td class="">
                                <select name="" id='blocking-status-select' class="form-control  bg-success " onchange="blocking_status()">

                                    <option value="BLOCKED">BLOCKED</option>
                                    <option value="BLOCKING-PENDING">BLOCKING PENDING</option>
                                    <option value="RELEASED">RELEASED</option>
                                </select>
                            </td>


                            <td class="">
                                <select name="" id="booking-status-select" onchange="booking_status()" class="form-control  bg-danger text-white">
                                    <option value="OPEN">OPEN</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="CLOSED">CLOSED</option>
                                    <option value="CANCELLED">TRIP CANCELLED</option>
                                </select>
                            </td>
                            <td rowspan="4">2023-10-01</td>
                            <td rowspan="4"><input type="date" class="form-control"></td>
                            <td rowspan="4">
                                <select name="" id="Voucher_Permission_Select" class="form-control bg-danger" onchange="Voucher_Permission()">
                                <option value="HOLD"> HOLD</option>
                                    <option value="APPROVE">APPROVE</option>
                                    

                                </select>
                            </td>
                            <td rowspan="4">
                                <select name="" id="Voucher_Status_Select" class="form-control bg-danger " onchange="Voucher_Status()">

                                    <option value="PENDING">VOUCHER PENDING</option>
                                    <option value="ISSUED"> VOUCHER ISSUED</option>
                                    <option value="CANCELLED">TRIP CANCELLED</option>
                                </select>
                            </td>
                            <td rowspan="4"><input type="text" value="GHRN11122 " class="form-control"></td>
                            <td rowspan="4"><input type="text" value="AKHILA " class="form-control"></td>
                            <td rowspan="4"> <input type="date" value="21-02-2024 " class="form-control"></td>
                            <td rowspan="4"><input type="text" value="KAVYA  " class="form-control"></td>
                            <td rowspan="4"> <input type="text" value="ANDAMAN " class="form-control"></td>
                            <td class="">HOTEL</td>
                            <td><input type="text" value="HOTEL REEF ATLANTIS - PORT BLAIR  " class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class='form-control' value="aaa"></td>
                            <td><input type="text" class='form-control' value="bbb"></td>
                            <td>INR 3600.00</td>
                            <td><input type="number" value="2" class="form-control"> </td>
                            <td><input type="nmber" value="3" class="form-control"></td>
                            <td><input type="text" value="INR 14000.00 " class="form-control"></td>
                            <td><input type="text" value="INR 14000.00 " class="form-control"></td>
                            <td>INR 0.00</td>
                            <td>INR 14000.00</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td>
                                <select name="" id="" class="form-control">

                                    <option value="">MAIL</option>
                                    <option value="">WHATSAPP</option>
                                    <option value="">SUMMIT LOGIN</option>
                                    <option value="">MMT BOOKING</option>
                                    <option value="">REZLIVE</option>

                                </select>
                            </td>
                            <td>INR 14000.00</td>
                            <td><input type="text" value="INR 4000.00 " class="form-control"></td>
                            <td>
                                <select name="" id="Payment_Type_Select" class="form-control bg-danger" onchange="Payment_Type()">
                                    <option value="ADVANCE">ADVANCE PAYMENT</option>
                                    <option value="COMPLETE">COMPLETE PAYMENT</option>
                                </select>
                            </td>
                            <td> <input type="date" value="12/05/2023" class="form-control"></td>
                            <td>INR 10000.00</td>
                            <td><input type="text" class="form-control"></td>
                            <td rowspan="4" style="min-width:250px">
                            <button class="btn btn-primary">Trip Completed</button>
                            <button class="btn btn-secondary mt-3">View Reservation Form</button>
                        </td>

                        </tr>


                        <tr>

                            <td class="">
                                <select name="" id="" class="form-control  bg-danger text-white">
                                    <option value="">BLOCKING PENDING</option>
                                    <option value="">BLOCKED</option>
                                    <option value="">RELEASED</option>
                                </select>
                            </td>
                            <td class="">
                                <select name="" id="" class="form-control  bg-success text-white">
                                    <option value="">OPEN</option>
                                    <option value="">PENDING</option>
                                    <option value="">CLOSED</option>
                                    <option value="">CANCELLED</option>
                                </select>
                            </td>


                            <td class="">CAB</td>
                            <td>JOURNEY ANDAMAN - SUMANTH</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class='form-control' value="aaa"></td>
                            <td><input type="text" class='form-control' value="bbb"></td>
                            <td>INR 3600.00</td>
                            <td>2</td>
                            <td>3</td>
                            <td>INR 14000.00</td>
                            <td><input type="text" class="form-control"></td>
                            <td>INR 0.00</td>
                            <td>INR 14000.00</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td>
                                <select name="" id="" class="form-control">

                                    <option value="">MAIL</option>
                                    <option value="">WHATSAPP</option>
                                    <option value="">SUMMIT LOGIN</option>
                                    <option value="">MMT BOOKING</option>
                                    <option value="">REZLIVE</option>

                                </select>
                            </td>
                            <td>INR 14000.00</td>
                            <td>INR 4000.00</td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">ADVANCE PAYMENT</option>
                                    <option value="">COMPLETE PAYMENT</option>
                                </select>
                            </td>
                            <td> 20-JUN-2023</td>
                            <td>INR 10000.00</td>
                            <td><input type="text" class="form-control"></td>

                        </tr>

                        <tr>

                            <td class="">
                                <select name="" id="" class="form-control  bg-danger text-white">
                                    <option value="">BLOCKING PENDING</option>
                                    <option value="">BLOCKED</option>
                                    <option value="">RELEASED</option>
                                </select>
                            </td>
                            <td class="">
                                <select name="" id="" class="form-control  bg-success text-white">
                                    <option value="">OPEN</option>
                                    <option value="">PENDING</option>
                                    <option value="">CLOSED</option>
                                    <option value="">TRIP CANCELLED</option>
                                </select>
                            </td>



                            <td class="">FLIGHT</td>
                            <td>6E 2003 RR, HYD, 18:15,02h 15m,DEL,20:30, Terminal 2</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class='form-control' value="aaa"></td>
                            <td><input type="text" class='form-control' value="bbb"></td>
                            <td>INR 3600.00</td>
                            <td>2</td>
                            <td>3</td>
                            <td>INR 14000.00</td>
                            <td><input type="text" class="form-control"></td>
                            <td>INR 0.00</td>
                            <td>INR 14000.00</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td>
                                <select name="" id="" class="form-control">

                                    <option value="">MAIL</option>
                                    <option value="">WHATSAPP</option>
                                    <option value="">SUMMIT LOGIN</option>
                                    <option value="">MMT BOOKING</option>
                                    <option value="">REZLIVE</option>

                                </select>
                            </td>
                            <td>INR 14000.00</td>
                            <td>INR 4000.00</td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">ADVANCE PAYMENT</option>
                                    <option value="">COMPLETE PAYMENT</option>
                                </select>
                            </td>
                            <td> 20-JUN-2023</td>
                            <td>INR 10000.00</td>
                            <td><input type="text" class="form-control"></td>

                        </tr>


                        <tr>

                            <td class="">
                                <select name="" id="" class="form-control  bg-danger text-white">
                                    <option value="">BLOCKING PENDING</option>
                                    <option value="">BLOCKED</option>
                                    <option value="">RELEASED</option>
                                </select>
                            </td>
                            <td class="">
                                <select name="" id="" class="form-control  bg-success text-white">
                                    <option value="">OPEN</option>
                                    <option value="">PENDING</option>
                                    <option value="">CLOSED</option>
                                    <option value="">CANCELLED</option>
                                </select>
                            </td>




                            <td class="">CRUISE</td>
                            <td>JALESH CRUISES MUMBAI - GOA</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class='form-control' value="aaa"></td>
                            <td><input type="text" class='form-control' value="bbb"></td>
                            <td>INR 3600.00</td>
                            <td>2</td>
                            <td>3</td>
                            <td>INR 14000.00</td>
                            <td><input type="text" class="form-control"></td>
                            <td>INR 0.00</td>
                            <td>INR 14000.00</td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td>
                                <select name="" id="" class="form-control">

                                    <option value="">MAIL</option>
                                    <option value="">WHATSAPP</option>
                                    <option value="">SUMMIT LOGIN</option>
                                    <option value="">MMT BOOKING</option>
                                    <option value="">REZLIVE</option>

                                </select>
                            </td>
                            <td>INR 14000.00</td>
                            <td>INR 4000.00</td>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">ADVANCE PAYMENT</option>
                                    <option value="">COMPLETE PAYMENT</option>
                                </select>
                            </td>
                            <td> 20-JUN-2023</td>
                            <td>INR 10000.00</td>
                            <td><input type="text" class="form-control"></td>
                            

                        </tr>



                    </tbody>
                </table>

            </div>











            <!-- Internatioanl Data -->



            <div id="international-payments" class="d-none ">
                <h3>International Payments</h3>
                <div class="form-check form-switch ms-4 mb-3">
                   
                   <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                   <h6>Completed Payments</h6>
                  
                 </div>
                 
                <table class="table table-bordered table-responsive " id='PoductivityTables'>
                    <thead>
                        <tr class="table table-bordered  ">
                            <th style="min-width:100px" rowspan="2">S.No</th>
                            <th style="min-width:200px" rowspan="2">BOOKING STATUS</th>
                            <th style="min-width:200px" rowspan="2">PAYMENT STATUS</th>
                            <th style="min-width:200px" rowspan="2">SALE DATE</th>
                            <th style="min-width:200px" rowspan="2">BOOKING ENTRY DATE</th>
                            <th style="min-width:300px" rowspan="2">VOUCHER PERMISSION</th>
                            <th style="min-width:200px" rowspan="2">VOUCHER STATUS</th>
                            <th style="min-width:200px" colspan="4">TCS, INVOICE & VOUCHERS</th>
                            <th style="min-width:200px" rowspan="2">BOOKED BY</th>
                            <th style="min-width:200px" rowspan="2">PAYMENT DEADLINE</th>
                            <th style="min-width:200px" rowspan="2">REF NO.</th>
                            <th style="min-width:200px" rowspan="2">ITINERARY MANAGER</th>
                            <th style="min-width:300px" rowspan="2">TRIP START DATE</th>
                            <th style="min-width:200px" rowspan="2"> CUSTOMER NAME</th>
                            <th style="min-width:300px" rowspan="2">HOLIDAY DESTINATION</th>
                            <th style="min-width:300px" rowspan="2">DMC/VENDOR NAMES</th>
                            <th style="min-width:400px" colspan="2">DMC CONTACT INFORMATION </th>
                            <th style="min-width:500px" colspan="4">TOTAL COST QUOTED( AS PER ITINERARY CALCULATION)</th>
                            <th style="min-width:500px" colspan="4">COST BIFURCATION (AS PER ITINERARY CALCULATION)</th>

                        </tr>
                        <tr>
                            <th class="font-size-12" style="min-width:150px">TCS</th>
                            <th class="font-size-12" style="min-width:200px">TCS AMOUNT</th>
                            <th class="font-size-12" style="min-width:200px">TCS PAY DATE</th>
                            <th class="font-size-12" style="min-width:200px">INVOICE NO(IF ANY)</th>
                            <th class="font-size-12" style="min-width:300px">QUOTATION QUOTED BY(SUPPLIER)</th>
                            <th class="font-size-12" style="min-width:300px">CONTACT NUMBER & MAIL ID</th>
                            <th class="font-size-12" style="min-width:150px">CURRENCY</th>
                            <th class="font-size-12" style="min-width:200px"> TOTAL COST</th>
                            <th class="font-size-12" style="min-width:300px">TOTAL COST IN CURRENCY</th>
                            <th class="font-size-12" style="min-width:300px">CURRENCY RATE CONSIDERED</th>
                            <th class="font-size-12" style="min-width:450px">CURRENCY CONVERSION AS PER COSTING WITHOUT REMITTANCE</th>
                            <th class="font-size-12" style="min-width:300px">AMOUNT PAID</th>
                            <th class="font-size-12" style="min-width:200px">TRANSFER TYPE</th>
                            <th class="font-size-12" style="min-width:200px">VISA TYPE </th>
                            <th class="font-size-12" style="min-width:300px">VISA SUPPLIER</th>
                            <th class="font-size-12" style="min-width:300px">VISA STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">1</td>
                            <td class="">

                                    <select name=""  class="form-control  bg-success " id='international_booking_status' onchange="international_booking_status()">

<option value="BLOCKED">BLOCKED</option>
<option value="BLOCKING-PENDING">BLOCKING PENDING</option>
<option value="RELEASED">RELEASED</option>
</select>
                            </td>

                            <td class="">
                                <select name="" id="international_payment_status" class="form-control bg-danger text-white" onchange="international_payment_status()">
                                    <option value="OPEN">OPEN</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="CLOSED">CLOSED</option>
                                    <option value="CANCELLED">TRIP CANCELLED</option>
                                </select>
                            </td>
                            <td rowspan="4">2023-10-01</td>
                            <td rowspan="4"><input type="date" class="form-control"></td>
                            <td rowspan="4">
                                <select name="" id="international_voucher_permission" class="form-control bg-success " onchange="international_voucher_permission()">

                                    <option value="APPROVE">APPROVE</option>
                                    <option value="HOLD"> HOLD</option>

                                </select>
                            </td>
                            <td rowspan="4">
                                <select name="" id="international_voucher_status" class="form-control bg-danger" onchange="international_voucher_status()">

                                    <option value="PENDING">VOUCHER PENDING</option>
                                    <option value="ISSUED"> VOUCHER ISSUED</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                </select>
                            </td>

                            <td class="font-size-12">
                                <select name="" class="form-control" id="">
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                    <option value="PAID">PAID</option>
                                    <option value="TO-BE-PAID">TO-BE-PAID</option>
                                </select>
                            </td>
                            <td class="font-size-16"><input type="text" value="8046" class="form-control"></td>
                            <td class="font-size-16"><input type="date" value="" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="#99" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="SHIVA " class="form-control"></td>
                            <td class="font-size-6"><input type="date" value="" class="form-control"></td>
                            <td rowspan="4"><input type="text" value="GHRN11122 " class="form-control"></td>
                            <td rowspan="4"><input type="text" value="AKHILA " class="form-control"></td>
                            <td rowspan="4"> <input type="date" value="21-02-2024 " class="form-control"></td>
                            <td rowspan="4"><input type="text" value="KAVYA  " class="form-control"></td>
                            <td rowspan="4"> <input type="text" value="ANDAMAN " class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="TRAVEL DMC" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="2040 USD" class="form-control"></td>
                            <td class="font-size-16">
                                <input type="text" value="99XX7789XX" class="form-control MB-2">
                                <input type="gmail" value="abc@gmail.com" class="form-control">
                            </td>
                            <td class="font-size-16"><input type="text" value="USD" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="2040" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="USD2040" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="84" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="INR 1,10,000.00" class="form-control"></td>
                            <td class="font-size-16"><input type="text" value="INR 1,20,000.00" class="form-control">
                            </td>
                            <td class="font-size-16">
                                <select name="" id="" class="form-control ">
                                    <option value="">REMITTANCE</option>
                                    <option value="">INR PAYMENT</option>
                                    <option value="">CREDIT CARD</option>
                                    <option value="">OFFLINE</option>
                                </select>
                            </td>

                            <td class="font-size-16">
                                <select name="" id="" class="form-control">
                                <option value="VISA-FREE">VISA FREE</option>
                                <option value="ON-ARRIVAL">ON ARRIVAL</option>
                                <option value="IN-HOUSE-PROCESS">IN HOUSE PROCESS</option>
                                <option value="TO-BE-APPLIED">TO BE APPLIED</option>
                                <option value="OWN">OWN</option>
                                    <option value="COMPLETED">COMPLETED</option>
                                    
                                    
                                    
                                </select>
                            </td>
                            <td class="font-size-16">
                                <input type="text" value='VELU' class="form-control">
                            </td>
                            <td class="font-size-16">
                                <select name="" id="" class="form-control">
                                <option value="OPEN">OPEN</option>
                                <option value="PENDING">PENDING</option>
                                    <option value="CLOSED">CLOSED</option>
                                    
                                </select>
                            </td>
                            <td rowspan="4" style="min-width:250px">
                            <button class="btn btn-primary">Trip Completed</button>
                            <button class="btn btn-secondary mt-3">View Reservation Form</button>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <?php
    include "footer.php";
    ?>