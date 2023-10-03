<?php
$title = "Pay Roll";
include "header.php";
include "config.php";

// Retrieve attendance data
$attendanceSql = "SELECT status FROM attendance";
$attendanceResult = mysqli_query($conn, $attendanceSql);

// Check if any row has a status other than "generated" in the attendance table
$allGenerated = true;
while ($attendanceRow = mysqli_fetch_assoc($attendanceResult)) {
    if ($attendanceRow['status'] != 'generated') {
        $allGenerated = false;
        break;
    }
}

// Update the payslips table based on the attendance status
if ($allGenerated) {
    $updatePayslipsSql = "UPDATE payslips SET status = 'generated' WHERE month = ? AND year = ?";
} else {
    $updatePayslipsSql = "UPDATE payslips SET status = 'pending' WHERE month = ? AND year = ?";
}
$updatePayslipsStmt = $conn->prepare($updatePayslipsSql);
$updatePayslipsStmt->bind_param("ss", $month, $year);

$payslipsSql = "SELECT month, year FROM payslips";
$payslipsResult = mysqli_query($conn, $payslipsSql);

$generatedYears = array(); // Array to store the years with all months generated
$generatedMonths = array(); // Array to store the generated months for each year

while ($row = mysqli_fetch_assoc($payslipsResult)) {
    $month = $row['month'];
    $year = $row['year'];
    $updatePayslipsStmt->execute();

    if ($allGenerated) {
        $generatedMonths[$year][] = $month;
    }
}

$updatePayslipsStmt->close();

// Check if all months of each year are generated
foreach ($generatedMonths as $year => $months) {
    $allMonthsGenerated = count($months) == 12;
    if ($allMonthsGenerated) {
        $generatedYears[] = $year;
    }
}

// Delete rows from payslips table for the generated years
if (!empty($generatedYears)) {
    $deletePayslipsSql = "DELETE FROM payslips WHERE year = ?";
    $deletePayslipsStmt = $conn->prepare($deletePayslipsSql);
    $deletePayslipsStmt->bind_param("s", $yearToDelete);

    foreach ($generatedYears as $yearToDelete) {
        $deletePayslipsStmt->execute();
    }

    $deletePayslipsStmt->close();
}

?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Payroll</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Payrolls</a></li>
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
                <h4 class="card-title">Payslips</h4>
                <a href="all_payslips.php" class="btn btn-primary">Generate</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Attendance</h4>
                <a href="attendance.php" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>   
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Allowances</h4>
                <a href="allowances.php" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Deductions</h4>
                <a href="deductions.php" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>   
</div>

<div class="card">
    <div class="card-body">
        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <h4 class="mb-sm-0 font-size-18">Generated Payrolls</h4>
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                        <thead>
                            <tr role="row">
                                <th>Month</th>
                                <th>Year</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Retrieve payslips data
                            $payslipsSql = "SELECT month, year, status FROM payslips";
                            $payslipsResult = mysqli_query($conn, $payslipsSql);

                            while ($payslipRow = mysqli_fetch_assoc($payslipsResult)) {
                                $month = date("F", mktime(0, 0, 0, $payslipRow['month'], 1));
                                $year = $payslipRow['year'];
                                $status = $payslipRow['status'];

                                $statusColor = ($status == 'pending') ? 'red' : 'green';

                                echo "<tr>";
                                echo "<td>$month</td>";
                                echo "<td>$year</td>";
                                echo '<td style="color: ' . $statusColor . ';">' . $status . '</td>';
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
include "footer.php";
?>
