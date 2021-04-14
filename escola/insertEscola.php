<?php
require '../includes/conexion.php';

$queryInsert="INSERT INTO escolas ( id_escola,
                                    nome_escola, 
                                    endereco, 
                                    situacao, 
                                    data) 
        values (    '{$_POST['idEscola']}',
                    '{$_POST['nomeEscola']}',
                     '{$_POST['endereco']}', 
                     '{$_POST['situacao']}', 
                     '{$_POST['data']}')";

if ($conn->query($queryInsert) === TRUE) {
    header('location:painelEscola.php');
} else {
    echo "Error: " . $queryInsert . "<br>" . $conn->error;
}

$conn->close();

?>