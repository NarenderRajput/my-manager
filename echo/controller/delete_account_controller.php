<?php
include "../config/app.php";
include "../config/db.php";

if (isset($_SESSION['users']['id'])) {
    delete_data($conn, $_SESSION['users']['id']);
} else {
    redirectToLogin();
}

function delete_data($conn, $user_id ) {
    $sql = "DELETE FROM users WHERE id =" . $user_id ;

    if (mysqli_query($conn, $sql)) {
        session_destroy();
        redirectToLogin();
    } else {
        echo "Error deleting record" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function redirectToLogin() {
    header('location: /echo/views/auth/login.php');
    exit;
}
?>