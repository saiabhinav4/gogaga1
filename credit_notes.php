<?php
$title = "Credit Notes";
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
   <h3>Credit Notes</h3>

   <div class='text-end'>
   <a href="Add_CreditNotes.php"> <button  class="btn btn-primary m-2">Add Credit Notes</button></a>
  <!-- Button trigger modal -->

      





     
  <div class="card-body">
  
    <table class='table table-bordered'>
        <tr>
            <th>City</th>
            <th>Hotel Name</th>
            <th>CN Issued Date</th>
            <th>Towards Ref Number</th>
            <th>Towards Booking ID</th>
            <th>Amount</th>
            <th>Valid Till</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>New York</td>
            <td>Hotel A</td>
            <td>2023-09-01</td>
            <td>Ref123</td>
            <td>Booking456</td>
            <td>$200.00</td>
            <td>2023-09-30</td>
            <td><button  class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
      <div class="form-group">
    <label for="creditNotesSelect" class='font-size-15'>Credit Notes</label>
    <select class="form-control" id="creditNotesSelect">
        <option value="Select" selected>Select</option>
        <option value="GHRN12345">GHRN12345</option>
        <option value="GHRN54321">GHRN54321</option>
        <option value="GHRN98765">GHRN98765</option>
        <!-- Add more options as needed -->
    </select>
</div>
</div>
      <div class="modal-footer text-center">
        
        <button  class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
   </div>
   
  </div>
</td>
        </tr>
        <tr>
            <td>Los Angeles</td>
            <td>Hotel B</td>
            <td>2023-09-05</td>
            <td>Ref789</td>
            <td>Booking123</td>
            <td>$150.00</td>
            <td>2023-10-15</td>
            <td><button  class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
      <div class="form-group">
    <label for="creditNotesSelect" class='font-size-15'>Credit Notes</label>
    <select class="form-control" id="creditNotesSelect">
        <option value="Select" selected>Select</option>
        <option value="GHRN12345">GHRN12345</option>
        <option value="GHRN54321">GHRN54321</option>
        <option value="GHRN98765">GHRN98765</option>
        <!-- Add more options as needed -->
    </select>
</div>
</div>
      <div class="modal-footer text-center">
        
        <button  class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
   </div>
   
  </div>
</td>
        </tr>
        <tr>
            <td>Chicago</td>
            <td>Hotel C</td>
            <td>2023-09-10</td>
            <td>Ref456</td>
            <td>Booking789</td>
            <td>$300.00</td>
            <td>2023-09-30</td>
            <td><button  class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Modal</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
      <div class="form-group">
    <label for="creditNotesSelect" class='font-size-15'>Credit Notes</label>
    <select class="form-control" id="creditNotesSelect">
        <option value="Select" selected>Select</option>
        <option value="GHRN12345">GHRN12345</option>
        <option value="GHRN54321">GHRN54321</option>
        <option value="GHRN98765">GHRN98765</option>
        <!-- Add more options as needed -->
    </select>
</div>
</div>
      <div class="modal-footer text-center">
        
        <button  class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>
   </div>
   
  </div>
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