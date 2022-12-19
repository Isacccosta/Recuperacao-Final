<?php
class LoginReserva{
   //propriedades
   private $namechave;
   public $error;
   public $success;
   private $storage = "json/reservas.json";
   private $stored_visualizacao;
   private $_reservas; // array
   public $dateE;
   //metodos
   public function __construct($namechave){
      $this->namechave = $namechave;
      $this->stored_visualizacao = json_decode(file_get_contents($this->storage), true);
      $this->visualizaReserva();
   }
 
   private function visualizaReserva(){
      echo "<b>Reservas</b><br/>" ;
      foreach ($this->stored_visualizacao as $visualizacao) {
         if($visualizacao['namechave'] == $this->namechave){
            $dateE = $visualizacao [ 'dateE' ] ;
            $dateS = $visualizacao [ 'dateS' ] ;
            $quartos = $visualizacao [ 'quartos' ] ;
            $pessoas = $visualizacao [ 'pessoas' ] ;
            echo " data entrada: $dateE | data saída: $dateS | quartos: $quartos | n° de pessoas:$pessoas</p><br/>" ;
         }
      }
   }
   
} 