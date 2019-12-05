<!DOCTYPE html>
<html>
  <head>
     <title>The Copper Vynil</title>
      <meta charset="utf-8" />
      <link rel="icon" href="Imagens/favicon.ico" type="image/ico" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Condensed&display=swap" rel="stylesheet">
        <script src="scripts.js"></script>
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        
  </head>
  <body>
    <header>
        <h1 class="p-4 m-2 text-white text-center" id="h1index"><a href="index.php" id="headerlink" target="_self">The Copper Vinyl</a></h1>
    </header>
    <main>
    <!-- Default form login -->
        <form class="text-center border border-light p-5" action="#!" id="form1">

        <p class="h4 mb-4" id="entrar">Entrar</p>

        <!-- Email -->
        
        <input type="name" id="login" class="form-control mb-4" placeholder="Login">
            
        <!-- Password -->
        <input type="password" id="senha" class="form-control mb-4" placeholder="Senha">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Forgot password -->
                <a href="" id="forgotsenha">Esqueceu sua senha?</a>
            </div>
        </div>
        <!-- Sign in button -->
        <button class="btn btn-elegant btn-block my-4" type="submit">Entrar</button>
        <!-- Register -->
        <p>Não tem uma conta?
            <a href="cadastrouser.php">Registre-se</a>
        </p>
        </form>
<!-- Default form login -->
    </main>
    <footer>
      <div class="ifcontainer">
        <a class="ifcontainerlogo" href="http://portal.ifspguarulhos.edu.br/"
          ><img src="img/logoif.png" width="100%" target="_blank" />
        </a>
      </div>
      <div class="footercontainertext">
        <p class="footertext">
          Site desenvolvido como um projeto do Instituto Federal de São Paulo -
          campûs Guarulhos. 
        </p>
        <p class="footertext">
          Feito por Gabriel Zara. Desenvolvido com HTML, CSS, PHP e JSS na plataforma
          Visual Studio Code
        </p>
      </div>
      <div class="footercontainerlinks">
        <a
          class="footerlinks"
          href="https://github.com/gzarapng"
          target="_blank"
          ><img src="img/githublogo.png" width="40px"
        /></a>

        <a
          class="footerlinks"
          href="https://www.instagram.com/gzara.jpg/"
          target="_blank"
          ><img src="img/instalogo.png" width="40px"
        /></a>
      </div>


</footer>
  </body>
</html>