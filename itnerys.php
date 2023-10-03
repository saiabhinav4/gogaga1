<?php
$title = "Itineraries";
include "header.php";

?>
<script>
    $(document).ready(function() {
        $(".assign").click(function() {
            $(".lead_id").val(this.id);
        })
    })
</script>
<div class="modal fade confirm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <h5>Confirm Version</h5>
                    <form id="assignStaff">
                        <div class="form-group">
                            <input type="text" class="form-control lead_id" name="lead_id" hidden /><br />
                            <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>" hidden /><br />
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option>GOIT001_030723V1.xlsx</option>
                                <option>GOIT001_030723V2.xlsx</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Confirm" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade excelup " tabindex="-1" aria-hidden="true" id="modal">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4>Upload Files</h4>
                </div>
                <div class="oldVersions p-5">
                    <table class="table table-bordered p-5">
                        <thead>
                            <tr>
                                <th>Version No#.</th>
                                <th>Package Title</th>
                                <th >Upload Costsheet</th>
                                <th>Upload Itinenary</th>
                                <th>Uploaded Date</th>
                                <th>Save</th>
                                <th>Status</th>
                                <th class="confirm-button d-none">Publish</th>
                                <th class="confirm-button d-none">Actions</th>
                                
                              


                            </tr>
                        </thead>
                        <tbody>
                            <tr class="version-row d-none">
                                <td colspan="" style="text-align:center">GHRN1453/A</td>
                                <td><input type="text" class="form-control"></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="date" name="date" class="form-control" /></td>

                                <td colspan="" style="text-align:center"><input type="submit" class="btn btn-primary" value="Save" name="Save" /></td>
                              
                                
                                <td class="Approve-Publish-buttons d-none" style="min-width: 250px;">
                                <span class="me-3">QC Pending</span>
                                <a href='international_form.php' class="me-2"><input type="submit" class="btn btn-success" value="Approve" name="Confirm" /></a>
                                </td>
                                <td class="confirm-button">
                               <a href='international_form.php' ><input type="submit" class="btn btn-success" value="Publish" name="Confirm" /></a>
                               </td>
                               <td class="confirm-button d-none">
                                    <a href='international_form.php'><input type="submit" class="btn btn-success" value="Confirm" name="Confirm" /></a>
                                </td>
                            </tr>

                            <tr class="">
                                <td colspan="" style="text-align:center">GHRN1453/B</td>
                                <td><input type="text" class="form-control"></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="date" name="date" class="form-control" /></td>

                                <td colspan="" style="text-align:center"><input type="submit" class="btn btn-primary" value="Save" name="Save" /></td>
                                
                                
                                <td class="Approve-Publish-buttons d-none" style="min-width: 250px;">
                                <span class="me-3">QC Pending</span>
                                <a href='international_form.php' class="me-2"><input type="submit" class="btn btn-success" value="Approve" name="Confirm" /></a>
                                </td>
                                <td>
                               <a href='international_form.php'><input type="submit" class="btn btn-success" value="Publish" name="Confirm" /></a>
                               </td>
                               <td class="confirm-button d-none">
                                    <a href='international_form.php'><input type="submit" class="btn btn-success" value="Confirm" name="Confirm" /></a>
                                </td>
                            </tr>

                            <tr class="version-row d-none">
                                <td colspan="" style="text-align:center">GHRN1453/C</td>
                                <td><input type="text" class="form-control"></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="file" name="file" class="form-control" /></td>
                                <td colspan="" style="text-align:center"><input type="date" name="date" class="form-control" /></td>

                                <td colspan="" style="text-align:center"><input type="submit" class="btn btn-primary" value="Save" name="Save" /></td>
                                
                                <td class="Approve-Publish-buttons d-none" style="min-width: 250px;">
                                <span class="me-3">QC Pending</span>
                                <a href='international_form.php' class="me-2"><input type="submit" class="btn btn-success" value="Approve" name="Confirm" /></a>
                                </td>
                                <td>
                               <a href='international_form.php'><input type="submit" class="btn btn-success" value="Publish" name="Confirm" /></a>
                               </td>
                               <td class="confirm-button d-none">
                                    <a href='international_form.php'><input type="submit" class="btn btn-success" value="Confirm" name="Confirm" /></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                    <button class="btn btn-primary d-none" id='add_Itinerary'>Add Itinerary</button>


                    </div>
                    


                </div>

            </div>
        </div>

    </div>
