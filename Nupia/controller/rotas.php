<?php
//include('../model/acaoDAO.php');
function getPagina(){
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
  if($_SESSION['tipo']!='adm'){
		if(!empty($_SESSION)){
			$user=$dao->AtorBuscar($_SESSION['ator']);
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
				//$lista=$dao->ProjetosListar();
				include('view/projetos.php');
	      break;
			case '/eixos':
				//$lista=$dao->EixosListar();
				include('view/eixos.php');
			  break;
			case '/logar':
				include('view/logar.php');
				break;
			case '/logando':
				//
				$usuario_informado=$dao->AtorBuscar($_POST['email']);
				$senha=$usuario_informado->getSenha();
				if(!empty($usuario_informado) && $_POST['senha']==$senha){
					$_SESSION['ator']=$usuario_informado;
					$_SESSION['tipo']='ator';
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
				//$lista=$dao->InstituicaoListar();
				include('view/cadastro.php');
		  	break;
			case '/cadastrando':
				//$dao->AtorCadastra();//seria legal se as funções tiverem um return true
				header("Location: /Home");//redireciona
			///INFES##########Só testando
			case '/infes/home':
				include('view/INFES/home.php');
				break;
			case '/infes/acoes':
				include('view/INFES/acoes.php');
				break;
			case '/infes/cadastra':
				include('view/INFES/cadastro.php');
				break;
			case '/infes/pesquisa':
				include('view/INFES/pesquisa.php');
				break;
			////Paginas de erros#######################
			default :
				echo 'deu ruim ou bom';
				break;
    }
  }
}
