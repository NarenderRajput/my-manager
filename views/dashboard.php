<?php

include "../config/app.php";
include "../helper/common.php";
include "../config/login_guard.php";

?>


<?php
include "../views/layouts/d_header.php";
?>
<div class="h-full">
  <div class="d-flex h-full bg-danger-subtle text-center">
    <?php
    include "../views/layouts/side_nav.php";
    ?>
    <div class=" card w-100 border-bottom-0 text-center ">
      <div class=" card-body">
        <?php
        include "../views/layouts/top_nav.php";
        ?>

        <div class="m-4 d-flex justify-content-around text-left">
          <div class="w-25 bg-light p-3">
            <p class="fa-2x"><b>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero officiis doloribus earum tempora porro odio quisquam? Doloremque dolore quaerat esse eius repellat vero similique animi vel quos, fugit, error expedita.</b></p>
          </div>

          <div class="w-25 bg-light p-3">
            <p class="fa-2x"><b>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero officiis doloribus earum tempora porro odio quisquam? Doloremque dolore quaerat esse eius repellat vero similique animi vel quos, fugit, error expedita.</b></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


      <?php
      include "../views/layouts/d_footer.php";
      ?>