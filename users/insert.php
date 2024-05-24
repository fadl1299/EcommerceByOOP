<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo  "<div class='container'>";
    echo "<h1 class='text-center member-header'>Insert User</h1>";
    $userName = $_POST['username'];
    $pass     = $_POST['password'];
    $email    = $_POST['email'];
    $job      = $_POST['job'];
    $name     = $_POST['full'];
    $hashPass = sha1($_POST['password']);

    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp  = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));

    $fun = new Func();
    $check = $fun->checkItem("Username", "users", $userName);


    if ($check === 1) {
        echo '<div class="alert alert-danger">Sorry This User Exist. </div>';
    } else {

        $mana = new Manage_Users();
        $mana->errors($userName, 'users', $imageExtension, $imageAllowedExtension, $imageName, $imageSize);

        if (empty($mana->errors($userName, 'users', $imageExtension, $imageAllowedExtension, $imageName, $imageSize))) {
            $image = rand(0, 1000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);

            $mana->add($userName, $job, $email, $name, $hashPass, $image);
        }
    }
} else {
    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun->redirectToHome($error, 3, 'index.php');
}
echo "</div>";
