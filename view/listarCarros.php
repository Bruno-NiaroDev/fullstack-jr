<?php include '../controller/carros.php'; ?>
<!DOCTYPE html>
<html lang="pt_bt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste Full Stack PHP - Bruno Araujo</title>

  <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

  <div class="container-fluid p-3 bg-dark text-white">
    <h1><i class="fas fa-vial"></i> Teste Full Stack PHP</h1>
    <p>Olá, sou o Bruno e aqui está a minha listagem de carros! <i class="far fa-smile-wink"></i></p>
  </div>
  <div class="container" >

    <table id="myTable" class="table-responsive table-striped table-bordered" style="width:100%">
      <thead class="thead-light">
        <tr>
          <th>Tipo</th>
          <th>Categoria</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Versão</th>
          <th>Ano Modelo</th>
          <th>-</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $carros = new CarrosController();
        foreach($carros->getAllCars() as $car){
      ?>
        <tr>
          <td><?php echo $car['tipo']; ?></td>
          <td><?php echo $car['categoria']; ?></td>
          <td><?php echo $car['marca']; ?></td>
          <td><?php echo $car['modelo']; ?></td>
          <td><?php echo $car['versao']; ?></td>
          <td><?php echo $car['ano_modelo']; ?></td>
          <td><a href="" style="color: grey"><i class="fas fa-search-plus"></i></a></td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    $(document).ready(function(){
      $('#myTable').DataTable({
        "language": {
          "lengthMenu": "Mostrando _MENU_ registros por página",
          "zeroRecords": "Nada encontrado",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "Nenhum registro disponível",
          "infoFiltered": "(filtrado de _MAX_ registros no total)",
          "search": "Pesquisar",
          "paginate": {
            "next": "Próximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "Último"
          }
        }
      });
    });
  </script>

</body>
</html>