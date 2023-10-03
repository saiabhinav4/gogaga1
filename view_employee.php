<?php
$title = "Employee Details";
include "header.php";

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gogaga";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    // Retrieve employee details from the employees table
    $sql = "SELECT * FROM employees WHERE emp_id = '$emp_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();

        // Retrieve employee other details from the emp_other_details table
        $sql2 = "SELECT * FROM emp_other_details WHERE emp_id = '$emp_id'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            $otherDetails = $result2->fetch_assoc();
        }
    }
    
}
?>


<?php

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    
    if (isset($_POST['approve_details'])) {
       
        $designation = $_POST['designation'];
        $department = $_POST['department'];
        $joining_date = $_POST['joining_date'];
        $work_location = $_POST['work_location'];
        $salary = $_POST['salary'];

        
        $sql = "UPDATE employees SET designation = '$designation', department = '$department', joining_date = '$joining_date', location = '$work_location', salary = '$salary' WHERE emp_id = '$emp_id'";

        
        if ($conn->query($sql) === TRUE) {
           
            $password = '';
            $email = $employee['email'];
            $mobile = $employee['mobile'];
            $passwordQuery = "SELECT password FROM invited_employees WHERE email = '$email' LIMIT 1";
            $passwordResult = $conn->query($passwordQuery);
            if ($passwordResult->num_rows > 0) {
                $row = $passwordResult->fetch_assoc();
                $password = $row['password'];
            }

            
            $checkUserSql = "SELECT COUNT(*) as count FROM users WHERE mail_id = '$email' OR mob_num = '$mobile'";
            $checkUserResult = $conn->query($checkUserSql);
            $count = $checkUserResult->fetch_assoc()['count'];

            if ($count > 0) {
                
                echo "<script>alert('User already exists with the provided email or phone number.');</script>";
            } else {
                // Insert the user details into the users table
                $userSql = "INSERT INTO users (mail_id, mob_num, password, on_date, user_status, pro_status, user_type)
                            VALUES ('$email', '$mobile', '$password', NOW(), '0', '0', 'employee')";

                if ($conn->query($userSql) === TRUE) {
                    // Update the status in the invited_employees table
                    $statusSql = "UPDATE invited_employees SET status = '1' WHERE email = '$email'";
                    if ($conn->query($statusSql) === TRUE) {
                        // Redirect to the employee details page or display a success message
                        $employee_name = $employee['first_name'] . ' ' . $employee['last_name'];
                        echo "<script>alert('Success! $employee_name is an employee of Gogaga now.');</script>";
                        header("Location: employees.php");
                        exit;
                    } else {
                       
                        echo "Error updating status in invited_employees table: " . $conn->error;
                    }
                } else {
                    
                    echo "Error inserting user details: " . $conn->error;
                }
            }
        } else {
            
            echo "Error updating work details: " . $conn->error;
        }
    }


else if (isset($_POST['reject_details'])) {
   
    $email = $employee['email'];

    $sql = "DELETE FROM employees WHERE emp_id = '$emp_id'";

    
    if ($conn->query($sql) === TRUE) {
        // Delete the employee from emp_other_details table
        $sql_other = "DELETE FROM emp_other_details WHERE emp_id = '$emp_id'";

        
        if ($conn->query($sql_other) === TRUE) {
            // Delete the employee from invited_employees table
            $sql_invited = "DELETE FROM invited_employees WHERE email = '$email'";

            
            if ($conn->query($sql_invited) === TRUE) {
                // Delete the employee from users table
                $sql_users = "DELETE FROM users WHERE mail_id = '$email'";

                
                if ($conn->query($sql_users) === TRUE) {
                    // Redirect to a success page or display a success message
                    header("Location: employees.php");
                    exit;
                } else {
                    
                    echo "Error deleting employee from users: " . $conn->error;
                }
            } else {
                
                echo "Error deleting employee from invited_employees: " . $conn->error;
            }
        } else {
           
            echo "Error deleting employee from emp_other_details: " . $conn->error;
        }
    } else {
        
        echo "Error deleting employee from employees: " . $conn->error;
    }
}
}

    
?>





