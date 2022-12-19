<?php
if(isset($_POST['cadastro'])){
    header("location: cadastro.php"); 
}
if(isset($_POST['logar'])){
    header("location: login.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Seja Bem Vindo</title>
</head>
<body>
    <h1>Seja Bem Vindo ao Hotel Hilbert</h1>
      <div>
      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <p><button type="submit" name="cadastro" method = "post">Cadastro</button>
        </p>
        <p>
        <button type="submit" name="logar">Login</button>
        </p>
      </form>
      
      </div>
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>

</body>
</html>