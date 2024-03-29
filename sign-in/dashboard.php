<?php

session_start();



if(!isset($_SESSION['usuario']) || (time() - 1800 >$_SESSION['hora']) ){
  session_unset();
  session_destroy();
  header('Location: index.php');
}



?>

<?php
      if(isset($_POST['titulo']) && isset($_POST['anotacao'])){
        $nome_arquivo = $_POST['titulo'];
        $conteudo = $_POST['anotacao']; 
        $arquivo = "./anotacoes/". $nome_arquivo .".txt";
        $texto = $conteudo;
        $arquivo_aberto = fopen($arquivo, 'a');

        if(fwrite($arquivo_aberto, $texto) === false){
            die("Não foi possivel escrever no arquivo");
        }
        fclose($arquivo_aberto);
        $arquivo_leitura = fopen($arquivo, 'r');
        $conteudo_arquivo_leitura = fread($arquivo_leitura, filesize($arquivo));
        fclose($arquivo_leitura);
      }
        if(isset($_POST['delete'])) {
        $path = "./anotacoes/";
        $arquivo = $path.$_POST['delete'];
        if(file_exists($arquivo)) {
            unlink($arquivo);
        }
      }
 ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
</head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Minhas Anotações</a></li>
        </ul>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2"><?php echo $_SESSION['usuario']?></button>
          <a href="logout.php">
            <button type="button" name="sair" class="btn btn-warning">Sair</button>
          </a>
          

        </div>
      </div>
    </div>
  </header>

  <div class="container bg-info-subtle p-5">
    <div class="row align-items-start">
      <div class="col-md-8">


        <div class="card">
            <div class="card-body">
              <h5 class="card-title">MINHAS ANOTAÇÕES</h5>
              <?php
                  $path = "./anotacoes/";
                  $diretorio = dir($path);
                  while ($arquivo = $diretorio->read()) {
                    if (str_contains($arquivo, '.txt')) {
                      $arquivo_aberto = fopen($path.$arquivo, 'r');
                      $anotacao = fread($arquivo_aberto, filesize($path . $arquivo)); 
                      fclose($arquivo_aberto);
                      echo '<div class="card-body bg-secondary-subtle rounded-2 m-1">';
                                  echo '<h1 class="card-title pricing-card-title">'. $arquivo .'</h1>';
                                  echo '<p>'. $anotacao.'</p>';
                                  echo '<form style="height:25px" method="post">';
                                  //anotacoes/delete
                                  echo '<input type="hidden" name="delete" value = "'. $arquivo .'">';
                                  echo '<div class="d-flex justify-content-end">';
                                  echo '<button type="submit" class="w-10 btn   btn-danger ">Excluir</button>';
                                  echo '</div>';
                                  echo '</form>';
                                  echo '<br>';
                                  echo '</div>';
                    }}
          ?>
            </div>
          </div>
        


      </div>
      
      
      <div class="col-md bg-success rounded">

          <form  class="form" method="post" action="">
            <div class="mb-3 position-relative top-50 start-50 translate-middle">
              
              <div class="form-floating mb-4">
                <input type="text" name="titulo" class="form-control" id="floatingInput" placeholder="" required/>
                <label for="floatingInput">Título</label>
              </div>

              <div class="form-floating mb-4">
                <textarea required class="form-control" name="anotacao" placeholder="Escreva aqui" id="floatingTextarea2" style="height: 150px; resize: none"></textarea>
                <label for="floatingTextarea2">Anotação</label>
              </div>
              
              <div class="d-grid">
                <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Criar Anotação</button>
              </div>

            </div> 
          </form>

      </div>
      </div>
    </div>
  </div>



      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          
    <img src="./anotacoes/" alt="">
</body>

</html>







