<?php
$title = "Partner Payouts";
include "header.php";
?>

<!-- end page title -->
<div class="row">
    <div class="col-12">


        <div class="card">

        
            <div class="card-header">
                <h4 class="mb-sm-0 font-size-18 d-flex flex-column justify-content-center">Partner Payouts</h4>
                <div class='mt-3'>
                    <button class='btn btn-outline-primary m-2' id='btn1' onclick='all()'>All</button>
                    <button class='btn btn-outline-primary m-2' id='btn2' onclick='superpartner()'>Super Partner</button>
                    <button class='btn btn-outline-primary m-2' id='btn3' onclick='salespartner()'>Sales Partner</button>
                    <button class='btn btn-outline-primary m-2' id='btn4' onclick='leadgenerator()'>Lead Generator</button>
                </div>
            </div>

            <!-- All Partner Payouts  Table -->
            <div class="card-body " id='all'>
                <h3>All Partner Payouts </h3>
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id='AllPayoutsTable'>
                                <thead>
                                    <tr>
                                        <th>Partner Name</th>
                                        <th>Partner Type</th>
                                        <th>Customer Name</th>
                                        <th>Destination</th>
                                        <th>Trip Start Date</th>
                                        <th>Trip End Date</th>
                                        <th>Payout Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Data Rows -->
                                    <tr>
                                        <td>Partner 1</td>
                                        <td>Type A</td>
                                        <td>Customer 1</td>
                                        <td>Destination A</td>
                                        <td>2023-09-01</td>
                                        <td>2023-09-05</td>
                                        <td>Pending</td>
                                        <td>
                                            <a href="Partner_Payouts_View.php"> <button class="btn btn-success">View</button></a>
                                            <button class="btn btn-primary">Publish</button>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Partner 2</td>
                                        <td>Type B</td>
                                        <td>Customer 2</td>
                                        <td>Destination B</td>
                                        <td>2023-09-10</td>
                                        <td>2023-09-15</td>
                                        <td>Completed</td>
                                        <td>
                                            <button class="btn btn-success">View</button>
                                            <button class="btn btn-primary">Publish</button>
                                        </td>
                                    </tr>
                                    <!-- Add more sample data rows here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function() {

                $('#AllPayoutsTable').DataTable({
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



        <!-- Super Partnr Payouts Table-->
        <div class="card-body " id='superpartner'>

            <h3>Super Partner Payouts </h3>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered" id='SuperPartnerPayoutsTable'>
                            <thead>
                                <tr>
                                    <th>Partner Name</th>
                                    <th>Partner Type</th>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Trip Start Date</th>
                                    <th>Trip End Date</th>
                                    <th>Payout Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data Rows -->
                                <tr>
                                    <td>Partner 1</td>
                                    <td>Type A</td>
                                    <td>Customer 1</td>
                                    <td>Destination A</td>
                                    <td>2023-09-01</td>
                                    <td>2023-09-05</td>
                                    <td>Pending</td>
                                    <td>
                                        <button class="btn btn-success">View</button>
                                        <button class="btn btn-primary">Publish</button>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Partner 2</td>
                                    <td>Type B</td>
                                    <td>Customer 2</td>
                                    <td>Destination B</td>
                                    <td>2023-09-10</td>
                                    <td>2023-09-15</td>
                                    <td>Completed</td>
                                    <td>
                                        <button class="btn btn-success">View</button>
                                        <button class="btn btn-primary">Publish</button>
                                    </td>
                                </tr>
                                <!-- Add more sample data rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $(document).ready(function() {

        $('#SuperPartnerPayoutsTable').DataTable({
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


<!-- Sales Partnr Payouts Table-->
<div class="card-body " id='salespartner'>

    <h3>Sales Partner Payouts </h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id='SalesPartnerPayoutsTable'>
                    <thead>
                        <tr>
                            <th>Partner Name</th>
                            <th>Partner Type</th>
                            <th>Customer Name</th>
                            <th>Destination</th>
                            <th>Trip Start Date</th>
                            <th>Trip End Date</th>
                            <th>Payout Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Data Rows -->
                        <tr>
                            <td>Partner 1</td>
                            <td>Type A</td>
                            <td>Customer 1</td>
                            <td>Destination A</td>
                            <td>2023-09-01</td>
                            <td>2023-09-05</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-success">View</button>
                                <button class="btn btn-primary">Publish</button>

                            </td>
                        </tr>
                        <tr>
                            <td>Partner 2</td>
                            <td>Type B</td>
                            <td>Customer 2</td>
                            <td>Destination B</td>
                            <td>2023-09-10</td>
                            <td>2023-09-15</td>
                            <td>Completed</td>
                            <td>
                                <button class="btn btn-success">View</button>
                                <button class="btn btn-primary">Publish</button>
                            </td>
                        </tr>
                        <!-- Add more sample data rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {

        $('#SalesPartnerPayoutsTable').DataTable({
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




<!-- Lead Generator Payouts Table-->
<div class="card-body " id='leadgenerator'>

    <h3>Lead Generator Payouts </h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id='LeadGeneratorPayoutsTable'>
                    <thead>
                        <tr>
                            <th>Partner Name</th>
                            <th>Partner Type</th>
                            <th>Customer Name</th>
                            <th>Destination</th>
                            <th>Trip Start Date</th>
                            <th>Trip End Date</th>
                            <th>Payout Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Data Rows -->
                        <tr>
                            <td>Partner 1</td>
                            <td>Type A</td>
                            <td>Customer 1</td>
                            <td>Destination A</td>
                            <td>2023-09-01</td>
                            <td>2023-09-05</td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-success">View</button>
                                <button class="btn btn-primary">Publish</button>

                            </td>
                        </tr>
                        <tr>
                            <td>Partner 2</td>
                            <td>Type B</td>
                            <td>Customer 2</td>
                            <td>Destination B</td>
                            <td>2023-09-10</td>
                            <td>2023-09-15</td>
                            <td>Completed</td>
                            <td>
                                <button class="btn btn-success">View</button>
                                <button class="btn btn-primary">Publish</button>
                            </td>
                        </tr>
                        <!-- Add more sample data rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>



<script>
    $(document).ready(function() {

        $('#LeadGeneratorPayoutsTable').DataTable({
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


<script>
    function all() {
        document.getElementById('all').classList.remove('d-none')
        document.getElementById('superpartner').classList.add('d-none')
        document.getElementById('salespartner').classList.add('d-none')
        document.getElementById('leadgenerator').classList.add('d-none')


    }

    function superpartner() {
        document.getElementById('all').classList.add('d-none')
        document.getElementById('superpartner').classList.remove('d-none')
        document.getElementById('salespartner').classList.add('d-none')
        document.getElementById('leadgenerator').classList.add('d-none')

    }

    function salespartner() {
        document.getElementById('all').classList.add('d-none')
        document.getElementById('superpartner').classList.add('d-none')
        document.getElementById('salespartner').classList.remove('d-none')
        document.getElementById('leadgenerator').classList.add('d-none')

    }

    function leadgenerator() {
        document.getElementById('all').classList.add('d-none')
        document.getElementById('superpartner').classList.add('d-none')
        document.getElementById('salespartner').classList.add('d-none')
        document.getElementById('leadgenerator').classList.remove('d-none')

    }
</script>











<?php
include "footer.php";
?>