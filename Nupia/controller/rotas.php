<?php
include_once('model/projetoDAO.php');
include_once("model/ator.php");
include_once("model/atorDAO.php");
include_once("model/eixoDAO.php");
include_once("model/acaoDAO.php");
include_once("model/acaoAtorDAO.php");
include_once("model/artigoExternoDAO.php");
include_once("model/acaoVinculadaDAO.php");
include_once("model/arquivoDAO.php");
function getPagina(){
	session_start();
 	//error_reporting(0);
	$atorDAO = new AtorDAO();
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
	#if($_SESSION['tipo']!='adm'){
		if(!empty($_SESSION)){
			$user=$atorDAO->obter($_SESSION['ator']->getId());
		}
    switch($url[0]){
			//NUPIA####
      case '/home':
				include('view/home.php');
        break;
			case '/':
				include('view/home.php');
				break;
			case '/acoes':
				include('view/acoes.php');
	      break;
			case '/projetos':
				$projetoDAO = new ProjetoDAO();
				$lista = $projetoDAO->listar();
				include('view/projetos.php');
	      break;
			case '/eixos':
				$eixoDAO = new EixoDAO();
				$lista = $eixoDAO->listar();
				include('view/eixos.php');
			  break;
			case '/logar':
				include('view/logar.php');
				break;
			case '/logando':
				$usuario_informado=$atorDAO->obterByEmail($_POST['email']);
				$senha=$usuario_informado->getSenha();
				if(!empty($usuario_informado) && $_POST['senha']==$senha){
					$_SESSION['ator']=$usuario_informado;
					$_SESSION['tipo']=$usuario_informado->getTipo();
				}
				if($_POST['matricula']=='adm' && $_POST['senha']=='adm123'){
					$_SESSION['tipo']='adm';
				}
				header("Location: /Home");//redireciona
				break;
			case '/deslogar':
				session_destroy();
				break;
			case '/cadastro':
				// Não tem instituição por enquanto, fica pro futuro
				//$lista=$dao->InstituicaoListar();
				include('view/cadastro.php');
		  	break;
			case '/cadastrando':
				$nome = $_POST["nome"];
				$sobrenome = $_POST["sobrenome"];
				$nome = $_POST["nome"]." ".$_POST["sobrenome"];
				$tipo = "ator";//tipo padrão
				$senha = $_POST["senha"];
				$email = $_POST["email"];
				//$codigo = gerarCodigo();
				// $instituicao = $_POST["instituicao"]; Sera Implementado no futuro.
				$ator = new Ator($nome, $tipo, $senha, $email, $codigo);
			    $atorDAO = new AtorDAO();
				$retorno = $atorDAO->adicionar($ator);
				header("Location: /Home");//redireciona
				break;
			case '/baixando':
			 $arquivoDAO = new ArquivoDAO();
			 $primeiravarivel = $url[1];
			 $primeiravarivel = explode("=",$primeiravarivel);
			 $id = $primeiravarivel[1];
			 //var_dump($id);exit;
			 $result = $arquivoDAO->baixando($id);
			 //var_dump($result);exit;


 			 include('view/baixando.php');
			break;
			case '/usuario':
				$acaoAtorDAO = new AcaoAtorDAO();
				$primeiravarivel = $url[1];
				$primeiravarivel = explode("=",$primeiravarivel);
				if($primeiravarivel[1] == ""){
					$idAtor = $_SESSION["ator"]->getId();
				}else{
					$idAtor = $primeiravarivel[1];
				}
				$listaAcaoAtor = $acaoAtorDAO->listarByAtor($idAtor);

 				//var_dump($listaAcaoAtor);exit;
				include('view/usuario.php');
			 break;
			///INFES##########Só testando
			case '/infes/home':
				include('view/INFES/home.php');
				break;
			case '/infes/acoes':
				$acaoAtorDAO = new AcaoAtorDAO();
				$idAtor = $_SESSION["ator"]->getId();
				$idProjeto = "1";
				$listaAcaoAtor = $acaoAtorDAO->listarByAtorProjeto($idAtor, $idProjeto);
				$listaAcao = [];
				for($i=0; $i<count($listaAcaoAtor); $i++){
					$acao = $listaAcaoAtor[$i]->getAcao();
					array_push($listaAcao, $acao);

				}

				include('view/INFES/acoes.php');
				break;
			case '/infes/cadastro':
				include('view/INFES/cadastro.php');
				break;
			case '/infes/cadastrando':
				$acaoDAO = new AcaoDAO();
				$eixoDAO = new EixoDAO();
				$projetoDAO = new ProjetoDAO();
				$atorDAO = new AtorDAO();
				//Adicionar Ação
				$idEixo = $_POST["eixo"];
  			$eixo = $eixoDAO->obter($idEixo);
				$idProjeto = $_POST["projeto"];
  			$projeto = $projetoDAO->obter($idProjeto);
				$titulo = $_POST["titulo"];
				$tema = $_POST["tema"];
				$apresentacao = $_POST["apresentacao"];
				$palavraChave = $_POST["chave"];
				$acao = new Acao($eixo, $projeto, $titulo, $tema, $apresentacao, $palavraChave);
				$acaoDAO = new AcaoDAO();
				$acaoDAO->adicionar($acao);
				$idAcao = $acaoDAO->obterUltimoId();

				// Adicionar Acao Ator
				$idAtor = $_POST["ator"];
  			$ator = $atorDAO->obter($idAtor);
				$acao = $acaoDAO->obter($idAcao);
				$acaoAtor = new AcaoAtor($ator, $acao);
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoAtorDAO->adicionar($acaoAtor);
				//Adicionar Arquivo
				$diretorio = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";
				if (isset($_FILES["edital"])) {
					$nome = $_FILES["edital"]["name"];
					$tmp_name = $_FILES["edital"]["tmp_name"];
					$error = $_FILES["edital"]["error"];
					if ($error !== UPLOAD_ERR_OK) {
						echo "Erro ao fazer upload: ".$error;
					} elseif (move_uploaded_file($_FILES["edital"]["tmp_name"], $diretorio.$nome)) {
						$documento = $diretorio . $nome;
						$acao = $acaoDAO->obter($idAcao);
						$arquivo= new Arquivo($acao, $nome, $documento, "/arquivos/", $tipo="edital");
					  	$arquivoDAO = new ArquivoDAO();
						$arquivoDAO->adicionar($arquivo);
						unlink($diretorio);
					}
				}
				include('view/INFES/cadastro.php');
				break;
			case '/infes/busca':
				// precisa ser atualizado
				/*$acaoDAO = new AcaoDAO();
				$idEixo = $_POST["Peixo"];
				$idProjeto = $_POST["Pprojeto"];
				$tema = $_POST["Ptema"];
				$data = $_POST["Pdata"];
				$listaAcao = $acaoDAO->busca($idEixo, $idProjeto, $tema, $data);*/
				include('view/INFES/Busca.php');
				break;
			case '/infes/resultadobusca':
				// precisa ser atualizado
				$acaoDAO = new AcaoDAO();
				if(!empty($_POST["buscarapida"])){
					$buscaRapida = $_POST['buscarapida'];
					$listaAcao = $acaoDAO->buscaRapida($buscaRapida);
					include('view/INFES/resultadoBusca.php');
				}else{
					$idEixo = $_POST["Peixo"];
					$idProjeto = $_POST["Pprojeto"];
					$tema = $_POST["Ptema"];
					$data = $_POST["Pdata"];
					$hoje = date("d/m/Y");
					$listaAcao=[];
					if($data == "1"){
						$data = date('d/m/Y', strtotime('-7 days'));
					}
					if($data == "2"){
						$data = date('d/m/Y', strtotime('-1 month'));
					}
					if($data == "3"){
						$data = date('d/m/Y', strtotime('-1 year'));
					}

					$listaAcao = $acaoDAO->busca($idEixo, $idProjeto, $tema, $data);
					include('view/INFES/resultadoBusca.php');
			 }

				break;
			case '/infes/acao':
				include('view/INFES/acaoEspecifica.php');
				break;
			case '/infes/acaoespecifica':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$primeiravarivel = $url[1];
				$primeiravarivel = explode("=",$primeiravarivel);
				$id = $primeiravarivel[1];
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				//var_dump($artigoExterno);exit;
				include('view/INFES/acaoEspecifica.php');
			break;

			case '/infes/editaacao':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$primeiravarivel = $url[1];
				$primeiravarivel = explode("=",$primeiravarivel);
				$id = $primeiravarivel[1];
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/editaAcao.php');
			break;

			case '/infes/acaoeditada':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$primeiravarivel = $url[1];
				$primeiravarivel = explode("=",$primeiravarivel);
				$id = $primeiravarivel[1];
				$acao = $acaoDAO->obter($id);
				$titulo = $acao->getTitulo();
				$tema = $acao->getTema();
				$apresentacao = $acao->getApresentacao();
				$acaoEditada =  new Acao($eixo="", $projeto="", $_POST['titulo'], $_POST['tema'], $_POST['apresentacao'], $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				if($_POST["titulo"] == "" &&  $_POST['tema'] == "" &&  $_POST['apresentacao']==""){
						$acaoEditada = new Acao($eixo="", $projeto="", $titulo, $tema, $apresentacao, $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST["titulo"] == "" &&  $_POST['tema'] == "" && $_POST['apresentacao']!=""){
						$acaoEditada = new Acao($eixo="", $projeto="", $titulo, $tema, $_POST['apresentacao'], $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST["titulo"] == "" && $_POST['tema']!="" && $_POST['apresentacao']==""){
						$acaoEditada = new Acao($eixo="", $projeto="", $titulo, $_POST['tema'], $apresentacao, $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST["titulo"] == "" && $_POST['tema']!="" && $_POST['apresentacao']!=""){
						$acaoEditada = new Acao($eixo="", $projeto="", $titulo, $_POST['tema'], $_POST['apresentacao'], $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST['titulo']!="" && $_POST['tema'] == "" &&  $_POST['apresentacao']==""){
						$acaoEditada = new Acao($eixo="", $projeto="", $_POST['titulo'], $tema, $apresentacao, $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST['apresentacao']!="" && $_POST['tema'] == "" && $_POST['apresentacao']!=""){
						$acaoEditada = new Acao($eixo="", $projeto="", $_POST['titulo'], $tema, $_POST['apresentacao'], $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				if($_POST['titulo']!="" && $_POST['tema']!="" && $_POST['apresentacao']==""){
						$acaoEditada = new Acao($eixo="", $projeto="", $_POST['titulo'], $_POST['tema'], $apresentacao, $palavraChave="", $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id);
				}
				$acaoDAO->editarPagina($acaoEditada);
				$diretorio = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";
				if ($_FILES["novoedital"]["name"] != "") {
					$arquivoDAO->excluir($_POST['velhoedital']);
					$nome = $_FILES["novoedital"]["name"];
					$tmp_name = $_FILES["novoedital"]["tmp_name"];
					$error = $_FILES["novoedital"]["error"];
					if ($error !== UPLOAD_ERR_OK) {
						echo "Erro ao fazer upload: ".$error;
					} elseif (move_uploaded_file($_FILES["novoedital"]["tmp_name"], $diretorio.$nome)) {
						$documento = $diretorio . $nome;
						$acao = $acaoDAO->obter($id);
						$arquivo= new Arquivo($acao, $nome, $documento, "/arquivos/", $tipo="edital");
						$arquivoDAO = new ArquivoDAO();
						$arquivoDAO->adicionar($arquivo);
						unlink($diretorio);
					}
				}

				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				//var_dump($artigoExterno);exit;
				include('view/INFES/acaoEspecifica.php');
			break;

			case '/infes/excluirarquivo':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
			//	var_dump($id);exit;
				$idArquivo = $variaveis[1];
				$idArquivo = explode("=", $idArquivo);
				$idArquivo = $idArquivo[1];
			//	var_dump($idArquivo);exit;
				$arquivoDAO->excluir($idArquivo);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/adicionararquivo':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];

				$diretorio = $_SERVER["DOCUMENT_ROOT"]."/arquivos/";
				if ($_FILES["novoarquivo"]["name"] != "") {
					$nome = $_FILES["novoarquivo"]["name"];
					$tmp_name = $_FILES["novoarquivo"]["tmp_name"];
					$error = $_FILES["novoarquivo"]["error"];
					if ($error !== UPLOAD_ERR_OK) {
						echo "Erro ao fazer upload: ".$error;
					} elseif (move_uploaded_file($_FILES["novoarquivo"]["tmp_name"], $diretorio.$nome)) {
						$documento = $diretorio . $nome;
						$acao = $acaoDAO->obter($id);
						$arquivo= new Arquivo($acao, $nome, $documento, "/arquivos/", $tipo="comum");
							$arquivoDAO = new ArquivoDAO();
						$arquivoDAO->adicionar($arquivo);
						unlink($diretorio);
					}
				}
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/adicionaracaoator':
				$acaoDAO = new AcaoDAO();
				$atorDAO = new AtorDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
				//var_dump($_POST["novoator"]);exit;

				$emailNovoAtor = $_POST["novoator"];
				$ator = $atorDAO->obterByEmail($emailNovoAtor);
				$acao = $acaoDAO->obter($id);
			//	var_dump($idArquivo);exit;
				$acaoAtor = new AcaoAtor($ator, $acao);
				$acaoAtorDAO->adicionar($acaoAtor);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/excluiracaoator':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
			//	var_dump($id);exit;
				$idAcaoAtor = $variaveis[1];
				$idAcaoAtor= explode("=", $idAcaoAtor);
				$idAcaoAtor = $idAcaoAtor[1];
			//	var_dump($idArquivo);exit;
				$acaoAtorDAO->excluir($idAcaoAtor);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/adicionaracaovinculada':
				$acaoDAO = new AcaoDAO();
				$atorDAO = new AtorDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
				//var_dump($_POST["novoator"]);exit;

				$tituloNovaAcao = $_POST["novaacao"];
				$acao1 = $acaoDAO->obterByNome($tituloNovaAcao);
				$acao2 = $acaoDAO->obter($id);
			//	var_dump($idArquivo);exit;
				$acaoVinculada = new AcaoVinculada($acao1, $acao2);
				$acaoVinculadaDAO->adicionar($acaoVinculada);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/excluiracaovinculada':
				$acaoDAO = new AcaoDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
			//	var_dump($id);exit;
				$idAcaoVinculada = $variaveis[1];
				$idAcaoVinculada= explode("=", $idAcaoVinculada);
				$idAcaoVinculada = $idAcaoVinculada[1];
				//var_dump($idAcaoVinculada);exit;
				$acaoVinculadaDAO->excluir($idAcaoVinculada);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/adicionarartigoexterno':
				$acaoDAO = new AcaoDAO();
				$atorDAO = new AtorDAO();
				$arquivoDAO = new ArquivoDAO();
				$acaoAtorDAO = new AcaoAtorDAO();
				$acaoVinculadaDAO = new AcaoVinculadaDAO();
				$artigoExternoDAO = new ArtigoExternoDAO();
				$variaveis = $url[1];
			//	var_dump($variaveis);exit;
				$variaveis = explode("&",$variaveis);
				//var_dump($variaveis);exit;
				$id = $variaveis[0];
				//var_dump($id);exit;
				$id = explode("=", $id);
				$id = $id[1];
				//var_dump($_POST["novoator"]);exit;

				$novoLink = $_POST["novolink"];
				$acao = $acaoDAO->obter($id);
			//	var_dump($idArquivo);exit;
				$artigoExterno = new ArtigoExterno($acao, $novoLink);
				$artigoExternoDAO->adicionar($artigoExterno);
				$acaoObj = $acaoDAO->obter($id);
				$edital = $arquivoDAO->obterEditalByAcao($id);
				$listaArquivo = $arquivoDAO->listarByAcao($id);
				$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
				$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
				$artigoExterno = $artigoExternoDAO->listarByAcao($id);
				include('view/INFES/acaoEspecifica.php');

			break;

			case '/infes/excluirartigoexterno':
			$acaoDAO = new AcaoDAO();
			$arquivoDAO = new ArquivoDAO();
			$acaoAtorDAO = new AcaoAtorDAO();
			$acaoVinculadaDAO = new AcaoVinculadaDAO();
			$artigoExternoDAO = new ArtigoExternoDAO();
			$variaveis = $url[1];
		//	var_dump($variaveis);exit;
			$variaveis = explode("&",$variaveis);
			//var_dump($variaveis);exit;
			$id = $variaveis[0];
			//var_dump($id);exit;
			$id = explode("=", $id);
			$id = $id[1];
		//	var_dump($id);exit;
			$idArtigoExterno = $variaveis[1];
			$idArtigoExterno= explode("=", $idArtigoExterno);
			$idArtigoExterno = $idArtigoExterno[1];
			//var_dump($idAcaoVinculada);exit;
			$artigoExternoDAO->excluir($idArtigoExterno);
			$acaoObj = $acaoDAO->obter($id);
			$edital = $arquivoDAO->obterEditalByAcao($id);
			$listaArquivo = $arquivoDAO->listarByAcao($id);
			$acaoAtor = $acaoAtorDAO->listarAtorByAcao($id);
			$acaoVinculada = $acaoVinculadaDAO->listarByAcao($id);
			$artigoExterno = $artigoExternoDAO->listarByAcao($id);
			include('view/INFES/acaoEspecifica.php');

			break;
			//case 'infes/'
			////Paginas de erros#######################
			default :
			var_dump($url[0]);exit;
				echo 'deu ruim ou bom';//marcos chupa rola
				break;
    	}
	#}
}
