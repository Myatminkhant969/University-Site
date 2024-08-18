<?php
include('connect.php');

if (isset($_POST['btnRegister'])) {
    $txtrolename=$_POST['txtrolename'];

    $check="SELECT *
            FROM role
            WHERE RoleName='$txtrolename'";
    $result=mysqli_query($connection,$check);
    $count=mysqli_num_rows($result);

    if ($count!=0) {
        echo "<script>window.alert('Role $txtrolename already exists.')</script>";
        echo "<script>window.location='role.php'</script>";
    }
    else{
        $query="INSERT INTO role(RoleName) VALUES ('$txtrolename')";
        $result=mysqli_query($connection,$query);
    }
    if ($result) {
        echo "<script>window.alert('Role is added successfully.')</script>";
        echo "<script>window.location='role.php'</script>";
    }
    else
    {
        echo "<p>Something went wrong in Role Entry!" . mysqli_error($connection) .  "</p>";
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
    <title>University of Greenwich | Roles</title>

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
                        <a href="academicyear_administrator.php" class="nav_link">
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
                        <a href="role.php" class="nav_link active">
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
    <main>
        <div class="container" style="margin-top: 100px;">

            <div class="tablepage-header">
                <div class="pt-3">
                    <h4>Roles</h4>
                </div>
                <div class="th-btns text-right">
                    <button type="button" class="btn-modal" data-toggle="modal" data-target="#exampleModal">
                        + Add New Role
                    </button>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                        <div class="register">
                            <section class="form-container">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="uil uil-times"></i>
                                </button>
                                <span class="title">Role Entry</span>
                                <form action="role.php" method="POST" enctype="multipart/form-data" class="form">
                                    <div class="form-group">
                                        <label for="name">Role Name</label>
                                        <input name="txtrolename" type="text" class="form-control" id="name" required>
                                    </div>
                                    <!-- <button type="submit" class="btn-login-register mt-4" name="btnRegister">Register</button> -->
                                    <input type="submit" class="btn-login-register mt-4" name="btnRegister" value="Register">
                                </form>
                            </section>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
<?php
$query="SELECT * 
        FROM role";
$result=mysqli_query($connection,$query);
$count=mysqli_num_rows($result);

if ($count < 1) {
    echo "<p>No Role Found.</p>";
}
else{
    ?>
    <div class="table-container">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Role Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i=0;$i<$count;$i++){
                            $rows=mysqli_fetch_array($result);
                        //print_r($rows);
                        $RoleID=$rows['RoleID'];

                        echo "<tr>";
                        echo "<td>$RoleID</td>";
                        echo "<td>" . $rows['RoleName'] . "</td>";
                        ?>
                        <td>
                        <a href="" type="button" data-toggle="modal" data-target="#updateModal<?php echo $rows['RoleID']?>">Edit</a> | <a href="deleterole.php?RoleID=<?php echo $RoleID?>">Delete</a>
                        </td>
                        <?php
                        echo "</tr>";
                        include ('updaterole.php');
                        }
                        ?>
                    </tbody>
                  </table>
            </div>
<?php
}
?>
         
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