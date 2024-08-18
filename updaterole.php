<?php
require_once ('connect.php');
	
if(isset($_POST['btnUpdate']))
{
	$RoleID = $_POST['txtroleid'];
	$RoleName = $_POST['txtrolename'];

    $update="UPDATE role
             SET RoleName='$RoleName'
             WHERE RoleID='$RoleID'";
            $updatequery=mysqli_query($connection,$update);
            if($updatequery)  //TRUE
            {
                echo "<script>alert('Role is updated successfully.')</script>";
                echo "<script>window.location='role.php'</script>";
            }
            else    //FALSE
            {
                echo mysqli_error($connection);
            }
}
?>
            <div class="modal fade" id="updateModal<?php echo $rows['RoleID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="register">
                                <section class="form-container">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="uil uil-times"></i>
                                    </button>
                                    <span class="title">Update Role</span>
                                    <form action="role.php" method="POST" enctype="multipart/form-data" class="form">
                                    <input name="txtroleid" type="hidden" class="form-control" value="<?php echo $rows['RoleID']?>" id="name" required>
                                        <div class="form-group">
                                            <label for="name">Role Name</label>
                                            <input name="txtrolename" type="text" class="form-control" value="<?php echo $rows['RoleName']?>" id="name" required>
                                        </div>
                                        <input type="submit" class="btn-login-register mt-4" name="btnUpdate" value="Update">
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>