<?php
$title = "Teams";
include "header.php";
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Teams</h4>

        </div><!-- end card header -->

        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Team Head</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Team Leads</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">Team Members</span>
                    </a>
                </li>

            </ul>
            <hr>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active card" id="home-1" role="tabpanel">
                    <div class="card-header text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Team Head
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Team Head</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-start mt-2 mb-2">
                                            <label>Employee Name</label>
                                            <select name="" id="" class="form-select">
                                                <option value="" selected disabled>Select</option>
                                                <option value="">Deepak</option>
                                                <option value="">Anil</option>
                                                <option value="">Bharat</option>
                                                <option value="">Vinay</option>
                                            </select>
                                        </div>

                                        <div class="text-start mt-2 mb-2">
                                            <label>Department</label>
                                            <select name="" id="" class="form-select">
                                                <option value="" selected disabled>Select</option>
                                                <option value="">Sales</option>
                                                <option value="">Operations</option>
                                                <option value="">Accounts</option>
                                                <option value="">Bookingss</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                            <tr>
                                <td>GH8000</td>
                                <td>Deepak</td>
                                <td>Operations </td>
                                <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TeamHeadEdit">Edit</button>

                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>GH8001</td>
                                <td>Anil</td>
                                <td>Accounts </td>
                                <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TeamHeadEdit">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-pane card" id="profile-1" role="tabpanel">
                    <div class="card-header text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            Add Team
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel1">Add Team</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-start mb-2 mt-2">
                                            <label>Team Name</label>
                                            <input type="text" class="form-control">

                                        </div>
                                        <div class="text-start mt-2 mb-2">
                                            <label>Department</label>
                                            <select name="" id="" class="form-select">
                                                <option value="" selected disabled>Select</option>
                                                <option value="">Sales</option>
                                                <option value="">Operations</option>
                                                <option value="">Accounts</option>
                                                <option value="">Bookingss</option>
                                            </select>
                                        </div>

                                        <div class="text-start mt-2 mb-2">
                                            <label>Team Leader Name</label>
                                            <select name="" id="" class="form-select">
                                                <option value="" selected disabled>Select</option>
                                                <option value="">Deepak</option>
                                                <option value="">Anil</option>
                                                <option value="">Bharat</option>
                                                <option value="">Vinay</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Employee ID</th>
                                <th>Team Lead Name</th>
                                <th>Team Name</th>
                                <th>Asscociated Team Head</th>
                                <th>Department Name</th>
                                <th>Actions</th>

                            </tr>

                            <tr>
                                <td rowspan="4">GH8012</td>
                                <td rowspan="4">Dinesh</td>
                                <td rowspan="4">Operations Team</td>
                                <td>Deepak</td>
                                <td rowspan="4">Operations </td>
                                <td rowspan="4">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TeamLeadEdit">Edit</button>
