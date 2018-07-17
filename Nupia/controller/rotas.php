<?php
//include('model/acaoDAO.php');
function getPagina(){
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
  if(true){
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
				include('view/projetos.php');
	      break;
			case '/eixos':
				include('view/eixos.php');
			  break;
			case '/cadastro':
				include('view/cadastro.php');
		  	break;
			default :
				echo 'deu ruim ou bom';
				break;
			case '/infes/home':
				include('view/INFES/home.php');
				break;
    }
  }
}
