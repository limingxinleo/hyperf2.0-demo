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
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController(prefix="session")
 */
class SessionController extends Controller
{
    public function index()
    {
        return $this->response->success('Hello World.');
    }

    public function index2()
    {
        $client = di()->get(ClientFactory::class)->create();

        return $client->get('http://127.0.0.1:9501/session/index');
    }
}
