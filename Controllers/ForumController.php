<?php
class Forum_Class
{
    public function __construct()
    {
        $category = new Forum();
        $getCategory = $category->getCategory();

        $NbSubject = $category->countSubject();
        $vue = new View("forum");
        $vue->generer(array('getCategory'=> $getCategory, 'NbSubject' => $NbSubject));
    }
}