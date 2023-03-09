<?php
// Verifica si se recibió una nota a través del formulario
if (isset($_POST['nota'])) {
    // Captura la nota del formulario
    $nota = $_POST['nota'];

    // Genera un nombre de archivo único basado en la fecha y hora
    $nombre_archivo = date('Y-m-d_H-i-s') . '.txt';

    // Abre el archivo de notas en modo de escritura
    $archivo = fopen($nombre_archivo, "w");

    // Escribe la nota en el archivo y cierra el archivo
    fwrite($archivo, $nota);
    fclose($archivo);
}

// Redirecciona al usuario a la página principal
header("Location: index.php");
exit();
?>

.