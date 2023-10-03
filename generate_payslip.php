<?php
$title = "Generate Payslip";
include "payslip_header.php";
include "config.php";

// Check if the employee_id parameter is set in the URL
if (isset($_GET["employee_id"])) {
    $employee_id = $_GET["employee_id"];

    // Fetch the employee details from the employees table
    $employee_query = "SELECT id, emp_id, first_name, last_name,designation, joining_date, mobile, email,salary, bank_name, ifsc, pan FROM employees WHERE emp_id = '$employee_id'";
    $employee_result = $conn->query($employee_query);

    if ($employee_result->num_rows > 0) {
        // Employee found, display the details
        $employee = $employee_result->fetch_assoc();
        $id = $employee["id"];
        $emp_id = $employee["emp_id"];
        $name = $employee["first_name"].' '. $employee["last_name"];
        $designation = $employee["designation"];
        $joiningdate = $employee["joining_date"];
        $mobile = $employee["mobile"];
        $bank_name = $employee["bank_name"];
        $ifsc = $employee["ifsc"];
        $pan = $employee["pan"];
        $salary = $employee["salary"];
    } else {
        // Employee not found, display an error message
        echo "<div class='alert alert-danger'>Employee not found.</div>";
        include "footer.php";
        exit;
    }
} else {
    // Employee ID parameter not set, display an error message
    echo "<div class='alert alert-danger'>Invalid request.</div>";
    include "footer.php";
    exit;
}

// $attendance_query = "SELECT no_of_working_days, paid_leaves, no_of_leave_days, adv_salary, incentives,payment_type FROM attendance WHERE emp_id = '$employee_id'";
// $attendance_result = $conn->query($attendance_query);

// if ($attendance_result->num_rows > 0) {
//     $attendance = $attendance_result->fetch_assoc();
//     $working_days = $attendance["no_of_working_days"] + $attendance["paid_leaves"] - $attendance["no_of_leave_days"];
//     $incentives = isset($attendance["incentives"]) ? $attendance["incentives"] : 0;
//     $payment_type = $attendance["payment_type"]; // Check if "incentives" key is set
// } else {
//     $working_days = "N/A"; // Set a default value if the attendance record is not found
//     $incentives = 0; 
//     $payment_type = "Bank Transfer";// Set a default value for incentives
// }


?>

<?php
// Get the current date
$issued_date = date("l, F j, Y");
?>

<style>
    .table td,
    .table th {
        padding: 2px 8px;
        font-size: 12px;
    }

    .table th {
        vertical-align: middle;
    }
</style>

