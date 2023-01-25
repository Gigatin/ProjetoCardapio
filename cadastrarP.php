
<html>
<head>
    <meta charset="utf-8"/>
    <title>Vendedor</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
<div id="a">
   
    <form action="salvaProdutos.php" method="POST">
	<div id="a">
	<h1>Cadastro de itens</h1>
    <form method="POST">
    <input type="text" placeholder="bote o nome do produto aqui" name="produto">
    <input type="text" placeholder="Quantidade" name="quantidade">
	<input type="text" placeholder="Preco" name="preco">
	<input type="submit" name="cadastrar" value="Cadastrar produto">

    </form>
    </form>

    <form action="excluirprodutos.php" method="POST">
    <form method="POST">
	<input type="submit" name="Excluir Produtos" value="Excluir Produtos">
  </form>
   </form>
   <form action="excluirpedido.php" method="POST">
    <form method="POST">
	<input type="submit" name="Excluir pedido" value="Excluir Pedido">

</form>
</form>
    <?php
    $conexao = new PDO('mysql:host=localhost;dbname=trabalho_ead',"root","");
    
    $select = $conexao->prepare("SELECT * FROM produtos");
    $select->execute();
    $fetch = $select->fetchALL();

    ?>
    <br><h3> Itens cadastrados</h3></br>
<?php
    foreach($fetch as $produtos){
        echo '  Nome:' .$produtos['nomeproduto'].'  </br>&nbsp;

        Quantidade: '.$produtos['quantidadeproduto'].' </br> &nbsp;

        Preço: R$'.number_format($produtos['preco'],2,",",".").'
        <hr/>
     
        <br/>';

    }
    ?>
<br><h3> Clientes que realizaram pedidos</h3></br>
<?php
    $conexao = new PDO('mysql:host=localhost;dbname=trabalho_ead',"root","");
    
    $select = $conexao->prepare("SELECT * FROM pedido");
    $select->execute();
    $fetch = $select->fetchALL();


    foreach($fetch as $pedido){

        echo 'Id Pedido:' .$pedido['idpedido'].' &nbsp;

        <br/>   Quantidade: '.$pedido['quantidade'].' &nbsp;

        <br/> Preço: R$'.number_format($pedido['precototal'],2,",",".").'<br/>
        Id cliente: '.$pedido['id_usuario'].' &nbsp;<br/>
        Id Produto: '.$pedido['idproduto'].' &nbsp;
<hr/>
        <br/>';

    }
    ?>
    	<a href="adm.php"><strong>Sair</strong> </a><br/>
    </div> 

</body>
</html>



