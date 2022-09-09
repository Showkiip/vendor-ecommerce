<?php

namespace App\Models;


class Alert
{

  public static function _message($type,$message){
      $html = '<div class="alert alert-'.$type.' alert-has-icon alert-dismissible show fade in">

                  <div class="alert-body">
                      '.$message.'
                  </div>
                  <button class="close" data-dismiss="alert">
                  <span>×</span>
                  </button>
              </div>';
      return $html;
  }

}
// <div class="alert-title">Info</div>
