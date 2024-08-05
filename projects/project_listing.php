<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$conn = db_connect();
$asset = '../';
$view_path = "../";

$user_id = $_SESSION["users"]["id"];
$projects = [];

function get_projects($conn, $user_id)
{
    $pro = [];
    $sql = "SELECT * FROM projects WHERE user_id= " . $user_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pro[] = $row;
        }
    }
    return $pro;
}

$projects = get_projects($conn, $user_id);

include "../views/layouts/d_header.php";
?>


<div class="w-100">

    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../views/layouts/side_nav.php";
        ?>
        <div class=" card w-100   ">

            <?php
            include "../views/layouts/top_nav.php";
            ?>
            <div class="p-4">
                <a href="../projects/create_project.php">
                    <button type="button" class="w-200px mt-3 mb-3 btn btn-primary">Create Project</button>
                </a>


                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name </th>
                            <th scope="col">URL </th>
                            <th scope="col">Discription</th>
                            <th scope="col">Price</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($projects as $project) {
                        ?>
                            <tr>
                                <th scope="row">
                                    <img src="<?php echo '../../uploads/' . $project["photo"] ?>">
                                </th>
                                <td><?php echo $project["projectname"] ?></td>
                                <td><?php echo $project["url"] ?></td>
                                <td><?php echo $project["discription"] ?></td>
                                <td><?php echo $project["price"] ?></td>
                                <td><?php echo $project["deadline"] ?></td>
                                <td><a href="<?php echo 'edit_project.php?id=' . $project["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit Project</button></a>
                                    <a href="<?php echo '../../controller/DeleteProjectFileController.php?id=' . $project["id"] ?>"><button type="button" class="btn btn-primary">Delete Project</button></a>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if (count($projects) === 0) { ?>
                            <tr>
                                <td class="text-center" colspan="7">No project found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<?php
include "../views/layouts/d_footer.php";
?>