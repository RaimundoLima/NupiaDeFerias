<?php
include('../model/artigoExternoDAO.php');
$artigoExternoDAO = new ArtigoExternoDAO();
$listaArtigoExternoObj = $listaArtigoExternoDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaArtigoExternoObj); $i++) {
  $acao = $listaArtigoExternoObj[$i]->getAcao();
  echo "<li>" . $acao->getTitulo() .  "</li>";
  echo "<li>" . $listaArtigoExternoObj[$i]->getLink() .  "</li>";
}
echo "</ul> <br><br>";
$id = $listaArtigoExternoObj[$i]->getId();
$artigoExterno = $artigoExternoDAO->obter($id);
$acao = $artigoExterno[$i]->getAcao();
echo $acao->getTitulo().", ".$artigoExterno->getLink();
?>
