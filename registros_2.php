<?php

$conn = mysqli_connect('localhost', 'root', '', 'millon');

$start_time = microtime(true);
for ($i = 1; $i <= 100; $i++) {
    $query = "INSERT INTO tabla (temp, hum) VALUES ";
    for ($j = 1; $j <= 11000; $j++) {
        $temp = rand(0, 100);
        $hum = rand(0, 100);
        $campo1_ = $temp;
        $campo2_ = $hum;
        $query .= "('$campo1_', '$campo2_'),";
    }
    $query = rtrim($query, ',');
    mysqli_query($conn, $query);
}
$end_time = microtime(true);

echo "Tiempo de ejecución: " . ($end_time - $start_time) . " segundos";

?>