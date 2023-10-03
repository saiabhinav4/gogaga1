<?php
ob_start();
$title = "Dashboard";
include "header.php";
include "config.php";
include "attachments.php";

// Database connection (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gogaga";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$successMessage = '';
$errorMessage = '';

// Fetch employee details based on the logged-in mobile number
if (isset($_SESSION['username'])) {
    $loggedInMobileNumber = $_SESSION['username'];

    $query = "SELECT * FROM employees WHERE mobile = '$loggedInMobileNumber'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $employeeId = $row['emp_id'];
        $employeeName = $row['first_name'] . ' ' . $row['last_name'];
        $designation = $row['designation'];
    } else {
        // Handle the case when the mobile number is not found in the employees table
        $employeeId = '';
        $employeeName = '';
        $designation = '';
    }
} else {
    // Handle the case when the mobile number is not available in the session
    $employeeId = '';
    $employeeName = '';
    $designation = '';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form data (you can add additional validation if needed)

    // Get the form data
    $employeeId = $_POST["employee_id"];
    $employeeName = $_POST["employee_name"];
    $designation = $_POST["designation"];
    $exRegarding = $_POST["exc_regarding"];
    $regardingEmployee = $_POST["empreg_name"];
    $concern = $_POST["reason"];

    // Insert the form data into the emp_excalations table
    $query = "INSERT INTO emp_excalations (emp_id, emp_name, designation, ex_regarding, reg_name, concern) 
              VALUES ('$employeeId', '$employeeName', '$designation', '$exRegarding', '$regardingEmployee', '$concern')";

    if (mysqli_query($conn, $query)) {
        $successMessage = "Dear Employee, Soon your request will be reviewed by the marketing team and advise you the best possible options.";
    } else {
        // Error occurred while inserting data
        $errorMessage = "Failed to submit the form. Please try again later.";
    }
}
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Employee Escalation</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card-body ">
    <?php if (!empty($errorMessage)) : ?>
        <div class='alert alert-danger'><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <?php if (!empty($successMessage)) : ?>
        <div class='alert alert-success'><?php echo $successMessage; ?></div>
    <?php else : ?>
        <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<form method="POST" class="bg-white">
    <div class="row bg-white">
        <div class="col-lg-12">
            <div class="card bg-white">
                <div class="card-header">
                    <div class="text-center mb-4">
                        <i class="bx bx-user"></i>
                        <h5>Fill the Form</h5>
                    </div>
                    <div class="form-group">
                        <label for="anonymousToggle">
                            <input type="checkbox" id="anonymousToggle"> Anonymous
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 employee-info">
                            <div class="mb-3">
                                <label>Employee ID</label>
                                <input type="text" class="form-control" name="employee_id" value="<?php echo $employeeId; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 employee-info">
                            <div class="form-group mb-3">
                                <label>Employee Name</label>
                                <input type="text" class="form-control" name="employee_name" value="<?php echo $employeeName; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 employee-info">
                            <div class="form-group mb-3">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" value="<?php echo $designation; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Escalation Regarding</label>
                                <select class="form-control" id="feedbackCategory">
                                    <option value="Select">Select</option>
                                    <option value="employee">Employee</option>
                                    <option value="timings">Timings</option>
                                    <option value="work-culture">Work Culture</option>
                                    <option value="training">Training</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Regarding any Employee?</label>
                                <input type="text" class="form-control" placeholder="Please specify employee name" name="empreg_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Elaborate Your Concern</label>
                                <textarea type="text" class="form-control" name="reason"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" name="send" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#anonymousToggle').change(function () {
            if ($(this).is(':checked')) {
                $('.employee-info').addClass('hidden');
            } else {
                $('.employee-info').removeClass('hidden');
            }
        });
    });
</script>

</body>
</html>


    <?php endif; ?>
</div>

<?php
include "footer.php";
?>
