<?php
	include_once("../model/arquivo.php");
	include_once("../model/acaoDAO.php");
  include_once("../model/arquivoDAO.php");
  $acaoDAO = new AcaoDAO();
	$diretorio = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";

	if (isset($_FILES["arquivo"])) {
		$nome = $_FILES["arquivo"]["name"];
		$tmp_name = $_FILES["arquivo"]["tmp_name"];
		$error = $_FILES["arquivo"]["error"];
		if ($error !== UPLOAD_ERR_OK) {
			echo "Erro ao fazer upload: ".$error;
		} elseif (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $diretorio.$nome)) {
			$documento = $diretorio . $nome;
			$idAcao = $_POST["idacao"];
			$acao = $acaoDAO->obter($idAcao);
			$arquivo= new Arquivo($acao, $nome, $documento, $diretorio);
		  $arquivoDAO = new ArquivoDAO();
			$arquivoDAO->adicionar($arquivo);
			unlink($diretorio);
			echo "Funfo";
		}
	}
	else {
		echo "Selecione um arquivo para fazer upload";
	}
 ?>
