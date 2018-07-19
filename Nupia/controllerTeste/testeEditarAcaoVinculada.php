<?php
	include_once("../model/acaoVinculada.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/acaoVinculadaDAO.php");
  $acaoDAO = new AcaoDAO();
	$id = $_POST["id"];
  $idAcao1 = $_POST["idacao1"];
  $acao1 = $acaoDAO->obter($idAcao1);
	$idAcao2 = $_POST["idacao2"];
  $acao2 = $acaoDAO->obter($idAcao2);
	$acaoVinculada = new AcaoVinculada($acao1, $acao2, $id);
  $acaoVinculadaDAO = new AcaoVinculadaDAO();
	$acaoVinculadaDAO->editar($acaoVinculada);
 ?>
