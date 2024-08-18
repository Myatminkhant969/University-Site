<?php
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/uog-logo2.png" type="image/icon type">
    <title>University of Greenwich | Home</title>

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
                        <a href="home_administrator.php" class="nav_link active">
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
    <main>
        <div class="container" style="margin-top: 0px;">
            <?php
                $query = "SELECT DepartmentName, COUNT(*) AS num_ideas
                FROM user
                INNER JOIN  idea ON idea.UploadedBy=user.UserID
                INNER JOIN department ON user.DepartmentID=department.DepartmentID
                GROUP BY DepartmentName";
                $result = mysqli_query($connection, $query);
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">  
            google.charts.load('current', {'packages':['corechart']});  
            google.charts.setOnLoadCallback(drawChart);  
            function drawChart()  
            {  
                    var data = google.visualization.arrayToDataTable([  
                            ['DepartmentName', 'Number'],  
                            <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                                echo "['".$row["DepartmentName"]."', ".$row["num_ideas"]."],";  
                            }  
                            ?>  
                        ]);  
                    var options = {  
                        title: 'Percentage of Ideas per Department',  
                        //is3D:true,  
                        pieHole: 0.4  
                        };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                    chart.draw(data, options);  
            }  
            </script>

<?php
                $query = "SELECT DepartmentName, COUNT(*) AS num_users
                FROM user
                INNER JOIN department ON user.DepartmentID=department.DepartmentID
                GROUP BY DepartmentName";
                $result = mysqli_query($connection, $query);
            ?>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">  
            google.charts.load('current', {'packages':['corechart']});  
            google.charts.setOnLoadCallback(drawChart);  
            function drawChart()  
            {  
                    var data = google.visualization.arrayToDataTable([  
                            ['DepartmentName', 'Number'],  
                            <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                                echo "['".$row["DepartmentName"]."', ".$row["num_users"]."],";  
                            }  
                            ?>  
                        ]);  
                    var options = {  
                        title: 'Number of contributors within each Department',  
                        //is3D:true,  
                        pieHole: 0.4  
                        };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                    chart.draw(data, options);  
            }  
            </script>
        <br><br>
            <div style="width: 100%;">
                <br>
                <div id="piechart1" style="width: 100%; height: 500px;"></div>
                    
            </div>
            <div style="width: 100%;">
                <br>  
                <div id="piechart2" style="width: 100%; height: 500px;"></div>    
            </div>
            
            <div class="table-container">
                <h4 class="mt-3 mb-4">Exceptional report</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Total number of ideas</td>
                            <td>
                                <?php
                                $query="SELECT COUNT(*) AS total_ideas
                                        FROM idea";
                                $result=mysqli_query($connection,$query);
                                $rows=mysqli_fetch_array($result);
                                echo $rows['total_ideas'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total number of ideas without a comment</td>
                            <td>
                                <?php
                                $query="SELECT COUNT(*) AS total_ideas_wo_cmt 
                                        FROM idea
                                        WHERE IdeaID NOT IN (SELECT CommentedOn FROM comment)";
                                $result=mysqli_query($connection,$query);
                                $rows=mysqli_fetch_array($result);
                                echo $rows['total_ideas_wo_cmt'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total number of anonymous ideas</td>
                            <td>
                                <?php
                                $query="SELECT COUNT(*) AS anony_ideas
                                        FROM idea
                                        WHERE isAnonymous='true'";
                                $result=mysqli_query($connection,$query);
                                $rows=mysqli_fetch_array($result);
                                echo $rows['anony_ideas'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Total number of anonymous comments</td>
                            <td>
                            <?php
                                $query="SELECT COUNT(*) AS anony_cmts
                                        FROM comment
                                        WHERE CisAnonymous='true'";
                                $result=mysqli_query($connection,$query);
                                $rows=mysqli_fetch_array($result);
                                echo $rows['anony_cmts'];
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
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