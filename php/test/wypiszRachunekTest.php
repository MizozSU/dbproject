<?php
require_once "../config/userLevel.php";

echo "wypiszRachunekTest:<br/><br/>";
$id = 1;

$sql = "call wypiszRachunek(?);";
try {
    $stmt = $conn->prepare($sql); //podkreśla, ale git
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $ret = $result->fetch_assoc()["returnValue"];
        if($ret == -1) {
            echo "Brak ID"; //Trochę spaghetii, ale działa
        } else {
            echo str_replace("\n", "<br/>", $ret);
        }
    } else {
        echo "Brak ID";
    }
} catch (mysqli_sql_exception $e) {
    echo "Błąd"; //Jakiś błąd? Raczej nie nastąpi
}

$conn->close();
?>