<?php
class LoginUser{
   // propridades
   private $email;
   private $password;
   public $error;
   public $success;
   private $storage = "json/users.json";
   private $stored_users;
    
   //metodos
   public function __construct($email, $password){
      $this->email = $email;
      $this->password = $password;
      $this->stored_users = json_decode(file_get_contents($this->storage), true);
      $this->login();
   }
 
   private function login(){
      foreach ($this->stored_users as $user) {
         if($user['email'] == $this->email){
            if(password_verify($this->password, $user['password'])){
               session_start();
               $_SESSION['user'] = $user['email'];
               header("location: index.php"); 
               return  $this->success = "Você Está Logado";
              
            }
         }
      }
      return $this->error = "Usuário ou senha errado(s)";
   }
}