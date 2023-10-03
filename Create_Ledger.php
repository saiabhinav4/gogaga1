<?php
$title = "Ledger";
include "header.php";
?>
<!DOCTYPE html>

<div class="container mt-2 card">
    <div class="card-header">
        <h3>Create Ledger</h3>
    </div>
    <div class='card-body'>
        <form>
            <div class="row">
                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="transactionNumber">Transaction Number</label>
                        <input type="text" class="form-control col-lg-12" id="transactionNumber" name="transactionNumber">
                    </div>
                </div>

                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="transactionDate">Transaction Date</label>
                        <input type="date" class="form-control col-lg-12" id="transactionDate" name="transactionDate">
                    </div>
                </div>

                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="ghrnNumber">GHRN Number</label>
                        <input type="text" class="form-control col-lg-12" id="ghrnNumber" name="ghrnNumber">
                    </div>
                </div>

                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="transactionParticulars">Transaction Particulars</label>
                        <input type="text" class="form-control col-lg-12" id="transactionParticulars" name="transactionParticulars">
                    </div>
                </div>

                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="Bank_Account">Bank Account Name</label>
                        <input type="text" class="form-control col-lg-12" id="Bank_Account" name="transactionParticulars">
                    </div>
                </div>


                <div class="col-lg-12 mb-4 mt-2">

                    <div class="form-group">
                        <label for="paymentOption">Payment Type</label>
                        <select class="form-control" id="paymentOption">
                            <option value="" selected>Select </option>
                            <option value="credit">Credit</option>
                            <option value="debit">Debit</option>
                        </select>
                    </div>

                </div>


                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="debit">Debit Amount</label>
                        <input type="text" class="form-control" id="debit">
                    </div>
                </div>
                <div class="col-lg-6 mb-4 mt-2">
                    <div class="form-group">
                        <label for="credit">Credit Amount</label>
                        <input type="text" class="form-control" id="credit">
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>


        </form>
    </div>
</div>

<script>
    // Get references to the payment option, debit, and credit fields
    const paymentOption = document.getElementById("paymentOption");
    const debitField = document.getElementById("debit");
    const creditField = document.getElementById("credit");

    // Add an event listener to the payment option select element
    paymentOption.addEventListener("change", function() {
        if (paymentOption.value === "credit") {
            // If "credit" is selected, enable the credit field and disable the debit field
            creditField.disabled = false;
            debitField.disabled = true;
        } else if (paymentOption.value === "debit") {
            // If "debit" is selected, enable the debit field and disable the credit field
            debitField.disabled = false;
            creditField.disabled = true;
        }
    });
</script>





<?php
include "footer.php";
?>