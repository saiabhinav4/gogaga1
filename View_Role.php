<?php
$title = " Roles";
include "header.php";

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    $fetch_role="SELECT * from permissions where permission_id=?";
    $role_stmt= $conn->prepare($fetch_role);
    $role_stmt->bind_param('i',$id);
    $role_stmt->execute();
    $resultRoles= $role_stmt->get_result();
    $row=$resultRoles->fetch_assoc();
}
else{
    header('location:Create_Users.php');
}

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
            <h3 style="color:#043c70"> View Role</h3>
        </div>
       

        <div class="card-body">
        <div class="form-group col-lg-6 mb-5 mt-3">
            <label for="roleName" class="font-size-20">Role Name</label>
            <input type="text" class="form-control" id="roleName" value="<?php echo $row['userName']; ?>" placeholder="Role Name" readonly>
        </div>
            
<h3 class="mt-3 mb-3">Permissions</h3>
<table class=" table table-bordered mt-3 mb-2">
            
            <!-- Leads -->
            <tr>
                <th class="font-size-20 bg-soft-light">Leads</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" name="lead_add" type="checkbox" id="createLeads" <?php echo $row['is_lead_add']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Add Lead</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" name="lead_proceed" type="checkbox" id="editLeads" <?php echo $row['is_lead_proceed']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Proceed</label>
                    </div>
                </td>

            </tr>
           
        <!-- Itineraries -->

            <tr>
                <th class="font-size-20 bg-soft-light" rowspan="2">Itineraries</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" name="itinery_add" type="checkbox" <?php echo $row['is_itinerary_request']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Add Request Form</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" name="itinery_submit" id="createLeads" <?php echo $row['is_itinerary_submit']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Submit</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" name="itinery_upload1" id="createLeads" <?php echo $row['is_itinerary_upload']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Upload</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_view" <?php echo $row['is_itinerary_view']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="itinery_download" <?php echo $row['is_itinerary_download']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="deleteLeads" name="itinery_delete" <?php echo $row['is_itinerary_delete']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="deleteLeads">Delete</label>
                    </div>
                </td>
            </tr>

        <!-- Itinerary Upload -->
            <tr>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_upload2" <?php echo $row['is_itinerary_upload1']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Itinerary Upload</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_save" <?php echo $row['is_itinerary_save']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Save</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_confirm" <?php echo $row['is_itinerary_confirm']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Confirm</label>
                    </div>
                </td>

                

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_publish" <?php echo $row['is_itinerary_publish']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Publish</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_qc" <?php echo $row['is_itinerary_qc']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">QC</label>
                    </div>
                </td>

                
            </tr>
        <!-- Packages -->
            <tr >
                <th class="font-size-20  bg-soft-light m-3">Packages</th>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="package_create" <?php echo $row['is_package_create']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="package_edit" <?php echo $row['is_package_edit']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">Edit</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="package_download" <?php echo $row['is_package_download']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="package_delete" <?php echo $row['is_package_delete']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

            </tr>
        <!-- Customers -->
            <tr >
                <th class="font-size-20  bg-soft-light m-3">Customers</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="customer_view" <?php echo $row['is_customer_view']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">View</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="customer_download" <?php echo $row['is_customer_download']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                

            </tr>
        <!-- Partners -->

        <tr >
            
                <th class="font-size-20 bg-soft-light m-3">Partners</th>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="partner_view" <?php echo $row['is_partner_view']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="partner_edit" <?php echo $row['is_partner_edit']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Edit </label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="partner_replace" <?php echo $row['is_partner_replace']==0 ? '': "checked"; ?> disabled>
                        <label class="form-check-label" for="editLeads">Replace </label>
                    </div>
                </td>

                
            </tr>



             <!-- Payments -->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Payments</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="payment_view" <?php echo $row['is_payment_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">View </label>
                </div>
            </td>

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="payment_edit" <?php echo $row['is_payment_edit']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Edit</label>
                </div>
            </td> 
        </tr>




        

         <!-- Credit Notes -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Credit Notes</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="credit_add" <?php echo $row['is_credit_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Add </label>
                </div>
            </td>

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads"  name="credit_connect" <?php echo $row['is_credit_connect']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Connect</label>
                </div>
            </td>
            
        </tr>



         <!-- Reiumbersements -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3"> Reiumbersements</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="reiumbersement_add" <?php echo $row['is_reimbursement_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Add </label>
                </div>
            </td>

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="reiumbersement_view" <?php echo $row['is_reimbursement_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="reiumbersement_approve" <?php echo $row['is_reimbursement_approve']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Approve</label>
                </div>
            </td>

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="reiumbersement_reject" <?php echo $row['is_reimbursement_reject']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Reject</label>
                </div>
            </td>
            
        </tr>



        
         <!-- Receipts -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3"> Receipts</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="receipt_create" <?php echo $row['is_receipt_create']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Create </label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="receipt_view" <?php echo $row['is_receipt_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">View </label>
                </div>
            </td>

            
            

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="receipt_edit" <?php echo $row['is_receipt_edit']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Edit </label>
                </div>
            </td>

            
        </tr>


        
         <!-- Ledger -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Ledger</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="ledger_add" <?php echo $row['is_ledger_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Add</label>
                </div>
            </td>

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="ledger_view" <?php echo $row['is_ledger_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="ledger_download" <?php echo $row['is_ledger_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Download</label>
                </div>
            </td>

            
        </tr>



        
         <!-- Vouchers -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Vouchers</th>

            

            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="voucher_view" <?php echo $row['is_voucher_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="voucher_manage" <?php echo $row['is_voucher_manage']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Manage</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="voucher_download" <?php echo $row['is_voucher_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Download</label>
                </div>
            </td>

            
            
        </tr>


        
         <!-- Partner Payouts -->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Partner Payouts</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="payout_view" <?php echo $row['is_payout_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="payout_publish" <?php echo $row['is_payout_publish']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Publish</label>
                </div>
            </td>


            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="payout_download" <?php echo $row['is_payout_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Download</label>
                </div>
            </td>

            
        </tr>


        <!-- CIH -->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">CIH</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="cih_view" <?php echo $row['is_cih_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="cih_download" <?php echo $row['is_cih_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Download</label>
                </div>
            </td>

            
            
        </tr>


         <!-- P&L-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">P&L</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="pl_view" <?php echo $row['is_pl_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

           
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="pl_download" <?php echo $row['is_pl_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads"> Download</label>
                </div>
            </td>
            
        </tr>

        <!-- Customer Support-->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Customer Support</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="support_view" <?php echo $row['is_cust_support_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="support_download" <?php echo $row['is_cust_support_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Download</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="support_review" <?php echo $row['is_cust_support_review']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Review</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="support_privileged" <?php echo $row['is_cust_support_privileged']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Privileged </label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="support_voucher" <?php echo $row['is_cust_support_voucher']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Voucher</label>
                </div>
            </td>

             
           
        </tr>


        <!-- Employees-->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Employees</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="employee_view" <?php echo $row['is_employee_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="employee_edit" <?php echo $row['is_employee_edit']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Edit</label>
                </div>
            </td>
            
           
        </tr>


        <!-- Leaves-->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Leaves</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="leave_add" <?php echo $row['is_leave_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Add</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="leave_view" <?php echo $row['is_leave_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">View </label>
                </div>
            </td>


            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="leave_approve" <?php echo $row['is_leave_approve']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Approve</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="leave_reject" <?php echo $row['is_leave_reject']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Reject</label>
                </div>
            </td>
            
        </tr>

        <!-- Pay Roll -->

        <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Pay Roll</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_view" <?php echo $row['is_payroll_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="createLeads" name="payroll_upload" <?php echo $row['is_payroll_upload']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="createLeads">Upload</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_generate" <?php echo $row['is_payroll_generate']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Generate</label>
                </div>
            </td>     
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_download" <?php echo $row['is_payroll_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Download</label>
                </div>
            </td>     
        </tr>

       

         <!-- Teams-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Teams</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="team_view" <?php echo $row['is_team_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="team_add" <?php echo $row['is_team_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Add</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="team_delete" <?php echo $row['is_team_delete']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Delete</label>
                </div>
            </td>

             
            
        </tr>



         <!-- Suppliers-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Suppliers</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_create" <?php echo $row['is_supplier_create']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Create</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_view" <?php echo $row['is_supplier_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_disable" <?php echo $row['is_supplier_disable']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Disable</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_upload" <?php echo $row['is_supplier_upload']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Upload</label>
                </div>
            </td>

     
        </tr>


         



         <!-- Escalations-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Escalations</th>

            
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="escalation_view" <?php echo $row['is_escalation_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="escalation_create" <?php echo $row['is_escalation_create']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Create</label>
                </div>
            </td>
            
            
            
        </tr>



         <!-- Library-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Library</th>

           
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="library_view" <?php echo $row['is_library_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="library_upload" <?php echo $row['is_library_upload']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Upload</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="library_delete" <?php echo $row['is_library_delete']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Delete</label>
                </div>
            </td>

            
        </tr>


        
         <!-- Reports-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3">Reports</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="report_create" <?php echo $row['is_report_create']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Create</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="report_view" <?php echo $row['is_report_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="report_download" <?php echo $row['is_report_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Download</label>
                </div>
            </td>

            
        </tr>



        
         <!-- Marketing-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3"> Marketing</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_add" <?php echo $row['is_market_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Add </label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_view" <?php echo $row['is_market_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_download" <?php echo $row['is_download']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Download</label>
                </div>
            </td>

            
        </tr>


        
         <!-- Create User-->

         <tr >
            
            <th class="font-size-20 bg-soft-light m-3"> User Settings </th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_create" <?php echo $row['is_user_create']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Create</label>
                </div>
            </td>
            
             <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_invite" <?php echo $row['is_user_invite']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Invite</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_view" <?php echo $row['is_user_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_edit" <?php echo $row['is_user_edit']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Edit </label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_reset_password" <?php echo $row['is_user_reset_password']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Reset Password</label>
                </div>
            </td>
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="user_enable" <?php echo $row['is_user_enable']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Enable/Disable</label>
                </div>
            </td>

            
            

            
        </tr>



        
         <!-- Masters-->

         <tr >
            
            <th class="font-size-20 bg-soft-light  m-3">Masters</th>

            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="master_view" <?php echo $row['is_master_view']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">View</label>
                </div>
            </td>
            
            <td>
                <div class="form-check me-4">
                    <input class="form-check-input" type="checkbox" id="editLeads" name="master_add" <?php echo $row['is_master_add']==0 ? '': "checked"; ?> disabled>
                    <label class="form-check-label" for="editLeads">Add</label>
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