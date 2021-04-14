<?php
require '../includes/conexion.php';

$queryInsert="INSERT INTO `alunos`( `nome_aluno`, `telefone`, `email`, `data_nascimento`, `genero`)
                values (
                        '{$_POST['nome']}', 
                        '{$_POST['telefone']}',
                        '{$_POST['email']}', 
                        '{$_POST['dataNascimento']}',
                        '{$_POST['genero']}'
                        )";


if ($conn->query($queryInsert) === TRUE) {
    header('location:painelAluno.php');
} else {
    echo "Error: " . $queryInsert . "<br>" . $conn->error;
}

$conn->close();
