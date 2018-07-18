<?php
	include_once("../model/acao.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/eixoDAO.php");
  include_once("../model/projetoDAO.php");
  $eixoDAO = new EixoDAO();
  $projetoDAO = new ProjetoDAO();
  $idEixo = $_POST["ideixo"];
  $eixo = $eixoDAO->obter($idEixo);
	$idProjeto = $_POST["idprojeto"];
  $projeto = $projetoDAO->obter($idProjeto);
	$titulo = $_POST["titulo"];
	$tema = $_POST["tema"];
	$palavraChave = $_POST["palavrachave"];
  $prevInicio = $_POST["previnicio"];
  $prevTermino = $_POST["prevtermino"];
  $situacao = $_POST["situacao"];
	$acao = new Acao($eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao);
  $acaoDAO = new AcaoDAO();
	$acaoDAO->adicionar($acao);
 ?>
