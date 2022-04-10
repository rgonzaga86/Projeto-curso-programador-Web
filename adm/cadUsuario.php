<?php
  require_once "classe_usuario/Usuario.php";
  //Instanciando a classe Usuario e criando o objeto $u
  $u = new Usuario();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" style="background-color: #9A616D;">
<div class="container">
  <h2>Preencha o Formulário</h2><hr>
      <form method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nome do Usuário</label>
          <input type="text" class="form-control" name="nome" id="exampleInputEmail1">
          
          <label for="exampleInputEmail1" class="form-label">Telefone</label>
          <input type="text" class="form-control" name="telefone" id="exampleInputEmail1">

          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Senha</label>
          <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirmar Senha</label>
          <input type="password" class="form-control" name="confSenha" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="submit" class="btn btn-primary">Voltar</button>

        
      </form>

<?php
  //Verifica se o botão foi clicado
  if(isset($_POST["nome"])){
    $nome = addslashes($_POST["nome"]);
    $telefone = addslashes($_POST["telefone"]);
    $email = addslashes($_POST["email"]);
    $senha = addslashes($_POST["senha"]);
    $confSenha = addslashes($_POST["confSenha"]);

    //Verifica se os campos é diferente de vazio
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)){
      
      $u->Conectar("dblogin", "localhost", "root", "");

          if($u->msgErro == ""){
            
            if($senha == $confSenha){
              
                if($u->Cadastrar($nome, $telefone, $email, $senha)){
?>
                    <div class="alert alert-success mt-2" role="alert">
                        Cadastrado com sucesso! <a href="index.php" class="alert-link"> Acesse para entrar!</a>
                    </div>
                    
                <?php
                }else{
                ?>
                    <div class="alert alert-warning mt-2" role="alert">
                        Email já cadastrado!
                    </div>
                    

          <?php
                  }

            }else{

          ?>
              <div class="alert alert-warning mt-2" role="alert">
                    Senha e Confirmar Senha não correspondem!
              </div>
              

          <?php
            }
          
            
          }else{
          ?>
            <div class="alert alert-danger mt-2" role="alert">
                <?php echo "Erro " . $u->msgErro; ?>
            </div>
            
    <?php
          }
    }else{
    ?>

      <div class="alert alert-warning mt-2" role="alert">
          Preencha todos os campos!

      </div>      

  <?php
    }

  }

  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>