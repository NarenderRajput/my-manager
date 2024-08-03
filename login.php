<?php
include __DIR__ . "/config/app.php";
include __DIR__ . "/config/guest_guard.php";
include __DIR__ . "/views/layouts/header.php";

$errors = $_SESSION;
session_destroy();
?>

<div class="container">
    <div class="p-5">
        <div class="bg-light text-center shadow">
            <div class="d-flex justify-content-center ">
                <div class="w-50 mt-5">
                    <h3>Welcome Back!</h3>
                    <p><b>Sign-in by entring the information below</b></p>
                    <form class="mt-5 m-3" action="<?php echo 'controller/logincontroller.php' ?>" method="POST">
                        <div class="m-3">
                            <div class="d-flex justify-content-around">
                                <input type="email" name="email" class="form-control w-75" placeholder="Email address" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <?php
                            if (isset($errors['emailErr'])) { ?>
                                <p class="text_danger"> <?php echo $errors['emailErr']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="m-3">
                            <div class="d-flex justify-content-around">
                                <input type="password" name="password" class="form-control w-75" placeholder="Password" id="exampleInputPassword1">
                            </div>
                            <?php
                            if (isset($errors['passwordErr'])) { ?>
                                <p class="text-danger"> <?php echo $errors['passwordErr']; ?></p>
                            <?php } ?>
                        </div>
                        
                        <button type="submit" class="m-3 ps-5 pe-5 btn btn-primary">Log In</button>
                        <p class="m-2"><a href="register.php">Don't Have an Account</a></p>
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