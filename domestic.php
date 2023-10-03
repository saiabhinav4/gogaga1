<?php
$title = "Domestic Reservation";
include "header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#flight").hide();
        $("#train").hide();
        $("#bus").hide();
        $("#mode_of_transport").change(function() {
            var transport = $(this).val();
            if (transport == 'Flight') {
                $("#flight").show();
                $("#train").hide();
                $("#bus").hide();
            } else if (transport == 'Train') {
                $("#flight").hide();
                $("#train").show();
                $("#bus").hide();
            } else if (transport == 'Bus') {
                $("#flight").hide();
                $("#train").hide();
                $("#bus").show();
            } else {
                $("#flight").hide();
                $("#train").hide();
                $("#bus").hide();
            }
        });
        $("#check_out_date").change(function() {
            var room_cost = $("#room_cost").val();
            var no_of_rooms = $("#no_of_rooms").val();
            var start_date = $("#check_in_date").val();
            var end_date = $("#check_out_date").val();
            var dt1 = new Date(start_date);
            var dt2 = new Date(end_date);
            var time_difference = dt2.getTime() - dt1.getTime();
            var total_days = time_difference / (1000 * 60 * 60 * 24);
            var total_cost = (room_cost * no_of_rooms) * total_days;
            $("#hotel_total").val(total_cost);
            $("#hotel_totals").val(total_cost);
            console.log(total_cost);

        });
        $("#no_of_beds").change(function() {
            var start_date = $("#check_in_date").val();
            var end_date = $("#check_out_date").val();
            var dt1 = new Date(start_date);
            var dt2 = new Date(end_date);
            var time_difference = dt2.getTime() - dt1.getTime();
            var total_days = time_difference / (1000 * 60 * 60 * 24);
            var total_nights = parseInt(total_days) - 1;
            var total_cost = (room_cost * no_of_rooms) * total_days;
            var no_of_beds = $("#no_of_beds").val();
            var extra_bed = $("#extra_bed").val();
            var hotel_cost = $("#hotel_totals").val();
            var bed_cost = (no_of_beds * extra_bed) * total_nights;
            var new_hotel_cost = parseInt(bed_cost) + parseInt(hotel_cost);
            $("#hotel_total").val(new_hotel_cost);
            console.log(new_hotel_cost);
        });
    });
