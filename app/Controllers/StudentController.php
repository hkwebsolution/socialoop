<?php

namespace App\controllers;

use App\Supports\Database;
use App\Utility\Image;

class StudentController extends Database
{

    use Image;
    
    /**
     * Add new student
     */

     public function studentCreate($name ,$email, $cell, $uname)
     {

      $photo_name = NULL;
        if ( $this ->photoExist('photo') ) {
           $photo_name = $this -> move($_FILES['photo'], 'photos/students/');
        }

        $this -> create("INSERT INTO students ( name, email, cell, username, photo ) VALUES ('$name' ,'$email', '$cell', '$uname', '$photo_name') ");
     }

     /**
      * Get all student's existing data
      */

     public function getAllStudentData()
     {
        return $this ->all('students');
     }

     public function deleteData($delete_id)
     {
         $this -> delete('students', $delete_id);
     }

     /**
      * View single data
      */

      public function viewData($id)
      {
        return $this-> find('students', $id);
      }

      /**
       * Edit student data
       */

       public function editData($id)
       {
         return $this -> find('students', $id);

       }
       public function updateData($id, $name, $email, $cell, $uname)
       {
         $this->update("UPDATE users SET name='{$name}', email='{$email}', cell ='{$cell}', username = '{$uname}' WHERE id='{$id->id }'" );

       }



}
