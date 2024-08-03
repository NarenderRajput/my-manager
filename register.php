<?php
    include __DIR__."/config/app.php";
    include __DIR__ . "/config/guest_guard.php";
    include __DIR__."/views/layouts/header.php";
    include __DIR__."/helper/common.php";

    $errors = $_SESSION;
    session_destroy();
?>

<div class="container">
    <div class="p-5">
        <div class="bg-light my-3 text-center shadow">
            <div class="d-flex justify-content-center ">
                <div class="w-50 p-5">
                    <h3>Sign Up</h3>
                    <p><b>Sign Up by entring the information below</b></p>
                    <form class="mt-5" action="<?php echo 'controller/registercontroller.php' ?>" method="POST">
                        <div class="m-3">
                            <div class="col mb-3 ">
                                <div class="d-flex justify-content-around">
                                    <input type="text" name="name" class="form-control w-75" placeholder="First name" aria-label="First name">
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
                                    <input type="text" name="email" class="form-control w-75" placeholder="Email Id" aria-label="Email Id">
                                </div>
                                <?php
                                if (isset($errors['emailErr'])) { ?>
                                    <p class="text-danger"><?php echo $errors['emailErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <div class="col mb-3">
                                <div class="d-flex justify-content-around">
                                    <input type="password" name="password" class="form-control w-75" placeholder="Password" aria-label="Password">
                                </div>
                                <?php
                                if (isset($errors['passwordErr'])) { ?>
                                    <p class="text-danger"><?php echo $errors['passwordErr'] ?></p>
                                <?php  } ?>
                            </div>
                            <button type="submit" class="m-3 ps-5 pe-5 btn  btn-primary">Register</button>
                            <p class="m-2"><a href="login.php">Already Have an Account</a></p>
                        </div>
                    </form>
                </div>
                <div class="w-50 d-none">
                <img class="img-w" src="<?php echo BASE_URL . '/views/images/Nature.png' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . "/views/layouts/footer.php";
?>