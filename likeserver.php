<?php
    //connect to database
    $connection = mysqli_connect('localhost','root','','ewsd_db');

    // lets assume logged user has user_id ...
    $UserID = $_SESSION['UserID'];

    $sql = "SELECT * FROM idea";
    $result = mysqli_query($connection, $sql);

    //fetch all posts from database
    //return them as an associative array called $posts

    $ideas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // if user has clicked the like or dislike button
    if (isset($_POST['Action'])) {
        $IdeaID = $_POST['IdeaID'];
        $Action = $_POST['Action'];

        if ($Action == 'like') {
            $sql = "INSERT INTO likes(IdeaID,UserID,Reaction) VALUES ($IdeaID,$UserID,'$Action') ON DUPLICATE KEY UPDATE Reaction='like'";
        }
        else if ($Action == 'unlike') {
            $sql = "DELETE FROM likes WHERE UserID=$UserID AND IdeaID=$IdeaID";
        }
        else if ($Action == 'dislike') {
            $sql = "INSERT INTO likes(IdeaID,UserID,Reaction) VALUES ($IdeaID,$UserID,'$Action') ON DUPLICATE KEY UPDATE Reaction='dislike'";
        }
        else if ($Action == 'undislike') {
            $sql = "DELETE FROM likes WHERE UserID=$UserID AND IdeaID=$IdeaID";
        }

        //execute query
        mysqli_query($connection, $sql);
        // return number of likes
        echo getRating($IdeaID);
        exit(0);
    }


    // Get number of likes and dislikes for a particular post
    function getRating($IdeaID)
    {
        global $connection;
        $rating = array();
        $likes_query = "SELECT COUNT(*) FROM likes WHERE IdeaID = $IdeaID AND Reaction='like'";
        $dislikes_query = "SELECT COUNT(*) FROM likes WHERE IdeaID = $IdeaID AND Reaction='dislike'";

        $likes_rs = mysqli_query($connection, $likes_query);
        $dislikes_rs = mysqli_query($connection, $dislikes_query);

        $likes = mysqli_fetch_array($likes_rs);
        $dislikes = mysqli_fetch_array($dislikes_rs);

        $rating = [
            'likes' => $likes[0],
            'dislikes' => $dislikes[0],
        ];

        return json_encode($rating);
    }

    // Get total number of likes for a particular post
    function getLikes($IdeaID)
    {
        global $connection;

        $sql = "SELECT COUNT(*) FROM likes
                WHERE IdeaID = $IdeaID AND Reaction='like'";

        $rs = mysqli_query($connection, $sql);
        $result = mysqli_fetch_array($rs);
        return $result[0];
    }

    // Get total number of dislikes for a particular post
    function getDislikes($IdeaID)
    {
        global $connection;

        $sql = "SELECT COUNT(*) FROM likes 
                WHERE IdeaID=$IdeaID AND Reaction='dislike'";

        $rs = mysqli_query($connection, $sql);
        $result = mysqli_fetch_array($rs);
        return $result[0];
    }


    // Check if user already likes post or not
    function userLiked($IdeaID)
    {
        global $connection;
        global $UserID;

        $sql = "SELECT * FROM likes WHERE UserID=$UserID
                AND IdeaID=$IdeaID AND Reaction='like'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }else{
            return false;
        }
    }

    // Check if user already dislikes post or not
    function userDisliked($IdeaID)
    {
        global $connection;
        global $UserID;

        $sql = "SELECT * FROM likes WHERE UserID=$UserID
                AND IdeaID=$IdeaID AND Reaction='dislike'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }else{
            return false;
        }
    }
?>