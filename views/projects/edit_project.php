<?php
include "../../config/app.php";
include "../../helper/common.php";
include "../../config/db.php";
include "../layouts/d_header.php";

$project_id = $_GET["id"];

function get_project($conn, $project_id)
{
    $pro = null;
    $sql = "SELECT * FROM projects WHERE id = " . $project_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pro = $row;
        }
    }
    return $pro;
}

$project = get_project($conn, $project_id);



$errors = isset($_SESSION["errors"]) ?  $_SESSION["errors"] : [];
$controller_path = "../../";
$view_path = "../";
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
                <h2>Edit Project</h2>
              

                    <form action="<?php echo '../../controller/UpdateProjectFileController.php?id=' . $project["id"] ?>" method="POST" enctype="multipart/form-data">


                        <input type="text" name="name" value="<?php echo $project["projectname"] ?>" placeholder="Project Name" class="form-control w-50 mb-2 mt-2"> <br>
                        <?php
                        if (isset($errors["nameErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["nameErr"] ?></p>
                        <?php  } ?>

                        <input type="text" name="url" value="<?php echo $project["url"] ?>" placeholder="URL" class="form-control w-50 mb-2 mt-2"> <br>
                        <?php
                        if (isset($errors["urlErr"])) { ?>
                            <p class="text danger"><?php echo $errors["urlErr"] ?></p>
                        <?php } ?>

                        <textarea name="discription"  placeholder="Discription" id="" class="form-control w-50 mb-2 mt-2"><?php echo $project["discription"] ?></textarea>
                        <?php
                        if (isset($errors["discriptionErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["discriptionErr"] ?></p>
                        <?php } ?>

                        <input type="number" name="price" value="<?php echo $project["price"] ?>" placeholder="Price" class="form-control w-50 mb-2 mt-2"> <br>
                        <?php
                        if (isset($errors["priceErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["priceErr"] ?></p>
                        <?php } ?>
                          
                        <input type="date" name="deadline" value="<?php echo $project["deadline"] ?>" placeholder="Deadline" class="form-control w-50 mb-2 mt-2"> <br>
                        <?php
                        if (isset($errors["deadlineErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["deadlineErr"] ?></p>
                        <?php } ?>

                        <img id="preview_img" src="<?php echo $project["photo"] ? "../../uploads/" . $project["photo"] : "../images/profile-pic.jpeg"; ?>" alt="" class="w-25"> <br>
                        <input type="file"  name="photo" id="upload" style="display: none;">
                        <input type="hidden" name="old_photo" value="<?php echo $project["photo"] ?>">
                        <?php
                        if (isset($errors["photoErr"])) { ?>
                            <p class="text-danger"><?php echo $errors["photoErr"] ?></p>
                        <?php } ?>

                   

                    <button type="submit" class="mt-2 p-2 ps-4 pe-4 btn btn-primary" class="w-75">
                        Update</button>
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