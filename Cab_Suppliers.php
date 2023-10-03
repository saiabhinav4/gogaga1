<?php
$title = "Ledger";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Information</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add DataTables CSS link here -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Cab Information</h2>

        <form id="SupplierForm">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="stateInput">State:</label>
                <input type="text" class="form-control" id="stateInput" placeholder="Enter State">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="cityInput">Service Locations:</label>
                <input type="text" class="form-control" id="cityInput" placeholder="Enter City">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="hotelNameInput">Supplier Name:</label>
                <input type="text" class="form-control" id="supplierNameInput" placeholder="Enter Hotel Name">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="contactInput">Contact Number & E-Mail:</label>
                <input type="text" class="form-control" id="contactInput" placeholder="Enter Contact Info">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="distanceInput">Vehicle Type:</label>
                <input type="text" class="form-control" id="distanceInput" placeholder="Enter Distance">
            </div>
        </div>
    
    
        <div class="col-lg-3">
            <div class="form-group">
                <label for="priceRangeInput">Seating Capacity:</label>
                <input type="text" class="form-control" id="priceRangeInput1" placeholder="Enter Price Range">
            </div>
        </div>
       
        <div class="col-lg-3">
            <div class="form-group">
                <label for="priceRangeInput">Per Day Cost:</label>
                <input type="text" class="form-control" id="priceRangeInput2" placeholder="Enter Price Range">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="priceRangeInput">Rate Per KM:</label>
                <input type="text" class="form-control" id="priceRangeInput3" placeholder="Enter Price Range">
            </div>
        </div>
       
       
        <div class="text-center">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
        </div>

    
</form>

        <div class="mt-4">
            <h3>Cabs Data</h3>
            <table class="table table-bordered " id="supplierDataTable">
                <thead>
                <tr>
                        <th>State</th>
                        <th>Service Locations</th>
                        <th>Supplier Name</th>
                        <th>Contact Number & E-Mail</th>
                        <th>Vehicle Type</th>
                        <th>Seating Capacity</th>
                        <th>Per Day Cost</th>
                        <th>Rate Per KM</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="supplierDataBody">
                    <!-- Data will be displayed here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery libraries here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Add DataTables JavaScript and jQuery libraries here -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <!-- JavaScript for displaying and managing data -->
    <script>
        const supplierData = [];
        let dataTable;

        $(document).ready(function() {
            dataTable = $('#supplierDataTable').DataTable();

            $('#supplierDataTable tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
        });

        function submitForm() {
            const state = document.getElementById('stateInput').value;
            const serviceLocations = document.getElementById('cityInput').value;
            const supplierName = document.getElementById('supplierNameInput').value;
            const contactInfo = document.getElementById('contactInput').value;
            const vehicleType = document.getElementById('distanceInput').value;
            const seatingCapacity = document.getElementById('priceRangeInput1').value;
            const perDayCost = document.getElementById('priceRangeInput2').value;
            const ratePerKm = document.getElementById('priceRangeInput3').value;

            if (state && serviceLocations && supplierName && contactInfo && vehicleType && seatingCapacity && perDayCost && ratePerKm) {
                const rowData = [state, serviceLocations, supplierName, contactInfo, vehicleType, seatingCapacity, perDayCost, ratePerKm];
                supplierData.push(rowData);
                displayData();
                clearForm();
            } else {
                alert('Please fill in all fields.');
            }
        }

        function displayData() {
            dataTable.clear().draw();

            for (const data of supplierData) {
                const disableButton = '<button type="button" class="btn " onclick="disableRow(this)"><i class="fa-solid fa-ban"></i></button></button>';
                data.push(disableButton); // Add the Disable button
                dataTable.row.add(data).draw();
            }
        }

        function disableRow(button) {
            const row = dataTable.row($(button).parents('tr'));
            $(row.node()).toggleClass('bg-soft-danger');
        }

        function clearForm() {
            document.getElementById('stateInput').value = '';
            document.getElementById('cityInput').value = '';
            document.getElementById('supplierNameInput').value = '';
            document.getElementById('contactInput').value = '';
            document.getElementById('distanceInput').value = '';
            document.getElementById('priceRangeInput1').value = '';
            document.getElementById('priceRangeInput2').value = '';
            document.getElementById('priceRangeInput3').value = '';
        }
    </script>
</body>
</html>


<?php
            include "footer.php"
            ?>
