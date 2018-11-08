<?php
	include_once("../model/acaoAtor.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/atorDAO.php");
  include_once("../model/acaoAtorDAO.php");
	$atorDAO = new AtorDAO();
	$acaoDAO = new AcaoDAO();
	$id = $_POST["id"];
	$idAtor = $_POST["idator"];
  $ator = $atorDAO->obter($idAtor);
	$idAcao = $_POST["idacao"];
	$acao = $acaoDAO->obter($idAcao);
	$titulo = $_POST["titulo"];
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
  $metodologia = $_POST["metodologia"];
  $resultadoEsperado = $_POST["resultadoesperado"];
  $impactoEsperado = $_POST["impactoesperado"];
	$acaoAtor = new AcaoAtor($ator, $acao, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
  $acaoAtorDAO = new AcaoAtorDAO();
	$acaoAtorDAO->editar($acaoAtor);
 ?>
