<?php
require '../includes/conexion.php';

$queryDelete="DELETE FROM alunos_turmas where id_aluno_fk={$_POST['id_aluno']} and id_turma_fk={$_POST['id_turma']}";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painel.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
