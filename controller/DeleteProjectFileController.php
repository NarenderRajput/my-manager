<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$conn = db_connect();

function delete_project_action($conn, $project_id)
{
    $sql = "DELETE FROM projects WHERE id =" . $project_id;
    if (mysqli_query($conn, $sql)) {
        header("location: ../projects/project_listing.php");
    } else {
        echo "Error deleting action" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

delete_project_action($conn, $_GET["id"]);