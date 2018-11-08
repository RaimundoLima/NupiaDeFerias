<?php
include('../model/acaoAtorDAO.php');
$acaoAtorDAO = new AcaoAtorDAO();
$listaAcaoAtorObj = $acaoAtorDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaAcaoAtorObj); $i++) {
  $acao = $listaAcaoAtorObj[$i]->getAcao();
  $ator = $listaAcaoAtorObj[$i]->getAtor();
  echo "<li>" . $acao->getTitulo() .  "</li>";
  echo "<li>" . $ator->getNome() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getTitulo() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getJustificativa() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getObjetivo() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getMetodologia() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getResultadoEsperado() .  "</li>";
  echo "<li>" . $listaAcaoAtorObj[$i]->getImpactoEsperado() .  "</li>";
}
echo "</ul> <br><br>";
$id = $listaAcaoAtorObj[$i]->getId();
$acaoAtor = $acaoAtorDAO->obter($id);
$acao = $AcaoAtor[$i]->getAcao();
$ator = $AcaoAtor[$i]->getAtor();
echo $acao->getTitulo().", ".$ator->getNome().", ".$acaoAtor->getTitulo().", ".$acaoAtor->getJustificativa().", ".$acaoAtor->getObjetivo()", ".$acaoAtor->getMetodologia()", ".$acaoAtor->getResultadoEsperado()", ".$acaoAtor->getImpactoEsperado();
?>
