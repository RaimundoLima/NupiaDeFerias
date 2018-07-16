<?php

################################ ACAO #######################################
################################ ATOR #######################################
	class AtorDAO{
		function adicionar($ator){
			$nome = $ator->getNome();
			$tipo = $ator->getTipo();
			$senha = $ator->getSenha();
			$email = $ator->getEmail();
			$codigo = $ator->getCodigo();
			$conexao = conexao();
			$query = "insert into ator(nome, tipo, senha, email, codigo) values('".$nome."', '".$tipo."', '".$senha."', '".$email."', '".$codigo."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from ator";
			$result = pg_query($conexao, $query);
			$listaAtor = pg_fetch_all($result);
			pg_close($conexao);
			$listaAtorObj = [];
			for($i=0; $i<count($result); $i++){
				$nome = $listaAtor[$i]["nome"];
				$tipo = $listaAtor[$i]["tipo"];
				$senha = $listaAtor[$i]["senha"];
				$email = $listaAtor[$i]["email"];
				$codigo = $listaAtor[$i]["codigo"];
				$ator = new Ator($nome, $tipo, $senha, $email, $codigo);
				$listaAtorObj.append($ator);
			}
			return $listaAtorObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from ator where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$ator = pg_fetch_one($result);
			pg_close($conexao);
			$nome = $ator[$i]["nome"];
			$tipo = $ator[$i]["tipo"];
			$senha = $ator[$i]["senha"];
			$email = $ator[$i]["email"];
			$codigo = $ator[$i]["codigo"]
			$atorObj = new Ator($nome, $tipo, $senha, $email, $codigo);
			return $atorObj;
		}
		function editar($ator){
			$conexao = conexao();
			$nome = $ator->getNome();
			$tipo = $ator->getTipo();
			$senha = $ator->getSenha();
			$email = $ator->getEmail();
			$codigo = $ator->getCodigo();
			$query = "UPDATE ator set nome='".$nome."',tipo='".$tipo."',senha='".$senha."',email='".$email."',codigo='".$codigo."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM ator WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
################################ ARQUIVO #######################################
	class ArquivoDAO{
		function adicionar($arquivo){
			$nome = $arquivo->getNome();
			$acao = $arquivo->getAcao();
			$idAcao = $acao->getId();
			$conexao = conexao();
			$query = "insert into arquivo(nome, idacao) values('".$nome."', '".$idAcao."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from arquivo";
			$result = pg_query($conexao, $query);
			$listaArquivo = pg_fetch_all($result);
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$listaArquivoObj = [];
			for($i=0; $i<count($result); $i++){
				$nome = $listaArquivo[$i]["nome"];
				$idAcao = $listaArquivo[$i]["idacao"];
				$acao = $acaoDAO->obter();
				$arquivo = new Arquivo($acao, $nome);
				$listaArquivoObj.append($arquivo);
			}
			return $listaArquivoObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from arquivo where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$arquivo = pg_fetch_one($result);
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$idacao = $arquivo[$i]["idacao"];
			$acao = $acaoDAO->obter($idacao);
			$nome = $arquivo[$i]["nome"];
			$arquivoObj = new Arquivo($acao, $nome);
			return $arquivoObj;
		}
		function editar($arquivo){
			$conexao = conexao();
			$nome = $arquivo->getNome();
			$acao = $arquivo->getAcao();
			$idAcao = $acao->getId();
			$query = "UPDATE arquivo set idacao='".$idAcao."',nome='".$nome."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM arquivo WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
	################################ EIXO #######################################
	class EixoDAO{
		function adicionar($eixo){
			$nome = $eixo->getNome();
			$descricao = $eixo->getDescricao();
			$conexao = conexao();
			$query = "insert into eixo(nome, descricao) values('".$nome."', '".$descricao."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from eixo";
			$result = pg_query($conexao, $query);
			$listaEixo = pg_fetch_all($result);
			pg_close($conexao);
			$listaEixoObj = [];
			for($i=0; $i<count($result); $i++){
				$nome = $listaEixo[$i]["nome"];
				$descricao = $listaEixo[$i]["descricao"];
				$eixo = new Eixo($nome, $descricao);
				$listaEixoObj.append($eixo);
			}
			return $listaEixoObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from eixo where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$eixo = pg_fetch_one($result);
			pg_close($conexao);
			$nome = $eixo[$i]["nome"];
			$descricao = $eixo[$i]["descricao"];
			$eixoObj = new Eixo($nome, $descricao);
			return $eixoObj;
		}
		function editar($eixo){
			$conexao = conexao();
			$nome = $eixo->getNome();
			$descricao = $eixo->getDescricao();
			$query = "UPDATE eixo set nome='".$nome."',descricao='".$descricao."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM eixo WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
################################ PROJETO #######################################
	class ProjetoDAO{
		function adicionar($projeto){
			$nome = $projeto->getNome();
			$descricao = $projeto->getDescricao();
			$conexao = conexao();
			$query = "insert into projeto(nome, descricao) values('".$nome."', '".$descricao."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from projeto";
			$result = pg_query($conexao, $query);
			$listaProjeto = pg_fetch_all($result);
			pg_close($conexao);
			$listaProjetoObj = [];
			for($i=0; $i<count($result); $i++){
				$nome = $listaProjeto[$i]["nome"];
				$descricao = $listaProjeto[$i]["descricao"];
				$projeto = new Projeto($nome, $descricao);
				$listaProjetoObj.append($projeto);
			}
			return $listaProjetoObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from projeto where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$projeto = pg_fetch_one($result);
			pg_close($conexao);
			$nome = $projeto[$i]["nome"];
			$descricao = $projeto[$i]["descricao"];
			$projetoObj = new Eixo($nome, $descricao);
			return $projetoObj;
		}
		function editar($projeto){
			$conexao = conexao();
			$nome = $projeto->getNome();
			$descricao = $projeto->getDescricao();
			$query = "UPDATE projeto set nome='".$nome."',descricao='".$descricao."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM projeto WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
	################################ RESUMO #######################################

	class ResumoDAO{
		function adicionar($resumo){
			$titulo = $resumo->getTitulo();
			$ator = $resumo->getAtor();
			$idAtor = $ator->getId();
			$justificativa = $resumo->getJustificativa();
			$objetivo = $resumo->getObjetivo();
			$metodologia = $resumo->getMetodologia();
			$resultadoEsperado = $resumo->getResultadoEsperado();
			$impactoEsperado = $resumo->getImpactoEsperado();
			$conexao = conexao();
			$query = "insert into resumo(titulo, idator, justificativa, objetivo, metodologia, resultadoesperado, impactoesperado) values('".$titulo."', '".$idAtor."', '".$justificativa."', '".$objetivo."', '".$metodologia."', '".$resultadoEsperado."', '".$impactoEsperado."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from resumo";
			$result = pg_query($conexao, $query);
			$listaResumo = pg_fetch_all($result);
			$atorDAO = new AtorDAO();
			pg_close($conexao);
			$listaResumoObj = [];
			for($i=0; $i<count($result); $i++){
				$titulo = $listaResumo[$i]["titulo"];
				$idAtor = $listaResumo[$i]["idator"];
				$ator = $AtorDAO->obter($idAtor);
				$justificativa = $listaResumo[$i]["justificativa"];
				$objetivo = $listaResumo[$i]["objetivo"];
				$metodologia = $listaResumo[$i]["metodologia"];
				$resultadoEsperado = $listaResumo[$id]["resultadoesperado"];
				$impactoEsperado = $listaResumo[$i]["impactoesperado"];
				$resumo = new Resumo($titulo, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
				$listaResumoObj.append($resumo);
			}
			return $listaResumoObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from resumo where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$projeto = pg_fetch_one($result);
			$atorDAO = new AtorDAO();
			pg_close($conexao);
			$titulo = $listaResumo[$i]["titulo"];
			$idAtor = $listaResumo[$i]["idator"];
			$ator = $atorDAO->obter($idAtor);
			$justificativa = $listaResumo[$i]["justificativa"];
			$objetivo = $listaResumo[$i]["objetivo"];
			$metodologia = $listaResumo[$i]["metodologia"];
			$resultadoEsperado = $listaResumo[$id]["resultadoesperado"];
			$impactoEsperado = $listaResumo[$i]["impactoesperado"];
			$resumoObj = new Resumo($titulo, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
			return $resumoObj;
		}
		function editar($resumo){
			$conexao = conexao();
			$titulo = $resumo->getTitulo();
			$ator = $resumo->getAtor();
			$idAtor = $ator->getId();
			$justificativa = $resumo->getJustificativa();
			$objetivo = $resumo->getObjetivo();
			$metodologia = $resumo->getMetodologia();
			$resultadoEsperado = $resumo->getResultadoEsperado();
			$impactoEsperado = $resumo->getImpactoEsperado();
			$query = "UPDATE resumo set titulo='".$titulo."', idator='".$idAtor."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM resumo WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
		################################ ACAOATOR #######################################

	class AcaoAtorDAO{
		function adicionar($acaoAtor){
			$ator = $acaoAtor->getAtor();
			$idAtor = $ator->getId();
			$acao = $acaoAtor->getAcao();
			$idAcao = $acao->getId();
			$titulo = $acaoAtor->getTitulo();
			$justificativa = $acaoAtor->getJustificativa();
			$objetivo = $acaoAtor->getObjetivo();
			$metodologia = $acaoAtor->getMetodologia();
			$resultadoEsperado = $acaoAtor->getResultadoEsperado();
			$impactoEsperado = $acaoAtor->getImpactoEsperado();
			$conexao = conexao();
			$query = "insert into acaoator(idator, idacao, titulo, justificativa, objetivo, metodologia, resultadoesperado, impactoesperado) values('".$idAtor."', '".$idAcao."', '".$titulo."', '".$justificativa."', '".$objetivo."', '".$metodologia."', '".$resultadoEsperado."', '".$impactoEsperado."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from acaoator";
			$result = pg_query($conexao, $query);
			$listaAcaoAtor = pg_fetch_all($result);
			$atorDAO = new AtorDAO();
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$listaResumoObj = [];
			for($i=0; $i<count($result); $i++){
				$idAtor = $listaAcaoAtor[$i]["idator"];
				$ator = $atorDAO->obter($idAtor);
				$idAcao = $listaAcaoAtor[$i]["idacao"];
				$acao = $acaoDAO->obter($idAcao);
				$titulo = $listaAcaoAtor[$i]["titulo"];
				$justificativa = $listaAcaoAtor[$i]["justificativa"];
				$objetivo = $listaAcaoAtor[$i]["objetivo"];
				$metodologia = $listaAcaoAtor[$i]["metodologia"];
				$resultadoEsperado = $listaAcaoAtor[$id]["resultadoesperado"];
				$impactoEsperado = $listaAcaoAtor[$i]["impactoesperado"];
				$acaoAtor = new AcaoAtor($ator, $acao, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
				$listaAcaoAtorObj.append($acaoAtor);
			}
			return $listaAcaoAtorObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from acaoator where id = '".$idAcaoAtor."'";
			$result = pg_query($conexao, $query);
			$listaAcaoAtor = pg_fetch_one($result);
			$atorDAO = new AtorDAO();
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$idAtor = $listaAcaoAtor[$i]["idator"];
			$ator = $atorDAO->obter($idAtor);
			$idAcao = $listaAcaoAtor[$i]["idacao"];
			$acao = $acaoDAO->obter($idAcao);
			$titulo = $listaAcaoAtor[$i]["titulo"];
			$justificativa = $listaAcaoAtor[$i]["justificativa"];
			$objetivo = $listaAcaoAtor[$i]["objetivo"];
			$metodologia = $listaAcaoAtor[$i]["metodologia"];
			$resultadoEsperado = $listaAcaoAtor[$id]["resultadoesperado"];
			$impactoEsperado = $listaAcaoAtor[$i]["impactoesperado"];
			$acaoAtorObj = new AcaoAtor($ator, $acao, $titulo,$justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
			return $AcaoAtorObj;
		}
		function editar($acaoator){
			$conexao = conexao();
			$ator = $acaoAtor->getAtor();
			$idAtor = $ator->getId();
			$acao = $acaoAtor->getAcao();
			$idAcao = $acao->getId();
			$titulo = $acaoAtor->getTitulo();
			$justificativa = $acaoAtor->getJustificativa();
			$objetivo = $acaoAtor->getObjetivo();
			$metodologia = $acaoAtor->getMetodologia();
			$resultadoEsperado = $acaoAtor->getResultadoEsperado();
			$impactoEsperado = $acaoAtor->getImpactoEsperado();
			$conexao = conexao();
			$query = "UPDATE acaoator set idator='".$idAtor."', idacao='".$idAcao."', titulo='".$titulo."', idator='".$idAtor."', justificativa='".$justificativa."',objetivo='".$objetivo."',metodologia='".$metodologia."', resultadoesperado='".$resultadoEsperado."', impactoesperado='".$impactoEsperado."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM acaoator WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
	################################ ACAOATOR #######################################

	class AcaoVinculadaDAO{
		function adicionar($acaoVinculada){
			$acao1 = $acaoVinculada->getAcao1();
			$idAcao1 = $acao1->getId();
			$acao2 = $acaoVinculada->getAcao2();
			$idAcao2 = $acao2->getId();
			$conexao = conexao();
			$query = "insert into acaoVinculada(idacao1, idacao2) values('".$idAcao1."', '".$idAcao2."')";
			pg_query($conexao, $query);
			pg_close($conexao);
		}
		function listar(){
			$conexao = conexao();
			$query = "select * from acaovinculada";
			$result = pg_query($conexao, $query);
			$listaAcaoVinculada = pg_fetch_all($result);
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$listaAcaoVinculadaObj = [];
			for($i=0; $i<count($result); $i++){
				$idAcao1 = $listaAcaoVinculada[$i]["idacao1"];
				$acao1 = $acaoDAO->obter($idAcao1);
				$idAcao2 = $listaAcaoVinculada[$i]["idacao2"];
				$acao2 = $acaoDAO->obter($idAcao2);
				$acaoVinculada = new AcaoVinculada($acao1, $acao2);
				$listaAcaoVinculadaObj.append($acaoVinculada);
			}
			return $listaVinculadaObj;
		}
		function obter($id){
			$conexao = conexao();
			$query = "select * from acaovinculada where id = '".$id."'";
			$result = pg_query($conexao, $query);
			$acaoAcaoVinculada = pg_fetch_one($result);
			$acaoDAO = new AcaoDAO();
			pg_close($conexao);
			$idAcao1 = $listaAcaoVinculada[$i]["idacao1"];
			$acao1 = $acaoDAO->obter($idAcao1);
			$idAcao2 = $listaAcaoVinculada[$i]["idacao2"];
			$acao2 = $acaoDAO->obter($idAcao);
			$acaoVinculadaObj = new AcaoVinculada($acao1, $acao2);
			return $AcaoVinculadaObj;
		}
		function editar($acaoator){
			$conexao = conexao();
			$acao1 = $acaoVinculada->getAcao1();
			$idAcao1 = $acao1->getId();
			$acao2 = $acaoVinculada->getAcao2();
			$idAcao2 = $acao2->getId();
			$conexao = conexao();
			$query = "UPDATE acaovinculada set idacao1='".$idAcao1."', idacao2='".$idAcao2."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
		function excluir($id){
			$conexao = conexao();
			$query = "delete FROM acaoVinculada WHERE id = '".$id."'";
			$result = pg_query($conexao, $query);
			pg_close($conexao);
		}
	}
?>
