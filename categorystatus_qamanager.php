<?php
include('connect.php');

$CategoryID=$_GET['CategoryID'];
$CategoryStatus=$_GET['CategoryStatus'];

$query="UPDATE category 
        SET CategoryStatus=$CategoryStatus
        WHERE CategoryID=$CategoryID";
mysqli_query($connection,$query);

header('location:category_qamanager.php');
?>