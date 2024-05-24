<?php
session_start();
$pageTitle = 'Items';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'items/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'items/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'items/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'items/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'items/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'items/delet.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'items/activate.php' ?>
        <?php
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
