<?php
$title = "Partner Permissions";
include "header.php";
include "attchments.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table,
        th,
        td {
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

            <div class="col-12 card-header d-flex flex-row justify-content-between">
                <h3 style="color:#043c70"> Set Employee Permissions</h3>
                <h3 style="color:#043c70"><span class="font-size-16 me-2">Employee Code : </span>GH8426</h3>
            </div>


            <div class="card-body row">

            <div class="col-lg-6 " >
                    <label for="">User</label>
                    <select name="" class="form-select mb-2">
                        <option value="" selected disabled>select User</option>
                        <option value="">Sai</option>
                        <option value="">Arun</option>
                        <option value="">Rahul</option>
                    </select>
                </div>

                <div class="col-lg-6">
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


                <div class="col-lg-6">
                    <label for="">Destination Access</label>
                    <select name="" class="form-select mb-2" id="partner_type_select" onchange="partner_select()">
                        <option value="" selected disabled>select</option>
                        <option value="Domestic">Domestic</option>
                        <option value="International">international</option>
                        <option value="Both">Both</option>
                    </select>
                </div>

                <div class="col-lg-6 d-none" id="Assign_Super_Partner">
                    <label for="">Assign Partner</label>
                    <select name="" class="form-select mb-2">
                        <option value="" selected disabled>select Super Partner</option>
                        <option value="">Sai</option>
                        <option value="">Arun</option>
                        <option value="">Rahul</option>
                    </select>
                </div>
                <div class="col-lg-6 d-none" id="Assign_Sales_Partner">
                    <label for="">Assign Partner</label>
                    <select name="" class="form-select mb-2">
                        <option value="" selected disabled>Select Sales Partner</option>
                        <option value="">Akhil</option>
                        <option value="">Ajay</option>
                        <option value="">Nithin</option>
                    </select>
                </div>


                <div class="col-lg-6 mt-2 mb-2">
                    <label for="choices-multiple-default" class="form-label font-size-14 ">Assign Operations Team</label>
                    <select class="form-select">
                        <option value="Choice 1">Team 1</option>
                        <option value="Choice 2">Team 2</option>
                        <option value="Choice 3">Team 3</option>
                        <option value="Choice 4">Team 4</option>
                        <option value="Choice 5">Team 5</option>
                        <option value="Choice 6">Team 6</option>
                    </select>
                </div>

                <div class="col-lg-6 mt-2 mb-2">
                    <label for="choices-multiple-default" class="form-label font-size-14 ">Assign Partner</label>
                    <select class="form-control" data-trigger name="Reservation _Type" id="choices-multiple-default" placeholder="Reservation Type" multiple>
                        <option value="Choice 1" selected>All Partner</option>
                        <option value="Choice 2">Sai</option>
                        <option value="Choice 3">Arun</option>

                        <option value="Choice 10" disabled>Super Partner</option>
                        <option value="Choice 4">Rahul</option>
                        <option value="Choice 5">Akhil</option>
                        <option value="Choice 9" disabled>Sales Partner</option>
                        <option value="Choice 6">Ajay</option>
                        <option value="Choice 7">Nithin</option>
                        <option value="Choice 8" disabled>Lead Generator</option>


                    </select>
                </div>
                <script>
                    function partner_select() {
                        let partner_type = document.getElementById('partner_type_select')
                        let Assign_Super_Partner = document.getElementById('Assign_Super_Partner')
                        let Assign_Sales_Partner = document.getElementById('Assign_Sales_Partner')
                        if (partner_type.value == 'SUPER') {
                            Assign_Super_Partner.classList.add('d-none');
                            Assign_Sales_Partner.classList.add('d-none');
                        }
                        if (partner_type.value == 'SALES') {
                            Assign_Super_Partner.classList.remove('d-none');
                            Assign_Sales_Partner.classList.add('d-none');
                        }
                        if (partner_type.value == 'LEAD_GENERATOR') {
                            Assign_Sales_Partner.classList.remove('d-none');
                            Assign_Super_Partner.classList.add('d-none');
                        }

                    }
                </script>

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
                            <label class="form-check-label" for="createLeads">Publish</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="createLeads" value="create">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <label class="form-check-label" for="editLeads">Add </label>
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
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
                        <input class="form-check-input" type="checkbox" id="editLeads" value="edit">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>

                
            </tr>

            </table>
                <div class="text-end m-3">

                    <button class="btn btn-primary"> Save</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="popover" data-bs-title="Mail format To Be Sent" data-bs-content="Congratulations


Dear Mr Rajesh,

Welcome to Gogaga Holidays, 

Congratulations, We are glad to inform you that your application for Sales Manager has been approved on 21st Aug 2023. We are happy to invite you to the family of Gogaga Holidays. 

Employee Code : GH 8379.

Below is the access to your Dashboard
Click Here ( www.gogagacrm.com ) to Open Dashboard


User Id     -  Your Mail Id (borabpalle@gmail.com)

Password  -  123456


Product and Induction Training

Your Induction and product training will be conducted by our training team in accordance to mutual feasible time. We wish you success in all your future endeavours with us.
                                   

With Regards,

Human Resource

Gogaga Holidays Private Limited
406 & 408, 4th Floor, Block-2, Whitehouse, 
Begumpet-500016, Hyderabad
Mail:  support@gogagaholidays.in
Web:  www.gogagaholidays.com

Follow us:

     
_________________________________________
The information in this email is confidential and may be privileged.
If you are not the intended recipient, please destroy this message
and notify the sender immediately.
----------------------------------------------------------------------------------
Gogaga Holidays Private Limited.
Copy Right 2023 Policy | Privacy Policy | All Rights Reserved."> Send Confirmation</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="domestic.js"></script>




<?php
include "footer.php"
?>