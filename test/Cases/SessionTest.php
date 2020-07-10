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
namespace HyperfTest\Cases;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Hyperf\Guzzle\CoroutineHandler;
use Hyperf\Utils\Codec\Json;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class SessionTest extends HttpTestCase
{
    public function testSession()
    {
        $client = new Client([
            'handler' => HandlerStack::create(new CoroutineHandler()),
            'base_uri' => 'http://127.0.0.1:9501',
            'timeout' => 1,
        ]);

        $response = $client->get('/session/index');
        var_dump($response->getHeaderLine('Set-Cookie'));
        $this->assertStringContainsString('HYPERF_SESSION_ID=', $response->getHeaderLine('Set-Cookie'));
        $this->assertSame(Json::encode(['code' => 0, 'data' => 'Hello World.']), $response->getBody()->getContents());

        $client = new Client([
            'handler' => HandlerStack::create(new CoroutineHandler()),
            'base_uri' => 'http://127.0.0.1:9501',
            'timeout' => 1,
        ]);
        $response = $client->get('/session/index2');
        var_dump($response->getHeaderLine('Set-Cookie'));
        $this->assertStringContainsString('HYPERF_SESSION_ID=', $response->getHeaderLine('Set-Cookie'));
    }
}
