<!DOCTYPE html>
<?php
include 'config.php';

$errorMsg = '';

if (!empty($_POST) && !empty($_FILES)) {

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
    private $photoPic;
    private $fileDestination;

    private $fieldArray;
    private $picFile;

    public function __construct($fieldArray, $picFile)
    {
      $this->fieldArray = $fieldArray;
      $this->picFile = $picFile;
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
                                                    if (isset($this->fieldArray['password']) && !empty($this->fieldArray['password'])) {
                                                      if (isset($this->fieldArray['confirm_password']) && !empty($this->fieldArray['confirm_password'])) {
                                                        if ($this->fieldArray['password'] === $this->fieldArray['confirm_password']) {
                                                          if (isset($this->fieldArray['userType']) && !empty($this->fieldArray['userType'])) {
                                                            $this->userType = $this->fieldArray['userType'];
                                                          } else {
                                                            $this->userType = '';
                                                          }
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
                                                          $this->password = md5($this->fieldArray['password']);

                                                          $fileName = $this->picFile['photo_pic']['name'];
                                                          $fileTmpName = $this->picFile['photo_pic']['tmp_name'];
                                                          $fileSize = $this->picFile['photo_pic']['size'];
                                                          $fileError = $this->picFile['photo_pic']['error'];
                                                          $fileType = $this->picFile['photo_pic']['type'];
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
                                                        } else {
                                                          return "Password Mismatched, please enter same password";
                                                        }
                                                      } else {
                                                        return "Enter confirm password";
                                                      }
                                                    } else {
                                                      return "Enter valid Password";
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


  $patner = new PatnerRegistration($_POST, $_FILES);
  $first_validate = $patner->validate();
  if (is_bool($first_validate)) {
    $second_validate = $patner->inserQuery();
    if (is_bool($second_validate)) {
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
        Thank You For Registering
      </div>
    </div>';
      exit();
    } else {
      $errorMsg = $second_validate;
    }
  } else {
    $errorMsg = $first_validate;
  }
}


$stateList = array();
$partnerType = '';
if(!empty($_GET) && isset($_GET['type'])){
  $partnerType = $_GET['type'];
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
      <h3><?php echo $partnerType; ?> Application Form</h3>
      <p class='label'><small>Hey there! We're excited to see you interested in partnering with us. <br>Please do fill in the details below to help us know you a little better.<i> Almost all the fields are required!</i></small></p>
      <p class="text-danger"><?php echo $errorMsg; ?></p>

    </div>

    <div class="card-body ">

      <form class="" style="font-size:16px; " action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="userType" value="<?php echo $partnerType ?>" />
        <div class="border shadow-sm m-2 mt-4 mb-4 p-3 row">
          <h5>Personal Details</h5>
          <hr>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="fn">First Name:</label>
            <input type="text" name="fname" id='fn' class='form-control form-control-sm' placeholder='' required>
          </div>

          <div class="col-lg-6 mt-2 mb-2">
            <label for="ln">Last Name:</label>
            <input type="text" name="lname" id='ln' class='form-control form-control-sm' placeholder='' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="add">Father's Name:</label>
            <input type="text" name="father_name" id='fn' class='form-control form-control-sm' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="addr">Residential Address:</label>
            <textarea name="addr" id='addr' cols="" rows="1" class="form-control form-control-sm" required></textarea>

          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="pan">PAN number:</label>
            <input type="text" name="pan" id='pan' class='form-control form-control-sm' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="bday">Date Of Birth:</label>
            <input type="date" name="dob" id='bday' class='form-control form-control-sm' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ms">Marital Status:</label>
            <input type="text" name="m_st" id='ms' class='form-control form-control-sm' required>
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
            <input type="text" name="yop" id='op' class='form-control form-control-sm' required>
          </div>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="contact">Contact Number:</label>
            <input type="text" name="c_num" id='contact' class='form-control form-control-sm' required>
          </div>

        </div>

        <div class="border shadow-sm m-2 mt-4 mb-4 p-3 row">

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

        </div>


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Trade Details</h5>
          <hr>

          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tn">Trade Name:</label>
            <input type="text" name="t_name" id='tn' class='form-control form-control-sm' required>
          </div>



          <div class=" col-lg-6 mt-2 mb-2">
            <label for="t_type">Trade Type:</label>
            <select class="form-select form-select-sm" name="trade_type" id='t_type' required>
              <option value="none">Select</option>
              <option value="proprietory">Proprietory</option>
              <option value="partnership">Partnership</option>
              <option value="public limited">Public Limited</option>
              <option value="private limited">Private Limited</option>
              <option value="others">Other</option>
            </select>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="o_type">If Other, Please Specify:</label>
            <input type="text" name="otherTrade_type" id='otherTrade_type' class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tr_type">Type Of Trade:</label>
            <input type="text" name="types_of_type" id='tr_type' class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="tr_add">Trade Address:</label>
            <textarea name="trade_addr" id='tr_add' class='form-control form-control-sm' required cols="30" rows="1"></textarea>
          </div>


        </div>

        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Bank Details </h5>
          <hr>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_name">Bank Name:</label>
            <input type="text" name="bank_name" id='b_name' class='form-control form-control-sm' required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="b_add">Bank Address:</label>
            <input type="text" name="bank_addr" id='b_add' class='form-control form-control-sm' required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">Account Number:</label>
            <input type="text" name="account_num" id='ac_num' class='form-control form-control-sm' required>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ac_num">IFSC Code:</label>
            <input type="text" name="ifsc" id='ac_num' class='form-control form-control-sm' required>
          </div>


        </div>


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">

          <h5>Other Details</h5>
          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ref_name">Reference Name:</label>

            <small>( Someone we can get in touch with when we can't reach you! )</small>
            <input type="text" name="reference_name" id='ref_name' class='form-control form-control-sm'>
          </div>


          <div class=" col-lg-6 mt-2 mb-2">
            <label for="ref_num">Reference Contact Number:</label>
            <input type="text" name="reference_num" id='ref_num' class='form-control form-control-sm'>
          </div>

        </div>


        <div class="border shadow-sm m-2 mb-4 mt-4 p-3 row">
          <h5>Upload Photo</h5>

          <div class=" col-lg-6 mt-2 mb-2">

            <input type="file" name="photo_pic" id='pass_p' class='form-control form-control-sm'>
          </div>

        </div>


        <div class=" col-lg-12 mt-4 ms-3  mb-2">
          <input type="checkbox" name="" id='tnc' class='form-check-input me-2' placeholder='Enter Bank Name' required>
          <label class='form-check-label' for="tnc">I Here By Declare That All The Above Information is True As Per My Knowledge</label>
        </div>


        <div class=" ms-3 col-md-12">

          <!-- Button trigger modal -->
          <input type="checkbox" name="" class='form-check-input me-2' placeholder='Enter Bank Name' required>

          <a type="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
            I accept the terms and conditions.
          </a>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Terms And Conditions</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="modal-body">
                    <h5 class="modal-title">SUBJECT OF THE AGREEMENT</h5><br>

                    <ul class="list-group">
                      <li class="list-group-item">The Parties Gogaga Holidays Pvt ltd (as Company) & a person /organization or any Individuals submitting this
                        form online and by paying joining fee will be Sales Partner hereby agree as follows:</li>
                      <li class="list-group-item">The Sales Partner is bound to the rules of the Company and his purpose is to promote & support all travel &
                        holiday related services defined by the company in the specified location time on time.</li>
                      <li class="list-group-item">Sales Partner shall be responsible for arranging / securing bookings of service (Holiday Packages/Flight
                        Tickets/Train & Bus Tickets/ all travel related services developed/ promoted by company and/or any of its
                        associates, employees) at such price and on such terms & conditions as may be stipulated in writing by the
                        Company from time to time. For the purposes of this agreement, any entity which is a holding company or a
                        subsidiary company or is otherwise directly or indirectly controlled by Company or any Individuals shall
                        deem to be an associate of Company.</li>
                      <li class="list-group-item">Along with this duly signed ONLINE agreement Sales Partner shall also submit a copy of his & his company
                        Permanent Account Number (PAN)/Address proof/Firm registration certificate/Bank account details (for credit
                        of sales payout).</li>
                      <li class="list-group-item">In case, Sales Partner wish to publish any advertisement or issue any pamphlet or literature relating to the
                        SERVICES of the Company, you shall ensure the same is in accordance with the standard terms issued by the
                        Company and you shall also seek prior written approval of the Company with respect to the text proposed to
                        be published in such advertisement / pamphlet / literature. Unless otherwise agreed.</li>

                      <li class="list-group-item">The Company will pay you service charges (commission) in Indian Currency, for the services for which booking
                        is received through you and your sales team, your representatives & any associates only on the fulfillment
                        of all the conditions herein below stated</li>
                      <li class="list-group-item">All the travel requests and services are done through your registered login id or raised through your
                        registered mail id.</li>
                      <li class="list-group-item">In case of online booking done through registered login id.</li>
                      <li class="list-group-item">You shall be reporting to Company or its representative and all your sales shall be routed through defined
                        process.</li>
                      <li class="list-group-item"> Sales Partner shall not assign any or all of your rights and obligations under this nomination to any
                        person/party.</li>
                      <li class="list-group-item">Any approval / authorization / clearance to be obtained by you from the Company under the terms and
                        conditions hereof, shall be addressed to and obtained in writing from company</li>
                      <li class="list-group-item">You will be held responsible for all cash collected directly by you or your representatives from the
                        customer, but however, can accept cheques which are drawn in favor of Company and cheques should invariably
                        with A/c payee crossing and should be handed over to Company or its authorized representative on the same
                        day without any time delay.</li>
                      <li class="list-group-item">To enable the Company to make the payment of service charges (commission) to you, you shall raise a bill
                        (invoice) on the Company for service charges within 5 days of receipt of the computerized intimation report
                        from the Company and the Company shall have maximum 10 days time from the date of receipt of your bill to
                        make such payment. The service charges (Commission) shall be inclusive of all the taxes levied by Government
                        of India, time by time. You shall ensure that the provisions of the Foreign Exchange Management act 1999 and
                        any other applicable laws, in so far they relate to mode of payment and acquisition of immovable property by
                        non-resident Indians and foreign nationals of Indian Origin are concerned are complied with if any.
                      </li>
                      <li class="list-group-item">Sales Partner shall not have right, title or interest of any nature whatsoever in the Company’s intellectual
                        property(s) and the use of any intellectual property of the Company by you as a part of text/material for
                        advertisement/pamphlet/literature shall not confer, assign, convey in your favor any right, title or
                        interest in such intellectual property.</li>
                      <li class="list-group-item">
                        You shall act/function in a manner which is not prejudicial to the interest of the Company in any way and
                        shall always be above board in your dealing with the Company and also with the customers. You shall maintain
                        highest courtesy and etiquette with the customers.</li>

                      <li class="list-group-item">The monthly sales calculation period for service / commission payout is between 1st day of every month to
                        last day of the month and all the sales happened on or before last day of every month will only be
                        considered for Monthly Payment of that amount and the “sale” clearly says that the total amount realized and
                        holiday confirmed (If the travel or its service is not completed on and before the last of the month the
                        payout will be considered in next cycle)</li>
                      <li class="list-group-item">In the event, in respect of any service booked through you, if there is a refund to customer in payment of
                        sale value to the Company, you shall be liable to return the service charges received by you for the said
                        service, failing which the Company shall be entitled without prejudice to other rights, to deduct the said
                        amount from any other funds of the Sales Partner available with the Company and/or from the service charges
                        (commission) payable to you for any other Service.</li>



                    </ul>


                    <h5 class="mt-3 mb-3">SUBJECT OF THE OTHER TERMS OF THIS AGREEMENT</h5>

                    <ul class="list-group">
                      <li class="list-group-item">In case, your nomination is terminated /cancelled due to any reason specified then, without prejudice to
                        other rights and remedies, which the Company may have, you shall be fully responsible for the all
                        consequences and damages.</li>
                      <li class="list-group-item">You shall strictly comply with the terms and conditions of this agreement. The terms and conditions herewith
                        can be reviewed/revised at the discretion of the company and the same shall be intimated to you.</li>
                      <li class="list-group-item">All or any disputes arising out of or touching upon or in relation to the terms of this agreement including
                        the interpretation and validity of the terms hereof and the respective rights and obligations shall be
                        settled amicably by mutual discussion failing which the same shall be settled through arbitration. The
                        arbitration shall be governed by the Arbitration and Conciliation Act, 1996 or any statutory
                        amendments/modifications thereof for the time being in force. The arbitration proceedings shall be held at
                        an appropriate location in Hyderabad by a sole arbitrator who shall be appointed by the Managing Director of
                        the Company and whose decision shall be final and binding upon the parties. The courts at Hyderabad alone
                        shall have the jurisdiction.</li>
                      <li class="list-group-item">This agreement does not and shall, in no event, be construed as guaranteeing any minimum
                        income/business/service charges to you.</li>
                      <li class="list-group-item">No failure or delay by the Company in exercising any right or power shall impair the same or operate as a
                        waiver of the same nor shall any single or partial exercise of any right or power preclude any further
                        exercise of the same or any other right or power.</li>

                    </ul>

                    <h5 class="mt-3 mb-3">SUPPORT OF THE COMPANY</h5>

                    <ul class="list-group">
                      <li class="list-group-item">To provide travel services & products to the Sales Partner or his customers through online & offline.</li>
                      <li class="list-group-item"> To provide the Sales Partner with sales & marketing designs and all necessary Information concerning to the travel services.</li>
                      <li class="list-group-item">To train the Sales Partner and mentor them on daily business activities.</li>
                      <li class="list-group-item">To guide the Sales Partner in all marketing & data generation activities.</li>
                    </ul>

                    <h5 class="mt-3 mb-3">TERMS OF BOOKINGS</h5>

                    <ul class="list-group">
                      <li class="list-group-item">Booking requests shall be made by sending in a complete itinerary format as defined by the company with full
                        details of the client by e-mail to service@gogagaholidays.in or by online submission through our portal
                        www.gogagaholidays.com.</li>
                      <li class="list-group-item">All reservations are subject to availability. The company is obliged to send a written confirmation or
                        refusal according to the Sales Partner within 48 hours of a previewed booking.</li>
                      <li class="list-group-item">The Company reserves the right to cancel the booking despite a written confirmation within 48hours without
                        giving a reason.</li>
                      <li class="list-group-item">The Company rejects the booking if the payment is not received on time as per clause 4.1 of cancellation
                        policy.</li>
                      <li class="list-group-item">The Company reserves the right to alter the travel services which does not affect the standard and
                        occupation.</li>
                      <li class="list-group-item">The Company will notify in writing by mail and obtain binding acceptance of this change from the Sales
                        Partner before selling the travel services</li>
                    </ul>

                    <h5 class="mt-3 mb-3">TERMS OF PAYMENT</h5>
                    <ul class="list-group">
                      <li class="list-group-item"><span class="fs-4 ">Departure after 15 days</span> <br> At the time of Confirmation: Token amount of 50% or as advised by the company need to be paid ( in case of
                        non-refundable flights in the package full amount of ticket is required) Within 12 hours of the token amount
                        remaining amount of ticket needs to be paid and tickets will be released (exception – Group departures
                        tickets are released min 5 days before departure) Land package to be cleared within 15 days before the
                        departure. (In case of non refundable hotels or few destinations or cruise bookings and all other products
                        full amount is required before the deadline mentioned - Rate of exchange difference applicable)</li>
                      <li class="list-group-item"><span class="fs-4 ">Departure within 15 days:</span> <br> At the time of Confirmation full amount is required within 48 hours of complete payment tickets and vouchers
                        will be released (exception – group departures). Any payment within the bracket of 10 days from departure
                        should not to be through cheque (other bank).</li>

                    </ul>

                    <h5 class="mt-3 mb-3">PAYMENT POLICY​</h5>

                    <ul class="list-group">
                      <li class="list-group-item">The above mentioned payment policy will not be considered in the case of peak season travel period or for few
                        travel destination i.e. Kashmir, Andaman, Kerala, Ladakh and Northeast etc.</li>
                      <li class="list-group-item">In that case you will be getting full / balance payment mail from operation team.</p>
                        <p>In case the Company is not getting the agreed amount from the Sales Partner his clients lose the right to use
                          the travel services
                      </li>
                      <li class="list-group-item">When making the payment The Sales Partner should indicate the particular travel services he wants to pay for
                        through his registered mail.</li>

                    </ul>

                    <h5 class="mt-3 mb-3">LIABILITY AND CHARGES</h5>

                    <ul class="list-group">
                      <li class="list-group-item">The Sales Partner must accept financial responsibility for all Cash transactions made under his name or hisaccount.</li>
                      <li class="list-group-item">If the Sales Partner cancels the reservation following cancellation rules are applied by Company</li>
                      <li class="list-group-item">30 Days or more before departure: 35% of the Total Cost</li>
                      <li class="list-group-item">30-15 Days Before departure: 85% of the Total Cost</li>
                      <li class="list-group-item">Less than 15 days before departure: 100% of the Total Cost</li>
                      <li class="list-group-item">Surcharges on Christmas and New Year period. Few destinations which overrules the below policy and come under100% cancellation.</li>
                      <li class="list-group-item">When Sales Partner cancels any reservation commission for this reservation does not take effect.</li>
                    </ul>

                    <h5 class="mt-3 mb-3">HIGHER FORCES</h5>

                    <ul class="list-group">
                      <li class="list-group-item">In the case of partial or complete breach of contract, caused by unforeseeable events such as fire, war,
                        natural disaster, or any other acts of God perils, as well as legal actions taken by the state, which may
                        have an impact on the fulfillment of the contract the parties, are not responsible for this agreement.
                      </li>
                      <li class="list-group-item">In the event of unforeseen forces the Company will not reimburses and this is on sole discretion of the
                          company not liable to any. </li>
                      <li class="list-group-item">The Party which is unable to fulfill its responsibilities because of the unforeseen forces is obliged to
                        inform the other party immediately but not later than 3 days from the moment the unforeseen forces has
                        occurred. Failure to inform the other Party about the unforeseen forces the agreement shall remain in full
                        forces and effect it does not release the liabilities for this agreement.</li>

                    </ul>
                    <p></p>
                    <p></p>

                    <h5 class="mt-3  mb-3">DURATION AND TERMINATION</h5>

                    <ul class="list-group">
                      <li class="list-group-item">The term of your nomination shall be One Year with effect from the date of application is filled and
                        submitted online. This agreement may be extended by the Company alone for further period of One Year at its
                        sole discretion by giving intimation in writing. If the agreement is not extended, it will expire on without
                        any notice considering a day before of the application submitted online.</li>
                      <li class="list-group-item">The Company may, without assigning any reason, terminate your nomination during the term of this nomination
                        letter by giving 30 days notice in writing or by mail to your registered mail id.</li>
                      <li class="list-group-item">Furthermore, the Company shall have right to terminate this nomination letter by giving 7 days notice in
                        writing if:-</li>
                      <li class="list-group-item">In Company’s opinion, you are engaged in activities, which are prejudicial to Company’s interest; or any
                        complaint is received by the Company against your conduct, while acting in pursuance of this nomination
                        letter; or You are in breach of any other terms & conditions of this nomination letter.</li>
                      <li class="list-group-item">Either party can also terminate this agreement with immediate effect when:</li>
                      <li class="list-group-item">The other party hasn’t fulfilled the duties of the agreement.</li>
                      <li class="list-group-item">One party has no means of payment or is declared bankrupt</li>
                      <li class="list-group-item">One party is found guilty or involved in any misleading and involved in-disciplinary or found guilty by law.</li>
                      <li class="list-group-item">Termination: In the event of sudden termination of this agreement under this or any other provision of this
                        agreement, there shall be no liability of any party to this Agreement, all financial means will be credited
                        the Company.</li>
                    </ul>



                    <h5 class="mb-3 mt-3">LEGAL JURISDICTION AND GOVERNING LAW</h5>

                    <ul class="list-group">
                      <li class="list-group-item">Alterations to this agreement have to be made in writing and signed by both parties to become valid. No oral
                        supplementary agreement is valid</li>
                      <li class="list-group-item">This Agreement shall be governed, construed, interpreted, and enforced in accordance with the Indian Laws.</li>
                      <li class="list-group-item">Any dispute or matters which arise between the Sales Partner and The Company will be dealt by the Court in
                        Hyderabad only.</li>
                    </ul>


                    <h5 class='mt-3 mb-3'>COMMISION DETAILS</h5>

                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="terms-bold">Products/Services</td>
                          <td class="terms-bold">Payout In %</td>
                        </tr>
                        <tr>
                          <th colspan="2" class="terms-bold">Conventional Products</th>
                        </tr>
                        <tr>
                          <td>Domestic Holidays</td>
                          <td><?php
                             if(strpos($partnerType,"Sales") !== false){
                                echo "10";
                             }
                             else if(strpos($partnerType,"Lead") !== false){
                                echo "5";
                             }
                             else if (strpos($partnerType,"Super")!==false){
                              echo "2";
                             }
                             else{
                              echo "NA";
                             }

                          ?></td>
                        </tr>
                        <tr>
                          <td>International Holidays</td>
                          <td>
                            <?php
                               if(strpos($partnerType,"Sales") !== false){
                                echo "10";
                             }
                             else if(strpos($partnerType,"Lead") !== false){
                                echo "5";
                             }
                             else if (strpos($partnerType,"Super")!==false){
                              echo "2";
                             }
                             else{
                              echo "NA";
                             }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th colspan="2" class="terms-bold">Tickets</th>
                        </tr>
                        <tr>
                          <td>Flights</td>
                          <td>NA</td>
                        </tr>
                        <tr>
                          <td>Trains</td>
                          <td>NA</td>
                        </tr>
                        <tr>
                          <td>Bus</td>
                          <td>NA</td>
                        </tr>
                        <tr>
                          <th colspan="2" class="terms-bold">Special Services</th>
                        </tr>
                        <tr>
                          <td>Cruise</td>
                          <td><?php 

                            if(strpos($partnerType,"Sales") !== false){
                                echo "2";
                             }
                             else if(strpos($partnerType,"Lead") !== false){
                                echo "2";
                             }
                             else if (strpos($partnerType,"Super")!==false){
                              echo "1";
                             }
                             else{
                              echo "NA";
                             }
                          
                          ?></td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="list-group">
                      <li class="list-group-item">All the itineraries are included with payouts and prices are not negotiable</p>
                      </li>
                      <li class="list-group-item">All the figures are on % basis on net sales</li>
                      <li class="list-group-item">Will be revised once the products are updated</li>
                      <li class="list-group-item">Special Discounts or offers will be updated from time to time</li>
                    </ul>


                  </div>


                </div>


              </div>

            </div>






          </div>

          <div class="d-flex flex-row justify-content-center mt-3">

            <div class="col-lg-4 me-4">
              <button type="submit" name="submit" class='form-control btn btn-primary'>Submit</button>
            </div>



            <div class=" col-lg-4">
              <button type="reset" name="res" class='form-control btn btn-danger'>Reset</button>
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
    const stateObject = <?php echo json_encode($stateList); ?>
  </script>
  <script>
    const stateList = Object.keys(stateObject);
    const stateSelect = document.getElementById('t_state');
    const districtSelect = document.getElementById('t_district');
    let optionsHTML = `<option value="">Select state</option>`;
    stateList.forEach(element => {
      optionsHTML += `<option value="${element}">${element}</option>`;
    })
    stateSelect.innerHTML = optionsHTML;

    stateSelect.addEventListener('change', () => {
      const state = stateSelect.value
      let optionsHTML1 = `<option value="">Select district</option>`;
      if (state !== '') {
        stateObject[state].forEach(element => {
          optionsHTML1 += `<option value="${element}">${element}</option>`;
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
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>