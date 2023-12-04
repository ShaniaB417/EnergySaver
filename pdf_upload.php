<?php

//image_upload.php - Upload an Image and Display iterator_apply
//Written by - shania brown

//Includes
include('upload.php');


//Variables
$pgm = 'pdf_upload.php'; 
$maxsize = 25000000;
$extns = array('.pdf', '.PDF', '.Pdf'); // different ways pdf could be written 
$dir  = 'pdf'; // Change the directory name to PDF

//Upload the file
if (isset($_FILES['pdf']['tmp_name'])) {
    $file_ext = strtolower(strrchr($_FILES['pdf']['name'], '.'));
    $file_mime = $_FILES['pdf']['type'];
    
    
    if (in_array($file_ext, $extns)) {
        list($rc, $filename) = upload('pdf', $dir, 'temp', $extns, $maxsize);
        if ($rc == 0) {
            $msg = 'File Upload Successful';
        } else {
            $msg = "File Upload Failed, RC = $rc, $filename";
        }
    } else {
        $msg = "Invalid File Type";
        $rc = 10;
    }
} else {
    $msg = 'Pdf files';
    $rc = 1;
}

// Form
echo "<!doctype html><html><body>
    PDF File Upload
    <form action='$pgm' method='POST' enctype='multipart/form-data'>
    <p>Select a PDF File: <input type='file' name='pdf'>
    <input type='submit' name='upload' value='Upload'>
    </form>
    <p>Message: $msg";

//Display the PDF using <embed> 
if ($rc == 0) {
    echo "<p>Uploaded PDF:<br><embed src='$filename' width='800px' height='600px' type='application/pdf'>";
}
echo "</body></html>";


?>


