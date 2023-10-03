<?php
$title = "Dashboard";
include "header.php";
?>

<?php
ob_start();
include "config.php";

if(isset($_POST['reg']))
{
	 $leavetype=$_POST['leave'];
	 $desc=$_POST['desc'];
	 $maxdays = $_POST['max_days'];
     $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `leave_types` WHERE `Leave_type`='leavetype'"));
     if ($count != 0){ 
     	echo "<script>alert('Leave_type Already exist');</script>";
      }
      else{
        $query = "INSERT INTO `leave_types`(`Leave_type`, `Description`, `Max_days`) 
        VALUES ('$leavetype', '$desc', '$maxdays')";     

        if (mysqli_query($conn, $query)) {
            header("location: Leave_types.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

}
elseif(isset($_GET['delete_id'])) {
    
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM `leave_types` WHERE id='$delete_id'";
    if(mysqli_query($conn, $query)) {
        header("Location: leave_types.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



$host = "localhost";
$user = "root";
$password = "";
$db = "gogaga";

$connection = new mysqli($host, $user, $password, $db);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM `leave_types`";
$result = mysqli_query($conn, $query);


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Add Leave Type</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leaves</a></li>
                    <li class="breadcrumb-item active">Add leave_type</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Enter Leave details.</p>

                <form method="POST">
                    <div class="mb-3">
                        <label for="leave" class="form-label">Leave Type</label>
                        <input type="leave" class="form-control" id="leave" name="leave" placeholder="Leave Type" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="desc" name="desc" placeholder="Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="max_days" class="form-label">Maximum Days</label>
                        <input type="number" class="form-control" id="max_days" name="max_days" placeholder="Maximum Days" required>
                    </div>
                    
                    <button type="submit" name="reg" class="btn btn-primary">Add Leave</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">List Of Leave Types</h4>
        </div>

           
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>Leave Type</th>
                                        <th>Description</th>
                                        <th>Maximum Days</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["Leave_type"] . "</td>";
                                            echo "<td>" . $row["Description"] . "</td>";
                                            echo "<td>" . $row["Max_days"] . "</td>";
                                            echo "<td>
                                                    <a href='edit_leave.php?id=" . $row["id"] . "' class='btn btn-success'>
                                                        <i class='fas fa-edit'></i>
                                                    </a>
                                                    <a href='leave_types.php?delete_id=" . $row["id"] . "' class='btn btn-danger'>
                                                    <i class='fas fa-trash'></i> 
                                                </a>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No Leave Types found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
