<?php
//ìndice do proyeto, mostra os distintos acessos para cadastro e asignação de turma.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/css.php"; ?>
    <title>Escolher Cadastro</title>
</head>

<body class="bg-dark">
    <?php include "navbar.php"; ?>
    <div class="container ">
        <div class="row">
            <h1 class="text-light mx-auto">CADASTROS</h1>
        </div>
        <hr class="text-light">
        <div class="row">
            <div class="col-4 offset-2 border p-1 text-center">
                <a class="btn btn-info " href="escola/painelEscola.php">Cadastrar Escola</a>
            </div>
            <div class="col-4  border p-1 text-center">
                <a class="btn btn-info " href="turma/painelTurma.php">Cadastrar Turma</a>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-2 border p-1 text-center">
                <a class="btn btn-info " href="alunos/painelAluno.php">Cadastrar Aluno</a>
            </div>
            <div class="col-4 border p-1 text-center">
                <a class="btn btn-info " href="asignacao_turma_aluno/painel.php">Asignaçao Turma</a>
            </div>
        </div>

    </div>
</body>
<?php include "includes/script.php"; ?>

</html>