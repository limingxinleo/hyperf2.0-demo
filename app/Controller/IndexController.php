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
namespace App\Controller;

use App\Middleware\AppendDataMiddleware;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Annotation\Controller as ControllerAnnotation;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Router\Dispatched;
use Hyperf\HttpServer\Router\Route;
use function Hyperf\HttpServerRoute\route;

/**
 * @ControllerAnnotation(prefix="index")
 */
class IndexController extends Controller
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        return $this->response->success([
            'user' => $user,
            'method' => $method,
            'message' => 'Hello Hyperf.',
        ]);
    }

    public function info(?int $id)
    {
        $route = di()->get(Route::class);
        return $this->response->success([
            $route->getPath('index.info', ['id' => $id]),
            $route->getPath('index.data'),
            $route->getName(),
        ]);
    }

    /**
     * @GetMapping(path="data", options={"name": "index.data"})
     * @Middleware(middleware=AppendDataMiddleware::class)
     */
    public function data()
    {
        /** @var Dispatched $dispatched */
        $dispatched = $this->request->getAttribute(Dispatched::class);
        return $this->response->success(
            $dispatched->handler->options
        );
    }

    public function image()
    {
        $image = file_get_contents(BASE_PATH . '/bg.jpg');
        return $this->response->response()
            ->withAddedHeader('Content-Type', 'image/jpeg')
            ->withBody(new SwooleStream($image));
    }
}
