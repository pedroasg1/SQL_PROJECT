<?php
$con = mysqli_connect("localhost", "root", "", "colegio");
if (!$con) {
    die('No se estableció la conexión en el servidor. ' . mysqli_error($con));
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM alumno WHERE id='$id'";
    $sql = "DELETE FROM maestro WHERE id='$id'";
    $sql = "DELETE FROM colegiauras WHERE id='$id'";
    $sql = "DELETE FROM kardex WHERE id='$id'";



    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<center>";
    echo "Registro con ID $id eliminado<br>";
    echo "<a href='index.html'>Eliminar otro registro</a>";
    mysqli_close($con);
} else {
    echo "ID no proporcionado.";
}
?>
