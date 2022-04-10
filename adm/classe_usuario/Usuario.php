<?php

class Usuario{

    private $pdo; //Variavel será utilizada somente por esta classe
    public $msgErro = "";

    //Método para criar uma conexão com o banco de dados
    public function Conectar($dbname, $host, $usuario, $senha){
        global $pdo;

        try {
            $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            global $msgErro;
            $mgsErro = $e->getMessage();
        }
        

    }

    //Método para cadastrar usuarios no sistema
    public function Cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT id_user FROM usuarios WHERE email = :e"); //Seleciona o id do usuario para identificar se este já possui email cadastrado no sistema
        $sql->bindValue(":e", $email);
        $sql->execute();

        
        
        if($sql->rowCount() > 0){ //Se existir algum registro de email com a identificação do id do usuario, não será permitido o cadastro do mesmo email.
            return false;

        }else{
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();
            return true;

        }


    }

    //Método para logar no sistema
    public function login($email, $senha){
        global $pdo;

        //Antes de efetuar o login será necessário verificar se o email e senha do usuário estão cadastrados no sistema
        $sql = $pdo->prepare("SELECT id_user FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();


        if($sql->rowCount() > 0){

            $dado = $sql->fetch();
            session_start();//inicaializando uma sessão
            $_SESSION["id_user"] = $dado["id_user"]; //A variavel global de sessão guarda o id do usuario e então é feito o login no sistema
            return true; //Logado com sucesso

        }else{
            return false; //Não foi possivel logar no sistema
        }

    }

}