<?php
include "../../config/app.php";
include "../../helper/common.php";
include "../../config/db.php";

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
                <a href="create_member.php">
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
                        foreach ($members as $member) {
                        ?>
                            <tr>
                                
                                <td><?php echo $member["firstname"] ?></td>
                                <td><?php echo $member["email"] ?></td>
                                <td><?php echo $member["password"] ?></td>
                                <td>
                                    <a href="<?php echo 'edit_member.php?id=' . $member["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Edit Member</button></a> 
                                    <a href="<?php echo '../../controller/DeleteMemberController.php?id=' . $member["id"] ?>"><button type="button" class=" me-2 btn btn-primary">Delete Member</button></a>
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