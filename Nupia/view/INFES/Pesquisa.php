<?php
	include("header.html");
?>
<br><br><br><br>
<div style="border: 1px solid #f19393;" class="container">
<div class="center">
<h2 >Pesquisa</h2>
<form method="GET" action="Pesquisa.php">
<div  class="input-field">
<input  name="Pesquisar" id="pesquisaInfes" type="text" class="">
<input  hidden type="submit" >
<label  for="pesquisa"></label>
<span class="helper-text" >Procurar palavras chaves podem facilitar a sua pesquisa :)</span>
<p><b><a id="filtros" class="waves-effect waves-light btn red"><i class="material-icons left">menu</i>Filtos</a><b></p>
<div hidden id="shaco" name="shaco">
  <div class="input-field inline col s12">
    <select name="Peixo" multiple>
      <option value="" disabled selected>Eixo</option>
      <option value="1">Ensino</option>
      <option value="2">Pesquisa</option>
      <option value="3">Extensão</option>
    </select>
  </div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <div class="input-field inline col s12">
    <select name="Pinstituicao" multiple>
      <option value="" disabled selected>Instituição</option>
      <option value="1">IFRS-campus rio grande</option>
      <option value="2">Emprapa</option>
      <option value="3">Option 3</option>
    </select>
  </div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <div class="input-field inline col s12">
    <select name="Pvinculado" multiple>
      <option value="" disabled selected>Vinculado a Projetos</option>
      <option value="1">VITAL</option>
      <option value="2">GEOSOLO</option>
      <option value="3">GVTecAgro</option>
	  <option value="3">Nupia-Conex</option>
    </select>
    <label></label>
</div>
<div class="row"></div>
  <div class="input-field inline col s12">
    <select name="Ptema" multiple>
      <option value="" disabled selected>Tema</option>
      <option value="1">Solo e suas tecnologias</option>
      <option value="2">Linguagens</option>
      <option value="3">bla</option>
    </select>
  </div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <div class="input-field inline col s12">
    <select name="Pdata">
      <option value="" disabled selected>Projeto criado</option>
      <option value="1">Ultima semana</option>
      <option value="2">Ultimo mês</option>
      <option value="3">Ultimo ano</option>
    </select>
  </div>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  </div>
</div>
</form>
</div>
<?php
	include("footer.html");
?>
        