<?PHP
                        error_reporting(E_ALL);
                        ini_set('display_errors','On');
                        $host="127.0.0.1";
                        $port="5432";
                        $user="";
                        $password="";
                        $db="";
                        $strc="host=$host port=$port dbname=$db user=$user password=$password";
                        $conn = pg_Connect($strc);

                        if (!$conn){
                                echo "No hay conexión a la DB<br>\n";
                                echo "strc=$strc<br>\n";
                          exit;
                         }


                $nombre = $_POST['nombre'];
                $apellido_paterno = $_POST['apellido_paterno'];
                $apellido_materno = $_POST['apellido_materno'];
                $genero = $_POST['genero'];
                $expediente= $_POST['expediente'];
                $fecha_nacimiento = $_POST['fecha_nacimiento'];
                $correo_electronico = $_POST['correo_electronico'];
                $telefono = $_POST['telefono'];
                $nacionalidad = $_POST['nacionalidad'];
                $direccion = $_POST['direccion'];
                $id_carrera = $_POST['id_carrera'];
                $promedio_global = $_POST['promedio_global'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'];
                $laborando = isset($_POST['laborando']) && $_POST['laborando'] == 'true';
                $nombre_empresa = $_POST['nombre_empresa'];
                $cargo = $_POST['cargo'];
                $descripcion = $_POST['descripcion'];

        // Verificar si el expediente no está repetido
$query_expediente = "SELECT COUNT(*) FROM exalumnos WHERE expediente = '$expediente'";
$result_expediente = pg_query($conn, $query_expediente);
$count_expediente = pg_fetch_result($result_expediente, 0, 0);

if ($count_expediente > 0) {
    $mensaje = "El expediente $expediente ya está registrado";
} else {
    // Insertar datos en la tabla exalumnos
    $query_exalumnos = "INSERT INTO exalumnos (nombre, apellido_paterno, apellido_materno, genero, fecha_nacimiento, expediente, correo_electronico, telefono, nacionalidad, direccion) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$genero', '$fecha_nacimiento', '$expediente', '$correo_electronico', '$telefono', '$nacionalidad', '$direccion')";

    $result_exalumnos = pg_query($conn, $query_exalumnos);

    // Obtener el id del exalumno recién insertado
    $query_id = "SELECT currval(pg_get_serial_sequence('exalumnos', 'id_exalumno'))";
    $result_id = pg_query($conn, $query_id);
    $id_exalumno = pg_fetch_result($result_id, 0);

    // Insertar datos en la tabla historia
    $query_historia = "INSERT INTO historia (promedio_global, fecha_inicio, fecha_fin, laborando, nombre_empresa, cargo, descripcion, id_exalumno, id_carrera) VALUES ($promedio_global, '$fecha_inicio', '$fecha_fin', " . ($laborando ? 'true' : 'false'). " , '$nombre_empresa', '$cargo', '$descripcion', '$id_exalumno', '$id_carrera')";
    $result_historia = pg_query($conn, $query_historia);

    if ($result_exalumnos && $result_historia) {
        $mensaje = "Los datos se han insertado correctamente";
    } else {
        $mensaje = "Ha ocurrido un error al insertar los datos";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>ALTAS</title>
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
  <a href="alta.php"><button type="button"  style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>
</body>
</html>