<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
        }
        .container {
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Estadísticas</h2>
        <select id="estadisticas-selector" class="form-control mt-3">
            <option value="sexo">Estadísticas por Sexo</option>
            <option value="anho">Estadísticas por Año</option>
            <option value="generacion">Estadísticas por Generación</option>
        </select>
        <button id="ver-estadistica" class="btn btn-primary mt-3">Ver Estadística</button>
        <div id="estadisticas-container" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="estadisticasSexo.js"></script>
    <script>
        $(document).ready(function() {
            $('#ver-estadistica').click(function() {
                var seleccion = $('#estadisticas-selector').val();
                if (seleccion === 'sexo') {
                    cargarEstadisticaSexo();
                }
                // Agregar otras condiciones para 'anho' y 'generacion' si es necesario
            });
        });
    </script>
</body>
</html>

<?php
// Conexión a la base de datos y obtención de datos
$host_name = 'db5013217615.hosting-data.io';
$database = 'dbs11088995';
$user_name = 'dbu1506949';
$password = 'bd_pbs_peducativas';

$con = new mysqli($host_name, $user_name, $password, $database);

if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

$sql = "SELECT tab_curp FROM tab_prueba_valq";
$result = $con->query($sql);

$hombres = 0;
$mujeres = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $curp = $row['tab_curp'];
        if (strlen($curp) >= 11) {
            $sexo = $curp[10]; // La posición 11 en el CURP es el índice 10 en PHP (base 0)
            if ($sexo == 'H') {
                $hombres++;
            } else if ($sexo == 'M') {
                $mujeres++;
            }
        }
    }
}

$con->close();

// Pasar datos a JavaScript
echo "<script>
        var hombres = $hombres;
        var mujeres = $mujeres;
    </script>";
?>
