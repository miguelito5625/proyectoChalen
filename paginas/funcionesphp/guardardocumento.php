<?php
// Conexion a la base de datos
include('conexion.php');

$tipoDocumento = $_POST['tipoDocumento'];
$nombreVendedor = $_POST['nombreVendedor'];
$nombreComprador = $_POST['nombreComprador'];
$dpiVendedor = $_POST['dpiVendedor'];
$dpiComprador = $_POST['dpiComprador'];
$fecha = $_POST['fecha'];
$numEscritura = $_POST['numEscritura'];
$urlArchivo = $_POST['urlArchivo'];

$sql = "INSERT INTO documentos (tipo_documento, nombre_vendedor, nombre_comprador, dpi_vendedor, dpi_comprador, fecha, numero_escritura, url_archivo)
  VALUES ('$tipoDocumento', '$nombreVendedor', '$nombreComprador', '$dpiVendedor', '$dpiComprador', '$fecha', '$numEscritura', '$urlArchivo')";
  // use exec() sino espera que regresen resultados de la consulta
  $conn->exec($sql);
  echo "New record created successfully";

$conn = null;


