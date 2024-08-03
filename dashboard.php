<?php

include __DIR__."/config/app.php";
include __DIR__."/helper/common.php";
include __DIR__."/config/login_guard.php";
include __DIR__."/config/db.php";

$conn = db_connect();

$view_path = "";
$asset = "";
$member_id = $_SESSION["users"]["id"];
$tasks = [];

function get_task($conn, $member_id)
{
  $task = [];
  $sql = "SELECT * FROM tasks WHERE member_id =" . $member_id;
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $task[] = $row;
    }
  }
  return $task;
}

$tasks = get_task($conn, $member_id);

?>


<?php
include __DIR__."/views/layouts/d_header.php";
?>
<div class="h-full">
  <div class="d-flex h-full bg-danger-subtle ">
    <?php
    include __DIR__."/views/layouts/side_nav.php";
    ?>
    <div class=" card w-100 border-bottom-0  ">
      <div class=" card-body">
        <?php
        include __DIR__."/views/layouts/top_nav.php";
        ?>

        <div class="w-100 ">
          <?php

          if ($_SESSION["users"]["parent_id"]) { ?>

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
                foreach ($tasks as $k => $task) {
                ?>

                  <tr>
                    <td><?php echo $k + 1 ?></td>
                    <td><?php echo $task["title"] ?></td>
                    <td><?php echo $task["discription"]  ?></td>
                    <td><?php echo $task["status"] ?></td>
                    <td>
                      <a href="<?php echo 'task/edit_task.php?id=' . $task["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit Task</button></a>
                      <a href="<?php echo __DIR__.'/controller/DeleteTaskController.php?id=' . $task["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Delete Task</button></a>
                    </td>


                  </tr>

                <?php } ?>
                <?php if (count($tasks) === 0) { ?>
                  <tr>
                    <td class="text-center" colspan="5">No task Found.</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include __DIR__."/views/layouts/d_footer.php";
?>