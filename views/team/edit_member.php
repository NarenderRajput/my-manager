<?php
$view_path = '../';
$controller_path = '../../';
$asset = '../';

include "../../config/app.php";
include "../../helper/common.php";
include "../../config/db.php";
include "../layouts/d_header.php";

$member_id = $_GET["id"];

function get_member($conn, $member_id)
{
    $mam = null;
    $sql = "SELECT * FROM users WHERE id =" . $member_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mam = $row;
        }
    }
    return $mam; 
}

$member = get_member($conn, $member_id);

$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];

?>



<div class="w-100">

    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../layouts/side_nav.php";
        ?>
        <div class=" card w-100">

            <?php
            include "../layouts/top_nav.php";
            ?>
            <div class="m-3 p-3">
                <h2>Edit Member</h2>
                <form action="<?php echo '../../controller/UpdateMemberController.php?id=' . $member_id ?>" method="POST" enctype="multipart/form-data">

                    <input type="text" name="name" value="<?php echo $member["firstname"] ?>" placeholder="member Name" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["nameErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                    <?php  } ?>

                    <input type="text" name="lastname" value="<?php echo $member["lastname"] ?>" placeholder="Last Name" class="form-control w-50 mb-2 mt-2"> <br>

                    <input type="text" name="email" value="<?php echo $member["email"] ?>" placeholder="Email" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["emailErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["emailErr"] ?></p>
                    <?php } ?>

                    <input type="password" name="password" value="<?php echo $member["password"] ?>" placeholder="Password" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["passwordErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["passwordErr"] ?></p>
                    <?php } ?>

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Update</button>


                </form>
            </div>
        </div>
    </div>
</div>




<?php
include "../layouts/d_footer.php";
?>