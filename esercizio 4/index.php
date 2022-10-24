<?php

define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");
define("DB_PORT", 3306);

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn === false) {
    die("Errore di connessione:" . $conn->connect_error);
}

echo "Connessione avvenuta con successo";


$sql = "SELECT `name`, `surname` FROM `teachers`";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Nome e cognome professore:" . " " . $row['name'] . " ";
        echo $row['surname'] . "<br>";
    }
} elseif ($result) {
    echo "0 results";
} else {
    echo "query error";
}



$conn->close();
