<?php
$con = mysqli_connect("localhost", "root", "", "colegio");
if(!$con) {
    die('No se establecio la conexion en el servidor. '. mysqli_Error());
}
$sql = "INSERT INTO maestro VALUES('$_POST[id]', '$_POST[nombre]', '$_POST[especialidad]', '$_POST[email]', '$_POST[telefono]')";
if(!mysqli_query($con, $sql, MYSQLI_USE_RESULT)){
    die('Error: '.mysqli_error($con));
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM alumno WHERE id='$id'";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "<center>";
    echo "Registro con ID $id eliminado<br>";
    echo "<a href='index.html'>Eliminar otro registro</a>";
} else {
    echo "ID no proporcionado.";
}

echo "<center>";
echo "1 registro agregado<br>";
echo "<a href='index.html'>Insertar registro</a>";
mysqli_close($con);
?>