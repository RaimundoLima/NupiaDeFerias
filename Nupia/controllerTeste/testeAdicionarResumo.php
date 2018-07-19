<?php
	include_once("../model/resumo.php");
	include_once("../model/resumoDAO.php");
  include_once("../model/atorDAO.php");
  include_once("../model/acaoDAO.php");
  $acaoDAO = new AcaoDAO();
  $atorDAO = new AtorDAO();
  $titulo = "titulo";
  $idAcao = "1";
  $acao = $acaoDAO->obter($idAcao);
	$idAtor = "2";
  $ator = $atorDAO->obter($idAtor);
	$justificativa = "justificativa";
	$objetivo = "objetivo";
  $metodologia = "metodologia";
  $resultadoEsperado = "resultadoesperado";
  $impactoEsperado = "impactoesperado";
	$resumo = new Resumo($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
  $resumoDAO = new ResumoDAO();
	$resumoDAO->adicionar($resumo);
 ?>
