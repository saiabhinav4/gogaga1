<?php 
 
if(!empty($_POST)){
    
    $firstName='';
    $lastName='';
    $residentialAddress='';
    $panNo='';
    $dob='';
    $maritalStatus='';
    $districtOfOperation='';
    $yearOfOperation='';
    $contactNo='';
    $email='';
    $fatherName='';
    $tradeName='';
    $tradeType='';
    $otherSpecify='';
    $typeOfTrade='';
    $tradeAddress='';
    $bankName='';
    $bankAddress='';
    $accountNumber='';
    $ifscCode='';
    $paymentType='';
    $paymentDetail='';
    $dateOfTransaction='';
    $creditCardNumber='';
    $issuedBank='';
    $referenceName='';
    $referenceContactNo='';
    $picName='';
    if( isset($_POST["firstName"]) && !empty($_POST["firstName"])){
        if( isset($_POST["lastName"]) && !empty($_POST["lastName"])){
            if( isset($_POST["residentialAddress"]) && !empty($_POST["residentialAddress"])){
                if( isset($_POST["panNo"]) && !empty($_POST["panNo"])){
                    if(isset($_POST["dob"]) && !empty($_POST["dob"])){
                        if(isset($_POST["maritalStatus"]) && !empty($_POST["maritalStatus"])){
                            if( isset($_POST["districtOfOperation"]) && !empty($_POST["districtOfOperation"])){
                                if(isset($_POST["yearOfOperation"]) && !empty($_POST["yearOfOperation"])){
                                    if(isset($_POST["contactNo"]) && !empty($_POST["contactNo"])){
                                        if(isset($_POST["email"]) && !empty($_POST["email"])){
                                            if(isset($_POST["fatherName"]) && !empty($_POST["fatherName"])){
                                                $firstName=$_POST['firstName'];
                                                $lastName=$_POST['lastName'];
                                                $residentialAddress=$_POST['residentialAddress'];
                                                $panNo=$_POST['panNo'];
                                                $dob=$_POST['dob'];
                                                $maritalStatus=$_POST['maritalStatus'];
                                                $districtOfOperation=$_POST["districtOfOperation"];
                                                $yearOfOperation=$_POST['yearOfOperation'];
                                                $contactNo=$_POST['contactNo'];
                                                $email=$_POST['email'];  
                                            }
                                            else{
                                                $result=json_encode(array('error'=>'Must Enter Father Name'));
                                                header('Content-Type:application/json');
                                                echo $result; exit();
                                            }
                                        }
                                        else{
                                            $result=json_encode(array('error'=>'Must Enter Email'));
                                            header('Content-Type:application/json');
                                            echo $result; exit();
                                        }
                                    }
                                    else{
                                        $result=json_encode(array('error'=>'Must Enter Contact Number'));
                                        header('Content-Type:application/json');
                                        echo $result; exit();
                                    }
                                }
                                else{
                                    $result=json_encode(array('error'=>'Must Enter Years of operation at current location'));
                                    header('Content-Type:application/json');
                                    echo $result; exit();
                                }
                            }
                            else{
                                $result=json_encode(array('error'=>'Must Enter District of Operation'));
                                header('Content-Type:application/json');
                                echo $result; exit();
                            }
                        }
                        else{
                            $result=json_encode(array('error'=>'Must Enter Marital Status'));
                            header('Content-Type:application/json');
                            echo $result; exit();
                        }
                    }
                    else{
                        $result=json_encode(array('error'=>'Must Enter Date Of Birth'));
                        header('Content-Type:application/json');
                        echo $result; exit();
                    }
                }
                else{
                    $result=json_encode(array('error'=>'Must Enter PAN Number'));
                    header('Content-Type:application/json');
                    echo $result; exit();
                }
            }
            else{
                $result=json_encode(array('error'=>'Must Enter Residential Address'));
                header('Content-Type:application/json');
                echo $result; exit();
            }
        }
        else{
            $result=json_encode(array('error'=>'Must Enter Last Name'));
            header('Content-Type:application/json');
            echo $result; exit();
        }
    }
    else{
        $result=json_encode(array('error'=>'Must Enter First Name'));
        header('Content-Type:application/json');
        echo $result; exit();
    }


    if(isset($_POST["tradeName"]) && !empty($_POST["tradeName"])){
        if(isset($_POST["tradeType"]) && !empty($_POST["tradeType"])){
            if(isset($_POST["otherSpecify"]) && !empty($_POST["otherSpecify"])){
                if(isset($_POST["typeOfTrade"]) && !empty($_POST["typeOfTrade"])){
                    if(isset($_POST["tradeAddress"]) && !empty($_POST["tradeAddress"])){
                        $tradeName=$_POST['tradeName'];
                        $tradeType=$_POST['tradeName'];
                        $otherSpecify=$_POST['otherSpecify'];
                        $typeOfTrade=$_POST['typeOfTrade'];
                        $tradeAddress=$_POST['tradeAddress'];
                    }
                    else{
                        $result=json_encode(array('error'=>'Must Enter Trade Address'));
                        header('Content-Type:application/json');
                        echo $result; exit();
                    }    
                }
                else{
                    $result=json_encode(array('error'=>'Must Enter Type Of Trade'));
                    header('Content-Type:application/json');
                    echo $result; exit();
                }
            }
            else{
                $result=json_encode(array('error'=>'Must Enter If Other, Please Specify'));
                header('Content-Type:application/json');
                echo $result; exit();
            }
        }   
        else{
            $result=json_encode(array('error'=>'Must Enter Trade Type'));
            header('Content-Type:application/json');
            echo $result; exit();
        }
    }
    else{
        $result=json_encode(array('error'=>'Must Enter Trade Name'));
        header('Content-Type:application/json');
        echo $result; exit();
    }



    if(isset($_POST["bankName"]) && !empty($_POST["bankName"])){
        if(isset($_POST["bankAddress"]) && !empty($_POST["bankAddress"])){
            if(isset($_POST["accountNumber"]) && !empty($_POST["accountNumber"])){
                if(isset($_POST["ifscCode"]) && !empty($_POST["ifscCode"])){
                      $bankName=$_POST['bankName'];
                      $bankAddress=$_POST['bankAddress']; 
                      $accountNumber=$_POST['accountNumber']; 
                      $ifscCode=$_POST['ifscCode'];
                }
                else{
                    $result=json_encode(array('error'=>'Must Enter IFSC Code'));
                    header('Content-Type:application/json');
                    echo $result; exit();
                } 
            }
            else{
                $result=json_encode(array('error'=>'Must Enter Account Number'));
                header('Content-Type:application/json');
                echo $result; exit();
            } 
        }
        else{
            $result=json_encode(array('error'=>'Must Enter Bank Address'));
            header('Content-Type:application/json');
            echo $result; exit();
        }  
    }
    else{
        $result=json_encode(array('error'=>'Must Enter Bank Name'));
        header('Content-Type:application/json');
        echo $result; exit();
    }    


    if(isset($_POST["paymentType"]) && !empty($_POST["paymentType"])){
        if(isset($_POST["paymentDetail"]) && !empty($_POST["paymentDetail"])){
            if(isset($_POST["dateOfTransaction"]) && !empty($_POST["dateOfTransaction"])){
                if(isset($_POST["creditCardNumber"]) && !empty($_POST["creditCardNumber"])){
                    if(isset($_POST["issuedBank"]) && !empty($_POST["issuedBank"])){
                        if(isset($_POST["referenceName"]) && !empty($_POST["referenceName"])){
                            if(isset($_POST["referenceContactNo"]) && !empty($_POST["referenceContactNo"])){
                                if(isset($_POST["uploadPic"]) && !empty($_POST["uploadPic"])){
                                    $paymentType=$_POST['paymentType'];
                                    $paymentDetail=$_POST['paymentDetail'];  
                                    $dateOfTransaction=$_POST['dateOfTransaction'];
                                    $creditCardNumber=$_POST['creditCardNumber'];  
                                    $issuedBank=$_POST['issuedBank'];
                                    $referenceName=$_POST['referenceName'];
                                    $referenceContactNo=$_POST['referenceContactNo'];
                                }   
                                else{
                                    $result=json_encode(array('error'=>'Must Enter Passport Size Photo'));
                                    header('Content-Type:application/json');
                                    echo $result; exit();
                                }   
                            }   
                            else{
                                $result=json_encode(array('error'=>'Must Enter Reference Contact Number'));
                                header('Content-Type:application/json');
                                echo $result; exit();
                            }   
                        }   
                        else{
                            $result=json_encode(array('error'=>'Must Enter Reference Name'));
                            header('Content-Type:application/json');
                            echo $result; exit();
                        }      
                    }   
                    else{
                        $result=json_encode(array('error'=>'Must Enter Issuing Bank'));
                        header('Content-Type:application/json');
                        echo $result; exit();
                    }   
                }   
                else{
                    $result=json_encode(array('error'=>'Must Enter Credit Card Number'));
                    header('Content-Type:application/json');
                    echo $result; exit();
                }   
            }
            else{
                $result=json_encode(array('error'=>'Must Enter Date Of Transaction'));
                header('Content-Type:application/json');
                echo $result; exit();
            }
        }
        else{
            $result=json_encode(array('error'=>'Must Enter Cheque/DD/Payment Slip Number'));
            header('Content-Type:application/json');
            echo $result; exit();
        }
    }
    else{
        $result=json_encode(array('error'=>'Must Enter Mode of Payment'));
        header('Content-Type:application/json');
        echo $result; exit();
    }


    //insert query.


}
else{
    $result=json_encode(array('error'=>'Somthing Went wront, re-submit the form'));
    header('Content-Type:application/json');
    echo $result; exit();
}

?>