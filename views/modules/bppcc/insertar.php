<?php
define('SERVIDOR','localhost');
define('USUARIO','u506566286_ascun');
define('PASSWORD','>^LlRS@2hG');
define('BD','u506566286_wisascun');

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
    //echo "<script>alert('Conexión con exito a la base de datos');</script>";
}catch (PDOException $e){
    echo "<script>alert('error al conectar con la base de datos');</script>";
}



$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];
$d7 = $_POST['d7'];
$d8 = $_POST['d8'];
$d9 = $_POST['d9'];
$d10 = $_POST['d10'];

$sentencia = $pdo->prepare("INSERT INTO bppcc
      (nivel, transaccional, codigo_cuenta_contable, nombre_cuenta_contable, codigo_centro_costo, mombre_centro_costo, saldo_inicial, movimiento_debito, movimiento_credito, saldo_final) 
VALUES(:nivel, :transaccional, :codigo_cuenta_contable, :nombre_cuenta_contable, :codigo_centro_costo, :mombre_centro_costo, :saldo_inicial, :movimiento_debito, :movimiento_credito, :saldo_final)");

$sentencia->bindParam(':nivel',$d1);
$sentencia->bindParam(':transaccional',$d2);
$sentencia->bindParam(':codigo_cuenta_contable',$d3);
$sentencia->bindParam(':nombre_cuenta_contable',$d4);
$sentencia->bindParam(':codigo_centro_costo',$d5);
$sentencia->bindParam(':mombre_centro_costo',$d6);
$sentencia->bindParam(':saldo_inicial',$d7);
$sentencia->bindParam(':movimiento_debito',$d8);
$sentencia->bindParam(':movimiento_credito',$d9);
$sentencia->bindParam(':saldo_final',$d10);
$sentencia->execute();