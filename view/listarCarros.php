<?php include '../controller/carros.php'; ?>
<!DOCTYPE html>
<html lang="pt_bt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste Full Stack PHP - Bruno Araujo</title>

  <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>

  <div class="container-fluid p-3 bg-dark text-white">
    <h1><i class="fas fa-vial"></i> Teste Full Stack PHP</h1>
    <p>Olá, sou o Bruno e aqui está a minha listagem de carros! <i class="far fa-smile-wink"></i></p>
  </div>
  <br>
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
          <td>
            <button id="<?php echo $car['id']; ?>" type="button" class="carInfo btn btn-link" >
              <i class="fas fa-search-plus"></i>
            </button>
          </td>
        </tr>
      <?php
        }
      ?>
      </tbody>
    </table>    
  </div>
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detalhes: </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.carInfo').click(function(){
        var carId = $(this).attr('id');
        
        $.ajax({
          url: 'detalharCarro.php?carId='+carId,
          type: 'get',
          success: function(response){ 
            $('.modal-body').html(response);
            $('#myModal').modal('show')
          }
        });
      });
      
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