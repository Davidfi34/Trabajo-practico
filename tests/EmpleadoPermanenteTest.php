<?php
require_once "EmpleadoTest.php";

class EmpleadoPermanenteTest extends EmpleadoTest
{

   public function crear($nombre='',$apellido='',$dni = 123, $saldo = 11, $fechaIngreso = null)
    {
      $empPer = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$saldo,$fechaIngreso);
      return $empPer; 
    }

}


?>