<?php
	include("header.php");

?>
<br><br><br><br>
<div style="border: 1px solid #f19393;" class="container">
<div class="center">
<h2 >Busca</h2>
<form method="POST" action="/infes/resultadoBusca">
<div  class="input-field inline">
<input  name="Buscar" id="pesquisaInfes" type="text" class="">
<input  type="submit" value="Buscar">
<label  for="busca"></label>
<span class="helper-text" >Procurar palavras chaves podem facilitar a sua busca :)</span>
<p><b><a id="filtros" class="waves-effect waves-light btn red"><i class="material-icons left">menu</i>Filtos</a><b></p>
</div>
<div style="font:20px" class="row" hidden id="shaco" name="shaco">
	<div class='col s1'></div>
  <div class="input-field  col s2">
    <select  name="Peixo" multiple>
      <option value="" disabled selected>Eixo</option>
      <option value="1">Ensino</option>
      <option value="2">Pesquisa</option>
      <option value="3">Extensão</option>
    </select>
  </div>
    <div class="input-field inline col s2">
    <select name="Pinstituicao" multiple>
      <option value="" disabled selected>Instituição</option>
      <option value="1">IFRS-campus rio grande</option>
      <option value="2">Emprapa</option>
      <option value="3">Option 3</option>
    </select>
  </div>
    <div class="input-field inline col s2">
    <select name="Pprojeto" multiple>
      <option value="" disabled selected>Projetos</option>
			<option value="1">INFES</option>
      <option value="3">VITAL</option>
      <option value="5">GEOSOLO</option>
      <option value="2">GVTecAgro</option>
	    <option value="4">Nupia-Conex</option>
    </select>
    <label></label>
</div>
  <div class="input-field inline col s2">
    <select name="Ptema" multiple>
      <option value="" disabled selected>Tema</option>
      <option value="1">Solo e suas tecnologias</option>
      <option value="2">Linguagens</option>
      <option value="3">bla</option>
    </select>
  </div>
    <div class="input-field inline col s2">
    <select name="Pdata">
      <option value="" disabled selected>Data</option>
      <option value="1">Ultima semana</option>
      <option value="2">Ultimo mês</option>
      <option value="3">Ultimo ano</option>
    </select>
  </div>
  </div>
</div>
</form>
<ul class="collapsible popout">
<li>
<h3 class="white" >Resultado da Busca</h3>
</li>
<?php
 for ($i=0; $i<count($listaAcao); $i++) {
echo'
 <li>
	<div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="bottom" src="../view/img/Nupia.png" alt="Icone">'.$listaAcao[$i]->getTitulo().'</div>
	<div class="collapsible-body"><span class="flow-text"><a href="acoes.php">Acessar Ação</a><br>'.$listaAcao[$i]->getApresentacao().'
</div>
</li>';
}
?>
 </ul>
</div>

<?php
	include("footer.php");
?>
