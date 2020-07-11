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

use Hyperf\Guzzle\ClientFactory;
use Hyperf\HttpMessage\Cookie\Cookie;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Utils\Codec\Json;

/**
 * @AutoController(prefix="session")
 */
class SessionController extends Controller
{
    public function index()
    {
        $response = $this->response->response();
        return $response->withAddedHeader('ID', uniqid())
            ->withAddedHeader('ID', uniqid())
            ->withCookie(new Cookie('ID', uniqid()))
            ->withBody(new SwooleStream(Json::encode([
                'code' => 0,
                'data' => 'Hello World.',
            ])));
        return $this->response->success('Hello World.');
    }

    public function index2()
    {
        $client = di()->get(ClientFactory::class)->create();
        $response = $client->get('http://127.0.0.1:9501/session/index');
        $headers = $response->getHeaders();
        foreach ($headers as $key => $header) {
            $response = $response->withoutHeader($key);
        }
        return $response;
    }

    public function baidu()
    {
        $client = di()->get(ClientFactory::class)->create();

        return $client->get('http://www.baidu.com/');
    }
}