</script>
<div class="row">
    <center>
        <h5>Domestic Reservation Form</h5>
    </center>
    <p style="color:red">Note: Before entering the reservations form make sure all the information is provided as per final Itinerary and cost sheet, Further no changes are allowed in the reservations after submission.</p>
    <div class="mt-2">
        <h3 for="example-text-input" class="form-label m-3">GHRN<span>14537</span></h3>
    </div>

    <form action="associate.php" method="post" enctype="multipart/form-data">
        <div class="row">







            <div class="col-lg-8">
                <div class="mt-3 mt-lg-0">

                    <div class="mb-5 border p-3  mt-4 shadow-sm m-3">
                        <label for="choices-multiple-default" class="form-label font-size-20 ">Reservation Type</label>
                        <select class="form-control" data-trigger name="Reservation _Type" id="choices-multiple-default" placeholder="Reservation Type" multiple>
                            <option value="Choice 1">Flight</option>
                            <option value="Choice 2">Bus</option>
                            <option value="Choice 3">Train</option>
                            <option value="Choice 4">Accommodation</option>
                            <option value="Choice 5">Cruise</option>
                            <option value="Choice 6">Tour and tranfer</option>
                            <option value="Choice 7">Supplementary</option>
                        </select>
                        <!-- <h4>Payment Type</h4>
                                                        <select class="form-select" aria-label="Disabled select example" disabled>
  <option >Payment type</option>
  <option value="1" selected>Credit</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select> -->
                    </div>
                </div>


            </div>
            <div class='col-lg-0'></div>
            <div class="col-lg-4">
                <div class="mb-3 m-3">
                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Package Cost (All Inclusive)</label>
                    <input type="text" class="form-control" name="total_price" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3 m-3">
                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Advance Amount Received</label>
                    <input type="text" class="form-control" name="advance_amount" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mt-3 mt-lg-0">
                    <div class="mb-3">
                        <!-- Button trigger modal -->
                        <a href="#" value=''> <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Payment Type</button></a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Type</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Transaction Date</label>
                                            <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Transaction Filled By</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Payment Type</label>
                                            <select class="form-select" aria-label="Disabled select example" disabled>
                                                <option>Payment type</option>
                                                <option value="1" selected>Credit</option>
                                                <option value="2">Debit</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Credit Source</label>
                                            <select class="form-select" aria-label="Disabled select example" disabled>
                                                <option value="1" selected>Package</option>
                                                <option value="2"></option>
                                                <option value="3"></option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">GHRN Number(GHRNXXXXX)</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Payment Type</label>
                                            <select class="form-select" aria-label="Disabled select example">
                                                <option value="1" selected>Advance Payment</option>
                                                <option value="2">Complete Payment</option>
                                                <option value="3">Pending Payment</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Bank Transaction Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Credit Amount</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                                        </div>



                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 m-3">
                                            <button type="button" class="btn btn-primary">Add Payment</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Holiday Summary</h3>

                    </div>
                    <div class="card-body">

                        <div class="text-center">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Itinerary Executive</label>
                                            <input disabled class="form-control" type="text" placeholder="Itinerary" value="<?php echo $leadData['destination'] ?>" name="Itinerary" required>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Sale Date</label>
                                            <input class="form-control" type="date" placeholder="SaleDate" name="sale_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Reservation Submission Date</label>
                                            <input class="form-control" type="date" placeholder="Submission Date" value="<?php echo $leadData['destination'] ?>" name="Submission" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Holiday Destination</label>
                                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="Destination" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Trip Start Date</label>
                                            <input class="form-control" type="date" placeholder="StartDate" name="start_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Trip End Date</label>
                                            <input class="form-control" type="date" placeholder="EndDate" name="end_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Trip Duration</label>
                                            <input class="form-control" type="text" placeholder="Duration" value="<?php echo $leadData['destination'] ?>" name="Duration" required>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>


        <div class="col-lg-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer Info</h3>

                </div>
                <div class="card-body">

                    <div class="text-center">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Customer Name</label>
                                        <input class="form-control" type="text" placeholder="Name" value="<?php echo $leadData['destination'] ?>" name="Custom name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Contact Number</label>
                                        <input class="form-control" type="text" placeholder="Number" value="<?php echo $leadData['destination'] ?>" name="Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Mail ID</label>
                                        <input class="form-control" type="text" placeholder="Mail ID" value="<?php echo $leadData['destination'] ?>" name="Mail ID" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Customer Location </label>
                                        <input class="form-control" type="text" placeholder="Location" value="<?php echo $leadData['destination'] ?>" name="Location" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Customer Location </label>
                                        <input class="form-control" type="text" placeholder="Location" value="<?php echo $leadData['destination'] ?>" name="Location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Customer Location </label>
                                        <input class="form-control" type="text" placeholder="Location" value="<?php echo $leadData['destination'] ?>" name="Location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">No of Adults (+12years)</label>
                                        <input class="form-control" type="text" placeholder="Adults" value="<?php echo $leadData['destination'] ?>" name="Location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">No of Children(2-12years) </label>
                                        <input class="form-control" type="text" placeholder="Childrens" value="<?php echo $leadData['destination'] ?>" name="Children" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">No of Infants(0-2 years) </label>
                                        <input class="form-control" type="text" placeholder="Infants" value="<?php echo $leadData['destination'] ?>" name="Infants" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Total no of pax </label>
                                        <input class="form-control" type="text" placeholder="pax" value="<?php echo $leadData['destination'] ?>" name="pax" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Partner Details</h4>

                    </div>
                    <div class="card-body">

                        <div class="text-center">
                            <div class="row">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Source Type</th>
                                            <th scope="col" colspan='2' class='text-center'>Source Info</th>

                                            <th scope="col" class='text-center'>Commission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Gogaga Holidays</th>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Source Name </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Source Location </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Commission </label>
                                                    <input type="number" class="form-control" id='sss'>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Super Partner</th>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Name </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Location </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Commission </label>
                                                    <select class="form-control" name="Commission ">
                                                        <option>0% </option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                        <option>11%</option>
                                                        <option>12%</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sales Partner</th>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Name </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Location </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Commission </label>
                                                    <select class="form-control" name="Commission ">
                                                        <option>0% </option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                        <option>11%</option>
                                                        <option>12%</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lead Generator</th>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Name </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Partner Location </label>
                                                    <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Commission </label>
                                                    <select class="form-control" name="Commission ">
                                                        <option>0% </option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                        <option>11%</option>
                                                        <option>12%</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>









        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cost Sheet</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th style="min-width: 450px;">Particulars</th>
                            <th style="min-width: 100px;">Percentage</th>
                            <th style="min-width: 100px;">Value</th>
                        </tr>
                        <tr>
                            <td>Land Cost</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Loading % on Land cost</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Cost to Company</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Sales Partner and HP Partner Commission</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Super Partner</option>
                                    <option value="aa">aaa</option>
                                    <option value="bb">bb</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>

                        </tr>
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Sales Partner</option>>
                                    <option value="aa">aaa</option>
                                    <option value="bb">bb</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>

                        </tr>
                        <tr>
                            <td>
                                <select name="" id="" class="form-control">
                                    <option value="">Select Lead Generator</option>
                                    <option value="aa">aaa</option>
                                    <option value="bb">bb</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>

                        </tr>
                        <tr>
                            <td>Cost to be Sold</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Service tax to be loaded</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr class="bg-soft-secondary">
                            <td colspan="2">Land cost after Service Tax & Commissions</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Flight cost to be shared</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Loading % on Flight Cost</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Travel Insurance & Seat Selection(If flight is provided)</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr class="bg-soft-secondary">
                            <td colspan="2">Total Flight Cost</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Cruise cost / Chopper / Others(Vendor Price)</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Agents commission on Cruise</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr class="bg-soft-secondary">
                            <td colspan="2">Cruise Cost after loading</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Total Package cost</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Bajaj EMI</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <td colspan="2">Total Package cost after EMI (TO BE QUOTED)</td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Total No:of Pax</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Package cost per person with Flights</td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bg-secondary text-white text-center">TOTAL COST</td>
                        </tr>
                        <tr>
                            <td>Land Cost Per Person</td>
                            <td colspan="2"><input type="text" class="form-control"></td>

                        </tr>
                        <tr>
                            <td>Flight Cost Per Person</td>
                            <td colspan="2"><input type="text" class="form-control"></td>

                        </tr>

                    </table>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>







        <h4 class="">Day Wise Itinerary</h4>
        <div class="container-fluid  mt-5">

            <div id="containerWrapper">
                <!-- Initial container with input fields and "Add More" button -->
                <div class="card p-3 mb-3">

                    <div class="card-body">
                        <div class='row'>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <h6>Day </h6>
                                    <input type="text" class="form-control" name="day_title[]" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <h6>Day Title</h6>
                                    <input type="text" class="form-control" name="day_title[]" />
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <h6>Date</h6>
                                    <input type="date" class="form-control" name="date[]" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <h6>Hotel Name</h6>
                                    <input type="text" class="form-control" name="hotel_name[]" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <h6>Meal Plan</h6>
                                    <input type="text" class="form-control" name="meal_plan[]" />
                                </div>
                            </div>
                        </div>
                        <h6>Day Summary</h6>
                        <textarea class="form-control" name="day_summary[]" rows="3"></textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" onclick="addContainers()">Add More</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addContainers() {
                var containerWrapper = document.getElementById("containerWrapper");
                var clonedContainers = document.querySelector(".card.p-3").cloneNode(true);
                var removeButtons = document.createElement("button");
                removeButtons.className = "btn btn-danger mt-3";
                removeButtons.textContent = "Remove";
                removeButtons.onclick = function() {
                    removeContainers(this);
                };

                clonedContainers.querySelector(".card-body").appendChild(removeButtons);
                containerWrapper.appendChild(clonedContainers);
            }

            function removeContainers(button) {
                var containers = button.parentNode.parentNode;
                containers.parentNode.removeChild(containers);
            }
            document.addEventListener("click", function(event) {
                event.preventDefault();
            });
        </script>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hotel Details</h4>
                    <div class='text-end'>
                        <a href="#" id="addHotelBtn" class="btn btn-primary">Add Hotel</a>

                    </div>

                </div>
                <div class="" id="hotelAccordion" class="accordion mt-3 card-body">

                    <div class="">
                        <div class="row p-3">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Location</label>
                                    <input type="text" class="form-control" name="location" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Hotel Name</label>
                                    <input type="text" class="form-control" name="hotel_name" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Number</label>
                                    <input type="text" class="form-control" name="contact_person" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Room Category</label>
                                    <input type="text" class="form-control" name="room_category" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Per Double room per night</label>
                                    <input type="text" class="form-control" name="room_cost" id="room_cost" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Double rooms</label>
                                    <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check In Date</label>
                                    <input type="date" class="form-control" name="in_date" id="check_in_date" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check Out Date</label>
                                    <input type="date" class="form-control" name="out_date" id="check_out_date" />
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Meal Plan</label>
                                    <select class="form-control" name="meal_plan">
                                        <option selected>---Select Meal Plan--- </option>
                                        <option>EPAI</option>
                                        <option>CPAI</option>
                                        <option>MAPAI</option>
                                        <option>APAI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Extra Bed per night</label>
                                    <input type="text" class="form-control" name="extra_bed" id="extra_bed" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Extra Beds</label>
                                    <input type="email" class="form-control" name="no_of_beds" id="no_of_beds" />
                                </div>
                            </div>
                            <div class='col-lg-8'></div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cost considered in cost sheet</label>
                                    <input type="text" class="form-control" id="hotel_total" name="total_costs" disabled />
                                    <input type="hidden" class="form-control" id="hotel_totals" name="total_costs_new" />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cruise Details</h4>
                    <div class='text-end'>
                        <a href="#" id="addCrusieBtn" class="btn btn-primary ">Add Crusie</a>
                    </div>

                </div>
                <div class="" id="crusieAccordion" class="accordion mt-3 card-body">

                    <div class="text-center">
                        <div class="row p-4">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cruise Supplier</label>
                                    <input type="text" class="form-control" name="location" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cruise Name</label>
                                    <input type="text" class="form-control" name="hotel_name" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cabin Type</label>
                                    <input type="date" class="form-control" name="room_category" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Per Double room per night</label>
                                    <input type="text" class="form-control" name="room_cost" id="room_cost" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Double rooms</label>
                                    <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check In Date</label>
                                    <input type="date" class="form-control" name="in_date" id="check_in_date" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check Out Date</label>
                                    <input type="date" class="form-control" name="out_date" id="check_out_date" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Number</label>
                                    <input type="date" class="form-control" name="contact_person" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Meal Plan</label>
                                    <select class="form-control" name="meal_plan">
                                        <option selected>---Select Meal Plan--- </option>
                                        <option>EPAI</option>
                                        <option>CPAI</option>
                                        <option>MAPAI</option>
                                        <option>APAI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Extra Bed per night</label>
                                    <input type="text" class="form-control" name="extra_bed" id="extra_bed" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Extra Beds</label>
                                    <input type="email" class="form-control" name="no_of_beds" id="no_of_beds" />
                                </div>
                            </div>
                            <div class='col-lg-8'></div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cost considered in cost sheet</label>
                                    <input type="text" class="form-control" id="hotel_total" name="total_costs" disabled />
                                    <input type="hidden" class="form-control" id="hotel_totals" name="total_costs_new" />
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Supplemantary Cost Details(if any)</h4>
                    <div class='text-end'>
                        <a href="#" id="addRowBtn" class="btn btn-primary">Add</a>
                    </div>

                </div>
                <div class="card-body">

                    <div class="text-center">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Supplemantary Name</th>
                                        <th>Provisioned Date</th>
                                        <th>Supplemantary Cost considered in Costsheet</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="partnerTableBody">
                                    <tr>
                                        <td><input type="text" class="form-control" name="partner_type" required /></td>
                                        <td><input type="text" class="form-control" name="super_partner_name" required /></td>
                                        <td><input type="text" class="form-control" name="super_partner_location" required /></td>
                                        <td><input type="text" class="form-control" name="cost" required />

                                        </td>
                                    </tr>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>Total Cost:</strong></td>
                                        <td><span id="totalCost">0</span></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
