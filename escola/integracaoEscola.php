

<?php
$resp = json_decode(file_get_contents("http://educacao.dadosabertosbr.com/api/escolas/buscaavancada?nome=master&estado=MT"));


echo "Começa integração das escolas com nome 'master' e estado seja 'MT'";
echo "<br>";
echo "<br>";
foreach ($resp[1] as $key => $value) {
    $escola = json_decode(file_get_contents("http://educacao.dadosabertosbr.com/api/escola/{$value->cod}"));
    require '../includes/conexion.php';
    $data = date_create(str_replace('/', '-', $escola->inicioAnoTxt));
    $data=date_format($data,"Y-m-d");
    $queryInsert = "INSERT INTO escolas (
                                    id_escola,
                                    nome_escola, 
                                    endereco, 
                                    situacao, 
                                    data) 
            values ('{$value->cod}',
                    '{$value->nome}',
                     '{$escola->endereco}', 
                     '{$value->situacaoFuncionamentoTxt}', 
                     '{$data}')
                     ON DUPLICATE KEY UPDATE    
                    nome_escola='{$value->nome}',
                    endereco='{$escola->endereco}',
                    situacao='{$value->situacaoFuncionamentoTxt}',
                    data='{$data}'";

    if ($conn->query($queryInsert) === TRUE) {
        echo "Inserção de escola " . $value->nome . ": ok";
        echo "<br>";
    } else {
        echo "Error: " . $queryInsert . "<br>" . $conn->error;
    }

    $conn->close();
}
