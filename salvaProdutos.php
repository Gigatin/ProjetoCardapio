<?php require_once "conecta.php"?>

<?php 
	$nome = $_POST['produto'];
	$qtde = $_POST['quantidade'];
	$preco = $_POST['preco'];
	
	inserir($conexao,$nome,$qtde,$preco);
	
	function inserir($conexao,$nome,$qtde,$preco){
		$sql="INSERT INTO produtos (nomeproduto, quantidadeproduto, preco) values ('$nome', '$qtde', '$preco')";
		if(mysqli_query( $conexao, $sql)){
		header("Location:cadastrarP.php");
		}
		else{
		$erro=mysqli_error($conexao);
		echo 'não adicionado';
		echo $erro;
	  }
		
	}
?>