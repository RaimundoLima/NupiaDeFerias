<?php
include('../model/arquivoDAO.php');
$arquivoDAO = new ArquivoDAO();
$listaArquivoObj = $arquivoDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaArquivoObj); $i++) {
  $acao = $listaArquivoObj[$i]->getAcao();
  echo "<li>" . $acao->getTitulo() .  "</li>";
  echo "<li>" . $arquivo->getNome() .  "</li>";
}
echo "</ul> <br><br>";
$id = $listaArquivoObj[$i]->getId();
$arquivo = $arquivoDAO->obter($id);
$acao = $arquivo[$i]->getAcao();
echo $acao->getTitulo().", ".$arquivo->getNome();
?>
