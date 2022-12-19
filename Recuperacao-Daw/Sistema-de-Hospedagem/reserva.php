<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:  login.php"); exit();
}
if(isset($_GET['logout'])){
    session_destroy();
    header("location:  login.php"); exit();
}
?>
<?php require("classes/reserva.class.php") ?>
<?php
   if(isset($_POST['reserva'])){
      $chave = $_SESSION['user'];
      $reserva = new RegisterReservas($chave,$_POST['dateE'], $_POST['dateS'], $_POST['quartos'], $_POST['pessoas']);
   }
   if(isset($_POST['voltar'])){
    header("location:  index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Reserva</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <h2>Formulário de Reserva</h2>
      <h4>Todos os campos devem ser preenchidos<span></span></h4>
      <label>Data de Entrada</label>
      <input type="date" name="dateE">
      <p><label>Data de Saída</label>
      <input type="date" name="dateS"></p>
      <p><label>Número de quartos</label>
      <input type="number" name="quartos" min="1"></p>
      <p><label>Número de pessoas</label>
      <input type="number" name="pessoas" min="1"></p>
 
 
      <button type="submit" name="reserva">Reserve</button>
 
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>
      <p>
            <button type="submit" name="voltar"> Voltar </button>
        </p>
        <p>
            <button type="submit" name="submit">
            <a href=?logout>Logout</a>
            </button>
        </p>
    
   </form>

</html>