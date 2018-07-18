<?php
include("../model/atorDAO.php");
$atorDAO = new AtorDAO();
$atorDAO->excluir($_GET["id"]);
 ?>
