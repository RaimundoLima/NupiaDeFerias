<?php
	include_once("../model/arquivo.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/arquivoDAO.php");
  $acaoDAO = new AcaoDAO();
	$id = $_POST["id"];
  $idAcao = $_POST["idacao"];
  $acao = $acaoDAO->obter($idAcao);
	$nome = $_POST["nome"];
	$arquivo = new Arquivo($acao, $nome, $id);
  $arquivoDAO = new ArquivoDAO();
	$arquivoDAO->editar($arquivo);
 ?>
