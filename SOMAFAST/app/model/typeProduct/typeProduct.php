<?php
include('../../config/connection.php');
class typeProduct
{
  protected $typeProduct_descriptions;
  protected $typeProduct_id;
  protected $typeProduct_name;

  protected $table;

  public function __construct()
  {
    $this->table = "typeproduct";
  }



  /**
   * Get the value of typeProduct_descriptions
   */
  public function getTypeProductDescriptions()
  {
    return $this->typeProduct_descriptions;
  }

  /**
   * Set the value of typeProduct_descriptions
   */
  public function setTypeProductDescriptions($typeProduct_descriptions): self
  {
    $this->typeProduct_descriptions = $typeProduct_descriptions;

    return $this;
  }

  /**
   * Get the value of typeProduct_id
   */
  public function getTypeProductId()
  {
    return $this->typeProduct_id;
  }

  /**
   * Set the value of typeProduct_id
   */
  public function setTypeProductId($typeProduct_id): self
  {
    $this->typeProduct_id = $typeProduct_id;

    return $this;
  }

  /**
   * Get the value of typeProduct_name
   */
  public function getTypeProductName()
  {
    return $this->typeProduct_name;
  }

  /**
   * Set the value of typeProduct_name
   */
  public function setTypeProductName($typeProduct_name): self
  {
    $this->typeProduct_name = $typeProduct_name;

    return $this;
  }

  /**
   * Get the value of table
   */
  public function getTable()
  {
    return $this->table;
  }

  /**
   * Set the value of table
   */
  public function setTable($table): self
  {
    $this->table = $table;

    return $this;
  }
  public function getTypeProductAll()
  {

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
}



















?>