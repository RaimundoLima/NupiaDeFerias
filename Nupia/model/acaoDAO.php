<?php
include_once("controller/conexao.php");
include_once("acao.php");
include_once("eixoDAO.php");
include_once("projetoDAO.php");
include_once("resumoDAO.php");
class AcaoDAO{
  function adicionar($acao){
    $eixo = $acao->getEixo();
    $idEixo = $eixo->getId();
    $projeto = $acao->getProjeto();
    $idProjeto = $projeto->getId();
    $titulo = $acao->getTitulo();
    $tema = $acao->getTema();
    $descricao = $acao->getDescricao();
    $palavraChave = $acao->getPalavraChave();
    $situacao = $acao->getSituacao();
    $conexao = conexao();
    $query = "insert into acao(ideixo, idprojeto, titulo, tema, descricao, palavrachave, situacao) values('".$idEixo."', '".$idProjeto."', '".$titulo."', '".$tema."', '".$descricao."','".$palavraChave."', '".$situacao."')";
    pg_query($conexao, $query);
    pg_close($conexao);
    return true;
  }
  function listar(){
    $conexao = conexao();
    $query = "select * from acao";
    $result = pg_query($conexao, $query);
    $listaAcao = pg_fetch_all($result);
    pg_close($conexao);
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    $listaAcaoObj = [];
    for($i=0; $i<count($listaAcao); $i++){
      $id = $listaAcao[$i]["id"];
      $idEixo = $listaAcao[$i]["ideixo"];
      $eixo = $eixoDAO->obter($idEixo);
      $idProjeto = $listaAcao[$i]["idprojeto"];
      $projeto = $projetoDAO->obter($idProjeto);
      $titulo = $listaAcao[$i]["titulo"];
      $tema = $listaAcao[$i]["tema"];
      $descricao = $listaAcao[$i]["descricao"];
      $palavraChave = $listaAcao[$i]["palavrachave"];
      $prevInicio = $listaAcao[$i]["previnicio"];
      $prevTermino = $listaAcao[$i]["prevtermino"];
      $situacao = $listaAcao[$i]["situacao"];
      $acao = new Acao($eixo, $projeto, $titulo, $tema, $descricao, $palavraChave, $prevInicio, $prevTermino, $situacao, $id);
      array_push($listaAcaoObj, $acao);
    }
    return $listaAcaoObj;
  }

  function pesquisa($idEixo, $idProjeto, $tema, $data){
    $conexao = conexao();
    $query = "select * from acao";
    if($idEixo != "" && $idProjeto != "" && $tema != "" && $data != ""){
      //$listaAcao = $acaoDAO->listarByEixoProjetoTemaData($idEixo, $idProjeto, $tema, $data);
      $query = "select * from acao where ideixo='".$idEixo."' and idprojeto='".$idProjeto."' and tema='".$tema."' and previnicio>='".$data."'";
    }
    if($idEixo != "" && $idProjeto != "" && $tema != "" && $data == ""){
    //  $listaAcao = $acaoDAO->listarByEixoProjetoTema($idEixo, $idProjeto, $tema);
      $query = "select * from acao where ideixo='".$idEixo."' and idprojeto='".$idProjeto."' and tema='".$tema."'";
    }
    if($idEixo != "" && $idProjeto != "" && $tema == "" && $data != ""){
     // $listaAcao = $acaoDAO->listarByEixoProjetoData($idEixo, $idProjeto, $data);
       $query = "select * from acao where ideixo='".$idEixo."' and idprojeto='".$idProjeto."' and previnicio>='".$data."'";
    }
    if($idEixo != "" && $idProjeto != "" && $tema == "" && $data == ""){
    //  $listaAcao = $acaoDAO->listarByEixoProjeto($idEixo, $idProjeto);
      $query = "select * from acao where ideixo = '".$idEixo."' and idprojeto = '".$idProjeto."'";
    }
    if($idEixo != "" && $idProjeto == "" && $tema != "" && $data != ""){
    //  $listaAcao = $acaoDAO->listarByEixoTemaData($idEixo, $idProjeto);
      $query = "select * from acao where ideixo='".$idEixo."' and tema='".$tema."' and previnicio>='".$data."'";
    }
    if($idEixo != "" && $idProjeto == "" && $tema != "" && $data == ""){
    //  $listaAcao = $acaoDAO->listarByEixoTema($idEixo, $idProjeto);
      $query = "select * from acao where ideixo='".$idEixo."' tema='".$tema."'";
    }
    if($idEixo != "" && $idProjeto == "" && $tema == "" && $data != ""){
    //  $listaAcao = $acaoDAO->listarByEixoData($idEixo, $idProjeto);
      $query = "select * from acao where ideixo='".$idEixo."' and previnicio>='".$data."'";
    }
    if($idEixo != "" && $idProjeto == "" && $tema == "" && $data == ""){
      // $listaAcao = $acaoDAO->listarByEixo($idEixo);
      $query = "select * from acao where ideixo = '".$idEixo."'";
    }
    if($idEixo == "" && $idProjeto != "" && $tema != "" && $data != ""){
      // $listaAcao = $acaoDAO->listarByProjetoTemaData($idProjeto, $tema, $data);
      $query = "select * from acao where idprojeto='".$idProjeto."' and tema='".$tema."' and previnicio>='".$data."'";
    }
    if($idEixo == "" && $idProjeto != "" && $tema != "" && $data == ""){
      // $listaAcao = $acaoDAO->listarByProjetoTema($idProjeto, $tema);
      $query = "select * from acao where ideixo='".$idEixo."' and tema='".$tema."'";
    }
    if($idEixo == "" && $idProjeto != "" && $tema == "" && $data != ""){
      //$listaAcao = $acaoDAO->listarByProjetoData($idProjeto, $data);
      $query = "select * from acao where idprojeto='".$idProjeto."' and previnicio>='".$data."'";
    }
    if($idEixo == "" && $idProjeto != "" && $tema == "" && $data == ""){
     // $listaAcao = $acaoDAO->listarByProjeto($idProjeto);
      $query = "select * from acao where idprojeto = '".$idProjeto."'";
    }
    if($idEixo == "" && $idProjeto == "" && $tema != "" && $data != ""){
      // $listaAcao = $acaoDAO->listarByTemaData($tema, $data);
      $query = "select * from acao where tema='".$tema."' and previnicio>='".$data."'";
    }
    if($idEixo == "" && $idProjeto == "" && $tema != "" && $data == ""){
     // $listaAcao = $acaoDAO->listarByTema($tema);
      $query = "select * from acao where tema='".$tema."'";
    }
    if($idEixo == "" && $idProjeto == "" && $tema == "" && $data != ""){
      //$listaAcao = $acaoDAO->listarByData($data);
      $query = "select * from acao where previnicio>='".$data."'";
    }
    $result = pg_query($conexao, $query);
    $listaAcao = pg_fetch_all($result);
    pg_close($conexao);
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    $listaAcaoObj = [];
    for($i=0; $i<count($listaAcao); $i++){
      $id = $listaAcao[$i]["id"];
      $idEixo = $listaAcao[$i]["ideixo"];
      $eixo = $eixoDAO->obter($idEixo);
      $idProjeto = $listaAcao[$i]["idprojeto"];
      $projeto = $projetoDAO->obter($idProjeto);
      $titulo = $listaAcao[$i]["titulo"];
      $tema = $listaAcao[$i]["tema"];
      $descricao = $listaAcao[$i]["descricao"];
      $palavraChave = $listaAcao[$i]["palavrachave"];
      $prevInicio = $listaAcao[$i]["previnicio"];
      $prevTermino = $listaAcao[$i]["prevtermino"];
      $situacao = $listaAcao[$i]["situacao"];
      $acao = new Acao($eixo, $projeto, $titulo, $tema, $descricao, $palavraChave, $prevInicio, $prevTermino, $situacao, $id);
      array_push($listaAcaoObj, $acao);
    }
    return $listaAcaoObj;
  }

