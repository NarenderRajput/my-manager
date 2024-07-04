<?php
include "../../config/app.php";
include "../../config/db.php";
include "../../helper/common.php";

$view_path = "../";
$asset = "../";
$controller = "../../";

$user_id = $_SESSION["users"]["id"];
$tasks = [];

function get_task($conn, $user_id) {
    $task = [];
    $sql = "SELECT * FROM tasks WHERE user_id =" . $user_id;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $task[] = $row;
        }
    }
    return $task;
}




$tasks = get_task($conn, $user_id);

include "../layouts/d_header.php";
?>


<div class="w-100">

    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../layouts/side_nav.php";
        ?>
        <div class=" card w-100   ">

            <?php
            include "../layouts/top_nav.php";
            ?>
            <div class="p-4">
                <a href="create_task.php">
                    <button type="button" class="w-200px mt-3 mb-3 btn btn-primary">Create Task</button>
                </a>


                <table class="table w-100">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Sr.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Discription</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($tasks as $k => $task) {
                        ?>
                        
                            <tr>
                                <td><?php echo $k+1 ?></td>
                                <td><?php echo $task["title"] ?></td>
                                <td><?php echo $task["discription"]  ?></td>
                                <td><?php echo $task["status"] ?></td>
                                <td>
                                    <a href="<?php echo 'edit_task.php?id=' . $task["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit Task</button></a> 
                                    <a href="<?php echo '../../controller/DeleteTaskController.php?id=' . $task["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Delete Task</button></a>
                                </td>
                                     
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<?php
include "../layouts/d_footer.php";
?>