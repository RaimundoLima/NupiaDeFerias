<?php
	include_once("../model/artigoExterno.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/artigoExternoDAO.php");
  $acaoDAO = new AcaoDAO();
	$id = $_POST["id"];
  $idAcao = $_POST["idacao"];
  $acao = $acaoDAO->obter($idAcao);
	$link = $_POST["link"];
	$artigoExterno = new ArtigoExterno($acao, $link, $id);
  $artigoExternoDAO = new ArtigoExternoDAO();
	$artigoExternoDAO->adicionar($artigoExterno);
 ?>
