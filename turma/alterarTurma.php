<?php
require '../includes/conexion.php';

$queryDelete="UPDATE turmas
                SET `ano`='{$_POST['anoUpdate']}',
                    `nivel_ensino`='{$_POST['nivelEnsinoUpdate']}',
                    `serie`='{$_POST['serieUpdate']}',
                    `turno`='{$_POST['turnoUpdate']}',
                    `id_escola_fk`='{$_POST['idEscolaUpdate']}'
                    WHERE id_turma={$_POST['idTurmaUpdate']} ";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelTurma.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
