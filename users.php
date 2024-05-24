<?php
session_start();
$pageTitle = 'Users';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'users/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'users/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'users/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'users/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'users/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'users/delete.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'users/activate.php' ?>
        <?php
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
