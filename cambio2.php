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

    $expediente = $_POST['expediente'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $genero = $_POST['genero'];
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

    // Obtener el id del exalumno a partir del expediente
    $query_id = "SELECT id_exalumno FROM exalumnos WHERE expediente = '$expediente'";
    $result_id = pg_query($conn, $query_id);
    $id_exalumno = pg_fetch_result($result_id, 0);

    // Actualizar datos en la tabla exalumnos
    $query_exalumnos = "UPDATE exalumnos SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', genero='$genero', fecha_nacimiento='$fecha_nacimiento', correo_electronico='$correo_electronico', telefono='$telefono', nacionalidad='$nacionalidad', direccion='$direccion' WHERE id_exalumno=$id_exalumno";
    $result_exalumnos = pg_query($conn, $query_exalumnos);

    // Actualizar datos en la tabla historia
    $query_historia = "UPDATE historia SET promedio_global=$promedio_global, fecha_inicio='$fecha_inicio', fecha_fin='$fecha_fin',laborando=" . ($laborando ? "true" : "false") . ", nombre_empresa='$nombre_empresa', cargo='$cargo', descripcion='$descripcion', id_carrera='$id_carrera' WHERE id_exalumno=$id_exalumno";
    $result_historia = pg_query($conn, $query_historia);

    if ($result_exalumnos && $result_historia) {
        $mensaje = "Los datos se han actualizado correctamente";
    } else {
        $mensaje = "Ha ocurrido un error al actualizar los datos";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>CAMBIOS</title>
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
  <a href="cambio.php"><button type="button"  style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>
</body>
</html>