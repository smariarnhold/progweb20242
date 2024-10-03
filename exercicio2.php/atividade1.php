<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <?php

    //código pornto para pegar o horario do computador e converter
    $datetime = new DateTime( "now", new DateTimeZone( "America/Sao_Paulo" ) );
    $hora = $datetime->format( 'H' );

    if($hora >= 0 && $hora <= 12) { //pegando o horario da manhã
        echo "Bom Dia";
        echo "<br>";
        echo '<img src="img/bom dia.png" alt="Imagem de bom dia" />';
    } elseif ($hora > 12 && $hora < 18) { //pegando o horario da tarde
        echo "Boa Tarde";
        echo "<br>";
        echo '<img src="img/boa tarde.png" alt="Imagem de boa tarde" />';
    } else{ //pegando o horario da noite
        echo "Boa Noite";
        echo "<br>";
        echo '<img src="img/boa noite.png" alt="Imagem de boa noite" />';
    }
    
    ?>
</body>
</html>