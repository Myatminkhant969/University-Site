<?php  
session_start();
include('connect.php');

$CategoryID=$_GET['CategoryID'];

$delete="DELETE FROM category 
         WHERE CategoryID=$CategoryID";
$result=mysqli_query($connection,$delete);

if($result) //TRUE 
{
	echo "<script>window.alert('Idea Category is successfully deleted!')</script>";
	echo "<script>window.location='category_administrator.php'</script>";
}
else
{
	echo "<p>Something Went Wrong in Category Deletion " . mysqli_error($connection) .  "</p>";
}
?>