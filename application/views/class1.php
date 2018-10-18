<?php
/*
Ejemplo 1 de clases
en php se denota con la palabra class
- se puede crear variable, constructor
- funciones privadas, protegidas, publicas
- las clases pueden heredases de otras clases

**** Por nomentacura los nombres de las clases piempre 
comienzan con la primera letra en mayuscula

*/
class Carro{
	// Crear funcion encendido
	function encendido($param){
	  switch ($param){
		case 'On':
			$resp="Vehiculo prendido";
		break;

	default;
	case 'Off':
			$resp="Vehiculo apagado";
		break;

		}
		return $resp;
	}
}
// invocar la clase
$obj=new Carro;
// extraer un metodo de la clase
$encendido=$obj->encendido('On');
// imprimir resultado
echo "<h2>".$encendido."</h2>";