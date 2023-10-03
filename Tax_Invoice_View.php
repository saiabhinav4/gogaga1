<?php
$title = "Receipts";
include "header.php";
?>


<h2 class='m-2 mb-4'>Tax Invoice</h2>
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
        <h1 class='font-size-60'>Tax Invoice</h1>
        <h5 class='Coloured_title '>Issued On : &nbsp &nbsp &nbsp <span> 5-sep-2023</span></h5>

        <div class='row '>
            <table class="table mt-3 mb-4 table-borderless">
                <thead>
                    <tr>
                        <td scope="col">
                            <div>
                                <div class='mt-3'>
                                    <h5>Receipt From :</h5>
                                    <p class='ss'> Gogaga Holidays Private Limited <br>G-1, Modern Profound Tech Park, Ground Floor <br>White Field Road, Kondapur,Hyderabad <br>040 40206965</p>
                                <h5>GST No:</h5>
                                <P>1234-DDDH55HHJ555</P>
                                </div>

                        </td>
                        <td scope="col">
                            <div>
                                <h5></h5>
                                <div class='mt-3'>
                                    <h5>Receipt To :</h5>
                                    <p class='ss'> M/S TMR INFRA PRIVATE LIMITED</p>
                                    <h5>Travel Destination:</h5>
                                    <p class='ss'>GOA</p>
                                </div>

                            </div>
                        </td>
                        <td scope="col">
                            <div>
                                <h5></h5>
                                <div class='mt-3'>
                                    <h5>Reference No# :</h5>
                                    <p class='ss'> 11111-22-33-44</p>
                                    <h5>Travel Start Date:</h5>
                                    <p class='ss'>9-jan-2024</p>
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
                        <th scope="col">Description</th>
                        <th scope="col" class='td'>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Package Cost Less GST</td>
                        <td class='td'>INR ₹137,754</td>
                    </tr>

                    <tr>
                        <td scope="row">Goods and Service Tax (GST)</td>
                        <td class='td'>INR ₹6893</td>
                    </tr>
                    <tr>
                        <td scope="row">Total Cab Transportation Cost Incl. GST</td>
                        <td class='td'>INR ₹144,754</td>
                    </tr>
                    <tr>
                        <td scope="row">Payment Received</td>
                        <td class='td'>INR ₹144,754</td>
                    </tr>
                    <tr>
                        <td scope="row">Pending Payment</td>
                        <td class='td'>INR ₹0</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class='mt-5 mb-5'>

        <table class="table table-borderless">

            <tbody>
                <tr>

                    <td>
                        <h5>Notes:</h5>
                        <p id='receipt_notes'></p>
                    </td>

                    <td class='td'>
                        <h5>Difference:</h5>
                        <p id='Receipt_Difference'>INR Rs.0</p>
                    </td>


                </tr>

                <tr>

                    <td>
                        <h5>Payment Type :</h5>
                        <p>Full Payment</p>
                    </td>

                    <td class='td'>
                        <h5>Total Pending Payment :</h5>
                        <p class='Coloured_title  font-size-20'>INR Rs.0</p>
                    </td>


                </tr>

            </tbody>
        </table>

        <hr class='mt-5 mb-5'>
        <h5>Note:</h5>
        <p class='lh-lg'>This is an auto generated statement and doesnt require signature <br>
            The above Amount may be Complete or Partial Payment towards the Complete Package <br>
            The Package will not be Valid if the above payment is partial payment and complete payment is not <br>
            received towards the package before due date</p>
        <h3 class='Coloured_title '>We Wish You a very happy Holiday</h3>

    </div>
</div>

<?php
include "footer.php"
?>
