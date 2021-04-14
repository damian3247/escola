<?php
require "../Includes/conexion.php";

$querySelect = "SELECT * FROM turmas";
$result = $conn->query($querySelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <option value="<?= $row["id_turma"]; ?>" ><?= $row["ano"].", ".$row["nivel_ensino"].", ".$row["serie"].", ".$row["turno"].", escola: ".$row["id_escola_fk"]; ?></option>
<?php
    }
}
$conn->close();
?>