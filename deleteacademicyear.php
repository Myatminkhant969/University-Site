<?php  
session_start();
include('connect.php');

$AcademicYearID=$_GET['AcademicYearID'];

$delete="DELETE FROM academicyear 
         WHERE AcademicYearID=$AcademicYearID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('Academic Year is successfully deleted!')</script>";
	echo "<script>window.location='academicyear_administrator.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in Academic Year Deletion " . mysqli_error($connection) .  "</p>";
}
?>