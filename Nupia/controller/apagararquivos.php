<?php
$pasta = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";

if(is_dir($pasta)){
	$diretorio = dir($pasta);
	while ($arquivo = $diretorio->read()) {
		if(($arquivo != '.') && ($arquivo != '..')){
			unlink($pasta.$arquivo);
			echo 'Arquivo '.$arquivo.' foi apagado com sucesso. <br />';
		}
	}
	$diretorio->close();
}
else{
	echo 'A pasta não existe.';
}
?>
