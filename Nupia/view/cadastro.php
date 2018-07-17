<?php
	include("header.html");
?>
<br><br><br>
<div style="border: 1px solid #a8dea4;" class="container">
<div class="center">
<h2 >Cadastrar</h2>
		<form method="POST" action="/cadastrando">
          <div  class="input-field inline">
            <input required id="nome"name="nome" type="text">
            <label for="nome">Primeiro Nome</label>
            <span class="helper-text" data-error="wrong" data-success="right"></span>
          </div>
		  <br>
          <div class="input-field inline ">
            <input required id="sobrenome"name="sobrenome" type="text">
            <label for="sobrenome">Ultimo Nome</label>
            <span class="helper-text" data-error="wrong" data-success="right"></span>
          </div>
		  <br>
          <div class="input-field inline ">
            <input required name="email" id="email" type="email">
            <label for="email">Email</label>
            <span class="helper-text" data-error="wrong" data-success="right"></span>
          </div>
		  <br>
          <div class="input-field inline ">
            <input required name="senha" id="senha" type="password">
            <label for="senha">Senha</label>
            <span class="helper-text" data-error="wrong" data-success="right">De 6 até 20 caracteres</span>
          </div>
		  <br>
          <div class=" input-field inline">
				<select required name="instituicao" >
				  <option value="" disabled selected>Escolha uma Instituição</option>
				  <option value="1">IFRS-campus rio grande</option>
				  <option value="2">Embrapa </option>
				  <option value="3">qq</option>
				</select>
				<label>Instituição</label>
          </div>
		  <br>
		    <button class="green btn waves-effect waves-light" type="submit" name="action">Enviar Dados
			<i class="material-icons right">send</i>
  </button>
  <br><br><br><br>
		  </form>

</div>
<?php
	include("footer.html");
?>
