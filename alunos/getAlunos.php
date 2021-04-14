<?php
require "../Includes/conexion.php";

$querySelect = "SELECT * FROM alunos";
$result = $conn->query($querySelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <option value="<?= $row["id_aluno"]; ?>" ><?= $row["nome_aluno"].", ".$row["email"]; ?></option>
<?php
    }
}
$conn->close();
?>