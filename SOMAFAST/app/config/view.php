<?php

abstract class View {

  protected $path;

  public function __construct(){

        
        
  }
  function reder($name, $data=[] ){
    $this->d = $data;

    require 'view/'.$name.'.php';
  }

}