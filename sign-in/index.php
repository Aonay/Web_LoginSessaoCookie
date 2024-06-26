<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Login Anotações</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      img{
        border-radius: 50%;
      }
      body{
        background-image: url("../assets/brand/backnotas.jpg");
        background-size: cover;
      }
      .fundologin{
        background-color: rgba(209, 226, 245, 0.945);
        border: none;
        padding: 10px;
        border-radius: 10px;

      }

      

    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  
  <div class="fundologin">

    <form method="post" action="#">
      <img class="mb-4" src="../assets/brand/logonovo.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 fw-normal">Use seu e-mail para entrar</h1>
  
      <div class="form-floating">
        <input type="email" class="form-control" name="txtEmail" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="txtSenha" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Senha</label>
      </div>
  
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="lembrar" value="remember-me"> Lembrar email
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>

  </div>
 
</main>


    
  </body>
</html>

<?php

if($_POST){
  $email = $_POST['txtEmail'];
  $senha = $_POST['txtSenha'];
  
  if(isset($_POST['lembrar'])){
    setcookie('login_email',$email,time()+(8400*30));
  }
}


session_start();
 
if(isset($_POST['txtEmail'],$_POST['txtSenha'])){
  if($email=='usuario@email.com' && $senha=='senha123'){
      $_SESSION['usuario']=$email;
      $_SESSION['hora']=time();
      header('Location: dashboard.php');
  }else{
    echo "<script>alert('Usuário e/ou senha inválido(s), Tente novamente!');</script>";
  }
}

?>
