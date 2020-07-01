<?php
class Error_Class
{
    public function __construct()
    {
        $vue = new View("Error");
        $vue->generer(array());
    }
}
