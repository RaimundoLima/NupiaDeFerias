<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include("controller.php");
	$id = $_GET["idAcao"];
	$acao = getAcao($id);
?>
<form action="../view/visualizarAcao.php" method="post" name="formulario">
	<input type="hidden" name="idAcao" value=<?php echo $acao[0]["id"] ?>>
	<input type="hidden" name="idEixo" value=<?php echo $acao[0]["ideixo"] ?>>
	<input type="hidden" name="idProjeto" value=<?php echo $acao[0]["idprojeto"] ?>>
	<input type="hidden" name="titulo" value=<?php echo $acao[0]["titulo"] ?>>
	<input type="hidden" name="tema" value=<?php echo $acao[0]["tema"] ?>>
	<input type="hidden" name="palavraChave" value=<?php echo $acao[0]["palavrachave"] ?>>
	<input type="hidden" name="dataInicio" value=<?php echo $acao[0]["datainicio"] ?>>
	<input type="hidden" name="dataTermino" value=<?php echo $acao[0]["datatermino"] ?>>
	<input type="hidden" name="prevInicio" value=<?php echo $acao[0]["previnicio"] ?>>
	<input type="hidden" name="prevTermino" value=<?php echo $acao[0]["prevtermino"] ?>>
	<input type="hidden" name="situacao" value=<?php echo $acao[0]["situacao"] ?>>
</form>

	<script type="text/javascript">
   		document.formulario.submit();
    </script>

</body>
</html>
