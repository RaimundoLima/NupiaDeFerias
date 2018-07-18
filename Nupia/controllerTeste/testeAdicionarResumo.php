<?php
	include_once("../model/acaoAtor.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/atorDAO.php");
  include_once("../model/acaoAtorDAO.php");
  $acaoDAO = new AcaoDAO();
  $atorDAO = new AtorDAO();
  $idAcao = $_POST["idacao"];
  $acao = $acaoDAO->obter($idAcao);
  $titulo = $_POST["titulo"];
	$idAtor = $_POST["idator"];
  $ator = $atorDAO->obter($idAtor);
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
  $metodologia = $_POST["metodologia"];
  $resultadoEsperado = $_POST["resultadoesperado"];
  $impactoEsperado = $_POST["impactoesperado"];
	$resumo = new Resumo($acao, $titulo, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
  $resumoDAO = new ResumoDAO();
	$resumoDAO->adicionar($Resumo);
 ?>
