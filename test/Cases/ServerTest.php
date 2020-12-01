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
namespace HyperfTest\Cases;

use App\Exception\BusinessException;
use Hyperf\HttpMessage\Uri\Uri;
use Hyperf\Utils\Codec\Json;
use Hyperf\WebSocketClient\Client;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class ServerTest extends HttpTestCase
{
    public function testServerResponse()
    {
        $res = $this->get('/server/response', [
            'Content-Type' => 'application/json',
        ]);

        $this->assertSame(0, $res['code']);
    }

    public function testRpc()
    {
        $res = $this->get('/server/rpc');
        $this->assertSame(0, $res['code']);
        $this->assertStringContainsString('sssHyperf', $res['data']);

        $res = $this->get('/server/rpc2');
        $this->assertSame(0, $res['code']);
        $this->assertStringContainsString('sssHyperf', $res['data']);

        $res = $this->get('/server/rpcException');
        $this->assertSame('Inner Server Error', $res['data']['message']);
        $this->assertSame(BusinessException::class, $res['data']['class']);
        $this->assertSame(500, $res['data']['code']);
    }

    public function testWebSocket()
    {
        $client = new Client(new Uri('ws://127.0.0.1:9503'));
        $ret = $client->push($uniqid = uniqid());
        $this->assertTrue($ret);

        $data = $client->recv(5);
        $data = Json::decode($data->data);
        $this->assertGreaterThan(0, $fd = $data['fd']);
        $this->assertSame($uniqid, $data['data']);

        $this->json('/server/send', [
            'fd' => $fd,
            'id' => $id = uniqid(),
        ]);

        $data = $client->recv(1);
        $this->assertSame(1, $data->opcode);
        $this->assertTrue($data->finish);
        $this->assertSame($id, $data->data);

        $this->json('/server/close', [
            'fd' => $fd,
        ]);

        $data = $client->recv(10);
        if ($data !== false) {
            $this->assertSame(8, $data->opcode);
            $this->assertTrue($data->finish);
        }
    }

    public function testTcpServer()
    {
        $client = new \Swoole\Client(SWOOLE_SOCK_TCP);
        $client->connect('127.0.0.1', 9504);
        $client->send($id = uniqid());
        $this->assertSame('recv:' . $id, $client->recv());

        $client->send($id = uniqid());
        $this->assertSame('recv:' . $id, $client->recv());

        $client->send('Hello World.');
        $this->assertSame('recv:Hello World.', $client->recv());
    }
}
