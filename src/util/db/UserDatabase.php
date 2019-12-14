<?php
require "Db.php";

function add($username, $password) {
    $conn = connectDb();
    $username = mysqli_real_escape_string($conn, trim(htmlentities($username)));
    $hash = password_hash(mysqli_real_escape_string($conn, trim(htmlentities($password))), PASSWORD_DEFAULT);
    $date = "9999-12-1";
    $query = "insert into user (username, password, expirationdate) values ('$username', '$hash', '$date')";
    if ($conn->query($query) === TRUE) {
    } else {
        error_log($conn->error);
    }
    disconnectDb($conn);
}

function verifyPasswordHash($username, $password) {
    if (isset($username) && $username != "") {
        if (isset($password) && $password != "") {
            $conn = connectDb();

            $uid = "";
            $password = mysqli_real_escape_string($conn, trim(htmlentities($password)));
            $username = mysqli_real_escape_string($conn, trim(htmlentities($username)));
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
        }
    }
    return $uid;
}

function getName($uid) { 
    if (isset($uid) && $uid != "") {
        $conn = connectDb();
        $name = "";

        $uid = mysqli_real_escape_string($conn, trim(htmlentities($uid)));
        $query = "select username from user where uid = '$uid'";
        if ($result = mysqli_query($conn, $query)) {

            /* fetch associative array */
            while ($data = mysqli_fetch_assoc($result)) {
                $name = $data["username"];
            }
        
            mysqli_free_result($result);
        }

        disconnectDb($conn);
    }
    return $name;
}

function setPassword($uid, $oldpassword, $newpassword) {
    if (isset($uid) && $uid != "") {
        if (isset($oldpassword) && $oldpassword != "") {
            if (isset($newpassword) && $newpassword != "") {
                $oldpassword = mysqli_real_escape_string($conn, trim(htmlentities($oldpassword)));
                $uid = verifyPasswordHash(getName($uid), $oldpassword);
                $conn = connectDb();

                $newpassword = mysqli_real_escape_string($conn, trim(htmlentities($newpassword)));
                $uid = mysqli_real_escape_string($conn, trim(htmlentities($uid)));

                $hash = password_hash($newpassword, PASSWORD_DEFAULT);

                $query = "update user set password = '$hash' where uid = '$uid'";
                if(!mysqli_query($conn, $query)){ 
                    error_log(mysqli_error($link)); 
                }

                disconnectDb($conn);
            }
        }
    }
    return $uid;
}

function isExpired($uid) {
    $now = date("Y-m-d");

    $conn = connectDb();
    $expirationdate = "";

    $uid = mysqli_real_escape_string($conn, trim(htmlentities($uid)));
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