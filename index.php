<?php
require_once 'CLASSES/usuarios.php';
$us = new Usuario;
?>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Cardapio</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>

<body>
<div id="a">
    
    <form method="POST">
    <h1>Login Cardapio</h1>
    <input type="email" placeholder="email" name="email">
    <input type="password" placeholder="Senha" name="senha">
    <input type="submit" value="Confirmar">
    <a href="cadastrar.php"><strong>Cadastrar-se</strong>
    <a href="adm.php"><strong>Se for vendedor clique aqui</strong> </a>
    </form>
</div> 


<?php
if(isset($_POST['email']))
{
      
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
       
        $us->conectar("trabalho_ead","localhost","root","");
        if($us->msgErro == "")
        {
        if(!empty($email) && !empty($senha))
        {
           if($us->logar($email, $senha))
           {
            header("location: areapriva.php");
 }
           else{
            ?>
            <div id="error">
             Senha ou email estão incorretos!
            </div>
          <?php
          

           }
        }
        else{
            ?>
            <div id="error">
            <?php  echo "Erro: não encontrado no banco ".$us->msgErro; ?>

            </div>
          <?php
            
        }
        }else{
            ?>
            <div id="error">
            Falta preencher algum campo
            </div>
          <?php
            

        }
    }
    

?>

</body>
</html>