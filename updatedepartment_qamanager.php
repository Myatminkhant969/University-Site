<?php
require_once ('connect.php');
	
if(isset($_POST['btnUpdate']))
{
	$DepartmentID = $_POST['txtdepartmentid'];
	$DepartmentName = $_POST['txtdepartmentname'];

    $update="UPDATE department
             SET DepartmentName='$DepartmentName'
             WHERE DepartmentID='$DepartmentID'";
            $updatequery=mysqli_query($connection,$update);
            if($updatequery)  //TRUE
            {
                echo "<script>alert('Department is updated successfully.')</script>";
                echo "<script>window.location='department_qamanager.php'</script>";
            }
            else    //FALSE
            {
                echo mysqli_error($connection);
            }
}
?>
            <div class="modal fade" id="updateModal<?php echo $rows['DepartmentID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="register">
                                <section class="form-container">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="uil uil-times"></i>
                                    </button>
                                    <span class="title">Update Department</span>
                                    <form action="department_qamanager.php" method="POST" enctype="multipart/form-data" class="form">
                                    <input name="txtdepartmentid" type="hidden" class="form-control" value="<?php echo $rows['DepartmentID']?>" id="name" required>
                                        <div class="form-group">
                                            <label for="name">Department Name</label>
                                            <input name="txtdepartmentname" type="text" class="form-control" value="<?php echo $rows['DepartmentName']?>" id="name" required>
                                        </div>
                                        <input type="submit" class="btn-login-register mt-4" name="btnUpdate" value="Update">
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>