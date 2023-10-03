<?php
$title = "Receipts";
include "header.php";
?>
<!-- Performa Receipts Start -->


<h2 class='m-3'>Performa Invoice</h2>

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
    <h1 class='font-size-100'>Performa Invoice</h1>
    <h5 class='Coloured_title '>Issued On the day of &nbsp &nbsp <span> 5-sep-2023</span></h5>

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
                            <div class='mt-3'>
                                <h5>Receipt To :</h5>
                                <p class='ss'> M/S TMR INFRA PRIVATE LIMITED</p>

                            </div>

                    </td>
                    <td scope="col" class=''>
                        <div>

                            <div class=''>



                            </div>

                        </div>
                    </td>
                    <td scope="col">
                        <div>

                            <div class='mt-3'>

                                <h5>Travel Destination:</h5>
                                <p class='ss'>GOA</p>
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
                    <th scope="col" class='td'>No.Of Pax</th>
                    <th scope="col" class='td'>Cost Per Pax</th>
                    <th scope="col" class='td'>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">Accommodation for 05 Nights / 10-08-2023 to 15-08-2023</td>
                    <td class='td'>10</td>
                    <td class='td'>Rs.1000</td>
                    <td class='td'>Rs.10000</td>
                </tr>

                <tr>
                    <td scope="row">Transportation for 06 Days / 10-08-2023 to 15-08-2023</td>
                    <td class='td'>10</td>
                    <td class='td'>Rs.1000</td>
                    <td class='td'>Rs.10000</td>
                </tr>

            </tbody>
        </table>
    </div>
    <hr class='mt-5 mb-5'>
    <table class="table table-borderless w-25">
    <tbody>
    <tr>
            <th scope="row">Sub Total:</th>
            <td>Rs.10000</td>
        </tr>
        <tr>
            <th scope="row">GST @5%:</th>
            <td>Rs.500</td>
        </tr>
        <tr>
            <th scope="row">Total Payable:</th>
            <td>Rs.10500</td>
        </tr>
    </tbody>
</table>







    <hr class="mt-5 mb-5">
    <h4>Bank Details</h5>
    <table class="table table-borderless">
    <tbody>
        <tr>
            <th scope="row">Bank Name:</th>
            <td>ICICI BANK Ltd.</td>
        </tr>
        <tr>
            <th scope="row">Account Name:</th>
            <td>GOGAGA HOLIDAYS PVT.LTD.</td>
        </tr>
        <tr>
            <th scope="row">Account Number:</th>
            <td>630805158633</td>
        </tr>
        <tr>
            <th scope="row">IFSC Code:</th>
            <td>ICIC0006308</td>
        </tr>
        <tr>
            <th scope="row">Branch Address:</th>
            <td>Kharkana, Secunderabad</td>
        </tr>
    </tbody>
</table>


       







        <hr class='mt-5 mb-5'>
        <h5>Note:</h5>
        <p class='lh-lg'>This is an auto generated statement and doesnt require signature <br>
            The above Amount may be Complete or Partial Payment towards the Complete Package <br>
            The Package will not be Valid if the above payment is partial payment and complete payment is not <br>
            received towards the package before due date</p>
        <h3 class='Coloured_title '>We Thank You for your Business</h3>

</div>
</div>



<?php
include 'footer.php';
?>