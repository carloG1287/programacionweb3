<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="estilos.css">

    <title>Bloc de Notas</title>
</head>

<body>
    <h1>Bloc de Notas</h1>

    <form method="POST">
        <label>Buscar archivo:</label>
        <input type="text" name="archivo">
        <input type="submit" value="Buscar">
    </form>

    <hr>

    <div style="float:left; width: 20%;">
        <h2>Archivos encontrados:</h2>
        <ul>
            <?php
            if (isset($_POST['archivo'])) {
                $archivos = glob("*" . $_POST['archivo'] . "*");
                foreach ($archivos as $archivo) {
                    echo "<li><a href=\"?archivo=" . basename($archivo) . "\">" . basename($archivo) . "</a></li>";
                }
            }
            ?>
        </ul>
    </div>

    <div style="float:right; width: 60%;">
        <h2>Contenido del archivo:</h2>
        <?php
        if (isset($_GET['archivo'])) {
            $archivo = $_GET['archivo'];
            if (file_exists($archivo)) {
                echo "<textarea style=\"width: 100%; height: 500px;\">" . file_get_contents($archivo) . "</textarea>";
            } else {
                echo "El archivo no existe.";
            }
        }
        ?>
    </div>

    <div style="clear:both;"></div>

    <hr>

    <form method="POST">
        <label>Nombre del archivo:</label>
        <input type="text" name="nombre">
        <br>
        <label>Contenido del archivo:</label>
        <br>
        <textarea name="contenido" style="width: 100%; height: 500px;"></textarea>
        <br>
        <input type="submit" value="Guardar">
    </form>

    <?php
    if (isset($_POST['nombre']) && isset($_POST['contenido'])) {
        $nombre = $_POST['nombre'];
        $contenido = $_POST['contenido'];
        file_put_contents($nombre, $contenido);
        echo "<p>Archivo guardado correctamente.</p>";
    }
    ?>

</body>

</html>