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

use App\Service\QueueService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Redis\Redis;
use Swoole\Coroutine\Channel;

/**
 * @AutoController(prefix="redis")
 */
class RedisController extends Controller
{
    /**
     * @Inject
     * @var Redis
     */
    protected $redis;

    public function lua()
    {
        $lua = <<<'LUA'
local stock = KEYS[1]
local stock_locked = KEYS[2]

local stock_val = ARGV[1]
local stock_lock_val = ARGV[2]
local ttl = ARGV[3]

local is_exists = redis.call("EXISTS", stock)

if is_exists == 1 then
return 0
else
redis.call("SET", stock, stock_val)
redis.call("SET", stock_locked, stock_lock_val)
redis.call("EXPIRE", stock, ttl)
redis.call("EXPIRE", stock_locked, ttl)
return 1
end
LUA;

        $res = di()->get(Redis::class)->eval($lua, ['lua:test', 'lua:test:lock', '1', '1', 10, 10], 2);

        return $this->response->success($res);
    }

    public function sleep()
    {
        $time = (int) $this->request->input('time', 5);

        di()->get(QueueService::class)->sleep($time);

        return $this->response->success();
    }

    public function multi()
    {
        $channel = new Channel(1);
        go(function () use ($channel) {
            defer(function () use ($channel) {
                $channel->push(true);
                $this->redis->sAdd('ssss', '3');
            });
            $this->redis->multi();
            $this->redis->sAdd('ssss', '1');
            $this->redis->exec();
        });

        $channel->pop();
        $this->redis->sAdd('ssss', '4');
        $this->redis->sAdd('ssss', '5');
        $this->redis->sAdd('ssss', '6');
        $this->redis->sAdd('ssss', '3');

        return $this->response->success();
    }
}
