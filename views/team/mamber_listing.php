<?php
include "../../config/app.php";
include "../../helper/common.php";
include "../../config/db.php";

$parent_id = $_SESSION["users"]["id"];
$mambers = [];

function get_mambers($conn, $parent_id)
{
    $mamber = [];
    $sql = "SELECT * FROM users WHERE parent_id= " . $parent_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mamber[] = $row;
        }
    }
    return $mamber;
}

$mambers = get_mambers($conn, $parent_id);



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
                <a href="create_mamber.php">
                    <button type="button" class="w-200px mt-3 mb-3 btn btn-primary">Create Member</button>
                </a>


                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email id</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mambers as $mamber) {
                        ?>
                            <tr>
                                
                                <td><?php echo $mamber["firstname"] ?></td>
                                <td><?php echo $mamber["email"] ?></td>
                                <td><?php echo $mamber["password"] ?></td>
                                <td>
                                    <a href="<?php echo 'edit_mamber.php?id=' . $mamber["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit Member</button></a> 
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