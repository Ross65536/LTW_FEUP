<?php

  session_start();
  include_once('PHP/Session.php');
  include_once('templates/heads/default_head.php');
  include_once('templates/common/header.php');
  include_once('database/ListsFacade.php');

  $listDB = new ListsFacade();

  $title = $listDB->getListName($_GET['id']);
  $creator = $listDB->getListCreator($_GET['id']);
  $listItems = $listDB->getListItems($_GET['id']);
  $listUsers = $listDB->getListUsers($_GET['id']);

  if(! Session\isLoggedIn()) {
    include_once('templates/accounts/login.php');
    $_SESSION['error'] = 'not_logged_in';
  }
  else {
    echo '<script src="js/lists/edit_list.js"></script>';
    include_once('templates/lists/edit_list.php');
  }

  include_once('templates/common/footer.php');
?>