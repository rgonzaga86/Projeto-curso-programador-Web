<?php
  require_once "classe_usuario/Usuario.php";
  $u = new Usuario;

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Acesso</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
    

   
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>
  <section class="vh-0" style="background-color: #9A616D;">
  <div class="container py-5 h-0">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 0rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
 <body class="text-center">
    
<main class="form-signin">
  <form method="POST">
    <!--<img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->

    <h1 class="h3 mb-3 fw-normal">Login</h1>
    <img src="./img.jpeg" alt="50x50" class="rounded-circle">

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Seu e-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>
 
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    

    <div class="mt-3">
      <label>
        Não é inscrito? <a href="cadUsuario.php"> Cadastre-se!</a>
        <a href="../index.html" class="btn btn-primary">HOME</a>
      </label>
    </div>
    <a href="#!" class="small text-muted">@Thinkall Servios Web</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2021–2022</p>
    
  </form>
  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
    if(isset($_POST["email"])){
      $email = addslashes($_POST["email"]);
      $senha = addslashes($_POST["senha"]);

      $u->Conectar("dblogin", "localhost", "root", "");
      if($u->msgErro == ""){

        if(!empty($email) && !empty($senha)){

        if($u->login($email, $senha)){
          header("Location: areaPrivada.php");

        }else{
          echo "Email e/ou senha estão incorretos!";
        }
        
      }else{
        echo "Erro - " . $u->msgErro;
      }

      }else{
        echo "Preencha todos os campos!";
      }
    }

    

  ?>
</main>


    
  </body>
</html>
