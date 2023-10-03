<?php
$title = "Domestric Registration form";
include "header.php";
$lead_ids = $_GET['id'];

$leadData = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `leads` WHERE `lead_id`='$lead_ids'"));

?>
<script>
    $(document).ready(function() {
        $("#advanced_setting").hide();
        $('#advanced').click(function() {
            $("#advanced_setting").toggle();
        });
        if (('#leadIds').val != '') {
            $("#advanced_setting").toggle();
        }
    });
</script>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h4 class="card-title">Create New Domestic Reservation form</h4></br>
                    <p style="color:red">Note: Before entering the reservations form make sure all the information is provided as per final Itinerary and cost sheet, Further no changes are allowed in the reservations after submission.</p>
                    <div class="mt-2">
                            
                                <h3 for="example-text-input" class="form-label">GHRN<span>14537</span></h3>
                               
                            </div>
                    <div class="ms-auto">
                        <div class="row">
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body p-4">
                <?php if ($lead_ids) {
                    echo '<form action="" method="post" id="verifyLead">';
                } else {
                    echo '<form action="" method="post" id="newLead">';
                } ?>

                <div class="row">
                    <?php if ($lead_ids) { ?>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option selected>--- Select your Status---</option>
                                    <option>Not Reachable</option>
                                    <option>Done</option>
                                    <option>Call After Some Time</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Date Time</label>
                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-8">
                        <div class="mt-3 mt-lg-0">
                               
                    <div class="mb-5 border p-3  mt-4 shadow-sm">
                                                        <label for="choices-multiple-default" class="form-label font-size-20 ">Reservation Type</label>
                                                        <select class="form-control" data-trigger
                                                            name="Reservation _Type" id="choices-multiple-default"
                                                            placeholder="Reservation Type" multiple>
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

                    
<div class='col-md-4'></div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Total Package cost( All Inclusive)</label>
                                <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Advance Amount Received</label>
                                <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <!-- Button trigger modal -->
    <a href="#" value='' > <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
  <option >Payment type</option>
  <option value="1" selected>Credit</option>
  <option value="2">Debit</option>
</select> 
</div>  

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label" >Credit Source</label>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Add Payment</button>
      </div>
    </div>
  </div>
</div>
                                
                            </div>

                        </div>
                        


                        <div class="modal fade leadModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <div class="mb-3">
                                                <i class="bx bx-check-circle display-4 text-success"></i>
                                            </div>
                                            <h5>Lead Submitted successfully.</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->



            <div class="card-body p-4">
                <?php if ($lead_ids) {
                    echo '<form action="" method="post" id="verifyLead">';
                } else {
                    echo '<form action="" method="post" id="newLead">';
                } ?>

                <div class="row">
                    <?php if ($lead_ids) { ?>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option selected>--- Select your Status---</option>
                                    <option>Not Reachable</option>
                                    <option>Done</option>
                                    <option>Call After Some Time</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Date Time</label>
                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                            </div>
                        </div>
                    <?php } ?>
                    
                    <h4 class='mb-3'>Holiday Summary</h4>

                   
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
                    <div class="col-lg-8"></div><hr class='mt-3 mb-3'>

                    

<h4 class='mt-3 mb-3'>Customer Info</h4>
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


                    <div class="modal fade leadModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <div class="mb-3">
                                            <i class="bx bx-check-circle display-4 text-success"></i>
                                        </div>
                                        <h5>Lead Submitted successfully.</h5>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Holiday Summary-->


<!--partner-->
        <div class="card-body p-4">
            <?php if ($lead_ids) {
                echo '<form action="" method="post" id="verifyLead">';
            } else {
                echo '<form action="" method="post" id="newLead">';
            } ?>

            <div class="row">
                <?php if ($lead_ids) { ?>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected>--- Select your Status---</option>
                                <option>Not Reachable</option>
                                <option>Done</option>
                                <option>Call After Some Time</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Date Time</label>
                            <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        </div>
                    </div>
                <?php } ?>

                <h3>Commission Info</h3>


                <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Partner Type</th>
      <th scope="col" colspan='2' class='text-center'>Source Details</th>
      
      <th scope="col" class='text-center'>Commission</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">Gogaga Holidays</th>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Source Name </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Source Location </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td><div class="mb-3">
                            <label for="example-text-input" class="form-label">Commission </label>
                           <input type="number" class="form-control" id='sss'>
                        </div></td>
                        
    </tr>
    <tr>
      <th scope="row">Super Partner</th>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Name </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Location </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td><div class="mb-3">
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
                        </div></td>
    </tr>
    <tr>
      <th scope="row">Sales Partner</th>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Name </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Location </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td><div class="mb-3">
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
                        </div></td>
    </tr>
    <tr>
      <th scope="row">Lead Generator</th>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Name </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td> <div class="mb-3">
                            <label for="example-text-input" class="form-label">Partner Location </label>
                            <input class="form-control" type="text" placeholder="Partner Name" value="<?php echo $leadData['destination'] ?>" name="Partner Name" required>
                        </div></td>
      <td><div class="mb-3">
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
                        </div></td>
    </tr>
  </tbody>
</table>
    
                </div>
            </div>

            <div class="card-body p-4">
                <?php if ($lead_ids) {
                    echo '<form action="" method="post" id="verifyLead">';
                } else {
                    echo '<form action="" method="post" id="newLead">';
                } ?>

                <div class="row">
                    <?php if ($lead_ids) { ?>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option selected>--- Select your Status---</option>
                                    <option>Not Reachable</option>
                                    <option>Done</option>
                                    <option>Call After Some Time</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Date Time</label>
                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                            </div>
                        </div>
                    <?php } ?>
                    <div>
                        <h2>Hotel</h2>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Hotel Name</label>
                                <input class="form-control" type="text" placeholder="Hotel Name" value="<?php echo $leadData['destination'] ?>" name="Hotel Name" required>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Location</label>
                                <input class="form-control" type="text" placeholder="Location" value="<?php echo $leadData['destination'] ?>" name="Location" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Check In Date</label>
                                <input class="form-control" type="date" placeholder="SaleDate" name="sale_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Check Out Date</label>
                                <input class="form-control" type="date" placeholder="Check out" name="Check out" value="<?php echo $leadData['trip_start_date'] ?>" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Content Person </label>
                                <input class="form-control" type="text" placeholder="Content Person" value="<?php echo $leadData['destination'] ?>" name="Content Person" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Content Number </label>
                                <input class="form-control" type="text" placeholder="Content Number" value="<?php echo $leadData['destination'] ?>" name="Content Number" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Cabin Type </label>
                                <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Meal Type</label>
                                <select class="form-control" name="Meal Type">
                                    <option>CPAI </option>
                                    <option> APAI</option>
                                    <option> EPAI</option>
                                    <option> MAPAI</option>


                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Per Double Room Per Night </label>
                                <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Extra Bed Per Night </label>
                                <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label"> No Of Double Room </label>
                                <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label"> No Of Extra Bed </label>
                                <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label"> Total cost considered in cost sheet </label>
                                <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                            </div>

                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Add</button>
                        <i class="bi bi-plus"></i>
                    </div>






                </div>
            </div>
        </div> <!-- Hotel Details -->

        <!-- cruise Details -->
        <div class="card-body p-4">
            <?php if ($lead_ids) {
                echo '<form action="" method="post" id="verifyLead">';
            } else {
                echo '<form action="" method="post" id="newLead">';
            } ?>

            <div class="row">
                <?php if ($lead_ids) { ?>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected>--- Select your Status---</option>
                                <option>Not Reachable</option>
                                <option>Done</option>
                                <option>Call After Some Time</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Date Time</label>
                            <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        </div>
                    </div>
                <?php } ?>
                <div>
                    <h2>Cruise Details</h2>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Cruise Name</label>
                            <input class="form-control" type="text" placeholder="Cruise Name" value="<?php echo $leadData['destination'] ?>" name="Cruise  Name" required>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Cruise Supplier</label>
                            <input class="form-control" type="text" placeholder="Cruise Supplier" value="<?php echo $leadData['destination'] ?>" name="Cruise Supplier" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Check In Date</label>
                            <input class="form-control" type="date" placeholder="SaleDate" name="sale_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Check Out Date</label>
                            <input class="form-control" type="date" placeholder="Check out" name="Check out" value="<?php echo $leadData['trip_start_date'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Content Person </label>
                            <input class="form-control" type="text" placeholder="Content Person" value="<?php echo $leadData['destination'] ?>" name="Content Person" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Content Number </label>
                            <input class="form-control" type="text" placeholder="Content Number" value="<?php echo $leadData['destination'] ?>" name="Content Number" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Cabin Type </label>
                            <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Meal Type</label>
                            <select class="form-control" name="Meal Type">
                                <option>CPAI </option>
                                <option> APAI</option>
                                <option> EPAI</option>
                                <option> MAPAI</option>


                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Per Double Room Per Night </label>
                            <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Extra Bed Per Night </label>
                            <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"> No Of Double Room </label>
                            <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"> No Of Extra Bed </label>
                            <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"> Total cost considered in cost sheet </label>
                            <input class="form-control" type="text" placeholder=" doubleroom " value="<?php echo $leadData['destination'] ?>" name="doubleroom" required>
                        </div>

                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Add</button>
                    <i class="bi bi-plus"></i>
                </div>






            </div>
        </div>


        <!-- Table -->
        <div>
            <h3> Supplementary Details</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Location</th>
                        <th scope="col">Suplementary Name</th>
                        <th scope="col">Provisioned Date</th>
                        <th scope="col">Suplementary cost considered in cost sheet</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td></td>
                        <td></td>
                        <td>


                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <!-- <label for="example-text-input" class="form-label">Check Out Date</label> -->
                                        <input class="form-control" type="date" placeholder="Check out" name="Check out" value="<?php echo $leadData['trip_start_date'] ?>" required>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td></td>
                        <td></td>
                        <td>
                            <div class="col-lg-4">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <!-- <label for="example-text-input" class="form-label">Check Out Date</label> -->
                                        <input class="form-control" type="date" placeholder="Check out" name="Check out" value="<?php echo $leadData['trip_start_date'] ?>" required>
                                    </div>

                                </div>
                            </div>



                        </td>
                    </tr>
                    <tr>

                        <td colspan="3">Total Supplementary Cost</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Mode of Transport -->
        <div>

            <div class="flex">
                <label>Mode of transportation</label>

                <div class="col-lg-3">
                    <div class="mb-3">

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Flight
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Train
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Bus
                        </label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-3">

                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            own
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- flight details -->
        <div>
            <h4> Flights Details</h4>
        </div>
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="example-text-input" class="form-label"> IS this a Group Fare?</label>
            </div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Yes
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">No</label>

        </div>
        </br>
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="example-text-input" class="form-label"> Group Fares Provides by?</label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mt-3 mt-lg-0">
                <div class="mb-3">

                    <input class="form-control" type="text" placeholder="Employee Name" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                </div>

            </div>
        </div>
        <!-- <br/>
                    <div class="col-lg-3">
                     <div class="mb-3">
                        
                       <label for="example-text-input" class="form-label"> Fare Valid till?</label>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                              
                                <input class="form-control" type="date" placeholder="StartDate" name="start_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                            </div>

                        </div>
                    </div> -->



        <div class="card-body p-4">
            <?php if ($lead_ids) {
                echo '<form action="" method="post" id="verifyLead">';
            } else {
                echo '<form action="" method="post" id="newLead">';
            } ?>

            <div class="row">
                <?php if ($lead_ids) { ?>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected>--- Select your Status---</option>
                                <option>Not Reachable</option>
                                <option>Done</option>
                                <option>Call After Some Time</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Date Time</label>
                            <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        </div>
                    </div>
                <?php } ?>

                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">faresource </label>
                            <select class="form-control" name="Reservation _Type">
                                <option>TBO </option>
                                <option> MMT</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Travel Type </label>
                            <select class="form-control" name="Reservation _Type">
                                <option>One way </option>
                                <option> Return</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">class</label>
                            <select class="form-control" name="Reservation _Type">
                                <option>Economy </option>
                                <option>Premium Economy </option>
                                <option>Bussiness </option>
                                <option>First </option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">NO of Adults(+12)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">No of Childrens(2-12 years)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">No of Infants(0-2 years)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Total No of pax</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Summary</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>






            </div>
        </div>
        <!--train details -->
        <div class="card-body p-4">
            <?php if ($lead_ids) {
                echo '<form action="" method="post" id="verifyLead">';
            } else {
                echo '<form action="" method="post" id="newLead">';
            } ?>

            <div class="row">
                <?php if ($lead_ids) { ?>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected>--- Select your Status---</option>
                                <option>Not Reachable</option>
                                <option>Done</option>
                                <option>Call After Some Time</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Date Time</label>
                            <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        </div>
                    </div>
                <?php } ?>
                <div>
                    <h2>Train Details</h2>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">faresource </label>
                            <select class="form-control" name="Reservation _Type">
                                <option>TBO </option>
                                <option> MMT</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Travel Type </label>
                            <select class="form-control" name="Reservation _Type">
                                <option>One way </option>
                                <option> Return</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">class</label>
                            <select class="form-control" name="Reservation _Type">
                                <option>Economy </option>
                                <option>Premium Economy </option>
                                <option>Bussiness </option>
                                <option>First </option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">NO of Adults(+12)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">No of Childrens(2-12 years)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">No of Infants(0-2 years)</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Total No of pax</label>
                            <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Train Name</label>
                            <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Train Number</label>
                            <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">From City</label>
                            <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Destination City</label>
                            <input class="form-control" type="text" placeholder="Cabin Type" value="<?php echo $leadData['destination'] ?>" name="Cabin Type" required>
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
                            <input class="form-control" type="date" placeholder="StartDate" name="start_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"> Start Time</label></br>
                            <input type="time" id="appt" name="appt">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label"> End Time</label></br>
                            <input type="time" id="appt" name="appt">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Journey Duration</label>
                            <input class="form-control" type="text" placeholder="Journey Duration" value="<?php echo $leadData['destination'] ?>" name="Journey Duration" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">State Availability</label>
                            <input class="form-control" type="text" placeholder="Journey Duration" value="<?php echo $leadData['destination'] ?>" name="Journey Duration" required>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Total Train Cost Considered</label>
                            <input class="form-control" type="text" placeholder="Journey Duration" value="<?php echo $leadData['destination'] ?>" name="Journey Duration" required>
                        </div>
                    </div>

                </div>









            </div>
        </div>
         <!-- Tour Transfer Details -->
         <div class="card-body p-4">
            <?php if ($lead_ids) {
                echo '<form action="" method="post" id="verifyLead">';
            } else {
                echo '<form action="" method="post" id="newLead">';
            } ?>

            <div class="row">
                <?php if ($lead_ids) { ?>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected>--- Select your Status---</option>
                                <option>Not Reachable</option>
                                <option>Done</option>
                                <option>Call After Some Time</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">

                            <label for="example-text-input" class="form-label">Date Time</label>
                            <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        </div>
                    </div>
                <?php } ?>
                <div>
                    <h2>Tour& Transfer  Details</h2>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Supplier Name & Location</label>
                            <input class="form-control" type="text" placeholder="Cruise Name" value="<?php echo $leadData['destination'] ?>" name="Cruise  Name" required>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Seating Capacity</label>
                            <input class="form-control" type="text" placeholder="Cruise Supplier" value="<?php echo $leadData['destination'] ?>" name="Cruise Supplier" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Vehicle Type</label>
                            <input class="form-control" type="text" placeholder="Cruise Supplier" value="<?php echo $leadData['destination'] ?>" name="Cruise Supplier" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">No of vehicle</label>
                            <input class="form-control" type="text" placeholder="Cruise Supplier" value="<?php echo $leadData['destination'] ?>" name="Cruise Supplier" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Service Start Date</label>
                            <input class="form-control" type="date" placeholder="SaleDate" name="sale_date" value="<?php echo $leadData['trip_start_date'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Service End Date</label>
                            <input class="form-control" type="date" placeholder="Check out" name="Check out" value="<?php echo $leadData['trip_start_date'] ?>" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Cost per vehicle </label>
                            <input class="form-control" type="text" placeholder="Content Person" value="<?php echo $leadData['destination'] ?>" name="Content Person" required>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="example-text-input" class="form-label">Total Cost </label>
                            <input class="form-control" type="text" placeholder="Content Number" value="<?php echo $leadData['destination'] ?>" name="Content Number" required>
                        </div>

                    </div>
                </div>
              
                <div>
                    <button class="btn btn-primary" type="submit">Add</button>
                    <i class="bi bi-plus"></i>
                </div>






            </div>
        </div>
        <!-- Inclusion -->
        <div>
            <h3> Inclusion </h3>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                                3 Start Hotel stay
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                             Daily Breakfast
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                            GST
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                           Return Airfares
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                              Private Tranfers
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                            Customer support
                </label>
         </div>



        </div>
        <!-- Exclusion -->
        <div>
            <h3>Exclusion</h3>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                                Lunch
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                           Guide
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                        Latecheckouts
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                           Entry Tickets
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                              Additional Slightseeing
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                            Early check in
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                           Boat Ride
                </label>
         </div>
         <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
               <label class="form-check-label" for="flexCheckChecked">
                           Personal Expense
                </label>
         </div>




        </div>
        
    </div>









    <script>
        $(document).ready(function() {
            $('#newLead').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'saveAjax.php',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        $('.leadModal').modal('show');
                        $('#newLead')[0].reset();
                    }
                });
            });
            $('#verifyLead').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'saveAjax.php?state=verifyLead',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        window.location.href = "leads.php";
                    }
                });
            });
        });
    </script>

    <?php
    include "footer.php";
    ?>

    
<script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/libs/pace-js/pace.min.js"></script>
        <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="assets/libs/@simonwep/pickr/pickr.min.js"></script>
        <script src="assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/js/pages/form-advanced.init.js"></script>
        <script src="assets/js/app.js"></script>
