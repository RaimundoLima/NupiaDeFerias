<?php
	include("header.php");
?>
<br><br><br><br>
<div style="border: 1px solid #f19393;" class="container">
  <br><br>
	<form style="padding-left:5%" method="POST" action="/cadastrando">
				<div  class="input-field center">
          <h2><?php echo $acaoObj->getTitulo();?></h2>
					<p class="infes" id="titulo"name="titulo"><?php ?></p>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				 <div class="row">
    	 			<div class="col s8">
							<div  class="input-field ">

			          <h4><?php echo $acaoObj->getTema();?> ➣ Eixo <?php echo $acaoObj->getEixo()->getNome();?> </h4>
							</div>
			          <b><a href="resumo?id=<?php echo $acaoObj->getId();?>">Resumo</a></b>
								<h2>Descrição</h2>
								<p> <?php echo $acaoObj->getDescricao();?></p>
								<h3>Instituições envolvidas</h3>
								<i>IFRS campus Rio grande-Embrapa</i>
								<h4>Licenças</h4>
								<b>CC-BY-00</b>
								<h4>Edital</h4>
								<?php if(!empty($edital)){
									echo '<p><a href= ../'.$edital->getDiretorio().$edital->getNome().' target=“_blank”>'.$edital->getNome().'</a></p>';
								} ?>

								<h8></h8>
					</div>
    				<div class="col s4">
							<div  class="input-field ">
								<h3>Arquivos</h3>
								<ul>
									<?php if(!empty($listaArquivo)){
										for ($i=0; $i < count($listaArquivo) ; $i++) {
											echo '<li>-<a href= ../'.$listaArquivo[$i]->getDiretorio().$listaArquivo[$i]->getNome().' target=“_blank”>'.$listaArquivo[$i]->getNome().'</a></li>';
										}
									} ?>
								</ul>
								<h3>Atores envolvidos</h3>
								<ul>
									<?php if(!empty($acaoAtor)){
										for ($i=0; $i < count($acaoAtor) ; $i++) {
											echo '<li>-<a href="../usuario.php?id='.$acaoAtor[$i]->getAtor()->getId().'" target=“_blank”>'.$acaoAtor[$i]->getAtor()->getNome().'</a></li>';
										}
									} ?>
								</ul>
								<h3>Ações Vinculadas</h3>
								<ul>
									<?php if(!empty($acaoVinculada)){
										for ($i=0; $i < count($acaoVinculada) ; $i++) {
											echo '<li>-<a href="acaoEspecifica.php?id='.$acaoVinculada[$i]->getAcao1()->getId().'" target=“_blank”>'.$acaoVinculada[$i]->getAcao1()->getTitulo().'</a></li>';
										}
									} ?>
								</ul>
								<h3>Ações Externas</h3>
								<ul>
									<?php if(!empty($artigoExterno)){
										for ($i=0; $i < count($artigoExterno) ; $i++) {
											echo '<li>-<a href="'.$artigoExterno[$i]->getLink().'" target=“_blank”>'.$artigoExterno[$i]->getLink().'</a></li>';
										}
									} ?>
								</ul>
							</div>
						</div>
  			</div>
</div>
				</div>
		  </form>
<br><br>
</div>
<?php
	include("footer.php");
?>
