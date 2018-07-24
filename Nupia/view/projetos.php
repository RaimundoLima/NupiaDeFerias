<?php
	include("header.php");
?>
<br><br><br><br>
<div style="border: 1px solid #a8dea4;" class="container">
<h2 class="" >&nbsp<b style="color: black;">Projetos do Nupia</b></h2>
<p tyle="color: black;" class="flow-text">&nbsp&nbsp&nbsp&nbspO Nupia possui varios projetos para diversas areas</p>
<?php 

	for ($i=0; $i<count($lista); $i++) { 

		echo '<h2 class="" >&nbsp<b style="color: #ff8d38;"><a href="'.$lista[$i]->getLink().'">'. $lista[$i]->getNome() .'</a></b></h2>
		<p tyle="color: black;" class="flow-text">&nbsp&nbsp&nbsp&nbsp '.$lista[$i]->getDescricao().'</p>';
	}
 ?>
<?php
	include("footer.php");
?>