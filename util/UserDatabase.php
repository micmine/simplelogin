<?php
include "Db.php";

function verifyPasswordHash($username, $password) {
    $conn = connectDb();

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

function getName($uid) { 
    $conn = connectDb();
    $name = "";

    $uid = mysqli_real_escape_string($conn, trim($uid));
    $query = "select username from user where uid = '$uid'";
    if ($result = mysqli_query($conn, $query)) {

        /* fetch associative array */
        while ($data = mysqli_fetch_assoc($result)) {
            $name = $data["username"];
        }
    
        mysqli_free_result($result);
    }

    disconnectDb($conn);
    return $name;
}

function setPassword($uid, $oldpassword, $newpassword) { 

    $uid = verifyPasswordHash(getName($uid), $oldpassword);
    if (isset($uid) && $uid != "") {
        $conn = connectDb();

        $newpassword = mysqli_real_escape_string($conn, trim($newpassword));
        $uid = mysqli_real_escape_string($conn, trim($uid));

        $hash = password_hash($uid, PASSWORD_DEFAULT);

        $query = "update user set password = '$hash' where uid = '$uid'";
        if(!mysqli_query($conn, $query)){ 
            error_log(mysqli_error($link)); 
        }

        disconnectDb($conn);
    }
}

function isExpired($uid) {
    $now = date("Y-m-d");

    $conn = connectDb();
    $expirationdate = "";

    $uid = mysqli_real_escape_string($conn, trim($uid));
    $query = "select expirationdate from user where uid = '$uid'";
    if ($result = mysqli_query($conn, $query)) {

        /* fetch associative array */
        while ($data = mysqli_fetch_assoc($result)) {
            $expirationdate = $data["expirationdate"];
        }
    
        mysqli_free_result($result);
    }
    disconnectDb($conn);
    if ($now > $expirationdate) {
        return false;
    } else {
        return true;
    }
}

?>