<?php
$title = "Dashboard";
include "header.php";
include "config.php";

$successMessage = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $packageCode = $_POST['package_code'];
    $packageName = $_POST['package_name'];
    $packageTheme = $_POST['package_theme'];
    $destination = $_POST['destination'];
    $stayCities = $_POST['stay_cities'];
    $duration = $_POST['duration'];
    $cost = $_POST['cost'];
    $validity = $_POST['validity'];

    // Handle the itinerary file upload
    $itineraryFile = $_FILES['pdf_upload'];
    $itineraryFileName = $itineraryFile['name'];
    $itineraryFilePath = 'uploads/' . $itineraryFileName;

    // Handle the cost sheet file upload
    $costSheetFile = $_FILES['cost_sheet_upload'];
    $costSheetFileName = $costSheetFile['name'];
    $costSheetFilePath = 'uploads/' . $costSheetFileName;

    // Move the uploaded files to the desired location
    if (
        move_uploaded_file($itineraryFile['tmp_name'], $itineraryFilePath) &&
        move_uploaded_file($costSheetFile['tmp_name'], $costSheetFilePath)
    ) {
        // Files uploaded successfully
        // Insert the data into the "packages" table
        $sql = "INSERT INTO packages (package_id, package_name, package_theme, destination, cities, duration, cost, validity, itinerary_file, cost_sheet_file) 
                VALUES ('$packageCode', '$packageName', '$packageTheme', '$destination', '$stayCities', '$duration', '$cost', '$validity', '$itineraryFileName', '$costSheetFileName')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Data inserted successfully
            $successMessage = "Package added successfully.";
        } else {
            // Error inserting data
            $successMessage = "Error: " . mysqli_error($conn);
        }
    } else {
        // Error uploading files
        $successMessage = "Error uploading files.";
    }
}

?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Packages</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Packages</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<?php if (!empty($successMessage)) : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $successMessage; ?>
    </div>
    <script>
        // Auto-hide the success message after 5 seconds
        setTimeout(function() {
            document.querySelector('.alert-success').style.display = 'none';
        }, 5000);
    </script>
<?php endif; ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Enter the Package details.</p>

                <form method="POST" class="row g-3" enctype="multipart/form-data">
                    <div class="col-4">
                        <label for="package_code" class="form-label">Package Code</label>
                        <input type="text" class="form-control" id="package_code" name="package_code" placeholder="Package Code" required>
                    </div>
                    <div class="col-4">
                        <label for="package_name" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Package Name" required>
                    </div>
                    <div class="col-4">
                        <label for="package_theme" class="form-label">Package Theme</label>
                        <input type="text" class="form-control" id="package_theme" name="package_theme" placeholder="Package Theme" required>
                    </div>

                    <div class="col-6">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination" required>
                    </div>
                    <div class="col-6">
                        <label for="stay_cities" class="form-label">Stay Cities</label>
                        <input type="text" class="form-control" id="stay_cities" name="stay_cities" placeholder="Stay Cities" required>
                    </div>
                    <div class="col-4">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" required>
                    </div>
                    <div class="col-4">
                        <label for="cost" class="form-label">Cost Per Person (Twin sharing)</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" required>
                    </div>
                    <div class="col-4">
                        <label for="validity" class="form-label">Validity</label>
                        <input type="date" class="form-control" id="validity" name="validity" placeholder="Validity" required>
                    </div>

                    <div class="col-6">
                        <label for="pdf_upload" class="form-label">Upload Itinerary</label>
                        <input type="file" class="form-control" id="pdf_upload" name="pdf_upload" required>
                    </div>
                    <div class="col-6">
                        <label for="cost_sheet_upload" class="form-label">Upload Cost Sheet</label>
                        <input type="file" class="form-control" id="cost_sheet_upload" name="cost_sheet_upload" required>
                    </div>

                    <div class="col-12 mt-5 text-center">
                        <button type="submit" name="reg" class="btn btn-primary">Add Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>