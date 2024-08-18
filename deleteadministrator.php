<?php  
session_start();
include('connect.php');

$AdministratorID=$_GET['AdministratorID'];

$delete="DELETE FROM administrator 
         WHERE AdministratorID=$AdministratorID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('Administrator is deleted successfully.')</script>";
	echo "<script>window.location='administrator.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in Administrator Deletion " . mysqli_error($connection) .  "</p>";
}
?>