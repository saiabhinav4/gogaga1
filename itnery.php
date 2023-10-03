<?php
$title = "Dashboard";
include "header.php";



?>
<div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Itenery Request</h4>
                    
                    <div class="page-title-right">
                       
                        
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        
                                        
                                    </div>
<div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">All</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Pending</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">Submitted</span>   
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                                    <span class="d-none d-sm-block">Confirmed</span>    
                                                </a>
                                            </li>
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane" id="home-1" role="tabpanel">
                                                <p class="mb-0">
                                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                                        <thead>
                                                            <th>GHRN</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Destination</th>
                                                            <th>No. of Pas</th>
                                                            <th>Trip Dates</th>
                                                            <th>Working by</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $all =mysqli_query($conn, "SELECT * FROM `itnerys` ");
                                                            $rows = mysqli_num_rows($all);
                                                            if($rows !='0'){
                                                            while($al = mysqli_fetch_array($all)){

                                                            
                                                            ?>
                                                            <tr>
                                                                
                                                            </tr>
                                                            <?php }
                                                            }else{?>
                                                                <tr>
                                                                <td colspan="5">No Data</td>
                                                                </tr>
                                                            <?php  }            ?>
                                                        </tbody>
                                                    </table>
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="profile-1" role="tabpanel">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                                        <thead>
                                                            <th>GHRN</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Destination</th>
                                                            <th>No. of Pas</th>
                                                            <th>Trip Dates</th>
                                                            <th>Working by</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $all =mysqli_query($conn, "SELECT * FROM `itnerys` ");
                                                            $rows = mysqli_num_rows($all);
                                                            if($rows !='0'){
                                                            while($al = mysqli_fetch_array($all)){

                                                            
                                                            ?>
                                                            <tr>
                                                                
                                                            </tr>
                                                            <?php }
                                                            }else{?>
                                                                <tr>
                                                                <td colspan="5">No Data</td>
                                                                </tr>
                                                            <?php  }            ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <div class="tab-pane" id="messages-1" role="tabpanel">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                                        <thead>
                                                            <th>GHRN</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Destination</th>
                                                            <th>No. of Pas</th>
                                                            <th>Trip Dates</th>
                                                            <th>Working by</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $all =mysqli_query($conn, "SELECT * FROM `itnerys` ");
                                                            $rows = mysqli_num_rows($all);
                                                            if($rows !='0'){
                                                            while($al = mysqli_fetch_array($all)){

                                                            
                                                            ?>
                                                            <tr>
                                                                
                                                            </tr>
                                                            <?php }
                                                            }else{?>
                                                                <tr>
                                                                <td colspan="5">No Data</td>
                                                                </tr>
                                                            <?php  }            ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                            <div class="tab-pane active" id="settings-1" role="tabpanel">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" >
                                                        <thead>
                                                            <th>GHRN</th>
                                                            <th>Customer Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Destination</th>
                                                            <th>No. of Pas</th>
                                                            <th>Trip Dates</th>
                                                            <th>Working by</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $all =mysqli_query($conn, "SELECT * FROM `itnerys` ");
                                                            $rows = mysqli_num_rows($all);
                                                            if($rows !='0'){
                                                            while($al = mysqli_fetch_array($all)){

                                                            
                                                            ?>
                                                            <tr>
                                                                
                                                            </tr>
                                                            <?php }
                                                            }else{?>
                                                                <tr>
                                                                <td colspan="5">No Data</td>
                                                                </tr>
                                                            <?php  }            ?>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>

</div>
</div>
<script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

        <script src="assets/js/app.js"></script>