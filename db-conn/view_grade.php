<?php
        $file = $_GET['file']; 
        $filename = $_GET['filename']; 

        if (file_exists($file)) {
            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info, $file);
            finfo_close($file_info);
            
            header('Content-Type: ' . $mime_type);
            
            readfile($file);
        } else {
            echo 'File not found.';
        }
 ?>
