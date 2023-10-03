<?php
$title = "Dashboard";
include "header.php";
?>


<div class="card">
  <div class="card-header">
    <h4>Add New Reimbursement</h4>
  </div>
  <div class="card-body">
     
  <div class="container mt-2">
       
        <form>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="dateOfRequest" class="form-label">Date of Request</label>
                    <input type="date" class="form-control" id="dateOfRequest" disabled>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="formNumber" class="form-label">Form Number</label>
                    <input type="text" class="form-control" id="formNumber" disabled>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="employeeID" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="employeeID">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="employeeName" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="employeeName">
                </div> 


                <div class="col-lg-6 mb-3">
                    <label for="fromDate" class="form-label">From Date</label>
                    <input type="date" class="form-control" id="fromDate">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="toDate" class="form-label">To Date</label>
                    <input type="date" class="form-control" id="toDate">
                </div>

                
                <div class="col-lg-6 mb-3">
                    <label for="emailID" class="form-label">Email ID</label>
                    <input type="email" class="form-control" id="emailID">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="managerName" class="form-label">Manager Name</label>
                    <input type="text" class="form-control" id="managerName">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="jobLocation" class="form-label">Job Location</label>
                    <input type="text" class="form-control" id="jobLocation">
                </div>

                <div class="col-lg-6 mb-3">
                    <label for="businessPurpose" class="form-label">Business-Purpose of Travel</label>
                    <select class="form-select" id="businessPurpose">
                        <option value="Partner Recruitment">Partner Recruitment</option>
                        <option value="Sales Call">Sales Call</option>
                        <option value="Marketing Activity">Marketing Activity</option>
                        <option value="Other Reasons">Other Reasons</option>
                    </select>
                </div>
            
                
            
            
                
                <div class="col-lg-12 mb-3">
                    <label for="otherReasons" class="form-label">If any other reasons, specify</label>
                    <textarea name="" id="" cols="30" rows="2" class='form-control'></textarea>
                </div>
            
</div>
        </form>



        
    <h4>Particulars</h4>
  </div>
  <div class="card-body p-2">

  <div class="container mt-2">
        
        <table class="table table-bordered p-2">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Expense Particulars</th>
                    <th>Distance Travelled (in KMS)</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="expenseTableBody">
                <tr>
                    <td><input type="date" class="form-control" name="date[]"></td>
                    <td><input type="text" class="form-control" name="category[]"></td>
                    <td><input type="text" class="form-control" name="particulars[]"></td>
                    <td><input type="number" class="form-control" name="distance[]"></td>
                    <td><input type="number" class="form-control" name="cost[]"></td>
                    <td><button type="button" class="btn btn-primary" onclick="addRow()">Add</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        function addRow() {
            const tableBody = document.getElementById('expenseTableBody');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td><input type="date" class="form-control" name="date[]"></td>
                <td><input type="text" class="form-control" name="category[]"></td>
                <td><input type="text" class="form-control" name="particulars[]"></td>
                <td><input type="number" class="form-control" name="distance[]"></td>
                <td><input type="number" class="form-control" name="cost[]"></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
            `;

            tableBody.appendChild(newRow);
        }

        function removeRow(button) {
            const tableRow = button.parentNode.parentNode;
            tableRow.parentNode.removeChild(tableRow);
        }
    </script>
    
  </div>
</div>
<div class='row  m-5'>

                <div class="col-lg-4 mb-3">
                    <label for="emailID" class="form-label">Sub Total</label>
                    <input type="text" class="form-control" id="emailID">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="managerName" class="form-label">Less Cash Advance</label>
                    <input type="text" class="form-control" id="managerName">
                </div>

                <div class="col-lg-4 mb-3">
                    <label for="jobLocation" class="form-label">Total Reiumbursement</label>
                    <input type="text" class="form-control" id="jobLocation">
                </div>

</div>





    
<div class='text-center m-3'>
            <button type="submit" class="btn btn-primary">Submit</button>

            </div>

  </div>
</div>



    

<?php
        include "footer.php";
?>