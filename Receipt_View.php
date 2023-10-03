<?php
$title = "Receipts";
include "header.php";
include "mystyles.php";
?>
<div class="card">

<div class="card-header">
<h2 class="m-2 mb-4 Page_Headers" style="font-family: poppins;" >Payment Receipt</h2>
</div>

<div class="card-body">
    <div class='container card Receipt-Container p-5 m-2'>

        <div class='text-end '>
            <img src="assets\images\logo_1.png" alt="" width="220px">
        </div>
        <style>
           
            .td {
                text-align: end;
                font-family: 'Roboto';
                font-size: 16px;
            }
           

           

          
            

           
        </style>
        <h1 class='Receipts_Header_text mb-3' >Payment Receipt</h1>
        <h5 class='Receipts_Sub_Header_text'>Issued On : &nbsp &nbsp &nbsp <span class='Coloured_title '> 5-sep-2023</span></h5>

        <div class='row '>
            <table class="table mt-3 mb-4 table-borderless">
                <thead>
                    <tr>
                        <td scope="col">
                            <div>
                                <div class='mt-3'>
                                    <h5 class="Receipts_Sub_Header_text">Receipt From :</h5>
                                    <p class='Receipt_Content'> Gogaga Holidays Private Limited <br>G-1, Modern Profound Tech Park, Ground Floor <br>White Field Road, Kondapur,Hyderabad <br>040 40206965</p>
                                </div>

                        </td>
                        <td scope="col">
                            <div>
                                <h5></h5>
                                <div class='mt-3'>
                                    <h5 class="Receipts_Sub_Header_text">Receipt To :</h5>
                                    <p class='Receipt_Content'> M/S TMR INFRA PRIVATE LIMITED</p>
                                    <h5 class="Receipts_Sub_Header_text">Travel Destination:</h5>
                                    <p class='Receipt_Content'>GOA</p>
                                </div>

                            </div>
                        </td>
                        <td scope="col">
                            <div>
                                <h5></h5>
                                <div class='mt-3'>
                                    <h5 class="Receipts_Sub_Header_text">Reference No# :</h5>
                                    <p class='Receipt_Content'> 11111-22-33-44</p>
                                    <h5 class="Receipts_Sub_Header_text">Travel Start Date:</h5>
                                    <p class='Receipt_Content'>9-jan-2024</p>
                                </div>

                            </div>
                        </td>

                    </tr>
                </thead>

            </table>
            <hr class='mt-3 mb-5'>
        </div>

        <div class='col-lg-12'>
            <table class="table table-borderless table-striped">
                <thead>

                    <tr>
                        <td scope="col" class="Receipts_Sub_Header_text ">Description</td>
                        <td scope="col"   class="Receipts_Sub_Header_text td  ">Total Price</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td scope="row" class="Receipt_Content">Total Land Package Cost</td>
                        <td class='td'>INR ₹144,754</td>
                    </tr>

                    <tr>
                        <td scope="row" class="Receipt_Content">Total Land Package Cost</td>
                        <td class='td'>INR ₹144,754</td>
                    </tr>
                    <tr>
                        <td scope="row" class="Receipt_Content">Total Land Package Cost</td>
                        <td class='td'>INR ₹144,754</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class='mt-5 mb-5'>

        <table class="table table-borderless ">

            <tbody>
                <tr>

                    <td>
                        <h5 class='Receipts_Sub_Header_text '>Notes:</h5>
                       <h6 class="Receipt_Content font-size-14">Sample Notes over here</h6>
                    </td>

                    <td  class="td">
                        <h5 class='Receipts_Sub_Header_text'>Difference:</h5>
                        <p class=' font-size-20'  style="font-family: Roboto;">INR Rs.0</p>
                    </td>


                </tr>

                <tr>

                    <td>
                        <h5 class='Receipts_Sub_Header_text '>Payment Type :</h5>
                        <h5 class="Coloured_title font-size-20 " style="font-family: Roboto;">Full Payment</h5>
                    </td>

                    <td class='td '>
                        <h5 class='Receipts_Sub_Header_text'>Total Pending Payment :</h5>
                        <p class='Coloured_title  font-size-20 '   style="font-family: Roboto;">INR Rs.0</p>
                    </td>


                </tr>

            </tbody>
        </table>

        <hr class='mt-5 mb-5'>
        <h5  class='Receipts_Sub_Header_text'>Note:</h5>
        <p class='lh-lg Receipt_Content'>This is an auto generated statement and doesnt require signature <br>
            The above Amount may be Complete or Partial Payment towards the Complete Package <br>
            The Package will not be Valid if the above payment is partial payment and complete payment is not <br>
            received towards the package before due date.</p>
        <h3 class='Coloured_title Receipt_Footer_Text' >We Wish You a very happy Holiday.</h3>

    </div>
</div>
</div>
</div>


<?php
include "footer.php"
?>