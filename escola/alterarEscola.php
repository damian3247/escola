<?php
require '../includes/conexion.php';

$queryDelete="UPDATE escolas
                SET `nome_escola`='{$_POST['nomeEscolaUpdate']}',
                    `endereco`='{$_POST['enderecoUpdate']}',
                    `situacao`='{$_POST['situacaoUpdate']}',
                    `data`='{$_POST['dataUpdate']}'
                    WHERE id_escola={$_POST['idEscolaUpdate']} ";

if ($conn->query($queryDelete) === TRUE) {
    header('location:painelEscola.php');
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}

$conn->close();
