<?php 

class Carros {

  public function checkFile() {
    if(file_exists(__DIR__.'/../data/carros.csv')){
      header('Location: view/listarCarros.php');
    } else {
      header('Location: view/pageError.php');
    }
  }
}

?>