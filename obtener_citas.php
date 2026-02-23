<?php
include("conexion.php");

$sql = "SELECT fecha, COUNT(*) as total FROM citas GROUP BY fecha";
$result = $conn->query($sql);

$eventos = [];

while ($row = $result->fetch_assoc()) {

    $color = "green";

    if ($row['total'] >= 7) {
        $color = "red";
    }

    $eventos[] = [
        "title" => "Citas: " . $row['total'],
        "start" => $row['fecha'],
        "color" => $color
    ];
}

echo json_encode($eventos);
?>