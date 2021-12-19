<?php

namespace App\Supports;

class Validate{

  /**
   * Validate Message
   */
    public static function msg ($msg, $type = 'danger'){

      return "<p class=\"alert alert-{$type} \">{$msg}</p> " ; 
    }

    /**
     * Validate messsage show
     */

     public static function show($msg)
     {
       echo $msg ?? '';
     }


    /**
     * Email check
     */
    public static function email($email){

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
      }else {
        return false;
      }
    }

}