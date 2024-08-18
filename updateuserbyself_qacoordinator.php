<?php
session_start();
include('connect.php');

if(isset($_SESSION['UserID']))
{
	$UserID=$_SESSION['UserID'];
	$select="SELECT * 
             FROM user
             INNER JOIN department ON department.DepartmentID=user.DepartmentID
             INNER JOIN role ON role.RoleID=user.RoleID
             WHERE UserID='$UserID'";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
	if($count>0)
	{
		$data=mysqli_fetch_array($query);
        $UserID=$data['UserID'];
        $Name=$data['Name'];
        $Email=$data['Email'];
        $DepartmentName=$data['DepartmentName'];
        $RoleName=$data['RoleName'];
	}
}

if(isset($_POST['btnUpdate']))
{
    $UserID=$_POST['txtuserid'];
    $Name=$_POST['txtname'];
    $Department=$_POST['cbodepartment'];
    $Role=$_POST['cborole'];
    $Email=$_POST['txtemail'];
    $Password=password_hash($_POST['txtpassword'], PASSWORD_DEFAULT);

	$update="UPDATE user
             SET Name='$Name',
                 Email='$Email',
                 Password='$Password',
                 DepartmentID='$Department',
                 RoleID='$Role'
		     WHERE UserID='$UserID'";
	$updatequery=mysqli_query($connection,$update);
	if($updatequery)  //TRUE
	{
		echo "<script>alert('User information is updated successfully.')</script>";
		echo "<script>window.location='updateuserbyself_qacoordinator.php'</script>";
	}
    else    //FALSE
    {
        echo mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/uog-logo2.png" type="image/icon type">
    <title>University of Greenwich | Update User Information</title>

    <!-- CSS links -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script> -->

<style>
    @media screen and (max-width: 315px) {
    .th-btns{
        align-items: center !important;
        justify-content: center !important;
    }
    .btnCSV{
        margin-bottom: 10px;
    }
}
</style>
</head>
<body>
    <nav class="navi-bar">
        <div class="logo">
            <i class="uil uil-bars menu-icon"></i>
            <img src="img/uog-logo.png" alt="University of Greenwich Logo">
        </div>

        <div class="sidebar">
            <div class="logo">
                <i class="uil uil-bars menu-icon"></i>
                <img src="img/uog-logo.png" alt="University of Greenwich Logo">
            </div>
            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="home_qacoordinator.php" class="nav_link">
                            <i class="uil uil-estate icon"></i>
                            <span class="link-name">Home</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="allideas_qacoordinator.php" class="nav_link">
                            <i class="uil uil-lightbulb-alt icon"></i>
                            <span class="link-name">All Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="latestideas_qacoordinator.php" class="nav_link">
                            <i class="uil uil-newspaper icon"></i>
                            <span class="link-name">Lastest Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostpopularideas_qacoordinator.php" class="nav_link">
                            <i class="uil uil-analysis icon"></i>
                            <span class="link-name">Most Popular Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostviewedideas_qacoordinator.php" class="nav_link">
                            <i class="uil uil-eye icon"></i>
                            <span class="link-name">Most Viewed Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="tags_qacoordinator.php" class="nav_link">
                            <i class="uil uil-tag icon"></i>
                            <span class="link-name">Tags</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-content">
                    <ul>
                        <li class="list">
                            <a href="updateuserbyself_qacoordinator.php" class="nav_link active">
                                <i class="uil uil-user-circle icon"></i>
                                <span class="link-name">Account</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="logout.php" class="nav_link">
                                <i class="uil uil-signout icon"></i>
                                <span class="link-name">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section class="overlay"></section>
    <main style="padding-bottom: 50px;">
        <div class="container" style="margin-top: 100px;">
                        <div class="register p-lg-9 p-sm-0">
                            <section class="form-container" >
                                <span class="title">Update User</span>
                                <form action="updateuserbyself_qacoordinator.php" method="POST" enctype="multipart/form-data" class="form">
                                <input name="txtuserid" type="hidden" class="form-control" value="<?php echo $data['UserID']?>" required>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="txtname" type="text" class="form-control" id="name" value="<?php echo $data['Name']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="select1">Select Department</label>
                                        <select class="form-control" id="select1" name="cbodepartment">
                                        <option disabled selected>-</option>
                                        <?php  
                                            $query="SELECT * 
                                                    FROM department";
                                            $result=mysqli_query($connection,$query);
                                            $count=mysqli_num_rows($result);

                                            for ($i=0;$i<$count;$i++) 
                                            { 
                                                $row=mysqli_fetch_array($result);
                                                $DepartmentID=$row['DepartmentID'];
                                                $DepartmentName=$row['DepartmentName'];

                                                echo "<option value='$DepartmentID'>$DepartmentName</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select2">Select Role</label>
                                        <select class="form-control" id="select2" name="cborole">
                                        <option disabled selected>-</option>
                                        <?php  
                                            $rolequery="SELECT * 
                                                        FROM role";
                                            $roleresult=mysqli_query($connection,$rolequery);
                                            $count=mysqli_num_rows($roleresult);

                                            for ($i=0;$i<$count;$i++) 
                                            { 
                                                $rolerow=mysqli_fetch_array($roleresult);
                                                $RoleID=$rolerow['RoleID'];
                                                $RoleName=$rolerow['RoleName'];

                                                echo "<option value='$RoleID'>$RoleName</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="txtemail" type="email" class="form-control" id="email" value="<?php echo $data['Email'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="txtpassword" type="password" class="form-control" id="password" required>
                                    </div>
                                    <input type="submit" class="btn-login-register mt-4" name="btnUpdate" value="Update">
                                </form>
                            </section>
                        </div>
        </div>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    const navBar = document.querySelector("nav"),
          menuBtns = document.querySelectorAll(".menu-icon"),
          overlay = document.querySelector(".overlay");
    menuBtns.forEach(menuBtn => {
        menuBtn.addEventListener("click", () => {
            navBar.classList.toggle("open");
        });
    });

    overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
    });
</script>
</html>