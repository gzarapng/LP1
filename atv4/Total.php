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
            $produto = $_POST['nomeprod'];
            $quantidade = $_POST['qtd'];
            $valor = $_POST['valor'];
            $tipo = $_POST['payment'];    
            $total = $valor * $quantidade;
            $totalf = 0;
            
                
                echo "<h1>Produto:   $produto</h1><br/>";
                echo "<h1>Valor:   $valor</h1><br/>";
                echo "<h1>Quantidade:   $quantidade</h1><br/>";
                echo "<h1>Total:   $total</h1><br/>";
        
            if ( $tipo == 'vista' ){
                $totalf = $total-($total * 0.1);
               echo "<h2>Total com Desconto à Vista: $totalf</h2>";
            }
            else{
                $totalf = $total/2;
                echo "<h3>Total Parcelado: 2x de $totalf!</h3>"; 
            }
            
            
        
        
        
        
        echo ("<br/><br/> <button onclick=\"history.go(-1)\">voltar</button>"); 
        
            
            
        ?>
      
        
        
    </div>
  </body>
</html>


