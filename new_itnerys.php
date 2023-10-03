<?php
$title = "Itnerys";
include "header.php";
$lead_id = $_GET['id'];
$lead_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `leads` WHERE `lead_id`='$lead_id'"));
?>
<script>
    $(document).ready(function(){
        var date1 =  new Date($("#trip_start_date").val());
        var date2 =  new Date($("#trip_end_date").val());
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        $("#trip_duration").val(Difference_In_Days);
        var noPass = parseInt($("#no_of_adults").val())+parseInt($("#no_of_childs").val())+parseInt($("#no_of_infants").val());
        $("#no_of_passengers").val(noPass);
    })
    
    </script>
    <script>
    $(document).ready(function() {
      $("#itneryForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize(); // Serialize form data
        $.ajax({
          type: "POST",
          url: "itnerySave.php",
          data: formData,
          success: function(response) {
            // Process the response from the server
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Handle the error
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
        <h4 class="card-title" style='font-size:20px'>Itinerary Request Form</h4>
        </div>
        <div class="card-body p-4">
            <form id="itneryForm"  method="post">
                                                        <div class="row">                                                           
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">FORM FILLED BY</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="filled_by" value="<?php echo $username; ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">PACKAGE TYPE</label>
                                                                    <select name="pack_type" class="form-control">
                                                                    <?php
                                                                    $query = mysqli_query($conn, "SELECT * FROM `package_type`");
                                                                    while($rows = mysqli_fetch_array($query)){
                                                                        echo'<option value='.$rows['pack_id'].'>'.$rows['pack_name'].'</option>';
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">CUSTOMER TYPE</label>
                                                                    <select name="customer_type" class="form-control">
                                                                    <?php
                                                                    $query = mysqli_query($conn, "SELECT * FROM `customer_type`");
                                                                    while($rows = mysqli_fetch_array($query)){
                                                                        echo'<option value='.$rows['cust_type_id'].'>'.$rows['type_name'].'</option>';
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-text-input">PARTNER NAME</label>
                                                                    <input type="text" placeholder='name' class="form-control" id="formrow-text-input" name="filled_by" value="<?php echo $username; ?>" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">LOCATION</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="filled_by" value="<?php echo $username; ?>" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <!-- <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">PARTNER NAME</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="filled_by" value="<?php echo $username; ?>"  >
                                                                </div> -->
                                                            </div>
                                                        </div>   <hr>        
                                                        <br/>
                                                        <h5>Customer Information</h5><br/>
                                                        <div class="row">

                                                        <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">CUSTOMER NAME</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $lead_data['customer_name']; ?>" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">CONTACT NUMBER</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $lead_data['customer_number']; ?>" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">EMAIL</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $username; ?>" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">PREFERRED TIME TO CALL</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">CUSTOMER LOCATION</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $username; ?>" required >
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <hr>
<br/>
                                                            <h5>Holiday Information</h5><br/>
                                                        <div class="row">

                                                        <div class="mb-3 col-md-4">
                                                        <label for="example-text-input" class="form-label">Holiday Type</label>
                                                        <select name="" id="" class="form-control">
                                                            
                                                            <option value="Domestic">Domestic</option>
                                                            <option value="International"> International</option>
                                                        </select>
                                                    </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">START AIRPORT/TRAIN STATION/BUS STATION</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">HOLIDAY DESTINATION</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $lead_data['destination'];  ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">CITIES TO VISIT</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">TRIP START DATE</label>
                                                                    <input type="text" class="form-control" id="trip_start_date" name="cus_name" value="<?php echo  	$lead_data['trip_start_date'];  ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">TRIP END DATE</label>
                                                                    <input type="text" class="form-control" id="trip_end_date" name="cus_name" value="<?php echo  	$lead_data['trip_end_date']; ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">TRIP DURATION</label>
                                                                    <input type="text" class="form-control" id="trip_duration" name="cus_name"  disabled >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">TRAVEL FLIXIBILITY(How flexible is customer with change of dates?)</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"  >
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <hr>
<br/>
                                                            <h5>Passengers Information</h5><br/>
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">NUMBER OF ADULTS(+12 YEARS)</label>
                                                                    <input type="text" class="form-control" id="no_of_adults" name="cus_name" value="<?php  echo  	$lead_data['no_of_adults']; ?>"  >
                                                                </div>
                                                            </div>   
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">NUMBER OF CHILDREN(2-12 YEARS)</label>
                                                                    <input type="text" class="form-control" id="no_of_childs" name="cus_name" value="<?php  echo  	$lead_data['no_of_childs']; ?>"  >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">NUMBER OF INFANTS(0-2 YEARS)</label>
                                                                    <input type="text" class="form-control" id="no_of_infants" name="cus_name"   >
                                                                </div>
                                                            </div>                
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">TOTAL PASSENGERS</label>
                                                                    <input type="text" class="form-control" id="no_of_passengers" name="cus_name" disabled  >
                                                                </div>
                                                            </div>  
                                                                </div>
                                                                <hr>
<br/>
                                                            <h5>Hotel & Meal Information</h5><br/>
                                                        <div class="row">
                                                        <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">HOTEL STANDARD</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"   >
                                                                </div>
                                                            </div>   
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">HOTEL TYPE</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name" value="<?php echo $username; ?>"  >                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">ROOM TYPE</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"  >
                                                                </div>
                                                            </div>                
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">ROOM PREFERENCES</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"   >
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">NUMBER OF ROOMS</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"   >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">MEAL PLAN</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"   >
                                                                </div>
                                                            </div> 
                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">FOOD PREFERENCES</label>
                                                                    <input type="text" class="form-control" id="formrow-email-input" name="cus_name"   >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                            </div>
                                                            <div class="col-md-4">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">ANY SPECIFIC REQUIREMENT REGARDING ACCOMMODATION</label>
                                                                   <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">ANY SPECIFIC REQUIREMENT REGARDING MEAL</label>
                                                                   <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">ANY SPECIFIC TOURS OR EXCURSIONS REQUIRED?</label>
                                                                   <textarea class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            </div>
                                                            <hr>
<br/>
                                                            <h5>SELECT QUICK INCLUSIONS</h5><br/>
                                            <div class="row " >
                                             <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        VISA
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        HONEYMOON INCLUSIONS
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        TRAVEL INSURANCE
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        ADVENTURE ACTIVITIES
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        GUIDE
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        ENTRANCE TICKETS
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        DAY-1 BREAKFAST
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        EARLY CHECKIN
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                        LATE CHECKOUT
                                                        </label>
                                                    </div>
                                                    </div>
                                                    <div class='mt-3'>
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Budget for Entire Package</label>
                                                                   <input type="number" class="form-control" >
                                                                </div>              
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">IS CUSTOMER INTERESTED IN HOLIDAY EMI'S?</label>
                                                                   <select class="form-control" >
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                                </div>              
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">PLEASE UPLOAD COMPETETIVE QUOTE IF ANY?</label>
                                                                   <input type="file" class="form-control" />
                                                                </div>              
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">FORM RAISER INPUTS AND COMMENTS IF ANY?</label>
                                                                   <textarea class="form-control"></textarea>
                                                                </div>              
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="mb-3">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="mb-3">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <input type="submit" name="submit" class="btn btn-primary w-lg" value="Submit" />
                                                    </div>
                                                    </div>

                                            </div>
                                            </div>
                                            

        </div>       
        </div>   
                                                                </form>

    </div>
</div>
























<?php 
include "footer.php";
?>

