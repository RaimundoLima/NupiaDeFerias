<?php
	include("header.php");
?>
<br><br><br><br><br><br>
<div style="border: 1px solid #f19393;" class="container">
<h2 >Cadastrar Ação</h2>
  <br><br><br><br>
			<div  class="input-field center">
				<h2><?php echo $acaoObj->getTitulo(); ?></h2>
	<div class="row">
	 <div class="col s8">
		 <div  class="input-field ">
			 <h4>Tema ➣ Projeto de eixo </h4>
		 </div>
			 <b><a>Resumo</a></b>
			 <h2>Apresentação</h2>
			 <p><?php echo $acaoObj->getApresentacao(); ?></p>
			 <h3>Instituições envolvidas</h3>
			 <i>IFRS campus Rio grande-Embrapa</i>
			 <h4>Licenças</h4>
			 <b>CC-BY-00</b>
			 <h4>Edital</h4>
			 <p><?php echo '<a target="_blank" href=../baixando?id='.$edital->getId().' >'.$edital->getNome().' </a>';?></p>
			 <h8></h8>
 </div>
	 <div class="col s4">
		 <div  class="input-field ">
			 <h3>Arquivos</h3>
			 <ul>
				 	<?php
						if (!empty($listaArquivo)) {
							for ($i=0; $i < count($listaArquivo); $i++) {
								echo '<li>-<a target="_blank" href="../baixando?id='.$listaArquivo[$i]->getId().'">'.$listaArquivo[$i]->getNome().'</a></li>';
							}
						}else {
							echo "";
						}
					 ?>
			 </ul>
			 <h3>Atores envolvidos</h3>
			 <ul>
				 <?php
				 	if (!empty($acaoAtor)) {
						for ($i=0; $i < count($acaoAtor); $i++) {
	 						echo '<li><a href="../usuario?id='.$acaoAtor[$i]->getAtor()->getId().'">'.$acaoAtor[$i]->getAtor()->getNome().'</a></li>';
	 					}
				 	}else {
						echo "";
					}
 				 ?>
			 </ul>
			 <h3>Ações Vinculadas</h3>
			 <ul>
				 <?php
						if(!empty($acaoVinculada)){
							for ($i=0; $i < count($acaoVinculada); $i++) {
								echo '<li><a href="./acaoEspecifica?id='.$acaoVinculada[$i]->getAcao1()->getId().'">'.$acaoVinculada[$i]->getAcao1()->getTitulo().'</a></li>';
							}
						}else {
							echo "";
						}
					 ?>
			 </ul>
			 <h3>Ações Externas</h3>
			 <ul>
				 <?php
				 if (!empty($artigoExterno)) {
					 for ($i=0; $i < count($artigoExterno); $i++) {
 							echo '<li>-<a target="_blank" href="'.$artigoExterno[$i]->getLink().'">'.$artigoExterno[$i]->getLink().'</a></li>';
 					}
				}else {
					echo "";
				}
				?>
			 </ul>
		 </div>
	 </div>
</div>
</div>
</div>
		<!--	<div  class="input-field inline">
					<input class="infes"required id="dataInicio"name="dataInicio" type="text">
					<label for="dataInicio">Data de Inicio</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>-->
<?php
	include("footer.php");
?>
