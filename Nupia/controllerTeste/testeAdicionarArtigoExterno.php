<?php
	include_once("../model/artigoExterno.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/artigoExternoDAO.php");
  $acaoDAO = new AcaoDAO();
  $idAcao = $_POST["idacao"];
  $acao = $acaoDAO->obter($idAcao);
	$link = $_POST["link"];
	$acao = new Ator($acao, $link);
  $artigoExternoDAO = new ArtigoExternoDAO();
	$artigoExternoDAO->adicionar($artigoExterno);
 ?>
