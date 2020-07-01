<?php
class Disconnect_Class {
    public function __construct()
    {
        session_destroy();
        header('Location: accueil.html');
    }
}