<?php
require '../includes/conexion.php';

$queryDelete="DELETE FROM alunos where id_aluno={$_POST['id_aluno']}";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelAluno.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
