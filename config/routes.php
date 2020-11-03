<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController::index');
Router::get('/index/{id:\d+}', App\Controller\IndexController::class . '::info', ['name' => 'index.info']);
Router::get('/index/data.html', App\Controller\IndexController::class . '::data', [
    'name' => 'index.data',
    'middleware' => [App\Middleware\AppendDataMiddleware::class],
]);

Router::addServer('ws', function () {
    Router::get('/', App\Controller\WebSocketController::class);
});

Router::addServer('http2', function () {
    Router::get('/image', App\Controller\IndexController::class . '::image');
});
