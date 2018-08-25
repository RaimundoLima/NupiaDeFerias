<?php
	include("header.php");
?>
<br><br><br><br>
  <div class="row">
       <div class="col s5"></div>
<h2 class="" >&nbsp<b style="color: black;">&nbspAções</b></h2>
    <div class="flow-text row">
	<div class="col s1"></div>
      <div class="col s5">
	  <ul class="collapsible popout">
	  <li>
	 <h3 class="white" >Atualizadas Recentemente</h3>
	  </li>
	   <li>
      <div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="bottom" src="/img/Nupia.png" alt="Icone">Estudo estatistico sobre solos</div>
      <div class="collapsible-body"><span class="flow-text"><a href="acoes.php">Acessar Ação</a><br>O solo, mais do que simplesmente a camada superficial da Terra, é conceituado como
	</div>
    </li>
	<li>
      <div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="" src="/img/Nupia.png" alt="Icone">Outra ação</div>
      <div class="collapsible-body"><a href="acoes.php">Acessar Ação</a><br>O solo, mais do que simplesmente a camada superficial da Terra, é conceituado como
	</div>
    </li>
		</ul>
	</div>
      <div class="col s1"></div>
      <div class="col s1"></div>
	   <div class="col s5">
	  <ul class="collapsible popout">
	  <li>
	 <h3 class="white" >Minhas Ações</h3>
	  </li><?php
	  for ($i=0; $i<count($listaAcao); $i++) { 
	  	echo '<li>
    	  <div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="" src="/img/Nupia.png" alt="Icone">'.$listaAcao[$i]->getTitulo().'</div>
      	<div class="collapsible-body"><span class="flow-text"><a href="acaoEspecidica.php">'.$listaAcao[$i]->getDescricao().'</a>
		</div>
   		 </li>';
	  }
	    ?>
		</ul>
	  </div>
    </div>
	  <div class="row">
       <div class="col s4"></div>
		<h2 class="" >&nbsp<b ><a href="pesquisa.php" class="center">&nbspTodas as ações</a></b></h2>

<?php
	include("footer.php");
?>
