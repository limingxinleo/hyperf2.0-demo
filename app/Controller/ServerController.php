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

use App\Amqp\Producer\DebugProducer;
use App\Rpc\JsonRpc\IdGenerateInterface;
use Hyperf\Amqp\Producer;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Utils\Str;
use Hyperf\WebSocketServer\Sender;

/**
 * @AutoController
 */
class ServerController extends Controller
{
    /**
     * @Inject
     * @var IdGenerateInterface
     */
    protected $idGenerator;

    /**
     * @Inject
     * @var Sender
     */
    protected $sender;

    public function response()
    {
        return $this->response->success();
    }

    public function rpc()
    {
        $result = $this->idGenerator->id('sss');

        return $this->response->success($result);
    }

    public function rpc2()
    {
        $result = $this->idGenerator->id2('sss');

        return $this->response->success($result);
    }

    public function rpcException()
    {
        try {
            $result = $this->idGenerator->exception();
        } catch (\Throwable $exception) {
        }

        return $this->response->success([
            'class' => get_class($exception),
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
        ]);
    }

    public function close()
    {
        $fd = (int) $this->request->input('fd');

        go(function () use ($fd) {
            sleep(1);
            $this->sender->disconnect($fd);
        });

        return $this->response->success();
    }

    public function send()
    {
        $fd = (int) $this->request->input('fd');
        $id = (string) $this->request->input('id');

        $this->sender->push($fd, $id);

        return $this->response->success();
    }

    public function large()
    {
        $data = [
            'id' => uniqid(),
            'framework' => 'Hyperf',
            'string' => Str::random(100),
            'int' => rand(10000, 99999),
        ];

        $result = [];
        for ($i = 0; $i < 10000; ++$i) {
            $result[] = $data;
        }

        return $this->response->success($result);
    }

    public function download()
    {
        $file = BASE_PATH . '/README.md';

        return $this->response->download($file, 'test.md');
    }

    public function amqp()
    {
        $num = $this->request->input('num', 100);
        for ($i = 0; $i < $num; ++$i) {
            sleep(1);
            di()->get(Producer::class)->produce(new DebugProducer(['id' => $i]));
        }
        return $this->response->success();
    }

    public function ip()
    {
        $ip = $this->request->getServerParams()['remote_addr'];
        return $this->response->success($ip);
    }
}
