<?php
$title = "Create New Lead";
include "header.php";
?>

<div class="card">
    <div class="card-header">
        <h4>Vouchers</h4>
    </div>
    <div class="card-body">

  
<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>GHRN No</th>
                    <th>Customer Name</th>
                    <th>Destination</th>
                    <th>Travel Start Date</th>
                    <th>Issued By</th>
                    <th>Date of Issuance</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345</td>
                    <td>John Doe</td>
                    <td>Paris, France</td>
                    <td>2023-09-15</td>
                    <td>Agent A</td>
                    <td>2023-09-01</td>
                    <td>Vouchered</td>
                    <td>
                        <a href="voucher-view.php" class="btn btn-primary">View</a>
                        <a href="voucher_manage.php" class="btn btn-success ">Manage</a>
                    </td>
                </tr>
                <tr>
                    <td>67890</td>
                    <td>Jane Smith</td>
                    <td>Tokyo, Japan</td>
                    <td>2023-10-05</td>
                    <td>Agent B</td>
                    <td>2023-09-03</td>
                    <td>Pending</td>
                    <td>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success">Manage</a>
                    </td>
                </tr>
                <!-- Add more rows with sample data as needed -->
            </tbody>
        </table>
        </div>
</div>
<?php
include "footer.php";
?>