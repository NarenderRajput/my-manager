<?php
include "../layouts/header.php";
include "../../config/app.php";
?>
<div class="container">
    <div class="p-5">
        <div class="bg-light text-center shadow">
            <div class="d-flex justify-content-center ">
                <div class="w-50 mt-5">
                    <h3>Welcome</h3>
                    <p><b>Sign in by entring the information below</b></p>
                    <form class="mt-5 m-3" action="../../controller/logincontroller.php" method="POST">
                        <div class="m-3">
                            <div class="d-flex justify-content-around">
                                <input type="email" name="email" class="form-control w-75" placeholder="Email address" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <?php
                            if (isset($_SESSION['emailErr'])) { ?>
                                <p class="text_danger"> <?php echo $_SESSION['emailErr']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="m-3">
                            <div class="d-flex justify-content-around">
                                <input type="password" name="password" class="form-control w-75" placeholder="Password" id="exampleInputPassword1">
                            </div>
                            <?php
                            if (isset($_SESSION['passwordErr'])) { ?>
                                <p class="text-danger"> <?php echo $_SESSION['passwordErr']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="text-left ms form-check ">
                            <input type="checkbox" name="check_b" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            <?php
                            if (isset($_SESSION['check_bErr'])) { ?>
                                <p class="text-danger"> <?php echo $_SESSION['check_bErr']; ?></p>
                            <?php } ?>
                        </div>
                        <button type="submit" class="m-3 ps-5 pe-5 btn btn-primary">Log In</button>
                        <p class="m-2"><a href="register.php">Don't Have an Account</a></p>
                    </form>
                </div>

                <div class="w-50 d-none">
                    <img class="img-w" src="../images/Nature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "../layouts/footer.php";
?>