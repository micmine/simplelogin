<?php
function validateUsername($username) {
    if (!preg_match('/[a-zA-Z0-9]/', $username)) {
        return true;
        die();
    } else {
        return false;
        die();
    }
}

function validatePassword($password) {
    if (!preg_match('/[a-zA-Z0-9]/', $password)) {
        return true;
        die();
    } else {
        return false;
        die();
    }
}
?>