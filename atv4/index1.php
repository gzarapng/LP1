<!DOCTYPE html>
<html>
  <head>
     <title>Atividade Total</title>
     <meta charset="utf-8" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>

  <body>
    <div class="container border m-4">
         
        <h1>Preencha os dados do produto</h1>
        
        <form action="Total.php" method="post">
            <p>Nome do Produto:  <input type="text" name="nomeprod" required-min="1" max="100" required></p><br/>
            <p>Valor:  <input type="number" name="valor"   required></p><br/>
            <p>Quantidade:  <input type="number" name="qtd"   required></p><br/>
            <p>Pagamento: </p><p><input type="radio" name="payment" value="vista" required>À vista(10% Desconto)</p><p><input type="radio" name="payment" value="parcelado">Parcelado em 2x </p><br/>
            <input type="submit" value="Enviar" name="send">
        </form> 
    </div>
  </body>
</html>