<?php
	class Validar{ 
		public $login;
		public $senha;
		
		function validacao($login, $senha){ 
			if(($login == "adm")&&($senha=="123")){
			header("Location:cadastrarP.php");	
				
				
			}
			else{
			header("Location:adm.php");
				
				
			}
		}
	}
	

	$obj=new Validar;
	$obj->validacao($_POST["login"],$_POST["senha"]);
	
	?>