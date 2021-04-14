<?php
require '../includes/conexion.php';

$queryInsert="INSERT INTO `alunos_turmas`( id_aluno_fk, id_turma_fk)
                values (
                        '{$_POST['idAluno']}', 
                        '{$_POST['idTurma']}'
                        )";


if ($conn->query($queryInsert) === TRUE) {
    //echo "ok";
    header("location:painel.php");
} else {
    echo "Error: " . $queryInsert . "<br>" . $conn->error;
}

$conn->close();
