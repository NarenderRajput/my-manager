<?php
$controller_path = "../../";
$view_path = "../";
$asset = '../';

include "../../config/app.php";
include "../../helper/common.php";
include "../layouts/d_header.php";

$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];
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
            <div class="m-3 p-3">
                <h2>Create member</h2>
                <form action="../../controller/SaveMemberController.php" method="POST" enctype="multipart/form-data">

                    <input type="text" name="name" placeholder="member Name" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["nameErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                    <?php  } ?>

                    <input type="text" name="email" placeholder="Email" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["emailErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["emailErr"] ?></p>
                    <?php } ?>

                    <input type="password" name="password" placeholder="Password" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["passwordErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["passwordErr"] ?></p>
                    <?php } ?>

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Submit Form</button>


                </form>
            </div>
        </div>
    </div>
</div>






<?php
include "../layouts/d_footer.php"
?>