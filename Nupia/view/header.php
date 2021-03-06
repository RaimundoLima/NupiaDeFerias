<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="/view/css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <link type="text/css" rel="stylesheet" href="/view/css/css.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description" content="Nucleo unificado de pesquisa integrando agropecuaria">
  <meta name="keywords" content="Nupia,Geosolo,GVTecAgro,INFES,VITAL">
  <meta name="author" content="Raimundo Lima,Marcos Goulart,Luis">
</head>

<body class="green lighten-5 ">

  <nav style="position: fixed;" style="height: 48px !important" class="green nav-extended navbar-fixed">
    <div style="height: 48px !important" class="green nav-wrapper ">
      <div aling="center" class="brand-logo">
        <a href="Home">
          <img style=" margin-top: 4%;"  height="48px" src="view/img/Nupia2.png" alt="Icone">
        </a>
      </div>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons large">menu</i></a>
      <ul id="nav-mobile">
        <div class="navio">
          <li><a id="home" href="Home">Home</a></li>
          <li><a id="acoes" href="Acoes">Ações</a></li>
          <li><a id="projetos" href="Projetos">Projetos</a></li>
          <li><a id="eixos" href="Eixos">Eixos</a></li>
          <form method="POST" action="/infes/resultadobusca">
            <li><i style='cursor:pointer;' id='search' class="material-icons left">search</i></li>
            <li><input class='nupia' name='buscarapida' id="searchInput" style="color: #ffffff;background: #337b36e8;border-radius: 15px" placeholder="Busca Rapida"></li>
            <li><input type="submit" hidden></li>
          </form>
        </div>
        <?php
          if(empty($user)){
            echo ' <div style="margin-right: 15%;"" class="right">
                      <li><a id="cadastra" href="Cadastro">Cadastrar</a>
                      </li>
                      <li><a id="logar" href="Logar">Logar</a>
                      </li>
                    </div>';
          }else{
            echo '<div style="max-height:48px;margin-right: 15%;" class="right">
            <li><img class= "foto-sidenav"style="margin-top:10%; width: 48px;
              height: 48px;" src="view/img/raiLindo.jpg"></img><li>
            <li><a >Notficações</a></li>
          <li><a id="'.$user->getId().'"></a></li>';
            }
        ?>
      </ul>
    </div>
  </nav>

  <ul class="green lighten-5 sidenav" id="mobile-demo">
    <div  class='green' style='height: 25%;'>
      <div style='position: absolute;z-index:3;top:10%;'>
        <div class='foto-sidenav'>
          <img src='view/img/raiLindo.jpg'>
        </div>
      </div>
      <div style='margin-left: 160px;position: absolute;z-index:3;top:12%;'>
        <b>Logado como:</b>
        <br>
        <b>Nome de usuario</b>
      </div>
    </div>
    <div style='margin-top:20%;'>
    <li><a href="Home">Home</a></li>
          <li><a href="Acoes">Ações</a></li>
          <li><a href="Projetos">Projetos</a></li>
          <li><a href="Eixos">Eixos</a></li>
          <li><a href="Cadastro">Cadastrar</a></li>
          <li><a href="Logar">Logar</a></li>
    </div>
          <!--	<li><i class="material-icons left">search</i></li><li><input  placeholder="Pesquisar" ></li>-->
      </ul>
      <script>
      </script>
      <div id="preloader">
        <div class="inner">
          <div class="bolas">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
      <!--fim -->
