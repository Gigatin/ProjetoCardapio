<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try{
        $pdo = new PDO ("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
    } catch (PDOException $e){
        $msgErro = $e->getMessage();
    }
}
    public function cadastrar($nome, $email, $cpf, $telefone, $endereco, $senha)
    {
        global $pdo;
        global $msgErro;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else{
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, cpf, 
            telefone, endereco, senha) values (:n, :e, :c, :t, :en, :s)");
                              $sql->bindValue(":n",$nome);
                              $sql->bindValue(":e",$email);
                              $sql->bindValue(":c",$cpf);
                              $sql->bindValue(":t",$telefone);
                              $sql->bindValue(":en",$endereco);
                              $sql->bindValue(":s",md5($senha));
                              $sql->execute();  
                              return true;
        }


    }
    public function logar($email, $senha)
    {
        global $pdo;
        global $msgErro;
        $sql = $pdo ->prepare("SELECT id_usuario FROM usuarios WHERE email = :e and senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        }
        else
        {
            return false;
        }


    }
}


?>