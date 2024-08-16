<div class="d-flex justify-content-around align-items-center bg-light ">
  <?php

  echo $_SESSION['users']['firstname'];
  //echo $_SESSION['users']['email'];
  ?>
  
  <div class="d-flex align-items-center">
    <div class="dropdown">
      <button class="m-3 pt-3 pb-3 ps-3 pe-5 btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-user" style="color: #fafffe;"></i>
        Profile
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="<?php echo BASE_URL . '/account/edit_profile.php' ?>">Edit Profile</a></li>
        <li><a class="dropdown-item" href="<?php echo BASE_URL . '/controller/DeleteAccountController.php' ?>">Delete Profile</a></li>
      </ul>
    </div>

    <form action="<?php echo ROOT . '/controller/logout.php' ?>">
      <button type="submit" class="pt-3 pb-3 btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i></button>
    </form>
  </div>

</div>