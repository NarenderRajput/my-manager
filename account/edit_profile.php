<?php
include "../config/app.php";
include "../helper/common.php";
include "../config/login_guard.php";
?>

<?php
include "../views/layouts/d_header.php";
?>

<?php

$errors =  isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
$error = isset($_SESSION["error"]) ? $_SESSION["error"] : '';
unset($_SESSION['errors']);
unset($_SESSION['error']);
// design
$user = $_SESSION['users'];
?>

<div class="h-full">
    <div class="d-flex h-full bg-danger-subtle text-center">
        <?php
        include "../views/layouts/side_nav.php";
        ?>
        <div class=" card w-100 border-bottom-0 ">
            <div class=" card-body">
                <?php
                if (isset($error)) { ?>
                    <p class="text-danger"><?php echo $error ?></p>
                <?php  } ?>
                <?php
                include "../views/layouts/top_nav.php";
                ?>

                <?php
                include "profile.php";
                ?>

            </div>
        </div>
    </div>
</div>


<?php
include "../views/layouts/d_footer.php";
?>