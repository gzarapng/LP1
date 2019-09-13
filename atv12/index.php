<!DOCTYPE html>
<html>
  <head>
     <title></title>
     <meta charset="utf-8" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div class="container border m-4 m-2 mx-auto">
        <h1 class="p-2 m-2 bg-info text-white text-center">Notícias sobre Tecnologia</h1>
        <form action="listar.php" method="post" id="form1">
            <p>Assunto:      <select name="assuntos" form="form1">
                <option value="" disabled>Selecione..</option>
                <option value="Mercado">Mercado</option>
                <option value="Hardware">Hardware</option>
                <option value="Software">Software</option>
                
                </select></p>
            <input type="submit" value="Enviar">
        </form>
         
        
        
    </div>
  </body>
</html>