<?php

namespace app\controllers;

use app\core\Database;
use app\models\ProductTypes\DVD;
use app\view\ProductView;

class ProductController
{
    public static function index()
    {
        $view = new ProductView();
        $db = new Database();
        $view->renderView('index', [
            'products' => $db->getProducts()
        ]);
    }

    public static function create()
    {
        $product = new DVD(['type' => "DVD"]);
        $errors = [];
        $view = new ProductView();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = [];
            foreach ($_POST as $key => $value) {
                print(var_dump($key));
                $productData[$key] = $value;
            }

            $cname = "app\\models\\ProductTypes\\" . $_POST['type'];
            if (class_exists($cname)) {
                $product = new $cname($productData);
            }

            $errors = $product->validateData();

            if (!$errors) {
                $db = new Database();
                $db->createProduct($product);
                header('Location: /');
                exit;
            }
        }

        $view->renderView('add-product', [
            'errors' => $errors,
            'product' => $product
        ]);
    }

    public static function delete()
    {
        if ($_POST) {
            $db = new Database();
            foreach ($_POST as $key => $value) {

                $db->deleteProduct(str_replace("_", " ", $key));
            }
        }
        header('Location: /');
    }

    public static function read()
    {
        header('Content-Type: application/json');
        $db = new Database();
        echo json_encode($db->getProduct($_GET['sku']));
    }
}