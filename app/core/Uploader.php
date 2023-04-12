<?php

class Uploader{

    public static function ok($file, $randomName, $photoName)
    {
        //Jika file tidak kosong / filenya ada
        if(!empty($file)) {
            $tmpName = $file['tmp_name'];
            $dir = $_SERVER["DOCUMENT_ROOT"] . '/bug-hunter/public/dist/img/';
            $filePath = $dir . $randomName;
            $fileExists = $dir . $photoName;

            //Jika file ada pada directory maka hapus filenya
            if(file_exists($fileExists)) {
                unlink($fileExists);
            }

            if($file['size'] >= 2048000) {
                die("File terlalu besar!!");    
            }
            
            if(move_uploaded_file($tmpName, $filePath)) {
                return true;
            }else {
                return true;
            }
        
        }else{
            die("File Not Found!!");
        }
    }
}