<?php
	include ("controller.php");
	$location = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";

	if (isset($_FILES["arquivo"])) {
		$name = $_FILES["arquivo"]["name"];
		$tmp_name = $_FILES["arquivo"]["tmp_name"];
		$error = $_FILES["arquivo"]["error"];
		if ($error !== UPLOAD_ERR_OK) {
			echo "Erro ao fazer upload: ".$error;
		} elseif (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $location.$name)) {
			$diretorio = $location . $name;
			$idAcao = $_POST["idAcao"];
			adicionarArquivo($idAcao, $name, $diretorio);
			unlink($diretorio);
			echo "Funfo";
		}
	}
	else {
		echo "Selecione um arquivo para fazer upload";
	}

?>