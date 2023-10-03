<?php
$title = "Dashboard";
include "header.php";
?>
<div class="card">
  <div class="card-header">
    <h4>Add New Credit Note</h4>
  </div>
  <div class="card-body">
     
  <div class="container mt-2">
       
  <form>
    <div class="row">
        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
                <label for="city mt-3 mb-3">City Name</label>
                <input type="text" class="form-control" id="city" placeholder="Enter City">
            </div>
        </div>
        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="hotelName">Hotel Name</label>
                <input type="text" class="form-control" id="hotelName" placeholder="Enter Hotel Name">
            </div>
        </div>
        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="cnIssuedDate">CN Issued Date</label>
                <input type="date" class="form-control" id="cnIssuedDate">
            </div>
        </div>
           
        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="validTill">Valid Till</label>
                <input type="date" class="form-control" id="validTill">
               
            </div>
        </div>

        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="towardsRefNumber">Towards Ref Number</label>
                <input type="text" class="form-control" id="towardsRefNumber" placeholder="Enter Towards Ref Number">
            </div>
        </div>

        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="towardsBookingID">Towards Booking ID</label>
                <input type="text" class="form-control" id="towardsBookingID" placeholder="Enter Towards Booking ID">
            </div>
        </div>

        <div class="col-lg-6 mt-3 mb-3">
            <div class="form-group">
            <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" placeholder="Enter Amount">
            </div>
        </div>
            
        </div>
    </div>
</form>



        
    

   
<div class='text-center m-3'>
            <button type="submit" class="btn btn-primary">Submit</button>

            </div>

  </div>
</div>



    

<?php
        include "footer.php";
?>