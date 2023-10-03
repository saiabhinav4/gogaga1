<?php
ob_start();
// session_start();
include "config.php";
if (isset($_POST['reg'])) {
    $email = $_POST['emails'];
    $mobile = $_POST['mob_num'];
    $password = md5($_POST['password']);
    $designation = $_POST['designation'];
    $department = $_POST['department_type'];
    $status = 'pending';
    $user_type = 'Employee';

    /*Check*/
    $email_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `invited_employees` WHERE `email`='$email'"));
    $mob_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `invited_employees` WHERE `phone_num`='$mobile'"));

    if($email_count != '0') {
        echo '<script>alert("The e-Mail ID Already Exists")</script>';
    } else if ($mob_count != '0') {
        echo '<script>alert("The Mobile Number Already Exists")</script>';
    } else {
        $query = "INSERT INTO `invited_employees`(`email`, `phone_num`, `password`, `designation`, `department`, `ondate`, `status`) 
                  VALUES ('$email', '$mobile', '$password', '$designation', '$department', NOW(), 'pending')";

        if (mysqli_query($conn, $query)) {
            header("location: invite_employee.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

?>

<?php
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

$query = "SELECT * FROM `invited_employees`";
$result = mysqli_query($conn, $query);
?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Invite Employee</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employees</a></li>
                    <li class="breadcrumb-item active">Invite</li>
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
                <p class="card-text">Enter here your new employee details.</p>

                <form method="POST">
                    <div class="mb-3">
                        <label for="emails" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emails" name="emails" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mob_num" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mob_num" name="mob_num" placeholder="Mobile Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
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
                    <button type="submit" name="reg" class="btn btn-primary">Send Invite</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="card-body">
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Mail</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 250.2px;" aria-label="Position: activate to sort column ascending">Mobile </th>

                                            <th>  Designation </th>
                                            <th> Department </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Status</th>
                                        </tr>
                                            </thead>

                                            <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone_num'] . "</td>";
                                        echo "<td>" . $row['designation'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        if ($row['status'] == 0) {
                                            echo "<td style='color: red;'>Pending</td>";
                                        } elseif ($row['status'] == 1) {
                                            echo "<td style='color: green;'>Accepted</td>";
                                        } else {
                                            echo "<td>" . $row['status'] . "</td>";
                                        }
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

