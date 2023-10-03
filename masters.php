<?php
$title = "Ledger";
include "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Add Bootstrap CSS link here -->
   
</head>
<body>
    <div class="container mt-2 card">
        <div class="card-header">
        <h2>Masters</h2>
        </div>
        <div class="card-body">

     
        

        <form>
            <!-- GST Input Field -->
            <div class="form-group col-lg-6 ">
                <label for="gstInput" class="font-size-16 fw-bold">GST:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            

            <!-- Terms and Conditions Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="termsInput"  class="font-size-16 fw-bold">Terms and Conditions:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            <!-- Dollar Rate Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="dollarRateInput" class="font-size-16 fw-bold">Dollar Rate:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            <!-- Partner Commissions Input Field -->
            <div class="form-group col-lg-6  mb-4">
                <label for="partnerCommissionsInput" class="font-size-16 fw-bold">Partner Commissions:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>
            

            <!-- Gogaga Commission Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="gogagaCommissionInput"  class="font-size-16 fw-bold">Gogaga Commission:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            <!-- GST Number Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="gstNumberInput" class="font-size-16 fw-bold">GST Number:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            <!-- Company Address Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="companyAddressInput"  class="font-size-16 fw-bold">Company Address:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>

            <!-- Bank Account Details Input Field -->
            <div class="form-group col-lg-6 mb-4">
                <label for="bankAccountInput"  class="font-size-16 fw-bold">Bank Account Details:</label>
                <div class="input-group mb-3">
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-primary" type="button" id="button-addon2">Save</button>
</div>
            </div>
        </form>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery libraries here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
            include "footer.php"
            ?>