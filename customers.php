<?php
$title = "Dashboard";
include "header.php";
include "config.php";

// Fetch packages data from the database
$sql = "SELECT * FROM packages";
$result = mysqli_query($conn, $sql);

?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Customers</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class='mt-3'>
                <button class='btn btn-outline-primary m-2' id='btn1' onclick='a()'>All Customers</button>
                <button class='btn btn-outline-primary m-2' id='btn2' onclick='b()'>Pending Customers</button>
                <button class='btn btn-outline-primary m-2' id='btn3' onclick='c()'>Submitted Customers</button>
                <button class='btn btn-outline-primary m-2' id='btn4' onclick='d()'>Confirmed Customers</button>
                <button class='btn btn-outline-primary m-2' id='btn5' onclick='e()'>Deleted Customers</button>
            </div>
            <div class="card-header text-end">

                <script>
                    function a() {
                        document.getElementById('a').classList.remove('d-none')
                        document.getElementById('b').classList.add('d-none')
                        document.getElementById('c').classList.add('d-none')
                        document.getElementById('d').classList.add('d-none')
                        document.getElementById('e').classList.add('d-none')

                    }

                    function b() {
                        document.getElementById('a').classList.add('d-none')
                        document.getElementById('b').classList.remove('d-none')
                        document.getElementById('c').classList.add('d-none')
                        document.getElementById('d').classList.add('d-none')
                        document.getElementById('e').classList.add('d-none')

                    }

                    function c() {
                        document.getElementById('a').classList.add('d-none')
                        document.getElementById('b').classList.add('d-none')
                        document.getElementById('c').classList.remove('d-none')
                        document.getElementById('d').classList.add('d-none')
                        document.getElementById('e').classList.add('d-none')
                    }

                    function d() {
                        document.getElementById('a').classList.add('d-none')
                        document.getElementById('b').classList.add('d-none')
                        document.getElementById('c').classList.add('d-none')
                        document.getElementById('d').classList.remove('d-none')
                        document.getElementById('e').classList.add('d-none')
                    }

                    function e() {
                        document.getElementById('a').classList.add('d-none')
                        document.getElementById('b').classList.add('d-none')
                        document.getElementById('c').classList.add('d-none')
                        document.getElementById('d').classList.add('d-none')
                        document.getElementById('e').classList.remove('d-none')
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<div class="card-body" id='a'>
    <h3>All Customers</h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 120.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Partner</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Online</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Reference</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card-body d-none" id='b'>
    <h3>Pending Customers</h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Partner/online/Reference</td>
                            <td>22-08-2023</td>
                            <td><button class='btn btn-primary'>View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="card-body d-none" id='c'>
    <h3>Submitted Customers</h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Partner/online/Reference</td>
                            <td>22-08-2023</td>
                            <td><button class='btn btn-primary'>View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="card-body d-none" id='d'>
    <h3>Confirmed Customers</h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Partner</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Pax
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Pax</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <div class='container'>
                                                        <div class='row p-3 ' style='background-color:#b3b1b1'>
                                                            <div class='col-sm-12 col-md-6'>
                                                                <h5 class='inline'>Customer Name : <span style='font-size:16px'>AAA</span></h5>

                                                            </div>

                                                            <div class='col-sm-12 col-md-6'>
                                                                <h5 class='inline'>Customer Name : <span style='font-size:16px'>AAA</span></h5>

                                                            </div>

                                                        </div>
                                                        <div class='row mt-3'>
                                                            <div id='add_pax_cont1' class='col-sm-12 col-md-6'></div>
                                                            <div id='add_pax_cont2' class='col-sm-12 col-md-6'></div>
                                                            <div id='add_pax_cont3' class='col-sm-12 col-md-12  text-center'></div>
                                                        </div>
                                                    </div>


                                                    <button class='btn btn-primary mt-3' onclick='addpax()'>Add More</button>

                                                    <script>
                                                        function addpax() {
                                                            // Customer  Name Label
                                                            let input_element_name = document.createElement('label');
                                                            input_element_name.textContent = 'Customer Name';
                                                            // Customer  Number Label
                                                            let input_element_number = document.createElement('label');
                                                            input_element_number.textContent = 'Customer Number';
                                                            // Customer  Name Input
                                                            let input_element1 = document.createElement('input');
                                                            input_element1.classList.add('form-control');
                                                            input_element1.setAttribute('type', 'text');

                                                            // // Button Element
                                                            // let element_button=document.createElement('button');
                                                            // element_button.classList.add('btn');
                                                            // element_button.classList.add('btn-primary');

                                                            // element_button.classList.add('mt-4');
                                                            // element_button.textContent='Save';

                                                            // Customer  Number Input
                                                            let input_element2 = document.createElement('input');
                                                            input_element2.classList.add('form-control');
                                                            input_element2.setAttribute('type', 'text');
                                                            let submit = document.createElement('label');
                                                            //Appending Data into Modal
                                                            document.getElementById('add_pax_cont1').appendChild(input_element_name)
                                                            document.getElementById('add_pax_cont1').appendChild(input_element1)
                                                            document.getElementById('add_pax_cont2').appendChild(input_element_number)
                                                            document.getElementById('add_pax_cont2').appendChild(input_element2)
                                                            document.getElementById('add_pax_cont3').appendChild(element_button)


                                                        }
                                                    </script>

                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-primary">Save Info</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Online</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>
                                    <button class='btn btn-secondary'> Add Pax</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Reference</td>
                            <td>22-08-2023</td>
                            <td>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>View</button>
                                    <button class='btn btn-secondary'> Add Pax</button>
                                </div>
                            </td>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="card-body d-none" id='e'>
    <h3>Deleted Customers</h3>
    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>aaa</td>
                            <td>1234</td>
                            <td>Goa</td>
                            <td>2</td>
                            <td>4</td>
                            <td>Partner/online/Reference</td>
                            <td>22-08-2023</td>
                            <td><button class='btn btn-primary'>View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include "footer.php";
?>

<!-- end page title -->
<!-- <div class="row">
                            <div class="col-12" >
                                <div class="card">
                                    <div class="card-header">
                                    <h4 class="mb-sm-0 font-size-18 d-flex flex-column justify-content-center">Customers</h4>
                                    <div class='mt-3'>
                                    <button class='btn btn-outline-primary m-2' id='btn1' onclick='all()'>All Customers</button>
                                    <button class='btn btn-outline-primary m-2' id='btn2' onclick='pending()'>Pending Customers</button>
                                    <button class='btn btn-outline-primary m-2' id='btn3' onclick='submitted()'>Submitted Customers</button>
                                    <button class='btn btn-outline-primary m-2' id='btn4' onclick='confirmed()'>Confirmed Customers</button>
                                    <button class='btn btn-outline-primary m-2' id='btn5' onclick='deleted()'>Deleted Customers</button>
                                    </div>

                                    <script> 
                                     function all(){
                                document.getElementById('all').classList.remove('d-none')
                                document.getElementById('pending').classList.add('d-none')
                                document.getElementById('submitted').classList.add('d-none')
                                document.getElementById('confirmed').classList.add('d-none')
                                document.getElementById('deleted').classList.add('d-none')

                            }
                            function pending(){
                                document.getElementById('all').classList.add('d-none')
                                document.getElementById('pending').classList.remove('d-none')
                                document.getElementById('submitted').classList.add('d-none')
                                document.getElementById('confirmed').classList.add('d-none')
                                document.getElementById('deleted').classList.add('d-none')

                            }
                            function submitted(){
                                document.getElementById('all').classList.add('d-none')
                                document.getElementById('pending').classList.add('d-none')
                                document.getElementById('submitted').classList.remove('d-none')
                                document.getElementById('confirmed').classList.add('d-none')
                                document.getElementById('deleted').classList.add('d-none')
                            }
                            function confirmed(){
                                document.getElementById('all').classList.add('d-none')
                                document.getElementById('pending').classList.add('d-none')
                                document.getElementById('submitted').classList.add('d-none')
                                document.getElementById('confirmed').classList.remove('d-none')
                                document.getElementById('deleted').classList.add('d-none')
                            }
                            function deleted(){
                                document.getElementById('all').classList.add('d-none')
                                document.getElementById('pending').classList.add('d-none')
                                document.getElementById('submitted').classList.add('d-none')
                                document.getElementById('confirmed').classList.add('d-none')
                                document.getElementById('deleted').classList.remove('d-none')
                            }
                        </script>

                                    <div class='d-flex flex-row justify-content-end'>
                                        <form action="new_itnerys.php ">
                                        <input type='submit' class='btn btn-primary'value='Add Customer'>
                                        </form>
                                    </div>  
                                    </div>
                                    
                                    
                          <!- All Customers Table -->




<!-- Confirmed Customers Table
                <div class="card-body" id='confirmed'>
                    <h3>Confirmed Customers</h3>
                                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">   
                                              <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 194.2px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Customer Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 289.2px;" aria-label="Position: activate to sort column ascending">Customer Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 142.2px;" aria-label="Office: activate to sort column ascending">Destination</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 69.2px;" aria-label="Age: activate to sort column ascending">Pax</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Duration</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Source</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 135.2px;" aria-label="Start date: activate to sort column ascending">Raised Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 121.2px;" aria-label="Salary: activate to sort column ascending">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>aaa</td>
                                            <td>1234</td>
                                            <td>Goa</td>
                                            <td>2</td>
                                            <td>4</td>
                                            <td>Partner/online/Reference</td>
                                            <td>22-08-2023</td>
                                            <td><button class='btn btn-primary'>View</button></td>
                                        </tr>
                                    
                                
                                   
                                    
                                   </tbody>
                                </table></div></div>
                            </div>
                        </div>
                       
                    </div> 
                </div> -->