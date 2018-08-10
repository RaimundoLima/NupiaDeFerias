<?php
	include("header.php");
?>
<br><br><br>
<div style="border: 1px solid #f19393;" class="container">
<div class="center">
<h2 >Cadastrar Ação</h2>

  <br><br><br><br>
	<form method="POST" action="/cadastrando">
				<div  class="input-field inline">
          <h3>Titulo</h3>
					<p class="infes" id="titulo"name="titulo"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Tema</h3>
					<p class="infes" id="tema"name="tema"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Resumo</h3>
					<p class="infes" id="resumo"name="resumo"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Atores</h3>
					<p class="infes" id="atores"name="atores"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Arquivos</h3>
					<p class="infes" id="arquivos"name="arquivos"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Chave</h3>
					<p class="infes" id="chave"name="chave"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Eixo</h3>
					<p class="infes" id="eixo"name="eixo"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Instituição</h3>
					<p class="infes" id="instituicao"name="instituicao"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Ações Vinculadas</h3>
					<p class="infes" id="vinculadas"name="vinculadas"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
          <h3>Artifo externos</h3>
					<p class="infes" id="artigos"name="artigos"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
		<!--	<div  class="input-field inline">
					<input class="infes"required id="dataInicio"name="dataInicio" type="text">
					<label for="dataInicio">Data de Inicio</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
			-->
				<div  class="input-field inline">
          <h3>Edital</h3>
					<p class="infes" id="edital"name="edital"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right">A ação não tem edital? Não tem problema deixe o campo em branco</span>
				</div>
		  </form>

</div>
<?php
	include("footer.php");
?>
