<?php
include('../../config/connection.php');


class Product {

  protected $Id 	;
  protected $Name 	;
  protected $Description ;	
  protected $Images ;	
  protected $description_detailed ; 	
  protected $category ;	
  protected $due_date; 	

protected $table;

public function __construct(){
  $this->table = "products";
  $this->Id = "Id";
}

public function getProductAll(){

  $objConn = new Connection();
  $conn = $objConn->getConnection();

  $sql = "SELECT * FROM ". $this->table . " WHERE 1 " ;
  $resultArray = array();

  if (!$conn->multi_query($sql)) {
    echo "Falló la multiconsulta: (" . $conn->errno . ") " . $conn->error;
  }

  do {
    if ($result = $conn->store_result()) {
      $resultQuery = $result->fetch_all(MYSQLI_NUM);
      array_push($resultArray, $resultQuery);
      $result->free();
    }
  } while ($conn->more_results() && $conn->next_result());

   
   $objConn->closeConnection(); 
   return $resultArray[0]; 
  
}

public function getProductId($Id){



 
 $objConn = new Connection();
 $conn = $objConn->getConnection();

 $sql = "SELECT * FROM ". $this->table . " WHERE ".$this->Id. "= " . $Id ;
 $resultArray = array();

 if (!$conn->multi_query($sql)) {
   echo "Falló la multiconsulta: (" . $conn->errno . ") " . $conn->error;
 }

 do {
   if ($result = $conn->store_result()) {
     $resultQuery = $result->fetch_all(MYSQLI_NUM);
     array_push($resultArray, $resultQuery);
     $result->free();
   }
 } while ($conn->more_results() && $conn->next_result());

  
  $objConn->closeConnection(); 
  return $resultArray[0]; 
}

public function setInsert($Name, $Description, $Images, $description_detailed, $category, $due_date){
/*   INSERT INTO `products`(`Id`, `Name`, `Description`, `Images`, `description_detailed`, `category`, `due_date`) 
INSERT INTO `products`(`Id`, `Name`, `Description`, `Images`, `description_detailed`, `category`, `due_date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]') 
*/}

public function setUpdate(){
/*   UPDATE `products` SET `Id`='[value-1]',`Name`='[value-2]',`Description`='[value-3]',`Images`='[value-4]',`description_detailed`='[value-5]',`category`='[value-6]',`due_date`='[value-7]' WHERE 1
 */}

public function setDelete(){
/*   DELETE FROM `products` WHERE `Id`=
 */}
}

/* $objProduct = new Product();
$listProducts = $objProduct->getProductId(1);
var_dump($listProducts); */
?>

