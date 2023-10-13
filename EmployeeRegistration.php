<!DOCTYPE html>
<?php

include 'config.php';

$errorMsg='';
$successMsg='';

if(!empty($_POST)){

    class EmployeeRegistration{
        private $firstName;
        private $lastName;
        private $fatherName;
        private $dateOfBirth;
        private $phoneNumber;
        private $email;
        private $password;
        private $address;
        private $designation;
        private $department;
        private $dateOfJoin;
        private $workLocation;
        private $isFresher;
        private $highQualification;
        private $yearOfQualified;
        private $percentage;
        private $institueName;
        private $marksheet;
        private $prevCompanyName;
        private $prevCompanyDesignation;
        private $prevCompanyManager;
        private $prevCompamyManagerCoNo;
        private $fromDate;
        private $toDate;
        private $shareExperence;
        private $bankName;
        private $bankBranch;
        private $accountNumber;
        private $ifscCode;
        private $panNumber;
        private $referenceName1;
        private $referencePhoneNo1;
        private $referenceName2;
        private $referencePhoneNo2;
        private $POST;
        public function __construct($post)
        {   
            $this->POST=$post;
        }

        public function insert(){
        global $conn;
        global $date;
        $userType="Employee";
        $isAgent=0;
        $userId='';
        $employee_id='';
        $select_existing_user="SELECT user_id from user where email like ?  or contactNumber like ?";
        $existing_user_stmt=$conn->prepare($select_existing_user);
        $existing_user_stmt->bind_param('ss',$this->email,$this->phoneNumber);
        $existing_user_stmt->execute();
        $result=$existing_user_stmt->get_result();
        if($result->num_rows==0){
            $insert_query="INSERT INTO user (
                firstname,
                lastname,
                fathername,
                address,
                dateOfBirth,
                contactNumber,
                email,
                dateOfRequest,
                userType,
                panNumber,
                password,
                isAgent
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
              $insert_stmt=$conn->prepare($insert_query);
              $insert_stmt->bind_param('sssssssssssi',$this->firstName,$this->lastName,$this->fatherName,$this->address,$this->dateOfBirth,$this->phoneNumber,$this->email,$date,$userType,$this->panNumber,$this->password,$isAgent);
              if($insert_stmt->execute()){
                $select_user_id_query="SELECT user_id from user where email like ?";
                $user_id_stmt= $conn->prepare($select_user_id_query);
                $user_id_stmt->bind_param('s',$this->email);
                if($user_id_stmt->execute()){
                    $result_id=$user_id_stmt->get_result();
                    if($result_id->num_rows==1){
                        $row=$result_id->fetch_row();
                        $userId=$row[0];
                        
                        $insert_bank_query="INSERT INTO bankdetails (bankName, branchName, accountNumber, ifscCode, user_id)
                        VALUES (?,?,?,?,?);";
                        $bankStmt= $conn->prepare($insert_bank_query);
                        $bankStmt->bind_param('ssssi',$this->bankName,$this->bankBranch,$this->accountNumber,$this->ifscCode,$userId);
                        if($bankStmt->execute()){ 
                            $insert_employee_details="INSERT INTO employeedetails(designation,high_qualif,year_qualif,dateOfJoin,work_location,isfresher,schoolName,percentage,marksheet,department_id,user_id)
                            VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                            $empoyee_detailsStmt= $conn->prepare($insert_employee_details);
                            $fresher=$this->isFresher=='no' ? 0:1;
                            $empoyee_detailsStmt->bind_param('ssississsii',$this->designation,$this->highQualification,$this->yearOfQualified,$this->dateOfJoin,$this->workLocation,$fresher,$this->institueName,$this->percentage,$this->marksheet,$this->department,$userId);
                            if($empoyee_detailsStmt->execute()){
                                $select_employee_id_query="SELECT employee_id from user,employeedetails where user.user_id=employeedetails.user_id AND email like ?;";
                                $employee_id_stmt= $conn->prepare($select_employee_id_query);
                                $employee_id_stmt->bind_param('s',$this->email);
                                if($employee_id_stmt->execute()){
                                    $result_emp_id=$employee_id_stmt->get_result();
                                    if($result_emp_id->num_rows==1){
                                        $row1=$result_emp_id->fetch_row();
                                        $employee_id= $row1[0];
                                        if($this->isFresher=='no'){
                                            $insert_prev_employment="INSERT INTO previousemployment(companyName,designation,managerName,managerContactNumber,fromDate,toDate,experience,employee_id)
                                            VALUES(?,?,?,?,?,?,?,?)";
                                            $prev_stmt=$conn->prepare($insert_prev_employment);
                                            $prev_stmt->bind_param('sssssssi',$this->prevCompanyName,$this->prevCompanyDesignation,$this->prevCompanyManager,$this->prevCompamyManagerCoNo,$this->fromDate,$this->toDate,$this->shareExperence,$employee_id);
                                            $prev_stmt->execute();
                                        }  
                                        
                                                $insert_references="INSERT INTO reference (referenceName, referencePhoneNumber, user_id)
                                                VALUES (?,?,?);"; 
                                                $referenceStmt= $conn->prepare($insert_references);
                                                $referenceStmt->bind_param('ssi',$this->referenceName1,$this->referencePhoneNo1,$userId);
                                                $referenceStmt->execute();
                                                
                                                $referenceStmt->bind_param('ssi',$this->referenceName2,$this->referencePhoneNo2,$userId);
                                                $referenceStmt->execute();

                                                return true;
                                                
                                            
                                        
                                    }
                                }
                            }
                        }
                    }
                }
              
            }
            return "Somthing went worng! please contact admin";
        }
        else{
            return "Already email or phone number is registered, please register with different once";
           }
    }

        public function validate(){
            if(isset($this->POST['fname']) && !empty($this->POST['fname'])){
                if(isset($this->POST['lname']) && !empty($this->POST['lname'])){
                    if(isset($this->POST['fathername']) && !empty($this->POST['fathername'])){
                        if(isset($this->POST['dateofbirth']) && !empty($this->POST['dateofbirth'])){
                            if(isset($this->POST['phone_num']) && !empty($this->POST['phone_num'])){
                                if(isset($this->POST['mail']) && !empty($this->POST['mail'])){
                                    if(isset($this->POST['password']) && !empty($this->POST['password'])){
                                        if(isset($this->POST['confirmPassword']) && !empty($this->POST['confirmPassword'])){
                                            if( $this->POST['password'] == $this->POST['confirmPassword'] ){
                                                if(isset($this->POST['address']) && !empty($this->POST['address'])){
                                                    if(isset($this->POST['designation']) && !empty($this->POST['designation'])){
                                                        if(isset($this->POST['department']) && !empty($this->POST['department'])){
                                                            if(isset($this->POST['joining_date']) && !empty($this->POST['joining_date'])){
                                                                if(isset($this->POST['fresher']) && !empty($this->POST['fresher'])){
                                                                    if(isset($this->POST['qualification']) && !empty($this->POST['qualification'])){
                                                                        if(isset($this->POST['qual_year']) && !empty($this->POST['qual_year'])){
                                                                            if(isset($this->POST['school']) && !empty($this->POST['school'])){
                                                                                if(isset($this->POST['link']) && !empty($this->POST['link'])){
                                                                                    if(isset($this->POST['bname']) && !empty($this->POST['bname'])){
                                                                                        if(isset($this->POST['branch']) && !empty($this->POST['branch'])){
                                                                                            if(isset($this->POST['acc_num']) && !empty($this->POST['acc_num'])){
                                                                                                if(isset($this->POST['ifsc']) && !empty($this->POST['ifsc'])){
                                                                                                    if(isset($this->POST['pan']) && !empty($this->POST['pan'])){
                                                                                                        if(isset($this->POST['ref1']) && !empty($this->POST['ref1'])){
                                                                                                            if(isset($this->POST['ref1_num']) && !empty($this->POST['ref1_num'])){
                                                                                                                if(isset($this->POST['ref2']) && !empty($this->POST['ref2'])){
                                                                                                                    if(isset($this->POST['ref2_num']) && !empty($this->POST['ref2_num'])){
                                                                                                                        if($this->POST['fresher']=="no"){
                                                                                                                            if(isset($this->POST['companyName']) && !empty($this->POST['companyName'])){
                                                                                                                                if(isset($this->POST['companyDesignation']) && !empty($this->POST['companyDesignation'])){
                                                                                                                                    if(isset($this->POST['managerName']) && !empty($this->POST['managerName'])){
                                                                                                                                        if(isset($this->POST['managerCNo']) && !empty($this->POST['managerCNo'])){
                                                                                                                                            if(isset($this->POST['fromdate']) && !empty($this->POST['fromdate'])){
                                                                                                                                                if(isset($this->POST['todate']) && !empty($this->POST['todate'])){
                                                                                                                                                    if(isset($this->POST['experience']) && !empty($this->POST['experience'])){
                                                                                                                                                        $this->prevCompanyName=$this->POST['companyName'];
                                                                                                                                                        $this->prevCompanyDesignation=$this->POST['companyDesignation'];
                                                                                                                                                        $this->prevCompanyManager=$this->POST['managerName'];;
                                                                                                                                                        $this->prevCompamyManagerCoNo=$this->POST['managerCNo'];
                                                                                                                                                        $this->fromDate=$this->POST['fromdate'];
                                                                                                                                                        $this->toDate=$this->POST['todate'];
                                                                                                                                                        $this->shareExperence=$this->POST['experience'];
                                                                                                                                                    }
                                                                                                                                                    else{
                                                                                                                                                        return "Enter valid Previous Company experience";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                else{
                                                                                                                                                    return "Enter valid Previous Company to date";
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            else{
                                                                                                                                                return "Enter valid Previous Company from date";
                                                                                                                                            } 
                                                                                                                                        }
                                                                                                                                        else{
                                                                                                                                            return "Enter valid Previous Company Manage Phone number";
                                                                                                                                        } 
                                                                                                                                    }
                                                                                                                                    else{
                                                                                                                                        return "Enter valid Previous Company Manage Name";
                                                                                                                                    }  
                                                                                                                                }
                                                                                                                                else{
                                                                                                                                    return "Enter valid Previous Company designation";
                                                                                                                                }  
                                                                                                                            }
                                                                                                                            else{
                                                                                                                                return "Enter valid Previous Company name";
                                                                                                                            }          
                                                                                                                        }

                                                                                                                        $this->firstName=$this->POST['fname'];
                                                                                                                        $this->lastName=$this->POST['lname'];
                                                                                                                        $this->fatherName=$this->POST['fathername'];
                                                                                                                        $this->dateOfBirth=$this->POST['dateofbirth'];
                                                                                                                        $this->phoneNumber=$this->POST['phone_num'];
                                                                                                                        $this->email=$this->POST['mail'];
                                                                                                                        $this->password=md5($this->POST['password']);
                                                                                                                        $this->address=$this->POST['address'];
                                                                                                                        $this->designation=$this->POST['designation'];
                                                                                                                        $this->department=$this->POST['department'];
                                                                                                                        $this->dateOfJoin=$this->POST['joining_date'];
                                                                                                                        $this->workLocation=$this->POST['location'];
                                                                                                                        $this->isFresher=$this->POST['fresher'];
                                                                                                                        $this->highQualification=$this->POST['qualification'];
                                                                                                                        $this->yearOfQualified=$this->POST['qual_year'];
                                                                                                                        $this->percentage=$this->POST['percentage'];
                                                                                                                        $this->institueName=$this->POST['school'];
                                                                                                                        $this->marksheet=$this->POST['link'];
                                                                                                                        $this->bankName=$this->POST['bname'];
                                                                                                                        $this->bankBranch=$this->POST['branch'];
                                                                                                                        $this->accountNumber=$this->POST['acc_num'];
                                                                                                                        $this->ifscCode=$this->POST['ifsc'];
                                                                                                                        $this->panNumber=$this->POST['pan'];
                                                                                                                        $this->referenceName1=$this->POST['ref1'];
                                                                                                                        $this->referenceName2=$this->POST['ref2'];
                                                                                                                        $this->referencePhoneNo1=$this->POST['ref1_num'];
                                                                                                                        $this->referencePhoneNo2=$this->POST['ref2_num'];

                                                                                                                        return true;
                                                                                                                    }       
                                                                                                                    else{
                                                                                                                        return "Enter vaild reference2 Contact number";
                                                                                                                    }
                                                                                                                }       
                                                                                                                else{
                                                                                                                    return "Enter vaild reference2 Name";
                                                                                                                }
                                                                                                            }       
                                                                                                            else{
                                                                                                                return "Enter vaild reference1 Contact number";
                                                                                                            }
                                                                                                        }       
                                                                                                        else{
                                                                                                            return "Enter vaild reference1 Name";
                                                                                                        }
                                                                                                    }       
                                                                                                    else{
                                                                                                        return "Enter vaild Pan number";
                                                                                                    }
                                                                                                }       
                                                                                                else{
                                                                                                    return "Enter vaild IFSC code";
                                                                                                } 
                                                                                            }       
                                                                                            else{
                                                                                                return "Enter vaild account number";
                                                                                            }  
                                                                                        }       
                                                                                        else{
                                                                                            return "Enter vaild Bank branch name";
                                                                                        }       
                                                                                    }       
                                                                                    else{
                                                                                        return "Enter vaild Bank name";
                                                                                    }      
                                                                                }       
                                                                                else{
                                                                                    return "Enter vaild marksheet drive link";
                                                                                } 
                                                                            }       
                                                                            else{
                                                                                return "Enter vaild intitue name";
                                                                            }  
                                                                        }       
                                                                        else{
                                                                            return "Enter vaild quanlify year";
                                                                        } 
                                                                    }       
                                                                    else{
                                                                        return "Select valid qualification";
                                                                    } 
                                                                }       
                                                                else{
                                                                    return "Select valid fresher option";
                                                                }  
                                                            }       
                                                            else{
                                                                return "Enter valid Joining Date";
                                                            }    
                                                        }   
                                                        else{
                                                            return "Select valid department";
                                                        }  
                                                    }   
                                                    else{
                                                        return "Select valid designation";
                                                    }  
                                                }   
                                                else{
                                                    return "Enter valid address";
                                                }  
                                            }
                                            else{
                                                return "Password Mismatched, please enter same password";
                                            }   
                                        }
                                        else{
                                            return "Enter valid confirm Password";
                                        }  
                                    }
                                    else{
                                        return "Enter valid Password";
                                    }  
                                }
                                else{
                                    return "Enter valid Email";
                                }     
                            }
                            else{
                                return "Enter valid Phone Number";
                            } 
                        }
                        else{
                            return "Enter valid Date of birth";
                        } 
                    }
                    else{
                        return "Enter valid Father Name";
                    } 
                }
                else{
                    return "Enter valid Last Name";
                }
            }
            else{
                return "Enter valid First Name";
            }
        }

    }

    // print_r($_POST);
    // exit();
    $employeeObj= new EmployeeRegistration($_POST);
    $isValid= $employeeObj->validate();
    if(is_bool($isValid)){
        $result= $employeeObj->insert();
        if(is_bool($result)){
            echo "<h1>Registration completed successfully</h1>";
            exit();
        }else{
            $errorMsg=$result;
        }
    }else{
        $errorMsg=$isValid;
    }

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
      background-color: white;
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
  </style>
</head>

<body>

<div id='top_box' class='container'>
    <a href="https://www.gogagaholidays.com" style='float:right;'><img src="assets\images\logo_1.png" alt="Company Logo" id='logo' width="160px"></a>
   
  </div>

  <div class="card mt-4 mb-4 container">
    <div class="card-header bg-white">
      <h3>Employee Joining Form</h3>
      <p><small>Hey there! We're excited to see you interested in partnering with us. <br>Please do fill in the details below to help us know you a little better. <br><i class="float-end text-danger"> Almost all the fields are required!</i></small></p>
      <p class="text-danger"><?php echo $errorMsg; ?></p>

    </div>


  <div class="row ">
    <div class="col-lg-12">
        <div class="">
            

            <div class="card-body">
                <form method="POST" action="" class="container">
                    <div id="form-step">
                        <div class="card p-3 mb-4">


                            <div class="text-center mb-4">
                                <i class="bx bx-user"></i>
                                <h5>Personal Details</h5>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="basicpill-lastname-input" name="lname" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Father Name</label>
                                        <input type="text" class="form-control" id="basicpill-phoneno-input" name="fathername" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="basicpill-phoneno-input" name="dateofbirth" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="basicpill-phoneno-input" name="phone_num" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-email-input" class="form-label">Email-id</label>
                                        <input type="text" class="form-control" id="basicpill-email-input" name="mail" required>
                                    </div>
                                </div>

                            </div>   
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="basicpill-phoneno-input" name="password" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-email-input" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="basicpill-email-input" name="confirmPassword" required>
                                    </div>
                                </div>

                            </div>    
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="basicpill-address-input" class="form-label">Address</label>
                                        <textarea class="form-control" id="basicpill-address-input" name="address" required></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>




                    <!-- Step 2: Work Details -->
                    <div class="card p-3 mb-4">
                        <div id="step2" class="form-step">
                            <div class="text-center mb-4">
                                <i class="bx bxs-city"></i>
                                <h5>Work Details</h5>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <?php 
                                            $select_designation="SELECT designation_id , designation from designation;";
                                            $designation_stmt= $conn->prepare($select_designation);
                                            $designation_stmt->execute();
                                            $result_desg=$designation_stmt->get_result();
                                        ?>
                                        <label for="basicpill-select-input" class="form-label">Designation</label>
                                        <select id="designation" name="designation" class="form-control" required>
                                        <option value="" selected disabled>select</option>
                                        <?php
                                            while($row1=$result_desg->fetch_row()){ ?>
                                                <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option> 
                                        <?php   }
                                        ?>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                <?php 
                                    $select_department="SELECT department_id, departmentName from department;";
                                    $department_stmt= $conn->prepare($select_department);
                                    $department_stmt->execute();
                                    $result_dept=$department_stmt->get_result();
                                ?>
                                    <div class="mb-3">
                                        <label for="basicpill-text-input" class="form-label">Department</label>
                                        <select id="department" name="department" class="form-control" required>
                                        <option value="" selected disabled>select</option>
                                        <?php
                                            while($row=$result_dept->fetch_row()){ ?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option> 
                                        <?php   }
                                        ?>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Date of Joining</label>
                                        <input type="date" class="form-control" id="basicpill-phoneno-input" name="joining_date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-text-input" class="form-label">work Location</label>
                                        <input type="text" class="form-control" id="basicpill-text-input" name="location" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card p-3 mb-4 mt-5">

                        <!-- Step 3: Previous Experience -->
                        <div id="step3" class="form-step">
                            <div class="text-center mb-4">
                                <i class="bx bxs-business"></i>
                                <h5>Previous Employment</h5>

                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="fresher-radio" class="form-label">Are you a fresher?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fresher" id="fresher-yes" value="yes" required>
                                            <label class="form-check-label" for="fresher-yes">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fresher" id="fresher-no" value="no" required>
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
                                            <label for="from-date-input" class="form-label">Previous Company Name</label>
                                            <input type="text" class="form-control" id="from-date-input" name="companyName">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="from-date-input" class="form-label">Designation</label>
                                            <input type="text" class="form-control" id="from-date-input" name="companyDesignation">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="from-date-input" class="form-label">Reporting Manager Name</label>
                                            <input type="text" class="form-control" id="from-date-input" name="managerName">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="from-date-input" class="form-label">Reporting Manager Contact No.</label>
                                            <input type="text" class="form-control" id="from-date-input" name="managerCNo">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="from-date-input" class="form-label">From Date</label>
                                            <input type="date" class="form-control" id="from-date-input" name="fromdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="to-date-input" class="form-label">To Date</label>
                                            <input type="date" class="form-control" id="to-date-input" name="todate">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="experience-input" class="form-label">Share your experience</label>
                                            <textarea class="form-control" id="experience-input" name="experience"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>


                    <script>
                        var fresherYesRadio = document.getElementById("fresher-yes");
                        var fresherNoRadio = document.getElementById("fresher-no");
                        var experienceFields = document.getElementById("experience-fields");

                        fresherYesRadio.addEventListener("change", function() {
                            if (this.checked) {
                                experienceFields.style.display = "none";
                            }
                        });

                        fresherNoRadio.addEventListener("change", function() {
                            if (this.checked) {
                                experienceFields.style.display = "block";
                            }
                        });
                    </script>


                    <div class="card p-3 mb-4 mt-5">


                        <!-- Step 4: Education -->
                        <div id="step4" class="form-step">
                            <div class="text-center mb-4">
                                <i class="bx bxs-graduation"></i>
                                <h5>Education</h5>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-select-input" class="form-label">Highest Qualification</label>
                                        <select id="qualification" name="qualification" class="form-control" required>
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
                                        <input type="text" class="form-control" id="basicpill-phoneno-input" name="qual_year" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-num-input" class="form-label">percentage</label>
                                        <input type="text" class="form-control" id="basicpill-num-input" name="percentage" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-text-input" class="form-label">Institute Name</label>
                                        <input type="text" class="form-control" id="basicpill-text-input" name="school" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="googleDriveLink">Share your marksheet Google Drive link</label>
                                        <input type="text" id="googleDriveLink" class="form-control" name="link" required>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>


                    


                    <div class="card p-3 mb-4 mt-5">
                        <!-- Step 6: Banking Details -->
                        <div id="step6" class="form-step">
                            <div class="text-center mb-4">
                                <i class="bx bxs-bank"></i>
                                <h5>Bank Details</h5>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="basicpill-cardno-input" class="form-label">Bank Name:</label>
                                        <input type="text" class="form-control" id="bname" name="bname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-cardno-input" class="form-label">Branch:</label>
                                        <input type="text" class="form-control" id="branch" name="branch" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="basicpill-card-verification-input" class="form-label">Account Number</label>
                                        <input type="text" class="form-control" id="accnumt" name="acc_num" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-expiration-input" class="form-label">
                                            IFSC Code:
                                        </label>
                                        <input type="text" class="form-control" id="ifsc" name="ifsc" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="basicpill-card-verification-input" class="form-label">PAN Number</label>
                                        <input type="text" class="form-control" id="pan" name="pan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card p-3 mb-4 mt-5">

                        <!-- Step 5: References -->
                        <div id="step5" class="form-step">
                            <div class="text-center mb-4">
                                <i class="bx bx-group"></i>
                                <h5>References</h5>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-fullname-input" class="form-label">Reference 1</label>
                                        <input type="text" class="form-control" id="basicpill-fullname-input" name="ref1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="basicpill-phoneno-input" name="ref1_num">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-fullname-input" class="form-label">Reference 2</label>
                                        <input type="text" class="form-control" id="basicpill-fullname-input" name="ref2" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="basicpill-phoneno-input" name="ref2_num">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-12 mt-4 ms-3  mb-2">
          <input type="checkbox" name="" id='tnc' class='form-check-input me-2' placeholder='Enter Bank Name' required>
          <label class='form-check-label' for="tnc">I hereby declare that the above statements made in my application form are true, complete and correct to the best of my knowledge and belief.</label>
        </div>
                    <div class="form-navigation text-center">

                        <button type="submit" class="submit btn btn-success m-4 ">Submit</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>