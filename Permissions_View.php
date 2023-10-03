<?php
$title = " Create New User";
include "header.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
table, th, td {
  border: none;
  padding: 10px;
}
table {
  border-spacing: 500px;
}
</style>
</head>
<body>
    

<div class="container ">
    <div class="row card">
        <div class="card-header">
            <h5>Permissions</h5>
            <button class="btn btn-success float-end">Edit</button>

        </div>

        


        <div class="card-body row">

        
        <div class="form-group col-lg-6 mb-5 mt-3" >
            <label for="roleName" class="font-size-14" >User Name</label>
            <input type="text" class="form-control" id="roleName"  value='sales' disabled placeholder="Enter User Name">
        </div>

        <script>
          
        function usertype(){
            let user_type= document.getElementById('User_Type_Select'); 
            let department= document.getElementById('department-drop-down'); 
            if(user_type.value=='Employee'){
                department.classList.remove('d-none');
            }
            if(user_type.value=='Partner'){
                department.classList.add('d-none');
            }
        }

        </script>
        <div class="form-group col-lg-6 mb-5 mt-3">
        <label for="roleName" class="font-size-14">User Type</label>
            <select name="" class="form-control" id="User_Type_Select" onchange="usertype()" value='sales' disabled>
                <option value=""  disabled>select </option>
                <option value="Partner">Partner</option>
                <option value="Employee" selected>Employee</option>
            </select>
            </select>
        </div>


        <div class="col-lg-6 d-none" id="department-drop-down">
                    <label for="">Department</label>
                    <select name="" class="form-select mb-2" id="department">
                        <option value="" selected disabled>select</option>
                        <option>Human Resource</option>
                        <option>Sales</option>
                        <option>Marketing</option>
                        <option>Operations-Indian Holidays</option>
                        <option>Operations-International Holidays</option>
                        <option>Bookings</option>
                        <option>Reservations</option>
                        <option>Accounts</option>
                        <option>VISA</option>
                        <option>Marketing-Designing</option>
                        <option>IT-Web Development</option>
                        <option>Training</option>
                        <option>Admin</option>
                        <option>Customer Support</option>
                        <option>Partner Support</option>
                    </select>
                </div>
            
<h3 class="mt-3 mb-3">Permissions</h3>
<fieldset disabled>


            <table class=" table table-bordered mt-3 mb-2">
            
                <!-- Leads -->
                <tr>
                    <th class="font-size-20 bg-soft-light">Leads</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Add Lead</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Proceed</label>
                        </div>
                    </td>

                </tr>
               
            <!-- Itineraries -->

                <tr>
                    <th class="font-size-20 bg-soft-light" rowspan="2">Itineraries</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input"  checked type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Add Request Form</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Submit</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Upload</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">View</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked type="checkbox" id="deleteLeads" value="delete">
                            <label class="form-check-label" for="deleteLeads">Delete</label>
                        </div>
                    </td>
                </tr>

            <!-- Itinerary Upload -->
                <tr>
                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Itinerary Upload</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Save</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Confirm</label>
                        </div>
                    </td>

                    

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Publish</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">QC</label>
                        </div>
                    </td>

                    
                </tr>
            <!-- Packages -->
                <tr >
                    <th class="font-size-20  bg-soft-light m-3">Packages</th>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Create</label>
                        </div>
                    </td>


                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">Edit</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Delete</label>
                        </div>
                    </td>

                </tr>
            <!-- Customers -->
                <tr >
                    <th class="font-size-20  bg-soft-light m-3">Customers</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked  type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">View</label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    

                </tr>
            <!-- Partners -->

            <tr >
                
                    <th class="font-size-20 bg-soft-light m-3">Partners</th>


                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" checked  type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">View </label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Edit </label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Replace </label>
                        </div>
                    </td>

                    
                </tr>



                 <!-- Payments -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Payments</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td> 
            </tr>




            

             <!-- Credit Notes -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Credit Notes</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input"checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Connect</label>
                    </div>
                </td>
                
            </tr>



             <!-- Reiumbersements -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Reiumbersements</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Approve</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Reject</label>
                    </div>
                </td>
                
            </tr>



            
             <!-- Receipts -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Receipts</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create </label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Edit </label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Ledger -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Ledger</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
            </tr>



            
             <!-- Vouchers -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Vouchers</th>

                

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Manage</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Download</label>
                    </div>
                </td>

                
                
            </tr>


            
             <!-- Partner Payouts -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Partner Payouts</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Publish</label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
            </tr>


            <!-- CIH -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">CIH</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
                
            </tr>


             <!-- P&L-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">P&L</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

               
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>
                
            </tr>

            <!-- Customer Support-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Customer Support</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Review</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Privileged </label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Voucher</label>
                    </div>
                </td>

                 
               
            </tr>


            <!-- Employees-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Employees</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td>
                
               
            </tr>


            <!-- Leaves-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Leaves</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Approve</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Reject</label>
                    </div>
                </td>
                
            </tr>

            <!-- Pay Roll -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Pay Roll</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input"  checked type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Upload</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Generate</label>
                    </div>
                </td>     
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>     
            </tr>

           

             <!-- Teams-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Teams</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

                 
                
            </tr>



             <!-- Suppliers-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Suppliers</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Disable</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Upload</label>
                    </div>
                </td>

         
            </tr>


             



             <!-- Escalations-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Escalations</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                
                
            </tr>



             <!-- Library-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Library</th>

               
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input"  checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Upload</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Reports-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Reports</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                
            </tr>



            
             <!-- Marketing-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Marketing</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Add </label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Create User-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> User Settings </th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                 <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Invite</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit </label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Reset Password</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Enable/Disable</label>
                    </div>
                </td>

                
                

                
            </tr>



            
             <!-- Masters-->

             <tr >
                
                <th class="font-size-20 bg-soft-light  m-3">Masters</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" checked type="checkbox" id="editLeads" value="edit" >
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>

                
            </tr>

            </table>

            </fieldset>

        </div>
    </div>
</div>

</body>
</html>



<?php
include "footer.php"
?>