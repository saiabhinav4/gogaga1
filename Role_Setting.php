<?php
$title = " Roles";
include "header.php";
?>
<div class="container ">
    <div class="row card">
        <div class="col-12 card-header">
            <h3>Roles</h3>
            <div class="text-end">
                <a href="Create_Role.php">
                <button class="btn btn-primary">Create Role</button></a>
            </div>

        </div>
        <div class="card-body">
        <table class="table table-bordered">
        <tr>
            <th>Role Name</th>
            <th>Role Type</th>
            <th>Created By</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>Admin</td>
            <td>Admin</td>
            <td>John Doe</td>
            <td>2023-09-01</td>
            <td class="action-buttons text-center">
               <a href="View_Role.php"> <button class="btn btn-success">View</button></a>
                <button class="btn btn-warning">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Editor</td>
            <td>Editor</td>
            <td>Jane Smith</td>
            <td>2023-09-05</td>
            <td class="action-buttons text-center">
            <button class="btn btn-success">View</button>
                <button class="btn btn-warning">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Viewer</td>
            <td>Viewer</td>
            <td>Alice Lee</td>
            <td>2023-09-10</td>
            <td class="action-buttons text-center">
            <button class="btn btn-success">View</button>
                <button class="btn btn-warning">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Moderator</td>
            <td>Moderator</td>
            <td>Bob Brown</td>
            <td>2023-09-15</td>
            <td class="action-buttons text-center" >
            <button class="btn btn-success">View</button>
                <button class="btn btn-warning">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Guest</td>
            <td>Guest</td>
            <td>Guest User</td>
            <td>2023-09-20</td>
            <td class="action-buttons text-center">
            <button class="btn btn-success">View</button>
                <button class="btn btn-warning">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
    </table>

        </div>
    </div>
</div>




<?php
    include "footer.php"
    ?>