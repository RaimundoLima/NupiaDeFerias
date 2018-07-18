<?php
include("../model/artigoExternoDAO.php");
$artigoExternoDAO = new ArtigoExternoDAO();
$artigoExternoDAO->excluir($_GET["id"]);
 ?>
