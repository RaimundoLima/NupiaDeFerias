<?php
include('../model/acaoDAO.php');
$acaoDAO = new AcaoDAO();
$listaAcaoObj = $acaoDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaAcaoObj); $i++) {
  $eixo = $listaAcaoObj[$i]->getEixo();
  $projeto = $listaAcaoObj[$i]->getProjeto();
  echo "<li>" . $eixo->getNome() .  "</li>";
  echo "<li>" . $projeto->getNome() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getTitulo() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getTema() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getPalavraChave() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getPrevInicio() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getPrevTermino() .  "</li>";
  echo "<li>" . $listaAcaoObj[$i]->getSituacao() .  "</li>";
}
echo "</ul> <br><br>";
$id = $listaAcaoObj[$i]->getId();
$acao = $acaoDAO->obter($id);
$eixo = $acao->getEixo();
$projeto = $acao->getProjeto();
echo $eixo->getNome().", ".$projeto->getProjeto().", ".$acao->getTitulo().", ".$acao->getTema().", ".$acao->getPalavraChave()", ".$acao->getPrevInicio()", ".$acao->getPrevTermino()", ".$acao->getSituacao();
?>
