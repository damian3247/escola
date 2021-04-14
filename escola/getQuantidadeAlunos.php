<?php
require "../Includes/conexion.php";

$querySelect = "SELECT 
                id_escola_fk, COUNT(*) AS cantalunosxturmas
                FROM
                alunos_turmas atu
                    INNER JOIN
                turmas t ON atu.id_turma_fk = t.id_turma
                GROUP BY id_escola_fk
                HAVING id_escola_fk = {$_GET['idEscola']}
                ";
$result = $conn->query($querySelect);
if ($result->num_rows > 0) {
    $quantidade = $result->fetch_assoc();
    echo $quantidade['cantalunosxturmas'];
}
$conn->close();
