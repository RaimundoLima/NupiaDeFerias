<?php
	include("header.php");
?>
<br><br><br>
<div style="border: 1px solid #f19393;" class="container">
<div class="center">
<h2 >Cadastrar Ação</h2>

  <br><br><br><br>
	<form method="POST" action="/infes/cadastrando">
		<input hidden name="projeto" value="1">
		<input hidden name="ator" value=<?php echo $_SESSION["ator"]->getId();?>>
				<div  class="input-field inline">
					<input class="infes"required id="titulo"name="titulo" type="text">
					<label for="titulo">Titulo da Ação</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
					<select class='infes' required name="tema" multiple>
						<option value="" disabled selected>Escolha pelo menos um tema</option>
						<option value="1">Estatistica</option>
						<option value="2">Solo e suas tecnologias</option>
						<option value="3">qq</option>
					</select>
					<label for="tema">Tema</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
					<textarea class="infes materialize-textarea"required id="descricao"name="descricao"> </textarea>
					<label for="resumo">Descrição</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<!--<div  class="input-field inline">
					<input class="infes"required id="atores"name="atores" type="text">
					<label for="atores">Atores Envolvidos</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
				<!--<div  class="input-field inline">
					<input class="infes"required id="arquivos"name="arquivos" type="file">
					<label for="arquivos">Arquivos</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
				<div  class="input-field inline">
					<input class="infes"required id="chave"name="chave" type="text">
					<label for="chave">Palavras Chave</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div  class="input-field inline">
					<select class='infes' required name="eixo" >
						<option value="" disabled selected>Escolha um Eixo</option>
						<option value="1">Ensino</option>
						<option value="2">Pesquisa</option>
						<option value="3">Extensão</option>
					</select>
					<label for="eixo">Eixo</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<!--<div  class="input-field inline">
					<select class='infes' required name="instituicao"  multiple>
						<option value="" disabled selected>Escolha uma Instituição</option>
						<option value="1">IFRS-campus rio grande</option>
						<option value="2">Embrapa </option>
						<option value="3">qq</option>
					</select>
					<label for="instituicao">Instituição</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
				<!--<div  class="input-field inline">
					<input class="infes"required id="vinculadas"name="vinculadas" type="text">
					<label for="vinculadas">Ações Vinculadas</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
				<!--<div  class="input-field inline">
					<input class="infes"required id="artigos"name="artigos" type="text">
					<label for="artigos">Artigos externos</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
		<!--	<div  class="input-field inline">
					<input class="infes"required id="dataInicio"name="dataInicio" type="text">
					<label for="dataInicio">Data de Inicio</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
			-->
				<div  class="input-field inline">
					<input class="infes" id="edital"name="edital" type="file">
					<label for="nome">Edital</label>
					<span class="helper-text" data-error="wrong" data-success="right">A ação não tem edital? Não tem problema deixe o campo em branco</span>
				</div>
				<input type="submit" value="Cadastrar">
		  </form>

</div>
<?php
	include("footer.php");
?>
