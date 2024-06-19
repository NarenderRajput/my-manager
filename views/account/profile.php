<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../layouts/style.css">
    <title>Document</title>
</head>

<body>


    <div class=" m-2 text-center">
        <div class="position-relative">
            <img src="../images/Nature.png" class="w-100 h-50" alt="">
            <div class="position-absolute-top w-100 d-flex justify-content-center text-left">
                <div class="transform-trans">
                    <h1><b>Crid Kore</b> <i class="fa-solid fa-shield" style="color: #FFD43B;"></i> </h1>
                    <p class="fs-5"><b>Kaduna, Nigeria</b></p>
                </div>
            </div>
        </div>
        <div class="position-absolute-profile-div text-left w-25 h-fix shadow ">
            <div class="position-relative">
                <img src="../images/profile-pic.jpeg" alt="" class="position-relative w-100 p-height">
                <div class="position-absolute-profilepic d-flex gap-5  justify-contant-center align-items-baseline">
                    <div>
                        <h5 class="p-lr m-0">Follow Crid</h5>
                    </div>
                    <div>
                        <p class="icon"><i class="fa-solid fa-ellipsis" style="color: #00ffff;"></i></p>
                    </div>
                </div>
            </div>
            <div class="m-3">
                <h4>About</h4>
                <p class="border-bottom pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum quas animi quisquam ut quam reprehenderit, labore cum ratione dolores nemo illo saepe perferendis! Sunt illo voluptas excepturi nostrum! Quam, explicabo?</p>

                <div class="d-flex justify-content-between">
                    <p><b>FOLLOWERS</b></p>
                    <p><b>299</b></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p><b>FOLLOWING</b></p>
                    <p><b>50</b></p>
                </div>
                <div class="d-flex justify-content-between">
                    <p><b>SONGS</b></p>
                    <p><b>05</b></p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-item-center">
            <div class="wc m-4 shadow">
                <div class="p-4 pb-0 d-flex justify-content-between align-items-lg-center">
                    <div>
                        <p>Crid Kore</p>
                        <h5>No Time</h5>
                    </div>
                    <div class="">
                        <p><i class="fa-regular fa-heart me-3 i-fs" style="color: #000000;"> 233</i> <i class="fa-regular fa-share-from-square i-fs" style="color: #000000;"> Share</i> </p>
                    </div>
                </div>
                <div class="w-100">
                    <p class="p-transform"><i class="fa-regular fa-circle-play play-i" style="color: #000000;"></i>
                        <img src="../images/musicwave.png" class="ii-wh" alt="">
                    </p>
                </div>
            </div>
        </div>

        <div class="p-5">
            <div class=" text-center">
                <div class="d-flex justify-content-end ">
                    <div class="form-w">
                        <h2>Edit Profile</h2>
                        <p><b>Update Profile by entring the information below</b></p>
                        <form class="mt-5" action="../../controller/updateprofilecontroller.php" method="POST">
                            <div class="m-3">
                                <div class="col mb-3 ">
                                    <div class="d-flex justify-content-around">
                                        <input type="text" name="name" value="<?php echo $user['firstname']; ?>" class="form-control w-75" placeholder="First name" aria-label="First name">
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
                                        <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control w-75" placeholder="Email Id" aria-label="Email Id">
                                    </div>
                                    <?php
                                    if (isset($errors['emailErr'])) { ?>
                                        <p class="text-danger"><?php echo $errors['emailErr'] ?></p>
                                    <?php  } ?>
                                </div>
                                <div class="col mb-3">
                                    <div class="d-flex justify-content-around">
                                        <input type="password" name="password" value="<?php echo $user['password']; ?>" class="form-control w-75" placeholder="Password" aria-label="Password">
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
    </div>

</body>

</html>