</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>

                            </tr>

                            <tr>
                                <td>Anil</td>
                            </tr>

                            <tr>
                                <td>Vinay</td>
                            </tr>

                            <tr>
                                <td>Sai</td>
                            </tr>


                            <tr>
                                <td rowspan="3">GH8016</td>
                                <td rowspan="3">Lokesh</td>
                                <td rowspan="3">Sales Team</td>
                                <td>Moteesh</td>
                                <td rowspan="3">Sales </td>
                                <td rowspan="3">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TeamLeadEdit">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>

                            </tr>

                            <tr>
                                <td>Bharat</td>
                            </tr>

                            <tr>
                                <td>Shiva</td>
                            </tr>


                        </table>
                    </div>
                </div>
                <div class="tab-pane card" id="messages-1" role="tabpanel">
                    <div class="card-header text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            Add Team Member
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog text-start">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel2">Add Team Member</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="div">
                                            <form action="">
                                                <div class="text-start mt-2 mb-2">
                                                    <label>Under Team Head</label>
                                                    <select name="" id="" class="form-select">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="">Deepak</option>
                                                        <option value="">Anil</option>
                                                        <option value="">Bharat</option>
                                                        <option value="">Vinay</option>
                                                    </select>
                                                </div>

                                                <div class="text-start mt-2 mb-2">
                                                    <label>Under Team </label>
                                                    <select name="" id="" class="form-select">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="">Team1</option>
                                                        <option value="">Team2</option>
                                                        <option value="">Team3</option>
                                                        <option value="">Team4</option>
                                                    </select>
                                                </div>


                                                <div class="text-start mt-2 mb-2">
                                                    <label for="choices-multiple-default" class="form-label font-size-20 ">Add Team Members</label>
                                                    <select class="form-control" data-trigger name="Reservation _Type" id="choices-multiple-default" placeholder="Reservation Type" multiple>
                                                        <option value="Choice 1">Ahmed</option>
                                                        <option value="Choice 2">Atanu</option>
                                                        <option value="Choice 3">Girish</option>
                                                        <option value="Choice 4">Rahul</option>
                                                        <option value="Choice 5">Usha</option>
                                                        <option value="Choice 6">Teja</option>

                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mt-3">
                            <tr>
                                <th>Asscociated Team Head</th>
                                <th>Asscociated Team Lead</th>
                                <th>Team Name</th>
                                <th>Department Name</th>
                                <th>Employee ID</th>
                                <th>Team Member Name</th>


                            </tr>

                            <tr>

                                <td rowspan="6">Deepak</td>
                                <td rowspan="3">Dinesh</td>
                                <td rowspan="3">Operations Team</td>
                                <td rowspan="3">Operations </td>
                                <td>GH8012</td>
                                <td>Ahmed</td>


                            </tr>

                            <tr>
                                <td>GH8111</td>
                                <td>Teja</td>
                            </tr>

                            <tr>
                                <td>GH8114</td>
                                <td>Ajay</td>
                            </tr>

                            <tr>
                                <td rowspan="3">Akhil</td>
                                <td rowspan="3">Accounts Team</td>
                                <td rowspan="3">Accounts</td>

                                <td>GH8116</td>
                                <td>Sai</td>

                            </tr>

                            <tr>
                                <td>GH8113</td>
                                <td>Usha</td>
                            </tr>

                            <tr>
                                <td>GH8112</td>
                                <td>Girish</td>
                            </tr>

                            <tr>
                                <td rowspan="6">Anil</td>
                                <td rowspan="3">Vinay</td>
                                <td rowspan="3">Bookings Team</td>
                                <td rowspan="3">Bookings </td>
                                <td>GH8012</td>
                                <td>Ahmed</td>
                            </tr>

                            <tr>
                                <td>GH8111</td>
                                <td>Teja</td>
                            </tr>


                            <tr>
                                <td>GH8114</td>
                                <td>Ajay</td>
                            </tr>


                            <tr>
                                <td rowspan="3">Akhil</td>
                                <td rowspan="3">Sales Team</td>
                                <td rowspan="3">Sales</td>
                                <td>GH8116</td>
                                <td>Sai</td>

                            </tr>


                            <tr>
                                <td>GH8113</td>
                                <td>Usha</td>
                            </tr>

                            <tr>

                                <td>GH8112</td>
                                <td>Girish</td>


                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="settings-1" role="tabpanel">
                    <p class="mb-0">
                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                        art party before they sold out master cleanse gluten-free squid
                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                        art party locavore wolf cliche high life echo park Austin. Cred
                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                        farm-to-table.
                    </p>
                </div>
            </div>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="TeamHeadEdit" tabindex="-1" aria-labelledby="TeamHeadEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TeamHeadEditLabel">Edit Team Head</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mt-2 mb-2">
                    <label>Employee Name</label>
                    <select name="" id="" class="form-select">
                        <option value="" disabled>Select</option>
                        <option value="" selected>Deepak</option>
                        <option value="">Anil</option>
                        <option value="">Bharat</option>
                        <option value="">Vinay</option>
                    </select>
                </div>

                <div class="text-start mt-2 mb-2">
                    <label>Department</label>
                    <select name="" id="" class="form-select">
                        <option value="" disabled>Select</option>
                        <option value="">Sales</option>
                        <option value="" selected>Operations</option>
                        <option value="">Accounts</option>
                        <option value="">Bookingss</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>





