<?php
	include("header.php");
?>
<br><br><br>
<div class="row">
   <div class="col s1"><p></p></div>
   <div class="col s2">
     <p></p>
     <img style="width:100%" src="view/img/raiLindo.jpg"></img>
     <br>
     <b class="flow-text"><?php echo $_SESSION["ator"]->getNome()?></b>
    <i>IFRS campus Rio Grande </i>
     <br>
     <p><?php echo $_SESSION["ator"]->getEmail()?></p>

   </div>
   <div class="col s4">
     <h4>Ações</h4>
     <ul class="collapsible popout " style="padding:0px;">
     <li>
     </li>
		 <?php
		 for ($i=0; $i < count($listaAcaoAtor); $i++) {
			 if($i%2==0){
				 echo '<li >
					 <div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="bottom" src="view/img/Nupia.png" alt="Icone">'.$listaAcaoAtor[$i]->getAcao()->getTitulo().'</div>

					 <div class="collapsible-body"><a href="acoes.php">Acessar Ação</a><br>'.$listaAcaoAtor[$i]->getAcao()->getTema().' </div>
				 </li>';
		 	}
		 }
		  ?>
     </ul>
   </div>
   <div class="col s4">
     <h4>&nbsp</h4>
     <ul class="collapsible popout" style="padding:0px;">
     <li>
     </li>
		 <?php
		 for ($i=0; $i < count($listaAcaoAtor); $i++) {
			 if($i%2!=0){
				 echo '<li >
					 <div class="collapsible-header"><img style=" margin-top: 4%;"  height="32px" aling="bottom" src="view/img/Nupia.png" alt="Icone">'.$listaAcaoAtor[$i]->getAcao()->getTitulo().'</div>

					 <div class="collapsible-body"><a href="acoes.php">Acessar Ação</a><br>'.$listaAcaoAtor[$i]->getAcao()->getTema().'</div>
				 </li>';
			}
		 }
			?>
     </ul>
   </div>
    <div class="col s1"><p><p></div>
 </div>

<?php
	include("footer.php");
?>
