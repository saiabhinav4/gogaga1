<?php
$title = "Dashboard";
include "header.php";
include "config.php";

// Fetch packages data from the database
$sql = "SELECT * FROM packages";
$result = mysqli_query($conn, $sql);

?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          

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

<div class="row">
    <div class="col-md-12 w-100">
        <div class="card">
            <div class="card-header text-end">
                <div class="text-start">
                <h4 class="mb-sm-0 font-size-24">Packages</h4>
                </div>
                
                <a href="add_packages.php" class="btn btn-primary ">Add Package</a>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th>Package ID</th>
                            <th>Package Name</th>
                            <th>Destination</th>
                            <th>Duration</th>
                            <th>Cost per person</th>
                            <th>Validity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['package_id']; ?></td>
                                <td><?php echo $row['package_name']; ?></td>
                                <td><?php echo $row['destination']; ?></td>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['cost_per_person']; ?></td>
                                <td><?php echo $row['validity']; ?></td>
                                <td class='text-center'>
                                    <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="m-3"><i style='color:#334960' class="fa-solid fa-pen-to-square"></i></a>
                                    
                               
                                 <a href="#" class='m-3'><i class="fas fa-download" style="color:#334960"></i> </a>
                                 <a href='#' class='m-3'> <i class="fa-solid fa-trash-can"  style='color:#334960'> </i></a>
                                 </td>
                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>
