<?php
$title = " Roles";
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 card">
            <div class="card-header">
                <h3>All Users</h3>
            </div>
            <div class="card-body">
                <table class="table font-size-15">
                    <tr>
                        <th>S.No</th>
                        <th>User Name</th>
                        <th>User Type</th>
                        <th>Access Type</th>
                        <th>User Id</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Rahul</td>
                        <td>Member</td>
                        <td>Domestic </td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="Profile_Partner_View.php"> <button class="btn btn-secondary me-2 btn-sm">View Partner Profile</button></a>
                            <a href="Permissions_View.php" class="btn btn-primary me-2 btn-sm">Edit Permissions</a>
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Ajay</td>
                        <td>Partner</td>
                        <td>International</td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="Profile_Employee_View.php"> <button class="btn btn-secondary me-2 btn-sm">View Employee Profile</button></a>
                            <button class="btn btn-primary me-2 btn-sm">Edit Permissions</button>
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Dinesh</td>
                        <td>Accounts</td>
                        <td>BOTH</td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="Profile_Partner_View.php"> <button class="btn btn-secondary me-2 btn-sm">View </button></a>
                            <button class="btn btn-primary me-2 btn-sm">Edit Permissions</button>
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Nithin</td>
                        <td>Customer Support</td>
                        <td>Domestic</td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="my_profile.php"> <button class="btn btn-secondary me-2 btn-sm">View</button></a>
                            <button class="btn btn-primary me-2 btn-sm">Edit Permissions</button>
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>

                    <td>5</td>
                        <td>Akhil</td>
                        <td>HR</td>
                        <td>International</td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="my_profile.php"> <button class="btn btn-secondary me-2 btn-sm">View</button></a>
                            <button class="btn btn-primary me-2 btn-sm">Edit Permissions</button> 
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>

                    <td>6</td>
                        <td>Sai</td>
                        <td>Marketing</td>
                        <td>Both</td>
                        <td>Abc@gogagacrm.in</td>
                        <td style="min-width: 300px;">
                            <a href="my_profile.php"> <button class="btn btn-secondary me-2 btn-sm">View</button></a>
                            <button class="btn btn-primary me-2 btn-sm">Edit Permissions</button>  
                            <button class="btn btn-primary me-2 btn-sm">Reset Password</button>
                            <button id="myButton" class="btn btn-danger btn-sm" onclick="toggleButton()">Disable</button>
                        </td>
                    </tr>
    <script>
        function toggleButton() {
            var button = document.getElementById("myButton");

            if (button.innerText === "Disable") {
                button.innerText = "Enable";
                button.classList.remove("btn-danger");
                button.classList.add("btn-success");
            } else {
                button.innerText = "Disable";
                button.classList.remove("btn-success");
                button.classList.add("btn-danger");
            }
        }
    </script>


</body>
</html>

                        

                </table>

               
            </div>

        </div>
    </div>

</div>


<?php
    include "footer.php";
    ?>