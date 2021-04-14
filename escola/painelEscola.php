<?php
//Painel de cadastro, edição, exclução e listado das escolas
require '../includes/conexion.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "../includes/css.php"; ?>
    <base href="../">
    <title>Painel escola</title>

</head>

<body class="bg-light">
    <?php include "../navbar.php"; ?>
    <div class="container">
        <div class="row">
            <h2 class="mx-auto">Escola</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2 border">
                <form action="escola/insertEscola.php" method="post">
                    <div class="form-group">
                        <label for="idEscola">id escola</label>
                        <input type="number" class="form-control" name="idEscola" id="idEscola" required>
                    </div>
                    <div class="form-group">
                        <label for="nomeEscola">Nome escola</label>
                        <input type="text" class="form-control" name="nomeEscola" id="nomeEscola">
                    </div>
                    <div class="form-group">
                        <label for="endereco">endereco</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                    </div>
                    <div class="form-group">
                        <label for="situacao">situacao</label>
                        <input type="text" class="form-control" name="situacao" id="situacao" required>
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" name="data" id="data" required>
                    </div>
                    <button type="submit" class="btn btn-warning d-flex justify-content-center">Guardar</button>
                </form>
            </div>
            <div class="col-2">
                <a class="btn btn-warning" href="escola/integracaoEscola.php" target="blank">Integrar escolas Master-MT</a>
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
                            <th>Id</th>
                            <th>Nome escola</th>
                            <th>Endereco</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                            <th>Ver mapa</th>
                            <th>Quantidade de alunos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $querySelect = "SELECT * FROM escolas";
                        $result = $conn->query($querySelect);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                        ?>
                                <tr>
                                    <td><?php echo $row["id_escola"]; ?></td>
                                    <td><?php echo $row["nome_escola"]; ?></td>
                                    <td><?php echo $row["endereco"]; ?></td>
                                    <td>
                                        <button data-id-escola="<?= $row["id_escola"]; ?>" data-nome-escola="<?= $row["nome_escola"]; ?>" data-endereco="<?= $row["endereco"]; ?>" data-situacao="<?= $row["situacao"]; ?>" data-data="<?= $row["data"]; ?>" class="btn btn-warning btnAlterar" data-toggle="modal" data-target="#modalAlterar">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>

                                    </td>
                                    <td>
                                        <form action="escola/deleteEscola.php" method="post">
                                            <input type="hidden" name="idEscolaDelete" value="<?php echo $row["id_escola"]; ?>">
                                            <button class="btn btn-danger">X</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btnMapa " data-endereco="<?= $row["endereco"]; ?>" data-toggle="modal" data-target="#modalMapa">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.166 8.94C12.696 7.867 13 6.862 13 6A5 5 0 0 0 3 6c0 .862.305 1.867.834 2.94.524 1.062 1.234 2.12 1.96 3.07A31.481 31.481 0 0 0 8 14.58l.208-.22a31.493 31.493 0 0 0 1.998-2.35c.726-.95 1.436-2.008 1.96-3.07zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                                <path fill-rule="evenodd" d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                        </button>

                                    </td>
                                    <td>
                                    <?= cantAlunos($row["id_escola"]); ?>
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
                    <h5 class="modal-title">Alterar Escola</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="escola/alterarEscola.php" method="post">
                        <div class="form-group">
                            <label for="idEscolaUpdate">id escola</label>
                            <input type="text" class="form-control" id="idEscolaUpdate" disabled>
                            <input type="hidden" class="form-control" name="idEscolaUpdate" id="idEscolaUpdateHidden">
                        </div>
                        <div class="form-group">
                            <label for="nomeEscolaUpdate">Nome escola</label>
                            <input type="text" class="form-control" name="nomeEscolaUpdate" id="nomeEscolaUpdate">
                        </div>
                        <div class="form-group">
                            <label for="enderecoUpdate">endereco</label>
                            <input type="text" class="form-control" name="enderecoUpdate" id="enderecoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="situacaoUpdate">situacao</label>
                            <input type="text" class="form-control" name="situacaoUpdate" id="situacaoUpdate">
                        </div>
                        <div class="form-group">
                            <label for="dataUpdate">Data</label>
                            <input type="date" class="form-control" name="dataUpdate" id="dataUpdate">
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalMapa">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mapa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <iframe id="iframeMapa" width="100%" height="350px" frameborder="0" style="border:0" src="" allowfullscreen>
                    </iframe>
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
            console.log("Valor escola: " + $(this).attr("data-id-escola"));
            $("#idEscolaUpdate").val($(this).attr("data-id-escola"));
            $("#idEscolaUpdateHidden").val($(this).attr("data-id-escola"));
            $("#nomeEscolaUpdate").val($(this).attr("data-nome-escola"));
            $("#enderecoUpdate").val($(this).attr("data-endereco"));
            $("#situacaoUpdate").val($(this).attr("data-situacao"));
            $("#dataUpdate").val($(this).attr("data-data"));

        })
    </script>

    <script>
        $(".btnMapa").click(function() {
            $("#iframeMapa").attr("src", "https://www.google.com/maps/embed/v1/place?key=CLAVE=" + $(this).attr("data-endereco"))

        })
    </script>
</body>

</html>

<?php
function cantAlunos($idEscola)
{
    require "../Includes/conexion.php";
    $querySelect = "SELECT 
                id_escola_fk, COUNT(*) AS cantalunosxturmas
                FROM
                alunos_turmas atu
                    INNER JOIN
                turmas t ON atu.id_turma_fk = t.id_turma
                GROUP BY id_escola_fk
                HAVING id_escola_fk = {$idEscola}
                ";
    $result = $conn->query($querySelect);
    if ($result->num_rows > 0) {
        $quantidade = $result->fetch_assoc();
        echo $quantidade['cantalunosxturmas'];
    }
    else
    {
        echo 0;
    }
    $conn->close();
}
?>