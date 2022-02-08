<?php
 // Controller Carros.
 include '../model/carros.php';

class CarrosController extends Carros {
    public function getAllCars() {
        return $_SESSION["dataCache"];
      }
    
      public function getCarById($idCar) {
        
        return $_SESSION["dataCache"][
          array_search(
            $idCar, 
            array_column(
              $_SESSION["dataCache"], 
              'id'
            )
          )];
      }
}
?>