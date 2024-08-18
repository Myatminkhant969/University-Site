<?php  
session_start();
include('connect.php');

$DepartmentID=$_GET['DepartmentID'];

$delete="DELETE FROM department 
         WHERE DepartmentID=$DepartmentID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('Department is successfully deleted!')</script>";
	echo "<script>window.location='department_administrator.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in Department Deletion " . mysqli_error($connection) .  "</p>";
}
?>