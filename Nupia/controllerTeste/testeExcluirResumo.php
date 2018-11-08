<?php
include("../model/resumoDAO.php");
$resumoDAO = new ResumoDAO();
$resumoDAO->excluir($_GET["id"]);
 ?>
