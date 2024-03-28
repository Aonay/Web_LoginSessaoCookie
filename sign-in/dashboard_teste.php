<?php

session_start();



if(!isset($_SESSION['usuario']) || (time() - 10 >$_SESSION['hora']) ){
  session_unset();
  session_destroy();
  header('Location: index.php');
}




?>
 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>
  
 </body>
    <h1>DASHBOARD</h1>

 </html>