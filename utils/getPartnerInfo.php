<?php



$user_id='';
$agent_data='';
$bank_data='';
$reference_data='';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $user_id=$_GET['id'];

    $patnerDetails_query="SELECT *  from user,partnerdetails,districts where user.user_id=partnerdetails.user_id and partnerdetails.district_id=districts.district_id  and  user.user_id=?;";
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

    $reference_query="SELECT referenceName, referencePhoneNumber from user,reference where user.user_id= reference.user_id and user.user_id=?;";
    $referencStmt= $conn->prepare($reference_query);
    $referencStmt->bind_param('i',$user_id);
    if($referencStmt->execute()){
        $result_ref= $referencStmt->get_result();
        $reference_data= $result_ref->fetch_assoc();
    }

}

?>