<?php
require_once ('connect.php');
	
if(isset($_POST['btnUpdate']))
{
	$CategoryID = $_POST['txtcategoryid'];
	$CategoryName = $_POST['txtcategoryname'];

    $update="UPDATE category
             SET CategoryName='$CategoryName'
             WHERE CategoryID='$CategoryID'";
            $updatequery=mysqli_query($connection,$update);
            if($updatequery)  //TRUE
            {
                echo "<script>alert('Category (Tag) is updated successfully.')</script>";
                echo "<script>window.location='category_qamanager.php'</script>";
            }
            else    //FALSE
            {
                echo mysqli_error($connection);
            }
}
?>
            <div class="modal fade" id="updateModal<?php echo $rows['CategoryID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="register">
                                <section class="form-container">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="uil uil-times"></i>
                                    </button>
                                    <span class="title">Update Category</span>
                                    <form action="category_qamanager.php" method="POST" enctype="multipart/form-data" class="form">
                                    <input name="txtcategoryid" type="hidden" class="form-control" value="<?php echo $rows['CategoryID']?>" id="name" required>
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input name="txtcategoryname" type="text" class="form-control" value="<?php echo $rows['CategoryName']?>" id="name" required>
                                        </div>
                                        <input type="submit" class="btn-login-register mt-4" name="btnUpdate" value="Update">
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>