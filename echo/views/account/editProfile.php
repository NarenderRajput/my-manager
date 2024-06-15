<?php

include "../../config/app.php";
include "../../config/login_guard.php";
?>
<?php
include "../layouts/d_header.php";
include "../layouts/side_nav.php";
include "../layouts/top_nav.php";
$errors =  isset ($_SESSION["errors"])? $_SESSION["errors"]: [];
$user = $_SESSION['users'];
?>
    <div class="p-5">
        <div class=" text-center">
            <div class="d-flex justify-content-center ">
                <div class="w-75">
                    <h2>Edit Profile</h2>
                    <p><b>Update Profile by entring the information below</b></p>
                    <form class="mt-5" action="../../controller/updateprofilecontroller.php" method="POST">
                        <div class="m-3">
                            <div class="col mb-3 ">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="name" value="<?php echo $user['firstname'];?>" class="form-control w-75" placeholder="First name" aria-label="First name">
                                </div>
                                <?php
                                if (isset($errors['nameErr'])) { ?>
                                    <p class="text-danger"><?php echo $errors['nameErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="lastname" class="form-control w-75" placeholder="Last name" aria-label="Last name">
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="email" value="<?php echo $user['email'];?>" class="form-control w-75" placeholder="Email Id" aria-label="Email Id">
                                </div>
                                <?php
                                if (isset($errors['emailErr'])) { ?>
                                    <p class="text-danger"><?php echo $errors['emailErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="password" name="password" value="<?php echo $user['password'];?>" class="form-control w-75" placeholder="Password" aria-label="Password">
                                </div>
                                <?php
                                if (isset($errors['passwordErr'])) { ?>
                                    <p class="text-danger"><?php echo $errors['passwordErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <button type="submit" class="m-3 ps-5 pe-5 btn  btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
include "../layouts/d_footer.php";
include "../layouts/footer.php";
?>