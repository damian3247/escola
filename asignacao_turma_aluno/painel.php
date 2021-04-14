<?php
//Painel de asignação e exclução dos alunos em turmas.
require '../includes/conexion.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "../includes/css.php"; ?>
    <base href="../">
    <title>Painel aluno</title>
</head>

<body class="bg-light">
    <?php include "../navbar.php"; ?>
    <div class="container">
        <div class="row">
            <h2 class="mx-auto">Aluno</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2 border">
                <form action="asignacao_turma_aluno/insert.php" method="POST">
                    <div class="form-group">
                        <label for="idAluno">Nome aluno</label>
                        <select name="idAluno" id="idAluno" class="form-control">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idTurma">Turmas</label>
                        <select name="idTurma" id="idTurma" class="form-control">
                            
                        </select>
                    </div>
                    <button id="btnInsert" class="btn btn-warning d-flex justify-content-center">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 border">
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Id aluno</th>
                            <th>id turma</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $querySelect = "SELECT *
                                        FROM alunos_turmas atu 
                                        inner join turmas t 
                                        on atu.id_turma_fk=t.id_turma
                                        inner join alunos a
                                        on atu.id_aluno_fk=a.id_aluno
                                        ";
                        $result = $conn->query($querySelect);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $row["nome_aluno"]; ?></td>
                                    <td><?= $row["ano"].",".$row["nivel_ensino"].",".$row["serie"].",".$row["turno"].",".$row["id_escola_fk"]; ?></td>
                                   
                                    <td>
                                        <form action="asignacao_turma_aluno/delete.php" method="post">
                                            <input type="hidden" name="id_aluno" value="<?php echo $row["id_aluno_fk"]; ?>">
                                            <input type="hidden" name="id_turma" value="<?php echo $row["id_turma_fk"]; ?>">
                                            <button class="btn btn-danger">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    <?php include "../Includes/script.php"; ?>

    

<script>
    
    $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: "../escolas/turma/getTurmas.php",
                success: function(data) {
                    $('#idTurma').html(data);
                },
                error: function(data) {
                    alert("error con la requisição");
                },
            })
    });

    $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: "../escolas/alunos/getalunos.php",
                success: function(data) {
                    $('#idAluno').html(data);
                },
                error: function(data) {
                    alert("error con la requisição");
                },
            })
    });


    // $("#btnInsert").click(function(){
    //         $.ajax({
    //             type: "POST",
    //             url: "asignacao_turma_aluno/insert.php",
    //             data:{
    //                 idAluno: $("#idAluno").val(),
    //                 idTurma: $("#idTurma").val()
    //             },
    //             success: function(data) {
    //                 console.log(data);
    //                 if (data=="ok") {
    //                     alert("Aluno asignado"); 

    //                 }
    //                 else
    //                 {
    //                     alert(data);
    //                 }
                    
    //             },
    //             error: function(data) {
    //                 alert(data);
    //             },
    //         })
    // });
    
    </script>

</body>

</html>