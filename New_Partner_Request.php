<?php
$title = "Dashboard";
include "header.php";
include "config.php";
require_once "utils/mail.php";
?>

<?php 
$errorMsg='';
$successMsg='';
 if(!empty($_POST)){
    if(isset($_POST["partnerType"]) && !empty($_POST["partnerType"])){
        if(isset($_POST["partnerName"]) && !empty($_POST["partnerName"])){
            if(isset($_POST["partnerEmail"]) && !empty($_POST["partnerEmail"])){
                if(isset($_POST["partnerLocation"]) && !empty($_POST["partnerLocation"])){

                $partnerType= $_POST['partnerType'];
                $partnerName= $_POST["partnerName"];
                $partnerEmail= $_POST["partnerEmail"];
                $partnerLocation = $_POST["partnerLocation"];
                $queryString= http_build_query(array('type'=>$partnerType));
                $url=$hostname.'PartnerRegistration.php?'.$queryString;
                $msg="<pre>Dear Mr. $partnerName,

                Greetings from Gogaga Holidays,
                
                We take this opportunity to thank you for choosing to be our $partnerType for $partnerLocation - 1 as per the joining process we are sharing you our online link below which allows you to access our $partnerType Application Form to complete the joining formalities.
                
                Please click here : $partnerType APPLICATION FORM  ( $url )
                
                For any assistance in filling the form please contact Mr.Anil Ambarapu  @  +91 9885922067  @  anil.kumar@gogagaholidays.in  of our Support Team.
                
                With Regards,
                
                Support Team
                
                Gogaga Holidays Private Limited
                Modern Profound Tech Park, Ground Floor,
                White Field Road, Kondapur, Hyderabad, Telangana
                Mail:  support@gogagaholidays.in
                Web:  www.gogagaholidays.com
                
                Follow us:
                
                     
                _________________________________________
                The information in this email is confidential and may be privileged.
                If you are not the intended recipient, please destroy this message 
                and notify the sender immediately.
                ----------------------------------------------------------------------------------
                Gogaga Holidays Private Limited.
                Copy Right 2018 Policy | Privacy Policy | All Rights Reserved.</pre>";
                if(triggerMail($partnerEmail,'Partner Regrestation',$msg)){
                    $successMsg='Email Sent Successfully'; 
                }
                else{
                    $errorMsg='Failed to Sent Email';
                }
              }
              else{
                $errorMsg='Must Enter Partner Location';
              }
            }
            else{
                $errorMsg='Must Enter Partner Email';
            }
        }else{
            $errorMsg='Must Enter Partner Name';
        }
    }else{
        $errorMsg='Must Select Partner Type';
    }
}
?>

<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <div>
        <h4>New Partner Request</h4>
        <p class="<?php if($errorMsg){ echo "text-danger"; }else{ echo "text-success"; } ?>" style="margin:0"><?php if($errorMsg){ echo $errorMsg; }else{ echo $successMsg; } ?></p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Invite Partner
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Invite Partner</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div>
                                    <label for="">Partner Type</label>
                                    <select name="partnerType" class="form-select mb-2" id="">
                                       <option value="" selected disabled>select</option>
                                        <option value="Super Partner">Super Partner</option>
                                        <option value="Sales Partner">Sales Partner</option>
                                        <option value="Lead Generator">Lead Generator</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="">Partner Name</label>
                                    <input type="text" name="partnerName" class="form-control mb-2">
                                </div>

                                <div>
                                    <label for="">Email</label>
                                    <input type="email" name="partnerEmail" class="form-control mb-2">
                                </div>

                                <div>
                                    <label for="">Location</label>
                                    <input type="text"  name="partnerLocation" class="form-control mb-2">
                                </div>





                        </div>
                        <div class="modal-footer text-center">
                            <input type="submit"  class="btn  btn-primary" />
                            <!-- <button type="button" class="btn  btn-primary" data-bs-toggle="popover" data-bs-title="Mail Format To be sent" data-bs-content="Dear Mr. Madhu Babu,

Greetings from Gogaga Holidays,

We take this opportunity to thank you for choosing to be our Sales Partner for Vishakapatnam - 1 as per the joining process we are sharing you our online link below which allows you to access our Sales Partner Application Form to complete the joining formalities.

