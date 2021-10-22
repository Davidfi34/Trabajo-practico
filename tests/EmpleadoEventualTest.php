<?php
require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest
{

   public function crear($nombre='',$apellido='',$dni = 123, $salario = 11,Array $monto = [])
    {
      $empEv = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$monto);
      return $empEv; 
    }
}


//vendor/bin/phpunit
?>