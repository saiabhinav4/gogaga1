<?php
$title = 'Trips';
include 'header.php';
include "attachments.php";
?>

<div class="container-fluid mt-4">
    <h2 class="mb-3">Trips</h2>
    <div class="card">
        <div class="card-header  bg-white p-4">

            <ul class="nav nav-tabs" id="tripTabs">
                <li class="nav-item">
                    <a class="nav-link active btn-dark" id="ongoing-tab" data-toggle="tab" href="#ongoing">Ongoing Trips</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-primary" id="completed-tab" data-toggle="tab" href="#completed">Completed Trips</a>
                </li>
            </ul>
        </div>
        <div class="card-body m-3">
            <div class="tab-content">

                <div class="tab-pane fade show active" id="ongoing">
                    <h4 class="mb-4">Ongoing Trips</h4>
                    <div class="table-responsive">
                        <div class="table-toolbar">
                            <div class="table-toolbar-item">

                            </div>
                        </div>
                        <table class="table table-bordered table-striped " id="ongoing-table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Trip Start Date</th>
                                    <th>Trip End Date</th>
                                    <th>Manager</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data for Ongoing Trips -->
                                <tr>
                                    <td>John</td>
                                    <td>New York</td>
                                    <td>2023-09-10</td>
                                    <td>2023-09-15</td>
                                    <td>Jane</td>
                                    <td><button class="btn btn-primary">View</button>
                                    <button class="btn btn-primary">Download Voucher</button></td>
                                </tr>

                                <tr>
                                    <td>Doe</td>
                                    <td>Mexico</td>
                                    <td>2023-09-17</td>
                                    <td>2023-09-20</td>
                                    <td>Smith</td>
                                    <td><button class="btn btn-primary">View</button>
                                    <button class="btn btn-primary">Download Voucher</button></td>
                                </tr>
                                <!-- Add more sample data here -->
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="tab-pane fade" id="completed">
                    <h4 class="mb-4">Completed Trips</h4>
                    <div class="table-responsive">
                        <div class="table-toolbar">
                            <div class="table-toolbar-item">

                            </div>
                        </div>
                        <table class="table table-bordered table-striped" id="completed-table">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Trip Start Date</th>
                                    <th>Trip End Date</th>
                                    <th>Manager</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Data for Completed Trips -->
                                <tr>
                                    <td>Alice</td>
                                    <td>Los Angeles</td>
                                    <td>2023-08-20</td>
                                    <td>2023-08-25</td>
                                    <td>Bob </td>
                                    <td><button class="btn btn-primary">View</button></td>
                                </tr>
                                <tr>
                                    <td>Johnson</td>
                                    <td>Los Angeles</td>
                                    <td>2023-08-20</td>
                                    <td>2023-08-25</td>
                                    <td>Wilson</td>
                                    <td><button class="btn btn-primary">View</button></td>
                                </tr>
                                <!-- Add more sample data here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#ongoing-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copy'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF'
                },
                {
                    extend: 'print',
                    text: 'Print'
                }
            ]
        });
        $('#completed-table').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copy',
                    text: 'Copy'
                },
                {
                    extend: 'excel',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'PDF'
                },
                {
                    extend: 'print',
                    text: 'Print'
                }
            ]
        });

        // Export buttons for the top of the tables
        $('#export-ongoing').click(function() {
            $('#ongoing-table').DataTable().button('excel').trigger();
        });

        $('#export-completed').click(function() {
            $('#completed-table').DataTable().button('excel').trigger();
        });
    });
</script>


<?php
include 'footer.php';
?>