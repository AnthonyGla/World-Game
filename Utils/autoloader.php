<?php
spl_autoload_register(function ($class) {
    if (file_exists(ROOT.'/Controllers/' . $class . 'Controller.php')) {
        require_once ROOT.'/Controllers/' . $class . 'Controller.php';
    }
    elseif (file_exists(ROOT.'/Controllers/' . $class . '.php')) {
        require_once ROOT.'/Controllers/' . $class . '.php';
    }
    elseif (file_exists(ROOT.'/Controllers/admin/' . $class . 'Controller.php')) {
        require_once ROOT.'/Controllers/admin/' . $class . 'Controller.php';
    }
    if (file_exists(ROOT.'/Models/' . $class . 'Model.php')) {
        require_once ROOT.'/Models/' . $class . 'Model.php';
    }
    if (file_exists(ROOT.'/Utils/' . $class . '.php')) {
        require_once ROOT.'/Utils/' . $class . '.php';
    }
});
