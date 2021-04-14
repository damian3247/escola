<?php
require "../Includes/conexion.php";

$querySelect = "SELECT * FROM escolas";
$result = $conn->query($querySelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <option value="<?= $row["id_escola"]; ?>" ><?= $row["nome_escola"]; ?></option>
<?php
    }
}
$conn->close();
?>