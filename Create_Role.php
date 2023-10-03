<?php
$title = " Roles";
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

        <div class="col-12 card-header " >
            <h3 style="color:#043c70"> Create New Role</h3>
        </div>
       

        <div class="card-body">
        <div class="form-group col-lg-6 mb-5 mt-3">
            <label for="roleName" class="font-size-20">Role Name</label>
            <input type="text" class="form-control" id="roleName" placeholder="Enter Role Name">
        </div>
            
<h3 class="mt-3 mb-3">Permissions</h3>
            <table class=" table table-bordered mt-3 mb-2">
            
                <!-- Leads -->
                <tr>
                    <th class="font-size-20 bg-soft-light">Leads</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                            <input class="form-check-input" type="checkbox" id="deleteLeads" value="delete">
                            <label class="form-check-label" for="deleteLeads">Delete</label>
                        </div>
                    </td>
                </tr>

            <!-- Itinerary Upload -->
                <tr>
                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                            <label class="form-check-label" for="createLeads">Add Payment</label>
                        </div>
                    </td>

                    
                </tr>
            <!-- Packages -->
                <tr >
                    <th class="font-size-20  bg-soft-light m-3">Packages</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">View</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Create</label>
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
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads">View Partner</label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Edit Partner</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                            <label class="form-check-label" for="createLeads"> Invite Partner</label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                            <label class="form-check-label" for="editLeads">Message</label>
                        </div>
                    </td>
                    
                </tr>



                 <!-- Accounts -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Accounts</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td> 
            </tr>




             <!-- QA -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">QA</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit </label>
                    </div>
                </td>
                
            </tr>



             <!-- Credit Notes -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Credit Notes</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add Credit Notes</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Use Credit Notes</label>
                    </div>
                </td>
                
            </tr>



             <!-- Reiumbersements -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Reiumbersements</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add New</label>
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
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View Invoice</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create Invoice</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Edit Invoice</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Ledger -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Ledger</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Add Transaction</label>
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
                        <label class="form-check-label" for="createLeads">Create</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Edit</label>
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
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
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Edit</label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>
                
            </tr>


            <!-- HRM-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">HRM</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
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

                 
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Invite Employee</label>
                    </div>
                </td>

                 
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Schedule Interview</label>
                    </div>
                </td>
                
            </tr>


            <!-- Leaves-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Leaves</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View Leave Type</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">View Holidays</label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Reject</label>
                    </div>
                </td>
                
            </tr>

            <!-- Pay Slips -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Pay Slips</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Generate</label>
                    </div>
                </td>                
            </tr>

            <!-- Attendance -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Attendance</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
                        <label class="form-check-label" for="createLeads">Upload</label>
                    </div>
                </td>
                
            </tr>

            <!-- Allowances -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Allowances</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                
                
            </tr>

            <!-- Deductions -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Deductions</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

              
                
            </tr>


             <!-- Teams-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Teams</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                 
                
            </tr>



             <!-- Suppliers-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Suppliers</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td>  
            </tr>


             <!-- Trips-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Trips</th>

                
                
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
                        <label class="form-check-label" for="editLeads">Add Pax</label>
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                
                
            </tr>



             <!-- Library-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Library</th>

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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <label class="form-check-label" for="editLeads">Add Flyer</label>
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Create Role-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Create Role</th>

                
                
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

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

                
            </tr>



            
             <!-- Create User-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Create User</th>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit Permissions</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Disable User</label>
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td>

                
            </tr>

            </table>
        </div>
    </div>
</div>

</body>
</html>



<?php
include "footer.php"
?>