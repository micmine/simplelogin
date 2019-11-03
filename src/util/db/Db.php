<?
function connectDb() {
    $conn = new mysqli("localhost", "login", "1234", "login");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function disconnectDb($conn) {
    mysqli_close($conn);
}

?>
