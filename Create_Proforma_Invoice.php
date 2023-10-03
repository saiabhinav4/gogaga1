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
            <div class="card-header bg-white ">
                <h3>Proforma Invoice</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                       
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="dateOfIssue">Date Of Issue:</label>
                                <input type="date" class="form-control" id="dateOfIssue" value="<?php echo date('Y-m-d'); ?>">

                                <script>
                                    // Script to take a selected value and chnage content
                                    const receiptNoSelect = document.getElementById("Receipt_No");
                                    const selectedValueContainer = document.getElementById("Receipt_Num_type_title");

                                    receiptNoSelect.addEventListener("change", function() {
                                        const selectedValue = receiptNoSelect.value;
                                        selectedValueContainer.textContent = selectedValue;
                                    });

                                    var currentDates = new Date().toISOString().split("T")[0];
                                    document.getElementById("dateOfIssues").value = currentDates;
                                </script>

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
                                <label for="Total-Package_Cost">Total Package Cost</label>
                                <input type="text" class="form-control" id="Total-Package_Costn" name="Total-Package_Cost">
                            </div>
                        </div>
                        <div class='col-lg-6'></div>
                        
                        <div class="col-lg-12 ">
                            <div class="form-group">
                               <h3>Particulars</h3>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="Proforma_Sub_Total">Description:</label>
                                <input type="text" class="form-control" id="Proforma_Sub_Total" name="Proforma_Sub_Total">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="Proforma_GST%">No of Pax:</label>
                                <input type="text" class="form-control" id="Proforma_GST%" name="Proforma_GST%">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="Proforma_GST_Amount">Cost Per Pax:</label>
                                <input type="text" class="form-control" id="Proforma_GST_Amount" name="Proforma_GST_Amount">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="Proforma_Total_Package_Cost">Total Cost </label>
                                <input type="text" class="form-control" id="Proforma_Total_Package_Cost" name="Proforma_Total_Package_Cost">
                            </div>
                        </div>
                       
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Proforma_Sub_Total">Sub Total:</label>
                                <input type="text" class="form-control" id="Proforma_Sub_Total" name="Proforma_Sub_Total">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Proforma_GST%">GST%:</label>
                                <input type="text" value="5" class="form-control" id="Proforma_GST%" name="Proforma_GST%">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Proforma_GST_Amount">GST Amount:</label>
                                <input type="text" class="form-control" id="Proforma_GST_Amount" name="Proforma_GST_Amount">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Proforma_Total_Package_Cost">Total Payable:</label>
                                <input type="text" class="form-control" id="Proforma_Total_Package_Cost" name="Proforma_Total_Package_Cost">
                            </div>
                        </div>
                    <h3 class="m-3">Bank Details</h3>
                        <div class="col-lg-12 ">
                            <div class="form-group w-50">
                                <label for="Proforma_Sub_Total">Bank Name:</label>
                                <input type="text" value="ICICI BANK Ltd." class="form-control" id="Proforma_Sub_Total" name="Proforma_Sub_Total">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group w-50">
                                <label for="Proforma_GST%">Account Name:</label>
                                <input type="text" value='GOGAGA HOLIDAYS PVT.LTD.' class="form-control" id="Proforma_GST%" name="Proforma_GST%">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group w-50">
                                <label for="Proforma_GST_Amount">Account Number:</label>
                                <input type="text" value='630805158633' class="form-control" id="Proforma_GST_Amount" name="Proforma_GST_Amount">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group w-50">
                                <label for="Proforma_Total_Package_Cost">IFSC Code</label>
                                <input type="text" value='ICIC0006308' class="form-control" id="Proforma_Total_Package_Cost" name="Proforma_Total_Package_Cost">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group w-50">
                                <label for="Proforma_Total_Package_Cost">Branch Address</label>
                                <input type="text"value='Kharkana,Secunderabad' class="form-control" id="Proforma_Total_Package_Cost" name="Proforma_Total_Package_Cost">
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