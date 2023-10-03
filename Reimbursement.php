<?php
$title = "Reimbursements";
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample HTML Table</title>
</head>
<body>
<div class="card">
  <div class="card-header">
   <h3>Reimbursements</h3>

   <div class='text-end'>
  <!-- Button trigger modal -->

      <a href="Add_Reimbursement.php"> <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Reimbursement</button></a> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
   </div>
   
  </div>
  <div class="card-body">
  
    <table class='table table-bordered'>
        <tr>
            <th>Employee Name</th>
            <th>Date Of Request</th>
            <th>Location</th>
            <th>Amount</th>
            <th>Towards Booking ID</th>
            <th>Amount</th>
            <th>View</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>John Doe</td>
            <td>2023-09-01</td>
            <td>New York</td>
            <td>$500.00</td>
            <td>12345</td>
            <td>$250.00</td>
            <td><a href="#" class='btn btn-primary'>View</a></td>
            <td>
                <button class='btn btn-success'>Approve</button>
                <button class='btn btn-danger'>Reject</button>
            </td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>2023-08-25</td>
            <td>Los Angeles</td>
            <td>$750.00</td>
            <td>54321</td>
            <td>$375.00</td>
            <td><a href="#" class='btn btn-primary'>View</a></td>
            <td>
                <button class='btn btn-success'>Approve</button>
                <button class='btn btn-danger'>Reject</button>
            </td>
        </tr>
        <tr>
            <td>Alice Johnson</td>
            <td>2023-08-30</td>
            <td>Chicago</td>
            <td>$600.00</td>
            <td>98765</td>
            <td>$300.00</td>
            <td><a href="#" class='btn btn-primary'>View</a></td>
            <td>
                <button class='btn btn-success'>Approve</button>
                <button class='btn btn-danger'>Reject</button>
            </td>
        </tr>
    </table>
    
  </div>
</div>
   
</body>
</html>
<?php
include "footer.php";
?>