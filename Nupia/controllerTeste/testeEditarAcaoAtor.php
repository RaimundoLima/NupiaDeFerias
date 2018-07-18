<?php
	include_once("../model/acaoAtor.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/atorDAO.php");
  include_once("../model/acaoAtorDAO.php");
  $acaoDAO = new AcaoDAO();
  $atorDAO = new AtorDAO();
  $idAcao = $_POST["idacao"];
  $acao = $acaoDAO->obter($idAcao);
	$idAtor = $_POST["idator"];
  $ator = $atorDAO->obter($idAtor);
	$titulo = $_POST["titulo"];
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
  $metodologia = $_POST["metodologia"];
  $resultadoEsperado = $_POST["resultadoesperado"];
  $impactoEsperado = $_POST["impactoesperado"];
	$acaoAtor = new AcaoAtor($acao, $ator, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
  $acaoAtorDAO = new AcaoAtorDAO();
	$acaoAtorDAO->editar($acaoAtor);
 ?>
