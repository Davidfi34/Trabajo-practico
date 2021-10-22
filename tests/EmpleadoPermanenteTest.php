<?php
require_once "EmpleadoTest.php";

class EmpleadoPermanenteTest extends EmpleadoTest
{

   public function crear($nombre='',$apellido='',$dni = 123, $saldo = 11, $fechaIngreso = null)
    {
      $empPer = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$saldo,$fechaIngreso);
      return $empPer; 
    }

    
//Probar que el método getFechaIngreso() funciona como se espera.
public function testVerificacionDeFechaIngreso()
{
  $this->expectException(\Exception::class);
  $empPer = $this->crear('nombre','apellido',1234 ,100,new \DateTime('2099-01-01'));

}


//Probar que el método calcularComision() funciona como se espera.
public function testCalcularComision()
{
  $empPer = $this->crear('nombre','apellido',1234,100,new \DateTime('2019-01-01'));
  $this->assertEquals("2%" ,$empPer->calcularComision());
}

//Probar que el método calcularIngresoTotal() funciona como se espera.
public function testCalcularIngresoTotal()
{
  $empPer = $this->crear('nombre','apellido',1234,100,new \DateTime('2010-01-01'));//2%
  $this->assertEquals(111 ,$empPer->calcularIngresoTotal());
}


//Probar que el método calcularAntiguedad() 
//funciona como se espera para un empleado con varios años de antigüedad.
public function testCalcularantiguedad()
{
  $empPer = $this->crear('nombre','apellido',1234,100,new \DateTime('2010-01-01'));
  $this->assertEquals(11 ,$empPer->calcularAntiguedad());
}


/*Probar que, si construyo un empleado sin proporcionar la fecha de ingreso, 
el método getFechaIngreso() retorna la fecha del día, y el método getAntiguedad retorna 0.*/
public function testRetornarFechaDiaYCeroDeAntiguedad()
{
  $empPer = $this->crear('nombre','apellido',1234 ,100,new \DateTime(''));
//  $this->assertEquals(new \DateTime(),$empPer->getFechaIngreso());
  $this->assertEquals(0,$empPer->calcularAntiguedad());
}

//Probar que, si construyo un empleado proporcionando una fecha 
//de ingreso posterior a la de hoy, lanza una excepción.
public function testVerificaSiLaFechaEsPosterioALaActual()
{
  $date = new \DateTime();
  $date->modify('+1 Day');
  $this->expectException(\Exception::class);
  $empPer = $this->crear('nombre','apellido',1234 ,100,$date);
}

}


?>