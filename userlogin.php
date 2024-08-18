<?php
session_start();
include('connect.php');

if(isset($_POST['btnLogin']))
{
$Email=$_POST['txtemail'];
$Password=$_POST['txtpassword'];

$select="SELECT *
         FROM user
         INNER JOIN role ON user.RoleID=role.RoleID
         WHERE Email='$Email'";
$query=mysqli_query($connection,$select);
if (mysqli_num_rows($query)>0) {
    while ($data=mysqli_fetch_assoc($query)) {
        if (password_verify($Password, $data['Password'])) {
            $Email=$data['Email'];
            $RoleName=$data['RoleName'];
            $UserID=$data['UserID'];
            $_SESSION['UserID']=$UserID;

            if($data['RoleName']=='QA Manager'){
                echo "<script>window.alert('User Login Successful')</script>";
                echo "<script>window.location='home_qamanager.php'</script>";
            }
            elseif($data['RoleName']=='QA Coordinator'){
                echo "<script>window.alert('User Login Successful')</script>";
                echo "<script>window.location='home_qacoordinator.php'</script>";
            }
            else{
                echo "<script>window.alert('User Login Successful')</script>";
                echo "<script>window.location='allideas_staff.php'</script>";
            }
        }
    }
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
    <title>User Login</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <!-- <div class="container"> -->
        <div class="login">
            <section class="form-container">
                <!-- <span class="title">Login</span> -->
                <div class="form_title">
                    <h2>Login</h2>
                    <img src="img/uog-logo.png" alt="University of Greenwich Logo">
                </div>
                <form action="userlogin.php" method="POST" class="form">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" name="txtemail" class="form-control" id="email" required>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password">Password</label>
                      <input type="password" name="txtpassword" class="form-control" id="password" required>
                    </div>
                    <div class="form-check mb-4">
                      <input type="checkbox" class="form-check-input" id="check1">
                      <label class="form-check-label" for="check1">Remember me</label>
                    </div>
                    <button type="submit" class="btn-login-register" name="btnLogin">Login</button>
                </form>
            </section>
        </div>
    <!-- </div> -->
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>