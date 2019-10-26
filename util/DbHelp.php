<?php
include "util/Db.php";
function console_log($data) {
    $bt = debug_backtrace();
    $caller = array_shift($bt);

    if (is_array($data))
        $dataPart = implode(',', $data);
    else
        $dataPart = $data;

    $toSplit = $caller['file'] . ':' . $caller['line'] . ' => ' . $dataPart;
    error_log($toSplit);

    error_log(end(split('/', $toSplit)));
}


function verifyPasswordHash($username, $password) {
    $conn = connectDb();
    //$prepared_query = stripslashes($query);
    //$prepared_query = mysqli_real_escape_string($conn, $prepared_query);
    //error_log($prepared_query);

    $uid = "";
    $password = mysqli_real_escape_string($conn, trim($password));
    $query = "select uid, password from user where username = '$username' and isdeactivated = 0";
    if ($result = mysqli_query($conn, $query)) {
        $count = 0;

        /* fetch associative array */
        while ($data = mysqli_fetch_assoc($result)) {
            $passwordHash = $data["password"];
            if ($count <= 0 && password_verify($password, $passwordHash)) {                
                // password is correct
                $uid = $data["uid"];
                $count = $count + 1;
            }
        }
    
        mysqli_free_result($result);
    }

    disconnectDb($conn);
    return $uid;
}

?>