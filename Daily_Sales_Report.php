<?php
ob_start();
$title = "Dashboard";
include "header.php";
include "config.php";
include "attachments.php";

// // Database connection (replace with your own credentials)
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "gogaga";

// $conn = mysqli_connect($servername, $username, $password, $dbname);
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// $successMessage = '';
// $errorMessage = '';

// // Fetch employee details based on the logged-in mobile number
// if (isset($_SESSION['username'])) {
//     $loggedInMobileNumber = $_SESSION['username'];

//     $query = "SELECT * FROM employees WHERE mobile = '$loggedInMobileNumber'";
//     $result = mysqli_query($conn, $query);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $employeeId = $row['emp_id'];
//         $employeeName = $row['first_name'] . ' ' . $row['last_name'];
//         $designation = $row['designation'];
//     } else {
//         // Handle the case when the mobile number is not found in the employees table
//         $employeeId = '';
//         $employeeName = '';
//         $designation = '';
//     }
// } else {
//     // Handle the case when the mobile number is not available in the session
//     $employeeId = '';
//     $employeeName = '';
//     $designation = '';
// }

// // Handle form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Validate the form data (you can add additional validation if needed)

//     // Get the form data
//     $employeeId = $_POST["employee_id"];
//     $employeeName = $_POST["employee_name"];
//     $designation = $_POST["designation"];
//     $exRegarding = $_POST["exc_regarding"];
//     $regardingEmployee = $_POST["empreg_name"];
//     $concern = $_POST["reason"];

//     // Insert the form data into the emp_excalations table
//     $query = "INSERT INTO emp_excalations (emp_id, emp_name, designation, ex_regarding, reg_name, concern) 
//               VALUES ('$employeeId', '$employeeName', '$designation', '$exRegarding', '$regardingEmployee', '$concern')";

//     if (mysqli_query($conn, $query)) {
//         $successMessage = "Dear Employee, Soon your request will be reviewed by the marketing team and advise you the best possible options.";
//     } else {
//         // Error occurred while inserting data
//         $errorMessage = "Failed to submit the form. Please try again later.";
//     }
// }
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-0 font-size-25">Daily Sales Report</h3>
        </div>
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
    <title>Editable Table with Add/Remove</title>
    
</head>
<body>
    <table class="text-start table table-editable table-nowrap align-middle table-edits table-bordered m-0 p-0 w-100">
        <thead>
        <tr class="table-secondary text-center ">
                <th colspan='2' class="font-size-14"> Team Name  <br><span class="font-size-18">Kalyan Team</span></th>
                <th colspan='2' class="font-size-14">Team Target <br><span class="font-size-18"> 80,00,000</span></th>
                <th colspan='2' class="font-size-14">Achieved <br><span class="font-size-18">56,00,000</span></th>
                <th colspan='2' class="font-size-15">Achieved % <br><span class="font-size-18">65%</span></th>
                
               
            </tr>
            <tr>
                <th style="min-width: 10px;" class="font-size-15">Executive</th>
                <th style="min-width: 10px;" class="font-size-15">Leads Allocated</th>
                <th style="min-width: 10px;" class="font-size-15">Itineraries Confirmed</th>
                <th style="min-width: 10px;" class="font-size-15">Target</th>
                <th style="min-width: 10px;" class="font-size-15">Land Cost</th>
                <th style="min-width: 10px;" class="font-size-15">Flight Cost</th>
                <th style="min-width: 10px;" class="font-size-15">Achievement</th>
                <th style="min-width: 10px;" class="font-size-15">Achieved %</th>
               
            </tr>
        </thead>
        <tbody>
            <tr data-id="1">
                <td >Executive 1</td>
                <td >10</td>
                <td >8</td>
                <td data-field="fff">12</td>
                <td >10</td>
                <td >12</td>
                <td >10</td>
                <td>83.33%</td>
                
            </tr>
        </tbody>
    </table>


    <table class="text-start table table-editable table-nowrap align-middle table-edits table-bordered mt-5 p-0 w-100">
        <thead>
        <tr class="table-secondary text-center ">
                <th colspan='2' class="font-size-14"> Team Name  <br><span class="font-size-18">Kalyan Team</span></th>
                <th colspan='2' class="font-size-14">Team Target <br><span class="font-size-18"> 80,00,000</span></th>
                <th colspan='2' class="font-size-14">Achieved <br><span class="font-size-18">56,00,000</span></th>
                <th colspan='2' class="font-size-15">Achieved % <br><span class="font-size-18">65%</span></th>
                
               
            </tr>
            <tr>
                <th style="min-width: 10px;" class="font-size-15">Executive</th>
                <th style="min-width: 10px;" class="font-size-15">Leads Allocated</th>
                <th style="min-width: 10px;" class="font-size-15">Itineraries Confirmed</th>
                <th style="min-width: 10px;" class="font-size-15">Target</th>
                <th style="min-width: 10px;" class="font-size-15">Land Cost</th>
                <th style="min-width: 10px;" class="font-size-15">Flight Cost</th>
                <th style="min-width: 10px;" class="font-size-15">Achievement</th>
                <th style="min-width: 10px;" class="font-size-15">Achieved %</th>
               
            </tr>
        </thead>
        <tbody>
            <tr data-id="1">
                <td >Executive 1</td>
                <td >10</td>
                <td >8</td>
                <td data-field="fff">12</td>
                <td >10</td>
                <td >12</td>
                <td >10</td>
                <td>83.33%</td>
                
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