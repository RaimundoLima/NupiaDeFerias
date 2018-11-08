<?php
	include("header.php");
?>
<br><br><br><br><br><br>
<div style="border: 1px solid #f19393;" class="container">

    	<div  class="input-field center">

	<div class="row">
		<form method="post" action="acaoeditada?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
		<h2><input name="titulo" value="<?php echo $acaoObj->getTitulo();?>"></h2>
	 <div class="col s8">
		 <div  class="input-field ">
			 <h4> <input name="tema" value="<?php echo $acaoObj->getTema(); ?>">➣
				 <?php $idEixo = $acaoObj->getEixo()->getId();
				 			$nomeEixo = $acaoObj->getEixo()->getNome();
				 				echo "<select class='infes' required name='eixo' >";
									echo "<option value=".$idEixo." disabled selected> ".$nomeEixo." </option>	";

				  ?>


					 <option id="1" value="1">Ensino</option>
					 <option id="2" value="2">Pesquisa</option>
					 <option id="3" value="3">Extensão</option>
				 </select></h4>
		 </div>
			 <b><a>Resumo</a></b>
			 <h2>Apresentação</h2>
			 <textarea name="apresentacao"><?php echo $acaoObj->getApresentacao(); ?></textarea>
			 <h3>Instituições envolvidas</h3>
			 <i>IFRS campus Rio grande-Embrapa</i>
			 <h4>Licenças</h4>
			 <b>CC-BY-00</b>
			 <h4>Edital</h4>
			 <p><?php echo '<a target="_blank" href=../baixando?id='.$edital->getId().' >'.$edital->getNome().' </a>';?></p>
       <input type="hidden" name="velhoedital" value="<?php echo $edital->getId(); ?>">
       <label for="novoedital">Adicionar Edital Atualizado</label>
       <input type="file" name="novoedital">
       <input type="submit" value="Salvar Alterações">

			 <h8></h8>
 </div>
  </form>
	 <div class="col s4">
		 <div  class="input-field ">
			 <h3>Arquivos</h3>
			 <ul>
				 <form action="../infes/adicionararquivo?id=<?php echo $_GET['id'];?>" enctype="multipart/form-data" method="post">
					 	<label for="novoarquivo"> Adicionar Arquivo</label>
						<input type="file" name="novoarquivo">
						<input type="submit" value="Adicionar">
				 </form>
				 	<?php
						if (!empty($listaArquivo)) {
							for ($i=0; $i < count($listaArquivo); $i++) {
								echo '<li>-<a target="_blank" href="../baixando?id='.$listaArquivo[$i]->getId().'">'.$listaArquivo[$i]->getNome().'</a> <button onclick=location.href="../infes/excluirarquivo?id='.$_GET['id'].'&idArquivo='.$listaArquivo[$i]->getId().'">Excluir</button> </li>';
							}
						}else {
							echo "";
						}
					 ?>
			 </ul>
			 <h3>Atores envolvidos</h3>
			 <ul>
				 <form action="../infes/adicionaracaoator?id=<?php echo $_GET['id'];?>" method="post">
					 	<label for="novoator">Digite o Email do novo ator</label>
						<input type="text" name="novoator">
						<input type="submit" value="Vincular">
				 </form>
				 <?php
				 	if (!empty($acaoAtor)) {
						for ($i=0; $i < count($acaoAtor); $i++) {
	 						echo '<li><a href="../usuario?id='.$acaoAtor[$i]->getAtor()->getId().'">'.$acaoAtor[$i]->getAtor()->getNome().'</a>   <button onclick=location.href="../infes/excluiracaoator?id='.$_GET['id'].'&idAcaoAtor='.$acaoAtor[$i]->getId().'">Excluir</button></li>';
	 					}
				 	}else {
						echo "";
					}
 				 ?>
			 </ul>
			 <h3>Ações Vinculadas</h3>
			 <ul>
				 <form action="../infes/adicionaracaovinculada?id=<?php echo $_GET['id'];?>" method="post">
					 	<label for="novaacao">Digite o nome da Ação</label>
						<input type="text" name="novaacao">
						<input type="submit" value="Vincular">
				 </form>
				 <?php
						if(!empty($acaoVinculada)){
							for ($i=0; $i < count($acaoVinculada); $i++) {
								echo '<li><a href="./acaoEspecifica?id='.$acaoVinculada[$i]->getAcao1()->getId().'">'.$acaoVinculada[$i]->getAcao1()->getTitulo().'</a> <button onclick=location.href="../infes/excluiracaovinculada?id='.$_GET['id'].'&idAcaoVinculada='.$acaoVinculada[$i]->getId().'">Excluir</button> </li>';
							}
						}else {
							echo "";
						}
					 ?>
			 </ul>
			 <h3>Ações Externas</h3>
			 <ul>
				 <form action="../infes/adicionarartigoexterno?id=<?php echo $_GET['id'];?>" method="post">
					 <label for="novolink">Digite o novo link</label>
					 <input type="text" name="novolink">
					 <input type="submit" value="Adicionar">
				</form>
				 <?php
				 if (!empty($artigoExterno)) {
					 for ($i=0; $i < count($artigoExterno); $i++) {
 							echo '<li>-<a target="_blank" href="'.$artigoExterno[$i]->getLink().'">'.$artigoExterno[$i]->getLink().'</a> <button onclick=location.href="../infes/excluirartigoexterno?id='.$_GET['id'].'&idArtigoExterno='.$artigoExterno[$i]->getId().'">Excluir</button> </li>';
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
