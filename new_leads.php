<?php
$title = "Create New Lead";
include "header.php";
$lead_ids = $_GET['id'];

$leadData = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `leads` WHERE `lead_id`='$lead_ids'"));

?>
<script>
    $(document).ready(function() {
        $("#advanced_setting").hide();
        $('#advanced').click(function() {
            $("#advanced_setting").toggle();
        });
        if (('#leadIds').val != '') {
            $("#advanced_setting").toggle();
        }
    });
</script>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center mb-4">
                    <h4 class="card-title" style='font-size:22px;'>Create New Lead</h4>

                    <div class="ms-auto">
                        <div class="row">
                            
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body p-4">
                <?php if ($lead_ids) {
                    echo '<form action="" method="post" id="verifyLead">';
                } else {
                    echo '<form action="" method="post" id="newLead">';
                } ?>

                <div class="row">
                    <?php if ($lead_ids) { ?>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option selected>--- Select your Status---</option>
                                    <option>Not Reachable</option>
                                    <option>Done</option>
                                    <option>Call After Some Time</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">

                                <label for="example-text-input" class="form-label">Date Time</label>
                                <input class="form-control" type="datetime-local" value="2019-08-19T13:45:00" id="example-datetime-local-input">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                            </div>
                        </div>
                    <?php } ?>
                    
                    <div class="col-lg-3">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Lead Source </label>
                                <input class="form-control" type="text" placeholder="Lead Source" value="<?php echo $leadData['raised_by'] ?>" name="raised_by" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Raised By </label>
                                <input class="form-control" type="text" placeholder="Raised By" value="<?php echo $leadData['raised_by'] ?>" name="raised_by" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mt-3  mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Raised Contact Number </label>
                                <input class="form-control" type="text" placeholder="Raised Contact Number" name="raised_number" value="<?php echo $leadData['raised_number'] ?>" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <button class="btn btn-primary mt-4 ms-5" onclick='add_lead_partner()'>Add Partner</button>
                    </div>
                    <script>
                        function add_lead_partner(){
                            document.getElementById('add_lead_partner').classList.remove('d-none')
                        }
                    </script>
                        <div class="d-none d-flex flex-row" id='add_lead_partner'>
                    <div class="col-lg-3">
                        <div class="mt-3 me-2 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Partner Name </label>
                                <input class="form-control" type="text" placeholder="Partner Location" value="<?php echo $leadData['partner_name'] ?>" name="partner_name" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mt-3 me-2 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Partner Location </label>
                                <input class="form-control" type="text" placeholder="Partner Location" name="partner_location" value="<?php echo $leadData['partner_location'] ?>" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Partner Code </label>
                                <input class="form-control" type="text" placeholder="Partner Code" value="<?php echo $leadData['partner_code'] ?>" name="partner_code" >
                            </div>

                        </div>
                    </div>
                    </div>
                    <div class="col-lg-43"></div>
                    <hr class='mt-5 mb-5'>
                    <h4 class='mb-3'>Customer Info</h4>

                    <div class="col-lg-4">

                        <div>

                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Customer Name</label>
                                <input class="form-control" type="text" placeholder="Customer Name" value="<?php echo $leadData['customer_name'] ?>" name="customer_name" required>
                                <input class="form-control" type="hidden" placeholder="Lead Id" id="leadIds" value="<?php echo $leadData['lead_id'] ?>" name="leadID">
                                <input class="form-control" type="hidden" placeholder="USer Id" id="userIds" value="<?php echo $user_id; ?>" name="userID">
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Customer Number</label>
                                <input class="form-control" type="number" placeholder="Customer Number" name="customer_number" value="<?php echo $leadData['customer_number'] ?>" required>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Number Of Passengers</label>
                                <input class="form-control" type="text" placeholder="Number Of Passengers" name="no_of_passengers" value="<?php echo $leadData['no_of_passengers'] ?>" >
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Number of Adults </label>
                                <input class="form-control" type="number" placeholder="Number of Adults" value="<?php echo $leadData['no_of_adults'] ?>" name="adults">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Number of Children </label>
                                <input class="form-control" type="number" placeholder="Number of Children (Age 2-12 years)" value="<?php echo $leadData['no_of_kids'] ?>" name="kids">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Number of Infants </label>
                                <input class="form-control" type="number" placeholder="Number of Infants (Age 0-2 years)" value="<?php echo $leadData['no_of_kids'] ?>" name="kids">
                            </div>

                        </div>
                    </div>

                    <hr class='mt-5 mb-5'>
                    <h4 class='mb-3'>Trip Info</h4>

                    <div class="col-lg-4">

                        <div>

                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Holiday Type</label>
                                <select name="" id="" class="form-control" required>

                                    <option value="Domestic">Domestic</option>
                                    <option value="International"> International</option>
                                </select>
                            </div>


                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Destination</label>
                                <input class="form-control" type="text" placeholder="Destination" value="<?php echo $leadData['destination'] ?>" name="destination" >
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Trip Start Date</label>
                                <input class="form-control" type="date" placeholder="Number Of Passengers" name="start_date" value="<?php echo $leadData['trip_start_date'] ?>" >
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-3 mt-lg-0">
                            <div class="mb-3">
                                <label for="example-text-input" class="form-label">Trip End Date</label>
                                <input class="form-control" type="date" placeholder="Number Of Passengers" value="<?php echo $leadData['trip_end_date'] ?>" name="end_date">
                            </div>

                        </div>
                    </div>



                        <div class="col-lg-4">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">From City </label>
                                    <input class="form-control" type="text" placeholder="From City" value="<?php echo $leadData['from_city'] ?>" name="from_city">
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Duration of Stay </label>
                                    <input type="number" placeholder='Number of nights' name="duration_of_stay" class="form-control">

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Preferred Hotel Star Category</label>
                                    <select class="form-control" name="hotels">
                                        <option value="" disabled="" class="F8vzy2 HDqSrI">Preferred Hotel Star Category</option>
                                        <option value="2 Star" class="F8vzy2" aria-selected="false">2 Star</option>
                                        <option value="3 Star" class="F8vzy2" aria-selected="false">3 Star</option>
                                        <option value="4 Star" class="F8vzy2" aria-selected="false">4 Star</option>
                                        <option value="5 Star" class="F8vzy2" aria-selected="false">5 Star</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                   

                    <div class="form-group">
                        <?php if ($lead_ids) { ?>
                            <input name="verify" type="submit" class="btn btn-primary" value="Verify" />
                        <?php } else { ?>
                            <input name="submit" type="submit" class="btn btn-primary" value="Submit" />
                        <?php } ?>
                    </div>
                </div>
                </form>
                <div class="modal fade leadModal" tabindex="-1" aria-hidden="true">
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
                                    <h5>Lead Submitted successfully.</h5>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-light w-md" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<script>
    $(document).ready(function() {
        $('#newLead').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'saveAjax.php',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('.leadModal').modal('show');
                    $('#newLead')[0].reset();
                }
            });
        });
        $('#verifyLead').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'saveAjax.php?state=verifyLead',
                data: formData,
                success: function(response) {
                    console.log(response);
                    window.location.href = "leads.php";
                }
            });
        });
    });
</script>

<?php
include "footer.php";
?>