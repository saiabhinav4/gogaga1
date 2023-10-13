<?php
$title = "Agent Profile";
include "header.php";

include 'utils/getEmployeeInfo.php';
// print_r($agent_data);
// print_r($bank_data);
// print_r($reference_data1);
// print_r($reference_data2);

// exit();
?>
<div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm order-2 order-sm-1">
                                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar-xl me-3">
                                                            <img src="" alt="" class="img-fluid rounded-circle d-block">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-16 mb-1"><?php echo $agent_data['firstname'].', '. $agent_data['lastname'] ?></h5>
                                                            <p class="text-muted font-size-13"><?php echo $agent_data['userType']?></p>

                                                            <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                <div>
                                                                <?php 
                                                    // $status_apps = $agent_data['app_status'];
                                                    if( empty($agent_data['code']) && $agent_data['isActive']==0 ){?>
                                                        <i class="mdi mdi-circle-medium me-1 text-warning align-middle"></i>Waiting
                                                        <?php } else{?>
                                                                        <i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Active<?php } ?></div>
                                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Joined : <?php echo $agent_data['dateOfRequest']?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-auto order-1 order-sm-2">
                                                <div class="d-flex align-items-start justify-content-end gap-2">
                                                    <div>
                                                        <button type="button" class="btn btn-success"><i class="me-1"></i> Edit</button>
                                                    </div>
                                                    <?php
                                                    // $user_type = $agent_data['user_type'];
                                                    // if($user_type == 'Super Agent' || 'Agent'){

                                                    // }else{?>

                                                    
                                                    <div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle show" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end show" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-129px, 42px);" data-popper-placement="bottom-end">
                                                            <?php 
                                                            // $status_apps = $agent_data['app_status'];
                                                                //  if($status_apps == '0'){?>
                                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</a></li>
                                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#reviewModal">Review</a></li>
                                                                <?php //} else{ ?>
                                                                <li><a class="dropdown-item" href="#">Replace</a></li>
                                                                <?php //} ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php // } ?>                   
                                                </div>
                                            </div> -->
                                        </div>
 <div>
                                            <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Standard modal</button> -->

                                            
                                            <!-- <div id="approveModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Approve</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="ag_id" class="form-control" value="<?php // echo $agent_data['agent_id'] ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="app_by" class="form-control" value="<?php // echo $username ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                   <textarea class="form-control" name="app_cmts" placeholder="Your Comments"></textarea><br/>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Approve</button>
                                                                </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div id="reviewModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Review</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="ag_id" class="form-control" value="<?php //echo $agent_data['agent_id'] ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" name="app_by" class="form-control" value="<?php //echo $username ?>" />
                                                                </div>
                                                                <div class="form-group">
                                                                   <select name="" class="form-control">
                                                                    <option selected>---Select Reason---</option>
                                                                    <option>Need More Documents</option>
                                                                    
                                                                </select><br/>
                                                                </div>
                                                                <div class="form-group">
                                                                   <textarea class="form-control" name="review_cmts" placeholder="Your Comments"></textarea><br/>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Review</button>
                                                                </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div> 
                                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">Personal / Trade Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab" aria-selected="false">Bank</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#next" role="tab" aria-selected="false">Education Details</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="tab-content">

                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        
                                    
                                            <table class="table table-bordered">
                                            <tr>
                                                <td >Name </td>
                                                <td><?php echo $agent_data['firstname'].' '.$agent_data['lastname']; ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Father Name </td>
                                                <td><?php echo $agent_data['fathername']; ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Address</td>
                                                <td><?php echo $agent_data['address']; ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>PAN</td>
                                                <td><?php echo $agent_data['panNumber']; ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Date of Birth</td>
                                                <td><?php echo $agent_data['dateOfBirth']; ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>designation</td>
                                                <td><?php echo $agent_data['designation'];  ?></td>
                                            </tr>

                                        </table>
                                        </div>   
                                  
                                    <!-- end tab pane -->
                                    <div class="tab-pane " id="next" role="tabpanel">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td >Highest Qualification</td>
                                                <td><?php echo $agent_data['high_qualif'];  ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Year in which you have qualified </td>
                                                <td><?php echo $agent_data['year_qualif'];  ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>percentage</td>
                                                <td><?php echo $agent_data['percentage'];  ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>School Name</td>
                                                <td><?php echo $agent_data['schoolName'];  ?></td>
                                                
                                            </tr>

                                            <tr>
                                                <td>marksheet Google Drive link</td>
                                                <td><?php echo $agent_data['marksheet'];  ?></td>
                                                
                                            </tr>

                                        </table>
                                        </div>


                                    <div class="tab-pane" id="about" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Bank Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    
                                                <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">
Bank Name :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                    
                                                            <p class="mb-2"><?php echo $bank_data['bankName'];  ?> Bank<br/>
                                                            </p>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">
Bank Branch :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                   
                                                                <p class="mb-2"><?php echo $bank_data['branchName']; ?><br/>
                                                            </p>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">
Account No :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                <p class="mb-2"><?php echo $bank_data['accountNumber']; ?><br/>
                                                            </p>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <h5 class="font-size-15">
IFSC Code :</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl">
                                                                <div class="text-muted">
                                                                <p class="mb-2"><?php echo $bank_data['ifscCode']; ?><br/>
                                                            </p>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        
                                        
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-3 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Team</h5>

                                        <div class="d-flex flex-wrap gap-2 font-size-16">
                                            <a href="#" class="badge badge-soft-primary">Team 1</a>
                                            
                                          
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Contact Details</h5>

                                        <div>
                                            <ul class="list-unstyled mb-0">
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-cellphone text-primary me-1"></i> <?php echo $agent_data['contactNumber']; ?></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-email text-primary me-1"></i> <?php echo $agent_data['email']; ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">References</h5>

                                        <div class="list-group list-group-flush">
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">James Nix</h5>
                                                            <p class="font-size-13 text-muted mb-0">Full Stack Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-thumbnail rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">Darlene Smith</h5>
                                                            <p class="font-size-13 text-muted mb-0">UI/UX Designer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm flex-shrink-0 me-3">
                                                        <div class="avatar-title bg-soft-light text-light rounded-circle font-size-22">
                                                            <i class="bx bxs-user-circle"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div>
                                                            <h5 class="font-size-14 mb-1">William Swift</h5>
                                                            <p class="font-size-13 text-muted mb-0">Backend Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
































<?php
include "footer.php";
?>