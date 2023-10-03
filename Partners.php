<?php
$title = "Dashboard";
include "header.php"


?>

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Partner</h4>
                    <?php
                    $state = $_GET['state'];
                    if($state=='1'){?>
                        <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-check-all me-3 align-middle"></i><strong>Success</strong> - New Partner Activated
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                    <?php } else if($state=='2'){?>
                        <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-alert-outline align-middle me-3"></i><strong>Warning</strong> - Review Comments Mail sent to Partner
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                        <?php } ?>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Partner</a></li>
                            <li class="breadcrumb-item active">All</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">

                                    <button class='btn btn-outline-primary m-2' id='btn1' onclick='a()'>All Partners</button>
                                    <button class='btn btn-outline-primary m-2' id='btn2' onclick='b()'>Super Partners</button>
                                    <button class='btn btn-outline-primary m-2' id='btn3' onclick='c()'>Sales Partners</button>
                                    <button class='btn btn-outline-primary m-2' id='btn4' onclick='d()'>Lead Generator</button>

                                    <script> 
                                     function a(){
                                document.getElementById('a').classList.remove('d-none')
                                document.getElementById('b').classList.add('d-none')
                                document.getElementById('c').classList.add('d-none')
                                document.getElementById('d').classList.add('d-none')
                                

                            }
                            function b(){
                                document.getElementById('a').classList.add('d-none')
                                document.getElementById('b').classList.remove('d-none')
                                document.getElementById('c').classList.add('d-none')
                                document.getElementById('d').classList.add('d-none')
                                

                            }
                            function c(){
                                document.getElementById('a').classList.add('d-none')
                                document.getElementById('b').classList.add('d-none')
                                document.getElementById('c').classList.remove('d-none')
                                document.getElementById('d').classList.add('d-none')
                                
                            }
                            function d(){
                                document.getElementById('a').classList.add('d-none')
                                document.getElementById('b').classList.add('d-none')
                                document.getElementById('c').classList.add('d-none')
                                document.getElementById('d').classList.remove('d-none')
                                
                            }
                           
                        </script>
                                        <?php if($user_type !='Super Agent'){?>
                                        <h4 class="card-title text-end"><a href="invite_new.php" class="btn btn-primary">Invite Partner</a></h4>
                                          <?php } ?>  
                                    </div>
                                    <div class="card-body " id='a'>
                                        <h4>All Partners</h4>
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="Position: activate to sort column ascending">Partner Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 80px;" aria-label="Office: activate to sort column ascending">Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Mobile</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 110.2px;" aria-label="Start date: activate to sort column ascending">Active Since</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            
                                           <?php
                                           if($user_type == 'Super Agent'){
                                           $aid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` as u join agents as ag on ag.user_id = u.id where u.id='2' ")) ;
                                           $query = mysqli_query($conn, "SELECT * FROM `agents` WHERE `parent_agent`=".$aid['id']."");
                                           if(mysqli_num_rows($query) == '0'){?>
                                            <tr class="odd">
                                                <td colspan="6" style="text-align:center">No Partners</td>
                                            </tr>
                                           <?php }else{

                                           }
                                           }else if($user_type == 'Agent'){
                                            header("Location:agent_view.php?uid=$user_id");
                                           }else{
                                            $query = mysqli_query($conn, "SELECT * FROM `agents` as ag join users as us on us.id=ag.user_id join agent_approval as ap on ap.agent_id = ag.id WHERE ag.recycle='0'") ;
                                            while($rows = mysqli_fetch_array($query)){   
                                           
                                           ?>
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?php echo $rows['fname'].', '. $rows['lname'] ?></td>
                                                <td><?php echo $rows['user_type'] ?></td>
                                                <td><?php echo $rows['dist'] ?></td>
                                                <td><?php echo $rows['mob_num'] ?></td>
                                                <td><?php echo $rows['on_date'] ?></td>
                                                <td><?php 
                                                    $status_apps = $rows['app_status'];
                                                if($status_apps == '0'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-warning waves-effect waves-light">
                                                <i class="bx bx-error font-size-16 align-middle me-2"></i> Waiting</a>
                               
                                                <?php }  else if($status_apps == '1'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-success waves-effect waves-light m-2">Approved</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php }  else if($status_apps == '2'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-danger waves-effect waves-light m-2">Reviewed</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                           <?php } }?>
                                            
                                           </tbody>
                                        </table></div></div>
                                    </div>
                                </div>
                                <!-- end cardaa -->


                            
                                
                                    <div class="card-body d-none" id='b'>
                                        <h4>Super Partners</h4>
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="Position: activate to sort column ascending">Partner Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 80px;" aria-label="Office: activate to sort column ascending">Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Mobile</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 110.2px;" aria-label="Start date: activate to sort column ascending">Active Since</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            
                                           <?php
                                           if($user_type == 'Super Agent'){
                                           $aid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` as u join agents as ag on ag.user_id = u.id where u.id='2' ")) ;
                                           $query = mysqli_query($conn, "SELECT * FROM `agents` WHERE `parent_agent`=".$aid['id']."");
                                           if(mysqli_num_rows($query) == '0'){?>
                                            <tr class="odd">
                                                <td colspan="6" style="text-align:center">No Partners</td>
                                            </tr>
                                           <?php }else{

                                           }
                                           }else if($user_type == 'Agent'){
                                            header("Location:agent_view.php?uid=$user_id");
                                           }else{
                                            $query = mysqli_query($conn, "SELECT * FROM `agents` as ag join users as us on us.id=ag.user_id join agent_approval as ap on ap.agent_id = ag.id WHERE ag.recycle='0'") ;
                                            while($rows = mysqli_fetch_array($query)){   
                                           
                                           ?>
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?php echo $rows['fname'].', '. $rows['lname'] ?></td>
                                                <td><?php echo $rows['user_type'] ?></td>
                                                <td><?php echo $rows['dist'] ?></td>
                                                <td><?php echo $rows['mob_num'] ?></td>
                                                <td><?php echo $rows['on_date'] ?></td>
                                                <td><?php 
                                                    $status_apps = $rows['app_status'];
                                                if($status_apps == '0'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-warning waves-effect waves-light">
                                                <i class="bx bx-error font-size-16 align-middle me-2"></i> Waiting</a>
                               
                                                <?php }  else if($status_apps == '1'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-success waves-effect waves-light m-2">Approved</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php }  else if($status_apps == '2'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-danger waves-effect waves-light m-2">Reviewed</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                           <?php } }?>
                                            
                                           </tbody>
                                        </table></div></div>
                                    </div>
                                </div>

                                

                               
                                    <div class="card-body d-none" id='c'>
                                        <h4>Sales Partner</h4>
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="Position: activate to sort column ascending">Partner Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 80px;" aria-label="Office: activate to sort column ascending">Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Mobile</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 110.2px;" aria-label="Start date: activate to sort column ascending">Active Since</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            
                                           <?php
                                           if($user_type == 'Super Agent'){
                                           $aid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` as u join agents as ag on ag.user_id = u.id where u.id='2' ")) ;
                                           $query = mysqli_query($conn, "SELECT * FROM `agents` WHERE `parent_agent`=".$aid['id']."");
                                           if(mysqli_num_rows($query) == '0'){?>
                                            <tr class="odd">
                                                <td colspan="6" style="text-align:center">No Partners</td>
                                            </tr>
                                           <?php }else{

                                           }
                                           }else if($user_type == 'Agent'){
                                            header("Location:agent_view.php?uid=$user_id");
                                           }else{
                                            $query = mysqli_query($conn, "SELECT * FROM `agents` as ag join users as us on us.id=ag.user_id join agent_approval as ap on ap.agent_id = ag.id WHERE ag.recycle='0'") ;
                                            while($rows = mysqli_fetch_array($query)){   
                                           
                                           ?>
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?php echo $rows['fname'].', '. $rows['lname'] ?></td>
                                                <td><?php echo $rows['user_type'] ?></td>
                                                <td><?php echo $rows['dist'] ?></td>
                                                <td><?php echo $rows['mob_num'] ?></td>
                                                <td><?php echo $rows['on_date'] ?></td>
                                                <td><?php 
                                                    $status_apps = $rows['app_status'];
                                                if($status_apps == '0'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-warning waves-effect waves-light">
                                                <i class="bx bx-error font-size-16 align-middle me-2"></i> Waiting</a>
                               
                                                <?php }  else if($status_apps == '1'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-success waves-effect waves-light m-2">Approved</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php }  else if($status_apps == '2'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-danger waves-effect waves-light m-2">Reviewed</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                           <?php } }?>
                                            
                                           </tbody>
                                        </table></div></div>
                                    </div>
                                </div>



                                
                                    <div class="card-body d-none" id='d'>
                                        <h4>Lead Generator</h4>
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="Position: activate to sort column ascending">Partner Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 80px;" aria-label="Office: activate to sort column ascending">Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Mobile</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 110.2px;" aria-label="Start date: activate to sort column ascending">Active Since</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Status</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            
                                           <?php
                                           if($user_type == 'Super Agent'){
                                           $aid = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` as u join agents as ag on ag.user_id = u.id where u.id='2' ")) ;
                                           $query = mysqli_query($conn, "SELECT * FROM `agents` WHERE `parent_agent`=".$aid['id']."");
                                           if(mysqli_num_rows($query) == '0'){?>
                                            <tr class="odd">
                                                <td colspan="6" style="text-align:center">No Partners</td>
                                            </tr>
                                           <?php }else{

                                           }
                                           }else if($user_type == 'Agent'){
                                            header("Location:agent_view.php?uid=$user_id");
                                           }else{
                                            $query = mysqli_query($conn, "SELECT * FROM `agents` as ag join users as us on us.id=ag.user_id join agent_approval as ap on ap.agent_id = ag.id WHERE ag.recycle='0'") ;
                                            while($rows = mysqli_fetch_array($query)){   
                                           
                                           ?>
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?php echo $rows['fname'].', '. $rows['lname'] ?></td>
                                                <td><?php echo $rows['user_type'] ?></td>
                                                <td><?php echo $rows['dist'] ?></td>
                                                <td><?php echo $rows['mob_num'] ?></td>
                                                <td><?php echo $rows['on_date'] ?></td>
                                                <td><?php 
                                                    $status_apps = $rows['app_status'];
                                                if($status_apps == '0'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-warning waves-effect waves-light">
                                                <i class="bx bx-error font-size-16 align-middle me-2"></i> Waiting</a>
                               
                                                <?php }  else if($status_apps == '1'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-success waves-effect waves-light m-2">Approved</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php }  else if($status_apps == '2'){?>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-outline-danger waves-effect waves-light m-2">Reviewed</a>
                                                    <a href="agent_view.php?id=<?php echo $rows['agent_id'] ?>"  class="btn btn-primary waves-effect waves-light m-2">View Details</a>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                           <?php } }?>
                                            
                                           </tbody>
                                        </table></div></div>
                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div>
       
        
   
<?php 
include "footer.php"
?>