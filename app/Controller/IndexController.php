<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\HttpServer\Annotation\Controller as ControllerAnnotation;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServerRoute\RouteContext;
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
        return $this->response->success([
            route('index.info', ['id' => $id]),
            route('index.data'),
            di()->get(RouteContext::class)->getRouteName(),
        ]);
    }

    /**
     * @GetMapping(path="data", options={"name": "index.data"})
     */
    public function data()
    {
        return $this->response->success();
    }
}
