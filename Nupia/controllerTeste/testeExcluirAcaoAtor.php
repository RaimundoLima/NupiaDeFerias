<?php
include("../model/acaoAtorDAO.php");
$acaoAtorDAO = new AcaoAtorDAO();
$acaoAtorDAO->excluir($_GET["id"]);
 ?>
