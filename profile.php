<?php
$title = "Dashboard";
include "header.php"
?>

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">New Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agents</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Basic pills Wizard</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                            <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                    <a href="#seller-details" class="nav-link active" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Seller Details">
                                                            <i class="bx bx-list-ul"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#company-document" class="nav-link" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Company Document">
                                                            <i class="bx bx-book-bookmark"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Bank Details">
                                                            <i class="bx bxs-bank"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- wizard-nav -->

                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane active" id="seller-details">
                                                    <div class="text-center mb-4">
                                                        <h5>Seller Details</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-firstname-input" class="form-label">First name</label>
                                                                    <input type="text" class="form-control" id="basicpill-firstname-input" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-lastname-input" class="form-label">Last name</label>
                                                                    <input type="text" class="form-control" id="basicpill-lastname-input">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-phoneno-input" class="form-label">Phone</label>
                                                                    <input type="text" class="form-control" id="basicpill-phoneno-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-email-input" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="basicpill-email-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-address-input" class="form-label">Address</label>
                                                                    <textarea id="basicpill-address-input" class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                                    </ul>
                                                </div>
                                                <!-- tab pane -->
                                                <div class="tab-pane" id="company-document">
                                                  <div>
                                                    <div class="text-center mb-4">
                                                        <h5>Company Document</h5>
                                                        <p class="card-title-desc">Fill all information below</p>
                                                    </div>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-pancard-input" class="form-label">PAN Card</label>
                                                                    <input type="text" class="form-control" id="basicpill-pancard-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-vatno-input" class="form-label">VAT/TIN No.</label>
                                                                    <input type="text" class="form-control" id="basicpill-vatno-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-cstno-input" class="form-label">CST No.</label>
                                                                    <input type="text" class="form-control" id="basicpill-cstno-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-servicetax-input" class="form-label">Service Tax No.</label>
                                                                    <input type="text" class="form-control" id="basicpill-servicetax-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-companyuin-input" class="form-label">Company UIN</label>
                                                                    <input type="text" class="form-control" id="basicpill-companyuin-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basicpill-declaration-input" class="form-label">Declaration</label>
                                                                    <input type="text" class="form-control" id="basicpill-declaration-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                        <li class="previous disabled"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                                    </ul>
                                                  </div>
                                                </div>
                                                <!-- tab pane -->
                                                <div class="tab-pane" id="bank-detail">
                                                    <div>
                                                        <div class="text-center mb-4">
                                                            <h5>Bank Details</h5>
                                                            <p class="card-title-desc">Fill all information below</p>
                                                        </div>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-namecard-input" class="form-label">Name on Card</label>
                                                                        <input type="text" class="form-control" id="basicpill-namecard-input">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Credit Card Type</label>
                                                                        <select class="form-select">
                                                                                <option selected="">Select Card Type</option>
                                                                                <option value="AE">American Express</option>
                                                                                <option value="VI">Visa</option>
                                                                                <option value="MC">MasterCard</option>
                                                                                <option value="DI">Discover</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-cardno-input" class="form-label">Credit Card Number</label>
                                                                        <input type="text" class="form-control" id="basicpill-cardno-input">
                                                                    </div>
                                                                </div>
    
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-card-verification-input" class="form-label">Card Verification Number</label>
                                                                        <input type="text" class="form-control" id="basicpill-card-verification-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="basicpill-expiration-input" class="form-label">Expiration Date</label>
                                                                        <input type="text" class="form-control" id="basicpill-expiration-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                            <li class="previous disabled"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a></li>
                                                            <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".confirmModal">Save
                                                                    Changes</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- tab pane -->
                                            </div>
                                            <!-- end tab content -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <script src="assets/js/pages/form-wizard.init.js"></script>

<script src="assets/js/app.js"></script> 
<?php 
include "footer.php"
?>