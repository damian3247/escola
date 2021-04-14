<?php
require '../includes/conexion.php';

$queryDelete="DELETE FROM turmas where id_turma={$_POST['idTurma']}";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelTurma.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
