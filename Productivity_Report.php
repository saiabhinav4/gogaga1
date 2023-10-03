<?php
ob_start();
$title = "Dashboard";
include "header.php";
include "config.php";
include "attachments.php";

?>

<!-- start page title -->
<div class="row">
    <div class="col-12">

    </div>
</div>
<!-- end page title -->

<div class="card-body m-0 p-0 pe-3 me-2">
    <?php if (!empty($errorMessage)) : ?>
        <div class='alert alert-danger'><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <?php if (!empty($successMessage)) : ?>
        <div class='alert alert-success'><?php echo $successMessage; ?></div>
    <?php else : ?>




        <!-- <table class="text-start table table-editable table-nowrap align-middle table-edits  table-bordered me-5">
            <thead>

                <tr>
                    <th style="min-width: 10px;" class="font-size-15">Executive</th>
                    <th style="min-width: 10px;" class="font-size-15"> Leads Allocated</th>
                    <th style="min-width: 10px;" class="font-size-15">Itineraries Confirmed</th>
                    <th style="min-width: 10px;" class="font-size-15">Target</th>
                    <th style="min-width: 10px;" class="font-size-15">Achievement</th>
                    <th style="min-width: 10px;" class="font-size-15">Achieved %</th>
                    <th style="min-width: 10px;" class="font-size-15">Actions </th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td data-field="Itinerary Executive">Executive 1</td>
                    <td data-field="cc">10</td>
                    <td>8</td>
                    <td data-field="fff">12</td>
                    <td data-field='ff'>10</td>
                    <td>83.33%</td>
                    <td> <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a></td>
                </tr>
            </tbody>
        </table> -->


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <title>Scrollable and Responsive Table</title>
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                table,
                th,
                td {
                    border: 1px solid #ddd;
                }

                th,
                td {
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                tbody {
                    max-height: 300px;
                    /* Set the maximum height for scrolling */
                    overflow-y: auto;
                    /* Enable vertical scrolling */
                }
            </style>
        </head>

        <body>

            <div class="container-fluid card p-5">
                <div class="card-header bg-white">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-sm-0 font-size-25">Productivity Report</h3>
                        <div>
                            <input type="month" class="form-control" id='monthInput'>
                            <script>
                                // Get the current date in "YYYY-MM" format
                                const currentDate = new Date().toISOString().slice(0, 7);

                                // Set the value of the input field to the current date
                                document.getElementById("monthInput").value = currentDate;
                            </script>
                        </div>

                    </div>
                </div>
                <table class="table table-bordered table-responsive " id='ProductivityTable'>
                    <thead>

                        <tr class="table-borderless  font-size-18" style="height:70px;">
                            <th style="min-width:200px;" class="bg-primary text-white text-center">Month</th>
                            <th style="min-width:200px" class="bg-success text-white text-center">September 2023</th>
                            <th style="min-width:250px" class="bg-primary text-white text-center">Total Land Cost</th>
                            <th style="min-width:250px" class="bg-success text-white text-center">50,00,000</th>
                            <th style="min-width:250px" class="bg-primary text-white text-center">Total Volume incl.Flights</th>
                            <th style="min-width:150px" class="bg-success text-white text-center">50,00,000</th>
                            <th style="min-width:200px" class="bg-primary text-white text-center">Total Cruise Cost</th>
                            <th style="min-width:150px" class="bg-success text-white text-center">50,00,000</th>
                            <th style="min-width:200px" class="bg-primary text-white text-center">Total Visa Cost</th>
                            <th style="min-width:150px" class="bg-success text-white text-center">1,40,000</th>
                            <th style="min-width:200px" class="bg-primary text-white text-center">Total Flight Cost</th>
                            <th style="min-width:150px" class="bg-success text-white text-center">2,50,600</th>
                        </tr>

                        <tr class="table-secondary table-bordered  thead-secondary">
                            <th style="min-width:100px">S. No</th>
                            <th style="min-width:200px">DATE</th>
                            <th style="min-width:200px">GHRN NUMBER</th>
                            <th style="min-width:200px">TRIP START DATE</th>
                            <th style="min-width:200px">AREA MANAGER</th>
                            <th style="min-width:200px">SALES MANAGER</th>
                            <th style="min-width:200px">SUPER PARTNER</th>
                            <th style="min-width:200px">HOLIDAY PARTNER</th>
                            <th style="min-width:200px">SALES PARTNER</th>
                            <th style="min-width:200px">ITINERARY MANAGER</th>
                            <th style="min-width:300px">NAME OF THE CUSTOMER</th>
                            <th style="min-width:200px">CONTACT NUMBER</th>
                            <th style="min-width:200px">CUSTOMER LOCATION</th>
                            <th style="min-width:200px">HOLIDAY LOCATION</th>
                            <th style="min-width:200px">HOLIDAY TYPE</th>
                            <th style="min-width:200px">NUMBER OF PAX</th>
                            <th style="min-width:200px">CRUISE COST <br>(FOR ALL PAX)</th>
                            <th style="min-width:200px">VISA COST <br>(FOR ALL PAX)</th>
                            <th style="min-width:200px">FLIGHT COST <br>(FOR ALL PAX)</th>
                            <th style="min-width:200px">LAND COST <br>(FOR ALL PAX)</th>
                            <th style="min-width:200px">TOTAL PACKAGE COST</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023-09-10</td>
                            <td>GHRN12345</td>
                            <td>2023-10-01</td>
                            <td>John Doe</td>
                            <td>Jane Smith</td>
                            <td>Super Partner 1</td>
                            <td>Holiday Partner 1</td>
                            <td>Sales Partner 1</td>
                            <td>Itinerary Manager 1</td>
                            <td>Customer 1</td>
                            <td>123-456-7890</td>
                            <td>Location 1</td>
                            <td>Holiday Location 1</td>
                            <td>Beach Vacation</td>
                            <td>2</td>
                            <td>$2000</td>
                            <td>$300</td>
                            <td>$800</td>
                            <td>$1200</td>
                            <td>$4300</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2023-09-15</td>
                            <td>GHRN67890</td>
                            <td>2023-10-05</td>
                            <td>Alice Johnson</td>
                            <td>Bob Williams</td>
                            <td>Super Partner 2</td>
                            <td>Holiday Partner 2</td>
                            <td>Sales Partner 2</td>
                            <td>Itinerary Manager 2</td>
                            <td>Customer 2</td>
                            <td>987-654-3210</td>
                            <td>Location 2</td>
                            <td>Holiday Location 2</td>
                            <td>Ski Trip</td>
                            <td>4</td>
                            <td>$3500</td>
                            <td>$400</td>
                            <td>$1200</td>
                            <td>$1800</td>
                            <td>$6900</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2023-09-20</td>
                            <td>GHRN54321</td>
                            <td>2023-10-10</td>
                            <td>David Lee</td>
                            <td>Eva Wilson</td>
                            <td>Super Partner 3</td>
                            <td>Holiday Partner 3</td>
                            <td>Sales Partner 3</td>
                            <td>Itinerary Manager 3</td>
                            <td>Customer 3</td>
                            <td>555-123-4567</td>
                            <td>Location 3</td>
                            <td>Holiday Location 3</td>
                            <td>Cultural Tour</td>
                            <td>3</td>
                            <td>$2800</td>
                            <td>$250</td>
                            <td>$900</td>
                            <td>$1400</td>
                            <td>$5450</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2023-09-20</td>
                            <td>GHRN54321</td>
                            <td>2023-10-10</td>
                            <td>David Lee</td>
                            <td>Eva Wilson</td>
                            <td>Super Partner 3</td>
                            <td>Holiday Partner 3</td>
                            <td>Sales Partner 3</td>
                            <td>Itinerary Manager 3</td>
                            <td>Customer 3</td>
                            <td>555-123-4567</td>
                            <td>Location 3</td>
                            <td>Holiday Location 3</td>
                            <td>Cultural Tour</td>
                            <td>3</td>
                            <td>$2800</td>
                            <td>$250</td>
                            <td>$900</td>
                            <td>$1400</td>
                            <td>$5450</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>2023-09-20</td>
                            <td>GHRN54321</td>
                            <td>2023-10-10</td>
                            <td>David Lee</td>
                            <td>Eva Wilson</td>
                            <td>Super Partner 3</td>
                            <td>Holiday Partner 3</td>
                            <td>Sales Partner 3</td>
                            <td>Itinerary Manager 3</td>
                            <td>Customer 3</td>
                            <td>555-123-4567</td>
                            <td>Location 3</td>
                            <td>Holiday Location 3</td>
                            <td>Cultural Tour</td>
                            <td>3</td>
                            <td>$2800</td>
                            <td>$250</td>
                            <td>$900</td>
                            <td>$1400</td>
                            <td>$5450</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>2023-09-20</td>
                            <td>GHRN54321</td>
                            <td>2023-10-10</td>
                            <td>David Lee</td>
                            <td>Eva Wilson</td>
                            <td>Super Partner 3</td>
                            <td>Holiday Partner 3</td>
                            <td>Sales Partner 3</td>
                            <td>Itinerary Manager 3</td>
                            <td>Customer 3</td>
                            <td>555-123-4567</td>
                            <td>Location 3</td>
                            <td>Holiday Location 3</td>
                            <td>Cultural Tour</td>
                            <td>3</td>
                            <td>$2800</td>
                            <td>$250</td>
                            <td>$900</td>
                            <td>$1400</td>
                            <td>$5450</td>
                        </tr>
                    </tbody>
                </table>

                



    <?php endif; ?>
</div>

<?php
include "footer.php";
?>




<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<!-- Table Editable plugin -->
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="assets/js/pages/table-editable.int.js"></script>

<script src="assets/js/app.js"></script>