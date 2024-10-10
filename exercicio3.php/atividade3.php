<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 3</title>
    <link rel="stylesheet" href="atividade3.css">

</head>
<body>
    <h2>Resultado Relatório de Clientes</h2>
    
    <?php
        //criando cada pessoa manualmente
        $pessoa1 = array("codigo"=>1, "nome"=> "Alberto Silva");
        $pessoa2 = array("codigo"=>2, "nome"=> "Bianca Duarte");
        $pessoa3 = array("codigo"=>3, "nome"=> "João Almeida");
        $pessoa4 = array("codigo"=>4, "nome"=> "Valéria Souza");
        $pessoa5 = array("codigo"=>5, "nome"=> "Augusto Silva");

        //adicionando dentro de um array maior para todos
        $lista['pessoa'][]= $pessoa1;
        $lista['pessoa'][]= $pessoa2;
        $lista['pessoa'][]= $pessoa3;
        $lista['pessoa'][]= $pessoa4;
        $lista['pessoa'][]= $pessoa5;

        //usamos o var_dump para ver como a lista está armazenada
        //var_dump($lista);

        //vamos jogar o array lista de ntro de outro array
        foreach($lista as $listapessoas){
        ?> <!--fechamos o php para que rode o html no brower - boas normas-->
        <table> <!--o table vai ser repetido 5 vezes quanto o foreach procura sua chave final-->
            <tr>
                <th>Código</th>
                <th>Nome</th>
            </tr>
            <?php foreach($listapessoas as $itempessoas => $valuepessoas){ ?> <!--aqui cria as colunas-->
            <tr>
                <?php foreach($valuepessoas as $item=> $value){ //aqui cria as linhas
                    echo "<td> $value </td>";

                }
            ?>
            </tr>
            <?php }?>
        </table>
        
    
    <?php }?>
</body>
</html>