</div>


<div class="row container">
    <div class="col-lg-8">
        <label class="form-label font-size-17 " for='mode_of_transport'>Mode of Transport</label>
        <select class="form-control" name="mode_of_transport" id="mode_of_transport">
            <option selected>---Select Transport Type---</option>
            <option>Flight</option>
            <option>Train</option>
            <option>Bus</option>
            <option>Own</option>
        </select>
    </div>
</div><br />

<div class="col-lg-12" id="flight">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Flight Details</h4>

        </div>
        <div class="card-body">

            <div class="">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Is this a Group Fare?</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Group Fares Provided by? Employee Name</label>
                            <input type="text" class="form-control" name="emp_name" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Fare Valid till?</label>
                            <input type="date" class="form-control" name="fare_expiry" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Fare Source</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>MMT</option>
                                <option>TBO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Travel Type</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>One Way</option>
                                <option>Return</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Class</label>
                            <select class="form-control" name="class">
                                <option selected>---Select---</option>
                                <option>Economy</option>
                                <option>Premium Economy</option>
                                <option>Premium Economy</option>
                                <option>Business</option>
                                <option>First</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Adults(+12 Years)</label>
                            <input type="number" class="form-control" name="in_date" id="no_of_adults" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Children(2-12 Years)</label>
                            <input type="number" class="form-control" name="out_date" id="no_of_childs" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Infants(0-2 Years)</label>
                            <input type="number" class="form-control" name="no_of_infants" id="no_of_infants" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Number of Pax</label>
                            <input type="number" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Summary</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h3>Onward</h3>
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Onward</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="col-lg-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Duration</label>
                                <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                            </div>
                            <div class="col-lg-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Baggage Weight </label>
                                <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <h3>Return</h3>
                        <div class="row p-3">
                            <div class="col-lg-6">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Return</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="col-lg-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Duration</label>
                                <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                            </div>
                            <div class="col-lg-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Baggage Weight </label>
                                <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Flight Cost Considered</label>
                            <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Baggage Cost if any</label>
                            <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Onward Flight Cost</label>
                            <input type="text" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

