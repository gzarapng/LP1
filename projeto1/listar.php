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
<?php
        $assunto = $_POST['assuntos'];
        
echo "<h1 class='p-2 m-2 bg-info text-white text-center'>Receitas Tradicionais: -<span class='text-warning'> $assunto</span></h1>";
        include "Matriz_noticias.inc";
        include "matriz_resumo.inc";
echo "<div class='container'>";

    echo "<div class='row justify-content'>
    <div class='col-md-auto'>";
    for($i=0; $i<count($matriz2);$i++){
    if($matriz2[$i][0]==$assunto)
    echo "<p class='font-weight-bold'>".$matriz_noticias[$i][1]." </p>";
}
    echo "<div class-'row'>";
for($i=0; $i<count($matriz_noticias);$i++){
    if($matriz_noticias[$i][0]==$assunto)
        echo "<div class='col text-center'>
        <a href='Detalhes.php?i=$i'>
            <p class='font-weight-bold'>".$matriz_noticias[$i][1]." </p>
        </a>
            <img class='img-thumbnail' src='".$matriz_noticias[$i][3]."' alt='Foto da Notícia'/>
            <p class='text-justify'>".$matriz_noticias[$i][2]."</p>
        </div>";
}    
    
        

echo" </div>
</div>
    </div>
    </div>";
?>WE
         
        
        
    </div>
  </body>
</html>