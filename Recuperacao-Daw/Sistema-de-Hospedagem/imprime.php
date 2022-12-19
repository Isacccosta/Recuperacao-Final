<?php require("classes/visualizarReserva.class.php") ?>

<?php

session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php"); exit();
}

    $chave = $_SESSION['user'];
    $user = new LoginReserva($chave);
if(isset($_POST['voltar'])){
        header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post"> 
        <button type="submit" name="voltar">Voltar</a></button>
    </form>
   
    
</body>
</html>