<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/uog-logo2.png" type="image/icon type">
    <title>University of Greenwich | Tags</title>

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
                        <a href="tags_qacoordinator.php" class="nav_link active">
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
                  <li class="breadcrumb-item active" aria-current="page">Tags</li>
                </ol>
              </nav>
            <div class="tags-container">
                <h4>Tags</h4>
                <div class="post-tags mt-4">
                    <?php
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($connection, $query);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <span class="badge rounded-pill bg-light text-dark text-wrap tags" style="font-size: 14px; font-weight: 500;" data-id="<?php echo $row['CategoryID']?>" name="btnCategory">#<?php echo $row['CategoryName']?></span>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
            <hr>
            <div class="tag-idea-container">
                <div class="row">
                <?php
                $result = mysqli_query($connection,"SELECT * 
                                                    FROM idea
                                                    INNER JOIN academicyear ON academicyear.AcademicYearID=idea.AcademicYearID
                                                    INNER JOIN category ON category.CategoryID=idea.CategoryID
                                                    INNER JOIN user ON user.UserID=idea.UploadedBy
                                                    ORDER BY idea.UploadedOn DESC");
                while($row = mysqli_fetch_array($result))
                {
                ?>
                    <div class="col-lg-4 mb-3">
                        <div class="idea-post">
                            <div class="idea-header">
                                <small class="mb-0" style="font-size: 12px;"><?php echo $row['UploadedOn']?></small>
                                <small class="mb-0" style="font-size: 12px;"><i class="uil uil-eye mr-1"></i>Views (<?php echo $row['Views']?>)</small>
                            </div>
                            <hr>
                            <span class="badge rounded-pill bg-light text-dark text-wrap mb-2 tags active" style="font-size: 14px; font-weight: 500;">#<?php echo $row['CategoryName']?></span>
                                <h6 class="my-2"><?php echo $row['IdeaTitle']?></h6>
                                <p>
                                    <a href="ideadetails_qacoordinator.php?IdeaID=<?php echo $row['IdeaID']?>" class="read-more-link">See more...</a>
                                </p>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
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
</script>
</html>