Please click here : SALES PARTNER APPLICATION FORM  ( https://gogagaholidays.in/partner_registrations/app_form_sp.html )

For any assistance in filling the form please contact Mr.Anil Ambarapu  @  +91 9885922067  @  anil.kumar@gogagaholidays.in  of our Support Team.

With Regards,

Support Team

Gogaga Holidays Private Limited
Modern Profound Tech Park, Ground Floor,
White Field Road, Kondapur, Hyderabad, Telangana
Mail:  support@gogagaholidays.in
Web:  www.gogagaholidays.com

Follow us:

     
_________________________________________
The information in this email is confidential and may be privileged.
If you are not the intended recipient, please destroy this message 
and notify the sender immediately.
----------------------------------------------------------------------------------
Gogaga Holidays Private Limited.
Copy Right 2018 Policy | Privacy Policy | All Rights Reserved.">Send Mail</button> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>


    </div>
    <?php 
       $isAgent=1;
       $isActive=0;
       $select_partnerRequests="SELECT user.user_id, firstname, lastname, address, dateOfRequest, userType, district  from user,partnerdetails,districts where user.user_id=partnerdetails.user_id and partnerdetails.district_id=districts.district_id  and  code IS NULL and isAgent = ? and isActive = ?;";
       $partnerRequest_Stmt= $conn->prepare($select_partnerRequests);
       $partnerRequest_Stmt->bind_param('ii',$isAgent,$isActive);
       if($partnerRequest_Stmt->execute()){
          $result_partner= $partnerRequest_Stmt->get_result();   
       } 

    ?>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer card-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc">Partner Type</th>
                            <th class="sorting">Partner Name</th>
                            <th class="sorting">Partner Address</th>
                            <th class="sorting">Area Of Operation</th>
                            <th class="sorting">Date Of Request</th>
                            <th class="sorting">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          if($result_partner->num_rows>0){ 
                            while($row=$result_partner->fetch_row()){  ?> 
                               <tr role="row">
                                 <td><?php echo $row[5]; ?></td>
                                 <td><?php echo $row[1].' '.$row[2]; ?></td>
                                 <td><?php echo $row[3]; ?></td>
                                 <td><?php echo $row[6]; ?></td>
                                 <td><?php echo $row[4]; ?></td>
                                 <td>
                                    <a href="Profile_Partner_view.php?id=<?php echo $row[0]; ?>" class="btn btn-primary">View</a>
                                    <button onclick="editAction()" class="btn btn-success">Edit</button>
                                    <a href="Partner_Permissions.php?id=<?php echo $row[0]; ?>" ><button class="btn btn-secondary"> Set Permission</button></a>
                                </td>
                              </tr>            
                    <?php    } 
                          }
                          else{  ?>
                            <tr>
                                <td colspan="6" style="text-align: center;" >No Records Found</td>
                            </tr>          
                    <?php  }
                        ?>
                        <!-- <tr role="row">
                            <td>Supplier</td>
                            <td>ABC Inc.</td>
                            <td>New York, NY</td>
                            <td>North America</td>
                            <td>2023-09-15</td>
                            <td>
                                <a href="Profile_Partner_view.php" class="btn btn-primary">View</a>
                                <button onclick="editAction()" class="btn btn-success">Edit</button>
                                <a href="Partner_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
                            </td>
                        </tr>
                        <tr role="row">
                            <td>Customer</td>
                            <td>XYZ Corp.</td>
                            <td>Los Angeles, CA</td>
                            <td>North America</td>
                            <td>2023-09-20</td>
                            <td>
                                <button onclick="viewAction()" class="btn btn-primary">View</button>
                                <button onclick="editAction()" class="btn btn-success">Edit</button>
                                <a href="Partner_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
                            </td>
                        </tr>
                        <tr role="row">
                            <td>Partner</td>
                            <td>PQR Ltd.</td>
                            <td>London, UK</td>
                            <td>Europe</td>
                            <td>2023-09-25</td>
                            <td>
                                <button onclick="viewAction()" class="btn btn-primary">View</button>
                                <button onclick="editAction()" class="btn btn-success">Edit</button>
                                <a href="Partner_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

<?php
$conn->close();
include "footer.php";
?>