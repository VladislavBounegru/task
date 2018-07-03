<?php
include "dbset.inc";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["login"]. " Пароль " . $row["pass"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>