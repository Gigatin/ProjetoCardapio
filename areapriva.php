

<html>
<head>
    <meta charset="utf-8"/>
    <title>Cardapio</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
<div id="a">
<h1>Cardapio </h1>

<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }




    $conexao = new PDO('mysql:host=localhost;dbname=trabalho_ead',"root","");
    
    $select = $conexao->prepare("SELECT * FROM produtos");
    $select->execute();
    $fetch = $select->fetchALL();


    foreach($fetch as $produtos){
        echo 'Nome do produto:' .$produtos['nomeproduto'].' &nbsp;

        Quantidade: '.$produtos['quantidadeproduto'].' &nbsp;

        Preço: R$'.number_format($produtos['preco'],2,",",".").'
    
        <a href="carrinho.php?add=carrinho&id='.$produtos['idproduto'].'">Adicionar ao carrinho</a>
        <br/>';

      
    }
?>


</div> 

<a href="Sair.php">Sair<a>

</body>
</html>








