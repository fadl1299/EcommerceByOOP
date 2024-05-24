<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert Item</h1>";
    $Name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    $country = $_POST['country'];
    $user = $_POST['user'];
    $cate = $_POST['category'];

    $imageName = $_FILES['Image']['name'];
    $imageSize = $_FILES['Image']['size'];
    $imageTmp = $_FILES['Image']['tmp_name'];
    $imageType = $_FILES['Image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));

    $fun = new Func();
    $check = $fun->checkItem("Name", "items", $Name);

    if ($check === 1) {
        echo '<div class="alert alert-danger">Sorry This Item Exist. </div>';
    } else {
        $mana = new Manage_Items;
        $mana->errors($Name, $imageExtension, $imageAllowedExtension, $imageSize);

        if (empty($mana->errors($Name, $imageExtension, $imageAllowedExtension, $imageSize))) {
            $image = rand(0, 100000000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);

            $mana->add($Name, $price, $desc, $status, $country, $user, $cate, $image);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
