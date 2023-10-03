<?php
$title = "Dashboard";
include "header.php";
$username = $_SESSION['username'];
$profile_status = $_SESSION['p_status'];
echo $username;

$get_uid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `mob_num`='$username'"));
$uid = $get_uid['id'];


if(isset($_POST['save'])){
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user_id = $_POST['username'];
    $faname = $_POST['faname'];
    $pan = $_POST['pan_no'];
    $dob = $_POST['dob'];
    $street = $_POST['street'];
    $address = $_POST['address'];
    $shop_no = $_POST['shop_no'];
    $m_status = $_POST['marital_status'];
    $trade_name = $_POST['trade_name'];
    $trde_type = $_POST['trade_type'];
    $trade_of = $_POST['type_of_trade'];
    $trade_address = $_POST['trade_add'];
    $trade_state = $_POST['state'];
    $trade_dist = $_POST['district'];
    $trade_village = $_POST['village'];
    $bank_name = $_POST['bank_name'];
    $ac_name = $_POST['ac_name'];
    $bank_add = $_POST['bank_add'];
    $bank_ac = $_POST['acc_no'];
    $bank_ifsc = $_POST['bank_ifsc'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $date_of_transaction = $_POST['date_of_transaction'];
    $dd_number = $_POST['dd_number'];
    $cc_number = $_POST['cc_number'];
    $issue_bank = $_POST['issue_bank'];
    $ref_name = $_POST['ref_name'];
    $ref_cno = $_POST['ref_cno'];
    $image = $_FILES['image'];

  // Specify the destination directory to save the uploaded image
  $targetDir = 'agent_profiles/';
  $targetPath = $targetDir . basename($image['name']);

  // Move the uploaded file to the desired location
  if (move_uploaded_file($image['tmp_name'], $targetPath)) {
    echo "Image uploaded successfully!";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


    $sqls = "INSERT INTO `agents`(`user_id`, `fname`, `lname`, `pan_no`, `shop_no`, `street`, `address`, `dob`, `marital_status`, `trade_name`, `trade_type`, `type_of`, `trade_add`, `state`, `dist`, `taluk`, `bank_name`, `bank_no`, `bank_add`, `bank_ifsc`, `payment_mode`, `dot`, `cheque_no`, `cc_no`, `cc_bank`, `ref_name`, `ref_no`, `photo`, `on_date`) VALUES ('$user_id',  '$fname', '$lname', '$pan', '$shop_no', '$street', '$address', '$dob', '$m_status', '$trade_name', '$trde_type', '$trade_of', '$trade_address', '$trade_state', '$trade_dist', '$trade_village', '$bank_name', '$bank_ac', '$bank_add', '$bank_ifsc', '$mode_of_payment', '$date_of_transaction', '$dd_number', '$cc_number', '$issue_bank', '$ref_name', '$ref_cno', '$image', '$date')";



if($ag = mysqli_query($conn, $sqls)){
    $ag_ids = $ag->insert_id;
    mysqli_query($conn, "UPDATE `users` SET `pro_status`='1' WHERE `id` = $user_id");
    mysqli_query($conn, "INSERT INTO `agent_approval`(`agent_id`) VALUES ('$ag_ids')");
    
}else{
    echo $sqls;
}



}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#trade_other').hide();
        $('#credit').hide();
        $('#ttype').change(function(){
            var trades = $(this).val();
            if(trades == 'others'){
                $('#trade_other').show();
            }
        });
        
        $('.mode_of_payment').change(function(){
            var payment_mode = $(this).val();
            if(payment_mode == 'Cheque'){
                $('#cheque').show();
                $('#credit').hide();
            } else if(payment_mode == 'DD'){
                $('#cheque').show();
                $('#credit').hide();
            }else if(payment_mode =='Credit/Debit Card'){
                $('#credit').show();
                $('#cheque').hide();
                
            }else{
                $('#credit').hide();
                $('#cheque').hide();
            }
        });
    })
    
    </script>
        <!-- start page title -->

