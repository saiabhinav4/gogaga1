<?php
$title = "Receipts";
include "header.php";
?>


<h2 class='m-2 mb-4'>Commision Invoice</h2>
<div class='container border border-dark kk p-5 m-2'>

    <div class='text-end m-4 mb-0'>
        <img src="assets\images\logo_1.png" alt="" width="220px">
    </div>
    <style>
        .td {
            text-align: end;
        }

        .ss {
            line-height: 2.5;

        }

        .Coloured_title {

            color: #3eab26;
        }
    </style>
    <h1 class='font-size-60 fw-bold'>Commision Invoice</h1>
    <h5>Issued On : &nbsp &nbsp &nbsp <span class='Coloured_title '> 5-sep-2023</span></h5>

    <div class='row '>
        <table class="table mt-3 mb-4 table-borderless">
            <thead>
                <tr>
                    <td scope="col" class="col-lg-7">
                        <div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">Partner Name : </h5>
                                <span class=" fs-6 ">SESHU KIRAN RAMINEEDI - RAJAHMUNDRY - ANDHRA PRADESH.</span> <br>
                            </div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">PAN: </h5>
                                <span class=" fs-6 ">AIBPR8320B</span> <br>
                            </div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">Bank Account No : </h5>
                                <span class=" fs-6 ">756502010000023 </span> <br>
                            </div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">Designation: </h5>
                                <span class=" fs-6 ">SALES PARTNER</span> <br>
                            </div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">Invoice No: </h5>
                                <span class=" fs-6 ">20230906/SP/005</span> <br>
                            </div>
                            <div class='mt-2'>
                                <h5 class="d-inline me-3 ">Business Month: </h5>
                                <span class=" fs-6 ">AUG </span> <br>
                            </div>


                    </td>

                    <td scope="col" class="col-lg-5">
                        <div>

                            <div class=' text-end '>
                                <h5>Registered Office:</h5>
                                <p class='ss lh-base'> Gogaga Holidays Private Limited,<br>
                                    <span class="text-start">
                                        406 & 408, 4th Floor, Block-2, Whitehouse, Begumpet-500016,Hyderabad, Telangana. <br>
                                        <span class="fw-bold">Landline : </span> 040 40206965 <br>
                                        <span class="fw-bold">Mail :</span> support@gogagaholidays.in<br>
                                        <span class="fw-bold">Web :</span> www.gogagaholidays.com
                                </p>
                                </span>


                            </div>

                        </div>
                    </td>


                </tr>
            </thead>

        </table>
        <hr class='mt-3 mb-5'>
    </div>

    <div class='col-lg-12'>
        <table class="table table-striped">
            <thead>

                <tr>
                    <th scope="col">SNO </th>
                    <th scope="col" class='td'>GHRN Number</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Base Price </th>
                    <th scope="col">Commission </th>
                    <th scope="col">Gross Value </th>
                    <th scope="col">TDS</th>
                    <th scope="col">Net Payable</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class='td'>GH123456</td>
                    <td>Client 1</td>
                    <td>Destination A</td>
                    <td>$500.00</td>
                    <td>$50.00</td>
                    <td>$550.00</td>
                    <td>$10.00</td>
                    <td>$540.00</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td class='td'>GH789012</td>
                    <td>Client 2</td>
                    <td>Destination B</td>
                    <td>$700.00</td>
                    <td>$70.00</td>
                    <td>$770.00</td>
                    <td>$15.00</td>
                    <td>$755.00</td>
                </tr>
                <!-- Add more sample data rows here -->

            </tbody>
        </table>
    </div>
    <hr class='mt-5 mb-3'>
    <h4>Deductions</h4>

    <table class="table table-striped">
        <thead>

            <tr>
                <th scope="col">SNO </th>
                <th scope="col" class="text-center">Particulars</th>
                <th scope="col" class="text-end">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td class="text-center">AAAA</td>
                <td class="text-end">$540.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td class="text-center">BBBB</td>

                <td class="text-end">$755.00</td>
            </tr>
            <!-- Add more sample data rows here -->

        </tbody>
    </table>

    <table class="table table-borderless">

        <tbody>
            <tr>

                <td>
                   
                </td>

                <td class='td'>
                    <h5>Total Deductions:</h5>
                    <p id='Receipt_Difference'>INR Rs.0</p>
                </td>


            </tr>

            <tr>

                <td>
                    
                </td>

                <td class='td'>
                    <h5>Net Commission Payable :</h5>
                    <p class='Coloured_title  font-size-20 fw-bold'>INR Rs.15554</p>
                </td>


            </tr>

        </tbody>
    </table>

    <hr class='mt-3 mb-3'>
    <h4>Note:</h4>
    <div class="mb-3 mt-3">
        <h5 class="d-inline me-3 ">Payment Method : </h5> <span class="Coloured_title fs-5 fw-bold">Bank Transfer</span>
    </div>

    <p class='lh-lg '>Your Payment is processed and you will receive the commission soon. <br>
        The above commissions are processed for business done before 31st of the previous month and after completion of the trip. <br>
        Any business falling in the present month is not considered for Payout <br>
        For any futher isuues regarding partner commssions please write us a mail to payout@gogagaholidays.in </p>
    <h3 class='Coloured_title '>We Thank You For Your Business</h3>

</div>
</div>

<?php
include "footer.php"
?>