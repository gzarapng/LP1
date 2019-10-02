<!DOCTYPE html>
<html>
  <head>
  <title></title>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div class="container border m-4 m-2 mx-auto ">
<?php
        $assunto = $_POST['assuntos'];
        
echo "<h1 class='p-2 m-2 bg-info text-white text-center'>Receitas Tradicionais: -<span class='text-warning'> $assunto</span></h1>";
        include "Matriz_noticias.inc";
        include "matriz_resumo.inc";
echo "<div class='container'>";

   // echo "<div class='row border m-3 m-2 mx-auto'>
    
    echo "<div class-'row justify-content'>
    <div class='col-sm-auto'>";
    for($i=0; $i<count($matriz2);$i++){
    if($matriz2[$i][0]==$assunto)
    echo "<p class='font-weight-bold word-wrap: break-word text-justify' >".$matriz2[$i][1]." </p>";
}
for($i=0; $i<count($matriz_noticias);$i++){
    if($matriz_noticias[$i][0]==$assunto)
        echo "<div class='col text-center'>
        <a href='Detalhes.php?i=$i'>
            <p class='font-weight-bold'>".$matriz_noticias[$i][1]." </p>
        </a>
            <p><iframe width='560' height='315' src=".$matriz_noticias[$i][3]." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></p>

            <p class='text-justify'>".$matriz_noticias[$i][2]."</p>
        </div>";
}    
    
        

echo" </div>
</div>
    </div>
    </div>";
?>
         
        
        
    </div>
  </body>
</html>