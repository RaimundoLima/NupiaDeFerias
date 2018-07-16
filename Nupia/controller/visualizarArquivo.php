
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include("../model/arquivo.php");
		include ("controller.php");
 		$diretorio = $_SERVER['DOCUMENT_ROOT'] . '/arquivos/';
 		$idAcao = $_POST["idAcao"];
 		getArquivo($idAcao, $diretorio);
 		$vetObj = getNomeArquivo($idAcao);
 		$id = [];
 		$idAcao = [];
 		$nome = [];; 
 		for ($i=0; $i <count($vetObj) ; $i++) { 
 			array_push($id, $vetObj[$i]->getId());
 			array_push($idAcao, $vetObj[$i]->getIdAcao());
 			array_push($nome, $vetObj[$i]->getNome());
 		}

 		#echo '<a href="/arquivos/documento.doc" target="_blank" title="documento.doc">Documento</a>';
 ?>
 <form action="../view/visualizarArquivo.php" method="post" name="formulario">
 	<input type="hidden" name="id" value=<?php echo '"'.implode("|", $id).'"'?>>
 	<input type="hidden" name="idacao" value=<?php echo '"'.implode("|", $idAcao).'"'?>>
 	<input type="hidden" name="nome" value=<?php echo '"'.implode("|", $nome).'"'?>>
 </form>
 <script type="text/javascript">
   	document.formulario.submit();
 </script>
</body>
</html>