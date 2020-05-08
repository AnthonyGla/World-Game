<?php

class Connection_Class
{
    public function __construct()
    {
        if (!empty($_POST['username'])) {
            $user = new User();
            $user->connection($_POST['username']);
            $isPasswordCorrect = password_verify($_POST['password'], $user->pass);
            if ($isPasswordCorrect == false) {
                echo 'Failed';
            } else if ($user->active == 0) {
                echo 'Not activated';
            } else if ($user->active == 2) {
                echo 'Banned';
            } else {
                $_SESSION['id'] = $user->id;
                $_SESSION['avatar'] = $user->avatar;
                $_SESSION['username'] = $user->username;
                $_SESSION['rank'] = $user->rank;
                echo 'Success';
            }
        }
        else
            {
            echo 'Empty';
        }
    }
}


