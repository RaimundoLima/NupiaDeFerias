<?php
	include("header.php");
?>
<br><br><br><br>
<div style="border: 1px solid #a8dea4;" class="container">
<h2 style='padding-left: 0.5em;' > <b style="color: black;">Eixos</b></h2>
<p style="color: black;" class="flow-text">&nbsp&nbsp&nbsp&nbspNo projeto existem existem 3 eixos <i><b>Ensino,Pesquisa,Extensão</b></i> e eles são focados em ...</p>
<?php
	for ($i=0; $i<count($lista); $i++){
		echo '<h2 class="" >&nbsp <b style="color: green;">'.$lista[$i]->getNome().'</b></h2>';
		echo '<p style="color: black;" class="flow-text">&nbsp&nbsp&nbsp&nbsp'.$lista[$i]->getApresentacao().'</p>';
	}
?>
<?php
	include("footer.php");
?>
