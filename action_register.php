<?php
    include_once('PHP/CommonInit.php');

    include_once('database/UsersFacade.php');

    Session\redirectBackIfLoggedIn();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if($password === $confirmPassword)
    {
        $usersDB = new UsersFacade();
        $isSuccessfulyRegistered = $usersDB->addUser($username, $password, $name, $email);

        if($isSuccessfulyRegistered)
            Session\logIn($username);
    }

    Session\redirectIndex();
?>
