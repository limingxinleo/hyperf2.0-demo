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

use Hyperf\Pool\Exception\ConnectionException;
use Hyperf\Redis\Redis;
use Hyperf\Redis\RedisFactory;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class RedisTest extends HttpTestCase
{
    public function testRedisLua()
    {
        $res = $this->get('/redis/lua');

        $this->assertSame(0, $res['code']);
        $this->assertEquals(1, $res['data']);

        $this->assertTrue((bool) di()->get(Redis::class)->exists('lua:test'));
        $this->assertTrue((bool) di()->get(Redis::class)->exists('lua:test:lock'));
    }

    public function testRedisMulti()
    {
        $res = $this->get('/redis/multi');

        $this->assertSame(0, $res['code']);
    }

    public function testRedisIncr()
    {
        $redis = di()->get(Redis::class);
        $redis->set('test:incr', 0);
        $this->assertEquals(1, $redis->incr('test:incr'));
    }

    public function testRedisSentinel()
    {
        $redis = di()->get(RedisFactory::class)->get('sentinel');

        $this->expectException(ConnectionException::class);
        $redis->keys('*');
    }
}
