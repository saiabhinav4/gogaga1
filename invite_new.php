<?php
$title = "Dashboard";
include "header.php";
if(isset($_POST['send'])){
    
    $to = $_POST['to_email'];
    $type= $_POST['type'];
    
    /*Check email exist or not*/
    $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `email_queue` where mail_to = '$to' and mail_type='Invite'"));
    if($count =='1'){
        echo'<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Sent</strong> - Mail Already Sent
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
    $subject = "Re: Invition for Super Agent Regsitration";
    $message = "<b>Dear Sir,</b>";
    $message .= "<h1>Warm Greetings From Gogaga!</h1> <br/> Please click follow link to regsiter our portal <br/> <a href='https://qa.gogagacrm.com/registration.php?type=$type'>Registration</a>";
    $header = "From:info@gogagacrm.com \r\n";
    $header .= "Cc:hitechsanmugam@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail ($to,$subject,$message,$header);
    
    if( $retval == true ) {
       
       $mail_status = '1';
    }else {
       
       $mail_status = '2';
    }
    $query = mysqli_query($conn, "INSERT INTO `email_queue`(`mail_to`, `mail_type`, `mail_content`, `mail_status`, `mail_on`) VALUES ('$to', 'Invite', '$message', $mail_status', '$date')");
    }
}
?>

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Invite Agents</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agents</a></li>
                            <li class="breadcrumb-item active">Invite</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Invite Agent</h3>
                        <form action="" method="post">
                        <p class="card-text">Enter here your new agent e-Mail ID.</p>

                        <div class="form-control">
                            <select name="type" class="form-control">
                                <option selected>---Select Agent Type---</option>
                                <option value="a12656ddfer">Super Agent</option>
                                <option value="aupjfgtbhjnk">Agent</option>
                                <option value="aupleadhjnk">Lead Generator</option>

</select>
                        <input type="email" class="form-control" name="to_email" placeholder="e-Mail ID" />
</div>
                   
<input type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                                data-bs-target=".confirmModal" value="Send Invite" name="send" />
                                                                </form>
                    </div>
                </div>
                <div class="modal fade confirmModal" tabindex="-1" aria-hidden="true">
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
                                            <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">S.No</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Mail</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Status</th></tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php 
                                                $i = 1;
                                                $query = mysqli_query($conn, "SELECT * FROM `email_queue` WHERE `mail_type`='Invite'");
                                                while($rows = mysqli_fetch_array($query)){?>

                                                
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0"><?php

                                                 echo $i++; ?></td>
                                                <td><?php echo $rows['mail_to'] ?></td>
                                                <td><?php echo $rows['mail_status'] ?></td>
                                                
                                                
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