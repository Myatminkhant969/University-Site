<?php
session_start();
include('connect.php');

if (isset($_REQUEST['AcademicYearID']))
{
    $AcademicYearID=$_REQUEST['AcademicYearID'];
    $select="SELECT * 
             FROM academicyear
             INNER JOIN administrator ON academicyear.UpdatedBy = administrator.AdministratorID
             WHERE AcademicYearID='$AcademicYearID'";
    $query=mysqli_query($connection,$select);
    $count=mysqli_num_rows($query);
    if ($count>0) 
    {
        $data=mysqli_fetch_array($query);
        $AcademicYearID=$data['AcademicYearID'];
        $Year=$data['Year'];
        $Term=$data['Term'];
        $ClosureDate=$data['ClosureDate'];
        $FinalClosureDate=$data['FinalClosureDate'];
    }
}

if(isset($_POST['btnUpdate']))
{
    $AcademicYearID=$_POST['txtacademicyearid'];
    $Year=$_POST['txtyear'];
    $Term=$_POST['cboterm'];
    $ClosureDate=$_POST['txtclosuredate'];
    $FinalClosureDate=$_POST['txtfinalclosuredate'];
    $AdministratorID=$_POST['txtadministratorid'];

	$update="UPDATE academicyear
             SET Year='$Year',
                 Term='$Term',
                 ClosureDate='$ClosureDate',
                 FinalClosureDate='$FinalClosureDate',
                 UpdatedBy='$AdministratorID',
                 UpdatedOn=CURRENT_TIMESTAMP()
		     WHERE AcademicYearID='$AcademicYearID'";
	$updatequery=mysqli_query($connection,$update);
	if($updatequery)  //TRUE
	{
		echo "<script>alert('Academic Year information is updated successfully.')</script>";
		echo "<script>window.location='academicyear_administrator.php'</script>";
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
    <title>University of Greenwich | Update Academic Year</title>

    <!-- CSS links -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
                        <a href="home_administrator.php" class="nav_link">
                            <i class="uil uil-estate icon"></i>
                            <span class="link-name">Home</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="allideas_administrator.php" class="nav_link">
                            <i class="uil uil-lightbulb-alt icon"></i>
                            <span class="link-name">All Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="latestideas_administrator.php" class="nav_link">
                            <i class="uil uil-newspaper icon"></i>
                            <span class="link-name">Latest Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostpopularideas_administrator.php" class="nav_link">
                            <i class="uil uil-analysis icon"></i>
                            <span class="link-name">Most Popular Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostviewedideas_administrator.php" class="nav_link">
                            <i class="uil uil-eye icon"></i>
                            <span class="link-name">Most Viewed Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="tags_administrator.php" class="nav_link">
                            <i class="uil uil-tag icon"></i>
                            <span class="link-name">Tags</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="attachmentfiles_administrator.php" class="nav_link">
                            <i class="uil uil-paperclip icon"></i>
                            <span class="link-name">Attachment Files</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="academicyear_administrator.php" class="nav_link active">
                            <i class="uil uil-schedule icon"></i>
                            <span class="link-name">Academic Year</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="category_administrator.php" class="nav_link">
                            <i class="uil uil-list-ol icon"></i>
                            <span class="link-name">Category</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="department_administrator.php" class="nav_link">
                            <i class="uil uil-building icon"></i>
                            <span class="link-name">Department</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="role.php" class="nav_link">
                            <i class="uil uil-user icon"></i>
                            <span class="link-name">User Role</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="user.php" class="nav_link">
                            <i class="uil uil-users-alt icon"></i>
                            <span class="link-name">Users</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="administrator.php" class="nav_link">
                            <i class="uil uil-users-alt icon"></i>
                            <span class="link-name">Administrators</span>
                        </a>
                    </li>


                </ul>

                <div class="bottom-content">
                    <ul>
                        <li class="list">
                            <a href="updateadministratorbyself.php" class="nav_link">
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
            <div class="col-lg-12 text-left mb-2" style="padding: 0px;">
                <a href="academicyear_administrator.php" class="btn btn-link" style="font-weight: 500; padding: 6px 0px;"><i class='uil uil-angle-left' style="font-size: 1.5em; vertical-align: middle;"></i>Back to Academic Year List</a>
            </div>
                        <div class="register p-lg-9 p-sm-0">
                            <section class="form-container" >
                                <span class="title">Update Academic Year</span>
                                <form action="updateacademicyear.php" method="POST" enctype="multipart/form-data" class="form">
                                    <div class="form-group">
                                        <input name="txtacademicyearid" type="hidden" class="form-control" value="<?php echo $AcademicYearID?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Year</label>
                                        <input name="txtyear" type="text" class="form-control" id="year" value="<?php echo $Year?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="selectterm">Select Term</label>
                                        <select class="form-control" id="selectterm" name="cboterm" required>
                                            <option value="" disabled selected>-</option>
                                            <option value="First term">First term</option>
                                            <option value="Second term & Third term">Second term & Third term</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="closuredate">Closure Date</label>
                                        <input name="txtclosuredate" type="date" class="form-control" id="closuredate" value="<?php echo $ClosureDate?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="finalclosuredate">Final Closure Date</label>
                                        <input name="txtfinalclosuredate" type="date" class="form-control" id="finalclosuredate" value="<?php echo $FinalClosureDate?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                    <?php
                                    if (isset($_SESSION['AdministratorID'])) 
                                    {
                                        $UAdministratorID=$_SESSION['AdministratorID'];
                                    }
                                    ?>
                                    <input type="hidden" name="txtadministratorid" class="form-control" value="<?php echo $UAdministratorID ?>">
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


    //get the days between two dates
 
    function getDays(){
 
    var odate = new Date(document.getElementById('odate').value);
    var cdate = new Date(document.getElementById('cdate').value);
    //Here we will use getTime() function to get the time difference
    var time_difference = cdate.getTime() - odate.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000*3600*24);
    //alert(days);
    document.getElementById('duration').value = days_difference;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>