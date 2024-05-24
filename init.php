<?php

include 'database.php';
include 'users/manage_users.php';
include 'comment/manage_Comment.php';
include 'items/manage_items.php';
include 'category/manage_cat.php';
// include 'store/manage_store.php';
// include 'store_items/manage_store_items.php';


$tpl = 'includes/templates/';
$lang = 'includes/languages/';
$fun = 'includes/functions/';
$css = 'layout/css/';
$js = 'layout/js/';


include  $fun . 'functions.php';
include  $lang . 'english.php';
include  $tpl . 'header.php';

if (!isset($noNavbar)) {
  include $tpl . 'navbar.php';
}
