
<?php
require_once '../app/core/Router.php';
require_once '../config/config.php';
require_once '../app/models/Films.php';
require_once '../app/controllers/FilmsController.php';



$url = isset($_GET['url']) ? $_GET['url'] : 'home';

$router = new Router();

$router->add('home', 'FilmsController', 'index');
$router->add('films/([0-9]+)', 'FilmsController', 'show');

$router->dispatch($url);
