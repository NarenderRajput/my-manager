<?php
include "../config/app.php";
include "../config/db.php";
include "../helper/common.php";


function delete_task($conn, $member_id) {
$sql = "DELETE FROM tasks WHERE id =" . $member_id;
if (mysqli_query($conn, $sql)) {
    header("location: ../views/task/task_listing.php");
} else {
    echo "Error" . mysqli_error($conn);
}
mysqli_close($conn);
}

delete_task($conn, $_GET["id"]);

?>