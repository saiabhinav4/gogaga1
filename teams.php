<?php
$title = "Teams";
include "header.php";

include "config.php";


// Assuming you have a database connection
$conn = new mysqli("localhost", "root", "", "gogaga");

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedDepartment = isset($_POST['department']) ? $_POST['department'] : '';
$selectedDepartmentHead = isset($_POST['department_head']) ? $_POST['department_head'] : '';

$employees = array();
if (!empty($selectedDepartment)) {
    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS employee_name FROM employees WHERE department = '$selectedDepartment'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employeeName = $row['employee_name'];
            $employees[] = $employeeName;
        }
    }
}

$successMessage = '';
$errorMessage = '';

if (isset($_POST['submit']) && !empty($selectedDepartmentHead)) {
    // Check if department head already exists for the selected department
    $checkSql = "SELECT * FROM department_heads WHERE name = '$selectedDepartmentHead'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        $errorMessage = "Department head already exists for the selected department.";
    } else {
        // Fetch the employee details from the employees table based on the selected department head's name
        $sql = "SELECT emp_id, first_name, last_name, email, mobile, department FROM employees WHERE CONCAT(first_name, ' ', last_name) = '$selectedDepartmentHead'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $emp_id = $row['emp_id'];
            $name = $row['first_name'] . ' ' . $row['last_name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $depart = $row['department'];
            $posting_date = date('Y-m-d');

            // Insert the department head data into the database
            $insertSql = "INSERT INTO department_heads (emp_id, name, email, mobile, department, posting_date) 
                          VALUES ('$emp_id', '$name', '$email', '$mobile', '$depart', '$posting_date')";

            if ($conn->query($insertSql) === TRUE) {
                $successMessage = "Department head data inserted successfully.";
            } else {
                $errorMessage = "Error inserting department head data: " . $conn->error;
            }
        } else {
            $errorMessage = "No employee found with the selected name.";
        }
    }
}

// Handle department head deletion
if (isset($_POST['delete_emp_id'])) {
    $emp_id = $_POST['delete_emp_id'];

    // Delete the department head from the database
    $deleteSql = "DELETE FROM department_heads WHERE emp_id = '$emp_id'";

    if ($conn->query($deleteSql) === TRUE) {
        $successMessage = "Department head deleted successfully.";
    } else {
        $errorMessage = "Error deleting department head: " . $conn->error;
    }
}


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Department Heads</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Department heads</a></li>
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
                <h4 class="card-title">Choose Department</h4>
                <form method="POST" action="">
                    <select class="form-select" name="department" onchange="this.form.submit()">
                        <option>---Select Department---</option>
                        <?php
                        $departments = array(
                            "Accounts",
                            "Bookings",
                            "Human Resource",
                            "IT-Web Development",
                            "Operations-Indian Holidays",
                            "Operations-International Holidays",
                            "Marketing",
                            "Marketing Designing",
                            "Sales",
                            "Training",
                            "Visa",
                            "Other"
                        );

                        foreach ($departments as $department) {
                            $selected = ($selectedDepartment == $department) ? "selected" : ""; 
                            echo '<option value="' . $department . '" ' . $selected . '>' . $department . '</option>';
                        }
                        include "footer.php";
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Choose Department Head</h4>
                <form method="POST" action="">
                    <select class="form-select" name="department_head">
                        <option selected disabled>---Select Department Head---</option>
                        <?php
                        foreach ($employees as $employee) {
                            $selected = ($selectedDepartmentHead == $employee) ? "selected" : ""; 
                            echo '<option value="' . $employee . '" ' . $selected . '>' . $employee . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <?php if (!empty($successMessage)) : ?>
        <div id="success-message" class="alert alert-success"><?php echo $successMessage; ?></div>
        <script>
            setTimeout(function () {
                document.getElementById('success-message').style.display = 'none';
            }, 5000);
        </script>
    <?php endif; ?>

    <?php if (!empty($errorMessage)) : ?>
        <div id="error-message" class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <script>
            setTimeout(function () {
                document.getElementById('error-message').style.display = 'none';
            }, 5000);
        </script>
    <?php endif; ?>

    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc">Employee ID</th>
                            <th class="sorting">Name</th>
                            <th class="sorting">Email</th>
                            <th class="sorting">Mobile</th>
                            <th class="sorting">Department</th>
                            <th class="sorting">Posting Date</th>
                            <th class="sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all department heads from the database
                        $departmentHeadsSql = "SELECT * FROM department_heads";
                        $departmentHeadsResult = $conn->query($departmentHeadsSql);

                        if ($departmentHeadsResult->num_rows > 0) {
                            while ($row = $departmentHeadsResult->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['emp_id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['mobile'] . '</td>';
                                echo '<td>' . $row['department'] . '</td>';
                                echo '<td>' . $row['posting_date'] . '</td>';
                                echo '<td>
                                          <form method="POST" action="">
                                            <input type="hidden" name="delete_emp_id" value="' . $row['emp_id'] . '">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this department head?\')">Delete</button>
                                          </form>
                                      </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">No department heads found.</td></tr>';
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
</div>