<div class="row">
    <div class="col-md-10">
        <div class="card" style="height: auto;">
            <div class="card-header">
                <img src="assets/images/logo_1.png" alt="" height="75" class="float-end"> 
            </div>
            <div class="card-header">
                <h1 class="card-title" style="font-size: 40px; font-weight: bold; padding-bottom: 10px;">
                   Payslip
                </h1>
                <p class="card-subtitle mb-2 text-muted" style="margin-bottom: 0;">For the Month of <?php echo date("F"); ?></p>
                <p class="card-subtitle mb-2 text-muted">Issued Date: <?php echo $issued_date; ?></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table mb-6">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Employee ID</th>
                                        <td><?php echo $emp_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Employee Name</th>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Designation</th>
                                        <td><?php echo $designation; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Joining Date</th>
                                        <td><?php echo $joiningdate; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">Bank Name & IFSC</th>
                                        <td><?php echo $bank_name; ?> - <?php echo $ifsc; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="vertical-align: middle;">PAN</th>
                                        <td><?php echo $pan; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Registered Office</h5>
                                <p class="card-text">
                                    Gogaga Holidays Private Limited, Modern Profound<br>
                                    Tech park, Ground Floor, Whitefield Road, Kondapur<br>
                                    Hyderabad, Telangana-084. Landline : 040 40206965<br>
                                    Mail : support@gogagaholidays.in<br>
                                    Web : www.gogagaholidays.com
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Net Pay :  </strong> <span style="font-size: 14px;"><?php echo $salary/12; ?></span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>No of Working Days :  </strong> <span style="font-size: 14px;"><?php echo $working_days; ?></span><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="color: green;">Earnings</h5> 
                                <div class="table-responsive">
                                    <table class="table mb-6">
                                        <thead>
                                            <tr>
                                            <th scope="col" style="font-size: 15px; font-weight: bold;">Pay Type</th>
                                            <th scope="col" style="font-size: 15px; font-weight: bold; padding-left: 180px;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch the allowance details from the allowances table
                                            $allowance_query = "SELECT allowance_type, percentage FROM allowances";
                                            $allowance_result = $conn->query($allowance_query);

                                            if ($allowance_result->num_rows > 0) {
                                                while ($allowance = $allowance_result->fetch_assoc()) {
                                                    $allowance_name = $allowance["allowance_type"];
                                                    $allowance_percentage = $allowance["percentage"];

                                                    // Calculate the allowance amount based on the percentage and salary
                                                    $allowance_amount = $salary * $allowance_percentage / 100;
                                                    $allowance_per_month = number_format($allowance_amount / 12, 2);

                                                    echo "<tr>";
                                                    echo "<th scope='row' style='vertical-align: middle;'>$allowance_name</th>";
                                                    echo "<td style='padding-left: 180px;'>₹" . $allowance_per_month . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='2'>No allowances found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="color: red;">Deductions</h5>
                                <div class="table-responsive">
                                    <table class="table mb-6">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="font-size: 15px; font-weight: bold;">Deduction Type</th>
                                                <th scope="col" style="font-size: 15px; font-weight: bold; padding-left: 180px;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $deduction_query = "SELECT deduction_type, percentage FROM deductions";
                                            $deduction_result = $conn->query($deduction_query);

                                            if ($deduction_result->num_rows > 0) {
                                                while ($deduction = $deduction_result->fetch_assoc()) {
                                                    $deduction_name = $deduction["deduction_type"];
                                                    $deduction_percentage = $deduction["percentage"];

                                                    // Calculate the deduction amount based on the percentage and salary
                                                    $deduction_amount = $salary * $deduction_percentage / 100;
                                                    $deduction_per_month = number_format($deduction_amount / 12, 2);

                                                    echo "<tr>";
                                                    echo "<th scope='row' style='vertical-align: middle;'>$deduction_name</th>";
                                                    echo "<td style='padding-left: 180px;'>₹" . $deduction_per_month . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='2'>No deductions found.</td></tr>";
                                            }

                                            

                                            $attendance_query = "SELECT no_of_working_days, adv_salary, paid_leaves, no_of_leave_days FROM attendance WHERE emp_id = '$employee_id'";
                                            $attendance_result = $conn->query($attendance_query);

                                            if ($attendance_result->num_rows > 0) {
                                                $attendance = $attendance_result->fetch_assoc();
                                                $per_month_salary = $salary / 12;
                                                $per_day_salary = $per_month_salary / $attendance["no_of_working_days"];
                                                $unpaid_leaves = $attendance["no_of_leave_days"] - $attendance["paid_leaves"];
                                                $unpaid_deduct = $unpaid_leaves * $per_day_salary;
                                                $deduct = number_format($unpaid_deduct, 2);

                                                $advance = $attendance["adv_salary"];
                                                $advance = number_format($advance,2);

                                                echo "<tr>";
                                                echo "<th scope='row' style='vertical-align: middle;'>Deduct Unpaid Leaves</th>";
                                                echo "<td style='padding-left: 180px;'>₹" . $deduct ."</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<th scope='row' style='vertical-align: middle;'>Advance Salary</th>";
                                                echo "<td style='padding-left: 180px;'>₹" . $advance . "</td>";
                                                echo "</tr>";
                                            } else {
                                                $working_days = "N/A"; 
                                            }

                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                // Calculate the gross salary payable
                $per_month_salary = $salary / 12;


                // Calculate the gross salary payable with incentives
                $gross_incent = $per_month_salary + $incentives;

                // Calculate the total deductions
                $total_deduct = 0; // Initialize the total deductions variable
                // Add up the deduction amounts
                $deduction_query = "SELECT deduction_type, percentage FROM deductions";
                $deduction_result = $conn->query($deduction_query);
                if ($deduction_result->num_rows > 0) {
                    while ($deduction = $deduction_result->fetch_assoc()) {
                        $deduction_percentage = $deduction["percentage"];
                        // Calculate the deduction amount based on the percentage and salary
                        $deduction_amount = $salary * $deduction_percentage / 100;
                        $total_deduct += $deduction_amount;
                    }
                }
                // Add unpaid leaves deduction
                
                $unpaid_leaves = $attendance["no_of_leave_days"] - $attendance["paid_leaves"];
                $unpaid_deduct = $unpaid_leaves * $per_day_salary;
                $total_deduct += $unpaid_deduct;
                $total_deduct += $attendance["adv_salary"];

                // Calculate the net salary payable with deductions
                $net_salary = $gross_incent - $total_deduct;
                ?>

                <table class="table mb-6">
                    <tbody>
                        <tr>
                            <th scope="row">Gross Salary Payable</th>
                            <td><?php echo "₹" . number_format($per_month_salary, 2); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Incentives</th>
                            <td><?php echo "₹" . number_format($incentives, 2); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Gross Salary Payable with Incentives</th>
                            <td><?php echo "₹" . number_format($gross_incent, 2); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Deductions</th>
                            <td><?php echo "₹" . number_format($total_deduct, 2); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Net Salary Payable with Deductions</th>
                            <td><span style="font-size: 18px; color: green; font-weight: bold;"><?php echo "₹" . number_format($net_salary, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Payment Type :  </strong> <span style="color : purple"><?php echo $payment_type; ?></span><br> </p>

                                    <p> <strong> Note : </strong>
                                    This is an Auto Generated Document and Doesn't require Signature </p>

                                    <p><strong><span style="font-family: 'Dancing Script', cursive; font-size: 22px; color: green; font-weight: bold;">We wish you a successful month ahead.</span></strong></p>
                                
                            </div>
                        </div>
                    </div>
 



                                

                </div>
            </div>
        </div>
    </div>
</div>


