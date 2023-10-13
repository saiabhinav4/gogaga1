<!DOCTYPE html>
<?php
include 'config.php';

include 'utils/getPartnerInfo.php';

$errorMsg = '';

if (!empty($_POST)) {

  class PatnerRegistration
  {
    private $firstName;
    private $lastName;
    private $fatherName;
    private $address;
    private $panNumber;
    private $dateOfBirth;
    private $maritalStatus;
    private $password;
    private $state;
    private $district;
    private $experience;
    private $contactNumber;
    private $email;
    private $userType;
    private $tradeName;
    private $tradeType;
    private $otherTradeTypes;
    private $typesOfTrade;
    private $tradeAddress;
    private $bankName;
    private $bankAddress;
    private $accountNumber;
    private $ifscCode;
    private $referenceName;
    private $referenceContactNumber;
    private $paymentMode;
    private $slipNumber;
    private $transcationDate;
    private $credCardNo;
    private $issueBank;
    private $photoPic;
    private $fileDestination;

    private $fieldArray;
    private $picFile;

    public function __construct($fieldArray, $picFile)
    {
      $this->fieldArray = $fieldArray;
      $this->picFile = $picFile;
    }

    public function update(){
       global $conn;

       $update_User="UPDATE user SET 
       firstname=?,
       lastname=?,
       fathername=?,
       address=?,
       dateOfBirth=?,
       maritalStatus=?,
       contactNumber=?,
       email=?,
       panNumber=?";   //photoPath
       $userStmt="";
       if($this->picFile['photo_pic']['error']===0){
         $update_User=$update_User.',photoPath=? WHERE user_id=?;';
         $userStmt=$conn->prepare($update_User);
         $userStmt->bind_param('ssssssssssi',$this->firstName,$this->lastName,$this->fatherName,$this->address,$this->dateOfBirth,$this->maritalStatus,$this->contactNumber,$this->email,$this->panNumber,$this->fileDestination,$this->fieldArray['user_id']);
       }
       else{
        $update_User=$update_User.' WHERE user_id=?;';
        $userStmt=$conn->prepare($update_User);
         $userStmt->bind_param('sssssssssi',$this->firstName,$this->lastName,$this->fatherName,$this->address,$this->dateOfBirth,$this->maritalStatus,$this->contactNumber,$this->email,$this->panNumber,$this->fieldArray['user_id']);
       }

       if($userStmt->execute()){  
           if($this->picFile['photo_pic']['error']===0){
            move_uploaded_file($this->picFile['photo_pic']['tmp_name'], $this->fileDestination);
           }
           $update_Bank="UPDATE bankdetails SET
           bankName=?,
           bankAddress=?,
           accountNumber=?,
           ifscCode=?
           WHERE user_id=?;";

           $bankStmt=$conn->prepare($update_Bank);
           $bankStmt->bind_param('ssssi', $this->bankName, $this->bankAddress, $this->accountNumber, $this->ifscCode,$this->fieldArray['user_id']);
           if($bankStmt->execute()){
              $update_ref="UPDATE reference SET
              referenceName=?,
              referencePhoneNumber=?
              WHERE user_id=?;";
              $refStmt= $conn->prepare($update_ref);
              $refStmt->bind_param('ssi', $this->referenceName, $this->referenceContactNumber, $this->fieldArray['user_id']);
              if($refStmt->execute()){
                $select_districtId = "SELECT district_id from districts where district like ?";
                $districtId_stmt = $conn->prepare($select_districtId);
                $districtId_stmt->bind_param('s', $this->district);
                if ($districtId_stmt->execute()) {
                  $districtId='';
                  $result_district = $districtId_stmt->get_result();
                  if ($result_district->num_rows > 0) {
                    $row1 = $result_district->fetch_row();
                    $districtId = $row1[0];

                    $updatePartner="UPDATE partnerdetails SET
                    yearOfExperience=?,
                    tradeName=?,
                    tradeType=?,
                    other=?,
                    typeOfTrade=?,
                    tradeAddress=?,
                    payment_mode=?,
                    slip_number=?,
                    transaction_date=?,
                    credit_card_no=?,
                    issue_bank=?,  
                    district_id=?
                    WHERE user_id=?
                    ";
                    $PartnerStmt= $conn->prepare($updatePartner);
                    $PartnerStmt->bind_param('issssssssssii',$this->experience, $this->tradeName, $this->tradeType, $this->otherTradeTypes, $this->typesOfTrade, $this->tradeAddress,$this->paymentMode,$this->slipNumber,$this->transcationDate,$this->credCardNo,$this->issueBank,$districtId,$this->fieldArray['user_id']);
                    $PartnerStmt->execute();
                    return true;
                  }
                }
              }
           }
       }
       return "Somthing went wrong!, please try again";
    }

    public function inserQuery()
    {
      global $conn;
      global $date;
      $userId = '';
      $districtId = '';
      $isAgent = 1;
      $select_existing_user = "SELECT user_id from user where email like ?  or contactNumber like ?";
      $existing_user_stmt = $conn->prepare($select_existing_user);
      $existing_user_stmt->bind_param('ss', $this->email, $this->contactNumber);
      $existing_user_stmt->execute();
      $result = $existing_user_stmt->get_result();
      if ($result->num_rows == 0) {
        $insert_query = "INSERT INTO user (
              firstname,
              lastname,
              fathername,
              address,
              dateOfBirth,
              maritalStatus,
              contactNumber,
              email,
              dateOfRequest,
              userType,
              photoPath,
              panNumber,
              password,
              isAgent
          ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('ssssssssssssss', $this->firstName, $this->lastName, $this->fatherName, $this->address, $this->dateOfBirth, $this->maritalStatus, $this->contactNumber, $this->email, $date, $this->userType, $this->fileDestination, $this->panNumber, $this->password, $isAgent);
        if ($insert_stmt->execute()) {
          move_uploaded_file($this->picFile['photo_pic']['tmp_name'], $this->fileDestination);
          $select_user_id_query = "SELECT user_id from user where email like ?";
          $user_id_stmt = $conn->prepare($select_user_id_query);
          $user_id_stmt->bind_param('s', $this->email);
          if ($user_id_stmt->execute()) {
            $result_id = $user_id_stmt->get_result();
            if ($result_id->num_rows == 1) {
              $row = $result_id->fetch_row();
              $userId = $row[0];

              $insert_bank_query = "INSERT INTO bankdetails (bankName, bankAddress, accountNumber, ifscCode, user_id)
                  VALUES (?,?,?,?,?);";
              $bankStmt = $conn->prepare($insert_bank_query);
              $bankStmt->bind_param('ssssi', $this->bankName, $this->bankAddress, $this->accountNumber, $this->ifscCode, $userId);
              if ($bankStmt->execute()) {

                $select_districtId = "SELECT district_id from districts where district like ?";
                $districtId_stmt = $conn->prepare($select_districtId);
                $districtId_stmt->bind_param('s', $this->district);
                if ($districtId_stmt->execute()) {
                  $result_district = $districtId_stmt->get_result();
                  if ($result_district->num_rows > 0) {
                    $row1 = $result_district->fetch_row();
                    $districtId = $row1[0];

                    $insert_partnerDetails = "INSERT INTO partnerdetails (yearOfExperience, tradeName, tradeType, other, typeOfTrade, tradeAddress, user_id, district_id)
                            VALUES (?,?,?,?,?,?,?,?);";
                    $partnerDetailsStmt = $conn->prepare($insert_partnerDetails);
                    $partnerDetailsStmt->bind_param('isssssii', $this->experience, $this->tradeName, $this->tradeType, $this->otherTradeTypes, $this->typesOfTrade, $this->tradeAddress, $userId, $districtId);
                    if ($partnerDetailsStmt->execute()) {
                      $insert_references = "INSERT INTO reference (referenceName, referencePhoneNumber, user_id)
                                VALUES (?,?,?);";
                      $referenceStmt = $conn->prepare($insert_references);
                      $referenceStmt->bind_param('ssi', $this->referenceName, $this->referenceContactNumber, $userId);
                      if ($referenceStmt->execute()) {
                        return true;
                      }
                    }
                  }
                }
              }
            }
          }
        }
        return "Somthing went worng! please contact admin";
      } else {
        return "Already email or phone number is registered, please register with different once";
      }
    }
    public function validate()
    {
      if (isset($this->fieldArray['fname']) && !empty($this->fieldArray['fname'])) {
        if (isset($this->fieldArray['lname']) && !empty($this->fieldArray['lname'])) {
          if (isset($this->fieldArray['father_name']) && !empty($this->fieldArray['father_name'])) {
            if (isset($this->fieldArray['addr']) && !empty($this->fieldArray['addr'])) {
              if (isset($this->fieldArray['pan']) && !empty($this->fieldArray['pan'])) {
                if (isset($this->fieldArray['dob']) && !empty($this->fieldArray['dob'])) {
                  if (isset($this->fieldArray['m_st']) && !empty($this->fieldArray['m_st'])) {
                    if (isset($this->fieldArray['state']) && !empty($this->fieldArray['state'])) {
                      if (isset($this->fieldArray['district']) && !empty($this->fieldArray['district'])) {
                        if (isset($this->fieldArray['yop']) && !empty($this->fieldArray['yop'])) {
                          if (isset($this->fieldArray['c_num']) && !empty($this->fieldArray['c_num'])) {
                            if (isset($this->fieldArray['email']) && !empty($this->fieldArray['email'])) {
                              if (isset($this->fieldArray['t_name']) && !empty($this->fieldArray['t_name'])) {
                                if (isset($this->fieldArray['trade_type']) && !empty($this->fieldArray['trade_type'])) {
                                  if (isset($this->fieldArray['types_of_type']) && !empty($this->fieldArray['types_of_type'])) {
                                    if (isset($this->fieldArray['trade_addr']) && !empty($this->fieldArray['trade_addr'])) {
                                      if (isset($this->fieldArray['bank_name']) && !empty($this->fieldArray['bank_name'])) {
                                        if (isset($this->fieldArray['bank_addr']) && !empty($this->fieldArray['bank_addr'])) {
                                          if (isset($this->fieldArray['account_num']) && !empty($this->fieldArray['account_num'])) {
                                            if (isset($this->fieldArray['reference_name']) && !empty($this->fieldArray['reference_name'])) {
                                              if (isset($this->fieldArray['reference_num']) && !empty($this->fieldArray['reference_num'])) {
                                                if (isset($this->fieldArray['otherTrade_type']) && !empty($this->fieldArray['otherTrade_type'])) {
                                                  if (isset($this->fieldArray['ifsc']) && !empty($this->fieldArray['ifsc'])) {
                                                    if (isset($this->fieldArray['mode_payment']) && !empty($this->fieldArray['mode_payment'])) {
                                                      if (isset($this->fieldArray['slipNumber']) && !empty($this->fieldArray['slipNumber'])) {
                                                        if (isset($this->fieldArray['transcation_date']) && !empty($this->fieldArray['transcation_date'])) {
                                                          if (isset($this->fieldArray['issue_bank']) && !empty($this->fieldArray['issue_bank'])) {
                                                          
                                                          $this->paymentMode=$this->fieldArray['mode_payment'];
                                                          $this->slipNumber= $this->fieldArray['slipNumber'];
                                                          $this->transcationDate= $this->fieldArray['transcation_date'];
                                                          $this->credCardNo=$this->fieldArray['credit_card_number'];
                                                          $this->issueBank=$this->fieldArray['issue_bank'];

                                                          $this->firstName = $this->fieldArray['fname'];
                                                          $this->lastName = $this->fieldArray['lname'];
                                                          $this->fatherName = $this->fieldArray['father_name'];
                                                          $this->address = $this->fieldArray['addr'];
                                                          $this->panNumber = $this->fieldArray['pan'];
                                                          $this->dateOfBirth = $this->fieldArray['dob'];
                                                          $this->maritalStatus = $this->fieldArray['m_st'];
                                                          $this->state = $this->fieldArray['state'];
                                                          $this->district = $this->fieldArray['district'];
                                                          $this->experience = $this->fieldArray['yop'];
                                                          $this->contactNumber = $this->fieldArray['c_num'];
                                                          $this->email = $this->fieldArray['email'];
                                                          $this->tradeName = $this->fieldArray['t_name'];
                                                          $this->tradeType = $this->fieldArray['trade_type'];
                                                          $this->typesOfTrade = $this->fieldArray['types_of_type'];
                                                          $this->tradeAddress = $this->fieldArray['trade_addr'];
                                                          $this->bankName = $this->fieldArray['bank_name'];
                                                          $this->bankAddress = $this->fieldArray['bank_addr'];
                                                          $this->accountNumber = $this->fieldArray['account_num'];
                                                          $this->referenceName = $this->fieldArray['reference_name'];
                                                          $this->referenceContactNumber = $this->fieldArray['reference_num'];
                                                          $this->otherTradeTypes = $this->fieldArray['otherTrade_type'];
                                                          $this->ifscCode = $this->fieldArray['ifsc'];

                                                          $fileName = $this->picFile['photo_pic']['name'];
                                                          $fileTmpName = $this->picFile['photo_pic']['tmp_name'];
                                                          $fileSize = $this->picFile['photo_pic']['size'];
                                                          $fileError = $this->picFile['photo_pic']['error'];
                                                          $fileType = $this->picFile['photo_pic']['type'];
                                                          if($fileError==0){ 
                                                          $fileExt = explode('.', $fileName);
                                                          $fileActualExt = strtolower(end($fileExt));
                                                          $allowed = array('jpg', 'jpeg', 'png');
                                                            if (in_array($fileActualExt, $allowed)) {
                                                              if ($fileError == 0) {
                                                                if ($fileSize < 2000000) {
                                                                  $fileNameNew = $this->panNumber . "." . $fileActualExt;
                                                                  $this->fileDestination = 'data/images/profile/' . $fileNameNew;
                                                                  return true;
                                                                } else {
                                                                  return "Image size should be less than 2MB";
                                                                }
                                                              } else {
                                                                return "Something went worng of image upload, please Try again";
                                                              }
                                                            } else {
                                                              return "Allowed only .jpg, .jpeg, .png";
                                                            }
                                                          }else{
                                                            return true;
                                                          }
                                                         }
                                                         else{
                                                          return "Enter valid issued bank";
                                                         }
                                                        } else {
                                                          return "Enter valid Transcation Date";
                                                        }
                                                      } else {
                                                        return "Enter valid Slip number.";
                                                      }
                                                    } else {
                                                      return "Select the valid mode of payment";
                                                    }
                                                  } else {
                                                    return "Enter valid IFSC Code";
                                                  }
                                                } else {
                                                  return "If Other, Please Specify properly";
                                                }
                                              } else {
                                                return "Enter Reference Contact Number properly";
                                              }
                                            } else {
                                              return "Enter Reference Name properly";
                                            }
                                          } else {
                                            return "Enter valid Bank Account Number";
                                          }
                                        } else {
                                          return "Enter valid Bank Address";
                                        }
                                      } else {
                                        return "Enter valid Bank Name";
                                      }
                                    } else {
                                      return "Enter valid Trade Address";
                                    }
                                  } else {
                                    return "Enter valid Types of Trade";
                                  }
                                } else {
                                  return "Enter valid TradeType";
                                }
                              } else {
                                return "Enter valid Trade Name";
                              }
                            } else {
                              return "Enter valid Email";
                            }
                          } else {
                            return "Enter valid Contact Number";
                          }
                        } else {
                          return "Enter valid Years of operation at current location";
                        }
                      } else {
                        return "Enter valid district";
                      }
                    } else {
                      return "Enter valid state";
                    }
                  } else {
                    return "Enter valid Marital Status";
                  }
                } else {
                  return "Enter valid date of birth";
                }
              } else {
                return "Enter valid Pan number";
              }
            } else {
              return "Enter valid Address";
            }
          } else {
            return "Enter valid Father Name";
          }
        } else {
          return "Enter valid last Name";
        }
      } else {
        return "Enter valid First Name";
      }
    }
  }

  // print_r($_POST);
  // print_r($_FILES); exit();
  $patner = new PatnerRegistration($_POST, $_FILES);
  $first_validate = $patner->validate();
  if (is_bool($first_validate)) {
    $second_validate = $patner->update();
    if (is_bool($second_validate)) {
      header('location:New_Partner_Request.php?msg=success');
    } else {
      $errorMsg = $second_validate;
    }
  } else {
    $errorMsg = $first_validate;
  }
}

