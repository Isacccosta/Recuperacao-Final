<?php
class RegisterReservas{
   private $namechave;
   private $dataE;
   private $dataS;
   private $quartos;
   private $pessoas;
   public $error;
   public $success;
   private $storage = "json/reservas.json";
   private $stored_reservas; // array
   private $new_reserva; // array
   public function __construct($namechave, $dataE, $dataS, $quartos, $pessoas){
    $this->namechave = filter_var(trim($namechave), FILTER_SANITIZE_STRING);
    $this->dateE = filter_var(trim($dataE), FILTER_SANITIZE_STRING);
    $this->dateS = filter_var(trim($dataS), FILTER_SANITIZE_STRING);
    $this->quartos = filter_var(trim($quartos), FILTER_SANITIZE_STRING);
    $this->pessoas = filter_var(trim($pessoas), FILTER_SANITIZE_STRING);
    $this->stored_reservas = json_decode(file_get_contents($this->storage), true);
    $this->new_reserva= [
        "namechave" => $this->namechave,
        "dateE" => $this->dateE,
        "dateS" => $this->dateS,
        "quartos" => $this->quartos,
        "pessoas" => $this->pessoas
    ];
    if($this->checkFieldValues()){
        $this->insertReserva();
    }
}
 private function checkFieldValues(){
    if(empty($this->dateE) || empty($this->dateS) || empty($this->quartos)|| empty($this->pessoas)){
       $this->error = "Both fields are required.";
       return false;
    }else{
       return true;
    }
 }

 private function insertReserva(){
       array_push($this->stored_reservas, $this->new_reserva);
       if(file_put_contents($this->storage, json_encode($this->stored_reservas))){
          return $this->success = "Sua Reserva foi feita com sucesso";
       }else{
          return $this->error = "Algo deu errado, por favor tente novamente";
       }
    
 }
}



?>