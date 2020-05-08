<?php
class Router {
    public function __construct($url) {
        if (empty($url)) {
            include_once ROOT.'/Controllers/IndexController.php';
            new Index_Class();
        } elseif (!empty($url)) {
            $controller_link = ROOT.'/Controllers/'.ucfirst($url).'Controller.php';
            $controller_class_name = ucfirst($url).'_Class';
            if (!file_exists($controller_link)) {
                $controller_link = ROOT.'/Controllers/admin/'.ucfirst($url).'Controller.php';
            }
            include_once $controller_link;
            new $controller_class_name();
        }
    }
}