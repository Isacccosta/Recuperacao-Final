<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:  login.php"); exit();
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location:  login.php");
}
if(isset($_POST['reserve'])){
    header("location:  reserva.php"); 
}
if(isset($_POST['imprime'])){
    header("location:  imprime.php"); 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Usuario</title>
</head>
<body>
    <h1>Opções:</h1>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <p>
            <button type="submit" name="reserve">Faça sua Reserva aqui</button>
        </p>
    
        <p>
            <button type="submit" name="imprime">Veja Suas Reservas</button>
        </p>
        <p>
            <button>
            <a href=?logout>Logout</a>
            </button>
        </p>
 
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>
   </form>
</body>
</html>