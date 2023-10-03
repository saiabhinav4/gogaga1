<?php
$title = "Dashboard";
include "header.php";
include "config.php";

function calculateAttendance($filePath, $month)
{
    $attendanceData = []; // Array to store attendance data

    // Open the file for reading
    if (($handle = fopen($filePath, "r")) !== false) {
        // Skip the first three rows
        for ($i = 0; $i < 3; $i++) {
            fgetcsv($handle);
        }

        // Read the file line by line
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $employeeId = $data[0]; // Employee ID
            $employeeName = $data[1]; // Employee Name
            $attendance = array_slice($data, 2); // Attendance data for the month

            $totalDays = count($attendance);
            $absentDays = 0;

            // Calculate the number of absent days
            foreach ($attendance as $day) {
                if ($day == 'L') {
                    $absentDays++;
                }
            }

            // Calculate the number of present days
            $presentDays = $totalDays - $absentDays;

            // Prepare the attendance record
            $attendanceRecord = [
                'employeeId' => $employeeId,
                'employeeName' => $employeeName,
                'month' => $month,
                'year' => date('Y'),
                'totalDays' => $totalDays,
                'presentDays' => $presentDays,
                'absentDays' => $absentDays
            ];

            // Add the attendance record to the array
            $attendanceData[] = $attendanceRecord;
        }

        // Close the file
        fclose($handle);
    }

    return $attendanceData;
}

// Function to insert or update attendance records into the database
// Function to insert or update attendance records into the database
function insertOrUpdateAttendance($attendance)
{
    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "gogaga");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statements
    $insertSql = "INSERT INTO attendance (emp_id, emp_name, month, year, no_of_working_days, no_of_leave_days, payment_type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $updateSql = "UPDATE attendance SET no_of_working_days = ?, no_of_leave_days = ?, payment_type = ?, status = ? WHERE emp_id = ? AND month = ? AND year = ?";

    // Prepare the statements
    $insertStmt = mysqli_prepare($conn, $insertSql);
    $updateStmt = mysqli_prepare($conn, $updateSql);

    // Bind parameters and execute the statements for each attendance record
    foreach ($attendance as $record) {
        // Check if the attendance record already exists
        $selectSql = "SELECT * FROM attendance WHERE emp_id = ? AND month = ? AND year = ?";
        $selectStmt = mysqli_prepare($conn, $selectSql);
        mysqli_stmt_bind_param($selectStmt, "sss", $record['employeeId'], $record['month'], $record['year']);
        mysqli_stmt_execute($selectStmt);
        $result = mysqli_stmt_get_result($selectStmt);

        if (mysqli_num_rows($result) > 0) {
            // Attendance record exists, update the record
            $totalDays = $record['totalDays'];
            $absentDays = $record['absentDays'];
            $status = "pending";
            $employeeId = $record['employeeId'];
            $month = $record['month'];
            $year = $record['year'];
            $paymentType = "Bank Transfer"; // Set the payment type

            mysqli_stmt_bind_param($updateStmt, "sssssss", $totalDays, $absentDays, $paymentType, $status, $employeeId, $month, $year);
            mysqli_stmt_execute($updateStmt);
        } else {
            // Attendance record doesn't exist, insert a new record
            $employeeId = $record['employeeId'];
            $employeeName = $record['employeeName'];
            $month = $record['month'];
            $year = $record['year'];
            $totalDays = $record['totalDays'];
            $absentDays = $record['absentDays'];
            $status = "pending";
            $paymentType = "Bank Transfer"; // Set the payment type

            mysqli_stmt_bind_param($insertStmt, "ssssssss", $employeeId, $employeeName, $month, $year, $totalDays, $absentDays, $paymentType, $status);
            mysqli_stmt_execute($insertStmt);
        }

        // Close the select statement
        mysqli_stmt_close($selectStmt);
    }

    // Check if the payslip for the specific month and year already exists
    $month = $attendance[0]['month'];
    $year = $attendance[0]['year'];
    $selectPayslipSql = "SELECT * FROM payslips WHERE month = ? AND year = ?";
    $selectPayslipStmt = mysqli_prepare($conn, $selectPayslipSql);
    mysqli_stmt_bind_param($selectPayslipStmt, "ss", $month, $year);
    mysqli_stmt_execute($selectPayslipStmt);
    $payslipResult = mysqli_stmt_get_result($selectPayslipStmt);

    if (mysqli_num_rows($payslipResult) == 0) {
        // Insert a single record into the payslips table
        $status = "pending";
        $insertPayslipSql = "INSERT INTO payslips (month, year, status) VALUES (?, ?, ?)";
        $insertPayslipStmt = mysqli_prepare($conn, $insertPayslipSql);
        mysqli_stmt_bind_param($insertPayslipStmt, "sss", $month, $year, $status);
        mysqli_stmt_execute($insertPayslipStmt);

        // Close the payslip statement
        mysqli_stmt_close($insertPayslipStmt);
    }

    // Close the statements
    mysqli_stmt_close($insertStmt);
    mysqli_stmt_close($updateStmt);

    // Close the connection
    mysqli_close($conn);
}



// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if a file is uploaded
    if (isset($_FILES['attendance_file']) && $_FILES['attendance_file']['error'] == UPLOAD_ERR_OK) {
        // Get the selected month
        $month = $_POST['month'];

        // Get the temporary location of the uploaded file
        $tmpFilePath = $_FILES['attendance_file']['tmp_name'];

        // Calculate the attendance
        $attendance = calculateAttendance($tmpFilePath, $month);

        // Insert or update the attendance in the database
        insertOrUpdateAttendance($attendance);

       
        $successMessage = 'Attendance calculated and stored successfully.';
    }
}
?>



<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Attendance</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Attendance</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php if (isset($errorMessage)): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($successMessage)): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <?php echo $successMessage; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Enter Attendance details.</p>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Year</label>
                                <input type="text" class="form-control" value="<?php echo date('Y'); ?>" readonly>
                            </div>
                            <div class="col">
                                <label class="form-label">Month</label>
                                <select class="form-select" name="month" required>
                                    <option value="">Select Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attendance File</label>
                        <input type="file" class="form-control" name="attendance_file" required>
                    </div>

                    <button class="btn btn-primary" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (isset($attendance)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Attendance Results</h4>
                    
<div class="card-body">
                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                   
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Month & Year</th>
                                    <th>Total Days</th>
                                    <th>Present Days</th>
                                    <th>Absent Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($attendance as $record): ?>
                                    <tr>
                                        <td><?php echo $record['employeeId']; ?></td>
                                        <td><?php echo $record['employeeName']; ?></td>
                                        <td><?php echo $record['month'] . '/' . $record['year']; ?></td>
                                        <td><?php echo $record['totalDays']; ?></td>
                                        <td><?php echo $record['presentDays']; ?></td>
                                        <td><?php echo $record['absentDays']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                                </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
include "footer.php";
?>
