<?php
ob_start();
include "config.php";

// Function to update the status
function updateStatus($interviewId, $status, $conn)
{
    $query = "UPDATE `interview_employees` SET `Status`='$status' WHERE `id`='$interviewId'";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $email = $_POST['emails'];
    $mobile = $_POST['mob_num'];
    $designation = $_POST['designation'];
    $department = $_POST['department_type'];
    $date = $_POST['date'];
    $status = '0'; // Initial status: Not Interviewed

    // Check if the email exists in the employees table
    $email_count_employees = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `employees` WHERE `email`='$email'"));

    // Check if the email and phone number exist in the interview_employees table
    $email_count_interview = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `interview_employees` WHERE `Email`='$email'"));
    $mob_count_interview = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `interview_employees` WHERE `Mobile`='$mobile'"));

    if ($email_count_employees != '0') {
        $status = '1'; // Set status to 1 if the email exists in the employees table (Selected)
        echo '<script>alert("This Person is already Your Employee")</script>';
    } elseif ($email_count_interview != '0' || $mob_count_interview != '0') {
        echo '<script>alert("The Email or Mobile Number Already Exists")</script>';
    } elseif (strtotime($date) <= strtotime(date('Y-m-d'))) {
        echo '<script>alert("Invalid Interview Date")</script>';
    } else {
        // Insert the new candidate into the interview_employees table with the initial status
        $query = "INSERT INTO `interview_employees`(`Name`, `Mobile`, `Email`, `Designation`, `Department`, `Date`, `Status`) 
                  VALUES ('$name', '$mobile', '$email', '$designation', '$department', '$date', '$status')";

        if (mysqli_query($conn, $query)) {
            header("location: interview_employee.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['interviewId']) && isset($_POST['status'])) {
    $interviewId = $_POST['interviewId'];
    $status = $_POST['status'];

    if (updateStatus($interviewId, $status, $conn)) {
        echo "success";
    } else {
        echo "error";
    }
}

$title = "Dashboard";
include "header.php";

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "gogaga";

$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM `interview_employees`";
$result = mysqli_query($conn, $query);
?>




<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Interview Employee</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employees</a></li>
                    <li class="breadcrumb-item active">Interview</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Enter interview details.</p>

                <form method="POST">
                <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emails" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emails" name="emails" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mob_num" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mob_num" name="mob_num" placeholder="Mobile Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <select id="dtype" name="designation" class="form-control">
                            <option>---Select Type---</option>
                            <option value="Accounts Manager">Accounts Manager</option>
                            <option value="Accounts Executive">Accounts Executive</option>
                            <option value="Area Manager Sales and Business Development">Area Manager Sales and Business Development</option>
                            <option value="Booking Manager">Booking Manager</option>
                            <option value="Booking Executive">Booking Executive</option>
                            <option value="Business Development Executive">Business Development Executive</option>
                            <option value="Digital Marketing Manager">Digital Marketing Manager</option>
                            <option value="Digital Marketing Executive">Digital Marketing Executive</option>
                            <option value="Forex Manager">Forex Manager</option>
                            <option value="Forex Executive">Forex Executive</option>
                            <option value="HR Manager">HR Manager</option>
                            <option value="HR Executive">HR Executive</option>
                            <option value="Head-Operations and Sales">Head-Operations and Sales</option>
                            <option value="IT Manager">IT Manager</option>
                            <option value="IT Executive">IT Executive</option>
                            <option value="Key Account Manager">Key Account Manager</option>
                            <option value="Marketing Manager">Marketing Manager</option>
                            <option value="Marketing Executive">Marketing Executive</option>
                            <option value="Operations Manager">Operations Manager</option>
                            <option value="Operations Executive-Indian Holidays">Operations Executive-Indian Holidays</option>
                            <option value="Operations Executive-International Holidays">Operations Executive-International Holidays</option>
                            <option value="Photoshop Designer">Photoshop Designer</option>
                            <option value="Regional Manager Sales and Business Development">Regional Manager-Sales and Business Development</option>
                            <option value="Sales-Tele Caller">Sales-Tele Caller</option>
                            <option value="Sales-Manager Sales and Business Development">Sales-Manager Sales and Business Development</option>
                            <option value="Training Manager">Training Manager</option>
                            <option value="Training Executive">Training Executive</option>
                            <option value="Travel Insurance Executive">Travel Insurance Executive</option>
                            <option value="Territory Manager">Territory Manager</option>
                            <option value="Visa Processing Executive">Visa Processing Executive</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" class="form-control" id="other">
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <select id="department_type" name="department_type" class="form-control">
                            <option>---Select Type---</option>
                            <option value="Accounts">Accounts</option>
                            <option value="Bookings">Bookings</option>
                            <option value="Human Resource">Human Resource</option>
                            <option value="IT-Web Development">IT-Web Development</option>
                            <option value="Operations-Indian Holidays">Operations-Indian Holidays</option>
                            <option value="Operations-International Holidays">Operations-International Holidays</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Marketing Designing">Marketing Designing</option>
                            <option value="Sales">Sales</option>
                            <option value="Training">Training</option>
                            <option value="Visa">Visa</option>
                            <option value="Other">Other</option>
                        </select>
                        <input type="text" class="form-control" id="otherdep">
                    </div>
                    <div class="mb-3">
                        <label for="mob_num" class="form-label">Interview Date</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Mobile Number" required>
                    </div>
                    <button type="submit" name="reg" class="btn btn-primary">Schedule Interview</button>
                </form>
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
                            <th> Name </th>
                            <th> Email </th>
                            <th> Mobile Number</th>
                            <th> Designation </th>
                            <th> Department </th>
                            <th> Date </th>
                            <th> Status </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr role="row">
                                <td><?php echo $row["Name"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php echo $row["Mobile"]; ?></td>
                                <td><?php echo $row["Designation"]; ?></td>
                                <td><?php echo $row["Department"]; ?></td>
                                <td><?php echo $row["Date"]; ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="interviewId" value="<?php echo $row['id']; ?>">
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            <option value="0" <?php if ($row["Status"] == '0') echo 'selected'; ?>>Interviewed</option>
                                            <option value="1"<?php if ($row["Status"] == '1') echo 'selected'; ?>>Selected</option>
                                            <option value="2" <?php if ($row["Status"] == '2') echo 'selected'; ?>>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                       
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






















<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#other').hide();
        $('#dtype').change(function() {
            if ($(this).val() === 'others') {
                $('#other').show().attr('placeholder', 'Other Designation Name');
            } else {
                $('#other').hide().removeAttr('placeholder');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#otherdep').hide();
        $('#department_type').change(function() {
            if ($(this).val() === 'others') {
                $('#otherdep').show().attr('placeholder', 'Other Department Name');
            } else {
                $('#otherdep').hide().removeAttr('placeholder');
            }
        });
    });
</script>



<?php
include "footer.php";
?>