<?php
require_once 'EmpleadoTest.php';

class EmpleadoEventualTest extends EmpleadoTest
{

   public function crear($nombre='',$apellido='',$dni = 123, $salario = 11,Array $monto = [])
    {
      $empEv = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$monto);
      return $empEv; 
    }


//Probar que el método calcularComision() funciona como se espera.  
public function testCalcularComision()
{
  $empEv = $this->crear('nombre','apellido',1234,3,[25,30,50]);
  $this-> assertEquals(1.75, $empEv->calcularComision());
}


//Probar que el método calcularIngresoTotal() funciona como se espera.
public function testCalcularIngresoTotal()
{
  $empEv = $this->crear('nombre','apellido',1234,3,[25,30,50]);
  $this-> assertEquals(4.75, $empEv->calcularIngresoTotal());
}


/*Probar que si intento construir un empleado proporcionando algún monto 
de venta negativo o cero, lanza una excepción.*/
public function testMontoDeVentaNegativoOenCero()
{
  $this->expectException(\Exception::class);
  $empEv = $this->crear('nombre','apellido',1234,100,[-25,-30,-50,0]);
}


}


//vendor/bin/phpunit
?>