// print_r($agent_data);
// print_r($bank_data);
// print_r($reference_data);

$stateList = array();
$user_id = '';
if(!empty($_GET) && isset($_GET['id']) && !empty($_GET['id']) ){  
  $user_id=$_GET['id'];
  $select_state_list="SELECT id,state from states";
  $stmt=$conn->prepare($select_state_list);
  $stmt->execute();
  $result=$stmt->get_result();
  while($row=$result->fetch_row()){
     $select_district="SELECT district from districts where state_id=?";
     $stmt1= $conn->prepare($select_district);
     $stmt1->bind_param('i',$row[0]);
     $stmt1->execute();
     $result1= $stmt1->get_result();
     $districtList=array();
     while($row1=$result1->fetch_row()){
        array_push($districtList,$row1[0]);
     }
     $stateList+=array($row[1]=>$districtList);  
  }
}
else{
  echo "<h1>Invalid URL </h1>";
  exit();
}



?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sales Partner Application Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <style>
    #top_box {
      height: 70px;
      background-color:white;
    }

    #logo {
      margin-top: 15px;
    }

    body {
      font-family: 'Raleway', sans-serif;
      background-color: white;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    h3,
    h5 {
      font-weight: bold;
    }

    .s_pg {
      margin-top: 30%;
      font-weight: 1000;
      font-size: 20px;
    }

    .sym {
      margin-left: 40%;
      font-size: 80px;
    }
    .label{
        line-height:16px;
    }
  </style>
</head>

<body>

  <div id='top_box' class='container'>
    <a href="https://www.gogagaholidays.com" style='float:right;'><img src="assets\images\logo_1.png" alt="Company Logo" id='logo' width="160px"></a>
   
  </div>


  <div class="card mt-4 mb-4 container">
    <div class="card-header bg-white">
      <h3>Edit Partner Details</h3>
      <p class='label'><small>Hey there! We're excited to see you interested in partnering with us. <br>Please do fill in the details below to help us know you a little better.<i> Almost all the fields are required!</i></small></p>
      <p class="text-danger"><?php echo $errorMsg; ?></p>

    </div>

    <div class="card-body ">

      <form class="" style="font-size:16px; " action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        <div class="border shadow-sm m-2 mt-4 mb-4 p-3 row">
          <h5>Personal Details</h5>
          <hr>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="fn">First Name:</label>
            <input type="text" name="fname" id='fn' class='form-control form-control-sm' value="<?php echo $agent_data['firstname']; ?>"  placeholder='' required>
          </div>

          <div class="col-lg-6 mt-2 mb-2">
            <label for="ln">Last Name:</label>
            <input type="text" name="lname" id='ln' class='form-control form-control-sm' value="<?php echo $agent_data['lastname']; ?>" placeholder='' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="add">Father's Name:</label>
            <input type="text" name="father_name" id='fn' class='form-control form-control-sm' value="<?php echo $agent_data['fathername']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="addr">Residential Address:</label>
            <textarea name="addr" id='addr' cols="" rows="1" class="form-control form-control-sm" required><?php echo $agent_data['address']; ?></textarea>

          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="pan">PAN number:</label>
            <input type="text" name="pan" id='pan' class='form-control form-control-sm' value="<?php echo $agent_data['panNumber']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="bday">Date Of Birth:</label>
            <input type="date" name="dob" id='bday' class='form-control form-control-sm' value="<?php echo $agent_data['dateOfBirth']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ms">Marital Status:</label>
            <input type="text" name="m_st" id='ms' class='form-control form-control-sm' value="<?php echo $agent_data['maritalStatus']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="district">Select State of Operation:</label>
            <select class="form-select form-select-sm" name="state" id='t_state' required>
              <option value="">Select</option>
            </select>
          </div>
          <div class=" col-lg-6 mt-2 mb-2">
            <label for="district">Select District of Operation:</label>
            <select class="form-select form-select-sm" name="district" id='t_district' required>
              <option value="">Select</option>

            </select>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="op">Years of operation at current location:</label>
            <input type="text" name="yop" id='op' class='form-control form-control-sm' value="<?php echo $agent_data['yearOfExperience']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="contact">Contact Number:</label>
            <input type="text" name="c_num" id='contact' class='form-control form-control-sm' value="<?php echo $agent_data['contactNumber']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="em">Email Address:</label>
            <input type="email" name="email" id='em' class='form-control form-control-sm' value="<?php echo $agent_data['email']; ?>" required>
          </div>

        </div>

        <!-- <div class="border shadow-sm m-2 mt-4 mb-4 p-3 row">

          <h5>Create Account</h5>
          <hr>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="em">Email Address:</label>
            <input type="email" name="email" id='em' class='form-control form-control-sm' required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="em">Create Password:</label>
            <input type="password" name="password" id='pass' class='form-control form-control-sm' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="em">Confirm Password:</label>
            <input type="password" name="confirm_password" id='cpass' class='form-control form-control-sm' required>
          </div>

        </div> -->


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Trade Details</h5>
          <hr>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tn">Trade Name:</label>
            <input type="text" name="t_name" id='tn' class='form-control form-control-sm' value="<?php echo $agent_data['tradeName']; ?>" required>
          </div>



          <div class=" col-lg-6 mt-2 mb-2">
            <label for="t_type">Trade Type:</label>
            <select class="form-select form-select-sm" name="trade_type" id='t_type' required>
              <option value="">Select</option>
              <option value="proprietory" <?php echo ("proprietory"==$agent_data['tradeType'])? "selected":"" ?> >Proprietory</option>
              <option value="partnership" <?php echo ("partnership"==$agent_data['tradeType'])? "selected":"" ?> >Partnership</option>
              <option value="public limited" <?php echo ("public limited"==$agent_data['tradeType'])? "selected":"" ?> >Public Limited</option>
              <option value="private limited" <?php echo ("private limited"==$agent_data['tradeType'])? "selected":"" ?> >Private Limited</option>
              <option value="others" <?php echo ("others"==$agent_data['tradeType'])? "selected":"" ?> >Other</option>
            </select>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="o_type">If Other, Please Specify:</label>
            <input type="text" name="otherTrade_type" id='otherTrade_type' value="<?php echo $agent_data['other']; ?>" class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tr_type">Type Of Trade:</label>
            <input type="text" name="types_of_type" id='tr_type' value="<?php echo $agent_data['typeOfTrade']; ?>" class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tr_add">Trade Address:</label>
            <textarea name="trade_addr" id='tr_add' class='form-control form-control-sm' required cols="30" rows="1"><?php echo $agent_data['tradeAddress']; ?></textarea>
          </div>


        </div>

        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Bank Details </h5>
          <hr>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_name">Bank Name:</label>
            <input type="text" name="bank_name" id='b_name' class='form-control form-control-sm' value="<?php echo $bank_data['bankName']; ?>" required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_add">Bank Address:</label>
            <input type="text" name="bank_addr" id='b_add' class='form-control form-control-sm' value="<?php echo $bank_data['bankAddress']; ?>" required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">Account Number:</label>
            <input type="text" name="account_num" id='ac_num' class='form-control form-control-sm' value="<?php echo $bank_data['accountNumber']; ?>" required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">IFSC Code:</label>
            <input type="text" name="ifsc" id='ac_num' class='form-control form-control-sm' value="<?php echo $bank_data['ifscCode']; ?>" required>
          </div>


        </div>

          <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Fee Payment Details </h5>
          <hr>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_name">Mode of Payment:</label>
            <select class="form-select form-select-sm" name="mode_payment" id='t_type' required>
              <option value="">Select</option>
              <option value="Cheque" <?php echo ("Cheque"==$agent_data['payment_mode'])? "selected":"" ?> >Cheque</option>
              <option value="Demand Draft" <?php echo ("Demand Draft"==$agent_data['payment_mode'])? "selected":"" ?> >Demand Draft</option>
              <option value="Cash By Depositing in Company Account" <?php echo ("Cash By Depositing in Company Account"==$agent_data['payment_mode'])? "selected":"" ?> >Cash By Depositing in Company Account</option>
            </select>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_add">Cheque/DD/Payment Slip Number:</label>
            <input type="text" name="slipNumber" id='b_add' class='form-control form-control-sm' value="<?php echo $agent_data['slip_number']; ?>" required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">Date Of Transaction:</label>
            <input type="date" name="transcation_date" id='ac_num' class='form-control form-control-sm' value="<?php echo $agent_data['transaction_date']; ?>" required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">Credit Card Number:</label>
            <input type="text" name="credit_card_number" id='ac_num' class='form-control form-control-sm' value="<?php echo $agent_data['credit_card_no']; ?>" required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">Issuing Bank:</label>
            <input type="text" name="issue_bank" id='ac_num' class='form-control form-control-sm' value="<?php echo $agent_data['issue_bank']; ?>" required>
          </div>


        </div>


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Other Details</h5>
          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ref_name">Reference Name:</label>

            <small>( Someone we can get in touch with when we can't reach you! )</small>
            <input type="text" name="reference_name" id='ref_name' value="<?php echo $reference_data['referenceName']; ?>" class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ref_num">Reference Contact Number:</label>
            <input type="text" name="reference_num" id='ref_num' value="<?php echo $reference_data['referencePhoneNumber']; ?>" class='form-control form-control-sm'>
          </div>

        </div>


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">
          <h5>Upload Photo(Optional)</h5>

          <div class=" col-lg-6 mt-2 mb-2">

            <input type="file" name="photo_pic" id='pass_p' class='form-control form-control-sm'>
          </div>

        </div>


        <div class=" ms-3 col-md-12">

          <div class="d-flex flex-row justify-content-center mt-3">

            <div class="col-lg-4 me-4">
              <button type="submit" name="submit" class='form-control btn btn-primary'>Update</button>
            </div>

          </div>










      </form>


    </div>
  </div>





  <!-- <h5>Fee Payment Details</h5>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="b_name">Mode of Payment:</label>
                <select class="form-control" name="p_mode" id ='p_type' required>
                  <option value="none">Select Type</option>
                  <option value="Cheque">Cheque</option>
                  <option value="DD">Demand Draft</option>
                  <option value="Cash">Cash by Depositing In Company Account</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="slip_num">Cheque/DD/Payment Slip Number:</label>
                <input type="text" name="s_num" id = 'slip_num' class = 'form-control' placeholder='Enter Cheque/DD/PaymentSlip Number' required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="tr_dat">Date Of Transaction:</label>
                <input type="text" name="dot" id = 'tr_dat' class = 'form-control' placeholder='Enter date in DD/MM/YYYY' required>
              </div>
            </div>
            <p><small>For Credit Card Payments.</small></p>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="cr_card">Credit Card Number:</label>
                <input type="text" name="cr_num" id = 'cr_card' class = 'form-control' placeholder='Enter credit card number'>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="card_b">Issuing Bank:</label>
                <input type="text" name="ib_name" id = 'card_b' class = 'form-control' placeholder='Enter Bank Name'>
              </div>
            </div> -->





  <script>
    const stateObject = <?php echo json_encode($stateList); ?>;
    const stateName =  `<?php echo $agent_data['state']; ?>`;
    const districtName= `<?php echo $agent_data['district']; ?>`;
  </script>
  <script>
    const stateList = Object.keys(stateObject);
    const stateSelect = document.getElementById('t_state');
    const districtSelect = document.getElementById('t_district');
    let optionsHTML = `<option value="">Select state</option>`;
    stateList.forEach(element => {
      optionsHTML += `<option value="${element}" ${ (element==stateName)?"selected":"" } >${element}</option>`;
    })
    stateSelect.innerHTML = optionsHTML;

    const state = stateName;
      let optionsHTML1 = `<option value="">Select district</option>`;
      if (state !== '') {
        stateObject[state].forEach(element => {
          optionsHTML1 += `<option value="${element}" ${ (element==districtName)?"selected":"" } >${element}</option>`;
        })
      }
      districtSelect.innerHTML = optionsHTML1;

    stateSelect.addEventListener('change', () => {
      const state = stateSelect.value
      let optionsHTML1 = `<option value="">Select district</option>`;
      if (state !== '') {
        stateObject[state].forEach(element => {
          optionsHTML1 += `<option value="${element}" ${ (element==districtName)?"selected":"" } >${element}</option>`;
        })
      }
      districtSelect.innerHTML = optionsHTML1;
    });


    function openPopUp() {
      let doc = document.getElementById('popup');
      doc.style.display = 'block'
    }

    function closePopUp() {
      let doc = document.getElementById('popup');
      doc.style.display = 'none'
    }
    console.log("check status", stateObject);
    console.log("state=",stateName,"district=",districtName);
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>