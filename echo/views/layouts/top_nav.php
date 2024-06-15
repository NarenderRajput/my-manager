<div class=" card w-100 border-bottom-0 text-center ">
        <div class=" card-body">
          <div class="d-flex justify-content-around align-items-center bg-light ">
            <?php

            echo $_SESSION['users']['firstname'];
            //echo $_SESSION['users']['email'];
            ?>
            </h1>

            <form action="../controller/logout.php">
              <div class="d-flex align-items-center">
                <button type="submit" class="m-3 pt-3 pb-3 ps-5 pe-5 btn btn-primary">Log Out</button>
                <div class="dropdown">
                  <button class="m-3 pt-3 pb-3 ps-3 pe-5 btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-user" style="color: #fafffe;"></i>
                    Profile
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="account/editProfile.php">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo controller_path() . "/delete_account_controller.php"?>">Delete Profile</a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>