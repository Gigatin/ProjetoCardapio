<?php
require_once 'CLASSES/usuarios.php';
$us = new Usuario;

session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}

 
    foreach($_SESSION['dados'] as $produtos){
    $conexao = new PDO('mysql: host=localhost; dbname=trabalho_ead', 'root',''); 
    $insert = $conexao -> prepare("
    INSERT INTO pedido () VALUES (null,?,?,?,?,?)");
    $insert->bindParam(1,$produtos['quantidade']);
    $insert->bindParam(2,$produtos['total']);
    $insert->bindParam(3,$produtos['id_usuario']);
    $insert->bindParam(4,$produtos['id_produto']);
    $insert->bindParam(5,$produtos['preco']);
    $insert->execute();

    
 }
?>
 <?php

?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Cardapio</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
<style>
h1 {
	color: #2E64FE;
}
h2 {

    color:#FF0000;
}

</style>
<div id="a">
    
    <form method="POST">
    <h1>Compra Finalizada Com Sucesso!!!</h1>
    
    <a href="areapriva.php"><h2><strong>Voltar ao cardapio</h2></strong>
    <a href="Sair.php">Sair<a>
    </form>
</div> 
</body>

</html>