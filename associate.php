<?php
include "config.php";
if(isset($_POST['submit'])){

    $user_id = $_POST['username'];
    $full_name = $_POST['full_name'];
    $father_name = $_POST['fname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $pan_number = $_POST['pan_number'];
    $adhaar_number = $_POST['adhaar_number'];
    $profession = $_POST['profession'];
    $no_of_profession = $_POST['no_of_profession'];
    $current_locations = $_POST['current_locations'];
    $district_operation = $_POST['district_operation'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $uploadDir = 'agent_profiles/';
    $uniqueName = uniqid() . '_' . $_FILES['profile_photo']['name'];
    $uploadFilePath = $uploadDir . $uniqueName;
    if (move_uploaded_file($tmpFilePath, $uploadFilePath)) {
        echo 'Image uploaded successfully!';
      } else {
        echo 'Failed to move uploaded file.';
      }

    $tmpFilePath = $_FILES['profile_photo']['tmp_name'];
    $sql = "INSERT INTO `lead_generators`(`user_id`, `full_name`, `father_name`, `dob`, `gender`, `pan_number`, `adhaar_number`, `profession`, `years_profession`, `current_location`, `dist_of_operation`, `address`, `city`, `district`, `state`, `profile_photo`, `on_date`) VALUES ('$user_id','$full_name', '$father_name', '$dob', '$gender', '$pan_number', '$adhaar_number', '$profession', '$no_of_profession', '$current_locations', '$district_operation', '$address', '$city', '$district',  '$state', '$uniqueName', '$today')";
    
   
      if(mysqli_query($conn, $sql)){
        $ag_ids = $ag->insert_id;
        mysqli_query($conn, "UPDATE `users` SET `pro_status`='1' WHERE `id` = $user_id");
        mysqli_query($conn, "INSERT INTO `agent_approval`(`agent_id`) VALUES ('$ag_ids')");
        header("Location:agent_profile.php");
        
      }

}