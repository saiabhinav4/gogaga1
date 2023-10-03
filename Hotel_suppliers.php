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
        <h2>Hotel Information</h2>

        <form id="hotelForm">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="stateInput">State:</label>
                <input type="text" class="form-control" id="stateInput" placeholder="Enter State" name="state">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="cityInput">City:</label>
                <input type="text" class="form-control" id="cityInput" placeholder="Enter City" name='city'>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="hotelNameInput">Hotel Name:</label>
                <input type="text" class="form-control" id="hotelNameInput" placeholder="Enter Hotel Name" name="hotel_name">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="distanceInput">Distance from City Centre:</label>
                <input type="text" class="form-control" id="distanceInput" placeholder="Enter Distance" name="distance_from_city">
            </div>
        </div>
    
    
        <div class="col-lg-3">
            <div class="form-group">
                <label for="priceRangeInput">Price Range:</label>
                <input type="text" class="form-control" id="priceRangeInput" placeholder="Price_Range">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="contactInput">Contact Number & E-Mail:</label>
                <input type="text" class="form-control" id="contactInput" placeholder="Enter Contact Info" name='Contact Number & E-mail'>
            </div>
        </div>
        <div class="text-center">
        <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
        </div>

    
</form>

        <div class="mt-4">
            <h3>Hotel Data</h3>
            <table class="table table-bordered " id="hotelDataTable">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>City</th>
                        <th>Hotel Name</th>
                        <th>Distance from City Centre (Kms)</th>
                        <th>Price Range</th>
                        <th>Contact Number & E-Mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="hotelDataBody">
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
        const hotelData = [];
        let dataTable;

        $(document).ready(function() {
            dataTable = $('#hotelDataTable').DataTable();

            $('#hotelDataTable tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
        });

        function submitForm() {
            const state = document.getElementById('stateInput').value;
            const city = document.getElementById('cityInput').value;
            const hotelName = document.getElementById('hotelNameInput').value;
            const distance = document.getElementById('distanceInput').value;
            const priceRange = document.getElementById('priceRangeInput').value;
            const contactInfo = document.getElementById('contactInput').value;

            if (state && city && hotelName && distance && priceRange && contactInfo) {
                const rowData = [state, city, hotelName, distance, priceRange, contactInfo];
                hotelData.push(rowData);
                displayData();
                clearForm();
            } else {
                alert('Please fill in all fields.');
            }
        }

        function displayData() {
            dataTable.clear().draw();

            for (const data of hotelData) {
                const disableButton = '<button type="button" class="btn " onclick="disableRow(this)"><i class="fa-solid fa-ban"></i></button>';
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
            document.getElementById('hotelNameInput').value = '';
            document.getElementById('distanceInput').value = '';
            document.getElementById('priceRangeInput').value = '';
            document.getElementById('contactInput').value = '';
        }
    </script>
</body>
</html>


<?php
    include "footer.php"
?>
