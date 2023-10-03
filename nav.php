<?php
/*Get Roles*/
// $roles = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `roles` WHERE `role`='$user_type'"));
// $uu = "SELECT * FROM `roles` WHERE `role`='$user_type'";
// $all_roles = $roles['roles'];
// $values = explode(",", $all_roles);
?>
<div class="vertical-menu ">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu" class="fixed">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
        
            <li>
                <a href="dashboard.php">
                <i class="fa-solid fa-house  fa-2xs ss" style='font-size:15px;'></i>
                    <span data-key="t-dashboard">Dashboard</span>
                   
                </a>
            </li>
            <?php 
        
        
        //if($user_type == 'Admin'){?>

        
            <li><a href="leads.php"><i class=" fa-solid fa-mobile-screen fa-2xs " style='font-size:15px;'></i><span data-key="t-apps">Leads</span></a></li>
            <li><a href="itnerys.php"><i class="fa-solid fa-file-lines fa-2xs" style='font-size:15px;'></i></i><span data-key="t-apps">Itineraries</span></a></li>
            <li><a href="packages.php"><i class="fa-solid fa-calendar-days" style='font-size:15px;'></i><span data-key="t-apps">Packages</span></a></li>
            <li><a href="customers.php"><i class="fa-solid fa-image-portrait  " style='font-size:15px;'></i><span data-key="t-apps">Customers</span></a></li>
            
              <li>
                <a href="partners.php" class="has-arrow">
                <i class="fa-solid fa-users fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-authentication">Partners</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="search_hierarchy.php" data-key="t-login">Partner Hierarchy</a></li>
                    
                    
                </ul>
            </li>
            

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-chart-simple fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-authentication">Accounts</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="payments.php" data-key="t-login">Payments</a></li>
                    <li><a href="auth-login.html" data-key="t-login" class="d-none">QA</a></li>
                    <li><a href="credit_notes.php" data-key="t-register">Credit Notes</a></li>
                    <li><a href="Reimbursement.php" data-key="t-recover-password">Reiumbursements</a></li>
                    <li><a href="Receipts.php" data-key="t-lock-screen">Receipts</a></li>
                    <li><a href="Ledger.php" data-key="t-logout">Ledger</a></li>
                    <li><a href="voucher.php" data-key="t-confirm-mail">Vouchers</a></li>
                    <li><a href="Partner_Payouts.php" data-key="t-email-verification">Partner Payouts</a></li>
                    <li><a href="CIH.php" data-key="t-logout">CIH</a></li>
                    <li><a href="Ledger.php" data-key="t-logout">P&L</a></li>
                </ul>
            </li>

           
            
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-address-card fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">HRM</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="employees.php" data-key="t-starter-page">Employees</a></li>
                    <li><a href="leaves.php" data-key="t-maintenance">Leave</a></li>
                    <li><a href="payroll.php" data-key="t-coming-soon">Payroll</a></li>
                    
                </ul>
            </li>
            <li><a href="teams.php"><i class="fa-solid fa-users-rays fa-2xs" style='font-size:15px;'></i><span data-key="t-apps">Teams</span></a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-pen-to-square fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">Suppliers</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="Hotel_suppliers.php" data-key="t-starter-page">Hotels</a></li>
                    <li><a href="Cab_Suppliers.php" data-key="t-maintenance">Cabs</a></li>
                    
                   
                    
                </ul>
            </li>
            <li class="d-none"><a href="leads.php"><i class="fa-solid fa-user-check  fa-2xs " style='font-size:15px;'></i><span data-key="t-apps">Memberships</span></a></li>
            <li><a href="Trips .php"><i class="fa-solid fa-plane-departure" style='font-size:15px;'></i></i><span data-key="t-apps">Trips</span></a></li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-location-arrow fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">Escalations</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="Partner_escalation.php" data-key="t-starter-page">Partner Escalations</a></li>
                    <li><a href="escalation_employee.php" data-key="t-maintenance">Employee Escalations</a></li>
                   \
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-bookmark fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">Library</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="partner_training.php" data-key="t-starter-page">Partner Training Content</a></li>
                    <li><a href="travel_guide.php" data-key="t-maintenance">Travel Guide</a></li>
                    <li><a href="#" data-key="t-coming-soon">Travel Insurance</a></li>
                    <li><a href="visa.php" data-key="t-coming-soon">Visa</a></li>
                    <li><a href="Travel_definitions.php" data-key="t-coming-soon">Travel Defnitions</a></li>
                    <li><a href="pages-comingsoon.html" data-key="t-coming-soon">International Sim Cards</a></li>
                    <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Backend Contacts</a></li>
                    <li><a href="faqs.php" data-key="t-coming-soon">FAQ's</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-pen-to-square fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">Reports</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="Productivity_Report.php" data-key="t-starter-page">Productivity Report</a></li>
                    <li><a href="Daily_Sales_Report.php" data-key="t-maintenance">Daily Sales Report</a></li>
                    <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Lead Report</a></li>
                    <li><a href="pages-comingsoon.html" data-key="t-coming-soon">Partner Report</a></li>
                   
                    
                </ul>
            </li>
            <li>
                <a href="marketing.php" class="has-arrow">
                <i class="fa-solid fa-image" style='font-size:15px;'></i>  
                    <span data-key="t-pages">Marketing</span>
                </a>
                
               
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-gear  fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">User Settings</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="All_Users.php" data-key="t-starter-page">All Users</a></li> 
                    <li><a href="New_Partner_Request.php" data-key="t-starter-page">New Partner Request</a></li>
                    <li><a href="New_Employee_Request.php" data-key="t-maintenance">New Employee Request</a></li>
                    <li><a href="Create_Users.php" data-key="t-maintenance">Create User</a></li>
                    <!-- <li><a href="Role_Setting.php" data-key="t-starter-page">Roles</a></li>
                    <li><a href="User_Setting.php" data-key="t-maintenance">Users</a></li> -->
                    
                    
                </ul>
               
            </li>


            <li>
                <a href="masters.php" class="has-arrow">
                <i class="fa-solid fa-graduation-cap  fa-2xs" style='font-size:15px;'></i>
                    <span data-key="t-pages">Masters</span>
                </a>
                
            </li>
            <?php // }        ?>
        </ul>

        <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
            <div class="card-body">
                <img src="assets/images/giftbox.png" alt="">
                <div class="mt-4">
                    <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                    <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                    <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
</div>
</div>