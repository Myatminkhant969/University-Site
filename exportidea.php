<?php 
// Load the database file 
include('connect.php');
 
// Fetch records from database 
$query = $connection->query("SELECT * 
                             FROM idea
                             INNER JOIN academicyear ON academicyear.AcademicYearID=idea.AcademicYearID
                             INNER JOIN category ON category.CategoryID=idea.CategoryID
                             ORDER BY academicyear.AcademicYearID DESC");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "ideas-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Year', 'Term', 'Category', 'Idea Title', 'Idea Details'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['Year'], $row['Term'], $row['CategoryName'], $row['IdeaTitle'], $row['IdeaDetails']);
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>