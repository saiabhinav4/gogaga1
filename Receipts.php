<?php
$title = "Receipts";
include "header.php";
include "mystyles.php";
?>

<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-sm-0  d-flex flex-column justify-content-center Page_Headers">Receipts</h4>
                <div class='mt-3'>
                    <button class='btn btn-outline-primary m-2' id='btn1' onclick='Tax()'>Tax Invoice</button>
                    <button class='btn btn-outline-primary m-2' id='btn2' onclick='Performa()'>Performa Invoice</button>
                    <button class='btn btn-outline-primary m-2' id='btn3' onclick='Receipt()'>Receipts</button>
                </div>
                <script>
                    function Tax() {
                        document.getElementById('tax').classList.remove('d-none')
                        document.getElementById('performa').classList.add('d-none')
                        document.getElementById('receipt').classList.add('d-none')

                    }

                    function Performa() {
                        document.getElementById('tax').classList.add('d-none')
                        document.getElementById('performa').classList.remove('d-none')
                        document.getElementById('receipt').classList.add('d-none')
                    }

                    function Receipt() {
                        document.getElementById('tax').classList.add('d-none')
                        document.getElementById('performa').classList.add('d-none')
                        document.getElementById('receipt').classList.remove('d-none')
                    }
                </script>

            </div>
            <!-- Tax Invoice Table -->
            <div class="card-body" id='tax'>

                <h3>Tax Invoice</h3>
                <div class='d-flex flex-row justify-content-end'>
                    <form action="Create_Tax_Invoice.php ">
                        <input type='submit' class='btn btn-primary' value='Create Tax Invoice'>
                    </form>
                </div>
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Reference No</th>
                                        <th>Invoice No</th>
                                        <th>Receipt To</th>
                                        <th>Travel Destination</th>
                                        <th>Travel Start Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>REF001</td>
                                        <td>INV001</td>
                                        <td>John Doe</td>
                                        <td>New York</td>
                                        <td>2023-09-10</td>
                                        <td>
                                            <a href="Tax_Invoice_View.php" class="btn btn-primary">View</a>
                                            <a href="Create_Tax_Invoice.php" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>REF002</td>
                                        <td>INV002</td>
                                        <td>Jane Smith</td>
                                        <td>Los Angeles</td>
                                        <td>2023-09-15</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>
                                            <a href="#" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>REF003</td>
                                        <td>INV003</td>
                                        <td>Bob Johnson</td>
                                        <td>Chicago</td>
                                        <td>2023-09-20</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>
                                            <a href="#" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="pagination text-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Performa Invoice Table -->


<div class="card-body d-none mt-0" id='performa'>


    <h3>Performa Invoice</h3>
    <div class='d-flex flex-row justify-content-end'>
        <form action="Create_Proforma_Invoice.php">
            <input type='submit' class='btn btn-primary' value='Create Proforma Invoice'>
        </form>
    </div>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Reference No</th>
                            <th>Invoice No</th>
                            <th>Receipt To</th>
                            <th>Travel Destination</th>
                            <th>Travel Start Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>REF001</td>
                            <td>INV001</td>
                            <td>John Doe</td>
                            <td>New York</td>
                            <td>2023-09-10</td>
                            <td>
                                <a href="Proforma_invoice_View.php" class="btn btn-primary">View</a>
                                <a href="Create_Proforma_Invoice.php" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>REF002</td>
                            <td>INV002</td>
                            <td>Jane Smith</td>
                            <td>Los Angeles</td>
                            <td>2023-09-15</td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="#" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>REF003</td>
                            <td>INV003</td>
                            <td>Bob Johnson</td>
                            <td>Chicago</td>
                            <td>2023-09-20</td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="#" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination text-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end cardaa -->






<!-- Receipts table Start -->


<div class="card-body d-none " id='receipt'>
    <h2>Receipts</h2>
    <div class='d-flex flex-row justify-content-end'>
        <form action="Create_Receipt.php">
            <input type='submit' class='btn btn-primary' value='Create Receipt'>
        </form>
    </div>

    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Reference No</th>
                            <th>Invoice No</th>
                            <th>Receipt To</th>
                            <th>Travel Destination</th>
                            <th>Travel Start Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>REF001</td>
                            <td>INV001</td>
                            <td>John Doe</td>
                            <td>New York</td>
                            <td>2023-09-10</td>
                            <td>
                                <a href="Receipt_View.php" class="btn btn-primary">View</a>
                                <a href="Create_Receipt.php" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>REF002</td>
                            <td>INV002</td>
                            <td>Jane Smith</td>
                            <td>Los Angeles</td>
                            <td>2023-09-15</td>
                            <td>
                                <a href="Receipt_View.php" class="btn btn-primary">View</a>
                                <a href="Create_Receipt.php" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>REF003</td>
                            <td>INV003</td>
                            <td>Bob Johnson</td>
                            <td>Chicago</td>
                            <td>2023-09-20</td>
                            <td>
                                <a href="Receipt_View.php" class="btn btn-primary">View</a>
                                <a href="Create_Receipt.php" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination text-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>





</div>
</div>



<?php
include "footer.php"
?>