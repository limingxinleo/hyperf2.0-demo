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

use GuzzleHttp\Client;
use Hyperf\Guzzle\CoroutineHandler;
use Hyperf\Redis\Redis;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class ModelTest extends HttpTestCase
{
    public function testModelBelongTo()
    {
        $res = $this->get('/model/belong');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertSame(1, $res['data']['book']['id']);
    }

    public function testModelHasMany()
    {
        $res = $this->get('/model/many');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertIsArray($res['data']['books']);
    }

    public function testModelMorphOne()
    {
        $res = $this->get('/model/morphOne');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['user']['id']);
        $this->assertSame(1, $res['data']['image']['id']);
    }

    public function testModelMorphTo()
    {
        $res = $this->get('/model/morphTo');
        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['imageable']['id']);
        $this->assertSame(1, $res['data']['image']['id']);
    }

    public function testModelFindFromCache()
    {
        $res = $this->get('/model/cache');
        $this->assertSame(0, $res['code']);

        $data = di()->get(Redis::class)->hGetAll('{mc:default:m:user}:id:1');
        $this->assertSame($res['data']['name'], $data['name']);
        $this->assertEquals($res['data']['gender'], $data['gender']);
        $this->assertEquals($res['data']['id'], $data['id']);
        $this->assertSame('DEFAULT', $data['HF-DATA']);
    }

    public function testModelPivotSave()
    {
        $res = $this->get('/model/pivot');

        $this->assertSame(0, $res['code']);
        $this->assertTrue($res['data']);
    }

    public function testModelResource()
    {
        $res = $this->get('/model/resource');

        $this->assertSame(0, $res['code']);
        $this->assertSame(1, $res['data']['id']);
        $this->assertSame('Hyperf', $res['data']['name']);
    }

    public function testModelFind404()
    {
        $client = new Client([
            'handler' => new CoroutineHandler(),
            'base_uri' => 'http://127.0.0.1:9501',
            'timeout' => 1,
        ]);

        $res = $client->get('/model/find404');
        $this->assertSame(404, $res->getStatusCode());
    }
}
