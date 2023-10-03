<?php
include "config.php";

if (isset($_POST['uploads'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if a file was uploaded without any errors
        if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
            $tempFile = $_FILES['excel_file']['tmp_name'];
            $newFileName = 'new_name.xlsx';  // Define the new file name here

            // Move the uploaded file to a new location with the desired name
            if (move_uploaded_file($tempFile, $newFileName)) {
                echo "File uploaded and renamed successfully.";
            } else {
                echo "Error: Unable to move uploaded file.";
            }
        } else {
            echo "Error: Invalid file uploaded.";
        }
    }
}
