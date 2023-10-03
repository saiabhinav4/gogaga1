<?php
$title = "Receipts";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Form</title>
</head>

<body>
    <div class="container">

        <div class="card">
            <div class="card-header bg-white">
                <h3>Create Receipt</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="invoice_type">Invoice Type</label>
                                <select class="form-select" aria-label="Default select example" id='invoice_type'>
                                    <option selected>select </option>
                                    <option value="GST">GST</option>
                                    <option value="LTA">LTA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="GogagaReferenceNo"> Gogaga Reference No.</label>
                                <input type="text" class="form-control" id="GogagaReferenceNo" name="GogagaReferenceNo">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Receipt_No">Receipt No.</label>
                                <select class="form-select" aria-label="Default select example" id='Receipt_No'>
                                    <option selected>select </option>
                                    <option value="Reference No#">Reference No#</option>
                                    <option value="Invoice No#">Invoice No#</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Receipt_Num_type" id='Receipt_Num_type_title'>Reference_no/Invoice_no</label>
                                <input type="text" class="form-control" id="Receipt_Num_type" name="Receipt_Num_type">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="dateOfIssue">Date Of Issue:</label>
                                <input type="date" class="form-control" id="dateOfIssue" name="dateOfIssue">


                                <script>
                                    // Script to take a selected value and chnage content
                                    const receiptNoSelect = document.getElementById("Receipt_No");
                                    const selectedValueContainer = document.getElementById("Receipt_Num_type_title");

                                    receiptNoSelect.addEventListener("change", function() {
                                        const selectedValue = receiptNoSelect.value;
                                        selectedValueContainer.textContent = selectedValue;
                                    });

                                    var currentDate = new Date().toISOString().split("T")[0];
                                    document.getElementById("dateOfIssue").min = currentDate;
                                    document.getElementById("dateOfIssue").value = currentDate;
                                </script>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="GST_Number_Visibility">GST Number Visibility:</label>
                                <select class="form-control" id="GST_Number_Visibility" name="GST_Number_Visibility">
                                    <option value="Select" selected>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Customer_Name">Customer Name</label>
                                <input type="text" class="form-control" id="Customer_Name" name="Customer_Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="travelDestination">Travel Destination:</label>
                                <input type="text" class="form-control" id="travelDestination" name="travelDestination">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="travelStartDate">Travel Start Date:</label>
                                <input type="date" class="form-control" id="travelStartDate" name="travelStartDate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="payment_type">Payment Type:</label>
                                <select class="form-select" aria-label="Default select example" id='payment_type'>
                                    <option selected>select </option>
                                    <option value="full">Full Payment</option>
                                    <option value="partial">Partial Payment</option>
                                    <option value="pending">Pending Payment</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Total-Package_Cost">Total Package Cost</label>
                                <input type="text" class="form-control" id="Total-Package_Costn" name="Total-Package_Cost">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="GST_Number_Visibility">GST Visibility:</label>
                                <select class="form-control" id="GST_Visibility" name="GST_Visibility">
                                    <option value="Select" selected>Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Particulars">Particulars:</label>
                                <input type="text" class="form-control" id="Particulars" name="Particularso">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Package_Cost_Less_GST">Package Cost Less GST:</label>
                                <input type="text" class="form-control" id="Package_Cost_Less_GST" name="Package_Cost_Less_GST">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="GST%">GST%:</label>
                                <input type="text" class="form-control" id="GST%" name="GST%">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="GST_Amount">GST Amount:</label>
                                <input type="text" class="form-control" id="GST_Amount" name="GST_Amount">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Total_Package_Cost">Total Package Cost Incl GST:</label>
                                <input type="text" class="form-control" id="Total_Package_Cost" name="Total_Package_Cost">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Payment_Received">Payment Received:</label>
                                <input type="text" class="form-control" id="Payment_Received" name="Payment_Received">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Pending_Payment">Pending Payment:</label>
                                <input type="text" class="form-control" id="Pending_Payment" name="Pending_Payment">
                            </div>
                        </div>


                        <div class='text-center'>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'footer.php';
?>