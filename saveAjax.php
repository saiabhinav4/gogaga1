<?php
include "config.php";
$state  = $_GET['state'];

if( $state == 'assign'){
    $lead_id = $_POST['lead_id'];
    $staff_id = $_POST['staff_id'];
    $user_id = $_POST['user_id'];

    $sql = "UPDATE `leads` SET `assigned_to`='$staff_id',`assigned_on`='$date',`assigned_by`='$user_id',`status`='1' WHERE `lead_id`='$lead_id'";

}
else if($state == 'verifyLead'){

  $verify_by = $_POST['userID'];
  $lead_id = $_POST['leadID'];
  $verify_comments = $_POST['comments'];
  $customer_name = $_POST['customer_name'];
  $customer_number = $_POST['customer_number'];
  $destination = $_POST['destination'];
  $no_of_passengers = $_POST['no_of_passengers'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $raised_by = $_POST['raised_by'];
  $raised_number = $_POST['raised_number'];
  $partner_name = $_POST['partner_name'];
  $partner_location = $_POST['partner_location'];
  $partner_code = $_POST['partner_code'];
  $from_city = $_POST['from_city'];
  $depart_date = $_POST['depart_date'];
  $duration_of_stay = $_POST['duration_of_stay'];
  $adults = $_POST['adults'];
  $kids = $_POST['kids'];
  $hotels = $_POST['hotels'];
  $followup = $_POST['followup'];
  $fstatus = $_POST['fstatus'];
  
  $sql = "UPDATE `leads` SET `customer_name`='$customer_name',`customer_number`='$customer_number',`destination`='$destination',`no_of_passengers`='$no_of_passengers',`trip_start_date`='$start_date',`trip_end_date`='$end_date',`from_city`='$from_city',`stay_day`='$depart_date',`no_of_adults`='$adults',`no_of_childs`='$kids',`preferred_hotel`='$hotels',`raised_by`='$raised_by',`raised_number`='$raised_number',`partner_name`='$partner_name',`partner_location`='$partner_location',`partner_code`='$partner_code',`on_date`='$date',`status`='2',`verified_by`='$verify_by',`verified_comments`='$verify_comments' WHERE `lead_id`='$lead_id'";

  mysqli_query($conn, "INSERT INTO `crm_leads`(`lead_id`, `crm_type`, `lead_from`, `lead_by`, `followup`, `status`) VALUES ('$lead_id', 'Followup', 'Verification Lead', '$verify_by', '$followup', '$fstatus')");
  }  
  
else{


$customer_name = $_POST['customer_name'];
$customer_number = $_POST['customer_number'];
$destination = $_POST['destination'];
$no_of_passengers = $_POST['no_of_passengers'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$raised_by = $_POST['raised_by'];
$raised_number = $_POST['raised_number'];
$partner_name = $_POST['partner_name'];
$partner_location = $_POST['partner_location'];
$partner_code = $_POST['partner_code'];
$from_city = $_POST['from_city'];
$depart_date = $_POST['depart_date'];
$duration_of_stay = $_POST['duration_of_stay'];
$adults = $_POST['adults'];
$kids = $_POST['kids'];
$hotels = $_POST['hotels'];

$sql = "INSERT INTO `leads`(`customer_name`, `customer_number`, `destination`, `no_of_passengers`, `trip_start_date`, `trip_end_date`, `from_city`, `stay_day`, `no_of_adults`, `no_of_childs`, `preferred_hotel`, `raised_by`, `raised_number`, `partner_name`, `partner_location`, `partner_code`, `on_date`) VALUES ('$customer_name', '$customer_number', '$destination', '$no_of_passengers', '$start_date', '$end_date', '$from_city', '$duration_of_stay', '$adults', '$kids', '$hotels', '$raised_by', '$raised_number', '$partner_location', '$partner_location', '$partner_code','$date')";
}  


if (mysqli_query($conn, $sql)) {
  echo 'Data saved successfully';
} else {
  echo 'Error: ' . mysqli_error($conn);
  echo $sql;
}

mysqli_close($conn);

