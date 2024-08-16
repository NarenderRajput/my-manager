<?php
include "../config/app.php";
include "../helper/common.php";
include "../views/layouts/d_header.php";

$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];
$controller_path = "../../";
$view_path = "../";
?>

<div class="w-100">
    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../views/layouts/side_nav.php";
        ?>
        <div class=" card w-100   ">

            <?php
            include "../views/layouts/top_nav.php";
            ?>
            <div class="m-3 p-3">
                <h2 class="mb-2">Create Project</h2>
                <form action="../controller/ProjectFileController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Project Name" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["nameErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                        <?php  } ?>
                    </div>

                    <div class="form-group">
                        <input type="text" name="url" placeholder="URL" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["urlErr"])) { ?>
                            <p class="text danger"><?php echo $errors["urlErr"] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <textarea name="discription" placeholder="Discription" id="" class="form-control w-50 mb-2 mt-2"></textarea>
                        <?php
                        if (isset($errors["discriptionErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["discriptionErr"] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <input type="number" name="price" placeholder="Price" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["priceErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["priceErr"] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <input type="date" name="deadline" placeholder="Deadline" class="form-control w-50 mb-2 mt-2">
                        <?php
                        if (isset($errors["deadlineErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["deadlineErr"] ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <div class="pic-box" id="pic-box">
                            <div class="overlay">
                                <i class="fa-solid fa-camera fs-1"></i>
                            </div>
                            <img id="preview_img" src="../views/images/profile-pic.jpeg" alt="">
                            <input type="file" name="photo" id="upload" style="display: none;">
                        </div>


                        <?php
                        if (isset($errors["photoErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["photoErr"] ?></p>
                        <?php } ?>
                    </div>

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>







<script>
    const form = document.getElementById("form");
    const upload = document.querySelector("#upload");
    const preview_img = document.getElementById("preview_img");
    const pic_box = document.getElementById("pic-box");
    const upload_img = document.getElementById("upload_img");

    pic_box.addEventListener('click', function() {
        upload.click();
    })

    upload.addEventListener('change', function() {
        console.log(this.files[0], form);
        preview_img.src = URL.createObjectURL(this.files[0]);
    })
</script>




<?php
include "../views/layouts/d_footer.php"
?>