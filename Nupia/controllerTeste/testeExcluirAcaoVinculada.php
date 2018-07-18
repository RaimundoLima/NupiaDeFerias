<?php
include("../model/acaoVinculadaDAO.php");
$acaoVinculadaDAO = new AcaoVinculadaDAO();
$acaoVinculadaDAO->excluir($_GET["id"]);
 ?>