<?php   
if($get_uid['pro_status'] == '1'){ 
    echo '<h4 class="mb-sm-0 font-size-18" style="text-align:center;">Thanks for Submit Profile. You will get notification once we approved your profile.<br/> <br/> You will access to the Dashbaord after Approval</h4>';
}else if($get_uid['pro_status'] == '0'){ ?>

    

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Please complete your profile to access the All features</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agents</a></li>
                            <li class="breadcrumb-item active">Invite</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
<?php if($get_uid['user_type'] == 'Lead Generator'){?>

    <div class="row">
        <form action="associate.php" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Full Name (As per the PAN Card)</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" name="full_name">
                                                                    <input type="hidden"  class="form-control" value="<?php echo $uid; ?>" name="username" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Father's Name</label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="fname" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="basicpill-firstname-input" name="dob" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Gender</label>
                                                                    <select name="gender" class="form-control">
                                                                        <option>---Select Gender---</option>
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">PAN Number</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" name="pan_number" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Adhaar Number</label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="adhaar_number" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Profession</label>
                                                                    <select name="profession" class="form-control">
                                                                        <option>---Select Your Profession---</option>
                                                                        <option>Salaried</option>
                                                                        <option>Business</option>
                                                                        <option>Retried</option>
                                                                        <option>Freelancing Agents</option>
                                                                        <option>House Wife</option>
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                <label for="basicpill-firstname-input" class="form-label">Number of years in Profession</label>
                                                                    <select name="no_of_profession" class="form-control">
                                                                        <option>---Select Year of Profession---</option>
                                                                        <option>Less than 2 Years</option>
                                                                        <option>2-5 Years</option>
                                                                        <option>More than 5 Years</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Current Location</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" name="current_locations" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">District of Operation
                                                                    </label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="district_operation" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="basicpill-firstname-input" name="address" required></textarea>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">City</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" name="city" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">District
                                                                    </label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="district" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">State
                                                                    </label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="state" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">Upload Profile Photo</label>
                                                                    <input type="file" class="form-control" id="basicpill-firstname-input" name="profile_photo" />
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-3">
                                                                    
                                                                    <input type="submit" class="btn btn-primary" id="basicpill-firstname-input" name="submit" value="Save Change" />
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
        </form>
    </div>

<?php }else{?>

        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Partner Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                            <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                    <a href="#seller-details" class="nav-link" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Seller Details">
                                                            <i class="bx bx-list-ul"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#company-document" class="nav-link" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Company Document">
                                                            <i class="bx bx-book-bookmark"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="#bank-detail" class="nav-link active" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Bank Details">
                                                            <i class="bx bxs-bank"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- wizard-nav -->

                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane" id="seller-details">
                                                    <div class="text-center mb-4">
                                                        <h5>Seller Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">First name</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" name="fname">
                                                                    <input type="hidden"  class="form-control" value="<?php echo $uid; ?>" name="username">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Last name</label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input" name="lname">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Father Name</label>
                                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" name="faname">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-email-input" class="form-label">PAN</label>
                                                                    <input type="text" class="form-control" id="basicpill-email-input" name="pan_no">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Door/Shop No</label>
                                                                    <input type="text" class="form-control" id="basicpill-phoneno-input" name="shop_no">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-email-input" class="form-label">Street</label>
                                                                    <input type="text" class="form-control" id="basicpill-email-input" name="street">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="basicpill-phoneno-input" name="dob" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-email-input" class="form-label">Marital Status</label>

                                                                    <select name="marital_status" class="form-control">
                                                                        <option>---Select Status---</option>
                                                                        <option>Single</option>
                                                                        <option>Married</option>
                                                                        <option>Others</option>
</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Address</label>
                                                                    <textarea id="basicpill-address-input" class="form-control" name="address" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="next disabled"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                                    </ul>
                                                </div>
                                                <!-- tab pane -->
                                                <div class="tab-pane" id="company-document">
                                                  <div>
                                                    <div class="text-center mb-4">
                                                        <h5>Trade Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                                                    <!-- <form action="" method="post"> -->
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-pancard-input" class="form-label">Trade Name</label>
                                                                    <input type="text" class="form-control" id="basicpill-pancard-input"  name="trade_name">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-vatno-input" class="form-label">Trade Type</label>
                                                                    <select id="ttype" name="trade_type" class="form-control">
                                                                        <option>---Select Type---</option>
                                                                        
                    
                    <option value="proprietory">Proprietory</option>
                    <option value="partnership">Partnership</option>
                    <option value="public limited">Public Limited</option>
                    <option value="private limited">Private Limited</option>
                    <option value="others">Other</option>
                  
                                                                    </select>
                                                                    <input type="text" class="form-control" id="trade_other">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-cstno-input" class="form-label">Type Of Trade:</label>
                                                                    <input type="text" name="type_of_trade"  class="form-control" id="basicpill-cstno-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-servicetax-input" class="form-label">Address</label>
                                                                    <input type="text" class="form-control" id="basicpill-servicetax-input" name="trade_add">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-cstno-input" class="form-label">State</label>
                                                                    <input type="text" class="form-control" id="basicpill-cstno-input" name="state">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-servicetax-input" class="form-label">District</label>
                                                                    <input type="text" class="form-control" id="basicpill-servicetax-input" name="district">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-servicetax-input" class="form-label">Taluk/city/Village</label>
                                                                    <input type="text" class="form-control" id="basicpill-servicetax-input" name="village">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                  
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                        <li class="next disabled"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                                    </ul>
                                                  </div>
                                                </div>
                                                <!-- tab pane -->
                                                <div class="tab-pane active" id="bank-detail">
                                                    <div>
                                                        <div class="text-center mb-4">
                                                            <h5>Bank Details</h5>
                                                            <p class="card-title-desc">For Commision Credit.</p>
                                                        </div>
                                                        
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-namecard-input" class="form-label">
Bank Name:
</label>
                                                                        <input type="text" class="form-control" id="basicpill-namecard-input" name="bank_name">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-6">
                                                                
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-cardno-input" class="form-label">Account Name:</label>
                                                                        <input type="text" class="form-control" id="basicpill-cardno-input" name="ac_name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-cardno-input" class="form-label">Bank Address:</label>
                                                                        <input type="text" class="form-control" id="basicpill-cardno-input" name="bank_add">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-card-verification-input" class="form-label">Account Number</label>
                                                                        <input type="text" class="form-control" id="basicpill-card-verification-input" name="acc_no" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
<label for="basicpill-expiration-input" class="form-label">IFSC Code:</label>
<input type="text" class="form-control" name ="bank_ifsc"  />
                                                                    </div>
                                                                </div>
                                                            </div>
<div class="row">
    <h3>Fee Payment Details</h3>
    <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                        Mode of Payment
</label>
                                                                        <select name="mode_of_payment" class="form-control mode_of_payment" >
                                                                        <opiton selected>---Select---</option>
                                                                            <option>Cheque</option>
                                                                            <option>DD</option>
                                                                            <option>Credit/Debit Card</option>
                                                                            <option>Deposit By Company Account</option>
</select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="row" id="cheque">
                                                                        <div class="col-md-6">
                                                                        <label for="basicpill-expiration-input" class="form-label">
Date of Transaction:
</label>
                                                                        <input type="date" class="form-control"  name="date_of_transaction"> 
</div>
<div class="col-md-6">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                        Cheque/DD/Payment Slip Number::
</label>
                                                                        <input type="text" class="form-control"  name="dd_number">
</div>

</div>
<div class="row" id="credit">
                                                                        <div class="col-md-6">
                                                                        <label for="basicpill-expiration-input" class="form-label">

                                                                        Credit Card Number:

</label>
                                                                        <input type="number" class="form-control"  name="cc_number">
</div>
<div class="col-md-6">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                        
Issuing Bank:

</label>
<input type="text" class="form-control"  name="issue_bank">
</div>

</div>

</div>
<div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                        Reference Name:
</label>
                                                                        <input type="text" class="form-control"  name="ref_name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">

                                                                        Reference Contact Number:
</label>
                                                                        <input type="text" class="form-control"  name="ref_cno">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">
                                                                        Upload A Latest Passport Size Photo (Only in 'jpg' format):
</label>
                                                                        <input type="file" class="form-control"  name="image">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                            
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                                                <label class="form-check-label" for="formrow-customCheck">
I HERE BY DECLARE THAT THE ABOW INFORMATION IS TRUE AS PER MY KNOWLEDGE.
</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="formrow-customCheck">
                                                                <label class="form-check-label" for="formrow-customCheck">
                                                                I accept the terms and conditions. 
</label>
                                                            </div>
                                                        </div>
                                                            </div>

                                                        
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="float-end"><input type="submit"  class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target=".confirmModal" name="save" value="Save Changes" /></li>
                                                        </ul>
                                                        </form>

                                                        <div class="modal fade confirmModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="mb-3">
                                        <i class="bx bx-check-circle display-4 text-success"></i>
                                    </div>
                                    <h5>Data Saved</h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
                                                    </div>
                                                </div>
                                                <!-- tab pane -->
                                            </div>
                                            <!-- end tab content -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <?php } ?>
      <?php  }  ?>
        <!-- end page title -->
<script>
    $(document).ready(function() {
  $('#agent_profile_form').submit(function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    // Get form data
    var formData = $(this).serialize();

    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: 'save_agents.php',
      data: formData,
      success: function(response) {
        // Handle successful response
        console.log(response);
      },
      error: function(xhr, status, error) {
        // Handle error
        console.log(xhr.responseText);
      }
    });
  });
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

        <!-- twitter-bootstrap-wizard js -->
        <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>

        <!-- form wizard init -->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <script src="assets/js/app.js"></script>
       
<?php 

?>