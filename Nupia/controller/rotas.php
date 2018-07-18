<?php
//include('model/acaoDAO.php');
function getPagina(){
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
  if(true){
		//fazer algo sobre logins
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
				//$lista=$dao->eixosListar();
				include('view/eixos.php');
			  break;
			case '/logar':
				include('view/logar.php');
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
			////Paginas de erros####
			default :
				echo 'deu ruim ou bom';
				break;
    }
  }
}
