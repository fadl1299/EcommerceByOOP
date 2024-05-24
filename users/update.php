<?PHP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='container'>";
    echo "<h1 class='text-center member-header'>Update User</h1>";

    $id = $_POST['userid'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $name = $_POST['full'];

    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    $imageAllowedExtension = array('jpeg', 'jpg', 'png', 'gif');

    $imageExplode = explode('.', $imageName);

    $imageExtension = strtolower(end($imageExplode));

    $pass = empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : sha1($_POST['newpassword']);

    $mana = new Manage_Users();
    if (empty($mana->errors($user, 'users', $imageExtension, $imageAllowedExtension, $imageName, $imageSize))) {

        $mana = new Manage_Users();
        $check = $mana->check_user_exist('users', 'Username', 'UserID', $user, $id);

        if ($check === 1) {
            $error = '<div class="alert alert-danger">Sorry This User Is Exist. </div>';
            $fun = new Func();
            $fun->redirectToHome($error, 3, 'users.php?do=Manage');
        } else {
            $image = rand(0, 100000000) . '_' . $imageName;

            move_uploaded_file($imageTmp, 'layout\images\\' . $image);

            $mana = new Manage_Users();
            $stmt = $mana->update($image, $user, $email, $name, $pass, $job, $id, 'users');
        }
    }
} else {

    $error = '<div class="alert alert-danger">You Can\'t Browse This Page. </div>';
    $fun = new Func();
    $fun->redirectToHome($error, 3, 'users.php?do=Manage');
}
echo "<div>";
