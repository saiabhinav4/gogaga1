<?php



$user_id='';
$agent_data='';
$bank_data='';
$reference_data1='';
$reference_data2='';
$prev_employment_data='';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $user_id=$_GET['id'];

    $patnerDetails_query="SELECT * from user,employeedetails where user.user_id=employeedetails.user_id and user.user_id=?;";
    $patnerDetailsStmt= $conn->prepare($patnerDetails_query);
    $patnerDetailsStmt->bind_param('i',$user_id);
    if($patnerDetailsStmt->execute()){
       $result_Details= $patnerDetailsStmt->get_result();
       $agent_data= $result_Details->fetch_assoc(); 
    }

    $bankDetails_query="SELECT bankName,bankAddress,branchName,accountNumber,ifscCode from user,bankdetails where user.user_id=bankdetails.user_id and user.user_id=?;";
    $bankDetailsStmt= $conn->prepare($bankDetails_query);
    $bankDetailsStmt->bind_param('i',$user_id);
    if($bankDetailsStmt->execute()){
        $result_bank= $bankDetailsStmt->get_result();
        $bank_data= $result_bank->fetch_assoc();
    }

    $reference_query="SELECT reference_id, referenceName, referencePhoneNumber from user,reference where user.user_id= reference.user_id and user.user_id=?;";
    $referencStmt= $conn->prepare($reference_query);
    $referencStmt->bind_param('i',$user_id);
    if($referencStmt->execute()){
        $result_ref= $referencStmt->get_result();
        $reference_data1= $result_ref->fetch_assoc();
        $reference_data2= $result_ref->fetch_assoc();

    }

    $prev_emp="SELECT * from previousemployment where employee_id=?";
    $prev_empstmt= $conn->prepare($prev_emp);
    $prev_empstmt->bind_param('i',$agent_data['employee_id']);
    if($prev_empstmt->execute()){
        $result_prev=$prev_empstmt->get_result();
        $prev_employment_data=$result_prev->fetch_assoc();
    }

}

?>