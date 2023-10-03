<?php
$title = "Dashboard";
include "header.php"


?>
<script>
    $(document).ready(function() {
        $(".assign").click(function() {
            $(".lead_id").val(this.id);
        })
    })
</script>
<div class="modal fade leadAssign" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <h5>Assign to Staff</h5>
                    <form id="assignStaff">
                        <div class="form-group">
                            <input type="text" class="form-control lead_id" name="lead_id" hidden /><br />
                            <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>" hidden /><br />
                        </div>
                        <div class="form-group">
                            <select name="staff_id" class="form-control">
                                <option selected>---Select Staff---</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM `employees`");
                                while ($sqls = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?php echo $sqls['id']; ?>"><?php echo $sqls['first_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Assign" />
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Leads</h4>

            <div class="page-title-right">


            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-end">
                <h4 class="card-title "> <a href="new_leads.php" class="btn btn-primary">Add Lead</a></h4>

            </div>
            <div class="card-body">
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised By</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raiser Contact</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                                    </tr>
                                </thead>


                                <tbody>


                                    <?php

                                    $query = mysqli_query($conn, "SELECT * FROM `leads`");
                                    while ($rows = mysqli_fetch_array($query)) {

                                    ?>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?php echo $rows['customer_name']; ?></td>
                                            <td><?php echo $rows['customer_number'] ?></td>
                                            <td><?php echo $rows['destination'] ?></td>
                                            <td><?php echo $rows['no_of_passengers'] ?></td>
                                            <td><?php echo $rows['trip_start_date'] . '<br>' . $rows['trip_end_date'] ?></td>
                                            <td><?php echo $rows['raised_by'] ?></td>
                                            <td><?php echo $rows['raised_number'] ?></td>
                                            <td>
                                                <?php
                                                $assigned_to = $rows['assigned_to'];
                                                $status = $rows['status'];
                                                if ($user_type != 'Agent') {
                                                    if ($assigned_to == '0' && $status == '0') {
                                                        echo '<input id="' . $rows['lead_id'] . '" type="button" class="btn btn-primary assign" data-bs-toggle="modal"
                                                                data-bs-target=".leadAssign" value="Assign To" />';
                                                    } else if ($assigned_to != '0' && $status == '1') {
                                                        echo '<a href="new_leads.php?id= ' . $rows['lead_id'] . '" class="btn btn-primary">Verify</a>';
                                                    } else if ($assigned_to != '0' && $status == '2') {
                                                        echo '<a href="new_itnerys.php?id= ' . $rows['lead_id'] . '" class="btn btn-success"> Proceed</a>';
                                                    }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div>
    <div class="modal fade assingModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="bx bx-check-circle display-4 text-success"></i>
                        </div>
                        <h5>Lead Assigned successfully</h5>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#assignStaff').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'saveAjax.php?state=assign',
                    data: formData,
                    success: function(response) {

                        console.log(response);
                        $('.assingModal').modal('show');
                        $('.leadAssign').modal('hide');
                        window.location.href = "leads.php";
                    }
                });
            });
        });
    </script>

    <?php
    include "footer.php"
    ?>