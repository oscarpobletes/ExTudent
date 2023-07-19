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
                        $query="SELECT expediente || ' ' || nombre || ' ' || apellido_paterno || ' ' || apellido_materno FROM exalumnos AS exalumno ORDER BY nombre";
                        $result = pg_query($conn, $query);

                        if(!$result){
                                echo "Error en la obtencion de datos";
                                exit;
                        }

                        $rows=pg_NumRows($result);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>BAJAS</title>
  </head>
<style>

                body {
                        background-color: orange;
                        color: white;
                        font-family: Arial, sans-serif;
                }

                label{
                font-size: 20px;
                }

                h1 {
                        font-size: 25px;
                        text-align: center;
                }

                select,input{
                font-size:15px;
                margin-bottom:10px;
                width:100%;
                padding: 5px;
                box-sizing: border-box;
                }

</style>
  <body>
    <h1>Bajas</h1>
    <form method="post" action="baja2.php">
      <label for="exalumno">Exalumno:</label>
      <select id="exalumno" name="exalumno">
        <option value="">Seleccionar...</option>
         <?PHP
                while ($row = pg_fetch_row($result)) {
                $exalumno = $row[0];
                echo "<option value=\"$exalumno\"> $exalumno";
                }
        ?>

      </select>
      <br><br>
      <input type="submit" value="Dar de baja">
    </form>
        <a href="index.html"><button type="button" style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>
  </body>
</html>