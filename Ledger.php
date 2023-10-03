<?php
$title = "Ledger";
include "header.php";
include 'attachments.php';
?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header  bg-white p-3">
                <h4 class="mb-sm-0 font-size-24 d-flex flex-column justify-content-center">Ledger</h4>
                <div class="text-end">
                    <form action="Create_Ledger.php ">
                        <input type='submit' class='btn btn-primary' value='Add New Transaction'>
                    </form>
                </div>


            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 me-3 card ">
                            <div class="card-header fs-5  bg-white ">
                                Filter By Date
                            </div>
                            <table class="table table-borderless text-center w-50">
                                <thead>
                                    <tr>
                                        <th> Form</th>
                                        <th>To</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="date" class="form-control">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control">
                                        </td>

                                        <td>
                                            <button type="submit" class="btn btn-primary mb-2">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-3 me-3  h-25 m-auto">
                            <h6>Total Balance :</h6>
                            <h2 class="text-success">INR 44,00,000</h2>
                        </div>

                        

                    </div>
                </div>
            </div>


            <div class="container mt-2 card mb-3 p-3">
                <table id="transactionTable" class="table  ">
                    <thead class="table-light table-group-divider  mt-5">
                        <tr>
                            <th>Transaction Number</th>
                            <th>Transaction Date</th>
                            <th>GHRN Number</th>
                            <th>Transaction Particulars</th>
                            <th>Transaction Type</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <!-- Sample Data Rows -->
                        <tr>
                            <td>1</td>
                            <td>2023-09-01</td>
                            <td>GH123456</td>
                            <td>Purchase of Goods</td>
                            <td>Credit</td>
                            <td>100.00</td>
                            <td></td>
                            <td>100.00</td>
                        </tr>
                       
                        <tr>
                            <td>3</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>2023-09-02</td>
                            <td>GH789012</td>
                            <td>Sale of Services</td>
                            <td>Debit</td>
                            <td></td>
                            <td>50.00</td>
                            <td>50.00</td>
                        </tr>

                    </tbody>
                </table>
            </div>



            <script>
           
                $(document).ready(function() {

                    $('#transactionTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'copy',
                                text: 'Copy'
                            },
                            {
                                extend: 'excel',
                                text: 'Download Excel'
                            },
                            {
                                extend: 'pdf',
                                text: 'Download PDF'
                            },
                            {
                                extend: 'print',
                                text: 'Print'
                            }
                        ]
                    });


                });
            </script>

            <?php
            include "footer.php"
            ?>