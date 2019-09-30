<?php

function dd($var)
{
    var_dump($var);
    die();
}

function is_teacher()
{
     return ($_SESSION['is_teacher'] == 1) ? true : false;
 }

function check_session()
{
    $check_session = isset($_SESSION, $_SESSION['username']);

    if (!$check_session) {
        header('Location: ../pages/profile.php');
        exit;
    }
}


// function isAdmin()
// {
// if (isset($_SESSION['username']) && $_SESSION['username']['user_type'] == 'admin' ) {
// return true;
// }else{
// return false;
// }
// }