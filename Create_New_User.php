<?php
$title = " Create New User";
include "header.php";

$errorMsg='';
$successMsg='';

if(!empty($_POST)){

    class Permission{
        private $userName;
        private $userType;
        private $Lead_add;
        private $Lead_procced;
        private $Itineray_add;
        private $Itineray_submit;
        private $Itineray_upload_1;
        private $Itineray_view;
        private $Itineray_download;
        private $Itineray_delete;
        private $Itineray_upload_2;
        private $Itineray_save;
        private $Itineray_confirm;
        private $Itineray_publish;
        private $Itineray_QC;
        private $Package_create;
        private $Package_edit;
        private $Package_download;
        private $Package_delete;
        private $Customer_view;
        private $Customer_download;
        private $Partner_view;
        private $Partner_edit;
        private $Partner_replace;
        private $Payment_view;
        private $Payment_edit;
        private $Credit_add;
        private $Credit_connect;
        private $Reiumbersement_add;
        private $Reiumbersement_view;
        private $Reiumbersement_approve;
        private $Reiumbersement_reject;
        private $Receipt_create;
        private $Receipt_view;
        private $Receipt_edit;
        private $Ledger_add;
        private $Ledger_view;
        private $Ledger_download;
        private $Voucher_view;
        private $Voucher_manage;
        private $Voucher_download;
        private $Payout_view;
        private $Payout_publish;
        private $Payout_download;
        private $CIH_view;
        private $CIH_download;
        private $PL_view;
        private $PL_download;
        private $Support_view;
        private $Support_download;
        private $Support_review;
        private $Support_privileged;
        private $Support_voucher;
        private $Employee_view;
        private $Employee_edit;
        private $Leaves_add;
        private $Leaves_view;
        private $Leaves_approve;
        private $Leaves_reject;
        private $PayRoll_view;
        private $PayRoll_upload;
        private $PayRoll_generate;
        private $PayRoll_download;
        private $Team_view;
        private $Team_add;
        private $Team_delete;
        private $Supplier_create;
        private $Supplier_view;
        private $Supplier_disable;
        private $Supplier_upload;
        private $Escalation_view;
        private $Escalation_create;
        private $Library_view;
        private $Library_upload;
        private $Library_delete;
        private $Report_create;
        private $Report_view;
        private $Report_download;
        private $Marketing_add;
        private $Marketing_view;
        private $Marketing_download;
        private $User_create;
        private $User_invite;
        private $User_view;
        private $User_edit;
        private $User_reset_password;
        private $User_enable;
        private $Master_view;
        private $Master_add;
        private $Post;
        private $isDefault;
        private $user_id;
        private $department_id;

        public function __construct($post,$isdefault) {
             $this->Post=$post;
             $this->isDefault=$isdefault;   
        }

        public function haveAlreadyEnteredRole(){
            global $conn;
            $select_check="";
            $checkStmt="";
            if($this->userType=="Employee"){
                $select_check1="SELECT * from permissions where userName like ? and userType like ? and department_id = ? and isdefault = ?";
                $checkStmt = $conn->prepare($select_check1);
                $checkStmt->bind_param('ssii',$this->userName,$this->userType,$this->department_id,$this->isDefault);
            }
            else{
                $select_check2="SELECT * from permissions where userName like ? and userType like ? and isdefault = ?";
                $checkStmt = $conn->prepare($select_check2);
                $checkStmt->bind_param('ssi',$this->userName,$this->userType,$this->isDefault);
            }
            if($checkStmt->execute()){
                $result= $checkStmt->get_result();
              if($result->num_rows>0){
                return true;
              }
            }
            return false;
        }
        public function insert(){
             global $conn;
             global $date;
            $insert_query1="INSERT INTO permissions(
                userName,
                userType,
                createdBy,
                createdDate,
                isdefault,
                is_lead_add,
                is_lead_proceed,
                is_itinerary_request,
                is_itinerary_submit,
                is_itinerary_upload,
                is_itinerary_view,
                is_itinerary_download,
                is_itinerary_delete,
                is_itinerary_upload1,
                is_itinerary_save,
                is_itinerary_confirm,
                is_itinerary_publish,
                is_itinerary_qc,
                is_package_create,
                is_package_edit,
                is_package_download,
                is_package_delete,
                is_customer_view,
                is_customer_download,
                is_partner_view,
                is_partner_edit,
                is_partner_replace,
                is_payment_view,
                is_payment_edit,
                is_credit_add,
                is_credit_connect,
                is_reimbursement_add,
                is_reimbursement_view,
                is_reimbursement_approve,
                is_reimbursement_reject,
                is_receipt_create,
                is_receipt_view,
                is_receipt_edit,
                is_ledger_add,
                is_ledger_view,
                is_ledger_download,
                is_voucher_view,
                is_voucher_manage,
                is_voucher_download,
                is_payout_view,
                is_payout_publish,
                is_payout_download,
                is_cih_view,
                is_cih_download,
                is_pl_view,
                is_pl_download,
                is_cust_support_view,
                is_cust_support_download,
                is_cust_support_review,
                is_cust_support_privileged,
                is_cust_support_voucher,
                is_employee_view,
                is_employee_edit,
                is_leave_add,
                is_leave_view,
                is_leave_approve,
                is_leave_reject,
                is_payroll_view,
                is_payroll_upload,
                is_payroll_generate,
                is_payroll_download,
                is_team_view,
                is_team_add,
                is_team_delete,
                is_supplier_create,
                is_supplier_view,
                is_supplier_disable,
                is_supplier_upload,
                is_escalation_view,
                is_escalation_create,
                is_library_view,
                is_library_upload,
                is_library_delete,
                is_report_create,
                is_report_view,
                is_report_download,
                is_market_add,
                is_market_view,
                is_download,
                is_user_create,
                is_user_invite,
                is_user_view,
                is_user_edit,
                is_user_reset_password,
                is_user_enable,
                is_master_view,
                is_master_add,
                department_id
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 


            $createdBy=$_SESSION['lastName'];
            $permissionStmt="";    
            if($this->userType=="Employee"){
              $permissionStmt = $conn->prepare($insert_query1);
              $permissionStmt->bind_param('ssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
                    $this->userName,
                    $this->userType,
                    $createdBy,
                    $date,
                    $this->isDefault,
                    $this->Lead_add,
                    $this->Lead_procced,
                    $this->Itineray_add,
                    $this->Itineray_submit,
                    $this->Itineray_upload_1,
                    $this->Itineray_view,
                    $this->Itineray_download,
                    $this->Itineray_delete,
                    $this->Itineray_upload_2,
                    $this->Itineray_save,
                    $this->Itineray_confirm,
                    $this->Itineray_publish,
                    $this->Itineray_QC,
                    $this->Package_create,
                    $this->Package_edit,
                    $this->Package_download,
                    $this->Package_delete,
                    $this->Customer_view,
                    $this->Customer_download,
                    $this->Partner_view,
                    $this->Partner_edit,
                    $this->Partner_replace,
                    $this->Payment_view,
                    $this->Payment_edit,
                    $this->Credit_add,
                    $this->Credit_connect,
                    $this->Reiumbersement_add,
                    $this->Reiumbersement_view,
                    $this->Reiumbersement_approve,
                    $this->Reiumbersement_reject,
                    $this->Receipt_create,
                    $this->Receipt_view,
                    $this->Receipt_edit,
                    $this->Ledger_add,
                    $this->Ledger_view,
                    $this->Ledger_download,
                    $this->Voucher_view,
                    $this->Voucher_manage,
                    $this->Voucher_download,
                    $this->Payout_view,
                    $this->Payout_publish,
                    $this->Payout_download,
                    $this->CIH_view,
                    $this->CIH_download,
                    $this->PL_view,
                    $this->PL_download,
                    $this->Support_view,
                    $this->Support_download,
                    $this->Support_review,
                    $this->Support_privileged,
                    $this->Support_voucher,
                    $this->Employee_view,
                    $this->Employee_edit,
                    $this->Leaves_add,
                    $this->Leaves_view,
                    $this->Leaves_approve,
                    $this->Leaves_reject,
                    $this->PayRoll_view,
                    $this->PayRoll_upload,
                    $this->PayRoll_generate,
                    $this->PayRoll_download,
                    $this->Team_view,
                    $this->Team_add,
                    $this->Team_delete,
                    $this->Supplier_create,
                    $this->Supplier_view,
                    $this->Supplier_disable,
                    $this->Supplier_upload,
                    $this->Escalation_view,
                    $this->Escalation_create,
                    $this->Library_view,
                    $this->Library_upload,
                    $this->Library_delete,
                    $this->Report_create,
                    $this->Report_view,
                    $this->Report_download,
                    $this->Marketing_add,
                    $this->Marketing_view,
                    $this->Marketing_download,
                    $this->User_create,
                    $this->User_invite,
                    $this->User_view,
                    $this->User_edit,
                    $this->User_reset_password,
                    $this->User_enable,
                    $this->Master_view,
                    $this->Master_add,
                    $this->department_id
                );  
            }else{
                $dept=null;
                $permissionStmt = $conn->prepare($insert_query1);
                $permissionStmt->bind_param('ssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii',
                    $this->userName,
                    $this->userType,
                    $createdBy,
                    $date,
                    $this->isDefault,
                    $this->Lead_add,
                    $this->Lead_procced,
                    $this->Itineray_add,
                    $this->Itineray_submit,
                    $this->Itineray_upload_1,
                    $this->Itineray_view,
                    $this->Itineray_download,
                    $this->Itineray_delete,
                    $this->Itineray_upload_2,
                    $this->Itineray_save,
                    $this->Itineray_confirm,
                    $this->Itineray_publish,
                    $this->Itineray_QC,
                    $this->Package_create,
                    $this->Package_edit,
                    $this->Package_download,
                    $this->Package_delete,
                    $this->Customer_view,
                    $this->Customer_download,
                    $this->Partner_view,
                    $this->Partner_edit,
                    $this->Partner_replace,
                    $this->Payment_view,
                    $this->Payment_edit,
                    $this->Credit_add,
                    $this->Credit_connect,
                    $this->Reiumbersement_add,
                    $this->Reiumbersement_view,
                    $this->Reiumbersement_approve,
                    $this->Reiumbersement_reject,
                    $this->Receipt_create,
                    $this->Receipt_view,
                    $this->Receipt_edit,
                    $this->Ledger_add,
                    $this->Ledger_view,
                    $this->Ledger_download,
                    $this->Voucher_view,
                    $this->Voucher_manage,
                    $this->Voucher_download,
                    $this->Payout_view,
                    $this->Payout_publish,
                    $this->Payout_download,
                    $this->CIH_view,
                    $this->CIH_download,
                    $this->PL_view,
                    $this->PL_download,
                    $this->Support_view,
                    $this->Support_download,
                    $this->Support_review,
                    $this->Support_privileged,
                    $this->Support_voucher,
                    $this->Employee_view,
                    $this->Employee_edit,
                    $this->Leaves_add,
                    $this->Leaves_view,
                    $this->Leaves_approve,
                    $this->Leaves_reject,
                    $this->PayRoll_view,
                    $this->PayRoll_upload,
                    $this->PayRoll_generate,
                    $this->PayRoll_download,
                    $this->Team_view,
                    $this->Team_add,
                    $this->Team_delete,
                    $this->Supplier_create,
                    $this->Supplier_view,
                    $this->Supplier_disable,
                    $this->Supplier_upload,
                    $this->Escalation_view,
                    $this->Escalation_create,
                    $this->Library_view,
                    $this->Library_upload,
                    $this->Library_delete,
                    $this->Report_create,
                    $this->Report_view,
                    $this->Report_download,
                    $this->Marketing_add,
                    $this->Marketing_view,
                    $this->Marketing_download,
                    $this->User_create,
                    $this->User_invite,
                    $this->User_view,
                    $this->User_edit,
                    $this->User_reset_password,
                    $this->User_enable,
                    $this->Master_view,
                    $this->Master_add,
                    $dept
                );  
            }

            if($permissionStmt->execute()){
                return true;
            }
            return false;
        }

        public function validate(){
            if(isset($this->Post['userName']) && !empty($this->Post['userName'])){
                if(isset($this->Post['userType']) && !empty($this->Post['userType'])){
                    if( ( $this->Post['userType']=="Employee" && isset($this->Post['department']) && !empty($this->Post['department']) ) || $this->Post['userType']=="Partner" ){
                        $this->userName=$this->Post['userName'];
                        $this->userType=$this->Post['userType'];
                        $this->department_id=$this->Post['department'];

                        $this->Lead_add= isset($this->Post['lead_add']) ? 1 : 0;
                        $this->Lead_procced= isset($this->Post['lead_proceed']) ? 1 : 0;
                        $this->Itineray_add= isset($this->Post['itinery_add']) ? 1 : 0;
                        $this->Itineray_submit= isset($this->Post['itinery_submit']) ? 1 : 0;
                        $this->Itineray_upload_1= isset($this->Post['itinery_upload1']) ? 1 : 0;
                        $this->Itineray_view= isset($this->Post['itinery_view']) ? 1 : 0;
                        $this->Itineray_download= isset($this->Post['itinery_download']) ? 1 : 0;
                        $this->Itineray_delete= isset($this->Post['itinery_delete']) ? 1 : 0;
                        $this->Itineray_upload_2= isset($this->Post['itinery_upload2']) ? 1 : 0;
                        $this->Itineray_save= isset($this->Post['itinery_save']) ? 1 : 0;
                        $this->Itineray_confirm= isset($this->Post['itinery_confirm']) ? 1 : 0;
                        $this->Itineray_publish= isset($this->Post['itinery_publish']) ? 1 : 0;
                        $this->Itineray_QC= isset($this->Post['itinery_qc']) ? 1 : 0;
                        $this->Package_create= isset($this->Post['package_create']) ? 1 : 0;
                        $this->Package_edit= isset($this->Post['package_edit']) ? 1 : 0;
                        $this->Package_download= isset($this->Post['package_download']) ? 1 : 0;
                        $this->Package_delete= isset($this->Post['package_delete']) ? 1 : 0;
                        $this->Customer_view= isset($this->Post['customer_view']) ? 1 : 0;
                        $this->Customer_download= isset($this->Post['customer_download']) ? 1 : 0;
                        $this->Partner_view= isset($this->Post['partner_view']) ? 1 : 0;
                        $this->Partner_edit= isset($this->Post['partner_edit']) ? 1 : 0;
                        $this->Partner_replace= isset($this->Post['partner_replace']) ? 1 : 0;
                        $this->Payment_view= isset($this->Post['payment_view']) ? 1 : 0;
                        $this->Payment_edit= isset($this->Post['payment_edit']) ? 1 : 0;
                        $this->Credit_add= isset($this->Post['credit_add']) ? 1 : 0;
                        $this->Credit_connect= isset($this->Post['credit_connect']) ? 1 : 0;
                        $this->Reiumbersement_add= isset($this->Post['reiumbersement_add']) ? 1 : 0;
                        $this->Reiumbersement_view= isset($this->Post['reiumbersement_view']) ? 1 : 0;
                        $this->Reiumbersement_approve= isset($this->Post['reiumbersement_approve']) ? 1 : 0;
                        $this->Reiumbersement_reject= isset($this->Post['reiumbersement_reject']) ? 1 : 0;
                        $this->Receipt_create= isset($this->Post['receipt_create']) ? 1 : 0;
                        $this->Receipt_view= isset($this->Post['receipt_view']) ? 1 : 0;
                        $this->Receipt_edit= isset($this->Post['receipt_edit']) ? 1 : 0;
                        $this->Ledger_add= isset($this->Post['ledger_add']) ? 1 : 0;
                        $this->Ledger_view= isset($this->Post['ledger_view']) ? 1 : 0;
                        $this->Ledger_download= isset($this->Post['ledger_download']) ? 1 : 0;
                        $this->Voucher_view= isset($this->Post['voucher_view']) ? 1 : 0;
                        $this->Voucher_manage= isset($this->Post['voucher_manage']) ? 1 : 0;
                        $this->Voucher_download= isset($this->Post['voucher_download']) ? 1 : 0;
                        $this->Payout_view= isset($this->Post['payout_view']) ? 1 : 0;
                        $this->Payout_publish= isset($this->Post['payout_publish']) ? 1 : 0;
                        $this->Payout_download= isset($this->Post['payout_download']) ? 1 : 0;
                        $this->CIH_view= isset($this->Post['cih_view']) ? 1 : 0;
                        $this->CIH_download= isset($this->Post['cih_download']) ? 1 : 0;
                        $this->PL_view= isset($this->Post['pl_view']) ? 1 : 0;
                        $this->PL_download= isset($this->Post['pl_download']) ? 1 : 0;
                        $this->Support_view= isset($this->Post['support_view']) ? 1 : 0;
                        $this->Support_download= isset($this->Post['support_download']) ? 1 : 0;
                        $this->Support_review= isset($this->Post['support_review']) ? 1 : 0;
                        $this->Support_privileged= isset($this->Post['support_privileged']) ? 1 : 0;
                        $this->Support_voucher= isset($this->Post['support_voucher']) ? 1 : 0;
                        $this->Employee_view= isset($this->Post['employee_view']) ? 1 : 0;
                        $this->Employee_edit= isset($this->Post['employee_edit']) ? 1 : 0;
                        $this->Leaves_add= isset($this->Post['leave_add']) ? 1 : 0;
                        $this->Leaves_view= isset($this->Post['leave_view']) ? 1 : 0;
                        $this->Leaves_approve= isset($this->Post['leave_approve']) ? 1 : 0;
                        $this->Leaves_reject= isset($this->Post['leave_reject']) ? 1 : 0;
                        $this->PayRoll_view= isset($this->Post['payroll_view']) ? 1 : 0;
                        $this->PayRoll_upload= isset($this->Post['payroll_upload']) ? 1 : 0;
                        $this->PayRoll_generate= isset($this->Post['payroll_generate']) ? 1 : 0;
                        $this->PayRoll_download= isset($this->Post['payroll_download']) ? 1 : 0;
                        $this->Team_view= isset($this->Post['team_view']) ? 1 : 0;
                        $this->Team_add= isset($this->Post['team_add']) ? 1 : 0;
                        $this->Team_delete= isset($this->Post['team_delete']) ? 1 : 0;
                        $this->Supplier_create= isset($this->Post['supplier_create']) ? 1 : 0;
                        $this->Supplier_view= isset($this->Post['supplier_view']) ? 1 : 0;
                        $this->Supplier_disable= isset($this->Post['supplier_disable']) ? 1 : 0;
                        $this->Supplier_upload= isset($this->Post['supplier_upload']) ? 1 : 0;
                        $this->Escalation_view= isset($this->Post['escalation_view']) ? 1 : 0;
                        $this->Escalation_create= isset($this->Post['escalation_create']) ? 1 : 0;
                        $this->Library_view= isset($this->Post['library_view']) ? 1 : 0;
                        $this->Library_upload= isset($this->Post['library_upload']) ? 1 : 0;
                        $this->Library_delete= isset($this->Post['library_delete']) ? 1 : 0;
                        $this->Report_create= isset($this->Post['report_create']) ? 1 : 0;
                        $this->Report_view= isset($this->Post['report_view']) ? 1 : 0;
                        $this->Report_download= isset($this->Post['report_download']) ? 1 : 0;
                        $this->Marketing_add= isset($this->Post['marketing_add']) ? 1 : 0;
                        $this->Marketing_view= isset($this->Post['marketing_view']) ? 1 : 0;
                        $this->Marketing_download= isset($this->Post['marketing_download']) ? 1 : 0;
                        $this->User_create= isset($this->Post['user_create']) ? 1 : 0;
                        $this->User_invite= isset($this->Post['user_invite']) ? 1 : 0;
                        $this->User_view= isset($this->Post['user_view']) ? 1 : 0;
                        $this->User_edit= isset($this->Post['user_edit']) ? 1 : 0;
                        $this->User_reset_password= isset($this->Post['user_reset_password']) ? 1 : 0;
                        $this->User_enable= isset($this->Post['user_enable']) ? 1 : 0;
                        $this->Master_view= isset($this->Post['master_view']) ? 1 : 0;
                        $this->Master_add= isset($this->Post['master_add']) ? 1 : 0;
                        if(!$this->haveAlreadyEnteredRole()){
                            return true;
                        }
                        else{
                            return "Already the user exist with userName and userType";
                        }
                    } 
                    else{
                        return "Enter valid department";
                    }    
                } 
                else{
                    return "Enter valid userType";
                }    
            } 
            else{
                return "Enter valid userName";
            }
        }


    }

 $roles= new Permission($_POST,1);
 $valid_result=$roles->validate();
 if(is_bool($valid_result)){
    if($roles->insert()){
      $successMsg="Permissions submitted";  
    }
    else{
        $errorMsg="Somthing went worng, resubmit the form.";
    }
 }
 else{
    $errorMsg=$valid_result;
 }

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
<form action="" method="POST" > 
    <div class="row card">

        <div class="col-12 card-header " >
            <h3 style="color:#043c70"> Create New User</h3>
            <p class="<?php echo !empty($errorMsg) ? "text-danger": ( !empty($successMsg) ? "text-success" : '');  ?>"><?php echo !empty($errorMsg) ? $errorMsg: ( !empty($successMsg) ? $successMsg : ''); ?></p>
        </div>


        <div class="card-body row">
        <div class="form-group col-lg-6 mb-5 mt-3">
            <label for="roleName" class="font-size-14">User Name</label>
            <input type="text" name="userName" class="form-control" id="roleName" placeholder="Enter User Name">
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
            <select name="userType" class="form-control" id="User_Type_Select" onchange="usertype()">
                <option value="" selected disabled>select </option>
                <option value="Partner">Partner</option>
                <option value="Employee">Employee</option>
            </select>
            </select>
        </div>


        <div class="col-lg-6 d-none" id="department-drop-down">
                    <label for="">Department</label>
                    <?php 
                        $select_department="SELECT department_id, departmentName from department;";
                        $department_stmt= $conn->prepare($select_department);
                        $department_stmt->execute();
                        $result_dept=$department_stmt->get_result();
                    ?>
                    <select name="department" class="form-select mb-2" id="department">
                        <option value="" selected disabled>select</option>
                        <?php
                            while($row=$result_dept->fetch_row()){ ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option> 
                         <?php   }
                        ?>
                        <!-- <option>Human Resource</option>
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
                        <option>Partner Support</option> -->
                    </select>
                </div>
            
<h3 class="mt-3 mb-3">Permissions</h3>
            <table class=" table table-bordered mt-3 mb-2">
            
                <!-- Leads -->
                <tr>
                    <th class="font-size-20 bg-soft-light">Leads</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" name="lead_add" type="checkbox" id="createLeads" >
                            <label class="form-check-label" for="createLeads">Add Lead</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" name="lead_proceed" type="checkbox" id="editLeads">
                            <label class="form-check-label" for="editLeads">Proceed</label>
                        </div>
                    </td>

                </tr>
               
            <!-- Itineraries -->

                <tr>
                    <th class="font-size-20 bg-soft-light" rowspan="2">Itineraries</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" name="itinery_add" type="checkbox" >
                            <label class="form-check-label" for="createLeads">Add Request Form</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" name="itinery_submit" id="createLeads" >
                            <label class="form-check-label" for="createLeads">Submit</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" name="itinery_upload1" id="createLeads" >
                            <label class="form-check-label" for="createLeads">Upload</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_view">
                            <label class="form-check-label" for="createLeads">View</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="itinery_download">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="deleteLeads" name="itinery_delete">
                            <label class="form-check-label" for="deleteLeads">Delete</label>
                        </div>
                    </td>
                </tr>

            <!-- Itinerary Upload -->
                <tr>
                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_upload2">
                            <label class="form-check-label" for="createLeads">Itinerary Upload</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_save">
                            <label class="form-check-label" for="createLeads">Save</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_confirm">
                            <label class="form-check-label" for="createLeads">Confirm</label>
                        </div>
                    </td>

                    

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_publish">
                            <label class="form-check-label" for="createLeads">Publish</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="itinery_qc">
                            <label class="form-check-label" for="createLeads">QC</label>
                        </div>
                    </td>

                    
                </tr>
            <!-- Packages -->
                <tr >
                    <th class="font-size-20  bg-soft-light m-3">Packages</th>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="package_create">
                            <label class="form-check-label" for="editLeads">Create</label>
                        </div>
                    </td>


                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="package_edit">
                            <label class="form-check-label" for="createLeads">Edit</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="package_download">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="package_delete">
                            <label class="form-check-label" for="editLeads">Delete</label>
                        </div>
                    </td>

                </tr>
            <!-- Customers -->
                <tr >
                    <th class="font-size-20  bg-soft-light m-3">Customers</th>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="customer_view">
                            <label class="form-check-label" for="createLeads">View</label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="customer_download">
                            <label class="form-check-label" for="editLeads">Download</label>
                        </div>
                    </td>

                    

                </tr>
            <!-- Partners -->

            <tr >
                
                    <th class="font-size-20 bg-soft-light m-3">Partners</th>


                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="createLeads" name="partner_view">
                            <label class="form-check-label" for="createLeads">View </label>
                        </div>
                    </td>

                    
                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="partner_edit">
                            <label class="form-check-label" for="editLeads">Edit </label>
                        </div>
                    </td>

                    <td>
                        <div class="form-check me-4">
                            <input class="form-check-input" type="checkbox" id="editLeads" name="partner_replace">
                            <label class="form-check-label" for="editLeads">Replace </label>
                        </div>
                    </td>

                    
                </tr>



                 <!-- Payments -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Payments</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="payment_view">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="payment_edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td> 
            </tr>




            

             <!-- Credit Notes -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Credit Notes</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="credit_add">
                        <label class="form-check-label" for="createLeads">Add </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads"  name="credit_connect">
                        <label class="form-check-label" for="editLeads">Connect</label>
                    </div>
                </td>
                
            </tr>



             <!-- Reiumbersements -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Reiumbersements</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="reiumbersement_add">
                        <label class="form-check-label" for="createLeads">Add </label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="reiumbersement_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="reiumbersement_approve">
                        <label class="form-check-label" for="createLeads"> Approve</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="reiumbersement_reject">
                        <label class="form-check-label" for="editLeads">Reject</label>
                    </div>
                </td>
                
            </tr>



            
             <!-- Receipts -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Receipts</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="receipt_create">
                        <label class="form-check-label" for="editLeads">Create </label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="receipt_view">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>

                
                

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="receipt_edit">
                        <label class="form-check-label" for="createLeads"> Edit </label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Ledger -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Ledger</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="ledger_add">
                        <label class="form-check-label" for="createLeads">Add</label>
                    </div>
                </td>

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="ledger_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="ledger_download">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
            </tr>



            
             <!-- Vouchers -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Vouchers</th>

                

                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="voucher_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="voucher_manage">
                        <label class="form-check-label" for="createLeads">Manage</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="voucher_download">
                        <label class="form-check-label" for="createLeads">Download</label>
                    </div>
                </td>

                
                
            </tr>


            
             <!-- Partner Payouts -->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Partner Payouts</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="payout_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="payout_publish">
                        <label class="form-check-label" for="createLeads">Publish</label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="payout_download">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
            </tr>


            <!-- CIH -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">CIH</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="cih_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="cih_download">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>

                
                
            </tr>


             <!-- P&L-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">P&L</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="pl_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

               
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="pl_download">
                        <label class="form-check-label" for="createLeads"> Download</label>
                    </div>
                </td>
                
            </tr>

            <!-- Customer Support-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Customer Support</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="support_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="support_download">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="support_review">
                        <label class="form-check-label" for="editLeads">Review</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="support_privileged">
                        <label class="form-check-label" for="editLeads">Privileged </label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="support_voucher">
                        <label class="form-check-label" for="editLeads">Voucher</label>
                    </div>
                </td>

                 
               
            </tr>


            <!-- Employees-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Employees</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="employee_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="employee_edit">
                        <label class="form-check-label" for="editLeads">Edit</label>
                    </div>
                </td>
                
               
            </tr>


            <!-- Leaves-->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Leaves</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="leave_add">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="leave_view">
                        <label class="form-check-label" for="createLeads">View </label>
                    </div>
                </td>


                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="leave_approve">
                        <label class="form-check-label" for="editLeads">Approve</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="leave_reject">
                        <label class="form-check-label" for="editLeads">Reject</label>
                    </div>
                </td>
                
            </tr>

            <!-- Pay Roll -->

            <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Pay Roll</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="createLeads" name="payroll_upload">
                        <label class="form-check-label" for="createLeads">Upload</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_generate">
                        <label class="form-check-label" for="editLeads">Generate</label>
                    </div>
                </td>     
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="payroll_download">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>     
            </tr>

           

             <!-- Teams-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Teams</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="team_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="team_add">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="team_delete">
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

                 
                
            </tr>



             <!-- Suppliers-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Suppliers</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_create">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_disable">
                        <label class="form-check-label" for="editLeads">Disable</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="supplier_upload">
                        <label class="form-check-label" for="editLeads">Upload</label>
                    </div>
                </td>

         
            </tr>


             



             <!-- Escalations-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Escalations</th>

                
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="escalation_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="escalation_create">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                
                
            </tr>



             <!-- Library-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Library</th>

               
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="library_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="library_upload">
                        <label class="form-check-label" for="editLeads">Upload</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="library_delete">
                        <label class="form-check-label" for="editLeads">Delete</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Reports-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3">Reports</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="report_create">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="report_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="report_download">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                
            </tr>



            
             <!-- Marketing-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> Marketing</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_add">
                        <label class="form-check-label" for="editLeads">Add </label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="marketing_download">
                        <label class="form-check-label" for="editLeads">Download</label>
                    </div>
                </td>

                
            </tr>


            
             <!-- Create User-->

             <tr >
                
                <th class="font-size-20 bg-soft-light m-3"> User Settings </th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_create">
                        <label class="form-check-label" for="editLeads">Create</label>
                    </div>
                </td>
                
                 <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_invite">
                        <label class="form-check-label" for="editLeads">Invite</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_edit">
                        <label class="form-check-label" for="editLeads">Edit </label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_reset_password">
                        <label class="form-check-label" for="editLeads">Reset Password</label>
                    </div>
                </td>
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="user_enable">
                        <label class="form-check-label" for="editLeads">Enable/Disable</label>
                    </div>
                </td>

                
                

                
            </tr>



            
             <!-- Masters-->

             <tr >
                
                <th class="font-size-20 bg-soft-light  m-3">Masters</th>

                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="master_view">
                        <label class="form-check-label" for="editLeads">View</label>
                    </div>
                </td>
                
                <td>
                    <div class="form-check me-4">
                        <input class="form-check-input" type="checkbox" id="editLeads" name="master_add">
                        <label class="form-check-label" for="editLeads">Add</label>
                    </div>
                </td>

                
            </tr>

            </table>

            <div class="text-end">
                <input type="submit" class="btn btn-primary" />
                </div>
        </div>
    </div>
    </form>
</div>

</body>
</html>



<?php
include "footer.php"
?>