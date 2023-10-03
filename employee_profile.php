<!------ Include the above in your HEAD tag ---------->

<?php
$title = "Dashboard";
include "header.php";
// $username = $_SESSION['username']; 
//$profile_status = $_SESSION['p_status'];
//echo $username;

?>

<?php
ob_start();
// Include your database connection and configuration file
include "config.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['mail'];
    $mobile = $_POST['phone_num'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $joining_date = $_POST['joining_date'];
    $location = $_POST['location'];
    $bank_name = $_POST['bname'];
    $branch = $_POST['branch'];
    $acc_num = $_POST['acc_num'];
    $ifsc = $_POST['ifsc'];
    $pan = $_POST['pan'];

    $father = $_POST['fathername'];
    $birth = $_POST['dateofbirth']; 
    $address = $_POST['address'];
    $fresher = $_POST['fresher'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $experience = $_POST['experience'];
    $qualification = $_POST['qualification'];
    $qual_year = $_POST['qual_year'];
    $percentage = $_POST['percentage'];
    $school = $_POST['school'];
    $marksheet = $_POST['link'];
    $ref1 = $_POST['ref1'];
    $ref1_num = $_POST['ref1_num'];
    $ref2 = $_POST['ref2'];
    $ref2_num = $_POST['ref2_num'];

    // Generate emp_id in the format "GH0001"
    $emp_id_query = "SELECT MAX(id) AS max_id FROM employees";
    $emp_id_result = mysqli_query($conn, $emp_id_query);
    $emp_id_row = mysqli_fetch_assoc($emp_id_result);
    $max_id = $emp_id_row['max_id'];
    $new_emp_id = "GH" . str_pad($max_id + 1, 4, '0', STR_PAD_LEFT);

    // Insert data into employees table
    $email_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `employees` WHERE `email`='$email'"));
    $mob_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `employees` WHERE `mobile`='$mobile'"));

    if ($email_count != '0') {
        echo '<script>alert("The e-Mail ID Already Exists")</script>';
    } else if ($mob_count != '0') {
        echo '<script>alert("The Mobile Number Already Exists")</script>';
    } else {
        // Prepare the first query
        $insert_query = "INSERT INTO employees (emp_id, first_name, last_name, email, mobile, designation, department, joining_date, location, bank_name, branch, acc_num, ifsc, pan)
                         VALUES ('$new_emp_id', '$first_name', '$last_name', '$email', '$mobile', '$designation', '$department', '$joining_date', '$location', '$bank_name', '$branch', '$acc_num', '$ifsc', '$pan')";

        // Prepare the second query
        $query2 = "INSERT INTO emp_other_details (emp_id, father_name, address, date_of_birth, fresher, from_date, to_date, experience, high_qualif, year_qualif, percentage, school_name, marksheet, ref1_name, ref1_num, ref2_name, ref2_num)
                   VALUES ('$new_emp_id', '$father', '$address', '$birth', '$fresher', '$fromdate', '$todate', '$experience', '$qualification', '$qual_year', '$percentage', '$school', '$marksheet', '$ref1', '$ref1_num', '$ref2', '$ref2_num')";

        // Execute both queries
        if (mysqli_multi_query($conn,  $insert_query . ';' .$query2)) {
            // Data inserted successfully
            header("location: thanks.php");
            echo "Data saved successfully.";
        } else {
            // Error in inserting data
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Please complete your profile to access all features</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employees</a></li>
                    <li class="breadcrumb-item active">Invite</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Employee Details</h4>
            </div>

                                    

            <div class="card-body">
                <form method="POST">
                <div id="form-step">

                    <!-- Step 1: Personal Details -->
                    <div id="step1" class="form-step" >
                    <div class="text-center mb-4">
                    <i class="bx bx-user"></i>
                                                        <h5>Personal Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="fname" class="form-label">First name</label>
                                                                    <input type="text" class="form-control" id="fname" name = "fname"  style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Last name</label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name = "lname" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Father Name</label>
                                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" name = "fathername" required>
                                                                </div>
                                                            </div>
                                                                <div class="col-lg-6">
                                                                   <div class="mb-3">
                                                                     <label for="basicpill-phoneno-input" class="form-label">Date of Birth</label>
                                                                     <input type="date" class="form-control" id="basicpill-phoneno-input" name = "dateofbirth" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="basicpill-phoneno-input" name = "phone_num" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-email-input" class="form-label">Email-id</label>
                                                                    <input type="text" class="form-control" id="basicpill-email-input" name = "mail" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="basicpill-address-input" name = "address" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-navigation">
                                                        <button type="button" id = "nextbtn" class="next btn btn-primary float-end">Next</button>
                                                        </div>
                                                  </div>


                    <!-- Step 2: Work Details -->
                    <div id="step2" class="form-step">
                    <div class="text-center mb-4">
                    <i class="bx bxs-city"></i>
                                                        <h5>Work Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-select-input" class="form-label">Designation</label>
                                                                    <select id="designation" name="designation" class="form-control" required>
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
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-text-input" class="form-label">Department</label>
                                                                    <select id="department" name="department" class="form-control" required>
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
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                           <div class="col-lg-6">
                                                                   <div class="mb-3">
                                                                     <label for="basicpill-phoneno-input" class="form-label">Date of Joining</label>
                                                                     <input type="date" class="form-control" id="basicpill-phoneno-input" name = "joining_date" required>
                                                                </div>
                                                           </div>
                                                           <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-text-input" class="form-label">work Location</label>
                                                                    <input type="text" class="form-control" id="basicpill-text-input" name = "location" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-navigation">
                        <button type="button" class="previous btn btn-primary float-start">Previous</button>
                        <button type="button" class="next btn btn-primary float-end">Next</button>
</div>
                                                    
                    </div>

                    <!-- Step 3: Previous Experience -->
                    <div id="step3" class="form-step">
                    <div class="text-center mb-4">
                    <i class="bx bxs-business"></i>
                                                        <h5>Previous Employment</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                                <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="fresher-radio" class="form-label">Are you a fresher?</label>
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="fresher" id="fresher-yes" value="yes"required>
                                                                    <label class="form-check-label" for="fresher-yes">
                                                                        Yes
                                                                    </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="fresher" id="fresher-no" value="no"required>
                                                                    <label class="form-check-label" for="fresher-no">
                                                                        No
                                                                    </label>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div id="experience-fields" style="display: none;">
                                                                <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                    <label for="from-date-input" class="form-label">From Date</label>
                                                                    <input type="date" class="form-control" id="from-date-input" name = "fromdate">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                    <label for="to-date-input" class="form-label">To Date</label>
                                                                    <input type="date" class="form-control" id="to-date-input" name = "todate">
                                                                    </div>
                                                                </div>
                                                                </div>

                                                                <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                    <label for="experience-input" class="form-label">Share your experience</label>
                                                                    <textarea class="form-control" id="experience-input" name = "experience"></textarea>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-navigation">
                        <button type="button" class="previous btn btn-primary float-start">Previous</button>
                        <button type="button" class="next btn btn-primary float-end">Next</button>
</div>
                                                            </div>
                                                        

                                                         <script>
                                                            var fresherYesRadio = document.getElementById("fresher-yes");
                                                            var fresherNoRadio = document.getElementById("fresher-no");
                                                            var experienceFields = document.getElementById("experience-fields");

                                                            fresherYesRadio.addEventListener("change", function () {
                                                                if (this.checked) {
                                                                experienceFields.style.display = "none";
                                                                }
                                                            });

                                                            fresherNoRadio.addEventListener("change", function () {
                                                                if (this.checked) {
                                                                experienceFields.style.display = "block";
                                                                }
                                                            });
                                                        </script> 
                   

                    <!-- Step 4: Education -->
                    <div id="step4" class="form-step">
                    <div class="text-center mb-4">
                    <i class="bx bxs-graduation"></i>
                                                        <h5>Education</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-select-input" class="form-label">Highest Qualification</label>
                                                                    <select id="qualification" name="qualification" class="form-control"required>
                                                                        <option>---Select Type---</option>
                                                                        <option value="ssc">SSC</option>
                                                                        <option value="intermediate">Intermediate</option>
                                                                        <option value="graduation">Graduation</option>
                                                                        <option value="postgraduation">Post Graduation</option>
                                                                        <option value="masters">Masters</option>
                                                                        <option value="diploma">Diploma</option>
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Year in which you have qualified</label>
                                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" name = "qual_year"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-num-input" class="form-label">percentage</label>
                                                                    <input type="text" class="form-control" id="basicpill-num-input" name = "percentage"required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-text-input" class="form-label">School Name</label>
                                                                    <input type="text" class="form-control" id="basicpill-text-input" name = "school"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="googleDriveLink">Share your marksheet Google Drive link</label>
                                                                    <input type="text" id="googleDriveLink" class="form-control" name = "link"required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-navigation">
                        <button type="button" class="previous btn btn-primary float-start">Previous</button>
                        <button type="button" class="next btn btn-primary float-end">Next</button>
</div>
                                                      
                    </div>

                    <!-- Step 5: References -->
                    <div id="step5" class="form-step">
                    <div class="text-center mb-4">
                    <i class="bx bx-group"></i>
                                                        <h5>References</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-fullname-input" class="form-label">Reference 1</label>
                                                                    <input type="text" class="form-control" id="basicpill-fullname-input"name = "ref1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="basicpill-phoneno-input" name = "ref1_num">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-fullname-input" class="form-label">Reference 2</label>
                                                                    <input type="text" class="form-control" id="basicpill-fullname-input"name = "ref2" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="basicpill-phoneno-input" name = "ref2_num">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-navigation">
                        <button type="button" class="previous btn btn-primary float-start">Previous</button>
                        <button type="button" class="next btn btn-primary float-end">Next</button>
                        </div>
                    </div>

                    <!-- Step 6: Banking Details -->
                    <div id="step6" class="form-step">
                    <div class="text-center mb-4">
                    <i class="bx bxs-bank"></i>
                                                        <h5>Bank Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                        <div class="row">
                                                                <div class="col-lg-6">
                                                                
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-cardno-input" class="form-label">Bank Name:</label>
                                                                        <input type="text" class="form-control" id="bname" name = "bname"required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-cardno-input" class="form-label">Branch:</label>
                                                                        <input type="text" class="form-control" id="branch" name = "branch"required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    

                                                                    <div class="mb-3">
                                                                        <label for="basicpill-card-verification-input" class="form-label">Account Number</label>
                                                                        <input type="text" class="form-control" id="accnumt" name = "acc_num"required>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                                   IFSC Code:
                                                                        </label>
                                                                        <input type="text" class="form-control" id="ifsc" name = "ifsc"required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    

                                                                    <div class="mb-3">
                                                                        <label for="basicpill-card-verification-input" class="form-label">PAN Number</label>
                                                                        <input type="text" class="form-control" id="pan" name = "pan"required>
                                                                    </div>
                                                                </div>
                                                        </div>
                    </div>

                    <div class="form-navigation">
                    
                        <button type="submit" class="submit btn btn-success float-end" >Submit</button>
                                                        </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    var currentStep = 1;
    var totalSteps = $(".form-step").length;

    $(".next").click(function () {
        // Select the current step's input fields
        var currentFields = $("#step" + currentStep + " input[required], #step" + currentStep + " textarea[required]");
        var isValid = true;

        // Check if all required fields are filled
        currentFields.each(function () {
            if ($(this).val().trim() === '') {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // Proceed to the next step if all required fields are filled
        if (isValid) {
            if (currentStep < totalSteps) {
                $("#step" + currentStep).hide();
                currentStep++;
                $("#step" + currentStep).show();
            }

            // Hide the next button on the last step
            if (currentStep === totalSteps) {
                $(".next").hide();
                $(".submit").show();
            }
        }
    });

    $(".previous").click(function () {
        if (currentStep > 1) {
            $("#step" + currentStep).hide();
            currentStep--;
            $("#step" + currentStep).show();
        }

        // Show the next button and hide the submit button on non-last steps
        if (currentStep !== totalSteps) {
            $(".next").show();
            $(".submit").hide();
        }
    });

    // Hide all steps except the first one initially
    $(".form-step").not("#step1").hide();

    // Hide the submit button initially
    $(".submit").hide();
});
</script>


<script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>

        <!-- form wizard init -->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <script src="assets/js/app.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#other').hide();
        $('#designation').change(function() {
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
        $('#department').change(function() {
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