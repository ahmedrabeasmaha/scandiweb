<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/ProductController.php';
require_once __DIR__ . '/core/Database.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/models/Product.php';
require_once __DIR__ . '/models/ProductTypes/Book.php';
require_once __DIR__ . '/models/ProductTypes/DVD.php';
require_once __DIR__ . '/models/ProductTypes/Furniture.php';
require_once __DIR__ . '/view/ProductView.php';

use app\core\Router;
use app\controllers\ProductController;
use app\core\Database;

$database = new Database();
$router = new Router();
$controller = new ProductController();

$router->get('/', [$controller, 'index']);
$router->get('/add-product', [$controller, 'create']);
$router->post('/add-product', [$controller, 'create']);
$router->post('/delete-product', [$controller, 'delete']);

$router->get('/api/read-product', [$controller, 'read']);

$router->resolve();