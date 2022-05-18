<?php

require '../model/Klant.class.php';

class KlantController extends DB{

    function login($req)
    {
        $user = User::login($req->username, $req->password);
        if(!$user)
        {
            header('Location: ../views/login.php?error=true');
            return;
        }
        $_SESSION['logged'] = $user->id;
        header('Location: ../views/home.php');
    }

    function getError()
    {
        if (isset($_GET['error'])) {
            return 'Incorrect Username or Password';
        }

        return false;
    }

    function logout($req)
    {
        unset($_SESSION['logged']);
        header("Location: ../views/login.php");
    }
}