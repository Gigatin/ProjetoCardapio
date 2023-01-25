<?php require_once "conecta.php"?>

<?php 
	$id = $_POST['idproduto'];
	
	
	inserir($conexao,$id);
	
	function inserir($conexao,$id){
		$sql="DELETE FROM produtos  ";
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