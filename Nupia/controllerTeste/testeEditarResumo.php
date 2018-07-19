<?php
	include_once("../model/resumo.php");
	include_once("../model/resumoDAO.php");
	include_once("../model/atorDAO.php");
	include_once("../model/acaoDAO.php");
	$acaoDAO = new AcaoDAO();
	$atorDAO = new AtorDAO();
	$id = $_POST["id"];
	$titulo = $_POST["titulo"];
	$idAcao = $_POST["idacao"];
	$acao = $acaoDAO->obter($idAcao);
	$idAtor = $_POST["idator"];
	$ator = $atorDAO->obter($idAtor);
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
	$metodologia = $_POST["metodologia"];
	$resultadoEsperado = $_POST["resultadoesperado"];
	$impactoEsperado = $_POST["impactoesperado"];
	$resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id);
  $resumoDAO = new ResumoDAO();
	$resumoDAO->adicionar($resumo);
 ?>