<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="TeamLeadEdit" tabindex="-1" aria-labelledby="TeamLeadEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TeamLeadEditLabel">Edit Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-start mb-2 mt-2">
                    <label>Team Name</label>
                    <input type="text" class="form-control" value="Team 1">

                </div>


                <div class="text-start mt-2 mb-2">
                    <label>Department</label>
                    <select name="" id="" class="form-select">
                        <option value="" disabled>Select</option>
                        <option value="" selected>Sales</option>
                        <option value="">Operations</option>
                        <option value="">Accounts</option>
                        <option value="">Bookingss</option>
                    </select>
                </div>

                <div class="text-start mt-2 mb-2">
                    <label>Team Leader Name</label>
                    <select name="" id="" class="form-select">
                        <option value="" disabled>Select</option>
                        <option value="">Deepak</option>
                        <option value="">Anil</option>
                        <option value="">Bharat</option>
                        <option value="" selected>Vinay</option>
                    </select>
                </div>

                <div class="text-center">
                    <button class="btn btn-warning" onclick="edit_member()" id='edit_member_button'>Edit Team Members</button>
                </div>

                <div class="container mt-5 d-none" id='Team_Member_Edit'>

                <div class="text-start mt-2 mb-3">
                    <label>Team Head</label>
                    <select name="" id="" class="form-select">
                        <option value="" selected disabled>Select</option>
                        <option value="" >Deepak</option>
                        <option value="">Anil</option>
                        <option value="">Bharat</option>
                        <option value="">Vinay</option>
                    </select>
                </div>

                    <div class="text-start mt-2 mb-3">
                        <label>Team Name</label>
                        <select name="" id="" class="form-select">
                            <option value="" selected disabled>Select</option>
                            <option value="">Team1</option>
                            <option value="">Team2</option>
                            <option value="">Team3</option>
                            <option value="">Team4</option>
                        </select>
                    </div>
                    <h5>Team Members</h5>
                    <ul class="list-group" id="item-list">
                        <!-- Default list items -->
                        <li class="list-group-item">
                            Ahmed
                            <span class="float-end">
                                <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
                            </span>
                        </li>
                        <li class="list-group-item">
                            Rahul
                            <span class="float-end">
                                <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
                            </span>
                        </li>
                        <li class="list-group-item">
                            Akhil
                            <span class="float-end">
                                <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
                            </span>
                        </li>
                        <li class="list-group-item">
                            Usha
                            <span class="float-end">
                                <button class="btn btn-danger btn-sm" onclick="removeItem(this)">Remove</button>
                            </span>
                        </li>
                    </ul>

                    <!-- Dropdown menu for selecting items to add -->
                    <div class="form-group mt-3">
                        <label for="item-select">Select Team Member:</label>
                        <select class="form-select" id="item-select">
                            <option value="Sai">Sai</option>
                            <option value="Aditya">Aditya</option>
                            <option value="Ajay">Ajay</option>
                        </select>
                    </div>

                    <button class="btn btn-primary mt-3" id="add-item">Add Member</button>
                </div>

                <!-- Include Bootstrap and jQuery JS -->


                <script>
                    function edit_member() {
                        document.getElementById('Team_Member_Edit').classList.remove('d-none');
                        document.getElementById('edit_member_button').classList.add('d-none')

                    }

                    // Function to add a new list item based on the selected value from the dropdown
                    function addItem() {
                        const itemList = document.getElementById('item-list');
                        const selectedItem = document.getElementById('item-select').value;
                        const newItem = document.createElement('li');
                        newItem.classList.add('list-group-item');
                        newItem.innerHTML = `
                ${selectedItem}
                <span class="float-left">
                    <button class="btn btn-danger btn-sm float-end" onclick="removeItem(this)">Remove</button>
                </span>
            `;
                        itemList.appendChild(newItem);
                    }

                    // Function to remove a list item
                    function removeItem(button) {
                        const itemList = document.getElementById('item-list');
                        const listItem = button.closest('li');
                        itemList.removeChild(listItem);
                    }

                    // Add an event listener to the "Add Item" button
                    document.getElementById('add-item').addEventListener('click', addItem);
                </script>



            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">Save </button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="domestic.js"></script>
<?php
include 'footer.php';
?>