<?php
session_start();
include ('connect.php');

if (isset($_GET['IdeaID'])) 
{
    $IdeaID=$_GET['IdeaID'];
    $select="SELECT * 
             FROM idea
             WHERE IdeaID='$IdeaID'";
    $query=mysqli_query($connection,$select);
    $count=mysqli_num_rows($query);

    if ($count>0) 
    {
        $data=mysqli_fetch_array($query);
        $IdeaID=$data['IdeaID'];
        $AttachmentFile=$data['AttachmentFile'];
    }


    $output='file.zip';
    $input=$AttachmentFile;

    $zip=new ZipArchive;

    if ($zip -> open($output,ZipArchive::CREATE)==TRUE) {
        $zip -> addFile($input);
        $zip -> close();
    }

    if(file_exists($output))  
		{  
			//name when download
			 $demo_name = "file-download.zip";

		     header('Content-type: application/zip');  
		     header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
		     readfile($output); // auto download

		     //delete this zip file after download
		     unlink($output);  
		}

    
}
?>