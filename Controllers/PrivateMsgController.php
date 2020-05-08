<?php
class PrivateMsg_Class
{
    public function __construct()
    {
        $vue = new View("privateMsg");
        $vue->generer(array());
    }
}