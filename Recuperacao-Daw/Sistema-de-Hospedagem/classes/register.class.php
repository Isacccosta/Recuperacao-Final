<?php
class RegisterUser{
   //propriedades da classe
   private $name;
   private $email;
   private $raw_password;
   private $encrypted_password;
   public $error;
   public $success;
   private $storage = "json/users.json";
   private $stored_users; // array
   private $new_user; // array
   public function __construct($password, $email, $name ){
    $this->name = filter_var(trim($name), FILTER_SANITIZE_STRING);
    $this->email = filter_var(trim($email), FILTER_SANITIZE_STRING);
    $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
    $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $this->stored_users = json_decode(file_get_contents($this->storage), true);
    $this->new_user = [
        "name" => $this->name,
        "email" => $this->email,
        "password" => $this->encrypted_password,
    ];
    if($this->checkFieldValues()){
        $this->insertUser();
 }
}

//valida se os campos de entrada de nome de usuário e senha não estão vazios.
 private function checkFieldValues(){
    if(empty($this->name) || empty($this->email) || empty($this->raw_password)){
       $this->error = "Both fields are required.";
       return false;
    }else{
       return true;
    }
 }
//percorre todos os usuários armazenados e verifica se o nome de usuário que foi recebido já existe ou não. 
 private function usernameExists(){
    foreach ($this->stored_users as $user) {
       if($this->email == $user['email']){
          $this->error = "Email Já Cadastrado";
          return true;
       }
    }
 }
//gravará o usuário no arquivo JSON
 private function insertUser(){
    if($this->usernameExists() == FALSE){
       array_push($this->stored_users, $this->new_user);
       if(file_put_contents($this->storage, json_encode($this->stored_users))){
          return $this->success = "Seu cadastro foi realizado com sucesso, agora você pode logar em nosso site";
       }else{
          return $this->error = "Algo deu errado, por favor tente novamente";
       }
    }
 }
}



?>