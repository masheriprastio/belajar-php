<?php

require_once("connection.php");
// $query = "SELECT * FROM login_user";
$sql = "SELECT id, username, password FROM login_user";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Username: " . $row["username"] . " " . $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}
print_r($result);

$koneksi->close();
