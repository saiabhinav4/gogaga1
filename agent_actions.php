<?php
include "config.php";

if(isset($_POST['approve'])){
    $agent_id    = $_POST['ag_id'];
    $approved_by = $_POST['app_by'];
    $agent_location = $_POST['location'];
    $app_cmts  = $_POST['app_cmts'];
    $state = $_POST['state'];
    $dist = $_POST['district'];
    $locations = $_POST['location'];
    $commision = $_POST['commision'];
    $sub_agents = $_POST['sub_agents'];
    $team = $_POST['team_name'];

    $query = "UPDATE `agent_approval` SET `approved_by`='$approved_by',`approved_on`='$date', `approve_location`='$agent_location', `approve_cmts`='$app_cmts' WHERE `agent_id`='$agent_id'";
    if(mysqli_query($conn, $query)){
        mysqli_query($conn, "UPDATE `agents` SET `status`='1',`app_status`='1' WHERE `id`='$agent_id'");
        mysqli_query($conn, "INSERT INTO `agent_locations`(`agent_id`, `states`, `districts`, `locations`, `team`, `agencies`, `commision`, `on_date`) VALUES ('$agent_id', '$state', '$dist', '$locations','$team', '$sub_agents', '$commision', '$date')");
        header("Location:agents.php?state=1");





    }


}else if(isset($_POST['review'])){
    $agent_id    = $_POST['ag_id'];
    $reviewed_by = $_POST['app_by'];
    $rev_reason  = $_POST['rev_reason'];
    $rev_cmts  = $_POST['review_cmts'];

    $query = "UPDATE `agent_approval` SET `review_by`='$reviewed_by',`review_on`='$date', `review_cmts`='$review_cmts', `review_reason`='$rev_reason' WHERE `agent_id`='$agent_id'";
    if(mysqli_query($conn, $query)){
        mysqli_query($conn, "UPDATE `agents` SET `status`='2',`app_status`='2' WHERE `id`='$agent_id'");
        header("Location:agents.php?state=2");



    }
}
