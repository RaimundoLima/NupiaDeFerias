<?php
include("../model/arquivoDAO.php");
$arquivoDAO = new ArquivoDAO();
$arquivoDAO->excluir($_GET["id"]);
 ?>
