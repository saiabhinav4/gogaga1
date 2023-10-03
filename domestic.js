$(document).ready(function() {
    let hotelCount = 0;
    let crusieCount = 0;
    let vehicleCount = 0;
    function createHotelSection() {
        hotelCount++;
        return `
        <div class="card">
            <div class="card-header" id="heading${hotelCount}">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${hotelCount}" aria-expanded="true" aria-controls="collapse${hotelCount}">
                        Hotel Details ${hotelCount}
                    </button>
                    <button class="btn btn-danger float-right deleteHotelBtn">Delete</button>
                </h2>
            </div>
            <div id="collapse${hotelCount}" class="collapse" aria-labelledby="heading${hotelCount}" data-parent="#hotelAccordion">
                <div class="card-body">
                <div class="text-center">
                                            <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Location</label>
                        <input type="text" class="form-control" name="location" />
                         </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Hotel Name</label>
                        <input type="text" class="form-control" name="hotel_name" />
                         </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Number</label>
                        <input type="text" class="form-control" name="contact_person"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Room Category</label>
                        <input type="text" class="form-control" name="room_category"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Per Double room per night</label>
                        <input type="text" class="form-control" name="room_cost" id="room_cost" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Double rooms</label>
                        <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check In Date</label>
                        <input type="date" class="form-control" name="in_date" id="check_in_date"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check Out Date</label>
                        <input type="date" class="form-control" name="out_date"  id="check_out_date"/>
                         </div>
                    </div>
                  
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Meal Plan</label>
                        <select class="form-control" name="meal_plan">
                            <option selected>---Select Meal Plan--- </option>
                            <option>EPAI</option>
                            <option>CPAI</option>
                            <option>MAPAI</option>
                            <option>APAI</option>
                        </select>
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Extra Bed per night</label>
                        <input type="text" class="form-control" name="extra_bed" id="extra_bed"   />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Extra Beds</label>
                        <input type="email" class="form-control" name="no_of_beds" id="no_of_beds"   />
                         </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cost considered in cost sheet</label>
                        <input type="text" class="form-control" id="hotel_total"name="total_costs"   disabled/>
                        <input type="hidden" class="form-control" id="hotel_totals"name="total_costs_new"   />
                         </div>
                    </div>
                    
                            
                                                </div>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
        `;
    }

    $('#addHotelBtn').on('click', function() {
        event.preventDefault(); 
        const hotelSection = createHotelSection();
        $('#hotelAccordion').append(hotelSection);
    });

    $('#hotelAccordion').on('click', '.deleteHotelBtn', function() {
        $(this).closest('.card').remove();
        hotelCount--;
    });
    function createCrusieSection() {
        crusieCount++;
        return `
        <div class="card">
            <div class="card-header" id="heading${crusieCount}">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${crusieCount}" aria-expanded="true" aria-controls="collapse${crusieCount}">
                        Crusie Details ${crusieCount}
                    </button>
                    <button class="btn btn-danger float-right deleteCrusieBtn">Delete</button>
                </h2>
            </div>
            <div id="collapse${crusieCount}" class="collapse" aria-labelledby="heading${crusieCount}" data-parent="#crusieAccordion">
                <div class="card-body">
                <div class="text-center">
                                            <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cruise Supplier</label>
                        <input type="text" class="form-control" name="location" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cruise Name</label>
                        <input type="text" class="form-control" name="hotel_name" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Cabin Type</label>
                        <input type="date" class="form-control" name="room_category"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Per Double room per night</label>
                        <input type="text" class="form-control" name="room_cost" id="room_cost" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Double rooms</label>
                        <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check In Date</label>
                        <input type="date" class="form-control" name="in_date" id="check_in_date"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check Out Date</label>
                        <input type="date" class="form-control" name="out_date"  id="check_out_date"/>
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Number</label>
                        <input type="date" class="form-control" name="contact_person"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Meal Plan</label>
                        <select class="form-control" name="meal_plan">
                            <option selected>---Select Meal Plan--- </option>
                            <option>EPAI</option>
                            <option>CPAI</option>
                            <option>MAPAI</option>
                            <option>APAI</option>
                        </select>
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Extra Bed per night</label>
                        <input type="text" class="form-control" name="extra_bed" id="extra_bed"   />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Extra Beds</label>
                        <input type="email" class="form-control" name="no_of_beds" id="no_of_beds"   />
                         </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cost considered in cost sheet</label>
                        <input type="text" class="form-control" id="hotel_total"name="total_costs"   disabled/>
                        <input type="hidden" class="form-control" id="hotel_totals"name="total_costs_new"   />
                         </div>
                    </div>
                    
                            
                                                </div>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
        `;
    }

    $('#addCrusieBtn').on('click', function() {
        event.preventDefault(); 
        const crusieSection = createCrusieSection();
        $('#crusieAccordion').append(crusieSection);
    });

    $('#crusieAccordion').on('click', '.deleteCrusieBtn', function() {
        $(this).closest('.card').remove();
        crusieCount--;
    });

    /*for Supplementary*/
    let rowCount = 0;

    function calculateTotal() {
        let total = 0;
        $('.cost-input').each(function() {
            total += parseFloat($(this).val());
        });
        $('#totalCost').text(total.toFixed(2));
    }

    function createRow() {
        rowCount++;
        return `
        <tr>
            <td><input type="text" class="form-control" name="partner_type" required /></td>
            <td><input type="text" class="form-control" name="super_partner_name" required /></td>
            <td><input type="text" class="form-control" name="super_partner_location" required /></td>
            <td><input type="text" class="form-control cost-input" name="cost" required /></td>
            <td><button class="btn btn-danger remove-row">Remove</button></td>
        </tr>
        `;
    }

    $('#addRowBtn').on('click', function() {
        event.preventDefault();
        const newRow = createRow();
        $('#partnerTableBody').append(newRow);
    });

    $('#partnerTableBody').on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        calculateTotal();
    });

    $('#partnerTableBody').on('input', '.cost-input', calculateTotal);

    function createVehicleSection() {
        vehicleCount++;
        return `
        <div class="card">
            <div class="card-header" id="heading${vehicleCount}">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${vehicleCount}" aria-expanded="true" aria-controls="collapse${vehicleCount}">
                    Vehicle Details ${vehicleCount}
                    </button>
                    <button class="btn btn-danger float-right deleteVehicleBtn">Delete</button>
                </h2>
            </div>
            <div id="collapse${vehicleCount}" class="collapse" aria-labelledby="heading${vehicleCount}" data-parent="#vehicleAccordion">
                <div class="card-body">
                <div class="text-center">
                                            <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Location</label>
                        <input type="text" class="form-control" name="location" />
                         </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Hotel Name</label>
                        <input type="text" class="form-control" name="hotel_name" />
                         </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Contact Number</label>
                        <input type="text" class="form-control" name="contact_person"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Room Category</label>
                        <input type="text" class="form-control" name="room_category"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Per Double room per night</label>
                        <input type="text" class="form-control" name="room_cost" id="room_cost" />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Double rooms</label>
                        <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check In Date</label>
                        <input type="date" class="form-control" name="in_date" id="check_in_date"  />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Check Out Date</label>
                        <input type="date" class="form-control" name="out_date"  id="check_out_date"/>
                         </div>
                    </div>
                  
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Meal Plan</label>
                        <select class="form-control" name="meal_plan">
                            <option selected>---Select Meal Plan--- </option>
                            <option>EPAI</option>
                            <option>CPAI</option>
                            <option>MAPAI</option>
                            <option>APAI</option>
                        </select>
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Extra Bed per night</label>
                        <input type="text" class="form-control" name="extra_bed" id="extra_bed"   />
                         </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Number of Extra Beds</label>
                        <input type="email" class="form-control" name="no_of_beds" id="no_of_beds"   />
                         </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                        <label for="choices-multiple-remove-button" class="form-label font-size-13 text-muted">Total Cost considered in cost sheet</label>
                        <input type="text" class="form-control" id="hotel_total"name="total_costs"   disabled/>
                        <input type="hidden" class="form-control" id="hotel_totals"name="total_costs_new"   />
                         </div>
                    </div>
                    
                            
                                                </div>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
        `;
    }

    $('#addVehicleBtn').on('click', function() {
        event.preventDefault(); 
        const vehicleSection = createVehicleSection();
        $('#vehicleAccordion').append(vehicleSection);
    });

    $('#vehicleAccordion').on('click', '.deleteVehicleBtn', function() {
        $(this).closest('.card').remove();
        vehicleCount--;
    });






});