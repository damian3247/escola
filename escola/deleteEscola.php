<?php
require '../includes/conexion.php';

$queryDelete="DELETE FROM escolas where id_escola={$_POST['idEscolaDelete']}";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelescola.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();

?>