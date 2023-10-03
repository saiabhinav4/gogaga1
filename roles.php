<?php
$title = "Dashboard";
include "header.php";

if(isset($_POST['create'])){
    $role_name = $_POST['role'];
    $checkbox1 = $_POST['roles'];  
    $chk="";  
    foreach($checkbox1 as $chk1)  
    {  
        $chk .= $chk1.",";  
    }  
    
    $query = "INSERT INTO `roles`(`role`,`roles`,`on_date`) VALUES ('$role_name', '$chk',  '$date')";
    if(mysqli_query($conn, $query)){
        echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#checkModal").modal("show");
			});
		</script>';
        echo'
        <script>
        alert("New Role Created");
        </script>';
    }
    
}
?>

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Roles</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form action="" method="post">
                    <div class="card-body">
                        <h3 class="card-title">Create New Role</h3>
                        
                        <div class="form-control">
                        <input type="text" class="form-control" name="role" placeholder="Role" required/>
                        </div>
                        <br/>
                    <div class="row">
                       <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="roles[]" value="lead">Leads
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="lead">Packages
                             
                              
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="customers">Customers
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="agents">
                              Agents
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="accounts">
                              Accounts
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="crm">
                             CRM
                               </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="hrm">
                              HRM
                               </div>
                        </div>
                        </div>
                        <div class="form-group">
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="roles[]" value="teams">
                              Teams
                               </div>
                        </div>
                        </div>
                    </div>

                   <input type="submit" class="btn btn-primary" name="create" value="Create" />
                        
</form>
                    </div>
                </div>
                <div class="modal fade confirmModal" id="checkModal" tabindex="-1" aria-hidden="true">
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
                                    <h5>e-Mail sent to the Agent</h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="card-body">
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                            <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Role</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Modules </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Actions</th></tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM `roles`");
                                    while($row = mysqli_fetch_array($query)){
                                                ?>
                                        <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0"><?php echo$row['role'] ?></td>
                                        <td><?php echo$row['roles'] ?></td>
                                               
                                                
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        </table></div></div>
                                    </div>
        </div>
        <!-- end row -->

        
            </div><!-- end col -->

        </div>
        <!-- end row -->
        
   
<?php 
include "footer.php"
?>