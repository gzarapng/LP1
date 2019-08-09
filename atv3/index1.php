<!DOCTYPE html>
<html>
  <head>
     <title>Atividade Boas Vindas</title>
     <meta charset="utf-8" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div class="container border m-4">
         
        <h1>Informe seus dados</h1>
        
        <form action="BoasVindas.php" method="post">
            <p>Nome:  <input type="text" name="nome" required-min="1" max="100" required></p><br/>
            <p>Idade:  <input type="number" name="idade" min="1" max="150"  required></p><br/>
            <p>Sexo:    <input type="radio" name="sexo" value="Feminino" >Feminino<input type="radio" name="sexo" value="Masculino">Masculino </p><br/>
            <input type="submit" value="Enviar" name="send">
        </form> 
    </div>
  </body>
</html>