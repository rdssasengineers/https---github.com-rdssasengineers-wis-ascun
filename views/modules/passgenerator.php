<?php
$respuesta = passgenerator(3, TRUE, TRUE, TRUE,FALSE);
function passgenerator($longitud, $opcLetra, $opcNumero, $opcMayus, $opcEspecial) {
  $letras ="abcdefghijklmnopqrstuvwxyz";
  $numeros = "1234567890";
  $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $especiales ="|@#~$%()=^*+[]{}-_";
  $listado = "";
  $password = "";
  if ($opcLetra == TRUE) $listado .= $letras;
  if ($opcNumero == TRUE) $listado .= $numeros;
  if($opcMayus == TRUE) $listado .= $letrasMayus;
  if($opcEspecial == TRUE) $listado .= $especiales;
  $array = array("W", "I", "S");
  for( $i=1; $i<=$longitud; $i++) {
    $caracter =$array[$i-1]. $listado[rand(0,strlen($listado)-1)];
      $password.=$caracter;
    $listado = str_shuffle($listado);
  }
  return $password;
}

  echo $respuesta;