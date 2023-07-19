<?PHP
        error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  $host = "127.0.0.1";
  $port = "5432";
  $user = "";
  $password = "";
  $db = "";

  $strc = "host=$host port=$port dbname=$db user=$user password=$password";
  $conn = pg_Connect($strc);

  if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.\n";
    exit;
  }

  $query = "SELECT exalumnos.expediente, exalumnos.nombre, exalumnos.apellido_paterno, exalumnos.apellido_materno, carrera.nombre_carrera, carrera.facultad, historia.promedio_global, exalumnos.genero,
            DATE_PART('year', AGE(CURRENT_DATE, exalumnos.fecha_nacimiento)) AS edad, exalumnos.correo_electronico, exalumnos.nacionalidad, exalumnos.direccion, historia.laborando,
            historia.cargo, historia.descripcion
            FROM exalumnos
            JOIN historia ON historia.id_exalumno = exalumnos.id_exalumno
            JOIN carrera ON carrera.id_carrera = historia.id_carrera";

  $result = pg_query($conn, $query);

  if (!$result) {
    echo "Error de consulta.\n";
    exit;
  }
      $rows=pg_NumRows($result);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>CONSULTAS</title>
  <style>
    body {
     background-color: orange;
     color: white;
     font-family: Arial, sans-serif;
    }

    h1 {
      font-size: 25px;
      text-align: center;
      }

    table {
      border: 2px solid white;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
        font-size:12px;
      color: white;
      background-color: orange;
      width: 100%;
      margin: auto;
    }

    table td, table th {
      border: 2px solid white;
      padding: 1px;
      text-align:center;
    }

 </style>
</head>
<body>
  <h1>Consultas</h1>
  <table>
    <tr>
      <th>Expediente</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Carrera</th>
      <th>Facultad</th>
      <th>Promedio global</th>
      <th>Género</th>
      <th>Edad</th>
      <th>Correo electrónico</th>
      <th>Nacionalidad</th>
      <th>Dirección</th>
      <th>Trabajando</th>
      <th>Cargo</th>
      <th>Descripción</th>
    </tr>
    <?php while ($row = pg_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['expediente']; ?></td>
      <td><?php echo $row['nombre']; ?></td>
      <td><?php echo $row['apellido_paterno'] . ' ' . $row['apellido_materno']; ?></td>
      <td><?php echo $row['nombre_carrera']; ?></td>
      <td><?php echo $row['facultad']; ?></td>
      <td><?php echo $row['promedio_global']; ?></td>
      <td><?php echo $row['genero']; ?></td>
      <td><?php echo $row['edad']; ?></td>
      <td><?php echo $row['correo_electronico']; ?></td>
      <td><?php echo $row['nacionalidad']; ?></td>
      <td><?php echo $row['direccion']; ?></td>
      <td>
    <?php
        if ($row['laborando'] == 't') {
            echo 'Sí';
        } else {
            echo 'No';
        }
    ?>
      </td>
      <td><?php echo $row['cargo']; ?></td>
  <td><?php echo $row['descripcion']; ?></td>
</tr>
<?php } ?>
  </table>
        <a href="index.html"><button type="button" style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>
</body>
</html>