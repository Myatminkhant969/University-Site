<?php  
session_start();
include('connect.php');

$UserID=$_GET['UserID'];

$delete="DELETE FROM user 
         WHERE UserID=$UserID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('User is deleted successfully.')</script>";
	echo "<script>window.location='user.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in User Deletion " . mysqli_error($connection) .  "</p>";
}
?>