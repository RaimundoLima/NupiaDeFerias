<?php
include('../model/acaoVinculadaDAO.php');
$acaoVinculadaDAO = new AcaoVinculadaDAO();
$listaAcaoVinculadaObj = $acaoVinculadDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaAcaoVinculadaObj); $i++) {
  $acao1 = $listaAcaoVinculadaObj[$i]->getAcao1();
  $acao2 = $listaAcaoVinculadaObj[$i]->getAcao2();
  echo "<li>" . $acao1->getTitulo() .  "</li>";
  echo "<li>" . $acao2->getTitulo() .  "</li>";
}
echo "</ul> <br><br>";
$id = $listaAcaoVinculadaObj[$i]->getId();
$acaoVinculada = $acaoVinculadaDAO->obter($id);
$acao1 = $acaoVinculada[$i]->getAcao1();
$acao2 = $AcaoVinculada[$i]->getAcao2();
echo $acao1->getTitulo().", ".$acao2->getTitulo().", ";
?>
