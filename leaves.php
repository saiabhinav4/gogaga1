<?php
$title = "Leaves";
include "header.php";


// Assuming you have a database connection established

// Define your database connection details
$hostname = "localhost";
$username = "root";
$password = "";
$database = "gogaga2";

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// SQL query to fetch data from the tables
$query = "SELECT al.id, al.Employee_id, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, e.department, al.leave_Type, al.num_days, al.HOD_status, al.status
          FROM all_leaves AS al
          INNER JOIN employees AS e ON al.Employee_id = e.emp_id";

// Execute the query
$result = mysqli_query($connection, $query);
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Leaves</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leaves</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Leave Types</h4>
                <a href="Leave_types.php" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Holidays</h4>
                <a href="Holidays.php" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Leave Type</th>
                            <th>No of days</th>
                            <th>HOD Status</th>
                            <th>Admin Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
mysqli_close($connection);

include "footer.php";
?>
