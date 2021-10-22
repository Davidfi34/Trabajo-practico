<?php 


abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase
{

    //Probar que si intento construir un empleado con el nombre vacío, lanza una excepción.
    public function testEmpleadoNombreVacio()
    {
    $this->expectException(\Exception::class);
    $emp = $this->crear('');

    }

    //Probar que si intento construir un empleado con el apellido vacío, lanza una excepción.
    public function testEmpleadoApellidoVacio()
    {
    $this->expectException(\Exception::class);
    $emp = $this->crear('nombre','');
    }

     //Probar que si intento construir un empleado con el dni vacío, lanza una excepción.
     public function testEmpleadoDniVacio()
     {
     $this->expectException(\Exception::class);
     $emp = $this->crear('nombre','apellido','');
     }
 
     //Probar que si intento construir un empleado con el salario vacío, lanza una excepción.
     public function testEmpleadoSalarioVacio()
     {
     $this->expectException(\Exception::class);
     $emp = $this->crear('nombre','apellido',123,'');
     }
 
    /*Probar que si intento construir un empleado cuyo DNI contenga letras o 
    caracteres no numéricos, lanza una excepción.*/
    public function testEmpleadoDniContieneLetras()
    {
      $this->expectException(\Exception::class);
      $emp = $this->crear('nombre','apellido',"aa");
    }

    /*Probar que si, al intentar construir un empleado, no se especifica el sector, el método getSector 
    debe devolver la cadena “No especificado”.*/
    public function testSectorNoEspecificado()
    {
     $emp = $this->crear("nombre","apellido",1234,100);
     $emp->setSector("No especificado");
     $this-> assertEquals("No especificado", $emp-> getSector());
    }

    
//Prueba de ejecucion de __toString() muestra un string con los datos de registro
public function testMustraLosDatos()
{
  $emp = $this->crear('nombre','apellido',1234,100);
  $this-> assertEquals('nombre apellido 1234 100', $emp->__toString());
}

}

?>