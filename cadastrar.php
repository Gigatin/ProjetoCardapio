<?php
    require_once 'CLASSES/usuarios.php';
    $us = new Usuario();
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
    <h1>Registrar-se</h1>
    <input type="text" name="nome" placeholder="Nome Usuário" maxlength="30">
    <input type="email" name="email"  placeholder="Email" maxlength="40">
    <input type="text" name="cpf"  placeholder="Cpf" maxlength="14">
    <input type="text" name="telefone"  placeholder="Telefone " maxlength="30">
    <input type="text" name="endereco"  placeholder="Endereço" maxlength="50">
    <input type="password" name="senha"  placeholder="Senha" maxlength="32">
    <input type="password" name="senhaconf"  placeholder="Confirmar Senha" maxlength="32">
    <input type="submit" value="Confirmar">
    <a href="index.php"><strong>Voltar a tela de login</strong>
    </form>
</div> 

<?php
if(isset($_POST['nome']))
{
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $cpf = addslashes($_POST['cpf']);
        $telefone = addslashes($_POST['telefone']);
        $endereco = addslashes($_POST['endereco']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['senhaconf']);
        
        
        if(!empty($nome) && !empty($email) && !empty($cpf) && !empty($telefone) &&
         !empty($endereco) && !empty($senha) && !empty($confirmarSenha)){
            $us->conectar("trabalho_ead","localhost","root","");
            if($us->msgErro == "")
            {
                    if($senha == $confirmarSenha)
                    {
                       if($us->cadastrar($nome, $email, $cpf, $telefone, $endereco, $senha))
                       {
                           ?>
                           <div id="sucesso">
                             "cadastrado com sucesso!"
                            </div>
                            <?php
                       }else
                       {
                           ?>
                            <div id="error">
                             "email já cadastrado!"
                            </div>
                          <?php
                       }
                    }
                    else{
                        ?>
                        <div id="error">
                         "Senha está diferente do confirmar senha, confira se está certo"
                        </div>
                      <?php
                       
                    }
                   
            }
            else{
                ?>
                <div id="error">
              <?php  echo "Erro: ".$us->msgErro; ?>
                </div>
              <?php
               
            }
         }
         else{
            ?>
            <div id="error">
             "Não deixe campos vazios!"
            </div>
          <?php
            

         }
}

?>
</body>
</html>