<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
session_start();
include('connect.php');

if (isset($_POST['txtanonymous'])) {
    $txtanonymous = $_POST['txtanonymous'];
}
else{
    $txtanonymous = "false";
}

if (isset($_POST['btnUpload'])) {
    $cboacademicyear=$_POST['cboacademicyear'];
    $cbocategory=$_POST['cbocategory'];
    $txttitle=$_POST['txttitle'];
    $txtdetails=$_POST['txtdetails'];
    $txtuserid=$_POST['txtuserid'];
    $ToCoordinator=$_POST['txtqacoordinator'];

    $File=$_FILES['txtfile']['name'];
	$folder="files/";
	if($File) 
	{
		$filename=$folder.$File;
		$copied=copy($_FILES['txtfile']['tmp_name'], $filename);
	    if (!$copied) 
		{
            echo "<script>window.alert('Problem Occured. Cannot upload image!');</script>";
            echo "<script>window.location='uploadidea.php'</script>";
		}
		else
        {
            $query="INSERT INTO idea(AcademicYearID,CategoryID,IdeaTitle,IdeaDetails,AttachmentFile,isAnonymous,UploadedBy,UploadedOn) VALUES ('$cboacademicyear','$cbocategory','$txttitle','$txtdetails','$filename','$txtanonymous','$txtuserid',CURRENT_TIMESTAMP())";
            $result=mysqli_query($connection,$query);
            
            if ($result) {
                $mail = new PHPMailer(true);
        
                // $mail->SMTPDebug = 2;                                  
                $mail->isSMTP();                                           
                $mail->Host       = 'smtp.gmail.com;';                   
                $mail->SMTPAuth   = true;                            
                $mail->Username   = 'ewsdtest@gmail.com';                
                $mail->Password   = 'emwdkllnkqctlsmp';                       
                $mail->SMTPSecure = 'tls';                             
                $mail->Port       = 587;

                $mail->setFrom('ewsdtest@gmail.com', 'EWSDTest');          
                $mail->addAddress($ToCoordinator);
                    
                $mail->isHTML(true);                                 
                $mail->Subject = 'New message from UOG website';
                $mail->Body    = '<p>Dear user,</p>
                <p>We are pleased to inform you that a new idea has been uploaded to our platform. Please log in to view and provide feedback on this exciting new idea.</p>
                <p>Thank you for your continued support in driving innovation and improving our university.</p>
                <p>Best regards.</p>';
                // $mail->AltBody = 'Body in plain text for non-HTML mail clients';
                $mail->send();
                // echo "Mail has been sent successfully!";
                echo "<script>window.alert('Idea is successfully uploaded.')</script>";
                echo "<script>window.location='uploadidea.php'</script>";
            }
            else
            {
                echo "<p>Something went wrong in Idea Upload!" . mysqli_error($connection) .  "</p>";
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
    <title>University of Greenwich | Upload New Idea</title>

    <!-- CSS links -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                        <a href="allideas_staff.php" class="nav_link">
                            <i class="uil uil-lightbulb-alt icon"></i>
                            <span class="link-name">All Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="latestideas_staff.php" class="nav_link">
                            <i class="uil uil-newspaper icon"></i>
                            <span class="link-name">Lastest Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostpopularideas_staff.php" class="nav_link">
                            <i class="uil uil-analysis icon"></i>
                            <span class="link-name">Most Popular Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mostviewedideas_staff.php" class="nav_link">
                            <i class="uil uil-eye icon"></i>
                            <span class="link-name">Most Viewed Ideas</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="tags_staff.php" class="nav_link">
                            <i class="uil uil-tag icon"></i>
                            <span class="link-name">Tags</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="uploadidea.php" class="nav_link active">
                            <i class="uil uil-upload icon"></i>
                            <span class="link-name">Upload Idea</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-content">
                    <ul>
                        <li class="list">
                            <a href="updateuserbyself_staff.php" class="nav_link">
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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Upload new idea</li>
                </ol>
              </nav>

            <div class="idea">
                <section class="ideaform-container">
                    <span class="title">New Idea</span>
                    <form action="uploadidea.php" method="POST" enctype="multipart/form-data" class="form">
                        <div class="form-group row">
                            <label for="idea-title" class="col-sm-3 col-form-label">Academic Year</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="select1" name="cboacademicyear">
                                    <option disabled selected>-</option>
                                        <?php  
                                            $query="SELECT * 
                                                    FROM academicyear";
                                            $result=mysqli_query($connection,$query);
                                            $count=mysqli_num_rows($result);
                                            $CurrentDate = date('Y-m-d');

                                            for ($i=0;$i<$count;$i++) 
                                            { 
                                                $row=mysqli_fetch_array($result);
                                                $AcademicYearID=$row['AcademicYearID'];
                                                $Year=$row['Year'];
                                                $Term=$row['Term'];
                                                $ClosureDate=$row['ClosureDate'];

                                                // echo "<option value='$AcademicYearID'>$Year - $Term</option>";
                                                
                                                if ($ClosureDate > $CurrentDate) 
                                                {
                                                    echo "<option value='$AcademicYearID'>$Year - $Term</option>";
                                                } 
                                                else 
                                                {
                                                    echo "<option value='$AcademicYearID' disabled>$Year - $Term (Closed)</option>";
                                                }
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idea-title" class="col-sm-3 col-form-label">Idea Tag</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="select2" name="cbocategory">
                                    <option disabled selected>-</option>
                                        <?php  
                                            $query="SELECT * 
                                                    FROM category
                                                    WHERE CategoryStatus='0'";
                                            $result=mysqli_query($connection,$query);
                                            $count=mysqli_num_rows($result);

                                            for ($i=0;$i<$count;$i++) 
                                            { 
                                                $row=mysqli_fetch_array($result);
                                                $CategoryID=$row['CategoryID'];
                                                $CategoryName=$row['CategoryName'];

                                                echo "<option value='$CategoryID'>$CategoryName</option>";
                                            }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="idea-title" class="col-sm-3 col-form-label">Idea Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="txttitle" class="form-control" id="idea-title" required>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="textarea" class="col-sm-3 col-form-label">Idea Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="txtdetails" id="textarea" required></textarea>
                            </div>
                        </div>
                        <div class="custom-file my-3">
                            <input type="file" name="txtfile" class="custom-file-input" id="file" required>
                            <label class="custom-file-label" for="file">Choose file...</label>
                        </div>
                        
                        <div class="form-check mt-3 mb-3">
                            <input class="form-check-input" name="txtanonymous" type="checkbox" value="false" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">Upload Anonymously</label>
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                            <label class="form-check-label" for="defaultCheck1">I agree to the <a href="" style="color: #000080; text-decoration: underline;">Terms and Conditions</a>.</label>
                        </div>

                        <div class="form-group">
                            <?php
                                if (isset($_SESSION['UserID'])) 
                                {
                                    $UserID=$_SESSION['UserID'];
                                }
                            ?>
                            <input type="hidden" name="txtuserid" class="form-control" value="<?php echo $UserID ?>">
                        </div>

                        <?php
                            if (isset($_SESSION['UserID'])) 
                            {
                                $UserID=$_SESSION['UserID'];
                            }
                            $query1="SELECT *
                                    FROM user
                                    WHERE UserID='$UserID'";
                            $result=mysqli_query($connection,$query1);
                            $rows=mysqli_fetch_array($result);
                            $DepartmentID=$rows['DepartmentID'];

                            $query2="SELECT *
                                    FROM user
                                    INNER JOIN role ON user.RoleID=role.RoleID
                                    WHERE role.RoleName='QA Coordinator' AND DepartmentID='$DepartmentID'";
                            $result=mysqli_query($connection,$query2);
                            $row=mysqli_fetch_array($result);
                            $CoordinatorEmail=$row['Email'];
                        ?>

                        <input type="hidden" name="txtqacoordinator" class="form-control" value="<?php echo $CoordinatorEmail ?>">
                        
                        <input type="submit" class="btn-login-register" name="btnUpload" value="Upload" style="width: auto;">
                      </form>
                </section>
            </div>

        </div>
    </main>
</body>
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

    $("#checkbox1").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
        } 
        else {
            $(this).attr('value', 'false');
        }
    });

    $(document).ready(function () {
    bsCustomFileInput.init()
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script>
$(document).ready(function () {
  bsCustomFileInput.init()
})
</script>
</html>