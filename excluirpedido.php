<?php require_once "conecta.php"?>

<?php 
	$id = $_POST['idpedido'];
	
	
	deletar($conexao,$id);
	
	function deletar($conexao,$id){
		$sql="DELETE FROM pedido  ";
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