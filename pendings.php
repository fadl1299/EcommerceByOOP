<?php
session_start();
$pageTitle = 'Pendings';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'users';

    if ($do == 'users') { ?>
        <?php include 'pendings/users.php' ?>
        <?php
    } elseif ($do == 'categories') { ?>
        <?php include 'pendings/Category.php' ?>
        <?php
    } elseif ($do == 'items') { ?>
        <?php include 'pendings/items.php' ?>
        <?php
    } elseif ($do == 'comments') { ?>
        <?php include 'pendings/comment.php' ?>
        <?php
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
