<?php

namespace App\Utility;
/**
 * Image uploading
 */

 trait Image {

    /**
     * File upload check
     */

     protected function photoExist($name){
         if (!empty($_FILES[$name]['name'])) {
        return true;
        }else {
         return false;
         }

     }

    protected function move($file, $path)
    {
        $file_name= $file['name'];
        $file_tmp_name = $file['tmp_name'];
        move_uploaded_file($file_tmp_name, $path . $file_name);
        return $file_name;
    }
 }