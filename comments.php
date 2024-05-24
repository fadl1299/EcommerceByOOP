<?php
session_start();
$pageTitle = 'Comments';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
        <?php include 'comments/manage.php' ?>
        <?php
    } elseif ($do == 'Add') { ?>
        <?php include 'comments/add.php' ?>
        <?php
    } elseif ($do == 'Insert') { ?>
        <?php include 'comments/insert.php' ?>
        <?php
    } elseif ($do == 'Edit') { ?>
        <?php include 'comments/edit.php' ?>
        <?php
    } elseif ($do == 'Update') { ?>
        <?php include 'comments/update.php' ?>
        <?php
    } elseif ($do == 'Delete') { ?>
        <?php include 'comments/delete.php' ?>
        <?php
    } elseif ($do == 'Activate') { ?>
        <?php include 'comments/activate.php' ?>
        <?php
    }
    include $tpl . 'footer.php';
} else {
    header('Location: index.php');
    exit();
}
