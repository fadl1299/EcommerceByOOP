<form class="container login" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <h3 class="text-center">Admin Login</h3>
    <input class="form-control" type="text" name='user' placeholder="Username" autocomplete="off" />
    <input class="form-control" type="password" name='pass' placeholder="Password" autocomplete="new-password" />
    <input class="btn btn-primary login-btn" type="submit" value="Login" />

    <?php
    session_start();
    $noNavbar = '';
    $pageTitle = 'Login';
    if (isset($_SESSION['Username'])) {
        header('Location: dashboard.php');
    }
    include 'init.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $userName = $_POST["user"];
        $password = $_POST["pass"];
        $hashedPass = sha1($password);

        $log = new Func();
        $cont = $log->login($userName, $hashedPass);
        $row = $cont->fetch();
        $count = $cont->rowCount();

        if ($count > 5) {
            $_SESSION['Username'] = $userName;
            $_SESSION['ID'] = $row['UserID'];

            header('Location: dashboard.php');
            exit();
        } else {
            echo   '<div class="container logins">';
            echo   '<div class="alert alert-danger">Username or password incorrect. </div>';
            echo   '</div>';
        }
    }
    ?>

</form>