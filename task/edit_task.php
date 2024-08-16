<?php
$asset = "../";
$controller_path = "../../";
$view_path = "../";

include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";
include "../views/layouts/d_header.php";

$conn = db_connect();

$task_id = $_GET["id"];

function get_task($conn, $task_id)
{
    $tak = null;
    $sql = "SELECT * FROM tasks WHERE id =" . $task_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tak = $row;
        }
    }
    return $tak;
}

$task = get_task($conn, $task_id);

$user_id = $_SESSION["users"]["id"];
$members = [];

function get_members($conn, $user_id)
{
    $mabr = [];
    $sql = "SELECT * FROM users WHERE parent_id =" . $user_id;

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mabr[] = $row;
        }
    }
    return $mabr;
}

$members = get_members($conn, $user_id);

$errors = isset($_SESSION["edit_errors"]) ? $_SESSION["edit_errors"] : [];
unset($_SESSION["edit_errors"]);
?>

<div class="w-100">

    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../views/layouts/side_nav.php";
        ?>
        <div class="card w-100">

            <?php
            include "../views/layouts/top_nav.php";
            ?>
            <div class="m-3 p-3">
                <h2>Edit Task</h2>
                <form action="<?php echo '../controller/UpdateTaskController.php?id=' . $task["id"] ?>" method="POST" enctype="multipart/form-data">

                    <input type="text" name="name" value="<?php echo $task["title"] ?>" placeholder="Title" class="form-control w-50 mb-2 mt-2">
                    <?php
                    if (isset($errors["nameErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                    <?php  } ?>

                    <textarea name="discription" placeholder="Discription" id="" class="form-control w-50 mb-2 mt-2"><?php echo $task["discription"] ?></textarea>
                    <?php
                    if (isset($errors["discriptionErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["discriptionErr"] ?></p>
                    <?php } ?>

                    <select name="member_id" class="form-control w-50 mb-2 mt-2">  
                        <?php
                        foreach($members as $member) {?>
                        <option value="<?php echo $member['id'] ?>" <?php echo $task["member_id"] === $member['id'] ? 'selected' : ''?> ><?php echo $member["firstname"] ?>
                        </option>                       
                       <?php } ?>
                    </select>
                    
                    <select name="status" class="form-control w-50 mb-2 mt-2">
                        <option value="pending" <?php echo $task["status"] === 'pending' ? 'selected' : '' ?> >Panding</option>
                        <option value="processing"  <?php echo $task["status"] === 'processing' ? 'selected' : '' ?>>Processing</option>
                        <option value="complete"  <?php echo $task["status"] === 'complete' ? 'selected' : '' ?>>Complete</option>
                    </select>
                    
                    <?php
                    if (isset($errors["statusErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["statusErr"] ?></p>
                    <?php } ?>


                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Update
                    </button>


                </form>
            </div>
        </div>
    </div>
</div>



<?php
include "../layouts/d_footer.php";
?>