<?php
require '../includes/conexion.php';
//id_turma	ano	nivel_ensino fundamental ou medio	serie	turno	id_escola_fk

$queryInsert="INSERT INTO turmas (ano,nivel_ensino,serie,	turno,	id_escola_fk) 
                values ('{$_POST['ano']}', '{$_POST['nivelEnsino']}',
                    '{$_POST['serie']}', '{$_POST['turno']}', '{$_POST['idEscola']}')";

if ($conn->query($queryInsert) === TRUE) {
    header('location:painelturma.php');
} else {
    echo "Error: " . $queryInsert . "<br>" . $conn->error;
}

$conn->close();
