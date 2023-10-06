<?php
$title = " Role Setting";
include "header.php";
$successMsg='';
$errorMsg='';
if(!empty($_GET)){
     
    if(isset($_GET['id'])&&!empty($_GET['id'])){
        $id=$_GET['id'];
        $deletePer="DELETE FROM permissions where permission_id=?";
        $deleteStmt= $conn->prepare($deletePer);
        $deleteStmt->bind_param('i',$id);
        if($deleteStmt->execute()){
            $successMsg="User Deleted";
        }
        else{
            $errorMsg="Unable to delete the user, contact admin";
        }
    }
    else{
        $errorMsg="Unable to delete the user, contact admin";
    }

}


?>
<div class="container ">
    <div class="row card">
        <div class="col-12 card-header">
            <h3>Users</h3>
            <p class="<?php echo !empty($errorMsg) ? "text-danger": ( !empty($successMsg) ? "text-success" : '');  ?>"><?php echo !empty($errorMsg) ? $errorMsg: ( !empty($successMsg) ? $successMsg : ''); ?></p>
            <div class="text-end">
                <a href="Create_New_User.php">
                <button class="btn btn-primary">Create New User</button></a>
            </div>

        </div>
        <div class="card-body">
        <?php 
       $isdefault=1;
       $fetch_default_roles="SELECT userName,userType,createdBy,createdDate,permission_id  from permissions where isdefault=?;";
       $defaultRole_Stmt= $conn->prepare($fetch_default_roles);
       $defaultRole_Stmt->bind_param('i',$isdefault);
       if($defaultRole_Stmt->execute()){
          $result_roles= $defaultRole_Stmt->get_result();   
       } 

    ?>    
        <table class="table table-bordered">
        <thead>    
        <tr>
            <th>User Name</th>
            <th>User Type</th>
            <th>Created By</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
                          if($result_roles->num_rows>0){ 
                            while($row=$result_roles->fetch_row()){  ?> 
                               <tr role="row">
                                 <td><?php echo $row[0]; ?></td>
                                 <td><?php echo $row[1]; ?></td>
                                 <td><?php echo $row[2]; ?></td>
                                 <td><?php echo $row[3]; ?></td>
                                 <td>
                                    <a href="View_Role.php?id=<?php echo $row[4];  ?>"> <button class="btn btn-success">View Permissions</button></a>
                                    <a href="?id=<?php echo $row[4];  ?>"> <button class="btn btn-danger">Delete</button></a>
                                </td>
                              </tr>            
                    <?php    } 
                          }
                          else{  ?>
                            <tr>
                                <td colspan="5" style="text-align: center;" >No Records Found</td>
                            </tr>          
                    <?php  }
                        ?>
        <!-- <tr>
            <td>Admin</td>
            <td>Admin</td>
            <td>John Doe</td>
            <td>2023-09-01</td>
            <td class="action-buttons text-center">
               <a href="View_Role.php"> <button class="btn btn-success">View Permissions</button></a>
      
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Editor</td>
            <td>Editor</td>
            <td>Jane Smith</td>
            <td>2023-09-05</td>
            <td class="action-buttons text-center">
            <a href="View_Role.php"> <button class="btn btn-success">View Permissions</button></a>
           
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Viewer</td>
            <td>Viewer</td>
            <td>Alice Lee</td>
            <td>2023-09-10</td>
            <td class="action-buttons text-center">
            <a href="View_Role.php"> <button class="btn btn-success">View Permissions</button></a>
              
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>Moderator</td>
            <td>Moderator</td>
            <td>Bob Brown</td>
            <td>2023-09-15</td>
            <td class="action-buttons text-center" >
            <a href="View_Role.php"> <button class="btn btn-success">View Permissions</button></a>
                
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr> -->
        </tbody>
    </table>

        </div>
    </div>
</div>




<?php
    include "footer.php"
    ?>