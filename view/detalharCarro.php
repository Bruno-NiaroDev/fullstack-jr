<?php 
  include '../controller/carros.php'; 
  $carros = new CarrosController();
  $carro = $carros->getCarById($_GET['carId']);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <h2><?php echo $carro['marca']; ?> <span class="text-danger"><?php echo $carro['modelo']; ?></span></h2>
      <p class="text-secondary"><?php echo $carro['versao']; ?></p>
    </div>
    <div class="col-sm-5">
      <h4>R$ <span class="text-danger"><?php echo number_format($carro['preco'], 2, ',', '.'); ?></span></h4>
    </div>
    <div class="col-sm-4">Tipo: <b><?php echo $carro['categoria']; ?></b></div>
    <div class="col-sm-4">Categoria: <b><?php echo $carro['marca']; ?></b></div>
    <div class="col-sm-4">Segmento: <b><?php echo $carro['segmento'] == '\0' ? 'Não Informado' : $carro['segmento']; ?></b></div>
    <div class="col-sm-4">Ano De Fabricação: <b><?php echo $carro['ano_fabricacao']; ?></b></div>
    <div class="col-sm-4">Ano Do Modelo: <b><?php echo $carro['ano_modelo']; ?></b></div>
    <div class="col-sm-4">Portas: <b><?php echo $carro['portas']; ?></b></div>
    <div class="col-sm-12">
      <h5>Descrição</h5>
      <p><?php echo !empty($carro['descricao']) ? $carro['descricao'] : 'Não Informado'; ?></p>
    </div>
    <div class="col-sm-12">
      <p class="text-muted">Anúncio Criado em: <?php echo date_format(date_create($carro['dt_cadastro']), 'd/m/Y H:i:s') ?></p>
    </div>
  </div>
</div>