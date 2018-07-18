<!DOCTYPE html>
<?php include('../model/resumoDAO.php'); ?>
<html lang="br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resumo</title>
  </head>
  <body>
    <div class="container">
      <form action="index.html" method="post">
  		 <label>Titulo</label><br>
  		 <textarea rows="2" cols="80" name="titulo"></textarea><br>
  		 <label>Autores</label><br>
  		 <textarea rows="2" cols="80" name="autor"></textarea><br>
  		 <label>Justificativa</label><br>
  		 <textarea rows="12" cols="80" name="justificativa"></textarea><br>
  		 <label>Objetivo</label><br>
  		 <textarea  rows="12" cols="80" name="objetivo"></textarea><br>
  		 <label>Metodologia</label><br>
  		 <textarea  rows="12" cols="80" name="metodologia"></textarea><br>
  		 <label>Resultado Esperado</label><br>
  		 <textarea  rows="12" cols="80" name="resultadoesperado"></textarea><br>
  		 <label>Impacto Esperado</label><br>
  		 <textarea  rows="12" cols="80" name="impactoesperado"></textarea><br>
		   <input type="submit" value="Salvar">
      </form>
    </div>
  </body>
</html>
