<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "millon";

// Creación de la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificación de la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparación de la sentencia SQL para la inserción de datos
$sql = "INSERT INTO registros (campo1, campo2, campo3) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Generación de los datos a insertar (en este caso, un millón de registros aleatorios)
for ($i = 0; $i < 1000000; $i++) {
    $campo1 = $i;
    $campo2 = rand(1, 1000);
    $campo3 = rand(1, 1000);

    // Asignación de los valores de los parámetros de la sentencia preparada
    $stmt->bind_param("sii", $campo1, $campo2, $campo3);

    // Ejecución de la sentencia preparada
    $stmt->execute();
}

// Cierre de la conexión y del statement
$stmt->close();
$conn->close();
?>