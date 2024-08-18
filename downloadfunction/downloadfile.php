<?php 
	
	// create a zip file
	$zip_file = "../zipfile/all-documents.zip";
	touch($zip_file);
	// end
	

	// open zip file
	$zip = new ZipArchive;
	$this_zip = $zip->open($zip_file);


	if($this_zip){

		// $file_with_path = "../image/1.jpg";
		// $name = "1.jpg";
		// $zip->addFile($file_with_path,$name);

		$folder = opendir('./../files');

		if($folder){
			while( false !== ($file = readdir($folder))){
				if($file !== "." && $file !== ".."){
					
					$file_with_path = "../files/".$file;

					$zip->addFile($file_with_path,$file);
				}
			}
			closedir($folder);
		}


		// download this created zip file
		if(file_exists($zip_file))  
		{  
			//name when download
			 $demo_name = "all-idea-documents.zip";

		     header('Content-type: application/zip');  
		     header('Content-Disposition: attachment; filename="'.$demo_name.'"');  
		     readfile($zip_file); // auto download

		     //delete this zip file after download
		     unlink($zip_file);  
		}
	}
?>