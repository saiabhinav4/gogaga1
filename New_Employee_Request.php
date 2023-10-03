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
    if(isset($_POST["employeeType"]) && !empty($_POST["employeeType"])){
        if(isset($_POST["employeeType"]) && !empty($_POST["employeeType"])){
            if(isset($_POST["employeeType"]) && !empty($_POST["employeeType"])){
                $employeeType= $_POST['employeeType'];
                $employeeName= $_POST["employeeName"];
                $employeeEmail= $_POST["employeeEmail"];
                $msg="<pre>Dear Mr. $employeeName,

Greetings from Gogaga Holidays,
                
We take this opportunity to Congratulate you for Joining with our company as a $employeeType, as per the joining process we are sharing you our online link below which allows you to access our Employee Form to complete the joining formalities.
                
Please click here : EMPLOYEE FORM  
(https://docs.google.com/forms/d/e/1FAIpQLScgRqeUe4opoclSiYuwegZEoubU0esPzFe_qm4DFcbnUx6Tyg/formResponse )
                
For any assistance in filling the form please contact HR  @  +91 7670892848  hr@gogagaholidays.in of our Support Team.</pre>";
                if(triggerMail($employeeEmail,'Employee Regrestation',$msg)){
                    $successMsg='Email Sent Successfully'; 
                }
                else{
                    $errorMsg='Failed to Sent Email';
                }
            }
            else{
                $errorMsg='Must Enter Employee Email';
            }
        }else{
            $errorMsg='Must Enter Employee Name';
        }
    }else{
        $errorMsg='Must Select EmployeeType';
    }
}
?>


<div class="card">
    <div class="card-header d-flex flex-row justify-content-between">
        <div>
            <h4>New Employee Request</h4>
            <p class="<?php if($errorMsg){ echo "text-danger"; }else{ echo "text-success"; } ?>" style="margin:0"><?php if($errorMsg){ echo $errorMsg; }else{ echo $successMsg; } ?></p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Invite Employee
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Invite Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action='' method="POST">
                                <div>
                                    <label for="">Employee Type</label>
                                    <select name="employeeType" class="form-select mb-2" id="">
                                       <option value="" selected disabled>select</option>
                                       <option>Regional Manager-Sales & Business Development</option>
            <option>Area Manager-Sales & Business Development</option>
            <option>Sales Manager-Sales & Business Development</option>
            <option>Marketing Manager</option>
            <option>Marketing Executive</option>
            <option>HR Manager</option>
            <option>HR Executive</option>
            <option>Operations Executive-Indian Holidays</option>
            <option>Operations Executive-International Holidays</option>
            <option>Accounts Manager</option>
            <option>Accounts Executive</option>
            <option>Bookings Manager</option>
            <option>Bookings Executive</option>
            <option>Digital Marketing Manager</option>
            <option>Digital Marketing Executive</option>
            <option>Photoshop Designer</option>
            <option>Training Manager</option>
            <option>Training Executive</option>
            <option>Visa Processing Executive</option>
            <option>Travel Insurance Executive</option>
            <option>Forex Manager</option>
            <option>Forex Executive</option>
            <option>IT-Executive</option>
            <option>IT-Manager</option>
            <option>Operations Manager</option>
            <option>Head-Operations and Sales</option>
            <option>Territory Manager</option>
            <option>Business Development Executive</option>
            <option>Business Development Manager</option>
            <option>Sales Tele-caller</option>
            <option>Key Accounts Manager</option>
            <option>Driver</option>
            <option>Admin Executive</option>
            <option>Admin Manager</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="">Employee Name</label>
                                    <input type="text" name="employeeName" class="form-control mb-2">
                                </div>

                                <div>
                                    <label for="">Email</label>
                                    <input type="email" name="employeeEmail" class="form-control mb-2">
                                </div>

                                





                        </div>
                        <div class="modal-footer text-center">
                            <input type="submit" class="btn  btn-primary"  >
                            <!-- <button type="button" id="invite-employee-btn" class="btn  btn-primary" data-bs-toggle="popover" data-bs-title="Mail Format To be sent" data-bs-content="Dear Mr. Rajesh,

Greetings from Gogaga Holidays,

We take this opportunity to Congratulate you for Joining with our company as a Sales Manager, as per the joining process we are sharing you our online link below which allows you to access our Employee Form to complete the joining formalities.

Please click here : EMPLOYEE FORM  
(https://docs.google.com/forms/d/e/1FAIpQLScgRqeUe4opoclSiYuwegZEoubU0esPzFe_qm4DFcbnUx6Tyg/formResponse )

For any assistance in filling the form please contact HR  @  +91 7670892848  hr@gogagaholidays.in of our Support Team.">Send Mail</button> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>


    </div>

    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer card-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc">Partner Type</th>
                            <th class="sorting">Partner Name</th>
                            <th class="sorting">Partner Location</th>
                            <th class="sorting">Area Of Operation</th>
                            <th class="sorting">Date Of Request</th>
                            <th class="sorting">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row">
                            <td>Supplier</td>
                            <td>ABC Inc.</td>
                            <td>New York, NY</td>
                            <td>North America</td>
                            <td>2023-09-15</td>
                            <td>
                                <a href="Profile_Employee_View.php" class="btn btn-primary">View</a>
                                <button onclick="editAction()" class="btn btn-success">Edit</button>
                                <a href="Employee_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
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
                                <a href="Employee_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
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
                                <a href="Employee_Permissions.php"><button onclick="setPermissionAction()" class="btn btn-secondary">Set Permission</button></a>
                            </td>
                        </tr>
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