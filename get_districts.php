<?php
include "config.php";
$selectedState = $_GET['state'];

// Perform a database query to fetch the districts based on the selected state
$districts = array();

if (!empty($selectedState)) {
    $sql = "SELECT * FROM districts WHERE state_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedState);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $districts[] = array(
            'district_id' => $row['district_id'],
            'district' => $row['district']
        );
    }

    $stmt->close();
}

// Close the database connection
$conn->close();

// Return the districts as a JSON response
header('Content-Type: application/json');
echo json_encode($districts);
exit;
?>
