<?php
class PatchTft_Class
{
    private static $data_view;

    public function __construct()
    {
        $this->buildView();
    }

    private function buildView()
    {
        $view = new View("patchTft");
        $view->generer(self::$data_view);
    }
}