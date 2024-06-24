<?php
include "../../config/app.php";
include "../../helper/common.php";
include "../layouts/d_header.php";

$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];
$controller_path = "../../"; 
?>

<div class="w-100">

    <div class="d-flex h-full bg-danger-subtle ">
        <?php
        include "../layouts/side_nav.php";
        ?>
        <div class=" card w-100   ">

            <?php
            include "../layouts/top_nav.php";
            ?>
            <div class="m-3 p-3">
                <h2>Create Project</h2>
                <form action="../../controller/ProjectFileController.php" method="POST" enctype="multipart/form-data">

                    <input type="text" name="name" placeholder="Project Name" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["nameErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                    <?php  } ?>

                    <input type="text" name="url" placeholder="URL" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["urlErr"])) { ?>
                        <p class="text danger"><?php echo $errors["urlErr"] ?></p>
                    <?php } ?>

                    <textarea name="discription" placeholder="Discription" id="" class="form-control w-50 mb-2 mt-2"></textarea>
                    <?php
                    if (isset($errors["discriptionErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["discriptionErr"] ?></p>
                    <?php } ?>

                    <input type="number" name="price" placeholder="Price" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["priceErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["priceErr"] ?></p>
                    <?php } ?>

                    <input type="date" name="deadline" placeholder="Deadline" class="form-control w-50 mb-2 mt-2"> <br>
                    <?php
                    if (isset($errors["deadlineErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["deadlineErr"] ?></p>
                    <?php } ?>

                    <img id="preview_img" src="../images/profile-pic.jpeg" alt="" class="w-25"> <br>
                    <?php
                    if (isset($errors["photoErr"])) { ?>
                        <p class="text-danger"><?php echo $errors["photoErr"] ?></p>
                    <?php } ?>

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">Submit Form</button>
                    <input type="file" name="photo" id="upload" style="display: none;">


                </form>
            </div>
        </div>
    </div>
</div>




</div>



<script>
    const form = document.getElementById("form");
    const upload = document.querySelector("#upload");
    const preview_img = document.getElementById("preview_img");
    const upload_img = document.getElementById("upload_img");

    preview_img.addEventListener('click', function() {
        upload.click();
    })

    upload.addEventListener('change', function() {
        console.log(this.files[0], form);
        preview_img.src = URL.createObjectURL(this.files[0]);
    })
</script>




<?php
include "../layouts/d_footer.php"
?>