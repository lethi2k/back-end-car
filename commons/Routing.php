<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 2/25/20
 * Time: 10:16
 */

namespace Commons;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

class Routing
{
    public static function index($url){


        $router = new RouteCollector();

        $router->get('cars', ["Controllers\CarController", "index"]);
        $router->get('car/add', ["Controllers\CarController", "addForm"]);
        $router->get('car/edit/{id}', ["Controllers\CarController", "editForm"]);
        $router->post('car/save-add', ["Controllers\CarController", "saveAdd"]);
        $router->post('car/save-edit', ["Controllers\CarController", "saveEdit"]);
        $router->get('car/remove/{id}', ["Controllers\CarController", "remove"]);
        $router->post('car/check-name', ["Controllers\CarController", "checkNameExisted"]);

        $router->get('brand', ["Controllers\BrandController", "index"]);
        $router->get('brand/add', ["Controllers\BrandController", "addForm"]);
        $router->get('brand/edit/{id}', ["Controllers\BrandController", "editForm"]);
        $router->post('brand/save-add', ["Controllers\BrandController", "saveAdd"]);
        $router->post('brand/save-edit', ["Controllers\BrandController", "saveEdit"]);
        $router->get('brand/remove/{id}', ["Controllers\BrandController", "remove"]);
        $router->post('brand/check-name', ["Controllers\BrandController", "checkNameExisted"]);

        $router->get('/', ["Controllers\HomeController", "dashboard"]);
        
        $router->get('search', ["Controllers\CarController", "getSearch"]);
        $router->get('brand/search', ["Controllers\BrandController", "getSearch"]);

        $dispatcher = new Dispatcher($router->getData());

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url,
            PHP_URL_PATH));

        echo $response;
    }
}