  function obter($id){
    $conexao = conexao();
    $query = "select * from acao where id = '".$id."'";
    $result = pg_query($conexao, $query);
    $acao = pg_fetch_all($result);
    $eixoDAO = new EixoDAO();
    $projetoDAO = new ProjetoDAO();
    pg_close($conexao);
    $id = $acao[0]["id"];
    $idEixo = $acao[0]["ideixo"];
    $eixo = $eixoDAO->obter($idEixo);
    $idProjeto = $acao[0]["idprojeto"];
    $projeto = $projetoDAO->obter($idProjeto);
    $titulo = $acao[0]["titulo"];
    $tema = $acao[0]["tema"];
    $descricao = $acao[0]["descricao"];
    $palavraChave = $acao[0]["palavrachave"];
    $prevInicio = $acao[0]["previnicio"];
    $prevTermino = $acao[0]["prevtermino"];
    $situacao = $acao[0]["situacao"];
    $acaoObj = new Acao($eixo, $projeto, $titulo, $tema, $descricao, $palavraChave, $prevInicio, $prevTermino, $situacao, $id);
    return $acaoObj;
  }

   function obterUltimoId(){
    $conexao = conexao();
    $query = "select max(id) as id from acao";
    $result = pg_query($conexao, $query);
    $acao = pg_fetch_all($result);
    pg_close($conexao);
    $id = $acao[0]["id"];
    return $id;
  }

  function editar($acao){
    $conexao = conexao();
    $id = $acao->getId();
    $eixo = $acao->getEixo();
    $idEixo = $eixo->getId();
    $projeto = $acao->getProjeto();
    $idProjeto = $projeto->getId();
    $titulo = $acao->getTitulo();
    $tema = $acao->getTema();
    $descricao = $acao->getDescricao();
    $palavraChave = $acao->getPalavraChave();
    $prevInicio = $acao->getPrevInicio();
    $prevTermino = $acao->getPrevTermino();
    $situacao = $acao->getSituacao();
    $query = "UPDATE acao set ideixo='".$idEixo."',idprojeto='".$idProjeto."',titulo='".$titulo."',tema='".$tema."', descricao='".$descricao."',palavrachave='".$palavraChave."', previnicio='".$prevInicio."', prevtermino='".$prevTermino."', situacao='".$situacao."' where id='".$id."' where id='".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }
  function excluir($id){
    $conexao = conexao();
    $query = "delete FROM acao WHERE id = '".$id."'";
    $result = pg_query($conexao, $query);
    pg_close($conexao);
  }

}
 ?>