<?php
if(isset($_REQUEST["file"])){ //check if file key exist in URL.
    
    //get parameter
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    $filepath = "file/" . $file; //filepath is the directory where you store your file.
    
    // process for download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
}
?>