<?php
$title = "Create New Lead";
include "header.php";
?>
<style>
    .switch-tab-buttons {
        color: #3e40c7;
        border: 1px solid #3e40c7;
        width: 250px;
        margin: 10px;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="card">
    <div class="card-header bg-white">
        <h5>CIH</h5>
        <div>
        <button class="btn btn-outline-primary switch-tab-buttons">Ongoing Trips</button>
        <button class="btn btn-outline-primary switch-tab-buttons">Completed Trips</button>
        </div>
    </div>
    <div class="card-body">

    
<table class="table table-bordered table-responsive ">
    <thead>
        <tr class=" table-bordered  ">
            <th style="min-width:100px" rowspan="6">S. No</th>
            <th style="min-width:200px" rowspan="6">Source</th>
            <th style="min-width:200px" rowspan="6">GHRN</th>
            <th style="min-width:200px" rowspan="6">Customer Name</th>
            <th style="min-width:200px" rowspan="6">Trip End Date</th>
            <th style="min-width:200px" rowspan="6">Product</th>
            <th style="min-width:200px" rowspan="6">VOUCHER STATUS</th>
            <th style="min-width:200px" rowspan="6">Total Package Cost</th>
            <th style="min-width:200px" rowspan="6">Land Cost</th>
            <th style="min-width:200px" rowspan="6">Funds Received</th>
            <th style="min-width:200px" rowspan="6">Total Paid</th>

        </tr>
        <tr>
            <th>1122333</th>
            <th>2223322</th>
            <th>333333</th>

        </tr>
        <tr>
            <th>1122333</th>
            <th>2223322</th>
            <th>333333</th>

        </tr>
        <tr>

            <th style="min-width: 200px;">Gogaga Profit</th>
            <th style="min-width: 200px;">Funds with company</th>
            <th style="min-width: 200px;">Excess With Gogaga</th>
        </tr>

    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>GOGAGA HOLIDAYS - OWN BUSINESS</td>
            <td>17024</td>

            <td>Mr. SIVA</td>
            <td>16-Aug-2023</td>
            <td>DUBAI</td>
            <td>130,719.00</td>
            <td>112319</td>
            <td>20000</td>
            <td>0</td>
            <td>112319</td>
            <td>20000</td>
            <td>20000</td>
            <td>20000</td>
        </tr>
        <tr>
            <td>2</td>
            <td>GOGAGA HOLIDAYS - OWN BUSINESS</td>
            <td>17123</td>

            <td>MRS TULASI</td>
            <td>14-Aug-2023</td>
            <td>GOA</td>
            <td>44,606.00</td>
            <td>27518</td>
            <td>23000</td>
            <td>22053</td>
            <td>27518</td>
            <td>23000</td>
            <td>22053</td>
            <td>22053</td>
        </tr>
    </tbody>

</table>

</div>
</div>

<?php
include "footer.php";
?>