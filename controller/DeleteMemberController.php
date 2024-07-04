<?php
include "../config/app.php";
include "../config/db.php";
include "../helper/common.php";


function delete_member($conn, $user_id) {
    $sql = "DELETE FROM users WHERE id =" . $user_id;
    if(mysqli_query($conn, $sql)) {
        header("location: ../views/team/member_listing.php");
    } else {
        echo "Error" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

delete_member($conn, $_GET["id"]);

?>