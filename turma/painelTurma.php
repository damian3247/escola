<?php
//Painel de cadastro, edição, exclução e listado das turmas
require '../includes/conexion.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "../includes/css.php"; ?>
    <base href="../">
    <title>Painel turma</title>
</head>

<body class="bg-light">
    <?php include "../navbar.php"; ?>
    <div class="container">
        <div class="row">
            <h2 class="mx-auto">Turma</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2 border">
                <form action="turma/insertTurma.php" method="post">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="number" class="form-control" name="ano" id="ano">
                    </div>
                    <div class="form-group">
                        <label for="nivelEnsino">nivelEnsino</label>
                        <!-- <input type="text" class="form-control" name="nivelEnsino" id="nivelEnsino"> -->
                        <select class="form-control" name="nivelEnsino" id="nivelEnsino">
                            <option value="Fundamental">Fundamental</option>
                            <option value="Medio">Medio</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serie">serie</label>
                        <input type="text" class="form-control" name="serie" id="serie">
                    </div>
                    <div class="form-group">
                        <label for="turno">Turno</label>
                        <!-- <input type="text" class="form-control" name="turno" id="turno"> -->
                        <select class="form-control" name="turno" id="turno">
                            <option value="Manha">Manha</option>
                            <option value="Tarde">Tarde</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idEscola">Escola</label>
                        <select name="idEscola" id="idEscola" class="form-control">
                            <option value="1">master</option>
                            <option value="2">Isaac</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning d-flex justify-content-center">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Ano</th>
                            <th>Nivel de ensino</th>
                            <th>Serie</th>
                            <th>Turno</th>
                            <th>Escola</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $querySelect = "SELECT * FROM turmas";
                        $result = $conn->query($querySelect);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $row["id_turma"]; ?></td>
                                    <td><?php echo $row["ano"]; ?></td>
                                    <td><?php echo $row["nivel_ensino"]; ?></td>
                                    <td><?php echo $row["serie"]; ?></td>
                                    <td><?php echo $row["turno"]; ?></td>
                                    <td><?php echo $row["id_escola_fk"]; ?></td>
                                    <td>


                                        <button data-id-turma="<?= $row["id_turma"]; ?>" data-ano="<?= $row["ano"]; ?>" data-nivel-ensino="<?= $row["nivel_ensino"]; ?>" data-serie="<?= $row["serie"]; ?>" data-turno="<?= $row["turno"]; ?>" data-escola="<?= $row["id_escola_fk"]; ?>" class="btn btn-warning btnAlterar" data-toggle="modal" data-target="#modalAlterar">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>

                                    </td>
                                    <td>
                                        <form action="turma/deleteTurma.php" method="post">
                                            <input type="hidden" name="idTurma" value="<?php echo $row["id_turma"]; ?>">
                                            <button class="btn btn-danger">X</button>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalAlterar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar Turma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="turma/alterarTurma.php" method="post">
                        <div class="form-group">
                            <label for="idTurmaUpdate">id turma</label>
                            <input type="text" class="form-control" id="idTurmaUpdate" disabled>
                            <input type="hidden" class="form-control" name="idTurmaUpdate" id="idTurmaUpdateHidden">
                        </div>
                        <div class="form-group">
                            <label for="anoUpdate">Ano</label>
                            <input type="number" class="form-control" name="anoUpdate" id="anoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="nivelEnsinoUpdate">nivelEnsino</label>
                            <select class="form-control" name="nivelEnsinoUpdate" id="nivelEnsinoUpdate">
                                <option value="Fundamental">Fundamental</option>
                                <option value="Medio">Medio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="serieUpdate">serie</label>
                            <input type="text" class="form-control" name="serieUpdate" id="serieUpdate">
                        </div>
                        <div class="form-group">
                            <label for="turnoUpdate">Turno</label>
                            <!-- <input type="text" class="form-control" name="turnoUpdate" id="turnoUpdate"> -->
                            <select class="form-control" name="turnoUpdate" id="turnoUpdate">
                                <option value="Manha">Manha</option>
                                <option value="Tarde">Tarde</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idEscolaUpdate">Escola</label>
                            <select class="form-control" name="idEscolaUpdate" id="idEscolaUpdate">

                            </select>

                        </div>

                        <button type="submit" class="btn btn-warning d-flex justify-content-center">Guardar</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <?php include "../Includes/script.php"; ?>

    <script>
        $(".btnAlterar").click(function() {
            console.log("Valor turma: " + $(this).attr("data-id-turma"));
            $("#idTurmaUpdate").val($(this).attr("data-id-turma"));
            $("#idTurmaUpdateHidden").val($(this).attr("data-id-turma"));
            $("#anoUpdate").val($(this).attr("data-ano"));
            $("#nivelEnsinoUpdate").val($(this).attr("data-nivel-ensino"));
            $("#serieUpdate").val($(this).attr("data-serie"));
            $("#turnoUpdate").val($(this).attr("data-turno"));
            $("#idEscolaUpdate").val($(this).attr("data-escola"));
        })
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "../escolas/escola/getEscolas.php",
                success: function(data) {
                    $('#idEscola').html(data);
                    $('#idEscolaUpdate').html(data);
                },
                error: function(data) {
                    alert("error con la requisição");
                },
            })
        });
    </script>
</body>

</html>