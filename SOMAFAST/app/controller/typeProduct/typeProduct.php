<?php
require('../../config/view.php');
require('../../model/typeProduct/typeProduct.php');
 class Controller_typeProduct {
  protected $model;
  protected $view;
  protected $result;
  
  public function __construct() {
    $this->model = new typeProduct();
    $this->view = new View();
    $this->result = [];
  }

  public function show (){
    $data['typeProduct']=$this->result = $this->model->getTypeProductAll();
    $data['css']=$this->view->reder("css/css");
    //$data['js']="../../view/assets/js/js.php";


    //return $data;

   }

 }


?>