</div>


<div class="col-lg-12" id="train">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Train Details</h4>
            <a href="#" id="addRowBtn" class="btn btn-primary">Add</a>
        </div>
        <div class="card-body">

            <div class="">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Fare Source</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>MMT</option>
                                <option>TBO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Travel Type</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>One Way</option>
                                <option>Return</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Class</label>
                            <select class="form-control" name="class">
                                <option selected>---Select---</option>
                                <option>Economy</option>
                                <option>Premium Economy</option>
                                <option>Premium Economy</option>
                                <option>Business</option>
                                <option>First</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Adults(+12 Years)</label>
                            <input type="number" class="form-control" name="in_date" id="no_of_adults" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Children(2-12 Years)</label>
                            <input type="number" class="form-control" name="out_date" id="no_of_childs" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Infants(0-2 Years)</label>
                            <input type="number" class="form-control" name="no_of_infants" id="no_of_infants" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Number of Pax</label>
                            <input type="date" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->

<div class="col-lg-12" id="bus">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Bus Details</h4>
            <a href="#" id="addRowBtn" class="btn btn-primary">Add</a>
        </div>
        <div class="card-body">

            <div class="text-center">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Fare Source</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>MMT</option>
                                <option>TBO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Travel Type</label>
                            <select class="form-control" name="fare">
                                <option selected>---Select---</option>
                                <option>One Way</option>
                                <option>Return</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Class</label>
                            <select class="form-control" name="class">
                                <option selected>---Select---</option>
                                <option>Economy</option>
                                <option>Premium Economy</option>
                                <option>Premium Economy</option>
                                <option>Business</option>
                                <option>First</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Adults(+12 Years)</label>
                            <input type="date" class="form-control" name="in_date" id="no_of_adults" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Children(2-12 Years)</label>
                            <input type="date" class="form-control" name="out_date" id="no_of_childs" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Infants(0-2 Years)</label>
                            <input type="date" class="form-control" name="no_of_infants" id="no_of_infants" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Number of Pax</label>
                            <input type="date" class="form-control" name="no_of_infants" id="total_pax" />
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->

