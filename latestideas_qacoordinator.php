<?php
session_start();
include('connect.php');
   
if (isset($_GET['page_no']) && $_GET['page_no']!="") 
{
    $page_no = $_GET['page_no'];
}
else 
{
    $page_no = 1;
}
        
    $total_records_per_page = 5;
    
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
        
    $result_count = mysqli_query($connection,"SELECT COUNT(*) As total_records FROM idea");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/uog-logo2.png" type="image/icon type">
    <title>University of Greenwich | Latest Ideas</title>

    <!-- CSS links -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        <a href="latestideas_qacoordinator.php" class="nav_link active">
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
                            <a href="updateuserbyself_qacoordinator.php" class="nav_link">
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
                  <li class="breadcrumb-item"><a href="home_qacoordinator.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Latest Ideas</li>
                </ol>
              </nav>

            <div class="mb-4">
                <h4>Latest Ideas</h4>
            </div>

            <?php
            $result = mysqli_query($connection,"SELECT * 
                                                FROM idea
                                                INNER JOIN academicyear ON academicyear.AcademicYearID=idea.AcademicYearID
                                                INNER JOIN category ON category.CategoryID=idea.CategoryID
                                                INNER JOIN user ON user.UserID=idea.UploadedBy
                                                ORDER BY idea.UploadedOn DESC
                                                LIMIT $offset, $total_records_per_page");
            while($row = mysqli_fetch_array($result))
            {
            ?>

            <div class="tag-idea-container">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="idea-post w-100">
                            <!-- <div class="idea-time text-right">
                                <small class="mb-0">Idea Uploaded time</small>
                            </div> -->
                            <div class="idea-header">
                                <small class="mb-0">Uploaded by <b>
                                <?php 
                                    if ($row['isAnonymous']=="false")
                                    {
                                        echo $row['Name'];
                                    }
                                    else
                                    {
                                        echo "Anonymous User";
                                    }
                                    ?>
                                    </b>
                                </small>
                                <small class="mb-0"><?php echo $row['UploadedOn']?></small>
                            </div>
                            <hr>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-2 tags active" style="font-size: 14px; font-weight: 500;">#<?php echo $row['CategoryName']?></span>
                            <div class="about-idea">
                                <h6 class="my-2"><?php echo $row['IdeaTitle']?></h6>
                            <p><?php echo $row['IdeaDetails']?></p>
                            <button type="button" class="btn btn-link see" style="font-weight: 500; padding: 0; margin: 0;">
                                <?php echo "<a href='ideadetails_qacoordinator.php?IdeaID=". $row['IdeaID'] ."'>See more</a";?>
                            </button>
                            </div>

                            <hr class="my-0">

                            <div class="like-cmt-container">
                                <div class="like-cmt-box">
                                    <p><i class="uil uil-thumbs-up mr-2"></i>Thumb Up (<?php
                                        $select="SELECT COUNT(*) AS LikeCount FROM likes WHERE IdeaID=". $row['IdeaID'] ." AND Reaction='like'";
                                        $query=mysqli_query($connection,$select);
                                        $rows=mysqli_fetch_array($query);
                                        $LikeCount = $rows['LikeCount'];
                                        echo $LikeCount;
                                        ?>)</p>
                                </div>
                                <div class="like-cmt-box">
                                    <p><i class="uil uil-thumbs-down mr-2"></i>Thumb Down (<?php
                                        $select="SELECT COUNT(*) AS DislikeCount FROM likes WHERE IdeaID=". $row['IdeaID'] ." AND Reaction='dislike'";
                                        $query=mysqli_query($connection,$select);
                                        $rows=mysqli_fetch_array($query);
                                        $DislikeCount = $rows['DislikeCount'];
                                        echo $DislikeCount;
                                        ?>)</p>
                                </div>
                                <div class="like-cmt-box">
                                    <p><i class="uil uil-comment mr-2"></i>Comments (<?php
                                        $select="SELECT COUNT(*) AS CommentCount FROM comment WHERE CommentedOn=". $row['IdeaID'] ."";
                                        $query=mysqli_query($connection,$select);
                                        $rows=mysqli_fetch_array($query);
                                        $CommentCount = $rows['CommentCount'];
                                        echo $CommentCount;
                                        ?>)</p>
                                </div>
                                <div class="like-cmt-box">
                                    <p><i class="uil uil-eye mr-2"></i>Views (<?php echo $row['Views'] ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
}
mysqli_close($connection);
?>
<div style='padding: 20px; border-top: dotted 1px #CCC;'>
    <p class="my-0">Page <?php echo $page_no." of ".$total_no_of_pages; ?></p>
</div>

<!-- Pagination Buttons -->
<nav>
<ul class="pagination justify-content-center pt-2 pb-5">
    
    <?php
    if($page_no <= 1){
        echo "<li class='page-item disabled'><a class='page-link' href='?page_no=$previous_page'>Previous</a></li>";
    }
    if($page_no > 1){
        echo "<li class='page-item'><a class='page-link' href='?page_no=$previous_page'>Previous</a></li>";   
    }

	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
			}
            else{
                echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
			}
        }
	}
	elseif($total_no_of_pages > 10){
        if($page_no <= 4) {			
            for ($counter = 1; $counter < 8; $counter++){		 
                if ($counter == $page_no){
                    echo "<li class='page-item active'><a>$counter</a></li>";	
                }
                else{
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }
            }
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            }

        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4){		 
            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++){			
                if ($counter == $page_no){
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
                }
                else{
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }                  
        }
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last'>$second_last</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
        }
            
        else{
            echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
            echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++){
                if ($counter == $page_no){
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
                }
                else{
                    echo "<li class='page-item'><a class='page-link' href='?page_no=$counter'>$counter</a></li>";
                }                   
            }
        }
	}

    if($page_no >= $total_no_of_pages){
        echo "<li class='page-item disabled'><a class='page-link' href='?page_no=$next_page'>Next</a></li>";
    }
    if($page_no < $total_no_of_pages){
        echo "<li class='page-item'><a class='page-link' href='?page_no=$next_page'>Next</a></li>";
    }
     
    if($page_no < $total_no_of_pages){
	    echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
	} 
    ?>

</ul>
</nav>
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

</script>
</html>