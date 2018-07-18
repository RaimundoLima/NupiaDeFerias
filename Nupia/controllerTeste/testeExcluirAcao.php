<?php
include("../model/acaoDAO.php");
$acaoDAO = new AcaoDAO();
$acaoDAO->excluir($_GET["id"]);
 ?>
