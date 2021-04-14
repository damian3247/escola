<?php
require '../includes/conexion.php';

$queryDelete="UPDATE alunos
                SET `nome_aluno`='{$_POST['nomeUpdate']}',
                    `telefone`={$_POST['telefoneUpdate']},
                    `email`='{$_POST['emailUpdate']}',
                    `data_nascimento`='{$_POST['dataNascimentoUpdate']}',
                    `genero`='{$_POST['generoUpdate']}'
                    WHERE id_aluno={$_POST['idAlunoUpdate']} ";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelAluno.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
