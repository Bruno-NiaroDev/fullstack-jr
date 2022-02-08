<?php 

class Carros {

  private $pathDataCSV = __DIR__.'/../data/carros.csv';
  
  public function __construct() {
    $this->loaderDataFull();
  }

  public function checkFile() {
    if(file_exists($this->pathDataCSV)){
      header('Location: view/listarCarros.php');
    } else {
      header('Location: view/pageError.php');
    }
  }

  private function loaderDataFull() {
    $handle = fopen($this->pathDataCSV, "r");

    $row = 0;
    while ($line = fgetcsv($handle)) {
      if ($row++ == 0) {
        continue;
      }

      $cars[] = [
        'id' => $line[0],
        'marca' => $line[1],
        'modelo' => $line[2],
        'versao' => $line[3],
        'descricao' => $line[4],
        'tipo' => $line[5],
        'categoria' => $line[6],
        'segmento' => $line[7],
        'ano_fabricacao' => $line[8],
        'ano_modelo' => $line[9],
        'portas' => $line[10],
        'preco' => $line[11],
        'dt_cadastro' => $line[12],
      ];
    }
    session_start();
    $_SESSION["dataCache"]=$cars;
    fclose($handle);
  }

}

?>