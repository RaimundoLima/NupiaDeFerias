<?php
include('../model/atorDAO.php');
$atorDAO = new AtorDAO();
$listaAtorObj = $atorDAO->listar();
echo "<ul>";
for ($i=0; $i < count($listaAtorObj); $i++) {
  echo "<li>" . $listaAtorObj[$i]->getNome() .  "</li>";
  echo "<li>" . $listaAtorObj[$i]->getTipo() .  "</li>";
  echo "<li>" . $listaAtorObj[$i]->getSenha() .  "</li>";
  echo "<li>" . $listaAtorObj[$i]->getEmail() .  "</li>";
  echo "<li>" . $listaAtorObj[$i]->getCodigo() .  "</li>";
}
echo "</ul>";
$id = $listaAtorObj[$i]->getId();
$ator = $atorDAO->obter($id);
echo $ator->getNome().", ".$ator->getTipo().", ".$ator->getSenha().", ".$ator->getEmail().", ".$ator->getCodigo();
?>
