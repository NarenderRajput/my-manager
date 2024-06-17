<?php
include "../layouts/header.php";
include "../../config/app.php";
?>

<div class="container">
    <div class="p-5">
        <div class="bg-light my-3 text-center shadow">
            <div class="d-flex justify-content-center ">
                <div class="w-50 p-5">
                    <h3>Sign Up</h3>
                    <p><b>Sign Up by entring the information below</b></p>
                    <form class="mt-5" action="../../controller/registercontroller.php" method="POST">
                        <div class="m-3">
                            <div class="col mb-3 ">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="name" class="form-control w-75" placeholder="First name" aria-label="First name">
                                </div>
                                <?php
                                if (isset($_SESSION['nameErr'])) { ?>
                                    <p class="text-danger"><?php echo $_SESSION['nameErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="lastname" class="form-control w-75" placeholder="Last name" aria-label="Last name">
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="email" class="form-control w-75" placeholder="Email Id" aria-label="Email Id">
                                </div>
                                <?php
                                if (isset($_SESSION['emailErr'])) { ?>
                                    <p class="text-danger"><?php echo $_SESSION['emailErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="password" name="password" class="form-control w-75" placeholder="Password" aria-label="Password">
                                </div>
                                <?php
                                if (isset($_SESSION['passwordErr'])) { ?>
                                    <p class="text-danger"><?php echo $_SESSION['passwordErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <button type="submit" class="m-3 ps-5 pe-5 btn  btn-primary">Register</button>
                            <p class="m-2"><a href="login.php">Already Have an Account</a></p>
                        </div>
                    </form>
                </div>
                <div class="w-50 d-none">
                    <img class="img-w1" src="../images/Nature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../layouts/footer.php";
?>