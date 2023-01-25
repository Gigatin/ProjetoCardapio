
<html>
<head>
    <meta charset="utf-8"/>
    <title>Cardapio Confirmar
    </title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>

<div id="a">

<h1>Cardapio </h1>

<?php
require_once 'CLASSES/usuarios.php';
$us = new Usuario;
    session_start();
    if(!isset($_SESSION['itens']))
    {
        $_SESSION['itens'] = array();
    }

    if(isset($_GET['add']) && $_GET['add'] == "carrinho")
    {
        $idProduto = $_GET['id'];
        if(!isset($_SESSION['itens'][$idProduto]))  {
                $_SESSION['itens'][$idProduto] = 1;
        }else{
                $_SESSION['itens'][$idProduto] += 1;
        }
   
        if(isset($_GET['add']) && $_GET['add'] == "carrinho")
        {
            $quantidade = $_GET['id'];
            if(!isset($_SESSION['itens'][$quantidade]))  {
                    $_SESSION['itens'][$quantidade] += 1;
            }
    
    
    
    
    }}



    if(count($_SESSION['itens']) == 0) {
        echo 'Seu carrinho está vazio <br> <a href="areapriva.php"> Adcionar itens </a>';
    }else {

        $_SESSION['dados'] = array();
      
        foreach ($_SESSION['itens'] as $idProduto => $quantidade){
        $conexao = new PDO('mysql: host=localhost; dbname=trabalho_ead', 'root', ''); 
        $use = $conexao->prepare("SELECT id_usuario FROM usuarios where id_usuario=?");
        $select = $conexao->prepare("SELECT * FROM produtos where idproduto=?");
        $select->bindParam(1,$idProduto);
        $select->execute();
        $produtos = $select->fetchAll();   
        $total = $quantidade * $produtos[0]['preco'];
      
            echo
                " Nome: ".$produtos[0]['nomeproduto']."<br/>".
                'Preço: R$ '. number_format($produtos[0]["preco"],2,",",".").'<br>'.
                'Quantidade: '.$quantidade.'<br>'.
                'Total: '.number_format($total,2,",",".").'<br/>
                 <a href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a><br><hr/>';
              


               
                array_push($_SESSION['dados'],
                array(  
                   
                'Quantidade'=>$quantidade,  
                'id_produto'=>$idProduto,
                'id_usuario'=>$_SESSION['id_usuario'],
                'quantidade'=>$quantidade,
                'preco' => $produtos[0]['preco'],
                'total' => $total
               
                  )                   
                  );
                   
                }}
                echo '</br><a href="finaliza.php"> Finalizar Pedido</a><br/>';
                echo '<a href="areapriva.php"> Adicionar mais coisas ao carrinho</a>';

              

?>

</div> 

<a href="Sair.php">Sair<a>

</body>
</html>