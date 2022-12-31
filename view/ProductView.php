<?php

namespace app\view;

class ProductView
{
    public static function renderView($view, $params = [])
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/productViews/$view.php";
        $content = ob_get_clean();
        if ($view === 'add-product') {
            include __DIR__ . "/productViews/js.php";
            $js = ob_get_clean();
            $title = 'Product Add';
        } else {
            $title = 'Product List';
            $js = '';
        }
        include __DIR__ . "/productViews/main.php";
    }
}