<div class="col-lg-12" id="tours">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tours and Transfers Details</h4>
            <div class='text-end'>
                <a href="#" id="addVehicleBtn" class="btn btn-primary">Add Vehicle</a>
            </div>

        </div>
        <div class="" id="vehicleAccordion" class="accordion mt-3 card-body">
            <div class="card-body">

                <div class="">
                    <div class="row">


                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Supplier Name & Location </label>
                                <input type="text" class="form-control" name="supplier_name" id="supplier_name" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Vehicle Type</label>
                                <input type="text" class="form-control" name="vehicle_type" id="vehicle_type" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Seating Capacity</label>
                                <input type="number" class="form-control" name="seats" id="seats" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Service Start Date</label>
                                <input type="date" class="form-control" name="service_start_date" id="service_start_date" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Service End Date</label>
                                <input type="date" class="form-control" name="service_end_date" id="service_end_date" />
                            </div>
                        </div>

                        <div class='col-lg-4'>

                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">No. of Vechicles</label>
                                <input type="number" class="form-control" name="no_of_vechicles" id="no_of_vechicles" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cost per Vehicle</label>
                                <input type="text" class="form-control" name="service_end_date" id="service_end_date" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cab Cost</label>
                                <input type="text" class="form-control" name="total_cab_cost" id="total_cab_cost" disabled />
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                Inclusions
            </div>
            <div class="card-body">

                <div class="form-group">

                    <div class="form-check">
                        <input type="text" class="form-control" id="domestic_add_inclusion">
                        <div class='text-center text-center'>
                            <button class='btn btn-soft-secondary m-3' id='inc_domestic'>Add</button>
                        </div>
                        <div id='domestic_inclusion_data'></div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                Exclusions
            </div>
            <div class="card-body">

                <div class="form-group">

                    <div class="form-check">
                        <input type="text" class="form-control" id="domestic_add_exclusion">
                        <div class='text-center text-center'>
                            <button class='btn btn-soft-secondary m-3' id='exc_domestic'>Add</button>
                        </div>
                        <div id='domestic_exclusion_data'></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('inc_domestic').addEventListener('click', function(event) {
            event.preventDefault();
            let inclusion = document.getElementById('domestic_add_inclusion');
            let s = inclusion.value;
            let inclusion_container = document.getElementById('domestic_inclusion_data');
            let cont = document.createElement('h5');
            cont.textContent = s;
            inclusion_container.appendChild(cont);

        });


        document.getElementById('exc_domestic').addEventListener('click', function(event) {
            event.preventDefault();
            let exclusion = document.getElementById('domestic_add_exclusion');
            let s = exclusion.value
            let exclusion_container = document.getElementById('domestic_exclusion_data');

            let conts = document.createElement('h5')

            conts.textContent = s
            exclusion_container.appendChild(conts)
        });


        document.getElementById('domestic_form_submit').addEventListener('click', function(event) {
            event.preventDefault();
        });
    </script>

    <div class='text-center m-3'>
        <input type="submit" class='btn btn-primary' id='domestic_form_submit'>
    </div>
    </form>
</div>














<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="domestic.js"></script>

<?php
include "footer.php";
?>