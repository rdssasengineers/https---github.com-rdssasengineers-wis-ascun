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
/**Fecha de carga del archivo base BPPCC */
date_default_timezone_set('America/Bogota');
$fecha = date('Y-m-d');
$hora  = date('H:i:s');
$fecha_upload = $fecha . ' ' . $hora;
$fecha_corte = $_POST['fecha_corte'];
$id = 1;
/**Borramos el contenido de la tabla para luego volcar los datos nuevos */
$sql = $pdo->prepare("TRUNCATE TABLE bppcc");
$sql->execute();
/**Actualizar la tabla logs */
$SQL = $pdo->prepare("UPDATE logs SET fecha_upload = :fecha_upload, fecha_corte = :fecha_corte WHERE id = :id");
$SQL->bindParam(':fecha_upload',$fecha_upload);
$SQL->bindParam(':fecha_corte',$fecha_corte);
$SQL->bindParam(':id',$id);
$SQL->execute();