<!doctype html>
<html lang="en">
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
          <button type="button" class="btn btn-outline-light me-2">Meu Usuário</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>

  <div class="container bg-info-subtle p-5">
    <div class="row align-items-start">
      <div class="col-md-8">


        <div class="card">
            <div class="card-body ">
              <h5 class="card-title">Título</h5>
              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, nemo? Aspernatur consequuntur nam, voluptates sequi deleniti, natus excepturi accusantium, aliquam incidunt aut soluta eos temporibus molestiae reprehenderit odit voluptas tempora!.</p>
              <a href="#" class="btn btn-danger">Excluir</a>
            </div>
          </div>
        


      </div>
      
      
      <div class="col-md bg-success rounded">

          <form>
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
                <button class="btn btn-primary" type="submit">Criar Anotação</button>
              </div>

            </div> 
          </form>

      </div>
      </div>
    </div>
  </div>



      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          

</body>

</html>


<?php
    extract($_REQUEST);
    $file=fopen($_SERVER['DOCUMENT_ROOT'] . "/anotacoes/$titulo.txt","a");

    fwrite($file,"Título :");
    fwrite($file, $titulo ."\n");
    fwrite($file,"Anotação :");
    fwrite($file, $anotacao ."\n");
    fclose($file);

 ?>




