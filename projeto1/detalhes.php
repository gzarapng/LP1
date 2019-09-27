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
         <?php
            $i = $_GET['i'];
        include "Matriz_Noticias.inc";
        
        echo "<div class='container w-75'>
            <div class='row'>
            <div class='col text-center'>
            <p class='font-weight-boldtext-uppercase'>".$matriz_noticias[$i][1]."</p>
            <img class='img-thumbnail' src='".$matriz_noticias[$i][3]."'alt='Foto da Notícia' />
                        <p class='text-justify'>".$matriz_noticias[$i][2]."</p>
            </div>
            </div>
            </div>";
        ?>
        
        
    </div>
  </body>
</html>