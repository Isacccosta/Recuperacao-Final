<?php require("classes/register.class.php") ?>
<?php
   if(isset($_POST['submit'])){
      $user = new RegisterUser($_POST['password'], $_POST['email'], $_POST['name']);
   }
   if(isset($_POST['logar'])){
      header("location: login.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/style.css" rel="stylesheet">
   <title>CADASTRO</title>
</head>
<body>
     
   <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <h2>CADASTRO</h2>
      <h4>Todos os campos devem ser preenchidos</h4>

      <label>Email</label>
      <input type="email" name="email">

      <label>Name</label>
      <input type="text" name="name">

      <label>Password</label>
      <input type="password" name="password">
 
      <button type="submit" name="submit">Registre</button>
 
      <p class="error"><?php echo @$user->error ?></p>
      <p class="success"><?php echo @$user->success ?></p>
      <button type="submit" name="logar">Login</button>
   </form>
</body>
</html>