<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/db.php";

$conn = db_connect();

$view_path = '../';
$controller_path = '../../';
$asset = '../';

$parent_id = $_SESSION["users"]["id"];
$members = [];

function get_members($conn, $parent_id)
{
    $member = [];
    $sql = "SELECT * FROM users WHERE parent_id= " . $parent_id;

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $member[] = $row;
        }
    }
    return $member;
}

$members = get_members($conn, $parent_id);



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
                <a href="create_member.php">
                    <button type="button" class="w-200px mt-3 mb-3 btn btn-primary">Create Member</button>
                </a>


                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email id</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($members as $member) {
                        ?>
                            <tr>

                                <td><?php echo $member["firstname"] ?></td>
                                <td><?php echo $member["lastname"] ?></td>
                                <td><?php echo $member["email"] ?></td>
                                <td><?php echo $member["password"] ?></td>
                                <td>
                                    <a href="<?php echo 'edit_member.php?id=' . $member["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit</button></a>
                                    <a href="<?php echo '../../controller/DeleteMemberController.php?id=' . $member["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Delete</button></a>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if (count($members) === 0) { ?>
                            <tr>
                                <td class="text-center" colspan="5">No member found.</td>
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