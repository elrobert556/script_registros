<?php

$conn = mysqli_connect('localhost', 'root', '', 'millon');

$start_time = microtime(true);
for ($i = 1; $i <= 100; $i++) {
    $query = "INSERT INTO tabla (campo1, campo2, campo3) VALUES ";
    for ($j = 1; $j <= 11000; $j++) {
        $index = rand(0, 100);
        $campo1_ = "campo1_" . $index;
        $campo2_ = "campo2_" . $index;
        $campo3_ = "campo3_" . $index;
        $query .= "('$campo1_', '$campo2_', '$campo3_'),";
    }
    $query = rtrim($query, ',');
    mysqli_query($conn, $query);
}
$end_time = microtime(true);

echo "Tiempo de ejecución: " . ($end_time - $start_time) . " segundos";

?>