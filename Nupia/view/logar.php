<?php
include('header.php');
?>
<br><br><br><br>
  <div style="border: 1px solid #a8dea4;" class="container">
    <div aling='center' style="margin:auto;border: 1px solid #e8e8e8;padding: 2em;" class='container'>
      <div class='center'>
        <h3>Acessando o NUPIA</h3>
        <form method="POST" action="/cadastrando">
              <div  class="input-field inline">
                <input required id="email"name="email" type="email">
                <label for="email">Nome ou Email</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
              </div>
    		  <br>
              <div class="input-field inline ">
                <input required id="senha"name="senha" type="password">
                <label for="senha">Senha</label>
                <span class="helper-text" data-error="wrong" data-success="right"></span>
              </div>
              <br>
            <a style='font-size: 12px;' href="Home">Esqueceu a senha?</a>
    		  <br>
      </div>
    </div>
    <br>
    <div aling='center' style="margin:auto;border: 1px solid #e8e8e8;padding: 3em;" class='container'>
      <div class='center'>
        <b>Novo no Nupia?&nbsp<a href="Cadastro">Crie uma conta</a></b>
      </div>
    </div>
  </div>
<?php
include('footer.php');
?>
