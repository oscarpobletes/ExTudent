<?PHP
error_reporting(E_ALL);
ini_set('display_errors','On');

$host = "127.0.0.1";
$port = "5432";
$user = "";
$password = "";
$db = "";
$strc = "host=$host port=$port dbname=$db user=$user password=$password";
$conn = pg_connect($strc);

if (!$conn) {
    echo "No hay conexión a la DB<br>\n";
    echo "strc=$strc<br>\n";
    exit;
}

$exalumno = $_POST['exalumno'];

// Primero eliminamos los registros relacionados en la tabla "historia"
$query_historia = "DELETE FROM historia WHERE id_exalumno IN (SELECT id_exalumno FROM exalumnos WHERE expediente || ' ' || nombre || ' ' || apellido_paterno || ' ' || apellido_materno = '$exalumno')";
$result_historia = pg_query($conn, $query_historia);

// Luego eliminamos el registro en la tabla "exalumnos"
$query_exalumnos = "DELETE FROM exalumnos WHERE expediente || ' ' || nombre || ' ' || apellido_paterno || ' ' || apellido_materno = '$exalumno'";
$result_exalumnos = pg_query($conn, $query_exalumnos);

if ($result_exalumnos) {
    $mensaje = "El exalumno se ha dado de baja correctamente";
} else {
    $mensaje = "Error al dar de baja al exalumno";
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>BAJAS</title>
  <style>
    body {
      background-color: orange;
      font-family: Arial;
      color:white;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <div><?php echo $mensaje ?></div>
  <a href="baja.php"><button type="button"  style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>
</body>
</html>