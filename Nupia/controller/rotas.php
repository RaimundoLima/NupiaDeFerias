<?php
include_once('model/projetoDAO.php');
include_once("model/ator.php");
include_once("model/atorDAO.php");
function getPagina(){
	$atorDAO = new AtorDAO();
	$url = $_SERVER['REQUEST_URI'];
	$url = explode("?",$url);
	$url[0] = strtolower($url[0]);
	$metodo = $_SERVER['REQUEST_METHOD'];
  if($_SESSION['tipo']!='adm'){
		if(!empty($_SESSION)){
			$user=$atorDao->obter($_SESSION['ator']);
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
				// Não tem instituição por enquanto, fica pro futuro
				//$lista=$dao->InstituicaoListar();
				include('view/cadastro.php');
		  	break;
			case '/cadastrando':
				$nome = $_POST["nome"];
				$tipo = $_POST["tipo"];
				$senha = $_POST["senha"];
				$email = $_POST["email"];
				$codigo = $_POST["codigo"];
				$ator = new Ator($nome, $tipo, $senha, $email, $codigo);
			  $atorDAO = new AtorDAO();
				$retorno = $atorDAO->adicionar($ator);
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
