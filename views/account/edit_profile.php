<?php

include "../../config/app.php";
include "../../helper/common.php";
include "../../config/login_guard.php";

$asset = "../";

?>


<?php
include "../layouts/d_header.php";
?>

<?php

$errors =  isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
$user = $_SESSION['users'];
?>

<div class="h-full">
    <div class="d-flex h-full bg-danger-subtle text-center">
        <?php
        include "../layouts/side_nav.php";
        ?>
        <div class=" card w-100 border-bottom-0 ">
            <div class=" card-body">
                <?php
                if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"><?php echo $_SESSION['error'] ?></p>
                <?php  } ?>
                <?php
                include "../layouts/top_nav.php";
                ?>

                <?php
                include "profile.php";
                ?>

            </div>
        </div>
    </div>
</div>


<?php
include "../layouts/d_footer.php";
?>