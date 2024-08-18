<?php  
session_start();
include('connect.php');

$RoleID=$_GET['RoleID'];

$delete="DELETE FROM role 
         WHERE RoleID=$RoleID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('Role is deleted successfully.')</script>";
	echo "<script>window.location='role.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in Role Deletion " . mysqli_error($connection) .  "</p>";
}
?>