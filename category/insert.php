<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Categories</h1>";
    $Name = $_POST['name'];
    $desc = $_POST['desc'];

    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));


    $function = new Func();
    $check = $function->checkitem("Name", "items", $Name);

    if ($check === 1) {
        echo
        '<div class="alert alert-danger">Sorry This Category Exist. </div>';
    } else {
        $manage_cat = new Manage_Cate;
        $manage_cat->errors($Name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize);

        if (empty($manage_cat->errors($Name, $imageName, $imageExtension, $imageAllowedExtension, $imageSize))) {
            $image = rand(0, 10000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);
            $manage_cat->add($Name, $desc, $image);
        }
    }
} else {
    $errors = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $function = new Func();
    $function->redirectToHome($errors, 3, 'index.php');
}
echo "</div>";
