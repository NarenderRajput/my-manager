<?php
$controller_path = "../../";
$view_path = "../";
$asset = '../';

include "../config/app.php";
include "../helper/common.php";
include "../views/layouts/d_header.php";

$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];
unset($_SESSION["errors"]);
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
            <div class="m-3 p-3">
                <h2 class="mb-3">Create member</h2>
                <form action="../controller/SaveMemberController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Member Name" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["nameErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                        <?php  } ?>
                    </div>

                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="Last Name" class="form-control w-50 mb-2 mt-2">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["emailErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["emailErr"] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["passwordErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["passwordErr"] ?></p>
                        <?php } ?>
                    </div>

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>






<?php
include "../views/layouts/d_footer.php"
?>