<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Employee Details</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card-body">
<form method = "POST" >
    
    
<div class="row">
    <?php if (isset($employee))  : ?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center mb-4">
                        <i class="bx bx-user"></i>
                        <h5>Personal Details</h5>
                    </div>
                
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label>Employee ID</label>
                                <input type="text" class="form-control" value="<?php echo $employee['emp_id']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?php echo $employee['first_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="<?php echo $employee['last_name']; ?>" readonly>
                            </div>
                        </div>
                        <?php if (isset($otherDetails)) :?>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Father's Name</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['father_name']; ?>" readonly>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Address</label>
                                        <input type="text" class="form-control" value="<?php echo $otherDetails['address']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Date of Birth</label>
                                        <input type="text" class="form-control" value="<?php echo $otherDetails['date_of_birth']; ?>" readonly>
                                    </div>
                                </div>
                            
                        <?php endif; ?>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" value="<?php echo $employee['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mobile</label>
                                <input type="text" class="form-control" value="<?php echo $employee['mobile']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
            
        

                   
                    <!-- work details -->
                <div class="col-lg-12">
                    <div class="card">
                       <div class="card-header">
                     
                            <div class="text-center mb-4">
                                <i class="bx bxs-city"></i>
                                <h5>Work Details</h5>
                            </div>
                            <div class="row">
                                <!-- Designation -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Designation</label>
                                        
                                        <select id = "designation" type="text" class="form-control" name="designation">
                                        <option value="$employee['designation']"><?php echo $employee['designation']; ?></option>
                                        <option value="Accounts Manager" <?php echo ($employee['designation'] == 'Accounts Manager') ? 'selected' : ''; ?>>Accounts Manager</option>
                                        <option value="Accounts Executive" <?php echo ($employee['designation'] == 'Accounts Executive') ? 'selected' : ''; ?>>Accounts Executive</option>
                                        <option value="Area Manager Sales And Business Development" <?php echo ($employee['designation'] == 'Area Manager Sales And Business Development') ? 'selected' : ''; ?>>Area Manager Sales and Business Development</option>
                                        <option value="Booking Manager" <?php echo ($employee['designation'] == 'Booking Manager') ? 'selected' : ''; ?>>Booking Manager</option>
                                        <option value="Booking Executive" <?php echo ($employee['designation'] == 'Booking Executive') ? 'selected' : ''; ?>>Booking Executive</option>
                                        <option value="Business Development Executive" <?php echo ($employee['designation'] == 'Business Development Executive') ? 'selected' : ''; ?>>Business Development Executive</option>
                                        <option value="Digital Marketing Manager" <?php echo ($employee['designation'] == 'Digital Marketing Manager') ? 'selected' : ''; ?>>Digital Marketing Manager</option>
                                        <option value="Digital Marketing Executive" <?php echo ($employee['designation'] == 'Digital Marketing Executive') ? 'selected' : ''; ?>>Digital Marketing Executive</option>
                                        <option value="Forex Manager" <?php echo ($employee['designation'] == 'Forex Manager') ? 'selected' : ''; ?>>Forex Manager</option>
                                        <option value="Forex Executive" <?php echo ($employee['designation'] == 'Forex Executive') ? 'selected' : ''; ?>>Forex Executive</option>
                                        <option value="HR Manager" <?php echo ($employee['designation'] == 'HR Manager') ? 'selected' : ''; ?>>HR Manager</option>
                                        <option value="HR Executive" <?php echo ($employee['designation'] == 'HR Executive') ? 'selected' : ''; ?>>HR Executive</option>
                                        <option value="Head Operations And Sales" <?php echo ($employee['designation'] == 'Head Operations And Sales') ? 'selected' : ''; ?>>Head-Operations and Sales</option>
                                        <option value="IT Manager" <?php echo ($employee['designation'] == 'IT Manager') ? 'selected' : ''; ?>>IT Manager</option>
                                        <option value="IT Executive" <?php echo ($employee['designation'] == 'IT Executive') ? 'selected' : ''; ?>>IT Executive</option>
                                        <option value="Key Account Manager" <?php echo ($employee['designation'] == 'Key Account Manager') ? 'selected' : ''; ?>>Key Account Manager</option>
                                        <option value="Marketing Manager" <?php echo ($employee['designation'] == 'Marketing Manager') ? 'selected' : ''; ?>>Marketing Manager</option>
                                        <option value="Marketing Executive" <?php echo ($employee['designation'] == 'Marketing Executive') ? 'selected' : ''; ?>>Marketing Executive</option>
                                        <option value="Operations Manager" <?php echo ($employee['designation'] == 'Operations Manager') ? 'selected' : ''; ?>>Operations Manager</option>
                                        <option value="Operations Executive Indian Holidays" <?php echo ($employee['designation'] == 'Operations Executive Indian Holidays') ? 'selected' : ''; ?>>Operations Executive-Indian Holidays</option>
                                        <option value="Operations Executive International Holidays" <?php echo ($employee['designation'] == 'Operations Executive International Holidays') ? 'selected' : ''; ?>>Operations Executive-International Holidays</option>
                                        <option value="Photoshop Designer" <?php echo ($employee['designation'] == 'Photoshop Designer') ? 'selected' : ''; ?>>Photoshop Designer</option>
                                        <option value="Regional Manager Sales And Business Development" <?php echo ($employee['designation'] == 'Regional Manager Sales And Business Development') ? 'selected' : ''; ?>>Regional Manager-Sales and Business Development</option>
                                        <option value="Sales Telecaller" <?php echo ($employee['designation'] == 'Sales Telecaller') ? 'selected' : ''; ?>>Sales-Tele Caller</option>
                                        <option value="Sales Manager Sales And Business Development" <?php echo ($employee['designation'] == 'Sales Manager Sales And Business Development') ? 'selected' : ''; ?>>Sales-Manager Sales and Business Development</option>
                                        <option value="Training Manager" <?php echo ($employee['designation'] == 'Training Manager') ? 'selected' : ''; ?>>Training Manager</option>
                                        <option value="Training Executive" <?php echo ($employee['designation'] == 'Training Executive') ? 'selected' : ''; ?>>Training Executive</option>
                                        <option value="Travel Insurance Executive" <?php echo ($employee['designation'] == 'travelinsuranceexecutive') ? 'selected' : ''; ?>>Travel Insurance Executive</option>
                                        <option value="Territory Manager" <?php echo ($employee['designation'] == 'Territory Manager') ? 'selected' : ''; ?>>Territory Manager</option>
                                        <option value="Visa Processing Executive" <?php echo ($employee['designation'] == 'Visa Processing Executive') ? 'selected' : ''; ?>>Visa Processing Executive</option>
                                        <option value="Other" <?php echo ($employee['designation'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                        <input type="text" class="form-control" id="other">
                                       
                                    </div>
                                </div>

                                <!-- Department -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Department</label>
                                        
                                        <select id = "department_type" class="form-control" name="department">
                                        <option value="$employee['department']"><?php echo $employee['department']; ?></option>
                                        <option value="Accounts" <?php echo ($employee['department'] == 'Accounts') ? 'selected' : ''; ?>>Accounts</option>
                                        <option value="Bookings" <?php echo ($employee['department'] == 'Bookings') ? 'selected' : ''; ?>>Bookings</option>
                                        <option value="Human Resource" <?php echo ($employee['department'] == 'Human Resource') ? 'selected' : ''; ?>>Human Resource</option>
                                        <option value="IT-Web Development" <?php echo ($employee['department'] == 'IT-Web Development') ? 'selected' : ''; ?>>IT-Web Development</option>
                                        <option value="Operations-Indian Holidays" <?php echo ($employee['department'] == 'Operations-Indian Holidays') ? 'selected' : ''; ?>>Operations-Indian Holidays</option>
                                        <option value="Operations-International Holidays" <?php echo ($employee['department'] == 'Operations-International Holidays') ? 'selected' : ''; ?>>Operations-International Holidays</option>
                                        <option value="Marketing" <?php echo ($employee['department'] == 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                                        <option value="Marketing Designing" <?php echo ($employee['department'] == 'Marketing Designing') ? 'selected' : ''; ?>>Marketing Designing</option>
                                        <option value="Sales" <?php echo ($employee['department'] == 'Sales') ? 'selected' : ''; ?>>Sales</option>
                                        <option value="Training" <?php echo ($employee['department'] == 'Training') ? 'selected' : ''; ?>>Training</option>
                                        <option value="Visa" <?php echo ($employee['department'] == 'Visa') ? 'selected' : ''; ?>>Visa</option>
                                        <option value="Other" <?php echo ($employee['department'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                        <input type="text" class="form-control" id="otherdep">
                                    </div>
                                </div>

                                <!-- Joining Date -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Joining Date</label>
                                        <input type="date" class="form-control" name="joining_date" value="<?php echo $employee['joining_date']; ?>" required>
                                    </div>
                                </div>

                                <!-- Work Location -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Work Location</label>
                                        <input type="text" class="form-control" name="work_location" value="<?php echo $employee['location']; ?>" required>
                                    </div>
                                </div>

                                <!-- Salary -->
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Salary</label>
                                        <input type="text" class="form-control" name="salary" value="<?php echo $employee['salary']; ?>" required>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
    <?php endif; ?>


    <?php if (isset($otherDetails)) : ?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center mb-4">
                        <i class="bx bxs-business"></i>
                        <h5>Previous Employment</h5>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Fresher</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['fresher']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>From Date</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['from_date']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>To Date</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['to_date']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Experience</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['experience']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
                
     <?php endif; ?>



    <?php if (isset($otherDetails)) : ?>
                        
                <div class="col-lg-12">
                    <div class="card">
                     <div class="card-header">
                        <div class="text-center mb-4">
                            <i class="bx bxs-graduation"></i>
                            <h5>Education</h5>
                        </div>
                        <div class = "row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>High Qualification</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['high_qualif']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Year of Qualification</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['year_qualif']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Percentage</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['percentage']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>School Name</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['school_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Marksheet</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['marksheet']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
    <?php endif; ?>
                        
    <?php if (isset($otherDetails)) : ?>
            <div class="col-lg-12">
                <div class="card">
                     <div class="card-header">
                        <div class="text-center mb-4">
                          <i class="bx bx-group"></i>
                           <h5>References</h5>
                        </div>
                        <div class = "row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Reference 1 Name</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['ref1_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Reference 1 Number</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['ref1_num']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Reference 2 Name</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['ref2_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Reference 2 Number</label>
                                    <input type="text" class="form-control" value="<?php echo $otherDetails['ref2_num']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
                
    <?php endif; ?>

    <?php if (isset($employee))  : ?>
                <div class="col-lg-12">
                    <div class="card">
                     <div class="card-header">

                    <div class="text-center mb-4">
                        <i class="bx bxs-bank"></i>
                        <h5>Bank Details</h5>
                    </div>
                    <div class = "row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" value="<?php echo $employee['bank_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Branch</label>
                                <input type="text" class="form-control" value="<?php echo $employee['branch']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Account Number</label>
                                <input type="text" class="form-control" value="<?php echo $employee['acc_num']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>IFSC Code</label>
                                <input type="text" class="form-control" value="<?php echo $employee['ifsc']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>PAN</label>
                                <input type="text" class="form-control" value="<?php echo $employee['pan']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-12">
       <div class="form-group text-center">
        <button type="submit" name="reject_details" class="btn btn-danger">Reject</button>
        <button type="submit" name="approve_details" class="btn btn-success">Approve</button>
       </div>
       </div>
       </form>

    <?php endif; ?>       
       
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
$conn->close();
include "footer.php";
?>
