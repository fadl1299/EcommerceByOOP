<?php
session_start();
$pageTitle = 'Categories';
if (isset($_SESSION['Username'])) {

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'category/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'category/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'category/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'category/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'category/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'category/delet.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'category/activate.php' ?>
        <?php
    }


    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
