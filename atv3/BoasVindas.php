<!DOCTYPE html>
<html>
  <head>
     <title>Resultado</title>
     <meta charset="utf-8" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div class="container border m-4">
        <h1></h1> 
        
        <?php
            $gender = $_POST['sexo'];
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
        
            if ( $gender == 'Masculino' ) 
               echo "<h3>Bem Vindo $nome! </h3>";
            else
               echo "<h3>Bem Vinda $nome!</h3>"; 
            
            if($idade < 16)
                echo "<h4>Seu voto é proibido!</h4>";
        else if($idade >= 16 && $idade < 18)
            echo "<h4>Seu voto é opcional!</h4>";
        else if($idade > 70)
            echo "<h4>Seu voto é opcional!</h4>";
        else
            echo "<h4>Seu voto é obrigatório!</h4>";
        
        
        
        
        echo ("<br/><br/> <button onclick=\"history.go(-1)\">voltar</button>"); 
        
            
            
        ?>
      
        
        
    </div>
  </body>
</html>


