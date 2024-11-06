<?php
// Conexión a la base de datos
$con = mysqli_connect("localhost", "root", "", "colegio");
if(!$con) {
    die('No se estableció la conexión en el servidor. '. mysqli_connect_error());
}

// Insertar registro
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['direccion']) && isset($_POST['fecha_registro'])) {
    // Sentencia preparada para evitar inyección SQL
    $stmt = $con->prepare("INSERT INTO alumno (id, nombre, edad, direccion, fecha_registro) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $_POST['id'], $_POST['nombre'], $_POST['edad'], $_POST['direccion'], $_POST['fecha_registro']);
    
    if ($stmt->execute()) {
        echo "<center>1 registro agregado<br>";
        echo "<a href='./index.html'>Insertar otro registro</a></center>";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }
    $stmt->close();
}

// Eliminar registro
if (isset($_POST['id_eliminar'])) {
    $id = $_POST['id_eliminar'];
    
    // Sentencia preparada para eliminar el registro por ID
    $stmt = $con->prepare("DELETE FROM alumno WHERE id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        echo "<center>Registro con ID $id eliminado<br>";
        echo "<a href='./index.html'>Eliminar otro registro</a></center>";
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }
    $stmt->close();
}

// Cerrar la conexión
mysqli_close($con);
?>
