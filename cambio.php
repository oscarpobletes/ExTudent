<!DOCTYPE html>
<html>
<head>
        <title>CAMBIOS</title>
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
                label {
                        font-size: 20px;
                }
                select, input,textarea {
                        font-size: 15px;
                        margin-bottom: 10px;
                        width: 100%;
                        padding: 5px;
                        box-sizing: border-box;
                }

        </style>
</head>
<body>
        <h1>Cambios</h1>
        <form method="post" action="cambio2.php">
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

                        $query="SELECT * FROM CARRERA";
                        $result=pg_Exec($conn,$query);

                        if(!$result){
                                echo "Error en la obtencion de datos";
                                exit;
                        }

                        $rows=pg_NumRows($result);

                        ?>

                <label>Expediente:</label>
                <select name="expediente" required>
                <option value="">Seleccionar...</option>
                  <?php
                        // Obtener la lista de expedientes desde la base de datos
                        $query_expedientes = "SELECT expediente FROM exalumnos";
                        $result_expedientes = pg_query($conn, $query_expedientes);

                        // Crear una opción por cada expediente
                        while ($row = pg_fetch_assoc($result_expedientes)) {
                        $expediente = $row['expediente'];
                        echo "<option value=\"$expediente\">$expediente</option>";
                        }
                 ?>
                </select>

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" name="apellido_paterno" required>
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" name="apellido_materno" required>
                <label for="genero">Género:</label>
                <select name="genero">
                        <option value="">Seleccionar...</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                </select>
                <label for="expediente">Expediente (ej. a00123456):</label>
                <input type="text" name="expediente" required>
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" required>
                <label for="correo_electronico">Correo electrónico:</label>
                <input type="email" name="correo_electronico" required>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" required>
                <label for="nacionalidad">Nacionalidad:</label>
                <select name="nacionalidad" required>
                        <option value="">Seleccionar...</option>
                        <option value="Alemania">Alemania</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Australia">Australia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="España">España</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Francia">Francia</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Italia">Italia</option>
                        <option value="Japón">Japón</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="México">México</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Otra">Otra</option>

                </select>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" required>

                  <label for="carrera">Carrera:</label>
                <select name="id_carrera" id="id_carrera" required>
                <option value="">Seleccionar...</option>
                <?PHP

                for($i=0; $i<$rows; $i++){

                $id_carrera=pg_Result($result, $i, "id_carrera");

                $nombre_carrera=pg_Result($result, $i, "nombre_carrera");

                echo "<option value=\"$id_carrera\"> $id_carrera | $nombre_carrera\n";

                }//for

                ?>

                 </select>

                <label for="promedio">Promedio global:</label>
                <input type="number" id="promedio_global" name="promedio_global" min="6" max="10" step="0.1" value="6.0" required>

                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" required>

                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" required>

                <label>¿Laborando?</label>
                <div style="display: flex; align-items: center; margin-top: 7px;">
                  <label><input type="checkbox" name="laborando" value="true"></label>
                </div>


                <label for="nombre_empresa">Nombre de la empresa:</label>
                <input type="text" name="nombre_empresa" id="nombre_empresa">

                 <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" id="cargo">

                 <label for="descripcion">Descripción:</label>
                 <textarea name="descripcion" id="descripcion" rows="4"></textarea>

                <input type="submit" value="Guardar">
        </form>
        <a href="index.html"><button type="button" style="width: 100%; font-size: 15px; text-align: center; padding: 5px;">Regresar</button></a>

</body>
</html>