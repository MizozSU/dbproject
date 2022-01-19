<?php
require_once "../config/menagerLevel.php";

echo "usunPozycjeTest:<br/><br/>";
$id = 1;
$sql = "call usunPozycje(?);";
try {
    $stmt = $conn->prepare($sql); //podkreśla, ale git
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_assoc()["returnValue"];
    if($value == 1) {
        echo "Usunięto";
    } else {
        echo "Nie usunięto";
    }
} catch (mysqli_sql_exception $e) {
    echo "Błąd"; //Usunięcie może się nie powieść jeśli pozycja jest w tablicy rachunki_pozycje
}

$conn->close();
?>