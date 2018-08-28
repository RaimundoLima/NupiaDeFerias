

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter - Data  Base Access</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Formulario</h1>

	<div id="body">
		<p>Formulário gerado pelo Codegniter.</p>

<?php
echo form_open_multipart('Meucontroller/savedata');
echo validation_errors('<p>','</p>');
echo form_label('Modelo:');
echo form_input(array('name'=>'modelo'),set_value('modelo'),'autofocus');
echo form_label('Marca:');
echo form_input(array('name'=>'marca'),set_value('marca'));
echo form_label('Quilometragem:');
echo form_input(array('name'=>'quilometragem'),set_value('quilometragem'));
echo form_label('Cambio:');?>
<select name="cambio">
        <option value="Manual" <?php echo  set_select('cambio', 'Manual'); ?> >Manual</option>
        <option value="Automatico" <?php echo  set_select('cambio', 'Automatico'); ?> >Automatico</option>
</select><?php
echo form_label('Combustivel:');?>
<select name="combustivel">
        <option value="Flex" <?php echo  set_select('combustivel', 'Flex'); ?> >Flex</option>
        <option value="Gasolina" <?php echo  set_select('combustivel', 'Gasolina'); ?> >Gasolina</option>
        <option value="Alcool" <?php echo  set_select('combustivel', 'Alcool'); ?> >Alcool</option>
				<option value="Disel" <?php echo  set_select('combustivel', 'Disel'); ?> >Disel</option>
</select><?php
echo form_label('Cor:');
echo form_input(array('name'=>'cor'),set_value('cor'));
echo form_label('Foto:');
?>
<input type="file" name="foto" size="2000" />
<?php
echo form_label('Ano:');
echo form_input(array('name'=>'ano'),set_value('ano'));
echo form_label('Cidade:');
echo form_input(array('name'=>'cidade'),set_value('cidade'));
echo form_label('Preço:');
echo form_input(array('name'=>'preco'),set_value('preco'));
echo form_submit(array('name'=>'cadastrar'),'Cadastrar');
echo form_close();
?>
<br>
<?php
echo form_open('Meucontroller/pesquisa');
echo validation_errors('<p>','</p>');
echo form_label('Nome da Modelo:');
echo form_input(array('name'=>'modelo'));
echo form_submit(array('name'=>'pesquisar'),'Pesquisar');
echo form_close();
?><br>
<?php
echo form_open('Meucontroller/pesquisaMaisBarato');
echo validation_errors('<p>','</p>');
echo form_submit(array('name'=>'pesquisar'),'Carro mais Barato');
echo form_close();
?>
<?php
echo form_open('Meucontroller/pesquisaMaiorQuilometragem');
echo validation_errors('<p>','</p>');
echo form_submit(array('name'=>'pesquisar'),'Carro com maior Quilometragem');
echo form_close();
?>
<?php
echo form_open('Meucontroller/pesquisaMenorQuilometragem');
echo validation_errors('<p>','</p>');
echo form_submit(array('name'=>'pesquisar'),'Carro com menor Quilometragem');
echo form_close();
?>
<?php
echo form_open('Meucontroller/pesquisaCambio');
echo validation_errors('<p>','</p>');
echo form_label('Cambio:');?>
<select name="cambio">
        <option value="Manual" <?php echo  set_select('cambio', 'Manual'); ?> >Manual</option>
        <option value="Automatico" <?php echo  set_select('cambio', 'Automatico'); ?> >Automatico</option>
</select>
<?php echo form_submit(array('name'=>'pesquisar'),'Pesquisar');
echo form_close();
?>
<?php
echo form_open('Meucontroller/pesquisaCombustivel');
echo validation_errors('<p>','</p>');
echo form_label('Cambustivel:');?>
<select name="combustivel">
        <option value="Flex" <?php echo  set_select('combustivel', 'Flex'); ?> >Flex</option>
        <option value="Gasolina" <?php echo  set_select('combustivel', 'Gasolina'); ?> >Gasolina</option>
				<option value="Alcool" <?php echo  set_select('combustivel', 'Alcool'); ?> >Alcool</option>
				<option value="Disel" <?php echo  set_select('combustivel', 'Disel'); ?> >Disel</option>
</select>
<?php echo form_submit(array('name'=>'pesquisar'),'Pesquisar');
echo form_close();
?>
<?php
echo form_open('Meucontroller/pesquisaCidade');
echo validation_errors('<p>','</p>');
echo form_label('Cidade:');
echo form_input(array('name'=>'cidade'));
echo form_submit(array('name'=>'pesquisar'),'Pesquisar');
echo form_close();
?>
	</div>



	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