</div>
</div>
<div class="modal fade pdf" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <h5>Upload PDF</h5>
                    <form id="assignStaff">
                        <div class="form-group">
                            <input type="text" class="form-control lead_id" name="lead_id" hidden /><br />
                            <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>" hidden /><br />
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" />
                        </div>
                        <input type="submit" class="btn btn-primary" value="Upload" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade reject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">

                    <h5>Comments for Rejection/Edit</h5>
                    <form id="assignStaff">
                        <div class="form-group">
                            <input type="text" class="form-control lead_id" name="lead_id" hidden /><br />
                            <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>" hidden /><br />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Reject/Edit" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">


            <div class="page-title-right">


            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-sm-0 font-size-24 d-flex flex-column justify-content-center">Itinerary Request</h2>
            <div class='mt-3'>
                <button class='btn btn-outline-primary m-2 ' id='btn1' onclick='pending()'>Pending Itineraries</button>
                <button class='btn btn-outline-primary m-2' id='btn2' onclick='submitted()'>Submitted Itineraries</button>
                <button class='btn btn-outline-primary m-2' id='btn3' onclick='confirmed()'>Confirmed Itineraries</button>
                <button class='btn btn-outline-primary m-2' id='btn4' onclick='deleted()'>Deleted Itineraries</button>
            </div>
            <script>
                function pending() {
                    document.getElementById("add_Itinerary").classList.add('d-none')
                    let version_row = document.getElementsByClassName('version-row');
                    version_row[0].classList.remove('d-none');
                    version_row[1].classList.remove('d-none');
                    let collections = document.getElementsByClassName("confirm-button");
                    collections[0].classList.add('d-none');
                    collections[1].classList.add('d-none');
                    collections[2].classList.add('d-none');
                    collections[3].classList.add('d-none');
                    document.getElementById('pending').classList.remove('d-none')
                    document.getElementById('submitted').classList.add('d-none')
                    document.getElementById('confirmed').classList.add('d-none')
                    document.getElementById('deleted').classList.add('d-none')
                    let collection = document.getElementsByClassName("Approve-Publish-buttons");
                    collection[0].classList.remove('d-none');
                    collection[1].classList.remove('d-none');
                    collection[2].classList.remove('d-none');
                    window.onload = pending;
                }

                function submitted() {
                    document.getElementById("add_Itinerary").classList.remove('d-none')
                    let version_row = document.getElementsByClassName('version-row');
                    version_row[0].classList.remove('d-none');
                    version_row[1].classList.remove('d-none');
                    let collections = document.getElementsByClassName("confirm-button");
                    collections[0].classList.remove('d-none');
                    collections[1].classList.remove('d-none');
                    collections[2].classList.remove('d-none');
                    collections[3].classList.remove('d-none');
                    document.getElementById('pending').classList.add('d-none')
                    document.getElementById('submitted').classList.remove('d-none')
                    document.getElementById('confirmed').classList.add('d-none')
                    document.getElementById('deleted').classList.add('d-none')
                    let collection = document.getElementsByClassName("Approve-Publish-buttons");
                    collection[0].classList.remove('d-none');
                    collection[1].classList.remove('d-none');
                    collection[2].classList.remove('d-none');
                }

                function confirmed() {
                    document.getElementById("modal").classList.add('d-none')
                    document.getElementById('pending').classList.add('d-none')
                    document.getElementById('submitted').classList.add('d-none')
                    document.getElementById('confirmed').classList.remove('d-none')
                    document.getElementById('deleted').classList.add('d-none')
                   
                }

                function deleted() {
                    document.getElementById('pending').classList.add('d-none')
                    document.getElementById('submitted').classList.add('d-none')
                    document.getElementById('confirmed').classList.add('d-none')
                    document.getElementById('deleted').classList.remove('d-none')
                }
            </script>
            <div class='d-flex flex-row justify-content-end'>
                <form action="new_itnerys.php ">
                    <input type='submit' class='btn btn-primary' value='Add Request Form'>
                </form>
            </div>
        </div>
        <!-- Pending Itinearies Table -->
        <div class="card-body " id='pending'>
            <h3 class="mt-4 mb-4">Pending Itineraries</h3>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">GHRN</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttoort column ascending">Destination</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Partner</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Trip Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Pax</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="3" aria-label="Salary: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    <td>002</td>
                                    <td>Standard</td>
                                    <td>Goa</td>
                                    <td>Krishna Prakash, Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <tr>
                                    <td>004</td>
                                    <td>Budgt</td>
                                    <td>Kerala</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>

                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>
                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>0054</td>
                                    <td>Budgt</td>
                                    <td>Kashmir</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>
                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <tr>
                                    <td>005</td>
                                    <td>Budgt</td>
                                    <td>Manali</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <tr>
                                    <td>006</td>
                                    <td>Budgt</td>
                                    <td>Maldives</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <tr>
                                    <td>007</td>
                                    <td>Budgt</td>
                                    <td>Previlaged Member</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td><button class="btn font-size-20"> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>

                                    <td>
                                        <button type="button" class="btn font-size-14" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href='#'> <i class="fa-solid fa-trash-can font-size-20" style='color:#334960'> </i></a>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Deletion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-primary">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- Submitted Itinearies Table -->
        <div class="card-body d-none" id='submitted'>
            <h3 class="mt-4 mb-4">Submitted Itineraries</h3>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">GHRN</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttoort column ascending">Destination</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Partner</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Trip Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Pax</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="3" aria-label="Salary: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    <td>002</td>
                                    <td>Standard</td>
                                    <td>Goa</td>
                                    <td>Krishna Prakash, Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <button class="btn fs-5"><a href="view_itnery.php?id=14" > <i class="fas fa-eye" style="color:#334960"></i> </a></button></td>
                                    <td> 
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                <i class="fas fa-download " style="color:#334960"></i>
                                </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Download</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table ">
            <tr>
                <th>Version No#</th>
                <th>Package Title</th>
                <th>Date & Time</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>GHRN11223/A</td>
                <td>Kerala</td>
                <td>23-09-2023 12:22 PM</td>
                <td> <button class="btn btn-primary" id='itinerary-download' onclick="ddd()">Download</button></td>

            </tr>
            <script>
                function ddd(){
                    let ddd=document.getElementById('itinerary-download')
                    ddd.textContent='Downloaded'
                    ddd.classList.add('bg-secondary')
                    ddd.classList.remove('bg-primary')
                }
            </script>
            <tr>
                <td>GHRN11223/B</td>
                <td>Kerala</td>
                <td>23-09-2023 12:22 PM</td>
                <td> <button class="btn btn-primary">Download</button></td>
            </tr>
            <tr>
                <td>GHRN11223/C</td>
                <td>Kerala</td>
                <td>23-09-2023 12:22 PM</td>
                <td> <button class="btn btn-primary">Download</button></td>
            </tr>
            <tr>
                <td>GHRN11223/D</td>
                <td>Kerala</td>
                <td>23-09-2023 12:22 PM</td>
                <td> <button class="btn btn-primary">Download</button></td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
                                </td>
                                    <td> <button class="btn fs-5"><a href="view_itnery.php?id=14" > <i class="fa-solid fa-trash-can" style="color:#334960"></i> </a></button></td>
                                </tr>
                                <tr>
                                    <td>004</td>
                                    <td>Budgt</td>
                                    <td>Kerala</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>
                                </tr>
                                <tr>
                                    <td>0054</td>
                                    <td>Budgt</td>
                                    <td>Kashmir</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                                <tr>
                                    <td>005</td>
                                    <td>Budgt</td>
                                    <td>Manali</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                                <tr>
                                    <td>006</td>
                                    <td>Budgt</td>
                                    <td>Maldives</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>
                                </tr>
                                <tr>
                                    <td>007</td>
                                    <td>Budgt</td>
                                    <td>Previlaged Member</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".excelup" value="Assign To">Upload</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cardaa -->






        <!-- Confirmed Itinearies Table -->
        <div class="card-body d-none" id='confirmed'>
            <h3 class="mt-4 mb-4">Confirmed Itineraries</h3>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">GHRN</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttoort column ascending">Destination</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Partner</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Trip Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Pax</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Reservation</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="3" aria-label="Salary: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>


                            <tbody>


                                <tr>
                                    <td>002</td>
                                    <td>Standard</td>
                                    <td>Goa</td>
                                    <td>Krishna Prakash, Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>
                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                                <tr>
                                    <td>004</td>
                                    <td>Budgt</td>
                                    <td>Kerala</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>

                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>
                                </tr>
                                <tr>
                                    <td>0054</td>
                                    <td>Budgt</td>
                                    <td>Kashmir</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>
                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                                <tr>
                                    <td>005</td>
                                    <td>Budgt</td>
                                    <td>Manali</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                                <tr>
                                    <td>006</td>
                                    <td>Budgt</td>
                                    <td>Maldives</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>
                                </tr>
                                <tr>
                                    <td>007</td>
                                    <td>Budgt</td>
                                    <td>Previlaged Member</td>
                                    <td>Krishna , Patna, +9166565</td>
                                    <td>25-10-2023 <br> 27-10-2023</td>
                                    <td>5</td>
                                    <td><a href="international_form.php" class="btn btn-primary" >Res Form</a></td>

                                    <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                    <td> <a href="view_itnery.php?id=14"><i class="fas fa-download" style="color:#334960"></i> </a></td>
                                    <td> <a href='#'> <i class="fa-solid fa-trash-can" style='color:#334960'> </i></a></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





        <!-- Deleted Itinearies Table -->
        <div class="card-body mt-0 d-none" id='deleted'>
            <h3 class="mt-4 mb-4">Deleted Itineraries<h3>
                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <script>
                                    $(document).ready(function() {

                                        $('#myTables').DataTable({
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
                                <table id="myTables" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1208px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">GHRN</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Customer Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttoort column ascending">Destination</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Partner</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Trip Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">Pax</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="3" aria-label="Salary: activate to sort column ascending">Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>


                                        <tr>
                                            <td><h6>GHRN11111 <br><span class="badge bg-success mt-2">Confirmed</span></h6></td>
                                            <td>Standard</td>
                                            <td>Goa</td>
                                            <td>Krishna Prakash, Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>


                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>

                                        </tr>
                                        <tr>
                                        <td><h6>GHRN11112 <br><span class="badge bg-danger mt-2">Pending</span></h6></td>
                                            <td>Budgt</td>
                                            <td>Kerala</td>
                                            <td>Krishna , Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>

                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>
                                        </tr>
                                        <tr>

                                        <td><h6>GHRN11113<br><span class="badge bg-primary mt-2">Submitted</span></h6></td>
                                            <td>Budgt</td>
                                            <td>Kashmir</td>
                                            <td>Krishna , Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>
                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>

                                        </tr>

                                        <tr>

                                            <td>005</td>
                                            <td>Budgt</td>
                                            <td>Manali</td>
                                            <td>Krishna , Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>
                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>

                                        </tr>

                                        <tr>

                                            <td>006</td>
                                            <td>Budgt</td>
                                            <td>Maldives</td>
                                            <td>Krishna , Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>
                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>

                                        </tr>

                                        <tr>

                                            <td>007</td>
                                            <td>Budgt</td>
                                            <td>Previlaged Member</td>
                                            <td>Krishna , Patna, +9166565</td>
                                            <td>25-10-2023 <br> 27-10-2023</td>
                                            <td>5</td>
                                            <td> <a href="view_itnery.php?id=14"> <i class="fas fa-eye" style="color:#334960"></i> </a></td>
                                            <td> <a href='#'> <i class="fa-solid fa-trash-can-arrow-up" style='color:#334960'> </i></a></td>

                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
        </div>





        <div class="modal fade excel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="mb-3">
                                <i class="bx bx-check-circle display-4 text-success"></i>
                            </div>
                            <h5>Lead Assigned successfully</h5>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#assignStaff').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'saveAjax.php?state=assign',
                        data: formData,
                        success: function(response) {

                            console.log(response);
                            $('.assingModal').modal('show');
                            $('.leadAssign').modal('hide');
                            window.location.href = "leads.php";
                        }
                    });
                });
            });
        </script>

        <?php
        include "footer.php"
        ?>