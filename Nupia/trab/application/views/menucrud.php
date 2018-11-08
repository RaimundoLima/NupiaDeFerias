<ul>
    <p> <h2> Menu </h2> </p>
    <?php if (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'ADMIN') {
      echo "<li> ".anchor('Meucontroller/index','Cadastrar dados')." </li>
      <li>".anchor('Meucontroller/retrievedata','Apresentar dados')."</li>
      <li> ".anchor('Meucontroller/logout', 'Sair')."</li>";
    } else if (isset($_SESSION['usuario']) and $_SESSION['usuario'] != 'ADMIN'){
      echo "<li> ".anchor('Meucontroller/index','Cadastrar dados')."</li>
      <li> ".anchor('Meucontroller/retrievedata','Apresentar dados')." </li>
      <li> ".anchor('Meucontroller/logout', 'Sair')."</li>";
    } else {
      echo "
      <li> ".anchor('Meucontroller/login', 'Entrar')." </li>
      <li> ".anchor('Meucontroller/cadastrar', 'Cadastrar-se')." </li>";
    }
   ?>
</ul>
