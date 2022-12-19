<?php require("classes/login.class.php") ?>
<?php
   if(isset($_POST['submit'])){

      $user = new LoginUser($_POST['email'], $_POST['password']);

   }
   if(isset($_POST['cadastro'])){
      header("location:  cadastro.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
   <title>Log in form</title>
</head>
<body>
   <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <h2>Log in formulário</h2>
      <h4>Todos os campos devem ser preenchidos</h4>
      <label>Email</label>
      <input type="email" name="email">
 
      <label>Password</label>
      <input type="password" name="password">
 
      <button type="submit" name="submit">Log in</button>
 
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>
      <button type="submit" name="cadastro">Cadastro</button>

   </form>
</body>
</html>